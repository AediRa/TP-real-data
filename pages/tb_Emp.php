<?php
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    $name_dept = $_SESSION['name_dept'];
    $id_dept = $_SESSION['id_dept'];
    $result = getEmployees($data,$id_dept);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css-2/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.bundle.min.js.map"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <h3><?= $name_dept ?></h3>
        <ul>
            <?php while($donnee = mysqli_fetch_assoc($result)) { ?>
                <li><a href="../INC/traitement/traitement_emp.php?id_emp=<?= $donnee['emp_no'] ?>"><?= $donnee['first_name'] ?> <?= $donnee['last_name'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>