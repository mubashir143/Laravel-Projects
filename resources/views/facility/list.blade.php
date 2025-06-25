@extends('layouts.app')

@section('content')
<div class="mt-2">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Facilities</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewModal">
                                     <i class="bi bi-plus"></i> Add New
                        </button>
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
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facilities as $facility)
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
                                    <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> {{-- ✔ --}}
                                @else
                                    <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span> {{-- ✖ --}}
                                @endif
                        </td>
             
                            <td>
                                <!-- Example action buttons -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $facility->id }}">
                                        Edit
                                </button>
                                <form action="{{ route('facility.destroy', $facility->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                         <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $facility->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $facility->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="POST" action="{{ route('facility.update', $facility->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $facility->id }}">Edit Facility</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name{{ $facility->id }}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name{{ $facility->id }}" name="name" value="{{ $facility->name }}" required>
                                    </div>
                                   
                                    <div class="mb-3">
                                        <label for="image{{ $facility->id }}" class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="image{{ $facility->id }}" name="image">
                                        @if($facility->image)
                                            <img src="{{ asset('storage/' . $facility->image) }}" alt="Logo" width="40" class="mt-2">
                                        @endif
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="isactive{{ $facility->id }}" name="isactive" {{ $facility->isactive ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isactive{{ $facility->id }}">Is Active</label>
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
                    
                
            </table>
            </div>
                                     <!-- Add new Modal -->
                            <div class="modal fade" id="addnewModal" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <form method="POST" action="{{ route('facility.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="addnewModalLabel">Add New Facility</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Icon</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                        <div class="form-check mb-3">
                                            <label class="form-check-label" for="isactive">Is Active</label>
                                            <input class="form-check-input" type="checkbox" id="isactive" name="isactive">
                                            <label class="form-check-label" for="isactive">Yes</label>
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

    {{ $facilities->links() }}
   
</div>
@endsection
