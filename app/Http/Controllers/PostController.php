<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-post|crear-post|editar-post|borrar-post',['only'=>['index']]);
        $this->middleware('permission:crear-post', ['only'=>['create','store']]);
        $this->middleware('permission:editar-post', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-post',['only'=>['destroy']]);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.post.index',['posts'=>$posts]);
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $categories = Category::orderBy('created_at', 'desc')->paginate();
        return view('dashboard.post.create',['post' => new Post(),'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
     
    public function store(StorePost $request)
    {
        Post::create($request->validated());
        return back()->with('status','Publicación creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show',["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate();
        return view('dashboard.post.edit',["post" => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePost $request, Post $post)
    {
        $post->update($request->validated());
        return back()->with('status', 'Post modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Post eliminado exitosamente');
    }
}
