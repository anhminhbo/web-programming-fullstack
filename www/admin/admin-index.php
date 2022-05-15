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
    <script src="tableaccount.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link href=view-images.php>
    <title>Admin</title>
  </head>
  <body>
    
    <!-- Search bar-->
    <div class="container">

<div class="row height d-flex justify-content-center align-items-center">

  <div class="col-md-8">

    <div class="search">
      <i class="fa fa-search"></i>
      <input type="text" class="form-control" placeholder="Search for an account">
      <button class="btn btn-primary">Search</button>
    </div>
    
  </div>
  
</div>
</div>

     
    <!-- View Images a-->

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
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
            </tr>
        </tfoot>
    </table>

    <!-- Pagination bootstrap -->
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
    </div>
    <script src="admin.js"></script>
  </body>
</html>