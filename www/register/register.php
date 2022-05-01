<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>
    <form class="container-sm mt-5 mb-5 d-flex align-items-center align-self-center flex-column rounded shadow-lg outside-box" method="post">
        <h1 class="mt-3 mb-3 p-3 fw-bolder">Register</h1>
        <div class="d-flex mb-3">
            <div class="form-floating">
                <input type="text" class="form-control input-name" name="fname" id="fname" placeholder="#" onkeyup="checkfname()">
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
            <label class="col align-text-start" for="formFile">Upload your Avatar picture</label>
        </div>
        <div class="mb-3 row">
            <input class="form-control col" type="file" id="formFile" accept=".jpg, .jpeg, .png, .gif" onchange="preview()">
            <button onclick="clearImage()" class="btn btn-primary col-3">Delete</button>
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
            <input type="password" class="form-control input-text-and-password" name="re_pass" id="re-pass" placeholder="#" onkeyup="check_pass()">
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
        <div class="mb-3">
            <button id="r-btn" class="btn btn-dark mr-1">Reset</button>
            <button id="s-btn" type="submit" class="btn btn-primary ml-1">Register</button>
        </div>
    </form>
    <script src="register-cs.js"></script>
</body>
</html>