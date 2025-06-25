@extends('layouts.app')

    @section('content')
    <div class="mt-2">
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Users</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <a href="{{ route('admin.usercreate') }}" type="button" class="btn btn-primary">
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
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Status</th>
          <th scope="col">Created Date</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
            <!-- Example Row -->
            <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <span class="badge bg-success">Active</span>
            </td>
            <td>{{ $user->created_at->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-sm btn-outline-primary me-1">
                <i class="bi bi-pencil-square"></i>
                </a>
               <form action="{{ route('admin.destroyuser', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>

            </td>
            </tr>
        
        @endforeach
           <!-- Additional rows can be added here -->
      </tbody>
    </table>
  </div>
</div>

    </div>


    @endsection
    