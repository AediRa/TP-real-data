<?php
    ob_start();
?>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>