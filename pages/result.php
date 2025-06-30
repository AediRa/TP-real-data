<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    $emp = $_SESSION['nom employé'];
    $dept = $_SESSION['departement'];
    $age_min = $_SESSION['age min'];
    $age_max = $_SESSION['age max'];
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