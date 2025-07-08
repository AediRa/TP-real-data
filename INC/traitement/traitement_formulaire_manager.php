<?php
    session_start();
    include("../../pages/data.php");
    include("fonction.php");
    if(isset($_POST['date_debut'])){
    
        $emp = $_SESSION['id_emp'];
        $dept = $_SESSION['id_dept'];
        $requet = "UPDATE dept_manager set emp_no ='$emp' where dept_no ='$dept' and to_date > NOW()";
        $resultat = mysqli_query($data, $requet);

        header("Location: ../../pages/formulaire_manager.php");
    }
?>