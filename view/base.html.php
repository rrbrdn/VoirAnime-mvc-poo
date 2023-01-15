<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>asset/css/lux.css">
    <link rel="stylesheet" href="<?= URL ?>asset/css/style.css">
    <link rel="stylesheet" href="<?= URL ?>asset/css/base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <title>Document</title>
</head>

<body>

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
                                    <a class='dropdown-item d-flex align-items-center' href='<?=URL?>ma-collection'><i class="fa-regular fa-bookmark me-2"></i>Ma collection</a>
                                    <a class='dropdown-item d-flex align-items-center' href='<?= URL ?>profil'><i class="fa-regular fa-user me-2"></i>Mon profil</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='<?= URL ?>deconnexion'><i class="fa-regular fa-right-to-bracket"></i>Se déconnecter</a>
                                </div>
                            </li>
                        <?php elseif ($_SESSION['roleUser'] === 'admin') : ?>
                            <li class='nav-item'>
                                <a class='nav-link' href='<?= URL ?>admin'>Admin</a>
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

    <?= $content ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>