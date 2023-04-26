<?php
session_start();
require_once("inc/funcions.php");
require_once("inc/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mysql Connection
$mysql = connectaBBDD(_SERVIDORBBDD,_USERBBDD,_PASSWDBBDD,_NOMBBDD);

// Form Validation
$email = recollirdades("email");
$password = recollirdades("pass");

// Form Registration
$emailregister = recollirdades("emailregister");
$nameUserRegistration = recollirdades("nameUserRegistrer");

// Form Recover password
$emailrecover = recollirdades("emailrecover");

// Form Contrasenyas
$contrasenya = recollirdades("contrasenya");
$recontrasenya = recollirdades("recontrasenya");
$emailupdate = recollirdades("emailEnvia");
$codiform = recollirdades("codiform");
$codiform2 = selectCode($mysql, $emailupdate);


if(!$mysql){
    echo "Error: Connexio amb BBDD";
    exit();
} else {
    if ($contrasenya == $recontrasenya && $codiform == $codiform2){
        echo $contrasenya, $emailupdate;
        echo $sql = "UPDATE `user` SET  `passworduser`='".$contrasenya."' WHERE mailuser = '".$emailupdate."'";
        $result = $mysql->query($sql);

        if(!$result){
            echo "Error: Connexio amb BBDD ".$mysql->erno." - ".$mysql->error;
        } else {
            sessionFuncion("resultPass", 1);
            returnHeaderFuncion("login.php");
        }
    } else {
        returnHeaderFuncionAndValue("login.php",1);
    }
}
