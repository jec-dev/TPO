<?php
  include_once 'notice_config.php';

  include_once $TEMPLATE_URL.'head.php';
  include_once $TEMPLATE_URL.'body_header.php';

  $dbConn = openDB($defaultBatch);

  $sql = "SELECT * FROM `notice` WHERE `noticePublish`=1 ORDER BY `noticeDate` DESC,`noticeEventDate` LIMIT 0,10";

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
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 well">
            <div class="well">
                <h2 class="align-center">ALL NOTICES</h2>
                <h6 class="align-center">Last Updated: <i><?php echo $lastUpdate; ?></i></h6>
                <div class="table-responsive align-center">
                    <table class="table table-bordered table-condensed table-hover">
                        <thead class="">
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

<?php
if($count>0){
  foreach($notices as $notice){
    $noticeDate = date('d-M-Y',strtotime($notice['noticeDate']));
    $noticeEventDate = date('d-M-Y',strtotime($notice['noticeEventDate']));
    $urgentClass = '';

    if($notice['noticeLevel']=='urgent'){
      $urgentClass = 'bg-info';
    }

    $tr = '<tr class="'.$urgentClass.'">'
        .'<td>'.$notice['noticeCompany'].'</td>'
        .'<td>'.$notice['noticeEventType'].'</td>'
        .'<td>'.$notice['noticeEventDateType'].' '.$noticeEventDate.'</td>'
        .'<td>'.$notice['noticeEventTime'].'</td>'
        .'<td>'.$notice['noticeEventVenue'].'</td>'
        .'<td>'.$notice['noticeBatch'].'</td>'
        .'<td>'.$notice['noticeBranch'].'</td>'
        .'<td>'.$noticeDate.'</td>'
        .'</tr>';
    echo $tr;
  }
}else{
    echo '<tr class="align-center"><td colspan="8">No Recent Notices Found. See all notices for OLD notices</td></tr>';
}
?>
    </tbody>
  </table>

</div>

      </div><!-well->
    </div><!-col-lg-12->
  </div><!-row->
</div><!-container->
<?php
  include_once $TEMPLATE_URL.'body_footer.php';
?>