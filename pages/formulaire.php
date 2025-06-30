<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");
?>

<div class="container-fluid">  

    <div class="row p-3">

        <div class="col-md-12 m-3">
            <h5>Formulaire</h5>
        </div>

        <div class="col-md-3 m-3 bg-secondary rounded-3 p-4">

                <form action="../INC/traitement/traitement_formulaire.php" method="post">

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="employe" placeholder="Georgi">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Departement</label>
                        <input type="text" class="form-control" name="departement" placeholder="Marketing">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Age min</label>
                        <input type="number" class="form-control" name="agemin" placeholder="50">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Age max</label>
                        <input type="number" class="form-control" name="agemax" placeholder="60">
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