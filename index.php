<?php ob_start() ?>










<?php

$class = "container-fluid";
$nav = "<li class='nav-item'>
<a class='nav-link' href='./connexion.php'>Connexion</a>
</li>
<li class='nav-item'>
<a class='nav-link' href='./inscription.php'>Inscription</a>
</li>";

$content = ob_get_clean();

require_once "base.html.php";
?>