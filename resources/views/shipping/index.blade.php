<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Shipping</h1>

	<ul>
		@forelse ($shipments as $shipment)
			<li> 
				<a href="{{ $shipment->path() }}">{{ $shipment->name }}</a>
			</li>
		@empty
				<li>No shipment yet</li>
		@endforelse
	</ul>

</body>
</html>