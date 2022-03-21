<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    //
    
    public function index(){

        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('user')){
            $user = User::firstWhere('username', request('user'));
            $title = ' By ' . $user->name;
        }
        return view('blog', [
            "title" => "All Posts" . $title,
            'active' => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString()
        ]);
    }


    public function show( Post $post){
        return view('posts', [
            "title" => "Single posts",
            "post" => $post
        ]);
    }
}
