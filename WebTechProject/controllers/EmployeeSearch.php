<?php
    include_once "../controllers/EmployeeController.php" ;
    $employees=employeesearch($_GET['ename']);
    if(count($employees)>0){
        foreach($employees as $employee){
			echo "<button onclick=location.href='employeedetail.php?eid=".$employee["id"]."'>".$employee["name"]."</button><br>";
        }
    }
?>