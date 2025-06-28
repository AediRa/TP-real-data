<?php
    function getDepartment($data){
        $code="SELECT * FROM dept_manager join departments on dept_manager.dept_no=departments.dept_no join employees on employees.emp_no=dept_manager.emp_no where dept_manager.to_date > now()";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getEmployees($data,$id_dept){
        $code="SELECT * FROM dept_emp join departments on dept_emp.dept_no=departments.dept_no join employees on employees.emp_no=dept_emp.emp_no where departments.dept_no='$id_dept'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }
?>