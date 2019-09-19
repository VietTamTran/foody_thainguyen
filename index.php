<?php 
	include('controller/controller.php');
	$controller = new controller();

	session_start();
	$action = isset($_GET['action']) ? $_GET['action'] : 'trangchu';
	
	if(isset($_SESSION['login'])==1){
		$controller->$action();
	}
	else{
		$controller->$action();
	}


 ?>
 