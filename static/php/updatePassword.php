<?php
session_start();
require_once("inc/funcions.php");
require_once("inc/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// mysqli Connection
$mysqli = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);

// Form Contrasenyas
$contrasenya = recollirdades("contrasenya");
$recontrasenya = recollirdades("recontrasenya");
$emailupdate = recollirdades("emailEnvia");
$codiform = recollirdades("codiform");
$codiform2 = selectUserInfoByEmail($mysqli,$emailupdate,"codeuser");

if (!$mysqli) {
    echo "Error: Connexio amb BBDD";
    exit();
} else {
    if ($contrasenya == $recontrasenya && $codiform == $codiform2) {
        $sql = "UPDATE `user` SET  `passworduser`='" . $contrasenya . "', activeuser=1 WHERE mailuser = '" . $emailupdate . "'";
        $result = $mysqli->query($sql);

        if (!$result) {
            echo "Error: Connexio amb BBDD " . $mysqli->erno . " - " . $mysqli->error;
        } else {
            sessionFunction("resultPass", 1);
            returnHeaderFunction("login.php");
        }
    } else {
        returnHeaderFunctionAndValue("login.php",1);
    }
}