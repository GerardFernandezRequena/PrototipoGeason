<?php
declare(strict_types=1);

require_once __DIR__ . "/static/php/inc/funcions.php";
require_once __DIR__ . "/static/php/inc/config.php";

session_start();

// Verificar si el usuario está autenticado antes de cualquier salida
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit();
}

try {
    $mysqli = connectaBBDD(_SERVIDORBBDD, _USERBBDD, _PASSWDBBDD, _NOMBBDD);
    
    $iduser = (int)returnSes("idUser");
    $activeuser = selectUserInfoById($mysqli, $iduser, "activeuser");
    
    if ($activeuser != 2) {
        header("Location: index.php");
        exit();
    }
} catch (Exception $e) {
    error_log("Error en panel de administración: " . $e->getMessage());
    header("Location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Panel de Control - Administración</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Favicon -->
    <link rel="icon" href="static/img/favicon.ico" type="image/x-icon">
    
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="static/css/admin.css?v=<?= filemtime('static/css/admin.css') ?>">
</head>
<body class="admin-panel">
    <?php require "navbarAdmin.php"; ?>
    
    <main class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Panel de Administración</h1>
                <!-- Contenido del panel irá aquí -->
            </div>
        </div>
    </main>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- Scripts personalizados -->
    <script src="static/js/admin.js?v=<?= filemtime('static/js/admin.js') ?>"></script>
</body>
</html>
