<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\ProductEnquire;
use App\Models\Service;
use App\Models\Store;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class IndexController extends Controller
{
    //
    public function index()
    {
        $clients = Partner::get();
        $teams = Team::orderBy("order", "asc")->get();
        $banners = Banner::first();
        $services = Service::orderBy("order", "asc")->get();
        $testimonials = Testimonial::active()->ordered()->get();

        $blogs = Blog::orderBy("id", "desc")->latest()->take(3)->get();
        return view("frontend.home.index", compact('clients', 'banners', 'teams', 'services', 'blogs', 'testimonials'));

    }

    public function portfolio()
    {
        $portfolios = Portfolio::orderBy("banner_order", "asc")->get();
        return view("frontend.portfolio.index", compact('portfolios'));
    }


    public function single(Request $request, Blog $blog)
    {

        $allblogs = Blog::where('id', '!=', $blog->id)->paginate(4);
        // dd($allblogs);


        $blog->views++;
        $blog->save();
        $slug = $blog->slug;
        $ip = $request->ip();

        $mailData = [

            'blog' => $blog,
            'status' => "view",
        ];

        return view("frontend.blogs.singlepage", compact('blog', 'slug', 'allblogs'));
    }
    public function servicesingle(Request $request, Service $service)
    {

        $services = Service::where('id', '!=', $service->id)->get();
        // dd($allblogs);

        return view("frontend.services.singleservice", compact('service', 'services'));
    }

    public function getblog()
    {
        $blogs = Blog::orderBy("id", "desc")->paginate(20);
        $title = "All Blogs";
        $message = "Blogs found";
        $searchterm = "";

        return view("frontend.blogs.blogs", compact("blogs", "title", "message", "searchterm"));
    }

    public function aboutus()
    {
        $clients = Partner::get();

        return view("frontend.about.index", compact('clients'));
    }



    public function services()
    {
        $services = Service::orderBy("order", "asc")->get();
        return view("frontend.services.index", compact('services'));
    }

    public function team()
    {

        $teams = Team::orderBy("order", "asc")->get();
        return view("frontend.team.index", compact('teams'));
    }

    public function contact()
    {

        return view("frontend.contact.index");
    }

    public function store()
    {
        $stores = Store::get();
        return view("frontend.store.index", compact('stores'));
    }


    public function storeproduct(Request $request)
    {


        ProductEnquire::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'number' => $request->number,
            'product_id' => $request->product_id,
        ]);

        // $mailData = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'subject' => $request->subject,
        //     'message' => $request->message,
        //     'phone' => $request->phone,
        // ];

        // Mail::to('aaviscar09@gmail.com')->send(new MailContact($mailData));


        return redirect()->back()->with('popsuccess', 'Your enquiry has been submitted successfully! Our team will contact you shortly.');
    }

    public function storesingle($slug)
    {



        $store = Store::where('slug', $slug)->firstOrFail();

        $product = Product::where('service_id', $store->id)->get();

        return view('frontend.store.single', compact('store', 'product'));
    }



    public function privacypolicy()
    {

        return view("frontend.company.privacypolicy");
    }

    public function termsandcondition()
    {

        return view("frontend.company.termsandcondition");
    }
}
