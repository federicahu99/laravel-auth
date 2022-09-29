<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->get();
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        return view('admin.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' =>'required|string|min:5|max:50|unique:posts',
        //     'content' =>'required|string',
        //     'image' =>'nullable|url',
        //     'category_id' =>'nullable|exist:categories_id',
        // ],[
        //     'title.required' => 'The title is required',
        //     'title.unique' => '$request->title already exsist',
        //     'title.min' => 'The title must be at least 5 characters long',
        //     'title.max' => 'The title can\'t be longer than 50 characters',
        //     'title.required' => 'the title is required',
        //     'content.required' => 'Content is required',
        //     'image' => 'Invalid url',
        //     'category_id.exist'=> 'Select a valid category'
        // ]);

        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');

        $post->save();

        return redirect()->route('admin.posts.show', $post)->with('message', 'Post created succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // $request->validate([
        //     'title' =>'required|string|min:5|max:50|unique:posts',
        //     'content' =>'required|string',
        //     'image' =>'nullable|url',
        //     'category_id' =>'nullable|exist:categories_id',
        // ],[
        //     'title.required' => 'The title is required',
        //     'title.unique' => '$request->title already exsist',
        //     'title.min' => 'The title must be at least 5 characters long',
        //     'title.max' => 'The title can\'t be longer than 50 characters',
        //     'title.required' => 'the title is required',
        //     'content.required' => 'Content is required',
        //     'image' => 'Invalid url',
        //     'category_id.exist'=> 'Select a valid category'
        // ]);
        $data = $request->all();
        dd($data);
        $data['slug'] = Str::slug($request->title, '-');
        $post->update($data); // fill and save
        $category_id = $data['category_id'];
        $post->category_id = $category_id;
        $post->update();
        return redirect()->route('admin.posts.show', $post)->with('message', 'The post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'The post has been deleted');
    }
}
