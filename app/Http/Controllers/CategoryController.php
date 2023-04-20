<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-category|crear-category|editar-category|borrar-category',['only'=>['index']]);
        $this->middleware('permission:crear-category', ['only'=>['create','store']]);
        $this->middleware('permission:editar-category', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-category',['only'=>['destroy']]);
    }
    
    public function index(Request $request)
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.category.index',['categories'=>$categories, 'user'=>$request->user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('dashboard.category.create',['category' => new Category(), 'user'=> $request->user()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategory $request)
    {
        Category::create($request->validated());
        return back()->with('status','caregoria creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show',["category" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Request $request)
    {
        return view('dashboard.category.edit',["category" => $category, 'user'=> $request->user()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategory $request, Category $category)
    {
        $category->update($request->validated());
        return back()->with('status', 'categoria modificada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('status', 'categoria eliminada exitosamente');
    }
}
