<?php

namespace App\Http\Controllers;

use App\Models\Servants;
use App\Http\Requests\StoreServantsRequest;
use App\Http\Requests\UpdateServantsRequest;

class ServantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $servants = Servants::all();
        return view('managments.serveurs.index',['servants'=>$servants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('managments.serveurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServantsRequest $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'address'=>'required',
        ]);
        Servants::create([
            'name'=>$request->name,
            'address'=>$request->address
        ]);
        $message = 'servants ajouter avec bien succes';
        return redirect()->route('serveurs.index')->with([
            "message"=>$message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Servants $servants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        return view('managments.serveurs.edit')->with([
            'servants'=>Servants::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServantsRequest $request,$id)
    {
        $request->validate([
            'name'=>'required|min:3',
            'address'=>'required',
        ]);
        $servants = Servants::findOrFail($id);
        $servants->update([
            'name'=>$request->name,
            'address'=>$request->address
        ]);
        $message = 'servants modifier avec bien succes';
        return redirect()->route('serveurs.index')->with([
            "message"=>$message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servants = Servants::findOrFail($id);
        $servants->delete();
    $message = 'servants supprimée avec succès';
    return redirect()->route('serveurs.index')->with([
        "message" => $message
    ]);
    }
}
