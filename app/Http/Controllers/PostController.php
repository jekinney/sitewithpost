<?php

namespace App\Http\Controllers;

use App\Queries\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Posts $posts)
    {
        $posts = $posts->publishedList();

        return view( 'post.index', compact('posts') );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin(Posts $posts)
    {
        $posts = $posts->fullList();

        return view( 'post.admin', compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'post.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Queries\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Posts $posts)
    {
        $posts->store( $request );

        return redirect()->route( 'post.admin' );
    }

    /**
     * Display the specified resource.
     *
     * @param  string $uuid
     * @param  \App\Queries\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($uuid, Posts $posts)
    {
        $post = $posts->show( $uuid );

        return view( 'post.show', compact('post') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $uuid
     * @param  \App\Queries\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid, Posts $posts)
    {
        $post = $posts->edit( $uuid );

        return view( 'post.edit', compact('post') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $uuid
     * @param  \App\Queries\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid, Posts $posts)
    {
        $posts->renew( $request, $uuid );

        return redirect()->route( 'post.admin' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $uuid
     * @param  \App\Queries\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid, Posts $posts)
    {
        $posts->remove( $uuid );
    }
}
