<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    $emp = $_SESSION['employe'];
    $dept = $_SESSION['departement'];
    $age_min = $_SESSION['agemin'];
    $age_max = $_SESSION['agemax'];
?>

<p><?= $emp ?></p>
<p><?= $dept ?></p>
<p><?= $age_min ?></p>
<p><?= $age_max ?></p>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>