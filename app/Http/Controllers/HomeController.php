<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\Client;

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
        $productoCount = Product::count();
        $date_order = Carbon::now();
        $date_order = $date_order ->format('Y-m-d');
        $customerCount = Client::where('status', '=', '1')->count();
        $orderCountDia = Order::whereDate('date_order', '=', Carbon::now()->format('Y-m-d'))->get()->count('id');

        return view('home');
    }
}
