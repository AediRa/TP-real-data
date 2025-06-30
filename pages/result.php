<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    $emp = $_SESSION['employe'];
    $dept = $_SESSION['departement'];
    $age_min = $_SESSION['agemin'];
    $age_max = $_SESSION['agemax'];

    $page = getResult_NbEmployees($data,$emp,$dept,$age_max,$age_min);
    $result = getResult_Employees($data,$emp,$dept,$age_max,$age_min);
    
?>

<h3>Nombre de resultat : <?= $page ?></h3>
<?php
    while($donnee = mysqli_fetch_assoc($result)) { 
?>
    <p>
        Nom : <?= $donnee['first_name'] ?> <?= $donnee['last_name'] ?><br>
        Emploi : <?= $donnee['title'] ?>
    </p>
<?php
    }
?>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>