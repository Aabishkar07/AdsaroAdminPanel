<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Enquire;
use Illuminate\Http\Request;

class EnquireController extends Controller
{
    //
    public function enquire(){
        return view('frontend.enquire.index');
    }

    public function enquirestore(Request $request){

        Enquire::create([
        'firstname'=> $request->firstname,
        'lastname'=> $request->lastname,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'number' => $request->number,
        ]);

        // $mailData = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'subject' => $request->subject,
        //     'message' => $request->message,
        //     'phone' => $request->phone,
        // ];

        // Mail::to('aaviscar09@gmail.com')->send(new MailContact($mailData));


        return redirect()->back()->with('popsuccess', 'Enquire Submitted Sucessfully');
            }
}
