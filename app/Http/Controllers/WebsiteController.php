<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $latestPosts = Post::orderBy('id', 'desc')->take(5)->get();
        $categories = Category::all();
        $posts = Post::where('is_publish', Post::Published)->paginate(1);
        return view('website.blog.index', [
            'posts' => $posts, 
            'latestPosts' => $latestPosts, 
            'categories' => $categories
        ]);
    }

    public function show(Post $post)
    {
        return view('website.blog.single')->with('post', $post);
    }

    public function contact()
    {
        return view('website.blog.contact');
    }
}
