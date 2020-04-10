<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'nbusers' => User::all()->count(),
            'nbcategory' => Category::all()->count(),
            'nbposts' => Post::all()->count()
        ]);
    }
}
