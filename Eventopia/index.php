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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                            <a class="nav-link n1" aria-current="page" href="#Events">Events</a>
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
        <div class="cr1">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner cr1">
                    <div class="carousel-item active cr2">
                        <img src="srcimg/img3.jpg" class="d-block w-100 img-fluid" alt="...">
                        <div class="carousel-caption d-block d-md-block cr3">
                            <h5>Embrace the Moment</h5>
                            <p>"The purpose of life is to live it, to taste experience to the utmost, to reach out
                                eagerly and without fear for newer and richer experience." – Eleanor Roosevelt</p>
                        </div>
                    </div>
                    <div class="carousel-item cr2">
                        <img src="srcimg/img2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-block d-md-block cr3">
                            <h5>Find Joy in the Journey</h5>
                            <p>"Life is either a daring adventure or nothing at all." – Helen Keller</p>
                        </div>
                    </div>
                    <div class="carousel-item cr2">
                        <img src="srcimg/img1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-block d-md-block cr3">
                            <h5>Cherish the Fun</h5>
                            <p>"Do anything, but let it produce joy." – Walt Whitman</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row r2" id="Events">
            <div class="e1">
                <h1>Events</h1>
                <h6>Slide to view</h6>
            </div>
            <div class="row flex-row flex-nowrap overflow-auto rs" id="scrollable-row">
                <?php 
                        $stmt = $conn->query("select * from tbl_events ");
                        while($row=$stmt->fetch())
                        {
                        ?>
                <div class="col-md-3 col-sm-3 col-8 mob">
                    <div class="card mb-3">
                        <img src="poster/<?php echo $row["file"]?>" class="card-img-top img-fluid imgcrd" alt="...">
                        <div class="card-body crd">
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
                            <p class="card-text"><img src="srcimg/description.png" class="imglogo">
                                <?php echo $row["eventDescription"] ?></p>
                            <p class="card-text">
                                <a href="payment.php?payId=<?php echo $row["eventId"]; ?>"
                                    style="text-decoration:none;">
                                    <button type="button" class="btn btn-outline-dark btn-sm">
                                        Buy Tickets
                                    </button>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    ?>
            </div>
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
</script>

</html>