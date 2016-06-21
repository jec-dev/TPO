<?php
/*------------------------------------------------------
This to to decide which tab to place with active class and to open in body_content
-------------------------------------------------------*/
  //$page = '';
  if(isset($_GET['page'])){
    $page = $_GET['page'];
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
                    <li class="<?php if($page=='home'){ echo 'active';} ?>"><a href="<?php echo $BASE_URL; ?>?page=home">Home</a>
                    </li>
                    <li class="<?php if($page=='aboutus'){ echo 'active';} ?>" dropdown>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if($page=='aboutus'){ echo 'active';} ?>"><a href="?page=aboutus">About JEC</a>
                            </li>
                            <li class="<?php if($page=='alumni'){ echo 'active';} ?>"><a href="?page=alumni">Our Alumni</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if($page=='recruiters'){ echo 'active';} ?>"><a href="<?php echo $BASE_URL; ?>?page=recruiters">Recruiters</a>
                    </li>
                    <li class="<?php if($page=='contactus'){ echo 'active';} ?>"><a href="<?php echo $BASE_URL; ?>?page=contactus">Contact</a>
                    </li>
                    <li class="<?php if($page=='login'){ echo 'active';} ?>"><a href="<?php echo $LOGIN_URL; ?>?page=problems">Help / Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!--/header-->

