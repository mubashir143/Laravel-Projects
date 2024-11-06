<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Login Page</title>
</head>
<body>
  <div class="card">
    <div class="card-header">
      <h3>Login</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('loginMatch')}}" method="POST">
        @csrf
          
          <div class="mb-3">
              <label for="useremail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="useremail" name="email">
            </div>
          <div class="mb-3">
            <label for="userpassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="userpassword" name="password">
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
          <a href="/" class="btn btn-primary">Back</a>
        </form>
      
  
      @if ($errors->any() )
        <div class="card-footer text-body-secondary">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif
    </div>
  </div>
</body>
</html>