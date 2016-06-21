<div class="container-fluid">
<?php
	$page_load = 'home.php';

	if($page=='home'){
		$page_load = 'home.php';
	}elseif($page=='aboutus'){
		$page_load = 'aboutus.php';
	}elseif($page=='alumni'){
		$page_load = 'alumni.php';
	}elseif($page=='recruiters'){
		$page_load = 'recruiters.php';
	}elseif($page=='contactus'){
		$page_load = 'contactus.php';
	}elseif($page=='developers'){
		$page_load = 'developers.php';
	}else{
		$page_load = '404.php';
	}
	include_once $page_load;
?>
</div>