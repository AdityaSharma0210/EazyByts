<?php
session_start(); 
if (!isset($_SESSION['userinfo'])) {
    header("Location: login.php");
    exit;
}
include "db-connect.php";
error_reporting(E_ALL ^ E_WARNING);
$userinfo=$_SESSION['userinfo'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg nav1">
            <div class="container-fluid">
                <a class="navbar-brand" style="font-size: 5vh;" href="#">
                    <img src="srcimg/logo.png" class="img-fluid img1">
                    <img src="srcimg/logo2.png" class="img-fluid img2">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ul1">
                        <li class="nav-item">
                            <a class="nav-link n1" aria-current="page" href="index.php?#Events">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link n1" href="add-event.php">Add Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link n1" href="bookings.php">My Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link n1" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row">
            <div class="e1">
                <h1>My Tickets</h1>
            </div>
            <?php
                $stmt = $conn->prepare("SELECT e.eventName, e.eventDate, e.eventLocation, e.eventTimings, e.file
                FROM tbl_bookings b
                JOIN tbl_events e ON b.eventId = e.eventId where b.usersinfo=:userinfo ");
                $stmt->bindParam(':userinfo', $userinfo);
                $stmt->execute();
                while($row=$stmt->fetch())
                {
                ?>
            <div class="col-md-4 col-sm-4 col-6 b1">
                <div class="card text-bg-info mb-3 crd2" style="max-width: 540px; margin:10px auto">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="srcimg/qr.jpg" class="img-fluid rounded-start imgcrd" alt="...">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title ct1"><?php echo $row["eventName"] ?></h5>
                                <hr>
                                <p class="card-text"><img src="srcimg/date.png" class="imglogo">
                                    <?php echo $row["eventDate"] ?>
                                </p>
                                <p class="card-text"><img src="srcimg/loc.png" class="imglogo">
                                    <?php echo $row["eventLocation"] ?></p>
                                <p class="card-text"><img src="srcimg/clock.png" class="imglogo">
                                    <?php echo $row["eventTimings"] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php
            }
            ?>
        </div>

        <div class="row r3">
            Copyright &copy Eventopia 2024
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