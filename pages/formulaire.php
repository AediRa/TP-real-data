<?php
    include("../INC/fonction.php");
    include("data.php");
    $dept = getDepartments($data);
    $emp = get_Employees($data);
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
    <form action="../INC/traitement/traitement_formulaire.php">
        <select name="departement">
            <?php while($donnee1 = mysqli_fetch_assoc($dept)) { ?>
                <option value="<?= $donnee1['dept_name'] ?>">
                    <?= $donnee1['dept_name'] ?>
                </option>
            <?php } ?>
        </select>

        <select name="nom employé">
            <?php while($donnee2 = mysqli_fetch_assoc($emp)) { ?>
                <option value="<?= $donnee2['first_name'] ?>">
                    <?= $donnee2['first_name'] ?>
                </option>
            <?php } ?>
        </select>

        <select name="age min">
            <?php for($i=1;$i<100;$i++) { ?>
                <option value="<?= $i ?>">
                    <?= $i ?>
                </option>
            <?php } ?>
        </select>

        <select name="age max" id="">
            <?php for($i=1;$i<100;$i++) { ?>
                <option value="<?= $i ?>">
                    <?= $i ?>
                </option>
            <?php } ?>
        </select>

        <input type="submit" value="valider">

    </form>
</body>
</html>