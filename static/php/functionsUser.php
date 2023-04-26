<?php
session_start();
require_once("inc/config.php");
require_once("inc/funcions.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
if (!$mysqli) {
    echo "Error: Conexió amb BBDD";
}

$idUser = returnSes("idUser");
if ($idUser) {
    $nameuser = recollirdades("nameuser");
    $imguser = recollirdades("imguser");
    $password = recollirdades("password");
    $repassword = recollirdades("repassword");
    if ($password != $repassword) {
        doSes("error", 4);
        returnHeaderFunction("userconf.php");
    } else {
        if ($password) {
            $sql = "UPDATE `user` SET  `passworduser`='" . $password . "' WHERE iduser = '" . $idUser . "'";
            $result = $mysqli->query($sql);
        }
        if ($imguser) {
            $sql = "UPDATE `user` SET  `imguser`='" . $imguser . "' WHERE iduser = '" . $idUser . "'";
            $result = $mysqli->query($sql);
        }
        if ($nameuser) {
            $sql = "UPDATE `user` SET  `nameuser`='" . $nameuser . "' WHERE iduser = '" . $idUser . "'";
            $result = $mysqli->query($sql);
        }
        if (!is_null($result)) {
            if (!$result) {
                doSes("error", 2);
            } else {
                doSes("error", 1);
                returnHeaderFunction("userconf.php");
            }
        } else {
            doSes("error", 3);
            returnHeaderFunction("userconf.php");
        }
    }
} else {
    returnHeaderFunction("index.php");
}
