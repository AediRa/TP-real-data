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

?>