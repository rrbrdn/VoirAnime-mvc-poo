<nav class="navbar navbar-expand-lg navbar-dark" id="nav">
    <div class="container-fluid">
        <a class="navbar-brand" id="titre" href="<?= URL ?>accueil">VoirAnime</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria- controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <?php if (isset($_SESSION['roleUser'])) : ?>
                    <?php if ($_SESSION['roleUser'] === 'user') : ?>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                                <img class='rounded-circle' width='50' src='<?= URL ?>asset/img/<?= $_SESSION['img_profil'] ?>'></a>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item d-flex align-items-center' href='<?= URL ?>ma-collection/<?= $_SESSION['id'] ?>'><i class="fa-solid fa-bookmark me-2"></i>Ma collection</a>
                                <a class='dropdown-item d-flex align-items-center' href='<?= URL ?>profil'><i class="fa-solid fa-user me-2"></i>Mon profil</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='<?= URL ?>deconnexion'><i class="fa-solid fa-arrow-right-to-bracket me-2"></i>Se déconnecter</a>
                            </div>
                        </li>
                    <?php elseif ($_SESSION['roleUser'] === 'admin') : ?>
                        <li class='nav-item'>
                            <a class='nav-link' href='<?= URL ?>admin'>Admin</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='<?= URL ?>admin/add'>ajouter</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='<?= URL ?>deconnexion'>déconnexion</a>
                        </li>
                    <?php endif ?>
                <?php else : ?>
                    <li class='nav-item'>
                        <a class='nav-link' href='<?= URL ?>connexion'>Connexion</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='<?= URL ?>inscription'>Inscription</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>