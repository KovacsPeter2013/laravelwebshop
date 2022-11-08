<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;	
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;







class CheckoutComponent extends Component{




    public $ship_to_different;
    public $firstname;
    public $lastname;
    public $email;
    public $mobil;
    public $line1;
   
    public $city;
    public $province;
    public $country;
    public $zipcode;



    public $shipping_firstname;
    public $shipping_lastname;
    public $shipping_email;
    public $shipping_mobil;
    public $shipping_line1;
  
    public $shipping_city;
    public $shipping_province;
    public $shipping_country;
    public $shipping_zipcode;

    public $paymentmode;
    public $thankyou;




    public function updated($fields){ // Számlázási részre


    	$this->validateOnly($fields, [

            'firstname'  => 'required',
		    'lastname'   => 'required',
		    'email'      => 'required | email',
		    'mobil'      => 'required | numeric',
		    'line1'      => 'required',		 
		    'city'       => 'required',
		    'province'   => 'required',
		    'country'    => 'required',
		    'zipcode'    => 'required'
    	]);


    	if ($this->ship_to_different) {	// Szállítási részre
    		

    	     $this->validateOnly($fields,[

		    'shipping_firstname' => 'required',
		    'shipping_lastname'  => 'required',
		    'shipping_email'     => 'required | email',
		    'shipping_mobil'     => 'required | numeric',
		    'shipping_line1'     => 'required',		 
		    'shipping_city'      => 'required',
		    'shipping_province'  => 'required',
		    'shipping_country'   => 'required',
		    'shipping_zipcode'   => 'required'

    	]);


    	}

    }



    public function placeOrder(){


    	$this->validate([

		    'firstname'   => 'required',
		    'lastname'    => 'required',
		    'email'       => 'required | email',
		    'mobil'       => 'required | numeric',
		    'line1'       => 'required',		 
		    'city'        => 'required',
		    'province'    => 'required',
		    'country'     => 'required',
		    'zipcode'     => 'required',
		    'paymentmode' => 'required'

    	]);


    		$order = new Order();
    		$order->user_id = Auth::user()->id;
    		$order->subtotal = session()->get('checkout')['subtotal'];
    		$order->discount = isset(session()->get('checkout')['discount']) ? session()->get('checkout')['discount'] : '0';
    		$order->total = session()->get('checkout')['total'];

    		$order->firstname = $this->firstname;
		    $order->lastname = $this->lastname;
		    $order->email = $this->email;
		    $order->mobil = $this->mobil;
		    $order->line1 = $this->line1;
		    $order->tax = '54';
		  
		    $order->city = $this->city;
		    $order->province = $this->province;
		    $order->country = $this->country;
		    $order->zipcode = $this->zipcode;
		    $order->status = 'ordered';
		    $this->sendOrderConfirmationMail($order);
		    $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
		
		    $order->save();
		    $this->thankyou = 1;


	    	if ($this->paymentmode == 'cod') {

		    		$transaction = new Transaction();
		    		$transaction->user_id = Auth::user()->id;
		    		$transaction->order_id = $order->id;
		    		$transaction->mode = 'cod';
		    		$transaction->status = 'pending';
		    		$transaction->save();		    		
		    		}

			



		    foreach (Cart::content() as $item) {
		    	

		    	$orderItem = new OrderItem();
		    	$orderItem->product_id = $item->id;
		    	$orderItem->order_id = $order->id;
		    	$orderItem->price = $item->price;
		    	$orderItem->quantity = $item->qty;
		    	//dd($orderItem);	    	
		    	$orderItem->save();



		    }



		  


		    $this->validate([

		    'shipping_firstname' => 'required',
		    'shipping_lastname'  => 'required',
		    'shipping_email'     => 'required | email',
		    'shipping_mobil'     => 'required | numeric',
		    'shipping_line1'     => 'required',		 
		    'shipping_city'      => 'required',
		    'shipping_province'  => 'required',
		    'shipping_country'   => 'required',
		    'shipping_zipcode'   => 'required'

    	]);

	    




		    $shipping = new Shipping();
		    $shipping->order_id = $order->id;
		    $shipping->firstname = $this->shipping_firstname;
		    $shipping->lastname = $this->shipping_lastname;
		    $shipping->mobil = $this->shipping_mobil;
		    $shipping->email = $this->shipping_email;
		    $shipping->line1 = $this->shipping_line1;
		   
		    $shipping->city = $this->shipping_city;
		    $shipping->province = $this->shipping_province;
		    $shipping->country = $this->shipping_country;
		    $shipping->zipcode = $this->shipping_zipcode;
		    //dd($shipping);
		    $shipping->save();    	


		     $this->thankyou = 1;
    		Cart::destroy();
    		session()->forget('checkout');


    		$this->sendOrderConfirmationMail($order);

	
        }


        public function sendOrderConfirmationMail($order){


        	Mail::to($order->email)->send(new OrderMail($order));
        	

        }


        public function verifyForCheckout(){

        	if (!Auth::check()) {

        		return redirect()->route('login');

        	}else if($this->thankyou){

        		return redirect()->route('thankyou');

        	}else if(!session()->get('checkout')){

        		return redirect()->route('product.cart');

        	}
        }



    public function render(){


    	$this->verifyForCheckout();

        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
