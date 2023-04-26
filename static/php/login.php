<?php
session_start();
require_once("inc/funcions.php");
require_once("inc/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Mysql Connection
$mysql = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);

// Form Validation
$email = recollirdades("email");
$password = recollirdades("pass");

// Iniciar Sessió
if ($email != "" && $password != "") {
    $result = loginUser($mysql, $email, $password);
    if (!$result) {
        echo "Error: Connexio amb BBDD " . $mysql->erno . " - " . $mysql->error;
    } else {
        if ($result->num_rows != 0) {
            while ($row = $result->fetch_array()) {
                $idUser = $row["iduser"];
            }
            if($idUser == 1){
                doSes("idUser", $idUser);
                returnHeaderFunction("admin.php");
            } else {
                doSes("idUser", $idUser);
                returnHeaderFunction("index.php");
            }
        } else {
            sessionFunction("resultInicio", 1);
            returnHeaderFunction("login.php");
        }
    }
} else {
    returnHeaderFunctionAndValue("login.php", 1);
}
