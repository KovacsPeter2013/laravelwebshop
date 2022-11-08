<!DOCTYPE html>
<html lang="eng">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rendelés Megerősítése</title>
</head>
<body>

<p>Hi {{$order->firstname}} {{$order->lastname}}</p>
<p>Sikeres rendelés!</p>
<br>

<table style="width: 600px; text-align: right;">
	<thead>
		<tr>
			<th>Fotó</th>
			<th>Termék neve</th>
			<th>Darabszám</th>
			<th>Végösszeg</th>
		</tr>
	</thead>
	
	<tbody>
		@foreach($order->orderItems as $item)

		<tr>
			<td><img src="{{asset('assets/images/product')}}/{{$item->product->image}}" width="100"/></td>
			<td>{{$item->product->name}}</td>
			<td>{{$item->quantity}}</td>
			<td>{{$item->product->name}}</td>
			<td>{{$item->price * $item->quantity}}</td>
		</tr>

		@endforeach

		<tr>
			<td colspan="3" style=" border-top: 1px solid #ccc;"></td>
			<td style="font-size: 15px; font-weight: bold; border-top: 1px solid #ccc;">Részöszeg: {{$order->subtotal}} Ft.</td>
		</tr>

		<tr>
			<td colspan="3"></td>
			<td style="font-size: 15px; font-weight: bold;">Adó: {{$order->tax}} Ft.</td>
		</tr>

		<tr>
			<td colspan="3"></td>
			<td style="font-size: 15px; font-weight: bold;">Szállítás: Ingyenes kiszállítás</td>
		</tr>

		<tr>
			<td colspan="3"></td>
			<td style="font-size: 22px; font-weight: bold;">Végösszeg: {{$order->total}} Ft.</td>
		</tr>
	</tbody>
</table>


</body>
</html>