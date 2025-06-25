@extends('layouts.app')


@section('content')



<div class="container mt-4">

    <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    </div>
    @endif
    <h3>Edit Ground</h3>
    <form method="POST" action="{{ route('ground.groundupdate', $ground->id) }}">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $ground->name }}">
        </div>

       
        <!-- Location -->
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $ground->location }}">
        </div>

        <!-- Latitude / Longitude -->
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" name="latitude" class="form-control" value="{{ $ground->latitude }}">
        </div>
        <div class="mb-3">
            <label for="logitude" class="form-label">Longitude</label>
            <input type="text" name="logitude" class="form-control" value="{{ $ground->logitude }}">
        </div>

        <!-- Categories -->
        <div class="mb-3">
            <label for="categories" class="form-label">Categories</label>
            <select name="categories[]" class="form-select" multiple id="categories">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ in_array($category->id, $ground->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
                
            </select>
        </div>

        <!-- Times -->
        <div class="mb-3">
            <label for="openat" class="form-label">Open At</label>
            <input type="time" name="openat" class="form-control" value="{{ $ground->openat }}">
        </div>
        <div class="mb-3">
            <label for="closeat" class="form-label">Close At</label>
            <input type="time" name="closeat" class="form-control" value="{{ $ground->closeat }}">
        </div>

        <!-- Pricing -->
        <div class="mb-3">
            <label for="baseprice" class="form-label">Base Price</label>
            <input type="text" name="baseprice" class="form-control" value="{{ $ground->baseprice }}">
        </div>

        <div class="mb-3">
            <label for="discounttype" class="form-label">Discount Type</label>
            <select name="discounttype" class="form-select">
                <option value="percentage" {{ $ground->discounttype == 'percentage' ? 'selected' : '' }}>%</option>
                <option value="fix" {{ $ground->discounttype == 'fix' ? 'selected' : '' }}>Fix</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="discountprice" class="form-label">Discount Price</label>
            <input type="text" name="discountprice" class="form-control" value="{{ $ground->discountprice }}">
        </div>

        <!-- Checkboxes -->
        <div class="form-check">
            <input type="checkbox" name="ispopular" class="form-check-input" {{ $ground->ispopular ? 'checked' : '' }}>
            <label class="form-check-label">Is Popular</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="isactive" class="form-check-input" {{ $ground->isactive ? 'checked' : '' }}>
            <label class="form-check-label">Is Active</label>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary mt-3 mb-3">Update</button>
    </form>
</div>

<!-- Include Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#categories').select2({
            placeholder: "Select Categories",
            allowClear: true
        });
    });
</script>
@endsection
