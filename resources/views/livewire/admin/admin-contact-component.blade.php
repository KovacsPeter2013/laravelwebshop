<div>
   <div class="container" style="padding: 30px 0;">
   	<style>
   		nav svg{
   			height: 20px;
   		}

   		nav .hidden{
   			display: block !important;
   		}
   	</style>
   		<div class="row">
   			<div class="col-md-12">
   				<div class="panel panel-default">
   					<div class="panel-heading">
   						Kapcsolat üzenetek
   					</div>

   					<div class="panel-body">
   						<table class="table table-striped">
   							<thead>
   								<tr>
   									<th>#</th>
   									<th>Név</th>
   									<th>Email cím</th>
   									<th>Telefonszám</th>
   									<th>Üzenet</th>
   									<th>Dátum</th>
   								</tr>
   							</thead>

   							<tbody>
   								@php
   								$i = 1;
   								@endphp
   								@foreach($contacts as $contact)
   								<tr>
   									<td>{{$i++}}</td>
   									<td>{{$contact->name}}</td>
   									<td>{{$contact->email}}</td>
   									<td>{{$contact->phone}}</td>
   									<td>{{$contact->comment}}</td>
   									<td>{{$contact->created_at}}</td>
   								</tr>

   								@endforeach
   							</tbody>
   						</table>
   						{{$contacts->links()}}
   					</div>
   				</div>
   			</div>
   		</div>
   </div>
</div>
