<?php

    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    $emp = $_SESSION['employe'];
    $dept = $_SESSION['departement'];
    $age_min = $_SESSION['agemin'];
    $age_max = $_SESSION['agemax'];

    if(isset($_GET['suivant'])){
        $val = $_GET['suivant'];
    }

    if(isset($_GET['precedent'])){
        $val = $_GET['precedent'];
    }

    if(!isset($_GET['precedent']) && !isset($_GET['suivant'])){
        $val = 0;
    }

    $ligne = getResult_NbEmployees($data,$emp,$dept,$age_max,$age_min);
    $page = ceil($ligne / 20);

    $result = getResult_Employees($data,$emp,$dept,$age_max,$age_min,$val);
    $reste = 20 - (($page*20) - $ligne);

?>

    <?php if(!isset($result) && !isset($ligne)){ ?>
        <h3><?php echo("Aucun correspondant") ?></h3>
    <?php } ?>

    <?php if(isset($result) && isset($ligne)){ ?>

        <h3>Nombre de resultat : <?= $ligne ?></h3>

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

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($val != 0) { ?>
                <li class="page-item"><a class="page-link" href="result.php?suivant=<?= $val - 20 ?>">Previous</a></li>
                <?php } ?>

                <?php for($i=0;$i<$page;$i++) { ?>
                    <li class="page-item"><a class="page-link" href="#"><?= $i + 1 ?></a></li>
                <?php } ?>

                <?php if(($val == 0) || ($val + $reste != $ligne)) { ?>
                    
                <li class="page-item"><a class="page-link" href="result.php?precedent=<?= $val + 20 ?>">Next</a></li>
                <?php } ?>
            </ul>
        </nav>

    <?php } ?>

<?php
    $return = "formulaire.php";
    $contenu = ob_get_clean();
    include("html.php");
?>