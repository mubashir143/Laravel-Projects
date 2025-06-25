<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 11 Multi Auth</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
    .product-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: scale(1.03);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        z-index: 5;
    }
    </style>

</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-md bg-white shadow-lg">
    <div class="container">
      <a class="navbar-brand" href="#"><strong>Laravel Multi Auth</strong></a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
      </button>
      <!-- Dropdown -->
    <div class="dropdown">
      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown button
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Electronics</a></li>
        <li><a class="dropdown-item" href="#">Mobile</a></li>
        <li><a class="dropdown-item" href="#">Computer</a></li>
      </ul>
    </div>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hello, {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu border-0 shadow" aria-labelledby="accountDropdown">
                <li><a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Banner -->
  <section class="bg-primary text-white py-5">
    <div class="container text-center">
      <h1 class="display-4 fw-bold">Welcome to Our Store!</h1>
      <p class="lead">Find the best deals on electronics, mobiles, and more.</p>
      <a href="#shop" class="btn btn-light btn-lg mt-3">Shop Now</a>
    </div>
  </section>

  <!-- Product Grid -->
<div class="container my-5">
  <div class="card border-0 shadow">
    <div class="card-header bg-light">
      <h3 class="h5 pt-2">All Products</h3>
    </div>

    <div class="card-body">
      <div class="row g-4">
        @foreach($productelec as $item)
          <div class="col-6 col-sm-4 col-md-3">
            <a href="#" class="text-decoration-none text-dark">
              <div class="card product-card h-100 border-0 shadow-sm">
                <img src="{{ asset('uploads/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                <div class="card-body p-2">
                  <h6 class="card-title text-truncate">{{ $item->name }}</h6>
                  <p class="mb-1 fw-bold text-danger">
                    Rs.{{ $item->price }}
                    <small class="text-muted text-decoration-line-through">
                      Rs.{{ $item->original_price ?? ($item->price + 200) }}
                    </small>
                    <span class="badge bg-danger">
                      -{{ round((($item->original_price ?? ($item->price + 200)) - $item->price) / ($item->original_price ?? ($item->price + 200)) * 100) }}%
                    </span>
                  </p>
                  <small class="text-warning">
                    ★★★★☆ ({{ $item->ratings ?? rand(10, 999) }})
                  </small>

                  <a href="{{ route('account.order') }}" class="btn btn-primary sm">Buy Now</a>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>


  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
