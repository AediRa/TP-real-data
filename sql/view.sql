CREATE OR REPLACE VIEW v_dept_deptEmp AS
SELECT dept_emp.dept_no as id_dept , dept_name , emp_no , from_date , to_date   FROM dept_emp join departments on dept_emp.dept_no=departments.dept_no where dept_emp.to_date > now() ;

CREATE OR REPLACE VIEW v_dept_deptEmp_Emp AS
SELECT birth_date,first_name,last_name ,gender,hire_date,id_dept,dept_name,from_date,to_date,employees.emp_no as id_emp FROM v_dept_deptEmp join employees on employees.emp_no = v_dept_deptEmp.emp_no ;

CREATE OR REPLACE VIEW v_IdDept_NbEmp AS
SELECT id_dept,count(*) as nb_empBydept from v_dept_deptEmp_Emp group by id_dept;

CREATE OR REPLACE VIEW v_NbF AS
SELECT gender,count(*) as NbF FROM v_dept_deptEmp_Emp where gender="F";

CREATE OR REPLACE VIEW v_NbM AS
SELECT gender,count(*) as NbM FROM v_dept_deptEmp_Emp where gender="M";

CREATE OR REPLACE VIEW v_SalaryByEmpl AS
SELECT title,AVG(salary) from v_dept_deptEmp_Emp join titles on titles.emp_no = v_dept_deptEmp_Emp.id_emp join salaries on salaries.emp_no = v_dept_deptEmp_Emp.id_emp group by titles.title;