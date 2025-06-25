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
                    <h3 class="mb-0">Grounds</h3>
                </div>
            </div>

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
                            <th scope="col">Base Price</th>
                            <th scope="col">Discount Type</th>
                            <th scope="col">Discount Price</th>
                            <th scope="col">Popular</th>
                            <th scope="col">Open At</th>
                            <th scope="col">Close At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($grounds as $ground)
                            <tr>
                                <td>{{ $ground->id }}</td>
                                
                                <td><a href="{{ route('ground.facility', $ground->id) }}">{{ $ground->name }}</a></td>
                                <td>{{ $ground->vendor->name }}</td>
                                <td>
                                    @foreach($ground->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </td>
                                <td>{{ $ground->vendor->location }}</td>
                                <td>{{ $ground->latitude . ' ' . $ground->logitude }}</td>
                              
                                <td>{{ $ground->baseprice }}</td>
                                <td>{{ $ground->discounttype }}</td>
                                <td>{{ $ground->discountprice }}</td>
                                  <td>  @if($ground->ispopular)
                                        <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> 
                                    @else
                                        <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span>
                                    @endif
                                </td>

                                <td>{{ \Carbon\Carbon::parse($ground->openat)->format('h:i A') }}</td>

                                <td>{{ \Carbon\Carbon::parse($ground->closeat)->format('h:i A') }}</td>

                                  
                                  <td>  @if($ground->isactive)
                                        <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> 
                                    @else
                                        <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span>
                                    @endif
                                </td>

                            
                                <td>
                            
                                    <a href="{{ route('ground.groundedit',$ground->id) }}" class="btn btn-warning btn-sm"">
                                            Edit
                                    </a>
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
@endsection
