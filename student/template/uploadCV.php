<?php
	$username = $_SESSION['username'];
	$batch = $_SESSION['batch'];
	
	$err='';
	$success='';
	
	if(isset($_POST['cv-submit'])){
		if(isset($_FILES['cv'])){
			
			$max_upload_size = 1020; // in kilobytes
			
			$cv = $_FILES['cv'];
			$ext = strtolower(end(explode('.',$cv['name'])));
			$size = round($cv['size']/1024,2);
			$type = $cv['type'];
			$tmp_name = $cv['tmp_name'];
			
			/*---------------------------------*/
			//print_r($_FILES);
			/*----------------------------------*/
			
			if(! (($type=='application/pdf') && ($ext=='pdf'))){
				$err='UPLOAD A VALID PDF FILE';
			}elseif($size>$max_upload_size){
				$err='SIZE TOO LARGE TO UPLOAD';
			}else{
				$cv_data = addslashes(file_get_contents($tmp_name)); //remember to strip slashes while reading image
				
				$dbConn=openDB($batch);
				$sql = "UPDATE `studentdocs` SET `studentCV` = '$cv_data', `studentCVSaved`=1 WHERE `rollno` LIKE '$username'";
				$r = mysqli_query($dbConn,$sql) or die(mysqli_error($dbConn));
				closeDB($dbConn);
				
				if(!$r){
					$err='DB QUERY ERROR! CANNOT UPLOAD CV';
				}else{
					$success="CV UPLOADED";
				}	
			}			
		}else{
			$err='CV NOT FOUND!';
		}
	}
	if($err!=''): 
?>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="alert alert-danger alert-dismissible align-center">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="noshadow-heading align-center"><?php echo $err; ?></h4>
				<p class="align-center">If this error is occouring frequently, contact tpo helpdesk : <a href="mailto:tpohelp@jec-jabalpur.org" class="alert-link">tpohelp@jec-jabalpur.org</a></p>
			</div>
		</div>
		<div class="col-lg-2"></div>
	</div>
<?php elseif($success!=''): ?>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="alert alert-success alert-dismissible align-center">
				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="noshadow-heading align-center"><?php echo $success; ?></h4>
			</div>
		</div>
		<div class="col-lg-2"></div>
	</div>
<?php endif; ?>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 well">
		<div class="well">
			<h3 class="align-center">UPLOAD CV</h3>
			<div class="row">
				<div class="col-lg-8">
					<form class="form form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<div class="col-lg-3">
								<label class="">Select CV: </label>
							</div>
							<div class="col-lg-5">
								<input class="" type="file" name="cv" required/>
							</div>
							<div class="col-lg-4">
								<input class="btn btn-success" type="submit" name="cv-submit" value="Upload"/>
							</div>
						</div>
					</form>
					<h4>Instructions</h4>
					<ol>
						<li>Upload your recent CV</li>
						<li>Upload <b>ONLY .PDF</b> format</li>
						<li>Size of CV must be less than 1 MB</li>
						<li>Upload a Digital copy, NOT a Scanned copy</li>	
					</ol>
				</div>
				<div class="col-lg-4">
					<h5><a href="getCV.php?rollno=<?php echo $username; ?>&batch=<?php echo $batch; ?>" target="_TAB">Download your CV here</a></h5>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-2"></div>
</div>	