<?php
session_start();
require_once("inc/funcions.php");
require_once("inc/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mysql Connection
$mysqli = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);

// Form Registration
$emailregister = recollirdades("emailregister");
$nameUserRegistration = recollirdades("nameUserRegistrer");
$lvl = selectUserInfoByEmail($mysqli,$emailregister,"activeuser");


if ($nameUserRegistration != "" && $emailregister != "" && $lvl != 1 && $lvl != 2) {
    if (is_null($lvl)) {
        // Registrar-se
        $result = registerUser($mysqli, $nameUserRegistration, $emailregister);
        if (!$result) {
            echo "Error: Connexio amb BBDD " . $mysqli->erno . " - " . $mysqli->error;
        }
    }
    if ($lvl == 0) {
        $codi = sendMail($emailregister,0);
        insertCode($mysqli, $codi, $emailregister);
        doSes("emailregistersend", $emailregister);
        sessionFunction("resultRegister", 1);
        returnHeaderFunctionAndValue("login.php", 2);
    } else {
        returnHeaderFunctionAndValue("login.php", 1);
    }
} else {
    returnHeaderFunctionAndValue("login.php", 1);
}
