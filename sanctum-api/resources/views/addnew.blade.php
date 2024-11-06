<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <!-- Top Heading Bar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Add New Post</a>
            <div class="d-flex">
                <button class="btn btn-primary me-2">Add New</button>
                <button class="btn btn-danger">Logout</button>
            </div>
        </div>
    </nav> --}}

    <!-- Main Container -->
    <div class="container my-5">
        <div class="heading container-fluid" style="background-color: blue; color:white;">
            <h2 class="mb-5  h2 ">Create Post</h2>
        </div>

        <!-- Add New Post Form -->
        <form id="addForm" method="POST" enctype="multipart/form-data">
            

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Submit Post</button>
            </div>
        </form>
    </div>


    <!-- Bootstrap JS (including Popper) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>




    <script>
        var addForm = document.querySelector("#addForm");

        addForm.onsubmit = async(e) => {
            e.preventDefault();
            const token = localStorage.getItem('api_token');

            const title = document.querySelector("#title").value;
            const description = document.querySelector("#description").value;
            const image = document.querySelector("#image").files[0];

            var formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);    
            formData.append('image', image);

            let response = await fetch('/api/posts', {
                method: 'POST', 
                body: formData,
                headers:{
                'Authorization': `Bearer ${token}`,
      }
    })
    .then(response => response.json())
    .then(data => {
      console.log(data);
     window.location.href = "http://localhost:8000/allpost";
    });

}
    </script>
</body>
</html>
