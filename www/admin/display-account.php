<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Account</title>
    <link rel="stylesheet" href="admin-index.css">
</head>
<body>
    <?php
    
    ?>
    <div class="display-account-container">
        <div class="account account-email">
            <h2>User Email</h2>
            <p>???????</p>
        </div>
        <div class="account account-password">
            <h2>User Password</h2>
            <div class="container-password">
                <input type="Password">
                <button class="btn-rest">Reset</button>
            </div>
        </div>
        <div class="account account-fname">
            <h2>User Firstname</h2>
            <p>???????</p>
        </div>
        <div class="account account-lname">
            <h2>User Lastname</h2>
            <p>????????</p>
        </div>
        <div class="account create_at">
            <h2>Create at</h2>
            <p>????????</p>
        </div>
    </div>
</body>
</html>