<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class AdminDashboardComponent extends Component{




    public function render(){

    	$orders       = Order::orderBy('created_at', 'DESC')->get()->take(10);
    	$totalSales   = Order::where('status', 'delivered')->count();
    	$totalRevenue = Order::where('status', 'delivered')->count();

    	$todaySales	  = Order::where('status', 'delivered')->whereDate('created_at', Carbon::today())->count();
    	$todayRevenue = Order::where('status', 'delivered')->whereDate('created_at', Carbon::today())->count();



        return view('livewire.admin.admin-dashboard-component', [

        	'orders'       =>$orders,
        	'totalSales'   =>$totalSales,
        	'totalRevenue' => $totalRevenue,
        	'todaySales'   => $todaySales,
        	'todayRevenue' => $todayRevenue



        ])->layout('layouts.base');
    }
}
