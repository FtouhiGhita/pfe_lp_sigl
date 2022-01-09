<?php
	$id = $_POST['id'];
	$role = $_POST['role'];
	session_start();
	$_SESSION['idSession'] = $id ;
	$_SESSION['roleSession'] = $role ;
?>