@extends('master')
@section('content')

<div class="container mt-5">
    <h2 class="text-center">Upload Your Product Details</h2>
    <form action="{{ route('addproduct')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Title" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control" id="name" placeholder="Enter the Details of Product..." required></textarea>
        </div>

        
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="text" name="price" class="form-control" id="email" placeholder="In Rupees" required>
        </div>

        
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" class="form-control" id="category" required>
                <option value="" disabled selected>Select a category</option>
                <option value="mobile">Mobiles</option>
                <option value="fashion">Fashion</option>
                <option value="cloth">Cloths</option>
                <option value="accessory">Accessories</option>
                <option value="sport">Sports</option>
            </select>
        </div>

        <!-- Image upload field -->
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="gallery" class="form-control" id="image" accept="image/*" required>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
