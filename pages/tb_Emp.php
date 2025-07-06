<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    $name_dept = $_SESSION['name_dept'];
    $id_dept = $_SESSION['id_dept'];
    

    if(isset($_GET['suivant'])){
        $val = $_GET['suivant'];
    }

    if(isset($_GET['precedent'])){
        $val = $_GET['precedent'];
    }

    if(!isset($_GET['precedent']) && !isset($_GET['suivant'])){
        $val = 0;
    }

    $ligne = getNbEmployees($data,$id_dept);
    $page = ceil($ligne / 20);

    $result = getEmployees($data,$id_dept,$val);
    $reste = 20 - (($page*20) - $ligne);

    $current_page = floor($val / 20) + 1;
    $total_pages = $page;

    $next_page = $current_page + 1;
    $last_page = $total_pages;

?>

    <div class="container-fluid">

        <h3>Liste des employes dans le departement <?= $name_dept ?> </h3>

        <ul>
            <?php while($donnee = mysqli_fetch_assoc($result)) { ?>
                <li><a class="a-no-effect" href="../INC/traitement/traitement_emp.php?id_emp=<?= $donnee['emp_no'] ?>"><?= $donnee['first_name'] ?> <?= $donnee['last_name'] ?></a></li>
            <?php } ?>
        </ul>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($val != 0) { ?>
                <li class="page-item"><a class="page-link" href="tb_Emp.php?suivant=<?= $val - 20 ?>">Previous</a></li>
                <?php } ?>
                    
                    <li class="page-item active">
                        <a class="page-link" href="tb_Emp.php?suivant=<?=( $current_page  - 1) * 20?>"><?= $current_page ?></a>
                    </li>

                    <?php if ($next_page <= $total_pages) { ?>
                        <li class="page-item">
                            <a class="page-link" href="tb_Emp.php?suivant=<?=($next_page - 1) * 20?>"><?= $next_page ?></a>
                        </li>
                    <?php }?>

                    <?php if ($next_page + 1 < $last_page) { ?>
                        <li class="page-item disabled">
                            <p class="page-link">...</p>
                        </li>
                    <?php }?>

                    <?php if ($last_page > $next_page) { ?>
                        <li class="page-item">
                            <a class="page-link" href="tb_Emp.php?suivant=<?=($last_page - 1) * 20?>"><?= $last_page ?></a>
                        </li>
                    <?php }?>
                

                <?php if(($val == 0) || ($val + $reste != $ligne)) { ?>
                    
                <li class="page-item"><a class="page-link" href="tb_Emp.php?precedent=<?= $val + 20 ?>">Next</a></li>
                <?php } ?>
            </ul>
        </nav>

    </div>

<?php
    $return = "tb_Department.php";
    $contenu = ob_get_clean();
    include("html.php");
?>