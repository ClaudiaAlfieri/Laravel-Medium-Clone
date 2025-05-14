<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostCreaterequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $query = Post::with(['user', 'media'])
            ->withCount('claps')
            ->latest();

        if ($user) {
            $ids = $user->following()->pluck('users.id');
            $query->whereIn('user_id', $ids);
        }

        $posts = $query->simplepaginate(5);
        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreaterequest $request)
    {
        $data = $request->validated();


        // $image = $data['image'];
        // unset($data['image']);
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']);

        // $imagePath = $image->store('posts', 'public');
        // $data['image'] = $imagePath;

        $post = Post::create($data);

        $post->addMediaFromRequest('image')
            ->toMediaCollection();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Post $post)
    {
        return view('post.show', [
            'post' => $post,

        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        if($post->user_id !== Auth::id()){
            abort(403);
        }
        $categories = Category::get();
        return view('post.edit', [
            'post'=>$post,
            'categories'=>$categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostCreaterequest $request, Post $post)
    {
        if($post->user_id !== Auth::id()){
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        if($post->user_id !== Auth::id()){
            abort(403);
        }

        $post->delete();

        return redirect()->route('dashboard');


    }

    public function category(Category $category)
    {
        $post = $category->posts()
            ->with(['user', 'media'])
            ->withCount('claps')
            ->latest()
            ->simplePaginate(5);

        return view('post.index', [
            'posts' => $post,
        ]);
    }

     public function myPosts()
    {
        $user = auth()->user();
        $post = $user->posts()
            ->with(['user', 'media'])
            ->withCount('claps')
            ->latest()
            ->simplePaginate(5);

        return view('post.index', [
            'posts' => $post,
        ]);
    }
}
