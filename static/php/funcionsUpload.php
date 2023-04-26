<?php
session_start();
require_once("inc/config.php");
require_once("inc/funcions.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$backgroundColor = recollirdades("colorElegido");
$nameImage = recollirdades("nameImage");
$desImage = recollirdades("desImage");
$idusuari = recollirdades("idusuari");
$yearPush = recollirdades("year");
$monthPush = recollirdades("month");

$mysqli = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
if (!$mysqli) {
    echo "Error: Conexió amb BBDD";
}

if (isset($_FILES['img'])) {
    if ($_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png") {
        $codialetori = bin2hex(random_bytes(10));
        $tmpfile = $_FILES["img"]["tmp_name"];
        $filename = $codialetori . "_" . $_FILES["img"]["name"];
        $destinacio = "../../images/" . $filename;
        if (!file_exists($destinacio)) {
            copy($tmpfile, $destinacio);
        }
        $sql = "INSERT INTO `galery` (`idimage`, `iduser`, `nomimage`, `descripcioimage`, `urlimage`, `backgroundcolorimage`, `dateUpload`) VALUES (NULL," . $idusuari . ",'" . $nameImage . "','" . $desImage . "','" . $filename . "','" . $backgroundColor . "','" . $monthPush . "/" . $yearPush . "')";
        $result = $mysqli->query($sql);
        if ($result) {
            sessionFunction("uploadResult", 1);
            returnHeaderFunction("pushImage.php");
        } else {
            sessionFunction("uploadResult", 2);
            returnHeaderFunction("pushImage.php");
        }
    } else {
        sessionFunction("uploadResult", 3);
    }
}
returnHeaderFunction("pushImage.php");