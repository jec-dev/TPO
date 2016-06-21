<div class="container-fluid">

<?php
  if($page=="dashboard"){
    include_once $TEMPLATE_URL.'dashboard.php';
  }elseif($page=="details" && $section=="fillDetails"){
    include_once $TEMPLATE_URL.'fillDetails.php';
  }elseif($page=="details" && $section=="printDetails"){
    include_once $TEMPLATE_URL.'printDetails.php';
  }elseif($page=="details" && $section=="willingness"){
    include_once $TEMPLATE_URL.'willingness.php';
  }elseif($page=="details" && $section=="rules"){
    include_once $TEMPLATE_URL.'rules.php';
  }elseif($page=="details" && $section=="uploadPhoto"){
    include_once $TEMPLATE_URL.'uploadPhoto.php';
  }elseif($page=="details" && $section=="uploadCV"){
    include_once $TEMPLATE_URL.'uploadCV.php';
  }elseif($page=="details" && $section=="preference"){
    include_once $TEMPLATE_URL.'preference.php';
  }elseif($page=="details" && $section=="assessment"){
    include_once $TEMPLATE_URL.'assessment.php';
  }elseif($page=="details" && $section=="eligibilityCriteria"){
    include_once $TEMPLATE_URL.'eligibilityCriteria.php';
  }elseif($page=="details" && $section=="gateMockTest"){
    include_once $TEMPLATE_URL.'gateMockTest.php';
  }else{
    include_once $STATIC_URL.'404.php';
  }
?>

</div>