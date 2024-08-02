<?php
require ('stripe-php-master/init.php');

$publishableKey="pk_test_51PiagqRo6JoCRkzkvpUDfoIrQ5Bdi9B4UpFAXfxpQPxZ0NaVg3Tp3qp4454xiM71KeyU81psiIR7nQdyTjOewGN800gzOet4iy";

$secretKey="sk_test_51PiagqRo6JoCRkzk2Vt74uyeU5vRzNoCNyUqWZC503RCshshELdCuD5rQPfRwWvjvvbXtSRKsqW1e2a5KgXPU8XS00P5ZsgfAi";

\Stripe\Stripe::setApiKey($secretKey);

?>