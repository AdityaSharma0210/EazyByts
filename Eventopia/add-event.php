<?php
session_start();

if (!isset($_SESSION['userinfo'])) {
    header("Location: login.php");
    exit;
}
?>
<?php

include "db-connect.php";
error_reporting(E_ALL ^ E_WARNING);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Event</title>
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
    <div class="container">
        <div class="mb-4 sb-4 b-4 text-center head1">
            <img src="srcimg/logo.png" class="img-fluid">
        </div>
        <div class="col-md-5 col-sm-5 col-10 f1">
            <form action="event-process.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 sb-3 b-3 text-center">
                    <h2><b>Add Event</b></h2>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Event Title" name="eventName" value="<?php echo $_SESSION["eventName"];?>"
                                required />
                        </div>
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">Date</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Date"
                                name="eventDate" value="<?php echo $_SESSION["eventDate"];?>" required />
                        </div>
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">
                                Location
                            </label>
                            <input class="form-control" id="exampleFormControlInput1" placeholder="Location" type="text"
                                name="eventLocation" value="<?php echo $_SESSION["eventLocation"];?>" required />
                        </div>
                        <div class="mb-3 sb-3 b-3">
                            <label for="formFile" class="form-label">Event Poster</label>
                            <input class="form-control" type="file" name="file" id="formFile">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">Timings</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Timings"
                                name="eventTimings" value="<?php echo $_SESSION["eventTimings"];?>" required />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea name="eventDescription" class="form-control" id="exampleFormControlTextarea1"
                                rows="4"><?php echo $_SESSION["eventDescription"];?></textarea>
                        </div>
                        <div class="mb-3 sb-3 b-3">
                            <label for="exampleFormControlInput1" class="form-label">Ticket Price</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Price"
                                name="price" value="<?php echo $_SESSION["price"];?>" required />
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto my-4">
                        <button type="submit" name="submit" class="btn btn-outline-dark">
                            Add
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