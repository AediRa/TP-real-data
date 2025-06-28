<?php
    session_start();
    if(isset($_GET['id_dept']) && isset($_GET['name_dept'])){
        $_SESSION['id_dept'] = $_GET['id_dept'];
        $_SESSION['name_dept'] = $_GET['name_dept'];

        header("Location: ../../pages/tb_Emp.php");
    }
?>