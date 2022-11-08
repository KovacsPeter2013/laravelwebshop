
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">Kezdőlap</a></li>
					<li class="item-link"><span>Pénztár</span></li>
				</ul>
			</div>
			
				<form wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">

				<div class=" main-content-area">				
				<div class="row">					
					<div class="col-md-12">
			         <div class="wrap-address-billing">
					<h3 class="box-title">Számlázási cím</h3>
					<div class="billing-address">
						<p class="row-in-form">
							<label for="fname">Vezetéknév<span>*</span></label>
							<input  type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">

							@error('firstname')<span class="text-danger">{{$message}}</span>@enderror


						</p>
						<p class="row-in-form">
							<label for="lname">Keresztnév<span>*</span></label>
							<input  type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
						</p>
						<p class="row-in-form">
							<label for="email">Email Cím:<span>*</span></label>
							<input  type="email" name="email" value="" placeholder="Email cím" wire:model="email">
							
						</p>
						<p class="row-in-form">
							<label for="phone">Telefonszám:<span>*</span></label>
							<input type="number" name="phone" value="" placeholder="Telefonszám" wire:model="mobil">
							@error('mobil')<span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="add">Line 1:</label>
							<input  type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
							@error('line1')<span class="text-danger">{{$message}}</span>@enderror
						</p>

					
						<p class="row-in-form">
							<label for="country">Ország<span>*</span></label>	
							<input  type="text" name="country" value="" placeholder="United States" wire:model="country">
							@error('country')<span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="zip-code">Irányítószám/ ZIP:</label>
							<input  type="number" name="zip-code" value="" placeholder="Irányítószám" wire:model="zipcode">
							@error('zipcode')<span class="text-danger">{{$message}}</span>@enderror
						</p>
		                 <p class="row-in-form">
							<label for="city">Megye<span>*</span></label>
							<input type="text" name="city" value="" placeholder="Megye"  wire:model="province">
							@error('province')<span class="text-danger">{{$message}}</span>@enderror
						</p>



						<p class="row-in-form">
							<label for="city">Város/Település<span>*</span></label>
							<input type="text" name="city" value="" placeholder="Város"  wire:model="city">
							@error('city')<span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form fill-wife">
					
							<label class="checkbox-field">
								<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
								<span>Szállítás más címre?</span>
							</label>
						</p>					
					</div>
				</div>
			</div>
						@if($ship_to_different)
					   <div class="col-md-12">	
			         <div class="wrap-address-billing">
					<h3 class="box-title">Szállítási cím</h3>
					<div class="billing-address">
						<p class="row-in-form">
							<label for="fname">Vezetéknév<span>*</span></label>
							<input  type="text" name="fname" value="" placeholder="Vezetéknév"  wire:model="shipping_firstname">
							@error('shipping_firstname')<span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="lname">Keresztnév<span>*</span></label>
							<input  type="text" name="lname" value="" placeholder="Keresztnév"  wire:model="shipping_lastname">
							@error('shipping_lastname')<span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="email">Email Cím:<span>*</span></label>
							<input  type="email" name="email" value="" placeholder="Email Cím"  wire:model="shipping_email">
							@error('shipping_email')<span class="text-danger">{{$message}}</span>@enderror
							
						</p>
						<p class="row-in-form">
							<label for="phone">Telefonszám:<span>*</span></label>
							<input type="number" name="phone" value="" placeholder="Telefonszám"  wire:model="shipping_mobil">
							@error('shipping_mobil')<span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="add">Utca:</label>
							<input  type="text" name="add" value="" placeholder="Utca"  wire:model="shipping_line1">
							@error('shipping_line1')<span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="country">Ország<span>*</span></label>
							<input  type="text" name="country" value="" placeholder="Ország"  wire:model="shipping_country">
							@error('shipping_country')<span class="text-danger">{{$message}}</span>@enderror
						</p>

						<p class="row-in-form">
							<label for="country">Megye<span>*</span></label>
							<input  type="text" name="country" value="" placeholder="Megye"  wire:model="shipping_province">
							@error('shipping_province')<span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="zip-code">Irányítószám/ ZIP:</label>
							<input  type="number" name="zip-code" value="" placeholder="Your postal code"  wire:model="shipping_zipcode">
							@error('shipping_zipcode')<span class="text-danger">{{$message}}</span>@enderror
						</p>
						<p class="row-in-form">
							<label for="city">Város/Település<span>*</span></label>
							<input type="text" name="city" value="" placeholder="City name" wire:model="shipping_city">
							@error('shipping_city')<span class="text-danger">{{$message}}</span>@enderror
						</p>
								
					  </div>
				    </div>
			     </div>
			     @endif
				

				</div>

				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
						<p class="summary-info"><span class="title">Check / Money order</span></p>
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
								<span>Fizetés utánvéttel</span>
								<span class="payment-desc">Ide valamit majd ki kell találni</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
								<span>Fizetés online</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
								@error('paymentmode')<span class="text-danger">{{$message}}</span>@enderror
						</div>

						@if(Session::has('checkout'))
						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{Session::get('checkout')['total']}}</span></p>
						@endif



						@if($errors->isEmpty())
						<div wire:ignore id="processing" style="font-size: 22px; margin-bottom: 20px; padding-left: 37px; color: green; display: none;">
							
							<i class="fa fa-spinner fa-pulse fa-fw"></i>
							<span>Folyamatban...</span>
						</div>

						@endif

						<button type="submit" class="btn btn-medium">Rendelés leadása</button>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed $0</span></p>			
						
					
						
						
					</div>
				</div>
				</form>
			</div>
		</div>

	</main>

