<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admin-index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <title>Admin</title>
  </head>
  <body>
  <main> 
    <!-- Search bar-->
    <div class="container set-margin">
      <div class="row search-bar justify-content-center align-items-center">
        <div class="col-md-8">
          <div class="search">
            <i class="fa fa-search"></i>
            <input type="text" class="form-control" placeholder="Search for an account"
            id="searchInput">
            <button class="btn btn-primary" id="searchBtn">Search</button>
          </div>
        </div>
      </div>
    </div>
  
    <a href="view-images.php">View all images here</a>
     
    <!-- View Images a-->
    <a class="btn btn-primary" href="view-images.php" role="button">View Images</a>
    <!-- Table of Account -->
    <!-- https://www.youtube.com/watch?v=dyBlWHx5p_0 -->
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Account Email</th>
                <th>Account Password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
          <?php
          require_once('viewAllAcc/viewAllAcc.php')
          ?>
        </tbody>
    </table>

    <!-- Pagination bootstrap -->
    <nav aria-label="Page navigation example" class="d-flex mt-5 justify-content-center align-items-center">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  </main>
  <script src="admin.js"></script>
  </body>
</html>