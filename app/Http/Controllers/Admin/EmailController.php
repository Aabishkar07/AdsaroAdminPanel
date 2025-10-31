<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EmailMarketing;
use App\Models\csv;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Mail;
use Validator;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(Gate::allows('View Email Marketing'), 403);

        $csvs = csv::latest()->get();
        return view('admin.emailmaradketing.csv', compact('csvs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('Add Email Marketing'), 403);

        return view("admin.emailmarketing.create");
    }
    public function getemail(csv $getemail)
    {
        if (!$getemail) {
            return redirect()->back()->with('poperror', 'File Not Found');
        }

        $filePath = public_path("uploads/" . $getemail->file); // use public_path for accessible files
        $parsedDatas = [];

        if (file_exists($filePath)) {
            if (($handle = fopen($filePath, 'r')) !== false) {
                $header = fgetcsv($handle); // Read the header row
                while (($row = fgetcsv($handle)) !== false) {
                    $parsedDatas[] = array_combine($header, $row);
                }
                fclose($handle);
            }
        } else {
            return redirect()->back()->with('poperror', 'CSV file not found at path: ' . $filePath);
        }

        // Optional: Debug output
        // dd($parsedData);

        return view("admin.emailmarketing.getmail", compact('parsedDatas'));
    }


    /**
     * Store a newly created resource in storage.
     */

    function randomString($length)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function fileUpload($file)
    {
        $destinationPath = public_path() . '/uploads/';
        $randomString = $this->randomString(8);
        $extension = $file->getClientOriginalExtension();
        $imageName = $randomString . '.' . $extension;
        $file->move($destinationPath, $imageName);
        return $imageName;
    }

    public function store(Request $request)
    {
        abort_unless(Gate::allows('Add Email Marketing'), 403);

        $request->validate([
            'filename' => 'required',
            'csv_file' => 'required',
            // 'csv_file' => 'required|mimes:csv',
        ]);

        $csv_image = $this->fileUpload($request->csv_file);

        csv::create([
            'filename' => $request->filename,
            'file' => $csv_image,
        ]);

        return redirect()->route("admin.csvs.index")->with('success', 'CSV Successfully Added!');
    }

    public function oldstore(Request $request)
    {
        $request->validate([
            'filename' => 'required',
            'csv' => 'required|mimes:csv',
        ]);

        $file = fopen($request->file('csv_file'), 'r');

        $header = fgetcsv($file);
        $header = array_map('trim', $header);

        while ($row = fgetcsv($file)) {
            $data = array_combine($header, $row);

            if (!$data || !isset($data['name'], $data['gmail'])) {
                continue; // Skip rows with missing data
            }

            // Optional: Basic validation
            $validator = Validator::make($data, [
                'name' => 'required|string|max:255',
                'gmail' => 'required|email|unique:users,email',
            ]);

            if ($validator->fails()) {
                continue; // Skip invalid rows
            }

            // Insert data into the database
            Email::create([
                'name' => $data['name'],
                'email' => $data['gmail'], // Map "gmail" to "email"
            ]);
        }

        fclose($file);

        return redirect()->route("admin.emailmarketing.index")->with('success', 'CSV Imported Successfully!');
    }

    public function newslettercreate(Request $request)
    {

        abort_unless(Gate::allows('Send Email Marketing'), 403);
        $emails = $request->email;

        return view('admin.emailmarketing.newsletter', compact('emails'));

    }
    public function imageDelete($filePath)
    {
        $destinationPath = public_path('uploads/');

        if (file_exists($destinationPath . $filePath)) {
            unlink($destinationPath . $filePath);
        }
        return "true";
    }
    public function email(Request $request)
    {
        $mysubject = $request->input('subject');
        $emails = $request->input('email');
        $content = $request->input('content');

        foreach ($emails as $email) {
            Mail::to($email)->send(new EmailMarketing($content, $mysubject));
        }

        return redirect()->route("admin.csvs.index")->with("popsuccess", "Email Send Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(csv $csv)
    {

        abort_unless(Gate::allows('Delete Email Marketing'), 403);
        // dd($csv);
        if ($csv->file) {
            $this->imageDelete($csv->file);
        }
        $csv->delete();
        return redirect()->route("admin.csvs.index")->with("popsuccess", "Product Deleted");
    }
}
