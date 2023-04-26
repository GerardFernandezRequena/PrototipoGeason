<?php
session_start();
require_once("inc/funcions.php");
require_once("inc/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mysqli Connection
$mysqli = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);

// Email recuperació contrasenya
$emailrecover = recollirdades("emailrecover");

// Recuperar contrasenya
$result = recoverPass($mysqli, $emailrecover);
if ($emailrecover != "") {
    if (!$result) {
        echo "Error: Connexio amb BBDD " . $mysqli->erno . " - " . $mysqli->error;
    } else {
        if ($result->num_rows != 0) {
            $codi = sendMail($emailrecover, 1);
            insertCode($mysqli, $codi, $emailrecover);
            doSes("emailregistersend", $emailrecover);
            sessionFunction("resultRecu", 2);
            returnHeaderFunctionAndValue("login.php", 3);
        } else {
            sessionFunction("resultRecu", 1);
            returnHeaderFunctionAndValue("login.php", 3);
        }
    }
} else {
    returnHeaderFunctionAndValue("login.php", 1);
}
