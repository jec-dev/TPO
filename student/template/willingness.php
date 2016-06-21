<?php
	$dbConn = openDB($batch);
	$rollno=$_SESSION['username'];
	$sql = "SELECT `rollno`, `willing`
		FROM `student` WHERE `rollno` LIKE '$rollno'";
	$r = mysqli_query($dbConn,$sql) or die('DB Error! Unable to run query! : '.mysqli_error($dbConn));
	$data = mysqli_fetch_assoc($r);
	if(count($data)<2){
		die('DB Error! No Values found for the given user');
	}
	closeDB($dbConn);
	
	$enrollno=$data['rollno'];
	$willing=$data['willing'];
	$formpage = 0;
	if(isset($_GET['formpage'])){
		$formpage=$_GET['formpage'];
	}
	if($willing != 0):
?>
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="push"></div>
	</div>
	<div class="col-lg-2"></div>
	</div>
	
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 well">
			<div class="alert alert-info" align="center">
				<h3>WILLINGNESS FORM</h3>
				<p>
					<h4 class="noshadow-heading">You have already filled the willingness form.</h4>
					<b> Your Filled choice is: 
					<?php 
						if ($willing == 1)
							echo "Service Industry";
						else if ($willing == 2)
							echo "Core Industry";
						else if ($willing == 3)
							echo "Both Serivce and Core Industry";
					?>	
					</b>
				</p>
			</div>	
	</div>
	<div class="col-lg-2"></div>
	</div>
	
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="push"></div>
	</div>
	<div class="col-lg-2"></div>
	</div>


<?php
	elseif($willing == 0 && $formpage == 0):
?>
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="push"></div>
	</div>
	<div class="col-lg-2"></div>
	</div>
	
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 well">
			<div class="alert alert-info">
				<form method="POST">
				<fieldset>
				<h3>WILLINGNESS FORM</h3>
				<p>
					<h5 class="noshadow-heading">Please select according to your willingness:</h5>
					<b>1. Service Industries:</b> TCS, Infosys, Wipro, Mu Sigma, IBM-GBS etc. <br>
					<b>2. Core Industries:</b>  RIL, TATA Power, TATA Motors, Samsung, Persistent etc. <br><br>
				</p>
				<tr>
					<td>
						<select class="form-control" type="text" placeholder="Company Preference *" name="willing" required>
							<option value="0" <?php if($willing=='0'){echo 'selected';} ?> >Select company type</option>
							<option value="1" <?php if($willing=='1'){echo 'selected';} ?>>Service Industries</option>
							<option value="2" <?php if($willing=='2'){echo 'selected';} ?>>Core Industries</option>
							<option value="3" <?php if($willing=='3'){echo 'selected';} ?>>Both</option>
						</select>
					</td>
				</tr>
				<ul class="pager visible-desktop">
					<input class="btn btn-success" type="submit" name="willingnessform-submit" value="Save" formaction="?page=willingness&formpage=1" disabled/>
				</ul>
				<p align="center"><b> Sorry the form is closed now.<b><p>
				</fieldset>
				</form>
			</div>	
	</div>
	<div class="col-lg-2"></div>
	</div>
	
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="push"></div>
	</div>
	<div class="col-lg-2"></div>
	</div>

<?php
elseif($formpage==1):
	$dbConn = openDB($batch);
	$err = "";
	$success="";
	$err_cause="";
	//$d=array();
	
	if(isset($_POST['willingnessform-submit'])){		
		$willing=$_POST['willing'];
		
		$sql="UPDATE `student` SET
			`willing`='$willing'
			WHERE `rollno` LIKE '$enrollno' ";
			
		mysqli_query($dbConn,$sql);
		$success= "PAGE -  VALUES SAVED!";
	
	}

?>
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="push"></div>
	</div>
	<div class="col-lg-2"></div>
	</div>
	
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 well">
			<div class="alert alert-info">
				<h3>WILLINGNESS FORM</h3>
				<p>
					<h4 class="noshadow-heading">Thankyou for submiting your willingness.</h4>
				</p>
			</div>	
	</div>
	<div class="col-lg-2"></div>
	</div>
	
	<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="push"></div>
	</div>
	<div class="col-lg-2"></div>
	</div>


<?php	
	endif;
?>	