<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card" style="width: 30rem">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="userpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="/" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $("#loginForm").on('submit', function(event){
                event.preventDefault(); // Prevent default form submission

                const email = $("#email").val();
                const password = $("#password").val();

                $.ajax({
                    url: '/api/login', // Ensure this route exists in your backend
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        email: email,
                        password: password,
                    }),
                    success: function(response){
                        console.log(response);

                        localStorage.setItem('api_token', response.token);
                        window.location.href = "/allpost"; // Fix typo here
                    },
                    error: function(xhr, status, error){
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
