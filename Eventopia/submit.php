<?php
session_start(); 

require 'config.php';
include "db-connect.php";

\Stripe\Stripe::setApiKey($secretKey);

$token = $_POST['stripeToken'];
$amount = $_POST['amount']; // Amount in cents
$payId = $_POST['payId'];
$usersinfo=$_SESSION['userinfo'];


try {
    // Retrieve event details if needed
    $stmt = $conn->prepare("SELECT * FROM tbl_events WHERE eventId = :payId");
    $stmt->bindParam(":payId", $payId);
    $stmt->execute();
    $row = $stmt->fetch();

    $eventName = $row["eventName"]; // Example: Retrieve event name

    // Create a charge
    $charge = \Stripe\Charge::create([
        'amount' => $amount,
        'currency' => 'inr',
        'description' => "Ticket for $eventName",
        'source' => $token,
        'metadata' => ['eventId' => $payId],
    ]);

    $stmt = $conn->prepare("INSERT INTO tbl_bookings (usersinfo, eventId, amount, stripeChargeId) VALUES (:usersinfo, :eventId, :amount, :chargeId)");
    $stmt->bindParam(':usersinfo', $usersinfo);
    $stmt->bindParam(':eventId', $payId);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':chargeId', $charge->id);
    $stmt->execute();

    // echo '<h1>Payment Successful!</h1>';
    // echo 'Amount Charged: ' . number_format($amount / 100, 2) . ' INR<br>';
    // echo 'Event: ' . $eventName . '<br>';
} catch (\Stripe\Exception\CardException $e) {
    // Handle error
    echo '<h1>Payment Failed: ' . $e->getMessage() . '</h1>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="4;url=bookings.php" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body {
        font-family: cursive;
    }

    .n1 {
        font-size: 3vh;
        margin: 0px 0.75rem;
    }

    .ul1 a:hover {
        text-decoration: underline;
        text-underline-offset: 1rem;
        text-decoration-color: grey;
    }

    .ul1 {
        margin-left: 1rem;
    }

    .cr2 {
        height: 80vh;
    }

    @media only screen and (min-width:768px) {
        .nav1 {
            height: 17vh;
        }

        .cr1 {
            width: 100%;
            margin: auto;
            border-radius: 50px;

        }


        .cr2 img {
            border-radius: 50px;
        }


        .img1 {

            display: block;
        }

        .img2 {
            display: none;
        }
    }

    @media only screen and (max-width:768px) {
        .img1 {
            display: none;
        }

        .cr2 img {
            border-radius: 30px;
        }

    }

    @media only screen and (max-width:576px) {

        .img1 {
            display: none;
        }

        .img2 {
            display: block;
        }

        .cr1 {
            width: 100%;
            margin: auto;
            margin-top: 35px;

        }

        .cr2 {
            height: 30vh;
        }

        .cr2 img {
            border-radius: 20px;
        }

        .cr3 h5 {
            font-size: 10px;
        }

        .cr3 p {
            font-size: 8px;
        }

        .n1 {
            font-size: 12px;
        }

        #Events {
            font-size: 10px;
        }

        #Events .imgcrd {
            font-size: 8px;
        }

        .ct1 {

            font-size: 12px;
        }
    }

    .cr3 {
        background-color: rgb(0, 0, 0, 0.6);
        border-radius: 15px;
    }

    #navbarNav {
        justify-content: flex-end;
    }

    .r2 {
        margin-top: 5vh;
        height: 100vh;
    }

    .e1 {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px auto;
    }

    .ct1 {

        font-weight: bold;
    }

    .imgcrd img {
        object-fit: contain;
    }

    .card {
        box-shadow: 10px 10px 3px grey;
        border: 2px solid black;

    }

    .imglogo {
        height: 18px;
        width: 18px;
        margin-right: 5px;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="card text-bg-success mb-3" style="max-width:20rem; margin:15px auto;">
                <div class="card-header">
                    <h3>Payment Successful!</h3>
                    <h3>...Redirecting</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Event : <?php echo $eventName ?></h5>
                    <p class="card-text">Amount Charged : <?php echo number_format($amount / 100, 2)?> INR </p>
                </div>
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