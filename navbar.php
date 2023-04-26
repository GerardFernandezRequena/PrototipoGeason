<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="static/img/logo.gif" alt="logo" style="max-width: 200px;">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <?php if ($idUser) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="pushImage.php">Pujar Imatge</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Gal·leria</a>
                </li>
            </ul>
            <?php
            if ($idUser != 0) {
                echo "<div class='btn-group d-flex ms-auto'>";
                echo "<button type='button' class='btn btn-danger dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>";
                echo "$nameuser <img src='./static/img/profile_". $imguser . ".png' style='max-height: 65px; border-radius: 50%;'>";
                echo "</button>";
                echo "<ul class='dropdown-menu dropdown-menu-lg-end w-100'>";
                echo "<li><a class='dropdown-item' href='userconf.php'>Perfil Usuari</a></li>";
                echo "<li><hr class='dropdown-divider'></li>";
                echo "<form action='static/php/tancarSessio.php' method='post'>";
                echo "<li><button class='dropdown-item'>Tancar Sessió</button></li>";
                echo "</form>";
                echo "</ul>";
                echo "</div>";
            } else {
                echo "<div class='d-flex ms-auto'>";
                echo "<a id='like' class='btn btn-lg btn-block btn-shared btn-like' href='login.php'><span class='fa fa-thumbs-o-up pull-left'></span><span class='like-text'>Iniciar Sessió</span></a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</nav>