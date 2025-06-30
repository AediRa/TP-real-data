<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    $name_dept = $_SESSION['name_dept'];
    $id_dept = $_SESSION['id_dept'];
    $result = getEmployees($data,$id_dept);
?>

    <div class="container-fluid">
        <h3><?= $name_dept ?></h3>
        <ul>
            <?php while($donnee = mysqli_fetch_assoc($result)) { ?>
                <li><a href="../INC/traitement/traitement_emp.php?id_emp=<?= $donnee['emp_no'] ?>"><?= $donnee['first_name'] ?> <?= $donnee['last_name'] ?></a></li>
            <?php } ?>
        </ul>
    </div>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>