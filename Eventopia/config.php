<?php
require ('stripe-php-master/init.php');

$publishableKey="here is the publishable key";

$secretKey="here is the secret key";

\Stripe\Stripe::setApiKey($secretKey);

?>
