<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $postCount = Post::count();
        $categoryCount = Category::count();
        $usersCount = User::count();
        return view('auth.dashboard', compact('postCount', 'categoryCount', 'usersCount'));
    }
}
