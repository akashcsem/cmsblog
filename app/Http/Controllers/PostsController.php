<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // store image
        if($request->hasFile('image')) {
          $imagename = time().'.'.$request->file('image')->getClientOriginalExtension();
          $image     = $request->file('image');
          $image->move("posts/", $imagename);
        }

        // store data into database
        Post::create([
          'title'        => $request->title,
          'description'  => $request->description,
          'content'      => $request->content,
          'image'        => $imagename,
          'published_at' => $request->published_at
        ]);
        session()->flash('success', 'Post added successfully.');
        return redirect(route('myposts.index'));
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
        $post = Post::where('id', $id)->firstOrFail();
        return view('posts.create')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->only(['title', 'description', 'content', 'published_at']);

        $post = Post::where('id', $id)->firstOrFail();

        if ($request->hasFile('image')) {
          // delete old image
          if(file_exists('posts/' . $post->image)) {
            unlink('posts/' . $post->image);
          }

          // store new image
          $imagename = time().'.'.$request->file('image')->getClientOriginalExtension();
          $image     = $request->file('image');
          $image->move("posts/", $imagename);

          $data['image'] = $imagename;
        }
        $post->update($data);

        session()->flash('success', 'Post updated successfully.');
        return redirect(route('myposts.index'));
        // dd($request->all());
    }

    /**
     * Display a listing of trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        // $trashed = Post::withTrashed()->get();
        return view('posts.index')->with('posts', $trashed);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
          if(file_exists('posts/' . $post->image)) {
            unlink('posts/' . $post->image);
          }
          $post->forceDelete();
          session()->flash('success', 'Post permanently deleted successfully.');
        } else {
          $post->delete();
          session()->flash('success', 'Post trashed successfully.');
        }

        return redirect(route('myposts.index'));
    }


    public function restore($id)
    {
      $post = Post::withTrashed()->where('id', $id)->firstOrFail();
      $post->restore();
      session()->flash('success', 'Post restore successfully.');
      return redirect()->back();
    }
}
