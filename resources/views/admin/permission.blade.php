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
                    <a href="{{ route('admin.permissioncreate') }}" type="button" class="btn btn-primary">
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
        @foreach ($permissions as $permission)
            <!-- Example Row -->
            <tr>
           <td>{{ $permission->id }}</td>
           <td>{{ $permission->name }}</td>
           <td>
                
            </td>
            </tr>
        
        @endforeach
           <!-- Additional rows can be added here -->
      </tbody>
    </table>
  </div>



    
      
    </div>
  </div>
</div>






</div>

    </div>


    @endsection
    