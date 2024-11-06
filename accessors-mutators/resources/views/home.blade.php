@extends('layout')

@section('title')
    All Users Data
@endsection

@section('content')
<a href="{{route('user.create')}}" class="btn btn-success btn-sm mb-3">Add News</a>
<table class="table table-bordered table-striped">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Salary</th>
        <th>DOB</th>
        <th>View</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>
    @foreach($users as $id => $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{ $user->user_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->salary }}</td>
        <td>{{ $user->dob }}</td>
        <td><a href="{{ route('user.show',$user->id) }}" class="btn btn-primary btn-sm">View</a></td>
        <td>
            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
      
        </td>
        <td><a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning btn-sm">Update</a></td>
    </tr>
    @endforeach
</table>
<div class="mt-4">
    {{ $users->links() }}
</div>
@endsection