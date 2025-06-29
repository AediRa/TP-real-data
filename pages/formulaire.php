<?php
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    if(!isset($_SESSION['val'])){
        $val = 0;
    }
    else{
        $val = $_SESSION['val'];
    }
    $dept = getDepartments($data);
    $emp = getEmp($data,$val);

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

    <div class="row p-3">

        <div class="col-md-12 m-3">
            <h5>Formulaire</h5>
        </div>

        <div class="col-md-3 m-3 bg-secondary rounded-3">

                <form action="../INC/traitement/traitement_formulaire.php">
                    <div class="col-md-12 m-3 p-3">

                            <div class="row-md-4 p-3">
                                <p>nom employé :</p>
                                <select name="nom employé">
                                    <?php while($donnee2 = mysqli_fetch_assoc($emp)) { ?>
                                        <option value="<?= $donnee2['first_name'] ?>">
                                            <?= $donnee2['first_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <button><a href="../INC/traitement/traitement_formulaire.php?suivant=<?= $val + 10 ?>">suivant</a></button>
                                <button><a href="../INC/traitement/traitement_formulaire.php?precedent=<?= $val - 10 ?>">precedent</a></button>
                            </div>

                            <div class="row-md-4 p-3">
                                <p>departement :</p>
                                <select name="departement">
                                    <?php while($donnee1 = mysqli_fetch_assoc($dept)) { ?>
                                        <option value="<?= $donnee1['dept_name'] ?>">
                                            <?= $donnee1['dept_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="row-md-4 p-3">
                                <p>age min :</p>
                                <select name="age min">
                                    <?php for($i=1;$i<100;$i++) { ?>
                                        <option value="<?= $i ?>">
                                            <?= $i ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>           

                            <div class="row-md-4 p-3">
                                <p>age max :</p>
                                <select name="age max" id="">
                                    <?php for($i=1;$i<100;$i++) { ?>
                                        <option value="<?= $i ?>">
                                            <?= $i ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="row-md-4 p-3">
                                <input type="submit" value="valider">
                            </div>
                    
                    </div>
                </form>

        </div>

    </div>   

</div>
</body>
</html>