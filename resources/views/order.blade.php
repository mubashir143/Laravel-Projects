<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container my-5">
    <div class="card shadow-sm p-4">
      <h3 class="mb-4 text-center">Customer Checkout</h3>

      <form action="{{ route('account.order.submit') }}" method="POST">
        <!-- CSRF (for Laravel) -->
         @csrf

        <!-- Customer Name -->
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
        </div>

        <!-- Phone Number -->
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" name="number" id="phone" placeholder="Enter your phone number" required>
        </div>

        <!-- Address -->
        <div class="mb-3">
          <label for="address" class="form-label">Shipping Address</label>
          <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter your full shipping address" required></textarea>
        </div>

        <!-- Payment Method -->
        <div class="mb-3">
          <label class="form-label">Payment Method</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="Cash on Delivery" checked>
            <label class="form-check-label" for="cod">Cash on Delivery</label>
          </div>
        </div>
        <input type="hidden" name="user_id" id="" value="{{ Auth::guard('web')->user()->id}}" >

        <input type="hidden" name="product_id" id="" value="{{ $products->id }}" >

        <!-- Submit -->
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Place Order</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
