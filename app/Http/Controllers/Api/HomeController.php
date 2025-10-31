<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

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
}
