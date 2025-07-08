<?php
    session_start();
    include("../../pages/data.php");
    if(isset($_POST['departement']) && isset($_POST['date_debut'])){
        $nom_dep = $_POST['departement'];
        $emp = $_SESSION['id_emp'];
        $dept = $_POST['departement'];
        $requet = "UPDATE dept_emp set dept_no ='$dept' where emp_no ='$emp'";
        $resultat = mysqli_query($data, $requet);

        header("Location: ../../pages/formulaire_departement.php?namedept=$nom_dep");
    }
?>