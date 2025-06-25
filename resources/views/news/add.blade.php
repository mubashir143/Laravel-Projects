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
                    <h3 class="mb-0">news</h3>
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
        <div class="card">
            <!-- Card Header with Title and Minimize Button -->
           <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bi bi-plus-circle me-2"></i>
                    <h5 class="mb-0">Add New newn</h5>
                </div>
                <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#userFormCollapse" aria-expanded="true" aria-controls="userFormCollapse">
                    <i class="bi bi-dash"></i>
                </button>
                </div>
            <!-- Collapsible Form Body -->
            <div class="collapse show" id="userFormCollapse">
            <div class="card shadow-sm border-0">
                
                <div class="card-body">
                <form id="userForm" method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">                       
                     @csrf

                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="label" class="form-label">Label</label>
                            <input type="text" class="form-control" id="label" name="label" placeholder="Enter label">
                        </div>

                     

                        <!-- Description Field -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"></textarea>
                        </div>

                        <!-- Logo Upload -->
                        <div class="mb-3">
                            <label for="logo" class="form-label">Image</label>
                            <input type="file" class="form-control" id="logo" name="image">
                        </div>

                    

                        <!-- Is Active Checkbox -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="isactive" name="isactive">
                            <label class="form-check-label" for="isactive">Is Active</label>
                        </div>

                       
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
</div>

        </div>
    </div>
</div>
@endsection
