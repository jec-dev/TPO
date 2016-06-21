<?php
/*------------------------------------------------------
This to to decide which tab to place with active class and to open in body_content
-------------------------------------------------------*/
  //$page = '';
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }

  $section="";

  if($page=="fillDetails" || $page=="updateDetails" || $page=="printDetails" || $page=="uploadPhoto" || $page=="uploadCV" || $page=="preference" || $page=="rules" || $page=="assessment"){
    $section=$page;
    $page='details';
  }


?>
<style>
  @media print {
    .noPrint {
      display: none;
    }
  }
</style>

 <body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt noPrint" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $BASE_URL; ?>"><img src="<?php echo $IMAGE_URL.'logo.png'; ?>" alt="Training & Placement Office"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php if($page=='dashboard'){ echo 'active';} ?>"><a href="?page=dashboard">Dashboard</a>
                    </li>
                    <li class="<?php if($page=='assessment'){ echo 'active';} ?>"><a href="?page=assessment">Assessment Test</a>
                    </li>
                    <li class="<?php if($page=='details'){ echo 'active';} ?> dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Details <span class="caret"></span></a>
                        <ul class=" dropdown-menu">
                            <!-- <li class="<?php if($section=='fillDetails'){ echo 'active';} ?>"><a href="?page=fillDetails">Fill Details</a>
                            </li> -->
                            <!--<li class="<?php if($section=='updateDetails'){ echo 'active';} ?>"><a href="#">Update Details</a></li> ?page=updateDetails-->
                            <li class="<?php if($section=='printDetails'){ echo 'active';} ?>"><a href="?page=printDetails">Print Details</a>
                            </li>
                            <li class="divider"></li>
                            <li class="<?php if($section=='willingnessForm'){ echo 'active';} ?>"><a href="?page=willingness">Willingness Form</a>
                            </li>
                            <li class="divider"></li>
                            <li class="<?php if($section=='CodeofConduct'){ echo 'active';} ?>"><a href="?page=rules">Code of Conduct</a>
                            </li>
                            <li class="<?php if($section=='eligibilityCriteria'){ echo 'active';} ?>"><a href="?page=eligibilityCriteria">Eligibility Criteria</a>
                            </li>

                            <li class="divider"></li>
                            <li class="<?php if($section=='uploadPhoto'){ echo 'active';} ?>"><a href="?page=uploadPhoto">Upload Photo</a>
                            </li>
                            <li class="<?php if($section=='uploadCV'){ echo 'active';} ?>"><a href="?page=uploadCV">Upload CV</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if($page=='account'){ echo 'active';} ?> dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
                        <ul class=" dropdown-menu">
                            <li class=""><a href="<?php echo $LOGIN_URL.'resetPassword.php'?>">Change Password</a>
                            </li>
                            <li class=""><a href="<?php echo $LOGIN_URL.'resetEmail.php'?>">Change Recovery Email</a>
                            </li>
                            <li class=""><a href="<?php echo $LOGIN_URL.'resetSecurity.php'?>">Change Security Question/Answer</a>
                            </li>
                            <li class="divider"></li>
                            <li class=""><a href="<?php echo $LOGIN_URL.'logout.php'; ?>">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!--/header-->
    </div>
    <!--/ .navbar-default -->
