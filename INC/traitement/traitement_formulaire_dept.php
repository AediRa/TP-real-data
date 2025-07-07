<?php
    session_start();
    if(isset($_POST['departement']) && isset($_POST['date_debut'])){
        $nom = $_POST['departement'];

        header("Location: ../../pages/formulaire_departement.php?namedept=$nom");
    }
?>