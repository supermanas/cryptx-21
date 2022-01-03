<?php

include "db.php";

$table = "hunt";

$emails = mysqli_query($conn,"SELECT email FROM $table");

while ($row = mysqli_fetch_array($emails)) {

    $email = $row['email'];
    
    $token = md5($email).rand(10,9999);

    $update = mysqli_query($conn,"UPDATE $table set reset_link_token='" . $token . "' WHERE email='" . $email . "'");

    $to = $email;
    $subject = 'Reset Password (.createch 3.0: DE-CRYPTX)';
    $message_body = '
    Greetings from .createch!
    We need you to reset your password for the Cryptic Hunt due to some technical errors on the server. We apologize for the inconvenience.
    Please reset your password for De-cryptx using the following link:
    https://cryptx.createchclub.xyz/reset_password.php?key='.$email.'&token='.$token;

    mail( $to, $subject, $message_body );
}

echo "<script>alert('Success')</script>";
?>