@extends('layouts.app')

@section('content')
<div class="mt-2">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Notification</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <a href="{{ route('notification.create') }}" type="button" class="btn btn-primary">
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
                    @foreach($notifications as $notification)
                        <tr>
                            <td>{{ $notification->id }}</td>
                           
                            <td>{{ $notification->label }}</td>
                            <td>{{ $notification->description }}</td>
                            <td>
                                @if($notification->isactive)
                                    <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> 
                                @else
                                    <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span> 
                                @endif
                            </td>
                            
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $notification->id }}">
                                        Edit
                                </button>
                                <form action="{{ route('notification.destroy', $notification->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        
                            <div class="modal fade" id="editModal{{ $notification->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $notification->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="POST" action="{{ route('notification.update', $notification->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $notification->id }}">Edit Notification</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="label{{ $notification->id }}" class="form-label">Lable</label>
                                        <input type="text" class="form-control" id="label{{ $notification->id }}" name="label" value="{{ $notification->label }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description{{ $notification->id }}" class="form-label">Description</label>
                                        <textarea class="form-control" id="description{{ $notification->id }}" name="description">{{ $notification->description }}</textarea>
                                    </div>

                                   
                                 
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="isactive{{ $notification->id }}" name="isactive" {{ $notification->isactive ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isactive{{ $notification->id }}">Is Active</label>
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
