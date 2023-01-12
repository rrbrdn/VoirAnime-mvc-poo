<?php ob_start() ?>










<?php

$class = "container-fluid";
$nav = "<li class='nav-item'>
<a class='nav-link' href='connexion'>Connexion</a>
</li>
<li class='nav-item'>
<a class='nav-link' href='inscription'>Inscription</a>
</li>";

$content = ob_get_clean();

require_once "view/base.html.php";
?>