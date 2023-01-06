<?php
	session_unset();
	require_once  'controller/studentController.php';		
    $controller = new studentsController();	
    $controller->mvcHandler();
?>