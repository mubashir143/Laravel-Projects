
@extends('layouts.app')
@section('content')
   

<form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light w-50 mx-auto mt-5">
  @csrf

  <h4 class="mb-4 text-center">Add New Product</h4>

  <!-- Product Title -->
  <div class="mb-3">
    <label for="title" class="form-label">Product Title</label>
    <input type="text" name="name" id="title" class="form-control" placeholder="Enter product title" required>
  </div>

  <!-- Product Description -->
  <div class="mb-3">
    <label for="description" class="form-label">Product Description</label>
    <textarea name="desc" id="description" rows="4" class="form-control" placeholder="Enter product description" required></textarea>
  </div>

  <!-- Price -->
  <div class="mb-3">
    <label for="price" class="form-label">Price ($)</label>
    <input type="number" name="price" id="price" step="0.01" class="form-control" placeholder="Enter product price" required>
  </div>

    <div class="mb-3">
    <label class="form-label">Category</label>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle w-100 text-start" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <span id="selected-category-label">-- Select Category --</span>
        </button>

        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item category-option" href="#" data-value="Electronics">Electronics</a></li>
        <li><a class="dropdown-item category-option" href="#" data-value="Mobile">Mobile</a></li>
        <li><a class="dropdown-item category-option" href="#" data-value="Computer">Computer</a></li>
        </ul>
    </div>

    <!-- Hidden input to hold selected category -->
    <input type="hidden" name="category" id="selected-category" required>
    </div>

  <!-- Product Image -->
  <div class="mb-3">
    <label for="image" class="form-label">Product Image</label>
    <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
  </div>

  <!-- Submit -->
  <div class="d-grid">
    <button type="submit" class="btn btn-primary">Upload Product</button>
  </div>
</form>

<!-- JavaScript to update the hidden input and label -->
<script>
  document.querySelectorAll('.category-option').forEach(function(option) {
    option.addEventListener('click', function(e) {
      e.preventDefault();
      const selectedValue = this.getAttribute('data-value');
      document.getElementById('selected-category').value = selectedValue;
      document.getElementById('selected-category-label').textContent = selectedValue;
    });
  });
</script>

@endsection