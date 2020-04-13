<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidation;
use App\Http\Requests\UpadtePostValidation;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts_pagination = Post::paginate(5);
        return view('posts.index')->with('posts', $posts_pagination);
    }

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('checkCategories')->only('create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidation $request)
    {

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->image->store('images', 'public'),
            'category_id' => $request->category_id,
            'user_id' => $request->user_id
        ]);
        if ($request->tags_id) {
            $post->tags()->attach($request->tags_id);
        }
        session()->flash('success', 'Post added successfuly');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = $post->user;
        $latestpost = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('pages.single', ['post' => $post, 'categories' => Category::all(), 'tags' => Tag::all(), 'user' => $user, 'latest' => $latestpost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create', ['post' => $post, 'categories' => Category::all(), 'tags' => Tag::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpadtePostValidation $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'content', 'category_id']);
        if ($request->hasfile('image')) {
            $image = $request->image->store('images', 'public');
            Storage::disk('public')->delete($post->image);
            $data['image'] = $image;
        };
        if ($request->tags_id) {
            $post->tags()->sync($request->tags_id);
        }
        session()->flash('success', 'Post updated successfuly');
        $post->update($data);
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        if ($post->trashed()) {
            Storage::disk('public')->delete($post->image);
            $post->forceDelete();
            session()->flash('destroy', 'post deleted succesfuly');
            return redirect(route('posts.trashed'));
        } else {
            $post->delete();
            session()->flash('destroy', 'post trashed succesfuly');
            return redirect(route('posts.index'));
        }
    }
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        return view('posts.trashed')->withPosts($trashed);
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->find($id)->restore();
        session()->flash('success', 'Post restored successfuly');
        return redirect(route('posts.trashed'));
    }
}
