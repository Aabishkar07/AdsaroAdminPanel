<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function randomString($length)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }


    public function fileUpload($file, $name)
    {
        if (!$file)
            return null; // Handle null case safely

        $extension = $file->getClientOriginalExtension();
        $destinationPath = public_path() . '/uploads/';
        $randomString = $this->randomString(8);
        $fileName = $name . "_" . $randomString . '.' . $extension;
        $file->move($destinationPath, $fileName);

        return $fileName;
    }



    public function index()
    {
        abort_unless(Gate::allows('View Client Tracking'), 403);
//
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('Add Client Tracking'), 403);
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_unless(Gate::allows('Add Client Tracking'), 403);
        // Base Client data
        $clientData = $request->only([
            'name',
            'email',
            'phone',
            'project_name',
            'start_date',
            'due_date',
            'status',
            'deal_done',
            'priority',
            'remarks',
        ]);

        // If deal_done is true, add these fields to Client as well (they exist in Client model)
        if ($request->deal_done) {
            $extraClientFields = $request->only([
                'amc_price',
                'project_commission',
                'project_price',
                'final_price',
                'reference_website',
            ]);
            $clientData = array_merge($clientData, $extraClientFields);
        }


        if ($request->hasFile('quotation_file')) {
            $clientData['quotation_file'] = $this->fileUpload($request->file('quotation_file'), 'pdfs');
        }

        // Create Client record
        $client = Client::create($clientData);

        // If deal_done, also create ClientDetails
        if ($request->deal_done) {
            $clientDetailData = $request->only([
                'referred_by_name',
                'referred_by_phone',
                'bank_account',
                'amc',
            ]);



            // Create ClientDetails related to this Client
            $client->clientDetail()->create($clientDetailData);
        }

        return redirect()->route('admin.clients.index')->with('popsuccess', 'Client added successfully.');
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        abort_unless(Gate::allows('Edit Client Tracking'), 403);
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        // abort_unless(Gate::allows('Edit Client'), 403);
        // Update basic client data
        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'project_name' => $request->project_name,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'deal_done' => $request->deal_done,
            'priority' => $request->priority,
            'remarks' => $request->remarks,
        ]);


        if ($request->hasFile('quotation_file')) {
            $quotationPath = $this->fileUpload($request->file('quotation_file'), 'pdfs');
            $client->update(['quotation_file' => $quotationPath]);

        }

        // If deal is done, update or create client detail
        if ($request->deal_done) {
            $detailData = [
                'referred_by_name' => $request->referred_by_name,
                'referred_by_phone' => $request->referred_by_phone,
                'bank_account' => $request->bank_account,
                'amc' => $request->amc,
                'amc_price' => $request->amc_price,
                'project_commission' => $request->project_commission,
                'project_price' => $request->project_price,
                'final_price' => $request->final_price,
                'reference_website' => $request->reference_website,
            ];





            // Update if exists, otherwise create
            if ($client->clientDetail) {
                $client->clientDetail()->update($detailData);
            } else {
                $client->clientDetail()->create($detailData);
            }
        }

        return redirect()->route('admin.clients.index')->with('popsuccess', 'Client updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        abort_unless(Gate::allows('Delete Client Tracking'), 4);

        if ($client->quotation_file && file_exists(public_path('uploads/' . $client->quotation_file))) {
            unlink(public_path('uploads/' . $client->quotation_file));
        }
        $client->delete();
        return redirect()->route('admin.clients.index')->with('popsuccess', 'Client deleted successfully.');
    }


    public function show(Client $client)
    {
        // abort_unless(Gate::allows('View Client'), 403);

        return view('admin.clients.view', compact("client"));
    }


}
