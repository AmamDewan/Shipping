@extends('layouts.app', ['title' => __('Shipment')])

@section('content')
	@include('users.partials.header', ['title' => __('Shipment')])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Shipment Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('/shipment/create') }}" class="btn btn-sm btn-primary">{{ __('Create') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    	<ul>
							@forelse ($shipments as $shipment)
								<li>
									<a href="{{ $shipment->path() }}">{{ $shipment->name }}</a>
								</li>
							@empty
									<li>No shipment yet</li>
							@endforelse
						</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
