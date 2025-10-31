<?php

use App\Models\Blog;
use App\Models\MetaPage;
use App\Models\Service;
use App\Models\Setting;



// function getCategoriesFrontend($parent_id)
// {
//     return Category::where('parent_id', $parent_id)->where('is_featured', 1)->where('active', 1)->get();
// }
function getsiteKey()
{
    return Setting::first()->google_site_key;
}



function getMetas($segment1, $segment2)
{

    if (!Request::segment(1)) {
        $links = MetaPage::where("page_name", "home")->first();
        if ($links) {
            $meta = (object) [
                'title' => ucfirst($links->meta_title) . ' | Adsaro',
                'description' => $links->meta_description,
                'image' => 'uploads/' . $links->ogimage,
                'keywords' => $links->keywords,
            ];
            return $meta;
        } else {
            $meta = (object) [
                'title' => 'Adsaro Nepal',
                'description' => '"Discover top IT solutions including IT services, Display Marketing, and SEO services at Home/Adsaro. Boost your business efficiency today!',
                'image' => 'images/defaultimage.png',
                'keywords' => 'Adsaro, software development, custom software solutions, IT services, SaaS development, mobile app development, cloud software, enterprise applications, software consulting, tech company',
            ];
            return $meta;
        }
    }
    $links = MetaPage::where("page_name", "!=", "home")->where('page_name', $segment1)->first();
    if ($links) {
        $meta = (object) [
            'title' => ucfirst($links->meta_title) . ' | Adsaro',
            'description' => $links->meta_description,
            'image' => 'uploads/' . $links->ogimage,
            'keywords' => $links->keywords,
        ];
        return $meta;
    } else if (Request::segment(1) == 'service') {
        $service = Service::where('slug', $segment2)->first();

        $meta = (object) [
            'title' => $service->meta_title . ' | Adsaro',
            'description' => $service->meta_description,
            'image' => 'uploads/' . $service->image,
            'keywords' => $service->keywords,
        ];
        return $meta;
    } else {
        $links = MetaPage::where("page_name", "home")->first();
        if ($links) {
            $meta = (object) [
                'title' => ucfirst($links->meta_title) . ' | Adsaro',
                'description' => $links->meta_description,
                'image' => 'uploads/' . $links->ogimage,
                'keywords' => $links->keywords,
            ];
            return $meta;
        } else {
            $meta = (object) [
                'title' => 'Adsaro',
                'description' => '"Discover top IT solutions including IT services, Display Marketing, and SEO services at Home/Adsaro. Boost your business efficiency today!',
                'image' => 'images/defaultimage.png',
                'keywords' => 'Adsaro, software development, custom software solutions, IT services, SaaS development, mobile app development, cloud software, enterprise applications, software consulting, tech company',
            ];

            return $meta;
        }

    }

    // if (Request::segment(1) == 'service') {
    //     $service = Service::where('slug', $segment2)->first();

    //     $meta = (object) [
    //         'title' => $service->meta_title . ' | Adsaro Nepal',
    //         'description' => $service->meta_description,
    //         'image' => 'uploads/' . $service->image,
    //         'keywords' => $service->keywords,
    //     ];
    //     return $meta;
    // } else if (Request::segment(1) == 'blog') {
    //     $blog = Blog::where('slug', $segment2)->first();
    //     $meta = (object) [
    //         'title' => $blog->meta_title . ' | Adsaro Nepal',
    //         'description' => $blog->meta_description,
    //         'image' => 'uploads/' . $blog->featured_image,
    //         'keywords' => $blog->keywords,

    //     ];
    //     return $meta;
    // } elseif (Request::segment(1) == 'aboutus') {

    //     $meta = (object) [
    //         'title' => 'About Us | Adsaro Nepal ',
    //         'description' => '"Discover top IT solutions including IT services, Display Marketing, and SEO services at Home/Adsaro. Boost your business efficiency today!',
    //         'image' => 'images/defaultimage.png',
    //         'keywords' => 'Adsaro, software development, custom software solutions, IT services, SaaS development, mobile app development, cloud software, enterprise applications, software consulting, tech company',
    //     ];
    //     return $meta;
    // } elseif (Request::segment(1) == 'services') {

    //     $meta = (object) [
    //         'title' => 'Services | Adsaro Nepal ',
    //         'description' => '"Discover top IT solutions including IT services, Display Marketing, and SEO services at Home/Adsaro. Boost your business efficiency today!',
    //         'image' => 'images/defaultimage.png',
    //         'keywords' => 'Adsaro, software development, custom software solutions, IT services, SaaS development, mobile app development, cloud software, enterprise applications, software consulting, tech company',
    //     ];
    //     return $meta;
    // } elseif (Request::segment(1) == 'contact') {

    //     $meta = (object) [
    //         'title' => 'Contact | Adsaro Nepal',
    //         'description' => '"Discover top IT solutions including IT services, Display Marketing, and SEO services at Home/Adsaro. Boost your business efficiency today!',
    //         'image' => 'images/defaultimage.png',
    //         'keywords' => 'Adsaro, software development, custom software solutions, IT services, SaaS development, mobile app development, cloud software, enterprise applications, software consulting, tech company',
    //     ];
    //     return $meta;
    // } else {

    //     $meta = (object) [
    //         'title' => 'Adsaro Nepal',
    //         'description' => '"Discover top IT solutions including IT services, Display Marketing, and SEO services at Home/Adsaro. Boost your business efficiency today!',
    //         'image' => 'images/defaultimage.png',
    //         'keywords' => 'Adsaro, software development, custom software solutions, IT services, SaaS development, mobile app development, cloud software, enterprise applications, software consulting, tech company',
    //     ];
    //     return $meta;

    // }
}
