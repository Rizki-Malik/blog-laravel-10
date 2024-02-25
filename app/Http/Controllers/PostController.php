<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;


class PostController extends Controller
{
    public function index(){    
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title= ' in ' . $category->name;
        } 
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title= ' by ' . $author->name;
        } 
        return view('posts', [
            "title" => "Post Up to Date" . $title,
            "active" => "blog",
            "logo_nav" => "img/logo-white.png",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->WithQueryString()
        ]);
    }
    
    public function show(Post $post){
        return view('post', [
            "title" => "Post",
            "active" => "blog",
            "logo_nav" => "img/logo-white.png",
            "post" => $post
        ]);
    }
}
