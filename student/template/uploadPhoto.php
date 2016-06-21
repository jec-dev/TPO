<?php
	$username = $_SESSION['username'];
	$batch = $_SESSION['batch'];
	
	$err='';
	$success='';
	
	if(isset($_POST['photo-submit'])){
		if(isset($_FILES['photo'])){
			
			$max_upload_size = 500; // in kilobytes
			
			$photo = $_FILES['photo'];
			$ext = strtolower(end(explode('.',$photo['name'])));
			$size = round($photo['size']/1024,2);
			$type = $photo['type'];
			$tmp_name = $photo['tmp_name'];
			
			/*---------------------------------*/
			//print_r($_FILES);
			/*----------------------------------*/
			
			if(! (($type=='image/jpg' || $type=='image/jpeg') && ($ext=='jpg' || $ext=='jpeg'))){
				$err='UPLOAD A VALID IMAGE FILE';
			}elseif($size>$max_upload_size){
				$err='SIZE TOO LARGE TO UPLOAD';
			}else{
				$photo_data = addslashes(file_get_contents($tmp_name)); //remember to strip slashes while reading image
				
				$dbConn=openDB($batch);
				$sql = "UPDATE `studentdocs` SET `studentPhoto` = '$photo_data', `studentPhotoSaved`=1 WHERE `rollno` LIKE '$username'";
				$r = mysqli_query($dbConn,$sql) or die(mysqli_error($dbConn));
				closeDB($dbConn);
				
				if(!$r){
					$err='DB QUERY ERROR! CANNOT UPLOAD PHOTO';
				}else{
					$success="PHOTO UPLOADED";
				}	
			}			
		}else{
			$err='PHOTO NOT FOUND!';
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
			<h3 class="align-center">UPLOAD PHOTO</h3>
			<div class="row">
				<div class="col-lg-8">
					<form class="form form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<div class="col-lg-3">
								<label class="">Select Photo: </label>
							</div>
							<div class="col-lg-5">
								<input class="" type="file" name="photo" required/>
							</div>
							<div class="col-lg-4">
								<input class="btn btn-success" type="submit" name="photo-submit" value="Upload"/>
							</div>
						</div>
					</form>
					<h4>Instructions</h4>
					<ol>
						<li>Upload your recent passport size photo</li>
						<li>Upload <b>ONLY .JPG/.JPEG</b> format photo</li>
						<li>Size of photo must be less than 500 kB</li>
						<li>Upload a Digital copy, NOT a Scanned copy</li>	
					</ol>
				</div>
				<div class="col-lg-4">
					<img class="thumbnail" src="getPhoto.php?rollno=<?php echo $username; ?>&batch=<?php echo $batch; ?>" alt="Your Photo will be shown here" width="160px" height="200px"/>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-2"></div>
</div>	