<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReply;
use App\Models\Post;
use App\Models\Reply;

class ReplyController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-reply|crear-reply|editar-reply|borrar-reply',['only'=>['index']]);
        $this->middleware('permission:crear-reply', ['only'=>['create','store']]);
        $this->middleware('permission:editar-reply', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-reply',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $replies = Reply::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.reply.index',['replies'=>$replies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate();
        return view('dashboard.reply.create',['reply' => new Reply(),'posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReply $request)
    {
        Reply::create($request->validated());
        return back()->with('status','Publicación creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate();
        return view('dashboard.reply.edit',["reply" => $reply, 'posts' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReply $request, Reply $reply)
    {
        $reply->update($request->validated());
        return back()->with('status', 'Post modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();
        return back()->with('status', 'Post eliminado exitosamente');
    }
}
