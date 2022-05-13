<?php
    session_start();
    include("login-ss.php");
    $emailFromRegister = "";
    $passFromRegister = "";
    if (isset($_SESSION["email"])) {
        $emailFromRegister = $_SESSION["email"];
    }
    if (isset($_SESSION["pass"])) {
        $passFromRegister = $_SESSION["pass"];
    }
    // unset($_SESSION["email"]);
    unset($_SESSION["pass"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <form class="container-sm d-flex align-items-center align-self-center flex-column rounded shadow-lg outside-box login-box" method="post">
        <h1 class="mt-3 mb-3 p-3 fw-bolder">Login</h1>
        <div class="form-floating mb-3">
            <input type="email" class="form-control input-text-and-password" name="email" id="email" placeholder="#" value=<?php echo $emailFromRegister?>>
            <label for="email" class="label-coloring">Email</label>
        </div>
        <div class="mb-3 form-floating">
            <input type="password" class="form-control input-text-and-password" name="pass" id="pass" placeholder="#" value=<?php echo $passFromRegister?>>
            <label for="pass" class="label-coloring">Password</label>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary ml-1" name="loginAction">Login</button>
        </div>
        <?php include("../informErrors/errors.php")?>
        <div class="mb-3">
            Don't have an account?
            <a href="../register/register.php" class="link">Register a new one!</a>
        </div>
    </form>
</body>
</html>