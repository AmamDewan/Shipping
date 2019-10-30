@extends('layouts.app' , ['class' => 'bg-default'])
@section('content')
	<h1>{{ $shipment->name }}</h1>
	<div>	{{ $shipment->email }}</div>


@extends('layouts.app')
@section('content')
