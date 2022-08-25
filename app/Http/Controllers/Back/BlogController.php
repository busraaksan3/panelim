<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blog'] = Blogs::all();
        return view('back.blog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlogRequest $request)
    {
        if (strlen($request->blog_slug > 3)) //seo url
        {
            $slug = Str::slug($request->blog_slug);
        } else {
            $slug = Str::slug($request->blog_title);
        }

        if ($request->hasFile('blog_file')) {
            $file_name = uniqid() . '.' . $request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'), $file_name);
        } else {
            $file_name = null;
        }
        $blog = Blogs::insert(
            [
                "blog_title" => $request->blog_title,
                "blog_slug" => $slug, //seo url
                "blog_file" => $file_name,
                "blog_content" => $request->blog_content,
                "blog_status" => $request->blog_status
            ]
        );
        if ($blog) {
            return redirect(route('blog.index'));
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blogs::where('id', $id)->first();
        return view('back.blog.edit')->with('blogs', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {

        $blog = Blogs::find($id);
        $blog->blog_title = $request->blog_title;
        $blog->blog_content = $request->blog_content;
        $blog->blog_status = $request->blog_status;
        if ($request->hasFile('blog_file')) {

            $file_name = uniqid() . '.' . $request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'), $file_name);


            $path = 'images/blogs/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
            $blog->blog_file = $file_name;
        }
        if (strlen($request->blog_slug > 3)) //seo url
        {
            
            $slug = Str::slug($request->blog_title);
        }
        $blog->blog_slug = $slug;

        $blog->save();
        // BİTER

        if ($blog) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blogs::find($id);

        $blog->delete();
        return redirect()->route('blog.index');
    }
}
