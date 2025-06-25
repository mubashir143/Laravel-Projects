@extends('layouts.app')

@section('content')
<div class="mt-2">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Market Place</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewModal">
                            <i class="bi bi-plus"></i> Add New
                        </button>
                    </ol>
                </div>
            </div>
        </div>
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
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Seller</th>
                        <th scope="col">Category</th>
                        <th scope="col">Buyer</th>
                        <th scope="col">Condition</th>
                        <th scope="col">Description</th>
                        <th scope="col">Location</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Example: Loop through facilities --}}
                    {{-- @forelse ($facilities as $facility)
                        <tr>
                            <td>{{ $facility->id }}</td>
                            <td>
                                @if($facility->image)
                                    <img src="{{ asset('storage/' . $facility->image) }}" alt="Logo" width="40">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $facility->name }}</td>
                            <td>
                                @if($facility->isactive)
                                    <span class="text-success" style="font-size: 1.5rem;">&#10003;</span>
                                @else
                                    <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span>
                                @endif
                            </td>
                            <td>
                                <!-- Action buttons here -->
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No facilities found.</td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add new Modal -->
    <div class="modal fade" id="addnewModal" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('marketplace.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewModalLabel">Add New Market Place</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="condition" class="form-label">Condition</label>
                            <select class="form-select" id="condition" name="condition">
                                <option selected disabled>Select Condition</option>
                                <option value="new">New</option>
                                <option value="old">Old</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name}}">{{ $category->name }}</option>
                                @endforeach     
                            </select>    
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="NotApproved">Not Approved</option>
                                <option value="Sold">Sold</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection