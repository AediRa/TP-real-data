<?php
    function getDepartment($data){
        $code="SELECT * FROM dept_manager join departments on dept_manager.dept_no=departments.dept_no join employees on employees.emp_no=dept_manager.emp_no where dept_manager.to_date > now()";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getEmployees($data,$id_dept){
        $code="SELECT * FROM dept_emp join departments on dept_emp.dept_no=departments.dept_no join employees on employees.emp_no=dept_emp.emp_no where departments.dept_no='$id_dept' and dept_emp.to_date > now()";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getFiche($data,$id_emp){
        $code="SELECT * FROM employees join titles on employees.emp_no=titles.emp_no join salaries on employees.emp_no=salaries.emp_no where employees.emp_no='$id_emp'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getTitle($data,$id_emp){
        $code="SELECT * FROM employees join titles on employees.emp_no=titles.emp_no where employees.emp_no='$id_emp'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getSalaries($data,$id_emp){
        $code="SELECT * FROM employees join salaries on employees.emp_no=salaries.emp_no where employees.emp_no='$id_emp'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }
?>