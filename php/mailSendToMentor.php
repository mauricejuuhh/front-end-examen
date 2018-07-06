<?php

$email_mentor = isset($_POST["email_mentor"])? $_POST["email_mentor"] : null;
$uw_email = isset($_POST["uw_email"])? $_POST["uw_email"] : null;
$naam = isset($_POST["naam"])? $_POST["naam"] : null;
$opleiding = isset($_POST["opleiding"])? $_POST["opleiding"] : null;


if (isset($uw_email) && isset($email_mentor) && isset($naam) && isset($opleiding)) {

    $to = $email_mentor;
    $subject = "Nieuwe aanmelding van " . htmlentities($naam). " - MA inschriformulier";

    $message =  htmlentities($naam) . ' wilt zich graag aanmelden als '. htmlentities($opleiding) .' op het MediaCollege.<br><br> Daarvoor moet er een formulier ingevuld worden over de leerling. <br>
Link:<br>
<a href="https://frozenbutton.eu/formulier/index.php?naam='. urldecode($naam) . '&uw_email='. urldecode($uw_email).'&opleiding='. urldecode($opleiding).'">
https://frozenbutton.eu/formulier/index.php?naam='. urldecode($naam) . '&uw_email='. urldecode($uw_email).'&opleiding='. urldecode($opleiding) . '</a>';

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: info@frozenbutton.eu' . "\r\n";

    mail($to, $subject, $message, $headers);

}