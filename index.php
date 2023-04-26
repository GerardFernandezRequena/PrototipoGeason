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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="static/css/index.css">
    <link rel="stylesheet" href="static/css/button.css">
    <title>Pagina Principal</title>
</head>

<body onload="openAd()">
    <?php include("navbar.php"); ?>

    <div id="carouselExampleCaptions" class="carousel slide m-4" data-bs-ride="carousel">
        <div id="carouselExampleCaptions" class="carousel slide m-4" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="static/img/gerard2.png" class="d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Gerard Fernàndez Requena</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="static/img/marc2.png" class="d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Marc Bouzas Guadalupe</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="static/img/nil2.png" class="d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Nil Carvajal Playa</h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 m-4">
            <div class="col">
                <div class="card h-100">
                    <img src="static/img/nil2.png" class="card-img-top" alt="#">
                    <div class="card-body">
                        <h5 class="card-title">Nil Carvajal Playa</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="static/img/gerard2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Gerard Fernàndez Requena</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="static/img/marc2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Marc Bouzas Guadalupe</h5>
                    </div>
                </div>
            </div>
        </div>
        <div id="ad"></div>
</body>
<script src="./static/js/ad.js"></script>

</html>