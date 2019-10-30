@extends('layouts.app', ['title' => __('Quotation')])

@section('content')
    @include('users.partials.header', ['title' => __('Quotation')])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Quotation Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('/quotation/create') }}" class="btn btn-sm btn-primary">{{ __('Create') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse($quotes as $quote)
                            <img src="img/{{$quote->product_image}}" alt="">
                            <p>Quantity: {{$quote->quantity}}</p>
                        @empty
                            No quote yet
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
