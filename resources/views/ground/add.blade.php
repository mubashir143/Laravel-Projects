@extends('layouts.app')

@section('content')
<div class="mt-2">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row align-items-center justify-content-between">
                <!-- Left Section: Back Button and Heading -->
                <div class="col d-flex align-items-center">
                    <!-- Back Button -->
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <!-- Page Heading -->
                    <h3 class="mb-0">Ground</h3>
                </div>

                <!-- Right Section: Save Button -->
                <div class="col-auto">
                    <!-- Save Button referencing the form by its ID -->
                    <button type="submit" form="userForm" class="btn btn-primary">
                        <i class="bi bi-save"></i> Save
                    </button>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="container mt-4">
        <div class="card container">
            <!-- Card Header with Title and Minimize Button -->
           <div class="card-header">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <!-- Left: Info icon and text -->
                    <div class="d-flex align-items-center">
                        <i class="bi bi-plus-circle me-2"></i>
                        <h5 class="mb-0">Add New</h5>
                    </div>

                    <!-- Right: Collapse button -->
                    <button class="btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#userFormCollapse" aria-expanded="true" aria-controls="userFormCollapse">
                        <i class="bi bi-dash"></i>
                    </button>
                </div>
                </div>
            <!-- Collapsible Form Body -->
            <div class="collapse show" id="userFormCollapse">
            <div class="card shadow-sm border-0">
                
                <div class="card-body">
                    <form id="userForm" method="post" action="{{ route('ground.store', $vendor->id) }}" enctype="multipart/form-data">         
                        @csrf

                            <!-- Name Field -->
                           <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter ground name">
                                </div>
                            </div>


                          <!-- Location -->
                            <div class="mb-3 row">
                                <label for="location" class="col-sm-2 col-form-label">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter ground location">
                                </div>
                            </div>

                            <!-- Latitude -->
                            <div class="mb-3 row">
                                <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Enter ground latitude">
                                </div>
                            </div>

                            <!-- Longitude -->
                            <div class="mb-3 row">
                                <label for="logitude" class="col-sm-2 col-form-label">Longitude</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="logitude" name="logitude" placeholder="Enter ground longitude">
                                </div>
                            </div>

                            <!-- Is Popular Checkbox -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="ispopular">Is Popular</label>
                                <div class="col-sm-10 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="ispopular" name="ispopular">
                                    <label for="" class="m-2">Yes</label>
                                </div>
                            </div>

                            <!-- Base Price -->
                            <div class="mb-3 row">
                                <label for="baseprice" class="col-sm-2 col-form-label">Base Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="baseprice" name="baseprice" placeholder="Enter ground base price">
                                </div>
                            </div>

                            <!-- Discount Type -->
                            <div class="mb-3 row">
                                <label for="discounttype" class="col-sm-2 col-form-label">Discount Type</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="discounttype" id="discounttype">
                                        <option value="percentage">%</option>
                                        <option value="fix">Fix</option>
                                    </select>
                                </div>
                            </div>

                              <!-- Discount Price -->
                            <div class="mb-3 row">
                                <label for="discountprice" class="col-sm-2 col-form-label">Base Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="discountprice" name="discountprice" placeholder="Enter ground Discount price">
                                </div>
                            </div>

                            {{-- start time  --}}
                           <div class="mb-3 row">
                                <label for="openat" class="col-sm-2 col-form-label">Start Time</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="openat" name="openat">
                                </div>
                            </div>

                            {{-- close time --}}

                             <div class="mb-3 row">
                                <label for="closeat" class="col-sm-2 col-form-label">close Time</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="closeat" name="closeat">
                                </div>
                            </div>

                            {{-- categories --}}
                            <div class="mb-3 row">
                           
                             <label for="categories" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                    <select name="categories[]" id="categories" multiple class="form-select">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                    </div>
                                <input type="hidden" name="vendor_id" value="{{ $vendor->id }}"> <!-- or auth()->user()->vendor->id -->

                            </div>


                             <!-- Is Active Checkbox -->
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="ispopular">Is Active</label>
                                <div class="col-sm-10 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" id="isactive" name="isactive">
                                    <label for="" class="m-2">Yes</label>
                                </div>
                            </div>


                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success mt-5">Submit</button>
                    </form>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>


{{-- here is the code of categories  --}}

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery (required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#categories').select2({
            placeholder: 'Select categories',
            allowClear: true,
            width: '100%' 
        });
    });
</script>


@endsection

