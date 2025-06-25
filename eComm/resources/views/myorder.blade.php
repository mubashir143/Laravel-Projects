@extends('master')
@section('content')

<div class="custom-product">
   <div class="col-sm-10">
    <div class="trending-wrapper">
        <h2>Order List</h2>
        <div class="">
            @foreach ($orders as $item)
                <div class="row search-items cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{ $item->id }}">
                            <img class="trending-img" src="{{ $item->gallery }}" class="card-img-top" alt="...">
                        </a>
                    
                    </div>

                    <div class="col-sm-3">
                            <div class="">
                                <h5>{{ $item->name }}</h5>
                                <h6>Delivery Status: {{ $item->status }}</h6>
                                <h6>Payment Status: {{ $item->payment_status }}</h6>
                                <h6>Payment Method: {{ $item->payment_method }}</h6>
                                <h6>Delivery Address: {{ $item->address }}</h6>
                                <h6>Price: {{ $item->price }}</h6>
                            </div>
                    </div>

                    {{-- <div class="col-sm-3">
                        <a href="removecart/{{ $item->cart_id }}" class="btn btn-warning">Remove From Cart</a>
                    </div> --}}
                    
                </div>
            @endforeach

   </div>
   </div>
</div>



@endsection
