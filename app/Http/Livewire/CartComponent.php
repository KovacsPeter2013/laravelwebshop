<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Coupon;
use Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{





	public $haveCouponCode;
	public $couponCode;
	public $discount;
	public $subtotalAfterDiscount;
	public $taxAfterDiscount;
	public $totalAfterDiscount;




	public function increaseQuantity($rowId){

		$product = Cart::get($rowId);
		$qty = $product->qty + 1;

		Cart::update($rowId, $qty);
		//redirect()->route('product.cart'); // kénytelen voltam újra frissíteni az oldalt, darabszám változtatás után, mert különben bug-os (eltűnik a gombnyomásra minden, csak refresh után jelennek meg ) Most már működik. Azért nem müködött mert a html komment volt a fájlban: <!-- --> és így már van, hogy nem müködik a blade....


		$this->emitTo('cart-count-component', 'refreshComponent');
	}


	public function decreaseQuantity($rowId){

		$product = Cart::get($rowId);
		$qty = $product->qty - 1;

		Cart::update($rowId, $qty);

		$this->emitTo('cart-count-component', 'refreshComponent');

	}




	public function destroy($rowId){ // Törlés egyenként az x-gombra kattintva

		Cart::remove($rowId);
		$this->emitTo('cart-count-component', 'refreshComponent');
		
		session()->flash('success_message', 'Termék törölve a kosárból');
	}




	public function destroyAll(){
		
		Cart::destroy();
		$this->emitTo('cart-count-component', 'refreshComponent');
		
		session()->flash('success_message', 'Összes termék törölve a kosárból');
	}





	public function applyCouponCode(){
		
		$coupon = Coupon::where('code', $this->couponCode)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::subtotal())->first();

		if (!$coupon) {
			session()->flash('coupon_message','Kupon kód érvénytelen' );
			return;
		}


			session()->put('coupon', [

					'code' =>$coupon->code,
					'type' =>$coupon->type,
					'value' =>$coupon->value,
					'cart_value' =>$coupon->cart_value

			]);

	}




	public function calculateDiscount(){


		if (session()->has('coupon')) {
			
			if (session()->get('coupon')['type'] == 'fixed') {
				
				$this->discount = session()->get('coupon')['value'];
			}else{

				$this->discount = (Cart::subtotal() * session()->get('coupon')['value']) / 100;
			}

			 $this->subtotalAfterDiscount = Cart::subtotal() - $this->discount;
			 $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;// config('cart.tax') = A konfig mappában a cart.php-ban lévő tax:21


			 $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
		}


	}




	public function removeCoupon(){

		session()->forget('coupon');
	}




	// Ez az a funkció ami ellenőrzi, hogy be e van lépve vagy sem, amikor a pénztárhoz akar menni
	public function checkout(){


		if (Auth::check()) {
			
			return redirect()->route('checkout');
		}else{

			return redirect()->route('login');
		}
	}





	public function setAmountForCheckout(){


		if (!Cart::count() > 0) {
			
			session()->forget('checkout');
			return;
		}


	// Figyeli, hogy van e kupon a vásárlónál, és ahhoz mérten állítgatja be a sessiont
		if (session()->has('coupon')) {
			
			session()->put('checkout', [

				'discount' => $this->discount,
				'subtotal' => $this->subtotal,
				'tax'      => $this->taxAfterDiscount,
				'total'    => $this->totalAfterDiscount

			]);

		}else{
			session()->put('checkout', [

				'discount' => $this->discount,
				'subtotal' => Cart::subtotal(),
				'tax'      => Cart::tax(),
				'total'    => Cart::total()


			]);

		}
	}



    public function render(){


    	if (session()->has('coupon')) {
    		
    		// cart_value az ami az adatbázisban meg van adva érték
    		if (Cart::subtotal() < session()->get('coupon')['cart_value']) {
    			

    			session()->forget('coupon');

    		}else{

    			$this->calculateDiscount();


    		}

    	}

    	$this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');

    }
}
