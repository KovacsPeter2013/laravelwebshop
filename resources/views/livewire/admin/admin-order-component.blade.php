<div>
	<style>
		nav svg{
			height: 20px;
		}

		nav .hidden{
			display: block !important;
		}

		.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
         padding: 5px !important;

      }
	</style>
  <div class="container" style="padding: 30px 0;">
  	<div class="row">
  		<div class="col-md-12">
  			<div class="panel panel-default">
  				<div class="panel-heading">
  					
  					Összes rendelés
  				</div>

  				<div class="panel-body">

  					@if(Session::has('order_message'))

  					<div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
  					@endif
  					<table class="table table.striped">
  						<thead>
  							<tr>
  								<th>Rendelés id</th>
  								<th>Részösszeg</th>
  								<th>Diszkont</th>
  								<th>Tax</th>
  								<th>Total</th>
  								<th>Vezetéknév</th>
  								<th>Keresztnév</th>
  								<th>Mobil</th>
  								<th>Email</th>
  								<th>Irányítószám</th>
  								<th>Státusz</th>
  								<th>Rendelés dátuma</th>
  								<th colspan="2" class="text-center">Művelet</th>
  							</tr>
  						</thead>

  						<tbody>
  								@foreach($orders as $order)

  								<tr>
  									<td>{{$order->id}}</td>
  									<td>{{$order->subtotal}}</td>
  									<td>{{$order->discount}}</td>
  									<td>{{$order->tax}}</td>
  									<td>{{$order->total}}</td>
  									<td>{{$order->firstname}}</td>
  									<td>{{$order->lastname}}</td>
  									<td>{{$order->mobil}}</td>
  									<td>{{$order->email}}</td>
  									<td>{{$order->zipcode}}</td>
  									<td>{{$order->status}}</td>
  									<td>{{$order->created_at}}</td>
  									<td><a href="{{route('admin.orderdetails' , ['order_id' =>$order->id])}}" class="btn btn-info btn-sm">Részletes adatok</a></td>
  									<td>
  									<div class="dropdown">
  											<button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Státusz
  												<span class="caret"></span></button>
  												<ul class="dropdown-menu">
  													<li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}}, 'delivered')">Szállítva</a></li>
  													<li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}}, 'canceled')">Lemondva</a></li>
  												</ul>
  										</div>
  									</td>
  								</tr>
  								@endforeach
  						</tbody>
  					</table>
  					{{$orders->links()}}
  				</div>
  			</div>
  		</div>
  	</div>
  	
  </div>
</div>
