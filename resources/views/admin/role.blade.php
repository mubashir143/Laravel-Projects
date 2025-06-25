@extends('layouts.app')

    @section('content')
    <div class="mt-2">
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Roles</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <a href="{{ route('admin.rolecreate') }}" type="button" class="btn btn-primary">
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
          <th scope="col">Name</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $role)
            <!-- Example Row -->
            <tr>
           <td>{{ $role->id }}</td>
           <td>{{ $role->name }}</td>
           <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#permissionsModal">
                    Permissions
                    </button>
            </td>
            </tr>
        
        @endforeach
           <!-- Additional rows can be added here -->
      </tbody>
    </table>
  </div>



  <!-- Permissions Modal -->
<div class="modal fade" id="permissionsModal" tabindex="-1" aria-labelledby="permissionsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> <!-- XL for wider modal -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="permissionsModalLabel">Permissions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="">
      <div class="modal-body">

        <div class="row">
          <!-- Manage Roles -->
          <div class="col-md-6 mb-4">
            <div class="card p-3">
              <h5>MANAGE ROLES</h5>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">VIEW ROLE</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">ADD ROLE</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">EDIT ROLE</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">DELETE ROLE</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">ASSIGN ROLE PERMISSIONS</label></div>
            </div>
          </div>

          </form>

          <!-- Manage Permissions -->
          <div class="col-md-6 mb-4">
            <div class="card p-3">
              <h5>MANAGE PERMISSIONS</h5>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">VIEW PERMISSION</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">ADD PERMISSION</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">EDIT PERMISSION</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">DELETE PERMISSION</label></div>
            </div>
          </div>

          <!-- Manage Users -->
          <div class="col-md-6 mb-4">
            <div class="card p-3">
              <h5>MANAGE USERS</h5>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">VIEW USER</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">ADD USER</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">EDIT USER</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">DELETE USER</label></div>
            </div>
          </div>

          <!-- Manage Categories -->
          <div class="col-md-6 mb-4">
            <div class="card p-3">
              <h5>MANAGE CATEGORIES</h5>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">VIEW CATEGORIES</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">ADD CATEGORIES</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">EDIT CATEGORIES</label></div>
              <div class="form-check"><input class="form-check-input" type="checkbox"><label class="form-check-label">DELETE CATEGORIES</label></div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>






</div>

    </div>


    @endsection
    