@extends ('layouts.app')

@section('content')


    <form method="POST" action="/shipping">
        @csrf
        <h1 class="heading is-1">Create a Shipment</h1>

        <div class="field">
            <label class="label" for="name">Shipping Name</label>

            <div class="control">
                <input type="text" class="input" name="name" placeholder="Shipping Name">
            </div>
        </div>

        <div class="field">
            <label class="label" for="conversion_rate">RMB Rate</label>

            <div class="control">
                <input type="text" class="input" name="conversion_rate" placeholder="RMB Rate">
            </div>
        </div>

        <div class="field">
            <label class="label" for="number">Phone Number</label>

            <div class="control">
                <input type="text" class="input" name="number" placeholder="Phone Number">
            </div>
        </div>

        <div class="field">
            <label class="label" for="email">Email</label>

            <div class="control">
                <input type="text" class="input" name="email" placeholder="Email">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create</button>
                <a href="/shipment">Cancel</a>
            </div>
        </div>


    </form>


@endsection
