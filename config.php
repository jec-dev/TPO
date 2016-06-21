<?php
	/*-------------------------------------------------------------------------------
	This reporting level is used for shifting between DEVELPOMENT & PRODUCTION PHASES.
	---------------------------------------------------------------------------------*/

	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); //for development

	//error_reporting(0); // for production

	/*------------------------------------------------------------------------------
	URL to various assests throughout the system.
	------------------------------------------------------------------------------*/
	$CONFIG_URL="./";
	$BASE_URL="./";
	$CSS_URL="./css/";
	$IMAGE_URL="./image/";
	$JS_URL="./js/";
	$FONT_URL="./fonts/";
	$TEMPLATE_URL="./template/";
	$LOGIN_URL="./login/";
	$STUDENT_URL="./student/";
	$ADMIN_URL="./admin/";
	$NOTICE_URL="./notice/";
	$SHARED_URL="./shared/";

	/*------------------------------------------------------------------------------
	This is for ACTIVE class.
	-------------------------------------------------------------------------------*/
	$page='home';

	/*------------------------------------------------------------------------------
	THIS IS DEFAULT PASSING BATCH YEAR.
	change it every time a new TPO session is initiated.
	this is primarily used for displaying notices.
	Notices are general and no notices are specifically posted as per the batch DB.
	-------------------------------------------------------------------------------*/
	$defaultBatch = 2016;


	/*------------------------------------------------------------------------------
	function to open a connection to database.
	------------------------------------------------------------------------------*/
        function openDB($batch){
                // edit username and password or create DB with same credentials
		$username="tpo_user";
		$password="tpo_password";
		$host="localhost";
		$db = "";

                // create tables for below
		switch($batch){
			case 2015:
				$db="enginee1_tpo15";
				break;
			case 2016:
				$db="enginee1_tpo16";
				break;
			case 2017:
				$db="enginee1_tpo17";
				break;
			default: break;
		}
		$err_level = error_reporting(0);
		$dbConn = mysqli_connect($host,$username,$password,$db) or die('DB Connection Error!');
		error_reporting($err_level);
		return $dbConn;
	}

	/*------------------------------------------------------------------------------
	function to close a connection to database.
	------------------------------------------------------------------------------*/
	function closeDB($dbConn){
		mysqli_close($dbConn);
	}

	/*------------------------------------------------------------------------------
	SETTING TIMEZOME FOR DATE FUNCTIONS..
	------------------------------------------------------------------------------*/
	date_default_timezone_set('Asia/Kolkata');
?>
