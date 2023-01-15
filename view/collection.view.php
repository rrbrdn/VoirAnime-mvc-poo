<?php ob_start(); ?>




<?php
$class = "container-fluid";
$content = ob_get_clean();
require_once "view/base.html.php";

?>