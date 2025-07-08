<?php
    session_start();   
    if(isset($_POST['employe']) && isset($_POST['departement']) && isset($_POST['agemin']) && isset($_POST['agemax'])){
        $_SESSION['employe'] = $_POST['employe'];
        $_SESSION['departement'] = $_POST['departement'];
        $_SESSION['agemin'] = $_POST['agemin'];
        $_SESSION['agemax'] = $_POST['agemax'];

        header("Location: ../../pages/result.php");
    }

?>