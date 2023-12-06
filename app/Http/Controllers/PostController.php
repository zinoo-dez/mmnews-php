<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\NewsCategory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =NewsCategory::all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'news_category_id'=>'required',
            'description'=>'required|min:10',
            'photo'=>'required|image|mimes:png,jpg,webp,jpeg',
        ]);
        $request['featured'] = $request->featured ?? 0;
        $new = $request->all();
        if($request->hasFile('photo')){
            $photoPath = $request->file('photo')->store('photos', 'public');
            $new['photo'] = $photoPath;
        }
        // dd($new);
        $new['user_id'] = auth()->user()->id;
        Post::create($new);
        return redirect()->route('posts.index')->with('message',"post created success");

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $user = User::find($post->user_id);
        return view('posts.show',compact('post','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories =NewsCategory::all();
        return view('posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name'=> 'required|max:255',
            'news_category_id'=>'required',
            'description'=>'required|min:10',
            'photo'=>'nullable|image|mimes:png,jpg,webp,jpeg',
        ]);
        $request['featured'] = $request->featured ?? 0;
        $new = $request->all();
        if($request->hasFile('photo')){
            Storage::disk('public')->delete($post->photo);
            $photoPath = $request->file('photo')->store('photos', 'public');
            $new['photo'] = $photoPath;
        }
        // dd($new);
        $post->update($new);
        return redirect()->route('posts.index')->with('message',"post created success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('message','deleted successfully');
    }
}
