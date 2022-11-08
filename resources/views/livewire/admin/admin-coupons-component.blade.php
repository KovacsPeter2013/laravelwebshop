<div>
	
    <div class="container" style="padding: 30px 0; ">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<div class="row">
                        Minden Kupon            
                    </div>
                    <div class="row">
                        <a href="{{route('admin.addcoupons')}}" class="btn btn-success pull-right">Új hozzáadása</a>
                    </div>
    			</div>
    			<div class="panel-body">

                    @if(Session::has('message'))

                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif

    				<table class="table table-striped">
    					<thead>
    						<tr>
    							<th>Id</th>
    							<th>Kuponkód</th>
    							<th>Kupon típus</th>
    							<th>Kupon érték</th>
    							<th>Kosár érték</th>
                                <th>Lejárati idő</th>
                                <th>Művelet</th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach ($coupons as $coupon)

    						<tr>
    							<td>{{$coupon->id}}</td>
    							<td>{{$coupon->code}}</td>
    							<td>{{$coupon->type}}</td>

    							@if($coupon->type == 'fixed')
    							
    							  <td>{{$coupon->value}}</td>
    							  
    							  @else
    							  <td>{{$coupon->value}} % </td>

    							  @endif

    							<td>{{$coupon->cart_value}}</td>
                                <td>{{$coupon->expiry_date}}</td>
    							<td>
                                    <a href="{{route('admin.editcoupons', ['coupon_id' =>$coupon->id])}}"><i class="fa fa-edit fa-2x"></i></a>      
                                    <a href="#" onclick="confirm('Biztosan törlöd ezt a kupont?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})" style="margin-left: 10px;"><i class="fa fa-times fa-2x text-danger"></i></a>               
                                </td>
    						</tr>

    						@endforeach
    					</tbody>    					
    				</table>
    				
    			</div>
    		</div>
    	</div>
    </div>
</div>

