<?php
require_once("static/php/inc/funcions.php");
session_start();
$error = isset($_SESSION["errorNumero"]) ? $_SESSION["errorNumero"] : 0;
$emailregister = isset($_SESSION["emailregistersend"]) ? $_SESSION["emailregistersend"] : 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="static/css/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <?php
        if ($_SESSION["resultPass"] == 1) {
            echo "<script type='text/javascript'>alert('Contrasenya Creada');</script>";
            session_destroy();
        }
    if ($_SESSION["resultPass"] == 1) {
        echo '<script type="text/javascript">
        alert("Contrasenya Creada");
        </script>';
        session_destroy();
    }
    ?>
    <!-- Iniciar Session -->
    <div id="login" class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form" action="static/php/login.php" method="post">
                <span class="contact100-form-title">
                    Iniciar sessió
                </span>
                <div class="wrap-input100">
                    <span class="label-input100">Correu Electrònic</span>
                    <input class="input100" type="email" name="email" id="email" placeholder="📧 Correu...">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100">
                    <span class="label-input100">Contrasenya</span>
                    <input class="input100" type="password" name="pass" id="pass" placeholder="🔒 Contrasenya...">
                    <span class="focus-input100"></span>
                </div>
                <a style="text-decoration: none;" href="#" id="recoverlink" onclick="">No me'n recordo de les meves
                    credencials.</a>
                <a> / </a>
                <a style="text-decoration: none;" href="#" id="registerlink" onclick="">Registrat!</a>
                <?php
                if ($_SESSION["resultInicio"] == 1) {
                    echo "<strong><span id='span' class='text-danger mt-2'>Credencials Errònies</span></strong>";
                    $_SESSION["resultInicio"] = 0;
                }
                ?>
                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn">
                            <span>Entrar</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Iniciar Session -->
    <!-- registration -->
    <div id="registration" class="container-contact100" style="display: none;">
        <div class="wrap-contact100">
            <button class="close"><i class="fas fa-times cross items"></i></button>
            <form class="contact100-form items" action="static/php/register.php" method="post">
                <span class="contact100-form-title">
                    Registrar-se
                </span>
                <div class="wrap-input100">
                    <span class="label-input100">Nom d'Usuari</span>
                    <input class="input100" type="text" name="nameUserRegistrer" id="nameUserRegistrer" placeholder="👤 Nom i Cognoms...">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100">
                    <span class="label-input100">Correu Electrònic</span>
                    <input class="input100" type="email" name="emailregister" id="emailregister" placeholder="📧 Correu...">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn">
                            <span>Enviar</span>
                        </button>
                    </div>
                </div>
            </form>
            <?php
            if ($_SESSION["resultRegister"] == 1) {
                echo "<div id='enviadoCorreo' class='alert alert-success' role='alert'>";
                echo "Com a mesura de seguretat, introduïu el codi de 20 dígits que hem enviat al vostre correu al seguent formulari.";
                echo "</div>";
                echo "<script type='text/JavaScript'>";
                echo "$('.items').hide();";
                echo "setTimeout(function(){";
                echo     "$('#enviadoCorreo').hide();";
                echo     "$('#login').css('display','none');";
                echo     "$('#registration').css('display','none');";
                echo     "$('#recover').css('display','none');";
                echo     "$('#createpass').css('display','flex');";
                echo "}, 8000);";
                echo "</script>";
                $_SESSION["resultRegister"] = 0;
            }
            ?>
            <strong><span id="span" class="text-danger mt-2"></span></strong>
        </div>
    </div>
    <!-- registration -->
    <!-- Recuperar Contrasenya -->
    <div id="recover" class="container-contact100" style="display: none;">
        <div class="wrap-contact100">
            <button class="close"><i class="fas fa-times cross items"></i></button>
            <form class="contact100-form items" action="static/php/recover.php" method="post">
                <span class="contact100-form-title ">
                    Recuperar Contrasenya
                </span>
                <div class="wrap-input100">
                    <span class="label-input100">Correu Electrònic</span>
                    <input class="input100" type="email" name="emailrecover" id="emailrecover" placeholder="📧 Correu...">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn">
                            <span>Enviar</span>
                        </button>
                    </div>
                </div>
            </form>
            <?php
            if ($_SESSION["resultRecu"] == 1) {
                echo "<strong><span id='span' class='text-danger mt-2'>Credencials Errònies!</span></strong>";
                $_SESSION["resultRecu"] = 0;
            } else if ($_SESSION["resultRecu"] == 2) {
                echo "<div id='enviadoCorreo' class='alert alert-success' role='alert'>";
                echo        "Se t'ha enviat un correu amb un codi que haurà de posar al següent formulari que apareixerà";
                echo "</div>";
                echo "<script type='text/JavaScript'>";
                echo "$('.items').hide();";
                echo "setTimeout(function(){";
                echo     "$('#enviadoCorreo').hide();";
                echo     "$('#login').css('display','none');";
                echo     "$('#registration').css('display','none');";
                echo     "$('#recover').css('display','none');";
                echo     "$('#createpass').css('display','flex');";
                echo "}, 5000);";
                echo "</script>";
                $_SESSION["resultRecu"] = 0;
            }
            ?>
            <strong><span id="span" class="text-danger mt-2"></span></strong>
        </div>
    </div>
    <!-- Recuperar Contrasenya -->
    <!-- Password Form -->
    <div id="createpass" class="container-contact100" style="display: none;">
        <div class="wrap-contact100">
            <form class="contact100-form" action="static/php/updatePassword.php" method="post">
                <span class="contact100-form-title">
                    Creació de Contrasenya
                </span>
                <div class="wrap-input100">
                    <span class="label-input100">Contrasenya</span>
                    <input class="input100" type="password" name="contrasenya" id="contrasenya" placeholder="🔑 Contrasenya...">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100">
                    <span class="label-input100">Confirma la contrasenya</span>
                    <input class="input100" type="password" name="recontrasenya" id="recontrasenya" placeholder="🔑 Confirmar contrasenya...">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100">
                    <span class="label-input100">Codi de confirmació</span>
                    <input class="input100" type="password" name="codiform" id="codiform" placeholder="👨‍💻 Codi...">
                    <span class="focus-input100"></span>
                </div>
                <input type="hidden" name="emailEnvia" id="emailEnvia" value="<?= $emailregister ?>">
                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn">
                            <span>Enviar</span>
                        </button>
                    </div>
                </div>
            </form>
            <strong><span id="span" class="text-danger mt-2"></span></strong>
        </div>
    </div>

</body>
<script type="text/JavaScript" src="static/js/login.js"></script>
<script type="text/JavaScript">
    <?php
    if ($error == 2) {
        echo "$('#login').css('display','none');";
        echo "$('#registration').css('display','flex');";
        $_SESSION["errorNumero"] = 0;
    } else if ($error == 3) {
        echo "$('#login').css('display','none');";
        echo "$('#recover').css('display','flex');";
        $_SESSION["errorNumero"] = 0;
    }
    ?>
</script>

</html>