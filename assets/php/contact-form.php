<?php
    // Sanitize and validate input data
    function sanitize_input($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    $name = sanitize_input($_POST['name']);
    $email = filter_var(sanitize_input($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = sanitize_input($_POST['subject']);
    $message = sanitize_input($_POST['message']);

    if ($name && $email && $subject && $message) {
        $to = 'hello@cortexstudio.in'; // <-- Enter your E-Mail address here.
        $body = "From: $name <br> E-Mail: $email <br> Message: <br> $message";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From:' . $email . "\r\n";
        $headers .= 'Cc:' . $email . "\r\n";

        if (mail($to, "New Message from Website: $subject", $body, $headers)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
?>
