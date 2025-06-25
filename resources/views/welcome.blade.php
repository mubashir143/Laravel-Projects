<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row mt-5 justify-content-center" >
            <div class="col-6">
            <h1>Multi User Login</h1>
            <a class="btn btn-primary" href="{{ route('admin.login') }}">Admin login</a> |
            <a class="btn btn-success" href="{{ route('account.login') }}">User login</a>
            </div>
        </div>
    </div>
</body>
</html>