<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use view;

class PostController extends Controller
{
    public function index()
    {

        return view('posts', [
            "title" => "Koleksi Barang",
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search']))
            ->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post
        ]);
    }
}
