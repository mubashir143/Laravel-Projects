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
                    <h3 class="mb-0">Permissions</h3>
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
    
    <div class="container mt-4">
        <div class="card">
            <!-- Card Header with Title and Minimize Button -->
           <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bi bi-info-circle me-2"></i>
                    <h5 class="mb-0">Info</h5>
                </div>
                <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#userFormCollapse" aria-expanded="true" aria-controls="userFormCollapse">
                    <i class="bi bi-dash"></i>
                </button>
                </div>
            <!-- Collapsible Form Body -->
            <div class="collapse show" id="userFormCollapse">
                <div class="card-body">
                    <!-- Assign an ID to the form -->
                    <form id="userForm" method="POST" action="{{ route('admin.permissionstore') }}">
                        @csrf
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="userName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="userName" name="name" placeholder="Enter name">
                        </div>

                       
                        <!-- Role Dropdown -->
                        {{-- <div class="mb-3">
                            <label for="userRole" class="form-label">Role</label>
                            <select class="form-select" id="userRole" name="role">
                                <option selected disabled>Select role</option>
                                <option value="admin">Admin</option>
                                <option value="customer">Staff</option>
                              
                            </select>
                        </div> --}}

                        <!-- Optional: Remove the internal submit button -->
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
