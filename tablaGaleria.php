<?php
require_once("static/php/inc/funcions.php");
require_once("static/php/inc/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$mysqli = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);

if(!$mysqli){
    echo "Error: Connexio amb BBDD";
    exit();
}

$iduser =  returnSes("idUser");

$activeuser = selectUserInfoById($mysqli, $iduser, "activeuser");

if ($activeuser != 2 ){
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="static/css/admin.css">
    <title>Taula Usuaris</title>
</head>
<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>

<body>
    <?php
    require("navbarAdmin.php");
    ?>
    <div class="col p-3">
        <div class="height-100 bg-light p-3">
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Id Imatge</th>
                        <th>Nom Imatge</th>
                        <th>Url Imatge</th>
                        <th>Nom de l'usuari de la Imatge</th>
                        <th>Color de Fons de la Imatge</th>
                        <th>Data de Pujada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM "._TABLEGALERIA." G INNER JOIN "._TABLESUSUARI." U ON G.iduser = U.iduser WHERE activeuser = 1";
                    $result = $mysqli->query($sql);
                    if(!$result){
                        echo "Error: Connexio amb BBDD ".$mysqli->erno." - ".$mysqli->error;
                    } else {
                        if($result ->num_rows != 0){
                            while($row=$result->fetch_array()){
                                echo "<tr>";
                                echo "<td>".$row["idimage"]."</td>";
                                echo "<td>".$row["nomimage"]."</td>";
                                echo "<td>".$row["urlimage"]."</td>";
                                echo "<td>".$row["nameuser"]."</td>";
                                echo "<td>".$row["backgroundcolorimage"]."</td>";
                                echo "<td>".$row["dateUpload"]."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td><p class='h5 text-danger'>No hi han registres</p></td>";
                            echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>