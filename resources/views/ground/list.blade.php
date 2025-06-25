@extends('layouts.app')

@section('content')
<div class="mt-2">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row align-items-center justify-content-between">
                <!-- Left Section: Back Button and Heading -->
                <div class="col d-flex align-items-center">
                    <!-- Back Button -->
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <!-- Page Heading -->
                    <h3 class="mb-0">Users</h3>
                </div>

                <!-- Right Section: Save Button -->
                <div class="col-auto">
                    <!-- Save Button referencing the form by its ID -->
                    <button type="submit" form="userForm" class="btn btn-primary">
                        <i class="bi bi-update"></i> Update
                    </button>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    
    <div class="container mt-4">
        <div class="card container" >
            <!-- Card Header with Title and Minimize Button -->
          <div class="card-header ">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <!-- Left: Info icon and text -->
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle me-2"></i>
                        <h5 class="mb-0">Info</h5>
                    </div>

                    <!-- Right: Collapse button -->
                    <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#userFormCollapse" aria-expanded="true" aria-controls="userFormCollapse">
                        <i class="bi bi-dash"></i>
                    </button>
                </div>
            </div>


            <!-- Collapsible Form Body -->
            <div class="collapse show" id="userFormCollapse">
                <div class="card-body">
                    <!-- Assign an ID to the form -->
                    <form id="userForm" method="POST" action="{{ route('ground.updatevendor', $vendor->id ) }}">
                        @csrf
                        @method('PUT')
                        <!-- Name Field -->
                        <div class="mb-3">
                        <label for="name{{ $vendor->id }}" class="form-label">Name</label>
                            <input type="text" class="form-control w-75" id="name{{ $vendor->id }}" name="name" value="{{ $vendor->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email{{ $vendor->id }}" class="form-label">Email</label>
                            <input type="text" class="form-control w-75" id="name{{ $vendor->id }}" name="email" value="{{ $vendor->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password{ $vendor->id }}" class="form-label">Password</label>
                            <input type="text" class="form-control w-75" id="name{{ $vendor->id }}" name="password" value="{{ $vendor->password }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description{{ $vendor->id }}" class="form-label">Description</label>
                            <textarea class="form-control w-75" id="description{{ $vendor->id }}" name="description">{{ $vendor->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image{{ $vendor->id }}" class="form-label ">Logo</label>
                            <input type="file" class="form-control w-75" id="image{{ $vendor->id }}" name="image">
                            @if($vendor->image)
                                <img src="{{ asset('storage/' . $vendor->image) }}" alt="Logo" width="40" class="mt-2">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="city{{ $vendor->id }}" class="form-label">City</label>
                            <input type="text" class="form-control w-75" id="name{{ $vendor->id }}" name="city" value="{{ $vendor->city }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="location{{ $vendor->id }}" class="form-label">Location</label>
                            <input type="text" class="form-control w-75" id="name{{ $vendor->id }}" name="location" value="{{ $vendor->location }}" required>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="isactive{{ $vendor->id }}" name="isactive" {{ $vendor->isactive ? 'checked' : '' }}>
                            <label class="form-check-label" for="isactive{{ $vendor->id }}">Is Active</label>
                        </div>
                        <div class="footer">
                        <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                        <!-- Optional: Remove the internal submit button -->
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>
            </div>
        </div>



 <div class="card container mt-5">

    {{-- this is the card header --}}

            <div class="card-header ">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <!-- Left: Info icon and text -->
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle me-2"></i>
                        <h5 class="mb-0">Info</h5>
                    </div>

                    <!-- Right: Collapse button -->
                    <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#userFormCollapse" aria-expanded="true" aria-controls="userFormCollapse">
                        <i class="bi bi-dash"></i>
                    </button>
                </div>
            </div>

            {{-- heading of the card --}}

            <div class="row align-items-center justify-content-between mt-3">
                <!-- Left Section: Back Button and Heading -->
                <div class="col d-flex align-items-center">
                    
                    <!-- Page Heading -->
                    <h3 class="mb-0">Grounds</h3>
                </div>

                <!-- Right Section: Save Button -->
                <div class="col-auto">
                    <!-- Save Button referencing the form by its ID -->
                    <a href="{{ route('ground.create',$vendor->id) }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add New
                    </a>
                </div>
            </div>

    <div class="collapse show" id="userFormCollapse">
        <div class="card-body">
                  <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ground Name</th>
                            <th scope="col">Vendor Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Location</th>
                            <th scope="col">Latitude/Longitude</th>
                            <th scope="col">Is Popular</th>
                            <th scope="col">Base Price</th>
                            <th scope="col">Discount Type</th>
                            <th scope="col">Discount Price</th>
                            <th scope="col">Open At</th>
                            <th scope="col">Close At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($grounds as $ground)
                            <tr>
                                <td>{{ $ground->id }}</td>
                                
                                <td>{{ $ground->name }}</td>
                                <td>{{ $ground->vendor->name }}</td>
                                <td>
                                    @foreach($ground->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </td>
                                <td>{{ $ground->vendor->location }}</td>
                                <td>{{ $ground->latitude . ' ' . $ground->logitude }}</td>
                                <td>  @if($ground->ispopular)
                                        <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> 
                                    @else
                                        <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span>
                                    @endif
                                </td>
                                <td>{{ $ground->baseprice }}</td>
                                <td>{{ $ground->discounttype }}</td>
                                <td>{{ $ground->discountprice }}</td>

                                <td>{{ \Carbon\Carbon::parse($ground->openat)->format('h:i A') }}</td>

                                <td>{{ \Carbon\Carbon::parse($ground->closeat)->format('h:i A') }}</td>

                            
                                <td>
                            
                                    <button type="button" class="btn btn-warning btn-sm"">
                                            Edit
                                    </button>
                                    <form action="" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody> 
                    
                </table>
            </div>
        </div>

    </div>
</div>
        
    


    </div> 

        </div>
   

   
   
    </div>
@endsection
