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

                    <p>Nom : <input type="text" name="employe"></p>
                    <p>Departement : <input type="text" name="departement"></p>
                    <p>Age min : <input type="number" name="agemin"></p>
                    <p>Age max : <input type="number" name="agemax"></p>
                    <p><input type="submit" value="valider"></p>
                    
                </form>

        </div>

    </div>   

</div>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>