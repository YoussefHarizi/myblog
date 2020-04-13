<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $latestpost = Post::orderBy('created_at', 'desc')->take(5)->get();
        $postsPagination = Post::paginate(4);
        return view('welcome', ['postsP' => $postsPagination, 'posts' => Post::all(), 'categories' => Category::all(), 'tags' => Tag::all(), 'latest' => $latestpost]);
    }
    public function archive()
    {
        $latestpost = Post::orderBy('created_at', 'desc')->take(3)->get();
        $postsPagination = Post::paginate(6);
        return view('pages.archive', ['postsP' => $postsPagination, 'posts' => Post::all(), 'categories' => Category::all(), 'tags' => Tag::all(), 'latest' => $latestpost]);
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
