<?php
  //echo 'Notice ticker';

  $dbConn = openDB($defaultBatch);

  $sql = "SELECT * FROM `notice` WHERE noticeLevel LIKE 'urgent' AND noticeEventDate>=CURRENT_DATE() AND `noticePublish`=1 ORDER BY `noticeDate` DESC,`noticeEventDate`";

  $r = mysqli_query($dbConn, $sql) or die('DB QUERY ERROR!!');
  $count = mysqli_num_rows($r);
  $notices=array();

  if($count>0){
    while($row = mysqli_fetch_assoc($r)){
      array_push($notices,$row);
    }
  }

  closeDB($dbConn);

  if($count>0):
?>
   <div class="col-lg-2 well">
    <div class="alert alert-warning">
        <h5 class="ticker-label">IMPORTANT NOTICE<span class="glyphicon glyphicon-play"></span></h5>
    </div>
</div>
<div class="col-lg-10 well well-sm">
    <div id="ticker" class="alert alert-info">
        <marquee scrollamount="7" scrolldelay="0">
            <ul class="ticker">
                <?php foreach($notices as $notice){ $noticeDate=d ate( 'd-M-Y',strtotime($notice[ 'noticeDate'])); $noticeEventDate=d ate( 'd-M-Y',strtotime($notice[ 'noticeEventDate'])); $n=$ noticeDate. ' >> '.$notice[ 'noticeCompany']. ' '.$notice[ 'noticeEventType']. ' '.$notice[ 'noticeEventDateType']. ' '.$noticeEventDate. ' For Batch: '.$notice[ 'noticeBatch']. ' Branches: '. $notice[ 'noticeBranch']; echo "<li>|| $n << Login for more details ||</li>"; } ?>
                <li>This is Notice ticker.</li>
                <li>Important Notice points and information will be shown here as well.</li>
            </ul>
        </marquee>
    </div>
</div>

<?php endif; ?>
