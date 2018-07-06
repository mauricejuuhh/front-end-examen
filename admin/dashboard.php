<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Mediacollege Inlichtingenformulier</title>
    <meta name="description" content="Op dit inlichtingenformulier kunt u zich aanmelden voor het Mediacollege Amsterdam.">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="3 days">
    <meta name="language" content="nl">
    <meta name="web_author" content="Maurice de Jong">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" type="image/png" href="../images/favicon.png">
    <meta name="theme-color" content="#424242">

    <meta property="og:url" content="https://frozenbutton.eu/front/">
    <meta property="og:title" content="Mediacollege Inlichtingenformulier">
    <meta property="og:image" content="https://frozenbutton.eu/front/images/ma.png">
    <meta property="og:image:secure_url" content="https://frozenbutton.eu/front/images/ma.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="130" />
    <meta property="og:image:height" content="130" />
    <meta property="og:image:alt" content="Mediacollege logo" />
    <meta property="og:site_name" content="frozenbutton.eu/front">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Het inlichtingenformulier van Mediacollege Amsterdam">

    <meta name="twitter:image" content="https://frozenbutton.eu/front/images/ma.png">
    <meta name="twitter:title" content="Mediacollege Inlichtingenformulier">
    <meta name="twitter:description" content="Het inlichtingenformulier van Mediacollege Amsterdam">
    <meta name="twitter:site" content="https://frozenbutton.eu/front/">


    <link rel="canonical" href="https://frozenbutton.eu/front/" />

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>



<?php

$admin = isset($_POST["admin"])? $_POST["admin"] : null;
$password = isset($_POST["password"])? $_POST["password"] : null;

if (isset($admin) && isset($password) && $_POST["admin"] == "admin" && $_POST["password"] == "12345") {
?>



<body class="grey lighten-3">


<main class="col s12 center content-page form-center">
    <div class="form-center-mid">
        <div class="form_page">
            <form action="/admin/dashboard.php" method="post">
                <div class="col l12 center">
                    <div class="title col s12 "><h1>MA Admin login</h1></div>
                    <div class="row">
                        <div class="col s10 offset-s1 m6 offset-m3 l4 offset-l4">
                            <div class="col s6">
                        <span class="pink-text">Naam</span>
                            </div>
                            <div class="col s6">
                                link
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <?php

                        $dbc = new PDO('mysql:hosts=localhost;dbname=mauridr288_examen', 'mauridr288_examen', 'examen', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"]);
                        $select_formulieren = $dbc->prepare("SELECT * FROM `formulieren`");
                        $select_formulieren->execute();


                        while ($select = $select_formulieren->fetch()) {
                            echo '                        
                        <div class="col s10 offset-s1 m6 offset-m3 l4 offset-l4">
                            <div class="col s6">
                        <span class="pink-text">'. $select["naam"].'</span>
                            </div>
                            <div class="col s6">
                                <a href="'. $select["link"].'">Bekijk formulier</a>
                            </div>
                        </div>';
                        }

                        ?>

                    </div>
                </div>
            </form>
        </div>
    </div>

</main>
<footer class="col s12 center grey lighten-2">© Copyright Megaserverlist 2018 - <?php echo date('Y'); ?>. Alle rechten voorbehouden</footer>

<?php } else {
    header("Location: /admin/index.php");
    die();}?>

<!--JavaScript at end of body for optimized loading-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../js/startform.js"></script>
<script src="../js/materialize.min.js"></script>
</body>
</html>