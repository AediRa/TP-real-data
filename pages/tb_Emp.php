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

?>

    <div class="container-fluid">

        <h3>Liste des employes dans le departement <?= $name_dept ?> </h3>

        <ul>
            <?php while($donnee = mysqli_fetch_assoc($result)) { ?>
                <li><a href="../INC/traitement/traitement_emp.php?id_emp=<?= $donnee['emp_no'] ?>"><?= $donnee['first_name'] ?> <?= $donnee['last_name'] ?></a></li>
            <?php } ?>
        </ul>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($val != 0) { ?>
                <li class="page-item"><a class="page-link" href="tb_Emp.php?suivant=<?= $val - 20 ?>">Previous</a></li>
                <?php } ?>

                <?php for($i=0;$i<$page;$i++) { ?>

                    <li class="page-item">
                        <a class="page-link" href="#">

                                <?= $i + 1 ?>

                        </a>
                    </li>

                <?php } ?>

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