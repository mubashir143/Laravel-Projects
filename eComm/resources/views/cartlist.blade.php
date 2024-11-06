@extends('master')
@section('content')

<div class="custom-product">
   <div class="col-sm-10">
    <div class="trending-wrapper">
        <h2>Cart List</h2>
        <a href="ordernow" class="btn btn-success">Order Now</a><br><br>
        <div class="">
            @foreach ($products as $item)
                <div class="row search-items cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{ $item->id }}">
                            <img class="trending-img" src="{{ $item->gallery }}" class="card-img-top" alt="...">
                        </a>
                    
                    </div>

                    <div class="col-sm-3">
                            <div class="">
                                <h5>{{ $item->name }}</h5>
                                <h6>{{ $item->description }}</h6>
                            </div>
                    </div>

                    <div class="col-sm-3">
                        <a href="removecart/{{ $item->cart_id }}" class="btn btn-warning">Remove From Cart</a>
                    </div>
                    
                </div>
            @endforeach

            <a href="ordernow" class="btn btn-success">Order Now</a>
   </div>
   </div>
</div>



@endsection
