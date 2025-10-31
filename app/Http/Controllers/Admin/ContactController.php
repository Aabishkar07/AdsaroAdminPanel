<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    public function contact()
    {
        abort_unless(Gate::allows('View Contact'), 403);

        $contacts = Contact::latest()->paginate(20);
        return view("admin.contact.index", compact("contacts"));
    }
    public function contactdelete($contact)
    {
        abort_unless(Gate::allows('Delete Contact'), 403);
        Contact::where("id", $contact)->delete();
        return redirect()->back()->with("popsuccess", "Contact Deleted");
    }

    public function export()
    {
        $contacts = \App\Models\Contact::all();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ];

        $columns = ['Name', 'Email', 'Phone', 'Subject', 'Message', 'Date'];

        $callback = function () use ($contacts, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->name,
                    $contact->email,
                    $contact->phone,
                    $contact->subject,
                    $contact->message,
                    $contact->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function setting()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact("setting"));
    }

    public function settingdetails(Request $request)
    {
        // dd($request);
        $setting = Setting::where("id", 1)->first();
        $setting->update([
            'email' => $request->email,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'google_site_key' => $request->google_site_key,
        ]);
        return redirect()->back()->with('success', 'Details Successully updated');
    }



}
