@extends('layout')

@section('title')
    Add New Users
@endsection

@section('content')
<form action="{{ route('user.store') }}" method="Post">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="mb-3">
        <label for="useremail" class="form-label">User Email</label>
        <input type="text" class="form-control" name="useremail">
    </div>
    <div class="mb-3">
        <label for="usersalary" class="form-label">Salary</label>
        <input type="text" class="form-control" name="usersalary">
    </div>
    <div class="mb-3">
        <label for="userdob" class="form-label">DOB</label>
        <input type="text" class="form-control" name="userdob">
    </div>
    <div class="mb-3">
        <label for="userpassword" class="form-label">Password</label>
        <input type="password" class="form-control" name="userpassword">
    </div>
    <div class="mb-3">
        <input type="submit" value="save" class="btn btn-success">  
    </div>
</form>
@endsection