@extends('layouts.app')

@section('content')
<div class="mt-2">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Vendors</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <a href="{{ route('vendor.create') }}" type="button" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Add New
                        </a>
                    </ol>
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
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">City</th>
                        <th scope="col">Location</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach($vendors as $vendor)
                        <tr>
                            <td>{{ $vendor->id }}</td>
                            <td>
                                @if($vendor->image)
                                    <img src="{{ asset('storage/' . $vendor->image) }}" alt="Logo" width="40">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td><a href="{{ route('ground.editvendor', $vendor->id) }}">{{ $vendor->name }}</a></td>

                            
                            <td>{{ $vendor->description }}</td>
                            <td>{{ $vendor->city }}</td>
                            <td>{{ $vendor->location }}</td>
                            <td>
                                @if($vendor->isactive)
                                    <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> {{-- ✔ --}}
                                @else
                                    <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span> {{-- ✖ --}}
                                @endif
                            </td>
                          
                            <td>
                                <!-- Example action buttons -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $vendor->id }}">
                                        Edit
                                </button>
                                <form action="{{ route('vendor.destroy', $vendor->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                         <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $vendor->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $vendor->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="POST" action="{{ route('vendor.update', $vendor->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $vendor->id }}">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name{{ $vendor->id }}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name{{ $vendor->id }}" name="name" value="{{ $vendor->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description{{ $vendor->id }}" class="form-label">Description</label>
                                        <textarea class="form-control" id="description{{ $vendor->id }}" name="description">{{ $vendor->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image{{ $vendor->id }}" class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="image{{ $vendor->id }}" name="image">
                                        @if($vendor->image)
                                            <img src="{{ asset('storage/' . $vendor->image) }}" alt="Logo" width="40" class="mt-2">
                                        @endif
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="isactive{{ $vendor->id }}" name="isactive" {{ $vendor->isactive ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isactive{{ $vendor->id }}">Is Active</label>
                                    </div>
                                   
                                
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                     @endforeach 
                <tbody>
                    
                </tbody>
                
            </table>
        </div>
    </div>

    {{-- pagination applying here --}}
   
</div>
@endsection
