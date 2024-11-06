<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>All Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .navbar-size { font-size: 30px; color: white; }
    .nav-color { background-color: rgba(65, 76, 230, 0.918); }
  </style>
</head>
<body>
  <div class="container">
    <nav class="navbar nav-color">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h4 navbar-size">All Posts</span>
      </div>
    </nav>
    <br>
    <div class="container-fluid float-left">
      <a href="addnew" class="btn btn-primary">Add New</a>
      <button id="logoutBtn" class="btn btn-success">Logout</button>
    </div>
    <div class="container mt-3">
      <div id="postsContainer"></div>
    </div>
  </div>

  <!-- Single Post Modal -->
  <div class="modal fade" id="singlepostmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Single Post</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">...</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Update Post Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updatePostLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="updatePostLabel">Update Post</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateform">
          <div class="modal-body">
            <input type="hidden" id="postId" class="form-control">
            <b>Title</b> <input type="text" id="postTitle" class="form-control">
            <b>Description</b> <input type="text" id="postBody" class="form-control">
            <img id="showImage" width="150px" alt="Post Image">
            <p>Upload Image</p> <input type="file" id="postImage" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" value="Save changes" class="btn btn-primary">
          </div>
        </form> 
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>

  <script>
    document.querySelector("#logoutBtn").addEventListener('click', function() {
      const token = localStorage.getItem('api_token');
      fetch('/api/logout', {
        method: 'POST',
        headers: { 'Authorization': `Bearer ${token}` }
      })
      .then(response => response.json())
      .then(() => { window.location.href = "http://localhost:8000/"; });
    });

    function loadData() {
      const token = localStorage.getItem('api_token');
      fetch('/api/posts', {
        method: 'GET',
        headers: { 'Authorization': `Bearer ${token}` }
      })
      .then(response => response.json())
      .then(data => {
        const allPosts = data.data.post;
        let tableData = `
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr><th>Image</th><th>Title</th><th>Description</th><th>View</th><th>Update</th><th>Delete</th></tr>
            </thead><tbody>`;

        allPosts.forEach(post => {
          tableData += `
            <tr>
              <td><img width="150px" src="http://localhost:8000/uploads/${post.image}" alt="Post Image"></td>
              <td><h6>${post.title}</h6></td>
              <td><p>${post.description}</p></td>
              <td><button class="btn btn-primary btn-sm" data-bs-postid="${post.id}" data-bs-toggle="modal" data-bs-target="#singlepostmodel">View</button></td>
              <td><button class="btn btn-warning btn-sm" data-bs-postid="${post.id}" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button></td>
              <td><button onclick="deletePost(${post.id})" class="btn btn-danger btn-sm">Delete</button></td>
s
            </tr>`;
        });

        document.querySelector("#postsContainer").innerHTML = tableData + `</tbody></table>`;
      });
    }
    loadData();

    document.querySelector("#singlepostmodel").addEventListener('show.bs.modal', event => {
      const id = event.relatedTarget.getAttribute('data-bs-postid');
      fetch(`/api/posts/${id}`, {
        method: 'GET',
        headers: { 'Authorization': `Bearer ${localStorage.getItem('api_token')}`, 'Content-Type': 'application/json' }
      })
      .then(response => response.json())
      .then(data => {
        const post = data.data.post;
        document.querySelector("#singlepostmodel .modal-body").innerHTML = `
          Title: ${post.title}<br>Description: ${post.description}<br>
          <img width="150px" src="http://localhost:8000/uploads/${post.image}" alt="Post Image">`;
      });
    });

    document.querySelector("#updateModal").addEventListener('show.bs.modal', event => {
      const id = event.relatedTarget.getAttribute('data-bs-postid');
      fetch(`/api/posts/${id}`, {
        method: 'GET',
        headers: { 'Authorization': `Bearer ${localStorage.getItem('api_token')}`, 'Content-Type': 'application/json' }
      })
      .then(response => response.json())
      .then(data => {
        const post = data.data.post;
        document.querySelector("#postId").value = post.id;
        document.querySelector("#postTitle").value = post.title;
        document.querySelector("#postBody").value = post.description;
        document.querySelector("#showImage").src = `http://localhost:8000/uploads/${post.image}`;
      });
    });



    //update post table data

    var updateform = document.querySelector("#updateform");

    updateform.onsubmit = async(e) => {
    e.preventDefault();
    const token = localStorage.getItem('api_token');

    const postId = document.querySelector("#postId").value;
    const title = document.querySelector("#postTitle").value;
    const description = document.querySelector("#postBody").value;
     


    var formData = new FormData();
    formData.append('id', postId);
    formData.append('title', title);
    formData.append('description', description);  

    if(!document.querySelector("#postImage").files[0] == ""){
        const image = document.querySelector("#postImage").files[0];
        formData.append('image', image);
      }
    

    let response = await fetch(`/api/posts/${postId}`, {
        method: 'POST', 
        body: formData,
        headers:{
        'Authorization': `Bearer ${token}`,
        'X-HTTP-Method-Override' :  'PUT'
}
})
.then(response => response.json())
.then(data => {
console.log(data);
window.location.href = "http://localhost:8000/allpost";
});

}


// delete Post functoin

async function deletePost(postId){
  const token = localStorage.getItem('api_token');

  let response = await fetch(`/api/posts/${postId}`, {
        method: 'DELETE', 
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
