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
                        <a href="{{ route('news.create') }}" type="button" class="btn btn-primary">
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
                        <th scope="col">Label</th>                     
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>                     
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($newss as $news)
                        <tr>
                            <td>{{ $news->id }}</td>
                           
                            <td>{{ $news->label }}</td>
                            <td>{{ $news->description }}</td>
                            <td>
                                @if($news->isactive)
                                    <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> 
                                @else
                                    <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span> 
                                @endif
                            </td>
                            
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $news->id }}">
                                        Edit
                                </button>
                                <form action="{{ route('news.destroy', $news->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        
                            <div class="modal fade" id="editModal{{ $news->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $news->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $news->id }}">Edit news</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="label{{ $news->id }}" class="form-label">Lable</label>
                                        <input type="text" class="form-control" id="label{{ $news->id }}" name="label" value="{{ $news->label }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description{{ $news->id }}" class="form-label">Description</label>
                                        <textarea class="form-control" id="description{{ $news->id }}" name="description">{{ $news->description }}</textarea>
                                    </div>
                                      <div class="mb-3">
                                        <label for="image{{ $news->id }}" class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="image{{ $news->id }}" name="image">
                                        @if($news->image)
                                            <img src="{{ asset('storage/' . $news->image) }}" alt="Logo" width="40" class="mt-2">
                                        @endif
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="isactive{{ $news->id }}" name="isactive" {{ $news->isactive ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isactive{{ $news->id }}">Is Active</label>
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
