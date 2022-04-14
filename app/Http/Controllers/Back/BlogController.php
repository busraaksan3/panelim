<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
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
    public function store(Request $request)
    {
        if(strlen($request->blog_slug>3)) //seo url
        {
            $slug=Str::slug($request->blog_slug);
        }else{
            $slug=Str::slug($request->blog_title);
        }

        if ($request->hasFile('blog_file')) {
            $request->validate([
                'blog_title'=>'required',
                'blog_content'=>'required',
                'blog_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'

            ]);
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
        $blog=Blogs::where('id',$id)->first();
        return view('back.blog.edit')->with('blogs',$blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(strlen($request->blog_slug>3)) //seo url
        {
            $slug=Str::slug($request->blog_slug);
        }else{
            $slug=Str::slug($request->blog_title);
        }

        if ($request->hasFile('blog_file')) {
            $request->validate([
                'blog_title'=>'required',
                'blog_content'=>'required',
                'blog_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'

            ]);
            $file_name = uniqid() . '.' . $request->blog_file->getClientOriginalExtension();
            $request->blog_file->move(public_path('images/blogs'), $file_name);
        } else {
            $file_name = null;
        }

        $blog = Blogs::Where('id',$id)->update(
            [
                "blog_title" => $request->blog_title,
                "blog_slug" => $slug, //seo url
                "blog_file" => $file_name,
                "blog_content" => $request->blog_content,
                "blog_status" => $request->blog_status
            ]
        );
        if ($blog) {
            return back();
        }
        return redirect(route('blog.index'));
       
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
