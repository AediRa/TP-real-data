<?php
    function getDepartment($data){
        $code="SELECT * FROM dept_manager join departments on dept_manager.dept_no=departments.dept_no join employees on employees.emp_no=dept_manager.emp_no";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }
?>