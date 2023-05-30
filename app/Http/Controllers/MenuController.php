<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $menus = Menu::all();
        return view('managments.menus.index', ['menus'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('managments.menus.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $request->validate([
            'title'=>'required|min:3|unique:menus,title',
            'description'=>'required|min:5',
            'price'=>'required|numeric',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:2048',
            'category_id'=>'required|numeric',
        ]);
        if($request->hasFile('image')){
            $file =$request->image;
            $imageName = time()."_".$file->getClientOriginalName();
            $file->move(public_path('images/menus'),$imageName);
            $title = $request->title;
            Menu::create([
                'title'=>$title,
                'slug'=>Str::slug($title),
                'description'=>$request->description,
                'price'=>$request->price,
                'image'=>$imageName,
                'category_id'=>$request->category_id
            ]);
        $message = 'menus ajouter avec bien succes';
        return redirect()->route('menus.index')->with([
            "message"=>$message
        ]);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('managments.menus.edit',['categories'=>$categories,'menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required|min:3|unique:menus,title,'.$menu->id,
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            if (!empty($menu->image)) {
                unlink(public_path('images/menus/'.$menu->image));
            }
            $file = $request->file('image');
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/menus'), $imageName);
        } else {
            $imageName = $menu->image;
        }

        $title = $request->title;
        $menu->update([
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
            'category_id' => $request->category_id,
        ]);

        $message = 'Menu modifié avec succès';
        return redirect()->route('menus.index')->with([
            "message" => $message
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
{
    $imagePath = public_path('images/menus/' . $menu->image);

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $menu->delete();
    $message = 'Menu supprimé avec succès';
    return redirect()->route('menus.index')->with([
        "message" => $message
    ]);
}

}
