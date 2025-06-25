@extends('master')
@section('content')

    <div class="container custom-login">

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="useremail" placeholder="Enter your email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="userpassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter your password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection