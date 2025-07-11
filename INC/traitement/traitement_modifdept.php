<?php
    session_start();
    if(isset($_GET['id_dept']) && isset($_GET['name_dept']) && isset($_GET['first_name']) && isset($_GET['last_name'])){
        $_SESSION['id_dept_modif'] = $_GET['id_dept'];
        $_SESSION['name_dept_modif'] = $_GET['name_dept'];
        $_SESSION['first_name_modif'] = $_GET['first_name'];
        $_SESSION['last_name_modif'] = $_GET['last_name'];

        header("Location: ../../pages/ajout_modif.php");
    }
    if(!isset($_GET['id_dept']) && !isset($_GET['name_dept'])){
        header("Location: ../../pages/ajout_modif.php?ajouter");
    }
?>