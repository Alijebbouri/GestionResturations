<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Servants;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::orderBy("created_at", "DESC")->paginate(10);
        return view("sales.index")->with([
            "sales" => $sales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalesRequest $request)
    {
        $this->validate($request, [
            "table_id" => "required",
            "menu_id" => "required",
            "servant_id" => "required",
            "quantity" => "required|numeric",
            "total_price" => "required|numeric",
            "total_received" => "required|numeric",
            "change" => "required|numeric",
            "payment_type" => "required",
            "payment_status" => "required",
        ]);
        //store data
        $sale = new Sales();
        $sale->servant_id = $request->servant_id;
        $sale->quantity = $request->quantity;
        $sale->total_price = $request->total_price;
        $sale->total_received = $request->total_received;
        $sale->change = $request->change;
        $sale->payment_status = $request->payment_status;
        $sale->payment_type = $request->payment_type;
        $sale->save();
        $sale->menus()->sync($request->menu_id);
        $sale->tables()->sync($request->table_id);
        //redirect user
        return redirect()->back()->with([
            "success" => "Paiement effectué avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sales = Sales::findOrFail($id);
        //get sale tables
        $tables = $sales->tables()->where('sales_id', $sales->id)->get();
        //get table menus
        $menus = $sales->menus()->where('sales_id', $sales->id)->get();
        return view("sales.edit")->with([
            "tables" => $tables,
            "menus" => $menus,
            "sale" => $sales,
            "servants" => Servants::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalesRequest $request,$id)
    {
        $this->validate($request, [
            "table_id" => "required",
            "menu_id" => "required",
            "servant_id" => "required",
            "quantity" => "required|numeric",
            "total_price" => "required|numeric",
            "total_received" => "required|numeric",
            "change" => "required|numeric",
            "payment_type" => "required",
            "payment_status" => "required",
        ]);
        //get sale to update
        $sale = Sales::findOrFail($id);
        //update data
        $sale->servant_id = $request->servant_id;
        $sale->quantity = $request->quantity;
        $sale->total_price = $request->total_price;
        $sale->total_received = $request->total_received;
        $sale->change = $request->change;
        $sale->payment_status = $request->payment_status;
        $sale->payment_type = $request->payment_type;
        $sale->update();
        $sale->menus()->sync($request->menu_id);
        $sale->tables()->sync($request->table_id);
        //redirect user
        return redirect()->back()->with([
            "success" => "Paiement modifié avec succés"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sale = Sales::findOrFail($id);
        $sale->delete();
        return redirect()->back()->with([
            "success" => "Paiement supprimé avec succés"
        ]);
    }
}
