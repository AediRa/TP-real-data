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

    $current_page = floor($val / 20) + 1;
    $total_pages = $page;

    $next_page = $current_page + 1;
    $last_page = $total_pages;

?>

    <?php if($ligne == false && $result == false){?>
        <div class="alert alert-warning" role="alert">
            <h3><?= "Aucun resultat correspondant"?></h3>
        </div>
    <?php }?>

    <?php if($ligne != false && $result != false){ ?>

        <h3>Nombre de resultat : <?= $ligne ?></h3>

        <?php
            while($donnee = mysqli_fetch_assoc($result)) { 
        ?>
            <p>
                Nom : <?= $donnee['first_name'] ?> <?= $donnee['last_name'] ?> <br>
            </p>
        <?php
            }
        ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($val != 0) { ?>
                <li class="page-item"><a class="page-link" href="result.php?suivant=<?= $val - 20 ?>">Previous</a></li>
                <?php } ?>
                    
                    <li class="page-item active">
                        <a class="page-link" href="result.php?suivant=<?=( $current_page  - 1) * 20?>"><?= $current_page ?></a>
                    </li>

                    <?php if ($next_page <= $total_pages) { ?>
                        <li class="page-item">
                            <a class="page-link" href="result.php?suivant=<?=($next_page - 1) * 20?>"><?= $next_page ?></a>
                        </li>
                    <?php }?>

                    <?php if ($next_page + 1 < $last_page) { ?>
                        <li class="page-item disabled">
                            <p class="page-link">...</p>
                        </li>
                    <?php }?>

                    <?php if ($last_page > $next_page) { ?>
                        <li class="page-item">
                            <a class="page-link" href="result.php?suivant=<?=($last_page - 1) * 20?>"><?= $last_page ?></a>
                        </li>
                    <?php }?>
                

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