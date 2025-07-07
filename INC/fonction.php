<?php
    function getDepartment($data){
        $code="SELECT * FROM dept_manager join departments on dept_manager.dept_no=departments.dept_no join employees on employees.emp_no=dept_manager.emp_no join v_IdDept_NbEmp on v_IdDept_NbEmp.id_dept = dept_manager.dept_no  where dept_manager.to_date > now()";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getEmployees($data,$id_dept,$val){
        $code="SELECT * FROM dept_emp join departments on dept_emp.dept_no=departments.dept_no join employees on employees.emp_no=dept_emp.emp_no where departments.dept_no='$id_dept' and dept_emp.to_date > now() LIMIT $val,20";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getNbEmployees($data,$id_dept){
        $code="SELECT count(*) FROM dept_emp join departments on dept_emp.dept_no=departments.dept_no join employees on employees.emp_no=dept_emp.emp_no where departments.dept_no='$id_dept' and dept_emp.to_date > now()";
        $resultat = mysqli_query($data, $code);
        $nb = mysqli_fetch_assoc($resultat);
        return $nb['count(*)'];
    }

    function getFiche($data,$id_emp){
        $code="SELECT * FROM dept_emp_latest_date join titles on dept_emp_latest_date.emp_no=titles.emp_no join salaries on dept_emp_latest_date.emp_no=salaries.emp_no join employees on employees.emp_no=dept_emp_latest_date.emp_no  where employees.emp_no='$id_emp' and dept_emp_latest_date.to_date=titles.to_date and dept_emp_latest_date.to_date=salaries.to_date";
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

    function getage($data,$birth){
        $code="SELECT TIMESTAMPDIFF(YEAR, '$birth', CURDATE()) AS age";
        $resultat = mysqli_query($data, $code);
        $age = mysqli_fetch_assoc($resultat);
        return $age['age'];
    }

    function getResult_Employees($data,$nom,$dept,$age_max,$age_min,$val){
        $code1="SELECT birth_date FROM employees where employees.first_name='$nom'";
        $resultat1 = mysqli_query($data, $code1);

        if (mysqli_num_rows($resultat1) == 0) {
            return false;
        }

        $anniv = mysqli_fetch_assoc($resultat1);
        $age = getage($data,$anniv['birth_date']);

        $code="SELECT * FROM v_dept_deptEmp_Emp where v_dept_deptEmp_Emp.first_name='$nom' and v_dept_deptEmp_Emp.dept_name='$dept' and $age>'$age_min' and $age<'$age_max' LIMIT $val,20";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getResult_NbEmployees($data,$nom,$dept,$age_max,$age_min){
        $code1="SELECT birth_date FROM employees where employees.first_name='$nom'";
        $resultat1 = mysqli_query($data, $code1);

        if (mysqli_num_rows($resultat1) == 0) {
            return false;
        }

        $anniv = mysqli_fetch_assoc($resultat1);
        $age = getage($data,$anniv['birth_date']);

        $code="SELECT count(*) FROM v_dept_deptEmp_Emp where v_dept_deptEmp_Emp.first_name='$nom' and v_dept_deptEmp_Emp.dept_name='$dept' and $age>'$age_min' and $age<'$age_max'";
        $resultat = mysqli_query($data, $code);
        $nb = mysqli_fetch_assoc($resultat);
        return $nb['count(*)'];
    }

    function getNbF($data){
        $code="SELECT * FROM v_NbF";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getNbM($data){
        $code="SELECT * FROM v_NbM";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getSalaireByEmploi($data){
        $code="SELECT * FROM v_SalaryByEmpl";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getCorrectDate($date) {
        $d_date = new DateTime($date);
        $now = new DateTime();
    
        if ($d_date > $now) {
            return $now->format('d-m-Y'); 
        }
    
        return $d_date->format('d-m-Y');
    }

    function getCorrectSalaire($salaire){
        return number_format($salaire, 2, ',', ' ') . ' €';
    }

    function getCorrectNb($nb){
        return number_format($nb, 0, '', ' ');
    }

    function getCorrectGenre($genre){
        if($genre == "F"){
            return "femme";
        }
        if($genre == "M"){
            return "homme";
        }
    }

    function getDept($data,$id_dept){
        $code="SELECT * FROM v_dept_deptEmp  where v_dept_deptEmp.id_dept ='$id_dept'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

    function getlistDept($data,$id_dept){
        $code="SELECT * FROM departments  where departments.dept_no !='$id_dept'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }

?>