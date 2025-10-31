<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        protected ImageService $imageservice

    ) {}

    public function index()
    {
        abort_unless(Gate::allows('View Blog'), 403);



        $blogs = Blog::where('post_type', 'post')
            ->orderBy('post_modified', 'DESC')
            ->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('Add Blog'), 403);


        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request)
    {

        abort_unless(Gate::allows('Add Blog'), 403);


        $now = Carbon::now();
        $data = [
            'post_author' => 0,
            'post_date' => $now,
            'post_date_gmt' => $now->copy()->utc(),
            'post_content' => $request->input('post_content', ''),
            'post_title' => $request->input('post_title'),
            'post_excerpt' => $request->input('post_excerpt', ''),
            'post_status' => $request->input('post_status', 'publish'),
            'comment_status' => 'open',
            'ping_status' => 'open',
            'post_password' => '',
            'post_name' => $request->filled('post_name') ? Str::slug($request->input('post_name')) : Str::slug($request->input('post_title')),
            'to_ping' => '',
            'pinged' => '',
            'post_modified' => $now,
            'post_modified_gmt' => $now->copy()->utc(),
            'post_content_filtered' => '',
            'post_parent' => 0,
            'guid' => '',
            'menu_order' => 0,
            'post_type' => 'post',
            'post_mime_type' => '',
            'comment_count' => 0,
        ];



        $data['meta_title'] = $request->input('meta_title');
        $data['meta_description'] = $request->input('meta_description');
        $data['keywords'] = $request->input('keywords');

        if ($request->hasFile('image')) {
            $service = new ImageService();
            $imageName = $service->fileUpload($request->file('image'), Str::slug($request->input('post_title')));
            $data['image'] = $imageName;
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('popsuccess', 'Blog Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        abort_unless(Gate::allows('View Blog'), 403);

        return view('admin.blogs.view', compact("blog"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        abort_unless(Gate::allows('Edit Blog'), 403);


        return view('admin.blogs.edit', compact("blog"));
    }
    /**
     * Update the specified resource in storage.
     */



    public function update(Request $request, Blog $blog)
    {
        // dd($blog);
        // dd($request->all());
        $blogs=Blog::find($blog->id);
        // dd($blogs);

        abort_unless(Gate::allows('Edit Blog'), 403);
        $req = $request->all();

        $req['post_name'] = Str::slug($req['post_title']);
        $now = Carbon::now();
        $req['post_modified_gmt'] = $now->copy()->utc();
        $req['post_modified'] = $now;


        // $updates = [
        //     'post_title' => $request->post_title,
        //     'post_content' => $request->input('post_content', ''),
        //     'post_excerpt' => $request->input('post_excerpt', ''),
        //     'post_status' => $request->input('post_status', 'publish'),
        //     'post_name' => $request->filled('post_name') ? Str::slug($request->input('post_name')) : Str::slug($request->input('post_title')),
        //     'post_modified' => $now,
        //     'post_modified_gmt' => $now->copy()->utc(),
        // ];

        // $updates['meta_title'] = $request->input('meta_title');
        // $updates['meta_description'] = $request->input('meta_description');
        // $updates['keywords'] = $request->input('keywords');

        if ($request->hasFile('image')) {
            $service = new ImageService();
            $imageName = $service->fileUpload($request->file('image'), Str::slug($request->input('post_title')));
            $req['image'] = $imageName;
        }
        // dd($req);

        $blogs->update($req);


        return redirect()->route('admin.blogs.index')->with('popsuccess', 'Blog Edited');
    }

    public function destroy(Blog $blog)
    {

        abort_unless(Gate::allows('Delete Blog'), 403);


        if ($blog->image) {
            $this->imageservice->imageDelete($blog->image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('popsuccess', 'Blog popSuccessfully Deleted');
    }
}
