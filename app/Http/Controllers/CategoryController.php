<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('managments.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('managments.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'title'=>'required|min:3',
            'slug'=>'required'
        ]);
        $title = $request->title;
        Category::create([
            'title'=>$title,
            'slug'=>Str::slug($title)
        ]);
        $message = 'categories ajouter avec bien succes';
        return redirect()->route('categories.index')->with([
            "message"=>$message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('managments.categories.edit')->with([
            "category"=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
    $request->validate([
        'title' => 'required|min:3'
    ]);

    $title = $request->title;
    $category->update([
        'title' => $title,
        'slug' => Str::slug($title)
    ]);
    $message = 'Category has been successfully updated.';
    return redirect()->route('categories.index')->with([
        "message" => $message
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    $category->delete();
    $message = 'Catégorie supprimée avec succès';
    return redirect()->route('categories.index')->with([
        "message" => $message
    ]);
}

}
