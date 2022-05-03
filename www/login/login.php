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
    unset($_SESSION["email"]);
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
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
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
            <button type="submit" class="btn btn-primary ml-1">Register</button>
        </div>
        <?php include("../informErrors/errors.php")?>
        <div class="mb-3">
            Don't have an account?
            <a href="../register/register.php" class="link">Register a new one</a>
        </div>
    </form>
</body>
</html>