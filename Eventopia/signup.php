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
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
    body {
        font-family: cursive;
    }

    .f1 {
        margin: 10px auto;
        border: 2px solid black;
        padding: 20px;
        border-radius: 15px;
    }

    .head1 {
        margin-top: 15px;
    }
    </style>

</head>

<body>
    <div class="container fs">
        <div class="mb-4 sb-4 b-4 text-center head1">
            <img src="srcimg/logo.png" class="img-fluid">
        </div>
        <div class="col-md-5 col-sm-5 col-10 f1">
            <form action="signup-process.php" method="post">
                <div class="mb-3 sb-3 b-3 text-center">
                    <h2><b>Signup</b></h2>
                </div>
                <hr>
                <?php
                if($_REQUEST["err"]==1)
                {
                    ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Passwords do not match!</strong>
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
                    <strong>User with the entered email id already exists.</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name"
                                name="full_name" value="<?php echo $_SESSION["full_name"];?>" required />
                        </div>
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">Email Id</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email"
                                name="email_id" value="<?php echo $_SESSION["email_id"];?>" required />
                        </div>
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">
                                Mobile Number
                            </label>
                            <input class="form-control" id="exampleFormControlInput1" placeholder="Mobile Number"
                                name="mobile_number" value="<?php echo $_SESSION["mobile_number"];?>" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1"
                                placeholder="password" name="password" value="<?php echo $_SESSION["password"];?>"
                                required />
                        </div>
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1"
                                placeholder="password" name="cpassword" value="<?php echo $_SESSION["cpassword"];?>"
                                required />
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto my-4">
                        <button type="submit" class="btn btn-outline-dark">
                            Signup
                        </button>
                    </div>
                </div>
            </form>
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