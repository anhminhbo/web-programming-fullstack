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
    <link rel="stylesheet" href="index.css">
    <title>Homepage</title>
  </head>
  <body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/www/HeaderFooter/Header.php")?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/www/HeaderFooter/background.php")?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/www/HeaderFooter/Sidebar.php")?>
    <main>
      <?php if (isset($_SESSION["loggedIn"])) : ?>
          <div class="container-box index-box">
              <div class="text">
                Welcome to our website - InstaKilogram
              </div>
          </div>
      <?php endif?>
    </main>
    <?php include($_SERVER['DOCUMENT_ROOT']."/www/HeaderFooter/Footer.php")?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
