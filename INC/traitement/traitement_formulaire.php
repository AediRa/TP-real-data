<?php
    session_start();

    if(isset($_GET['suivant'])){
        $_SESSION['val'] = $_GET['suivant'];
        header("Location: ../../pages/formulaire.php");
    }

    if(isset($_GET['precedent'])){
        $_SESSION['val'] = $_GET['precedent'];
        header("Location: ../../pages/formulaire.php");
    }

    if(isset($_POST['nom employé']) && isset($_POST['departement']) && isset($_POST['age min']) && isset($_POST['age max'])){
        $_SESSION['nom employé'] = $_POST['nom employé'];
        $_SESSION['departement'] = $_POST['departement'];
        $_SESSION['age min'] = $_POST['age min'];
        $_SESSION['age max'] = $_POST['age max'];

        echo($_POST['nom employé']);
        echo($_POST['departement']);
        echo($_POST['age min']);
        echo($_POST['age max']);
    }

?>