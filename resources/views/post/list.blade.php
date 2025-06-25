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
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                       
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach (posts as $post)
                      <td>{{ $post->id }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->body }}</td>
                      <td></td>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add new Modal -->
    <div class="modal fade" id="addnewModal" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewModalLabel">Add New Post Place</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Description</label>
                            <textarea class="form-control" id="body" name="body" rows="4" placeholder="Enter Descri..."></textarea>
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