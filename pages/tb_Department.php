<?php
    include("data.php");
    include("../INC/fonction.php");
    $result = getDepartment($data);
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
    <table class="table">
        <tr>
            <th>dept_name</th>
            <th>mg_name</th>
        </tr>
        
            <?php while($donnee = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><a href="../INC/traitement/traitement_dept.php?id_dept=<?= $donnee['dept_no'] ?>&&name_dept=<?= $donnee['dept_name'] ?>"><?= $donnee['dept_name'] ?></a></td>
                    <td><?= $donnee['first_name'] ?></td>
                </tr>
            <?php } ?>
        
    </table>
</body>
</html>