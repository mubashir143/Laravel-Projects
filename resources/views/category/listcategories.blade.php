@extends('layouts.app')

@section('content')
<div class="mt-2">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Categories</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <a href="{{ route('category.create') }}" type="button" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Add New
                        </a>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Allow Match</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Logo" width="40">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                @if($category->isactive)
                                    <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> {{-- ✔ --}}
                                @else
                                    <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span> {{-- ✖ --}}
                                @endif
                            </td>
                            <td>
                                @if($category->allowmatch)
                                    <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> {{-- ✔ --}}
                                @else
                                    <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span> {{-- ✖ --}}
                                @endif
                            </td>
                            <td>
                                <!-- Example action buttons -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                        Edit
                                </button>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                         <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name{{ $category->id }}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name{{ $category->id }}" name="name" value="{{ $category->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description{{ $category->id }}" class="form-label">Description</label>
                                        <textarea class="form-control" id="description{{ $category->id }}" name="description">{{ $category->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image{{ $category->id }}" class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="image{{ $category->id }}" name="image">
                                        @if($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}" alt="Logo" width="40" class="mt-2">
                                        @endif
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="isactive{{ $category->id }}" name="isactive" {{ $category->isactive ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isactive{{ $category->id }}">Is Active</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="allowmatch{{ $category->id }}" name="allowmatch" {{ $category->allowmatch ? 'checked' : '' }}>
                                        <label class="form-check-label" for="allowmatch{{ $category->id }}">Allow Match</label>
                                    </div>
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
                </tbody>
                
            </table>
        </div>
    </div>
   
</div>
@endsection
