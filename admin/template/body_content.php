
<div class="container-fluid">

<?php
	if($page=="dashboard"){
		include_once $TEMPLATE_URL.'dashboard.php';
	}elseif($page=="details" && $section=="fillDetails"){
		include_once $TEMPLATE_URL.'fillDetails.php';
	}elseif($page=="details" && $section=="updateDetails"){
		include_once $TEMPLATE_URL.'updateDetails.php';
	}elseif($page=="details" && $section=="showDetails"){
		include_once $TEMPLATE_URL.'showDetails.php';
	}elseif($page=="details" && $section=="uploadPhoto"){
		include_once $TEMPLATE_URL.'uploadPhoto.php';
	}elseif($page=="details" && $section=="uploadCV"){
		include_once $TEMPLATE_URL.'uploadCV.php';
	}else{
		include_once $STATIC_URL.'404.php';
	}
?>

</div>