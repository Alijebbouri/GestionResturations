<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Servants;
use App\Models\Table;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        return view('payments.index')->with([
            'tables'=>Table::all(),
            'categories'=>Category::all(),
            'menus'=>Menu::all(),
            'servants'=>Servants::all(),
        ]);
    }
}
