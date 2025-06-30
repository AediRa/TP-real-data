<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    $emp = $_SESSION['employe'];
    $dept = $_SESSION['departement'];
    $age_min = $_SESSION['agemin'];
    $age_max = $_SESSION['agemax'];

    $result = getResult_Employees($data,$emp,$dept,$age_max,$age_min);
?>

<?php
    while($donnee = mysqli_fetch_assoc($result)) { 
?>
    <p><?= $donnee['first_name'] ?></p>
    <p><?= $donnee['dept_name'] ?></p>
    <p><?= $donnee['birth_date'] ?></p>
<?php
    }
?>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>