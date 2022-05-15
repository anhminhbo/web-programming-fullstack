<?php 
    include("register-ss.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/www/HeaderFooter/Header.php")?>
    <div class="container paddingSizing">
        <form class="container mt-5 mb-5 d-flex align-items-center align-self-center flex-column rounded shadow-lg outside-box" enctype="multipart/form-data" method="post">
            <h1 class="mt-3 mb-3 p-3 fw-bolder">Register</h1>
            <div class="d-flex mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control input-name" name="fname" id="fname" placeholder="#">
                    <label for="fname" class="label-coloring">First name</label>
                </div>
                <div id="alert-fname" class="stack-top">
                    <div id="au-fname" class="arrow-up"></div>
                    <div class="sized alert alert-danger fade show cl-m-top cl-bd">
                        <svg class="bi flex-shrink-0 me-2" width="17" height="17" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        First name is invalid
                    </div>
                </div>
                <div class="space"></div>
                <div class="form-floating">
                    <input type="text" class="form-control input-name" name="lname" id="lname" placeholder="#">
                    <label for="lname" class="label-coloring">Last name</label>
                </div>
                <div id="alert-lname" class="stack-top">
                    <div id="au-lname" class="arrow-up"></div>
                    <div class="sized alert alert-danger fade show cl-m-top cl-bd">
                        <svg class="bi flex-shrink-0 me-2" width="17" height="17" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        Last name is invalid
                    </div>
                </div>
            </div>
            <div class="mb-2 row align-left">
                <label class="col align-text-start" for="profileImg">Upload your Avatar picture</label>
            </div>
            <div class="mb-3 uploadPic">
                <input class="form-control" name="profileImg" type="file" id="profileImg" accept=".jpg, .jpeg, .png, .gif">
            </div>
            <div class="picture-sizing">
                <div id="inf" class="alert alert-primary text-center fw-lighter fst-italic ms-5 me-5">Your picture will be displayed here.</div>
                <img id="frame" src="" class="mb-3 img-fluid rounded">
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control input-text-and-password" name="email" id="email" placeholder="#">
                <label for="email" class="label-coloring">Email</label>
                <div id="alert-email" class="stack-top">
                    <div id="au-email" class="arrow-left"></div>
                    <div class="sized alert alert-danger fade show cl-m-top cl-bd">
                        <svg class="bi flex-shrink-0 me-2" width="17" height="17" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        Email is duplicated
                    </div>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input type="password" class="form-control input-text-and-password" name="pass" id="pass" placeholder="#">
                <label for="pass" class="label-coloring">Password</label>
                <div id="alert-pass" class="stack-top">
                    <div id="au-pass" class="arrow-left"></div>
                    <div class="sized alert alert-danger fade show cl-m-top cl-bd">
                        <svg class="bi flex-shrink-0 me-2" width="17" height="17" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        Password is invalid
                    </div>
                </div>
            </div>
            <div class="mb-3 form-floating">
                <input type="password" class="form-control input-text-and-password" name="re_pass" id="re-pass" placeholder="#">
                <label for="re-pass" class="label-coloring">Retype Password</label>
                <div id="alert-re-pass" class="stack-top">
                    <div id="au-re-pass" class="arrow-left"></div>
                    <div class="sized alert alert-danger fade show cl-m-top cl-bd">
                        <svg class="bi flex-shrink-0 me-2" width="17" height="17" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        Password is not matched
                    </div>
                </div>
            </div>
            <div id="alert" class="fw-bolder mt-2 alert alert-primary inform-box">
                The first name and last name field need to contain from 2 to 20 characters. Use a password between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter.
            </div>
            <?php include("../informErrors/errors.php")?>
            <div class="mb-3">
                Already have an account?
                <a href="../login/login.php" class="link">Login here!</a>
            </div>
            <div class="mb-3">
                <button id="r-btn" class="btn btn-dark mr-1">Reset</button>
                <button id="s-btn" type="submit" class="btn btn-primary ml-1">Register</button>
            </div>
        </form>
    </div>
    <?php include($_SERVER['DOCUMENT_ROOT']."/www/HeaderFooter/Footer.php")?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="register-cs.js"></script>
</body>
</html>