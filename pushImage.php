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
} else {
    header("location:index.php");
}

$i = isset($_SESSION['uploadResult']) ? $_SESSION['uploadResult'] : 0;
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
    <title>Pujar Imatge</title>
</head>

<body onload="openAd()">

    <?php include("navbar.php"); ?>

    <div class="col-md-6 offset-md-3 my-5">
        <h1>Carrega de fitxers</h1>
        <form action="static/php/funcionsUpload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName">Nom</label>
                <input type="text" name="nameImage" class="form-control" id="nameImage" placeholder="Nom Imatge" required="required">
            </div>
            <div class="form-group">
                <label for="exampleInputName">Descripció</label>
                <input type="text" name="desImage" class="form-control" id="desImage" placeholder="Descripció Imatge" required="required">
            </div>
            <hr>
            <div class="form-group">
                <label for="exampleInputName">Escull el color de fons:</label>
                <br><br>
                <input type="color" name="colorElegido" id="colorElegido">
            </div>
            <div class="form-group mt-3">
                <label class="mr-2">Carrega el teu archiu:</label>
                <input type="file" name="img" id="img">
            </div>
            <hr>

            <input type="hidden" name="idusuari" id="idusuari" value="0">
            <input type="hidden" name="year" id="year">
            <input type="hidden" name="month" id="month">
            <button type="submit" class="btn btn-primary mb-5" id="Enviar" name="Enviar">Pujar</button>
            <?php
            switch ($i) {
                case 1:
                    echo "<div class='alert alert-success' role='alert'>";
                    echo    "Arxiu pujat Correctament!";
                    echo "</div>";
                    $_SESSION['uploadResult'] = 0;
                    break;
                case 2:
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo    "Error!!! Arxiu erroni!";
                    echo "</div>";
                    $_SESSION['uploadResult'] = 0;
                    break;
                case 3:
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo    "Error!!! Teniu que ser un fitxer JPG o PNG!";
                    echo "</div>";
                    $_SESSION['uploadResult'] = 0;
                    break;
                case 4:
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo    "Error!!! Arxiu erroni!";
                    echo "</div>";
                    $_SESSION['uploadResult'] = 0;
                    break;
            }
            ?>
        </form>
    </div>
    <div id="ad"></div>
</body>
<script src="./static/js/ad.js"></script>
<script src="static/js/image.js"></script>

</html>