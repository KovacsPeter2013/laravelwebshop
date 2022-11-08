<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;





class AdminCouponsComponent extends Component{




	public function deleteCoupon($coupin_id){

		$coupon = Coupon::find($coupin_id);
		$coupon->delete();
		session()->flash('message', 'Kupon sikeresen törölve');

	}





    public function render(){


    	$coupons = Coupon::all();

        return view('livewire.admin.admin-coupons-component', ['coupons'=>$coupons])->layout('layouts.base');
    }
}
