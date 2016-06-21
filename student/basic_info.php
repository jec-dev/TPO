
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8 well">
        <div class="well">
            <h4>TPO - DETAILS FORM - PAGE 1</h4>
            <div class="table-responsive">
                <form class="form form-horizontal" method="POST" action="">
                    <fieldset <fieldset <?php if($formLock==1 && $infoPage==1){echo 'disabled'; } ?> >
                        <table class="table table-condensed table-hover table-bordered">
                            <tbody>
                                <tr class="table-section-head">
                                    <td colspan=4>Personal Details<span class="help-block table-section-head-muted">as per marksheets</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">ROLL NUMBER</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="rollno" value="<?php echo $rollno; ?>" disabled required/>
                                    </td>
                                    <td>
                                        <label class="control-label">BATCH</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="Last Name *" name="batch" value="<?php echo $batch; ?>" disabled required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">FULL NAME</label>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="First Name *" name="FName" value="<?php echo $FName; ?>" required/>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="Middle Name" name="MName" value="<?php echo $MName; ?>" />
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" placeholder="Last Name *" name="LName" value="<?php echo $LName; ?>" required/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">DATE OF BIRTH</label><span class="help-block table-section-head-muted">format: yyyy-mm-dd</span>
                                    </td>
                                    <td>
                                        <input class="form-control datepicker" type="date" placeholder="YYYY-MM-DD Format *" name="dob" value="<?php echo $dob; ?>" required/>
                                    </td>
                                    <td>
                                        <label class="control-label">GENDER</label>
                                    </td>
                                    <td>
                                        <select class="form-control" type="text" placeholder="Last Name *" name="gender" required>
                                            <option value="" <?php if($gender=='' ){echo 'selected';} ?> >Select Gender</option>
                                            <option value="Male" <?php if($gender=='MALE' ){echo 'selected';} ?>>Male</option>
                                            <option value="Female" <?php if($gender=='FEMALE' ){echo 'selected';} ?>>Female</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr class="table-section-head">
                                    <td colspan=4>Current Academic Details<span class="help-block table-section-head-muted">Current Degree Details</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">COURSE</label><span class="help-block table-section-head-muted">current degree</span>
                                    </td>
                                    <td>
                                        <select class="form-control" name="course" required>
                                            <option value="" <?php if($course=='' ){echo 'selected';} ?> >Select Course</option>
                                            <option value="BE" <?php if($course=='BE' ){echo 'selected';} ?> >BE</option>
                                            <option value="ME" <?php if($course=='ME' ){echo 'selected';} ?> >ME</option>
                                            <option value="MCA" <?php if($course=='MCA' ){echo 'selected';} ?> >MCA</option>
                                            <option value="MSc" <?php if($course=='MSC' ){echo 'selected';} ?> >MSc</option>
                                    </td>
                                    <td>
                                        <label class="control-label">BRANCH</label>
                                    </td>
                                    <td>
                                        <select class="form-control" name="branch" required>
                                            <option value="" <?php if($branch=='' ){echo 'selected';} ?> >Select Branch</option>
                                            <option value="CSE" <?php if($branch=='CSE' ){echo 'selected';} ?> >Computer Science & Engineering</option>
                                            <option value="Civil" <?php if($branch=='CIVIL' ){echo 'selected';} ?> >Civil Engineering</option>
                                            <option value="Electrical" <?php if($branch=='ELECTRICAL' ){echo 'selected';} ?> >Electrical Engineering</option>
                                            <option value="E&TC" <?php if($branch=='E&TC' ){echo 'selected';} ?> >Electronics & Telecomm Engineering </option>
                                            <option value="IP" <?php if($branch=='IP' ){echo 'selected';} ?> >Industrial & Prod Engineering</option>
                                            <option value="IT" <?php if($branch=='IT' ){echo 'selected';} ?> >Information Technology</option>
                                            <option value="Mechanical" <?php if($branch=='MECHANICAL' ){echo 'selected';} ?> >Mechanical Engineering</option>
                                            <option value="MCA" <?php if($branch=='MCA' ){echo 'selected';} ?> >Computer Application</option>
                                            <option value="Maths" <?php if($branch=='MATHS' ){echo 'selected';} ?> >Applied Maths</option>
                                            <option value="Chemistry" <?php if($branch=='CHEMISTRY' ){echo 'selected';} ?> >Applied Chemistry</option>
                                            <option value="Physics" <?php if($branch=='PHYSICS' ){echo 'selected';} ?> >Applied Physics</option>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">ENTRY LEVEL</label><span class="help-block table-section-head-muted">exam cleared / quota used</span>
                                    </td>
                                    <td>
                                        <select class="form-control" name="entryLevel" required>
                                            <option value="" selected>Select Level</option>
                                            <option value="EL0" <?php if($entryLevel=="EL0" ){echo 'selected';}?> >Level 0</option>
                                            <option value="EL1" <?php if($entryLevel=="EL1" ){echo 'selected';}?> >Level 1</option>
                                            <option value="EL2" <?php if($entryLevel=="EL2" ){echo 'selected';}?> >Level 2</option>
                                    </td>
                                    <td class="text-muted" colspan="2">
                                        <ul class="sample">
                                            <li><b>Level 0:</b> JEE-Mains/PET/NRI/State Quota/College Level BE-BTech Counselling</li>
                                            <li><b>Level 1:</b> Lateral Entry/Diploma Entry</li>
                                            <li><b>Level 2:</b> GATE/College Level ME-MTech Counselling/MCA Counselling/MSc Counselling</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="control-label">Category</label><span class="help-block table-section-head-muted">Fill category: GEN, OBC, SC/ST</span>
                                    </td>                       
                                    <td>
                                        <select class="form-control" name="category" required>                                        
                                            <option value="GEN" <?php if($category=='GEN'){echo 'selected';} ?>>GEN</option>
                                            <option value="OBC" <?php if($category=='OBC'){echo 'selected';} ?>>OBC</option>
                                            <option value="SC" <?php if($category=='SC'){echo 'selected';} ?>>SC</option>
                                            <option value="ST" <?php if($category=='ST'){echo 'selected';} ?>>ST</option>
                                        </select>
                                    </td>
                                </tr>                                                    
                                <tr>
                                    <td>
                                        <label class="control-label">ADMISSION YEAR</label><span class="help-block table-section-head-muted">for current degree</span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="admissionYear" placeholder="Admission Year *" value="<?php echo $admissionYear; ?>" required />
                                    </td>
                                    <td>
                                        <label class="control-label">PASSING YEAR</label><span class="help-block table-section-head-muted">tentative</span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="passingYear" placeholder="Passing Year *" value="<?php echo $passingYear; ?>" required />
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">UNIVERSITY</label>
                                    </td>
                                    <td>
                                        <select class="form-control" name="university" required>
                                            <option value="" <?php if($university=='' ){echo 'selected';} ?> >Select University</option>
                                            <option value="RGPV" <?php if($university=='RGPV' ){echo 'selected';} ?> >RGPV Bhopal</option>
                                            <option value="RDVV" <?php if($university=='RDVV' ){echo 'selected';} ?> >RDVV Jabalpur</option>
                                        </select>
                                    </td>
                                    <td>
                                        <label class="control-label">CURRENT SEMESTER</label>
                                    </td>
                                    <td>
                                        <select class="form-control" name="semCurrent" required />
                                        <option value="" <?php if($semCurrent==0){echo 'selected';} ?>>Select Semester</option>
                                        <option value="1" <?php if($semCurrent==1){echo 'selected';} ?>>1</option>
                                        <option value="2" <?php if($semCurrent==2){echo 'selected';} ?>>2</option>
                                        <option value="3" <?php if($semCurrent==3){echo 'selected';} ?>>3</option>
                                        <option value="4" <?php if($semCurrent==4){echo 'selected';} ?>>4</option>
                                        <option value="5" <?php if($semCurrent==5){echo 'selected';} ?>>5</option>
                                        <option value="6" <?php if($semCurrent==6){echo 'selected';} ?>>6</option>
                                        <option value="7" <?php if($semCurrent==7){echo 'selected';} ?>>7</option>
                                        <option value="8" <?php if($semCurrent==8){echo 'selected';} ?>>8</option>
                                        <option value="9" <?php if($semCurrent==9){echo 'selected';} ?>>Passed College</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>
                                        <label class="control-label">DROP YEARS</label><span class="help-block table-section-head-muted">number of years dropped before current degree</span>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="dropYear" placeholder="Years Dropped *" value="<?php echo $dropYear; ?>" />
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4" class="pager visible-desktop align-center">
                                        <input class="btn btn-primary" type="reset" value="Reset" />
                                        <!-- <input class="btn btn-success" type="submit" name="tpoform-page1-submit" value="Save & Next" formaction="?page=fillDetails&formpage=2" /> -->
                                    	<input class="btn btn-success" type="submit" name="tpoform-page1-submit" value="Save & Next" formaction="?page=fillDetails&formpage=2"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
            <ul class="pager visible-desktop">
                <li><a class="" href="?page=fillDetails&formpage=2">Page 2 &rarr;</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
  endif;
?>