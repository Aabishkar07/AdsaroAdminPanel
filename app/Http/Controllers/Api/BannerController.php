<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //

    public function banner()
    {
        try {
             $banners = Banner::orderBy('banner_order', 'DESC')->get();

            return response()->json([
                'status' => true,
                'data' => $banners
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
