<?php
	include_once 'student_config.php';
	
	session_start();
	if(!isset($_SESSION['username'])){
		session_destroy();
		header('location:'.$LOGIN_URL.'login.php?errno=2');
		exit(0);
	}
	
	include_once $STATIC_URL.'head.php';
	include_once $TEMPLATE_URL.'body_header.php';
	include_once $TEMPLATE_URL.'body_content.php';
	include_once $STATIC_URL.'body_footer.php';
?>