<?php
    session_start();
    if(isset($_GET['id_emp'])){
        $_SESSION['id_emp'] = $_GET['id_emp'];

        header("Location: ../../pages/fiche.php");
    }
?>