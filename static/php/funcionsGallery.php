<?php

require_once("inc/funcions.php");
require_once("inc/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$any = isset($_POST['any']) ? $_POST['any'] : "";
$mes = isset($_POST['mes']) ? $_POST['mes'] : "";

$jsarray = [];
$div = '';
$mysqli = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);

if (!$mysqli) {
    echo "Error: Connexio amb BBDD";
    exit();
} else {
    $sql = "SELECT * FROM "._TABLEGALERIA." WHERE dateUpload='".$mes."/".$any."'";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Error: Connexio amb BBDD " . $mysqli->erno . " - " . $mysqli->error;
    } else {
        if ($result->num_rows != 0) {
            while ($row = $result->fetch_array()) {
                if (rand(1, 2) == 1) {
                    $margin = "mb-5";
                } else {
                    $margin = "mt-5";
                }

                $div .= "<div class='" . $margin . " col gallery2 rounded-3' id='" . $row['idimage'] . "' onClick='instagram(this.id)'><img src='./images/" . $row['urlimage'] . "' class='w-50' style='border: 5px solid " . $row['backgroundcolorimage'] . "; border-radius: 5px; background-color:" . $row['backgroundcolorimage'] . ";'/>";

                if ($row['descripcioimage'] == NULL) {
                    $div .= "<figcaption class='figcaptionNom bg p-2 mb-3' style='color: " . $row['backgroundcolorimage'] . ";'>" . $row['nomimage'] . "</figcaption></div>";
                } else if ($row['descripcioimage'] != NULL) {
                    $div .= "<figcaption class='figcaptionNom bg p-2' style='color: " . $row['backgroundcolorimage'] . ";'>" . $row['nomimage'] . "</figcaption></div>";
                }


                if ($row['descripcioimage'] != NULL) {
                    $div .= "<figcaption class='figcaptionDescripcio h4 bg p-2 rounded-3 mb-4' style='background-color: " . $row['backgroundcolorimage'] . "; width:50%;'>" . $row['descripcioimage'] . "</figcaption></div>";
                }
            }
        } else {
            echo "<p class='h5 text-danger'>No hi han fotos en la data escullida</p>";
        }
    }
}

echo $div;
