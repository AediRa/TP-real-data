<?php
    ob_start();
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

<div class="container-fluid">  

    <div class="row p-3">

        <div class="col-md-12 m-3">
            <h5>Formulaire</h5>
        </div>

        <div class="col-md-3 m-3 bg-secondary rounded-3">

                <form action="../INC/traitement/traitement_formulaire.php" method="POST">
                    <div class="col-md-12 m-3 p-3">

                            <div class="row-md-4 p-3">
                                <p>nom employé :</p>
                                <select >
                                    <?php while($donnee2 = mysqli_fetch_assoc($emp)) { ?>
                                        <option name="nom employé" value="<?= $donnee2['first_name'] ?>">
                                            <?= $donnee2['first_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <button><a href="../INC/traitement/traitement_formulaire.php?suivant=<?= $val + 10 ?>">suivant</a></button>
                                <button><a href="../INC/traitement/traitement_formulaire.php?precedent=<?= $val - 10 ?>">precedent</a></button>
                            </div>

                            <div class="row-md-4 p-3">
                                <p>departement :</p>
                                <select >
                                    <?php while($donnee1 = mysqli_fetch_assoc($dept)) { ?>
                                        <option name="departement" value="<?= $donnee1['dept_name'] ?>">
                                            <?= $donnee1['dept_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="row-md-4 p-3">
                                <p>age min :</p>
                                <select >
                                    <?php for($i=1;$i<100;$i++) { ?>
                                        <option name="age min" value="<?= $i ?>">
                                            <?= $i ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>           

                            <div class="row-md-4 p-3">
                                <p>age max :</p>
                                <select >
                                    <?php for($i=1;$i<100;$i++) { ?>
                                        <option name="age max" value="<?= $i ?>">
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

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>