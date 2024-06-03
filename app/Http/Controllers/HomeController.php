<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date_of_sale=Carbon::now();
        $date_of_sale=$date_of_sale->format('Y-m-d');
        $productCount=Product::where('status','=','1')->count();
        $customerCount=Customer::where('status','=','1')->count();
        $saleDay=Order::whereDate('date_of_sale','=',Carbon::now()->format('Y-m-d'))->get()->count("id");
        $totalDaySales=Order::whereDate('date_of_sale','=',Carbon::now()->format('Y-m-d'))->get()->sum('total_payment');
        $saleMonth=Order::whereMonth('date_of_sale',date('m'))->get()->count("id");
        $totalsaleMonth=Order::whereMonth('date_of_sale',date('m'))->get()->sum("total_payment");
        return view('home',compact('productCount','customerCount','saleDay','totalDaySales','saleMonth','totalsaleMonth'));
    }
}
