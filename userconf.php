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
$error = returnSes("error");
if ($idUser) {
    $imguser = selectUserInfoById($mysqli, $idUser, "imguser");
    $nameuser = selectUserInfoById($mysqli, $idUser, "nameuser");
    $password = selectUserInfoById($mysqli, $idUser, "passworduser");
} else {
    header("location:index.php");
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
    <link rel="stylesheet" href="static/css/userconf.css">
    <title>Perfil d'usuari</title>
</head>

<body>
    <?php include("navbar.php"); ?>

    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form" action="./static/php/functionsUser.php" method="post">
                <span class="contact100-form-title">
                    Perfil d'usuari
                </span>
                <div class="wrap-input100">
                    <span class="label-input100">Nom usuari</span>
                    <input class="input100" type="text" name="nameuser" id="nameuser" placeholder="..." value="<?= $nameuser ?>">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100">
                    <span class="label-input100">Contrasenya</span>
                    <input class="input100" type="password" name="password" id="password" placeholder="Contrasenya">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100">
                    <span class="label-input100">Confirmar contrasenya</span>
                    <input class="input100" type="password" name="repassword" id="repassword" placeholder="Confirma la contrasenya">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100">
                    <span class="label-input100">Imatge</span><br>
                    <input type="radio" name="imguser" value="1"><img src="./static/img/profile_1.png" width="50px"><br>
                    <input type="radio" name="imguser" value="2"><img src="./static/img/profile_2.png" width="50px"><br>
                    <input type="radio" name="imguser" value="3"><img src="./static/img/profile_3.png" width="50px"><br>
                    <input type="radio" name="imguser" value="4"><img src="./static/img/profile_4.png" width="50px"><br>
                    <input type="radio" name="imguser" value="5"><img src="./static/img/profile_5.png" width="50px">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn">
                            <span>Actualitzar</span>
                        </button>
                    </div>
                </div>
            </form>
            <?php
            switch ($error) {
                case 1:
                    echo "<div class='alert alert-success' role='alert'>";
                    echo    "Perfil actualitzat correctament!!!";
                    echo "</div>";
                    $_SESSION['error'] = 0;
                    break;
                case 2:
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "Error: Connexio amb BBDD!!!";
                    echo "</div>";
                    $_SESSION['error'] = 0;
                    break;
                case 3:
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "No has fet res!!!";
                    echo "</div>";
                    $_SESSION['error'] = 0;
                    break;
                case 4:
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "Les contrasenyes no son iguals!!!";
                    echo "</div>";
                    $_SESSION['error'] = 0;
                    break;
            }
            ?>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>