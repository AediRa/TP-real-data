<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");

    $nom_dept = $_SESSION['name_dept']; 
    $result = getDeptMan($data,$nom_dept);
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
                <th>Manager</th>
            </tr>
            <tr>
                <td><?= $donnee['dept_name'] ?></td>
                <td><?= $donnee['first_name'] ?> <?= $donnee['last_name'] ?></td>
            </tr>
        </table>

    <div class="row p-3">

        <div class="col-md-12 m-3">
            <h5>Formulaire de changement de manager</h5>
        </div>

        <div class="col-md-3 m-3 bg-secondary rounded-3 p-4">

                <form action="../INC/traitement/traitement_formulaire_manager.php" method="post">

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