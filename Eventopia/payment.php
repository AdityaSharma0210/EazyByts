<?php
require ('config.php');
error_reporting(E_ALL ^ E_WARNING);
session_start(); 
include "db-connect.php";

$payId=$_REQUEST["payId"];
$stmt = $conn->prepare("select * from tbl_events where eventId=:payId");
$stmt->bindParam(":payId",$payId);
$stmt->execute();
$row=$stmt->fetch();

$price			=$row["price"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center" style="margin: 50px auto;">
                <form action="submit.php" method="post">
                    <input type="hidden" name="amount" value="<?php echo ($price * 100); ?>" /> <!-- Amount in cents -->
                    <input type="hidden" name="payId" value="<?php echo $payId; ?>" /> <!-- Event ID -->
                    <div class="card text-bg-light">
                        <h5 class="card-header"><img src="srcimg/logo.png" class="img-fluid"></h5>
                        <div class="card-body">
                            <h3 class="card-title">Checkout</h3>
                            <p class="card-text" style="font-size:20px;font-weight:bold">Price: Rs.<?php echo $price; ?>
                            </p>

                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="<?php echo $publishableKey?>" data-amount="<?php echo ($price*100) ?>"
                                data-name="Eventopia Checkout" data-description="Billing" data-image="srcimg/logo2.png"
                                data-currency="inr">
                            </script>

                        </div>
                    </div>
                </form>
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