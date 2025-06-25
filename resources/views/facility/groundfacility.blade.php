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
            <i class="bi bi-update"></i> Update </button>
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <div class="container mt-4">
    <div class="card container">
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
          <form method="POST" action="{{ route('ground.groundupdate', $ground->id) }}"> @csrf @method('PUT')
            <!-- Name -->
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" value="{{ $ground->name }}">
            </div>
            <!-- Location -->
            <div class="mb-3">
              <label for="location" class="form-label">Location</label>
              <input type="text" name="location" class="form-control" value="{{ $ground->location }}">
            </div>
            <!-- Latitude / Longitude -->
            <div class="mb-3">
              <label for="latitude" class="form-label">Latitude</label>
              <input type="text" name="latitude" class="form-control" value="{{ $ground->latitude }}">
            </div>
            <div class="mb-3">
              <label for="logitude" class="form-label">Longitude</label>
              <input type="text" name="logitude" class="form-control" value="{{ $ground->logitude }}">
            </div>
            <!-- Categories -->
            <div class="mb-3">
              <label for="categories" class="form-label">Categories</label>
              <select name="categories[]" class="form-select" multiple id="categories"> @foreach($categories as $category) <option value="{{ $category->id }}" {{ in_array($category->id, $ground->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                  {{ $category->name }}
                </option> @endforeach </select>
            </div>
            <!-- Times -->
            <div class="mb-3">
              <label for="openat" class="form-label">Open At</label>
              <input type="time" name="openat" class="form-control" value="{{ $ground->openat }}">
            </div>
            <div class="mb-3">
              <label for="closeat" class="form-label">Close At</label>
              <input type="time" name="closeat" class="form-control" value="{{ $ground->closeat }}">
            </div>
            <!-- Pricing -->
            <div class="mb-3">
              <label for="baseprice" class="form-label">Base Price</label>
              <input type="text" name="baseprice" class="form-control" value="{{ $ground->baseprice }}">
            </div>
            <div class="mb-3">
              <label for="discounttype" class="form-label">Discount Type</label>
              <select name="discounttype" class="form-select">
                <option value="percentage" {{ $ground->discounttype == 'percentage' ? 'selected' : '' }}>%</option>
                <option value="fix" {{ $ground->discounttype == 'fix' ? 'selected' : '' }}>Fix</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="discountprice" class="form-label">Discount Price</label>
              <input type="text" name="discountprice" class="form-control" value="{{ $ground->discountprice }}">
            </div>
            <!-- Checkboxes -->
            <div class="form-check">
              <input type="checkbox" name="ispopular" class="form-check-input" {{ $ground->ispopular ? 'checked' : '' }}>
              <label class="form-check-label">Is Popular</label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="isactive" class="form-check-input" {{ $ground->isactive ? 'checked' : '' }}>
              <label class="form-check-label">Is Active</label>
            </div>
            <!-- Submit -->
            <button type="submit" class="btn btn-primary mt-3 mb-3">Update</button>
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
          <h3 class="mb-0">Facilities</h3>
        </div>
        <!-- Right Section: Save Button -->
        <div class="col-auto">
          <!-- Save Button referencing the form by its ID -->
          <a href="" class="btn btn-primary">
            <i class="bi bi-plus"></i> Add New </a>
        </div>
      </div>
      <div class="collapse show" id="userFormCollapse">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Icon</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> @foreach ($facilities as $facility) <tr>
                  <td>{{ $facility->id }}</td>
                  <td> @if($facility->image) <img src="{{ asset('storage/' . $facility->image) }}" alt="Logo" width="40"> @else N/A @endif </td>
                  <td>{{ $facility->name }}</td>
                  <td> @if($facility->isactive) <span class="text-success" style="font-size: 1.5rem;">&#10003;</span> {{-- ✔ --}} @else <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span> {{-- ✖ --}} @endif </td>
                  <td>
                    <!-- Example action buttons -->
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $facility->id }}"> Edit </button>
                    <form action="{{ route('facility.destroy', $facility->id) }}" method="POST" style="display:inline;"> @csrf @method('DELETE') <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                  </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $facility->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $facility->id }}" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form method="POST" action="{{ route('facility.update', $facility->id) }}" enctype="multipart/form-data"> @csrf @method('PUT') <div class="modal-header">
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
                            <input type="file" class="form-control" id="image{{ $facility->id }}" name="image"> @if($facility->image) <img src="{{ asset('storage/' . $facility->image) }}" alt="Logo" width="40" class="mt-2"> @endif
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
                </div> @endforeach
              <tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    {{-- here is the code of cort --}}
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
          <h3 class="mb-0">Courts</h3>
        </div>
        <!-- Right Section: Save Button -->
        <div class="col-auto">
          <!-- Save Button referencing the form by its ID -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewModal">
            <i class="bi bi-plus"></i> Add New </button>
        </div>
      </div>
      <div class="collapse show" id="userFormCollapse">
        <div class="card-body">
       <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Start Time</th>
                <th>Close Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($courts as $court)
            <tr>
                <td>{{ $court->id }}</td>
                <td>{{ $court->name }}</td>
                <td>{{ $court->startat }}</td>
                <td>{{ $court->endat }}</td>
                <td>
                @if($court->isactive)
                <span class="text-success" style="font-size: 1.5rem;">&#10003;</span>
                @else
                <span class="text-danger" style="font-size: 1.5rem;">&#10007;</span>
                @endif
                </td>
                <td>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editcourtModal{{ $court->id }}">
                    Edit
                </button>
                <form action="" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editcourtModal{{ $court->id }}" tabindex="-1" aria-labelledby="editcourtModalLabel{{ $court->id }}" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('court.update', ['court' => $court->id, 'ground' => $ground->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editcourtModalLabel{{ $court->id }}">Edit Court</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                        <label for="name{{ $court->id }}" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name{{ $court->id }}" name="name" value="{{ $court->name }}" required>
                        </div>
                        <div class="mb-3">
                        <label for="startat{{ $court->id }}" class="form-label">Start Time</label>
                        <input type="time" class="form-control" id="startat{{ $court->id }}" name="startat" value="{{ $court->startat }}">
                        </div>
                        <div class="mb-3">
                        <label for="endat{{ $court->id }}" class="form-label">Close Time</label>
                        <input type="time" class="form-control" id="endat{{ $court->id }}" name="endat" value="{{ $court->endat }}">
                        </div>
                        <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="isactive{{ $court->id }}" name="isactive" {{ $court->isactive ? 'checked' : '' }}>
                        <label class="form-check-label" for="isactive{{ $court->id }}">Is Active</label>
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
    </div>
    <!-- Add new Modal -->
    <div class="modal fade" id="addnewModal" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="{{ route('ground.court.store',$ground->id) }}" enctype="multipart/form-data"> @csrf <div class="modal-header">
              <h5 class="modal-title" id="addnewModalLabel">Add New Court</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="" required>
              </div>
              <div class="mb-3">
                <label for="startat" class="form-label">Start Time</label>
                <input type="time" class="form-control" id="startat" name="startat">
              </div>
              <div class="mb-3">
                <label for="endat" class="form-label">Close Time</label>
                <input type="time" class="form-control" id="endat" name="endat">
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
</div>
</div>
<!-- Include Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('#categories').select2({
      placeholder: "Select Categories",
      allowClear: true
    });
  });
</script>

@endsection