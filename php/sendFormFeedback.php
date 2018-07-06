<?php


if (isset($_GET["watch"]) && $_GET["watch"]==1) {
    foreach ($_GET as $val => $val2) {
        echo "$val: $val2 <br>";
    }
}


$uw_email = isset($_GET["uw_email"])? $_GET["uw_email"] : null;
$opleiding = isset($_POST["opleiding"])? $_POST["opleiding"] : null;
$watch = isset($_GET["watch"])? true: false;
$insert = isset($_GET["insert_form"])? true: false;



$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
$url = $base_url . $_SERVER["REQUEST_URI"];


$url = str_replace("&watch=0","",$url);
$url = str_replace("&watch=1","",$url);
$url = str_replace("&send_email=1","",$url);
$url = str_replace("&send_email=0","",$url);
$url = str_replace("&insert_form=1","",$url);
$url = str_replace("&insert_form=1=0","",$url);



if (isset($_GET["send_email"]) && $_GET["send_email"]==1  && $watch === false && $insert == false) {
    $to = $uw_email;
    $subject = "MA inschrijf formulier ingevuld door mentor";

    $message = 'Uw mentor heeft het MA inschrjf formulier ingevuld.<br>U kunt het formulier bekijken op deze link:
<a href="' . $url . "&watch=1" . '">Klik hier om het ingevulde formulier te bekijken</a> <br><br>
Om door te gaan met de inschrijving drukt u op deze link<br>
<a href="' . $url . "&insert_form=1". '">akkoord gaan met formulier</a>';

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: info@frozenbutton.eu' . "\r\n";

    mail($to, $subject, $message, $headers);

}
$watchlink = $url . "&watch=1";

if (isset($_GET["insert_form"]) && $_GET["insert_form"]==1 && $watch === false) {
            echo "Het formulier is verzonden";
    $dbc = new PDO('mysql:hosts=localhost;dbname=mauridr288_examen', 'mauridr288_examen', 'examen', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"]);

    $register_user = $dbc->prepare("INSERT INTO `formulieren`(`naam`, `link`) VALUES (?, ?)");
    $register_user->bindParam(1, $_GET["Voornaam"]);
    $register_user->bindParam(2,$watchlink);
    $register_user->execute();
}
