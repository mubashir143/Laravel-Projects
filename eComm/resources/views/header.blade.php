<?php
use App\Http\Controllers\ProductController;
$total = 0;
if(Session::has('user')){
    $total = ProductController::cartItem();
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">E-Commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myorder">Orders</a>
                </li>
                <li>
                    <form class="d-flex" action="search">
                        <input class="form-control me-2 search-box" type="search" placeholder="Search...." aria-label="Search" name="query">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
            </ul>
            

            <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('productlist') }}">Add Products</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="cartList">Cart({{ $total }})</a>
                    </li>
                
                @if(Session::has('user'))
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Session::get('user')['name']}}
                    </button>
                    <div class="dropdown-menu">
                    <li class="nav-item">
                        <a class="dropdown-item nav-link" href="logout">Logout</a>
                    </li>
                </div>
                </div>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
