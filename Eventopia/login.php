<?php
session_start();
include "db-connect.php";
error_reporting(E_ALL ^ E_WARNING);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        font-family: cursive;
    }

    .f1 {
        margin: 20px auto;
        border: 2px solid black;
        padding: 20px;
        border-radius: 15px;
    }

    .head1 {
        margin-top: 40px;
    }
    </style>

</head>

<body>
    <div class="container">
        <div class="mb-5 text-center head1">
            <img src="srcimg/logo.png" class="img-fluid">
        </div>
        <div class="col-md-5 f1">
            <form action="login-process.php" method="post">
                <div class="mb-3 text-center">
                    <h2><b>Login</b></h2>
                </div>
                <hr>
                <?php
                if($_REQUEST["err"]==1)
                {
                    ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Invalid Password</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <?php
                 if($_REQUEST["err"]==2)
                {
                    ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Invalid Email Or Mobile Number</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email Id or Mobile Number</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="email"
                        name="userinfo" required />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password"
                        name="password" required />
                </div>
                <br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-dark">
                        Login
                    </button>
                </div>
            </form>
            <br>
            <hr>
            <div class="mb-3 text-center">
                <p>Don’t have an account?</p>
                <h4><a style="text-decoration:none" href="signup.php">Signup</a></h4>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>