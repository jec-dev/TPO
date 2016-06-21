<?php
  $batch = $_SESSION['batch'];
  $dbConn = openDB($batch);

  $sql = "SELECT * FROM `notice` WHERE `noticePublish`=1 AND `noticeBatch`=$batch ORDER BY `noticeDate` DESC,`noticeEventDate` LIMIT 0,10";

  $r = mysqli_query($dbConn, $sql) or die('DB QUERY ERROR!!');
  $count = mysqli_num_rows($r);
  $notices=array();
  $lastUpdate='not updated yet';

  while($row = mysqli_fetch_assoc($r)){
    array_push($notices,$row);
  }
  if($count>0){
    $sql = "SELECT `noticeDate` FROM `notice` WHERE `noticePublish`=1 ORDER BY `noticeDate` DESC,`noticeEventDate` LIMIT 0,1";
    $r = mysqli_query($dbConn, $sql) or die('DB QUERY ERROR!!');
    $data = mysqli_fetch_assoc($r);
    $lastUpdate = date('d-M-Y',strtotime($data['noticeDate']));
  }

  closeDB($dbConn);
?>
<h2 class="align-center">NOTICE BOARD</h2>
<h6 class="align-center">Last Updated: <i><?php echo $lastUpdate; ?></i> | Notices for <?php echo $batch; ?> batch</h6>
<div class="table-responsive">
    <table class="table table-bordered table-condensed table-hover">
        <thead class="align-center" style="font-weight: 500">
            <tr>
                <td>Company / Organisation</td>
                <td>Event Type</td>
                <td>Event Date</td>
                <td>Event Time</td>
                <td>Event Venue</td>
                <td>Batch</td>
                <td>Branch</td>
                <td>Date</td>
            </tr>
        </thead>
        <tbody>
            <?php if($count>0){ foreach($notices as $notice){ $noticeDate = date('d-M-Y',strtotime($notice['noticeDate'])); $noticeEventDate = date('d-M-Y',strtotime($notice['noticeEventDate'])); $urgentClass = ''; if($notice['noticeLevel']=='urgent'){ $urgentClass = 'bg-info'; } $tr = '
            <tr class="'.$urgentClass.' align-center">' .'
                <td>
                    <h5>'.$notice['noticeCompany'].'</h5>
                </td>' .'
                <td>'.$notice['noticeEventType'].'</td>' .'
                <td>'.$noticeEventDate.'</td>' .'
                <td>'.$notice['noticeEventTime'].'</td>' .'
                <td>'.$notice['noticeEventVenue'].'</td>' .'
                <td>'.$notice['noticeBatch'].'</td>' .'
                <td>'.$notice['noticeBranch'].'</td>' .'
                <td>'.$noticeDate.'</td>' .'
            </tr>'; echo $tr; $tr = '
            <tr class="'.$urgentClass.'">' .'
                <td class="align-center">
                    <h5>Details<span class="help-block text-muted">of notice above</span></h5>
                </td>' .'
                <td colspan="7">'.$notice['noticeDetails'].'</td>' .'
            </tr>'; echo $tr; } }else{ echo '
            <tr class="align-center">
                <td colspan="8">No Notices Found</td>
            </tr>'; } ?>
        </tbody>
    </table>
    <h5 class="align-center"><a href="<?php echo $NOTICE_URL.'showall.php'; ?>" target="_TAB" >see all notices</a></h5>
</div>
