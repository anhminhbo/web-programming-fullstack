<?php
    session_start();
    if (!isset($_SESSION["loggedIn"])){
        header("Location: index.php");  
    }
    include("myAccount-ss.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="myAccount.css">
    <title>My Account</title>
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/www/HeaderFooter/Header.php")?>
    <?php include($_SERVER['DOCUMENT_ROOT']."/www/HeaderFooter/Sidebar.php")?>
    <form class="container-sm mb-5 d-flex align-items-center align-self-center flex-column rounded shadow-lg outside-box" enctype="multipart/form-data" method="post">
        <h1 class="mt-3 mb-3 p-3 fw-bolder">My Account</h1>
        <div class="mb-2 align-left labelImg">
            <label class="col align-text-start" for="profileImg">Change your Avatar picture</label>
        </div>
        <div class="mb-3 uploadPic">
            <input class="form-control" name="changeprofileImg" type="file" id="changeprofileImg" accept=".jpg, .jpeg, .png, .gif">
        </div>
        <?php include("../informErrors/errors.php")?>
        <div class="mb-3">
            <button id="r-btn" class="btn btn-dark mr-1">Reset</button>
            <button id="s-btn" type="submit" class="btn btn-primary ml-1">Upload</button>
        </div>
        <div class="mb-3">
            <a href="../index.php?logout=true">
                Logout
            </a>
        </div>
        <?php
            if (isset($_GET["logout"])) {
                session_destroy();
                header("Location: index.php");    
            }
        ?>
    </form>
    <?php include($_SERVER['DOCUMENT_ROOT']."/www/HeaderFooter/Footer.php")?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>