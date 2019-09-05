<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Shipping</h1>

	<ul>
		@foreach ($shippings as $shipping)
			<li> {{ $shipping->name }} </li>
		@endforeach
	</ul>

</body>
</html>