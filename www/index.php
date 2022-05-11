<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="index.css">
    <title>Homepage</title>
  </head>
  <body>
    <div class="container">
      <header>
        <!-- Logo -->
        <img src="" alt="" />

        <!-- Website name -->
        <h1 class="websiteName">InstaKilogram</h1>

        <!-- Search field -->
        <section class="search-bar-container"></section>

        <!-- Login or My account -->
        <section class="header-login-container"></section>
      </header>

      <main>
      <?php if (isset($_SESSION["loggedIn"])) : ?>
        <aside class="sidebar">
          <div class="logoName">
            <i class='bx bxl-instagram-alt'></i>        
            <div class="webName">InstaKilogram</div>
          </div>
          <i class="bx bx-menu" id="btn"></i>
          <ul class="nav_list">
              <li>
                  <a href="shareImages/shareImages.php">
                      <i class='bx bx-image-add'></i>
                      <span class="link_name">Share Image</span>
                  </a>
                  <span class="tooltip">Share Image</span>
              </li>
              <li>
                  <a href="viewImages/viewImages.php">
                      <i class='bx bx-image-alt'></i>
                      <span class="link_name">View Images</span>
                  </a>
                  <span class="tooltip">View Images</span>
              </li>
          </ul>
          <div class="profile_content">
              <div class="profile">
                  <div class="profile_details">
                      <img src=<?php echo "profileImgRepo/" . $_SESSION["imgFileName"]?> alt="">
                      <div class="name">
                          <?php echo $_SESSION["fname"] . " " . $_SESSION["lname"]?>
                      </div>
                  </div>
                  <a href="index.php?logout=true">
                    <i class='bx bx-log-out' id="logout" href="index.php?logout=true"></i>
                  </a>
                  <?php
                    if (isset($_GET["logout"])) {
                      session_destroy();
                      header("Location: index.php");    
                    }
                  ?>
              </div>
          </div>
        </aside>
      <?php endif ?>
      <?php if (!isset($_SESSION["loggedIn"])) : ?>
        <div class="container-box">
          <div class="text">
            You need to login first to access our page. 
            <a href="login/login.php">Login here!</a>
          </div>
        </div>
      <?php endif ?>
      </main>

      <!-- <footer>
        <ul class="footer-list">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </footer> -->
    </div>
    <script src="index.js"></script>
  </body>
</html>
