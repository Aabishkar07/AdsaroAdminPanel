<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact as MailContact;
use App\Models\Contact;
use App\Models\Faq;

use function Laravel\Prompts\error;

class HomeController extends Controller
{
    //

    public function herosection()
    {
        try {
            $herosection = Page::get();
            return response()->json([
                'status' => true,
                'data' => $herosection
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function advertisingformats()
    {
        try {
            $advertisingformats = Service::latest()->get();
            return response()->json([
                'status' => true,
                'data' => $advertisingformats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function singleformats($slug)
    {
        try {
            $singleformats = Service::where('slug', $slug)->first();
            return response()->json([
                'status' => true,
                'data' => $singleformats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function relatedformats($slug)
{
    try {
        // Find the current blog by slug
        $currentformat = Service::where('slug', $slug)->first();

        if (!$currentformat) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'format not found'
            ], 404);
        }

        // Fetch other published formats excluding the current one
        $relatedformats = Service::where('id', '!=', $currentformat->id)
            ->get();

        return response()->json([
            'status' => 'OK',
            'data' => $relatedformats
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'ERROR',
            'message' => 'Failed to load related formats'
        ], 500);
    }
}

    public function setting()
    {
        try {
            $setting = Setting::where('id', 1)->first();
            return response()->json([
                'status' => true,
                'data' => $setting
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function termsandcondition()
    {
        try {
            $terms = Page::where('id', 6)->first();
            return response()->json([
                'status' => true,
                'data' => $terms
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function privacypolicy()
    {
        try {
            $privacy = Page::where('id', 7)->first();
            return response()->json([
                'status' => true,
                'data' => $privacy
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

        public function advertising()
    {
        try {
            $advertising = Page::where('id', 2)->first();
            return response()->json([
                'status' => true,
                'data' => $advertising
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

        public function publisher()
    {
        try {
            $publisher = Page::where('id', 3)->first();
            return response()->json([
                'status' => true,
                'data' => $publisher
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

      public function faq()
    {
        try {
             $faq = Faq::orderBy('order', 'asc')->get();

            return response()->json([
                'status' => true,
                'data' => $faq
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }


public function contact(Request $request)
{



    // Create contact in DB using the model
    $contact = Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        // 'phone' => $request->phone,
    ]);

    // Prepare mail data
    $mailData = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        // 'phone' => $request->phone,
    ];

    // Send email
    Mail::to('aaviscar09@gmail.com')->send(new MailContact($mailData));

    // Return JSON response
    return response()->json([
        'success' => true,
        'message' => 'Feedback submitted successfully',
        'data' => $contact
    ], 201);
}


}
