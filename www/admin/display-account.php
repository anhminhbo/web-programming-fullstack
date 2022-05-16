<?php
    session_start();
    include("resetPass-ss.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Account</title>
    <link rel="stylesheet" href="display-account.css">
</head>
<body>
    <div class="display-account-container">
        <div class="account account-email">
            <h2>User Email</h2>
            <p> 
                <?php 
                    echo $email;
                ?>
            </p>
        </div>
        <div class="account account-password">
            <h2>User Password</h2>
            <form class="container-password" method="post">
                <input type="password" id="pass" name="pass">
                <button type="submit" class="btn-rest">Reset</button>
            </form>
        </div>
        <div class="account account-fname">
            <h2>User Firstname</h2>
            <p>
                <?php
                    echo $fname;
                ?>
            </p>
        </div>
        <div class="account account-lname">
            <h2>User Lastname</h2>
            <p>
                <?php
                    echo $lname;
                ?>
            </p>
        </div>
        <div class="account create_at">
            <h2>Create at</h2>
            <p>
                <?php
                    echo $createAt;
                ?>
            </p>
        </div>
    </div>
</body>
</html>