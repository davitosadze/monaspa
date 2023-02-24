<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Post::all();
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request["description"] = $request->post_description;
        $blog = Post::create($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $blog->addMediaFromRequest('image')->toMediaCollection('blog');
        }
        return back()->withSuccess('Blog Post Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $news)
    {
        return view('admin.blog.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $news)
    {
        $request["description"] = $request->post_description;
        $news->fill($request->all())->save();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $news->media()->delete();
            $news->addMediaFromRequest('image')->toMediaCollection('blog');
        }
        return back()->withSuccess('Blog Post Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $news)
    {
        $news->delete();
        return back()->withSuccess('Post Deleted');
    }
}
