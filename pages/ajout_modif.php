<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");

    $nom_dept = "Communication";
    $nom = "Sumant" ;
    $prenom = "Peac" ;

    if(!isset($_GET['ajouter'])) {
        $nom_dept = $_SESSION['name_dept_modif'];
        $nom = $_SESSION['first_name_modif'] ;
        $prenom = $_SESSION['last_name_modif'] ;
    }
?>

<div class="container-fluid">  

    <?php if(isset($_GET[''])){?>
        <div class="alert alert-warning" role="alert">
            <h3><?= "Aucun resultat correspondant"?></h3>
        </div>
    <?php }?>

    <div class="row p-3">

        <?php if(isset($_GET['ajouter'])) { ?>
            <div class="col-md-12 m-3">
                <h5>Ajout de Departement</h5>
            </div>
        <?php } ?>

        <?php if(!isset($_GET['ajouter'])) { ?>
            <div class="col-md-12 m-3">
                <h5>Modification du Departement de <?= $nom_dept ?></h5>
            </div>
        <?php } ?>

        <div class="col-md-3 m-3 bg-secondary rounded-3 p-4">

                <form action="../INC/traitement/traitement_formulaire_alterdept.php" method="post">

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nouveau Nom de Departement</label>
                        <input type="text" class="form-control" name="date_debut" placeholder=<?= $nom_dept ?>>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nouveau Manager</label>
                        <p>Nom : <input type="text" class="form-control" name="date_debut" placeholder=<?= $nom ?>></p>
                        <p>Prenom : <input type="text" class="form-control" name="date_debut" placeholder=<?= $prenom ?>></p>
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