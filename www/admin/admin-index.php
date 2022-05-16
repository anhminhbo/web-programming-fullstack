<?php
  session_start();
  $numberOfItemsPerPage = 5;
  // determine which page number visitor is currently on
  if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }

  $_SESSION['page'] = $page;

  // Index of first starting item in each page
  $thisPageFirstResult = ($page-1)*$numberOfItemsPerPage;


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
     
    <!-- View Images a-->
    <a class="btn btn-primary" href="view-images/view-images.php" role="button">View Images</a>
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
          // Check when account is not available or search not available
          if (!isset($_GET['search']) || !isset($_SESSION['accounts'])) {
              // Check if search is available but accounts is not
              if (isset($_GET['search'])) {
                require_once('../util/db.php');
                require_once('../util/timeHandler.php');

                $accRepoPath = '../../accounts.db';

                $accounts = readInfo($accRepoPath, 'r');

                // sort by most recent registered account
                usort($accounts,'created_time_cmp');

                $_SESSION['accounts'] = $accounts;

                $searchValue = strtolower($_GET['search']);

                $accountsBasedOnSearch = [];
    
            
                foreach ($_SESSION['accounts'] as $acc) {
                  if (str_contains(strtolower($acc[0]),strtolower($searchValue)) ||
                   str_contains(strtolower($acc[2]),strtolower($searchValue))
                || str_contains(strtolower($acc[3]),strtolower($searchValue))) {
                    $accountsBasedOnSearch[] = $acc;
                }
    
                }

                // set numberOfPages
                $numberOfPages = ceil(count($accountsBasedOnSearch) / $numberOfItemsPerPage);
                if ($accountsBasedOnSearch) {
                  $totalLoopPerPage = 0;

                  if (count($accountsBasedOnSearch) > $page*$numberOfItemsPerPage){
                    $totalLoopPerPage = $page*$numberOfItemsPerPage;
                  } else {
                    $totalLoopPerPage = count($accountsBasedOnSearch);
                  }

                  

                  for ($i = $thisPageFirstResult; $i<$totalLoopPerPage; $i++){
                    echo '<tr>';
                    
                    echo '<td>' .'<a href="display-account.php?email='.$accountsBasedOnSearch[$i][0].'"'.'>'.$accountsBasedOnSearch[$i][0].'</a></td>';
    
                    echo '<td>' . $accountsBasedOnSearch[$i][1] .'</td>';
                
                    echo '<td>' . $accountsBasedOnSearch[$i][2] .'</td>';
                
                    echo '<td>' . $accountsBasedOnSearch[$i][3] .'</td>';
                
                    echo '<td>' . $accountsBasedOnSearch[$i][4] .'</td>';
                
                
                    echo '</tr>';
                }
                } else {
                  echo '<h3> No accounts available to display </h3>';
              }
              // // Check if search is unavailable but accounts is not
              } else {
                require('viewAllAcc/viewAllAcc.php');
              }
          }
          // Check when account is available and search is available
          else {
            $searchValue = strtolower($_GET['search']);

            $accountsBasedOnSearch = [];

        
            foreach ($_SESSION['accounts'] as $acc) {
              if (str_contains(strtolower($acc[0]),strtolower($searchValue)) ||
               str_contains(strtolower($acc[2]),strtolower($searchValue))
            || str_contains(strtolower($acc[3]),strtolower($searchValue))) {
                $accountsBasedOnSearch[] = $acc;
            }

            }

            $numberOfPages = ceil(count($accountsBasedOnSearch) / $numberOfItemsPerPage);
        
            if ($accountsBasedOnSearch) {
              $totalLoopPerPage = 0;
              if (count($accountsBasedOnSearch) > $page*$numberOfItemsPerPage){
                $totalLoopPerPage = $page*$numberOfItemsPerPage;
              } else {
                $totalLoopPerPage = count($accountsBasedOnSearch);
              }

              for ($i = $thisPageFirstResult; $i<$totalLoopPerPage; $i++){
                echo '<tr>';
                
                echo '<td>' .'<a href="display-account.php?email='.$accountsBasedOnSearch[$i][0].'"'.'>'.$accountsBasedOnSearch[$i][0].'</a></td>';
                
                echo '<td>' . $accountsBasedOnSearch[$i][1] .'</td>';
            
                echo '<td>' . $accountsBasedOnSearch[$i][2] .'</td>';
            
                echo '<td>' . $accountsBasedOnSearch[$i][3] .'</td>';
            
                echo '<td>' . $accountsBasedOnSearch[$i][4] .'</td>';
            
            
                echo '</tr>';
            }
          } else {
              echo '<h3> No accounts available to display </h3>';
          }
          }
          ?>
        </tbody>
    </table>

    <!-- Pagination bootstrap -->
    <?php
    
    ?>
    <nav aria-label="Page navigation example" class="d-flex mt-5 justify-content-center align-items-center">
      <ul class="pagination">
      <?php 
        $prevPage = $_GET['page'] - 1;
        if ($prevPage < 1) {
          $prevPage = $numberOfPages;
        }


      if (isset($_GET['search'])) {
        echo '<li class="page-item"><a class="page-link" href="admin-index.php?page='.
        $prevPage.'&'.'search='.$_GET['search'].'">Previous</a></li>';
      }

      else {
        echo '<li class="page-item"><a class="page-link" href="admin-index.php?page='.
        $prevPage.'">Previous</a></li>';
      }
       ?>
        <?php
          if (isset($_GET['search'])) {
            for ($i = 1; $i<$numberOfPages + 1; $i++){
              echo '<li class="page-item"><a class="page-link" href="admin-index.php?page='.$i.
              '&'.'search='.$_GET['search'].'">'.$i.'</a></li>';
          }
        } else {
          for ($i = 1; $i<$numberOfPages + 1; $i++){
            echo '<li class="page-item"><a class="page-link" href="admin-index.php?page='.$i.
            '">'.$i.'</a></li>';
        }
        }
        ?>
      <?php
        $nextPage = $_GET['page'] + 1;
        if ($nextPage > $numberOfPages) {
            $nextPage = 1;
        }

      if (isset($_GET['search'])) {
        echo '<li class="page-item"><a class="page-link" href="admin-index.php?page='.
        $nextPage.'&'.'search='.$_GET['search'].'">Next</a></li>';
      }

      else {
        echo '<li class="page-item"><a class="page-link" href="admin-index.php?page='.
        $nextPage.'">Next</a></li>';
      }
       ?>
      </ul>
    </nav>
  </main>
  <script src="admin.js"></script>
  </body>
</html>