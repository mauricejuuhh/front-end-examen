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
$uw_email = isset($_GET["uw_email"])? $_GET["uw_email"] : null;
$naam = isset($_GET["naam"])? $_GET["naam"] : null;
$opleiding = isset($_GET["naam"])? $_GET["naam"] : null;
$email_mentor = isset($_POST["email_mentor"])? $_POST["email_mentor"] : null;
?>
<body class="grey lighten-3">

<nav class="grey darken-2">
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</nav>


<ul id="slide-out" class="sidenav ownsidenav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="../images/background-nav.jpg" alt="Mediacollege school">
            </div>
            <img class="circle user-image" src="../images/ma-logo.svg" alt="Mediacollege logo">
            <div id="nav-name" class="white-text name">Mediacollege Amsterdam</div>
        </div>
    </li>
    <li><a class="waves-effect menu-button"><i class="material-icons">account_circle</i>Uw info</a></li>
    <li><a class="waves-effect menu-button"><i class="material-icons">import_contacts</i>Opleiding</a></li>
    <li><a class="waves-effect menu-button"><i class="material-icons">domain</i>Indruk op school</a></li>
    <li><a class="waves-effect menu-button"><i class="material-icons">announcement</i>Bijzonderheden</a></li>
    <li><a class="waves-effect menu-button"><i class="material-icons">person</i>Mentor</a></li>
    <li><a class="waves-effect menu-button"><i class="material-icons">send</i>Versturen</a></li>
</ul>


<div class="form grey lighten-3">

    <div class="form-center">

        <main class="form-center-mid">
            <div class="form_page">

                <div class="col l12 center">
                    <div class="title col s12"><h1>Welkom op het inschrijf formulier van MA</h1></div>
                    <div class="form_page_invalid center red-text text-darken-1 col s12">Zorg ervoor dat alle velden volledig worden ingevuld</div>
                </div>

                <div class="row">
                    <div class="col offset-s2 s8 offset-m3 m6 offset-l3 l6 offset-xl4 xl4">
                        <div class="row">


                            <div class="col s12 l5 push-l7">
                                <div class="img-block profile-picture">
                                    <label for="imgInp"><img class="user-image" id="upload" src="../images/ma-logo.svg" alt="Mediacollege logo"></label>
                                </div>
                            </div>


                            <div class="col s12 l7 pull-l5">
                                <div class="input-field col s12">
                                    <input id="form_firstname" name="Naam" type="text" class="activeInputField" value="<?php if (isset($naam)) {echo $naam;} ?>">
                                    <label for="form_firstname">Naam leerling</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="birthdate_student" name="Geboortedatum" type="text" class="datepicker activeInputField">
                                    <label for="birthdate_student" class="active">Geboortedatum</label>
                                </div>
                                <input hidden type='file' id="imgInp" accept="image/*" />
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="form_page">
                <div class="col l12 center">
                    <div class="title col 12"><h2>Welke opleiding volgt de leerling?</h2></div>
                    <div class="form_page_invalid center red-text text-darken-1 col s12">Zorg ervoor dat alle velden volledig worden ingevuld</div>
                </div>

                <div class="row">
                    <div class="col s12 offset-l1 l10">
                        <div class="input-field col s12 center">
                            <select name="Leerweg" id="leerweg_select" class="form_check_input">
                                <option value="" disabled selected>Kies een leerweg</option>
                                <option value="0">vmbo</option>
                                <option value="1">havo</option>
                                <option value="1">vwo</option>
                                <option value="2">mbo</option>
                                <option value="">anders</option>
                            </select>
                            <label for="leerweg_select">Leerweg</label>
                        </div>


                        <div class="leerweg_input_page">
                            <div class="input-field col s12 m6 center">
                                <select name="Niveau" id="select_niveau">
                                    <option value="bb" selected>bb</option>
                                    <option value="kb">kb</option>
                                    <option value="gl">gl</option>
                                    <option value="tl">tl</option>
                                    <option value="lwt">lwt</option>
                                    <option value="+ lwoo">+ lwoo</option>
                                </select>
                                <label for="select_niveau">Niveau</label>
                            </div>

                            <div class="input-field col s12 m6">
                                <select name="Sector" id="select_sector">
                                    <option value="Economie" selected>Economie</option>
                                    <option value="Landbouw">Landbouw</option>
                                    <option value="Techniek">Techniek</option>
                                    <option value="zorg & welzijn">zorg & welzijn</option>
                                </select>
                                <label for="select_sector">Sector</label>
                            </div>


                            <div class="input-field col s12">
                                Heeft de leerling een keuzevak MVI gedaan?
                                <div class="breakPoint">
                                    <label class="noPosition">
                                        <input class="with-gap" name="mvi_radio" type="radio" value="1"/>
                                        <span>Ja</span>
                                    </label>
                                    <label class="noPosition">
                                        <input class="with-gap" name="mvi_radio" type="radio" value="0" checked/>
                                        <span>Nee</span>
                                    </label>
                                </div>
                            </div>

                            <div class="mvi_radio-tab">
                                <div class="input-field col s12">
                                    <input name="Mvi toelichting" id="mvi_explanation" type="text" class="form_check_leerweg_input">
                                    <label for="mvi_explanation">zo ja welke:</label>
                                </div>
                            </div>


                            <div class="col s12">
                                Diploma
                                <div class="input-field inline">
                                    <select name="Naam" id="select_diploma-vmbo">
                                        <option value="behaald" selected>behaald</option>
                                        <option value="te behalen">te behalen</option>
                                    </select>
                                </div>


                                <div class="breakPoint">
                                    op:

                                    <div class="inline input-field">
                                        <input id="diploma_date" type="text" class="datepicker form_check_leerweg_input">
                                        <label for="diploma_date">Datum</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="leerweg_input_page">
                            <div class="col s12">
                                Diploma
                                <div class="input-field inline">
                                    <select id="select_diploma-havo-vwo">
                                        <option value="behaald" selected>behaald</option>
                                        <option value="te behalen">te behalen</option>
                                    </select>
                                </div>
                                <div class="breakPoint">
                                    op:

                                    <div class="inline input-field">
                                        <input id="date-diploma-havo-vwo" type="text" class="datepicker form_check_leerweg_input">
                                        <label for="date-diploma-havo-vwo" class="active">Datum</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">

                                <div class="col s12 nopadding">
                                    Overgangsbewijs van leerjaar:
                                    <div class="input-field inline">
                                        <input id="input_year1" type="text" class="form_check_leerweg_input">
                                        <label for="input_year1">Jaar</label>
                                    </div>
                                    <div class="breakPoint">
                                        naar leerjaar:
                                        <div class="input-field inline">
                                            <input id="input_year2" type="text" class="form_check_leerweg_input">
                                            <label for="input_year2">Jaar</label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="leerweg_input_page">

                            <div class="input-field col s6 center">
                                <select id="select_leerweg">
                                    <option value="bol" selected>BOL</option>
                                    <option value="bbl">BBL</option>
                                </select>
                                <label for="select_leerweg">Leerweg</label>
                            </div>

                            <div class="input-field col s6 center">
                                <select id="select_opleidingsniveau">
                                    <option value="1" selected>Niveau 1</option>
                                    <option value="2">Niveau 2</option>
                                    <option value="3">Niveau 3</option>
                                    <option value="4">Niveau 4</option>
                                </select>
                                <label for="select_opleidingsniveau">Opleidingsniveau</label>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="form_page" style="line-height: 45px;">
                <div class="col l12 center">
                    <div class="title col s12"><h2>Hoe is uw indruk op school over de leerling?</h2></div>
                    <div class="form_page_invalid center red-text text-darken-1 col s12">Zorg ervoor dat alle velden volledig worden ingevuld</div>
                </div>

                <div class="row">
                    <div class="col s12 l5"></div>
                    <div class="col s12 l7">
                        <div class="col s3 center bold">Goed</div>
                        <div class="col s3 center bold">Vold..</div>
                        <div class="col s3 center bold">Zwak</div>
                        <div class="col s3 center bold">Onvold..</div>
                    </div>
                </div>

                <div class="row">


                    <div class="pink-text grey lighten-2 col s12 bold">werkhouding</div>
                    <div class="col s12 l5">Consentratie</div>
                    <div class="col s12 l7">
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Consentratie_radio_button" type="radio" value="Goed"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Consentratie_radio_button" type="radio" value="Voldoende"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Consentratie_radio_button" type="radio" value="Zwak"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Consentratie_radio_button" type="radio" value="Onvoldoende"/>
                                <span></span>
                            </label>
                        </div>
                    </div>


                    <div class="col s12 l5">Werktempo</div>
                    <div class="col s12 l7">
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Werktempo_radio_button" type="radio" value="Goed"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Werktempo_radio_button" type="radio" value="Voldoende"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Werktempo_radio_button" type="radio" value="Zwak"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Werktempo_radio_button" type="radio" value="Onvoldoende"/>
                                <span></span>
                            </label>
                        </div>
                    </div>


                    <div class="col s12 l5">Zelfstandig werken</div>
                    <div class="col s12 l7">
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="ZelfstandigWerken_radio_button" type="radio" value="Goed"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="ZelfstandigWerken_radio_button" type="radio" value="Voldoende"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="ZelfstandigWerken_radio_button" type="radio" value="Zwak"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="ZelfstandigWerken_radio_button" type="radio" value="Onvoldoende"/>
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="pink-text grey lighten-2 col s12 bold">Instelling</div>
                    <div class="col s12 l5">Motivatie</div>
                    <div class="col s12 l7">
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Motivatie_radio_button" type="radio" value="Goed"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Motivatie_radio_button" type="radio" value="Voldoende"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Motivatie_radio_button" type="radio" value="Zwak"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Motivatie_radio_button" type="radio" value="Onvoldoende"/>
                                <span></span>
                            </label>
                        </div>
                    </div>


                    <div class="col s12 l5">Doorzettingsvermogen</div>
                    <div class="col s12 l7">
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Doorzettingsvermogen_radio_button" type="radio" value="Goed"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Doorzettingsvermogen_radio_button" type="radio" value="Voldoende"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Doorzettingsvermogen_radio_button" type="radio" value="Zwak"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Doorzettingsvermogen_radio_button" type="radio" value="Onvoldoende"/>
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="pink-text grey lighten-2 col s12 bold">Vaardigheden - Communicatieve</div>
                    <div class="col s12 l5">Vaardigheden</div>
                    <div class="col s12 l7">
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Vaardigheden_radio_button" type="radio" value="Goed"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Vaardigheden_radio_button" type="radio" value="Voldoende"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Vaardigheden_radio_button" type="radio" value="Zwak"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="Vaardigheden_radio_button" type="radio" value="Onvoldoende"/>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="col s12 l5">Sociale vaardigheden</div>
                    <div class="col s12 l7">
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="SocialeVaardigheden_radio_button" type="radio" value="Goed"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="SocialeVaardigheden_radio_button" type="radio" value="Voldoende"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="SocialeVaardigheden_radio_button" type="radio" value="Zwak"/>
                                <span></span>
                            </label>
                        </div>
                        <div class="col s3 center">
                            <label>
                                <input class="with-gap" name="SocialeVaardigheden_radio_button" type="radio" value="Onvoldoende"/>
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px;">
                    <div class="input-field col s12">
                        <input id="input_toelichting" type="text" class="activeInputField">
                        <label for="input_toelichting">Toelichting</label>
                    </div>
                </div>


            </div>
            <div class="form_page">
                <div class="col l12 center">
                    <div class="title col s12"><h2>Bijzonderheden</h2></div>
                    <div class="form_page_invalid center red-text text-darken-1 col s12">Zorg ervoor dat alle velden volledig worden ingevuld</div>
                </div>
                <div class="row">
                    <div class="pink-text bold grey lighten-2 padding">Heeft de leerling een aandoening en/of beperking die van invloed op de studie is of kan zijn?
                    </div>
                    <table>
                        <tr>
                            <th class="notBold">Volgt de leerling speciaal onderwijs?</th>
                            <th class="center">
                                <div class="switch">
                                    <label>
                                        Nee
                                        <input type="checkbox" id="check1">
                                        <span class="lever"></span>
                                        Ja
                                    </label>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td class="notBold">Heeft de leerling dyslexie?</td>
                            <th class="center">
                                <div class="switch">
                                    <label>
                                        Nee
                                        <input type="checkbox" id="check2">
                                        <span class="lever"></span>
                                        Ja
                                    </label>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td class="notBold">Heeft de leerling dyscalculie?</td>
                            <td class="center">
                                <div class="switch">
                                    <label>
                                        Nee
                                        <input type="checkbox" id="check3">
                                        <span class="lever"></span>
                                        Ja
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="notBold">Is de leerling recent besproken in het extern zorg- en adviesteam
                                (ZAT)
                            </td>
                            <td class="center">
                                <div class="switch">
                                    <label>
                                        Nee
                                        <input type="checkbox" id="check4">
                                        <span class="lever"></span>
                                        Ja
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="notBold">Ontvangt de leerling nog andere zorg?</td>
                            <td class="center">
                                <div class="switch">
                                    <label>
                                        Nee
                                        <input type="checkbox" id="toggle_box">
                                        <span class="lever"></span>
                                        Ja
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="row">
                    <div class="input-field col s12" id="toggle_box2">
                        <input id="input_zorg1" type="text" class="form_check_input">
                        <label for="input_zorg1">Zoja, welke zorg?</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="input_persoonlijke-omstandigheden" type="text" class="activeInputField">
                        <label for="input_persoonlijke-omstandigheden">andere persoonlijke omstandigheden?</label>
                        <span class="helper-text">Hieronder verstaat het Mediacollege Amsterdam bijzonderheden/beperkingen die van invloed kunnen zijn op het succesvol volgen van de opleiding zoals o.a. epilepsie, slechthorendheid, ADHD, suikerziekte etc.</span>
                    </div>
                </div>


            </div>
            <div class="form_page">
                <div class="col l12 center">
                    <div class="title col s12"><h2>Uw gegevens</h2></div>
                    <div class="form_page_invalid center red-text text-darken-1 col s12">Zorg ervoor dat alle velden volledig worden ingevuld</div>
                </div>

                <div class="row">
                    <div class="col s12 m8 offset-m2 l8 offset-l2 xl6 offset-xl3">
                        <div class="input-field col s12 m7">
                            <input id="naam_mentor" type="text" class="activeInputField" value="<?php if (isset($email_mentor)) {echo $email_mentor;} ?>">
                            <label for="naam_mentor">Naam mentor</label>
                        </div>
                        <div class="input-field col s12 m5">
                            <select id="gender_mentor">
                                <option value="Man" selected>Man</option>
                                <option value="Vrouw">Vrouw</option>
                            </select>
                            <label for="gender_mentor">Gender</label>
                        </div>


                        <div class="input-field col s12">
                            <input id="functie_mentor" type="text" class="activeInputField">
                            <label for="functie_mentor">Functie</label>
                        </div>


                        <div class="input-field col s12">
                            <input id="email_mentor" type="email" class="activeInputField">
                            <label for="email_mentor">Email</label>
                        </div>


                        <div class="input-field col s12 m6">
                            <input id="naam_School_mentor" type="text" class="activeInputField">
                            <label for="naam_School_mentor">Naam School</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="plaats_mentor" type="text" class="activeInputField">
                            <label for="plaats_mentor">Plaats</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="telefoon_mentor" type="text" class="activeInputField">
                            <label for="telefoon_mentor">Telefoon</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <select id="telefonisch_contact_mentor">
                                <option value="yes" selected>Ja</option>
                                <option value="no">Nee</option>
                            </select>
                            <label for="telefonisch_contact_mentor">Telefonisch contact gewenst?</label>
                        </div>


                    </div>
                </div>


            </div>
            <div class="form_page">

                <div class="row">
                    <div class="col s12 center">
                        <div class="title col s12"><h2>versturen</h2></div>
                        <div class="form_page_invalid center red-text text-darken-1 col s12">Zorg er voor dat de recaptcha is aangevinkt</div>
                        <div id="grecaptcha"></div>
                    </div>
                </div>

                <div class="row">
                    <div id="verstuurrow" class="col s12 center">
                        <button class="btn waves-effect waves-light" type="submit" id="sendbutton" name="action">Verstuur
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>

            </div>


            <div class="form_send_page">
                <div class="title col s12">Uw formulier is verzonden</div>
                <div class="col s12 center pink-text">Uw formulier is goed bij ons aangekomen.<br>
                    Heeft u vragen over dit formulier? Dan kunt u ze altijd stellen via de e-mail:<br>
                    info@ma-web.nl</div>
            </div>

        </main>

    </div>
</div>

<div class="navigation-bar col l12 grey lighten-2">
    <div class="right">
        <a class="waves-effect waves-light btn-small disabled" id="previous">Vorige</a> <a
            class="waves-effect waves-light btn-small" id="next">Volgende</a>
    </div>
</div>


<!--JavaScript at end of body for optimized loading-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=loadapi&render=explicit" async defer></script>
<script src="../js/recaptcha.js"></script>
<script>
    $uw_email = "<?php if (isset($uw_email)) {echo $uw_email;} ?>";
    $opleiding = "<?php if (isset($opleiding)) {echo $opleiding;} ?>";
</script>
<script src="../js/form.js"></script>
<script src="../js/materialize.min.js"></script>
</body>
</html>
