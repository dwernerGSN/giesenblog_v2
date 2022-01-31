<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('user')->paginate();

        return Inertia::render('Blog/Index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Blog/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Blog::create(
            $request->validate([
                'title' => ['required'],
                'excerpt' => ['required'],
            ])
        );
        return redirect('/blogs')->with('succes','opgeslagen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $id = request('id');

        $post = $blog->with('user', 'comments.user')->findOrFail($id);

        return inertia('Blog/Show', ['blog' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $id = request('id');

        $post = $blog->with('user')->findOrFail($id);

        return inertia('Blog/Edit', ['blog' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //dd($blog, $request);
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
        ]);

        $blog->update($request->all());

        return redirect('/blogs')->with('succes', 'wijziging opgeslagen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $blogId)
    {
        $blog = Blog::findOrFail($blogId);

        $blog->delete();
        return redirect('/blogs')->with('succes', 'blog post succesvol verwijdert');
    }
}
