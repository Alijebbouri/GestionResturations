<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateTableRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $tables = Table::all();
        return view('managments.tables.index',['tables'=>$tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('managments.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTableRequest $request)
    {
        $request->validate([
            'name'=>'required|unique:tables,name',
            'status'=>'required|boolean'
        ]);
        $name = $request->name;
        Table::create([
            'name'=>$name,
            'slug'=>Str::slug($name),
            'status'=>$request->status
        ]);
        $message = 'tables ajouter avec bien succes';
        return redirect()->route('tables.index')->with([
            "message"=>$message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view('managments.tables.edit')->with([
            "table"=>$table
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, Table $table)
    {
        $request->validate([
            'name'=>'required|unique:tables,name,'.$table->id,
            'status'=>'required|boolean'
        ]);
        $name = $request->name;
        $table->update([
            'name'=>$name,
            'slug'=>Str::slug($name),
            'status'=>$request->status
        ]);
        $message = 'tables modifier avec bien succes';
        return redirect()->route('tables.index')->with([
            "message"=>$message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();
        $message = 'tables supprimée avec succès';
        return redirect()->route('tables.index')->with([
            "message" => $message
        ]);
    }
}
