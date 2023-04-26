<?php
session_start();
require_once("static/php/inc/funcions.php");
require_once("static/php/inc/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
if (!$mysqli) {
    echo "Error: Conexió amb BBDD";
}

$idUser = returnSes("idUser");
if ($idUser) {
    $imguser = selectUserInfoById($mysqli, $idUser, "imguser");
    $nameuser = selectUserInfoById($mysqli, $idUser, "nameuser");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="./static/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="static/css/index.css">
    <link rel="stylesheet" href="static/css/select.css">
    <link rel="stylesheet" href="static/css/button.css">
    <link rel="stylesheet" href="static/css/gallery.css">
    <link rel="shortcut icon" href="static/images/favicon.png" type="image/png">
    <title>Gal·leria</title>
</head>
<body onload="openAd()">

    <?php include("navbar.php"); ?>
    <div class="d-flex justify-content-center">
        <div class="flex-column mt-5">
            <div class="container">
                <select id="mesEscogido">
                    <option value="0">Escull un mes</option>
                    <option value="1">Gener</option>
                    <option value="2">Febrer</option>
                    <option value="3">Març</option>
                    <option value="4">Abril</option>
                    <option value="5">Maig</option>
                    <option value="6">Juny</option>
                    <option value="7">Juliol</option>
                    <option value="8">Agost</option>
                    <option value="9">Setembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Desembre</option>
                </select>
                <select id="anyEscogido">
                    <option selected value="0">Escull l'any</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
                <button type="button" class="btn btn-light" onclick="getImages()">Filtrar</button>
            </div>
        </div>
    </div>

    <div class='container mt-5' id="album">
        <div class='row row-cols-4 d-flex justify-content-center text-center mt-5' id="container-gallery1">

        </div>
    </div>

    <div class='container mt-5' id="instagram">
        <div class='row row-cols-1 d-flex justify-content-center text-center mt-5' id="container-gallery2">

        </div>
    </div>
    <div id="ad"></div>
</body>
<script src="./static/js/ad.js"></script>
<script src="static/js/gallery.js"></script>
</html>