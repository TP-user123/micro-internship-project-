<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $secretKey = "6Ldno18qAAAAAAqtEKfgGJKW-Q0oYAiQZ1WR95fD";
    $captchaResponse = $_POST['g-recaptcha-response'];

    if (!$captchaResponse) {
        echo "<div class='error-message'>Please complete the reCAPTCHA.</div>";
        exit;
    }

    // Verify the CAPTCHA
    $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $captchaResponse;
    $response = file_get_contents($verifyUrl);
    $responseKeys = json_decode($response, true);
    echo $response;

    if (!$responseKeys['success']) {
        echo "<div>reCAPTCHA verification failed. Please try again.</div>";
        exit;
    }
    else{
        echo "<div>reCAPTCHA verification success.</div>";
    }
   
}
?>
