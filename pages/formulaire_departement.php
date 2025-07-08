<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");

    if(!isset($_GET['namedept'])){
       $nom_dept = $_SESSION['name_dept']; 
    }
    if(isset($_GET['namedept'])){
        $nom_dept = $_GET['namedept']; 
    }
    
    $result = getDept($data,$nom_dept);
    $donnee = mysqli_fetch_assoc($result);
    $result2 = getlistDept($data,$nom_dept);
?>

<div class="container-fluid">  

    <?php if(isset($_GET[''])){?>
        <div class="alert alert-warning" role="alert">
            <h3><?= "Aucun resultat correspondant"?></h3>
        </div>
    <?php }?>

    
        <table class="table">
            <tr>
                <th>Departement</th>
                <th>Date debut</th>
            </tr>
            <tr>
                <td><?= $nom_dept ?></td>
                <td><?= getCorrectDate($donnee['from_date']) ?></td>
            </tr>
        </table>

    <div class="row p-3">

        <div class="col-md-12 m-3">
            <h5>Formulaire de changement de departement</h5>
        </div>

        <div class="col-md-3 m-3 bg-secondary rounded-3 p-4">

                <form action="../INC/traitement/traitement_formulaire_dept.php" method="post">

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Departement</label>

                        <select name="departement">
                            <?php while($donnee2 = mysqli_fetch_assoc($result2)) { ?>
                                <option value="<?= $donnee2['dept_no'] ?>">
                                    <?= $donnee2['dept_name'] ?>
                                </option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Date de debut</label>
                        <input type="date" class="form-control" name="date_debut" placeholder="22-01-1990">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">valider</button>

                </form>

        </div>

    </div>
    
    

</div>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>