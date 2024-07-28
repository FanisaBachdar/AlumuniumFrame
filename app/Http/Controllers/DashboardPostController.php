<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    public function index()
    {
    //   $this->authorize('admin');
        return view('dashboard.posts.index', [
            'posts' => Post::all()
        ]);
        
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'posts' => Post::all()
        ]);
    }

   
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:4028',
            'body' => 'required',
            'harga' => 'required|numeric'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Koleksi Buku Baru Sudah Ditambahkan');
    }

    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }


    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $rules =[
            'title' => 'required|max:255',
            'image' => 'image|file|max:4028',
            'body' => 'required',
            'harga' => 'required|numeric'
        ];

        if ($request->slug != $post->slug) {
           $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Koleksi Berhasil Diupdate');
    }

    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Koleksi Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function colections()
    {
        return view('dashboard.colections.index', [
            'posts' => Post::all()
        ]);
    }
}
