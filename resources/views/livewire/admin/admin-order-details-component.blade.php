<div>
   <div class="container" style="padding: 30px 0;">
   	<div class="row">
   		<div class="col-md-12">
   			<div class="panel panel-default">
   				 <div class="panel-heading">
   					    <div class="row">
   							<div class="col-md-6">
   									Rendelési adatok
   							</div>

   							<div class="col-md-6">
   								<a href="{{route('admin.orders')}}" class="btn btn-success pull-right">Összes rendelés</a>
   							</div>
   						</div>
   					</div>

   					<div class="panel-body">
   						<table class="table">
   							<tr>
   								<th>Rendelés azonosító</th>
   								<td>{{$order->id}}</td>

   							    <th>Rendelés időpotnja</th>
   								<td>{{$order->created_at}}</td>

   								<th>Státusz</th>
   								<td>{{$order->status}}</td>

   								@if($order->status == 'delivered')
   							    <th>Szállítás időpontja</th>
   								<td>{{$order->delivered_date}}</td>

   								@elseif($order->status == 'canceled')

         						<th>Lemondás időpontja</th>
   								<td>{{$order->canceled_date}}</td>

   								@endif

   							</tr>
   						</table>
   					</div>


   			</div>
   		</div>
   	</div>
   		<div class="row">
   			<div class="col-md-12">
   				<div class="panel panel-default">
   					<div class="panel-heading">
   					    <div class="row">
   							<div class="col-md-6">
   									Számlázási adatok
   							</div>

   							<div class="col-md-6">
   								
   							</div>
   						</div>
   					</div>

   					<div class="panel-body">
   				      <div class="wrap-iten-in-cart">	
					
					<h3 class="box-title">Products Name</h3>
					<ul class="products-cart">

						@foreach($order->orderItems as $item)
						<li class="pr-cart-item">
						 	<div class="product-image">
								<figure>
									<img src="{{asset('assets/images/products')}}/{{$item->product->image}}" alt="{{$item->product->name}}">
								</figure>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="{{

								route('product.details', ['slug' => $item->product->slug])}}">{{$item->product->name}}</a>
							</div>
							<div class="price-field produtc-price"><p class="price">{{$item->product->price}}</p></div>
							<div class="quantity">
								{{$item->quantity}}
							</div>
							<div class="price-field sub-total"><p class="price">${{$item->price * $item->quantity}}</p></div>
				
						</li>
					@endforeach														
					</ul>					
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Rendelés összegzés</h4>
						 <p class="summary-info"><span class="title">Részösszeg</span><b class="index">{{$order->subtotal}}</b></p>
						 <p class="summary-info"><span class="title">Adó</span><b class="index">{{$order->tax}}</b></p>
						 <p class="summary-info"><span class="title">Szállítás</span><b class="index">Ingyenes szállítás</b></p>
						 <p class="summary-info"><span class="title">Total</span><b class="index">{{$order->total}}</b></p>
					</div>
				</div>
   	  		 </div>
   			</div>
   		</div>
   		</div>

     	<div class="row">
   			<div class="col-md-12">
   				<div class="panel panel-default">
   					<div class="panel-heading">
   						<strong>Számlázási adatok</strong>
   					</div>

   					<div class="panel-body">
   						
   						<table class="table">
   							<tr>
   								<th>Vezetéknév</th>
   								<td>{{$order->firstname}}</td>

   								<th>Keresztnév</th>
   								<td>{{$order->lastname}}</td>
   							</tr>


   							<tr>
   								<th>Utca 1</th>
   								<td>{{$order->line1}}</td>
   								<th>Utca 2</th>
   								<td>{{$order->line2}}</td>
   							</tr>


   							 <tr>
   								<th>Város</th>
   								<td>{{$order->city}}</td>
   								<th>Település</th>
   								<td>{{$order->province}}</td>
   							</tr>


   							 <tr>
   								<th>Ország</th>
   								<td>{{$order->country}}</td>
   								<th>Irányítószám</th>
   								<td>{{$order->zipcode}}</td>
   							</tr>
   						</table>
   					</div>
   				</div>
   			</div>
   		</div>

   		@if($order->is_shipping_different)
   		 <div class="row">
   			<div class="col-md-12">
   				<div class="panel panel-default">
   					<div class="panel-heading">
   						<strong>Szállítási adatok</strong><span style="color: red;"><strong> Ide kéri a kiszállítást!</strong></span>
   					</div>

   					<div class="panel-body">
   					      <table class="table">
   							<tr>
   								<th>Vezetéknév</th>
   								<td>{{$order->shipping->firstname}}</td>

   								<th>Keresztnév</th>
   								<td>{{$order->shipping->lastname}}</td>
   							</tr>


   							<tr>
   								<th>Utca 1</th>
   								<td>{{$order->shipping->line1}}</td>
   								<th>Utca 2</th>
   								<td>{{$order->shipping->line2}}</td>
   							</tr>


   							 <tr>
   								<th>Város</th>
   								<td>{{$order->shipping->city}}</td>
   								<th>Település</th>
   								<td>{{$order->shipping->province}}</td>
   							</tr>


   							 <tr>
   								<th>Ország</th>
   								<td>{{$order->shipping->country}}</td>
   								<th>Irányítószám</th>
   								<td>{{$order->shipping->zipcode}}</td>
   							</tr>
   						</table>
   					</div>
   				</div>
   			</div>
   		</div>
   		@endif

   		  <div class="row">
   			<div class="col-md-12">
   				<div class="panel panel-default">
   					<div class="panel-heading">
   						Tranzakció adatok
   					</div>

   					<div class="panel-body">
   						<table class="table">
   							<tr>
   								<th>Tranzakció mód</th>
   								<td>{{$order->transaction->mode}}</td>
   							</tr>

   								<tr>
   								<th>Státusz</th>
   								<td>{{$order->transaction->status}}</td>
   							</tr>

   								<tr>
   								<th>Tranzakció időpontja</th>
   								<td>{{$order->transaction->created_at}}</td>
   							</tr>
   						</table>	
   					</div>
   				</div>
   			</div>
   		</div>
   </div>
</div>
