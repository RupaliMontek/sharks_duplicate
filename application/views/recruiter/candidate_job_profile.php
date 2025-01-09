<div class="container-fluid innerpagecontainer"> 
<div class="container"> 
    <div class="row">
        <div class="col-lg-8 col-sm-12 jobprofilepage">
            <div class="">
            <div class="jobheader">
                <img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/>
                <h6 class="jobtitle"><?php echo $row->profile; ?><br><span><?php
                if(!empty($row->job_id)){
                $query = $this->db->query("select * from client where client_id  =$row->job_id ");
                          $company_details = $query->row();
                echo @$company_details->client_name;
                
                }?></span></h6>
                <?php if(empty($job_apply_status)){ ?>
                <button type="button" onclick="apply_job_description(<?php echo $row->job_id ?>)" class="btn btn-primary hvr-sweep-to-right">Quick Apply</button> 
                <?php } else { ?>
                        <button type="button" class="btn btn-success hvr-sweep-to-right">Applied</button>
                <?php } ?>
                </div>

                <button type="button" class="btn btn-primary hvr-sweep-to-right">Send me jobs like this</button>


            </div>

            <ul class="jobdetailslinks">
                <li><a><i class="fa fa-map-marker"></i>
                
                <?php
                if(!empty($row->job_location))
                {
                $query = $this->db->query("select * from cities where id  =$row->job_location ");
                $city_details = $query->row();
                echo @$city_details->name;
                }
                 ?></a></li>
                <li><a><i class="fa fa-briefcase"></i><?php echo $row->min_exp_candidate."-".$row->max_exp_candidate." Years" ?></a></li>
                <li><a><i class="fa fa-eye"></i><?php echo $visit_count; ?> <i class="fa fa-paper-plane-o"></i><?php echo $candidate_count; ?> Applied
                </a></li>
            </ul>

            <div id="jobdescription" class="frJD">
                <h6>Job Description</h6>
                <?php  echo $row->job_descriptions;  ?>
            </div>

            <div id="moreinfo" class="moreInfo">
                <h6>More Info</h6>

<h6 class="subheading"><i class="fa fa-briefcase"></i>Job Type</h6>
<p><?php echo $row->employment_type ?></p>

<h6 class="subheading"><i class="fa fa-industry"></i>Industry</h6>
<p><?php  echo $row->industry_type ?></p>

<h6 class="subheading"><i class="fa fa-sitemap"></i>Roles</h6>
<p><?php echo $row->role ?></p>

<h6 class="subheading"><i class="fa fa-cogs"></i>Skills</h6>
<?php $array=$row->key_skills; 
    $button=explode(',',$array);                                             
    ?>
<?php foreach($button as $btn){  ?>
    <button style="font-size:16px" type="button" class="btn btn-light-blue btn-sm"><?php echo $btn ?></button>
 <?php }?>

<h6 class="subheading"><i class="fa fa-certificate"></i>Education</h6>
<p><?php echo $row->course_name ?></p>
</div>
<?php if(!empty($row->company_about))
{ ?>
<div id="recruiterinfo" class="aboutRecruitment">
    <h6>About Company <a href="Follow"></a></h6>
    <?=  $row->company_about; ?>
</div>
<?php } ?> 
 </div>

 


       
<div class="col-lg-4 col-sm-12">
<div class="frsimilarjobs">
    <h5>Similar job</h5>
    <?php if (!empty($similar_job)) { ?>    
                    <?php foreach ($similar_job as $row) { ?>
                    <a href="<?php echo base_url(); ?>recruitment/job_description/<?php echo $row->job_id; ?>">
                    <div class="jobprofileshort">
                        <div class="jobprofileshortTop">
                        <img width="70" height="auto" src="<?php echo base_url($row->client_logo);?>"/>
                            <h4><?php echo $row->profile; ?></h4>
                        <div class="compname_review"><?php echo $row->client_name; ?><span class="star"><i class="fa fa-star"></i>3.9</span>  <span class="frreview">9 Reviews</span></div>

                    </div>
                           <div class="jobdetails"> <i class="fa fa-briefcase"></i><?php echo $row->min_exp_candidate .
                               "-" .
                               $row->max_exp_candidate .
                               " Yrs"; ?>  | <i class="fa fa-inr"></i> Not disclosed |  <i class="fa fa-map-marker"></i><?php echo @$row->name; ?></div>
                           <p><?php echo substr(
                               $row->job_descriptions,
                               0,
                               100
                           ); ?>...</p>
                            <?php
                            $array = $row->key_skills;
                            $button = explode(",", $array);
                            ?>
                                        <?php foreach ($button as $btn) { ?>
                                          <button style="font-size:16px" type="button" class="btn btn-light-blue btn-sm"><?php echo $btn; ?></button>
                                        <?php } ?>                          
                        <div class="jobdetails_bottom">
               <i class="fa fa-history" aria-hidden="true"></i><span><?php
               $diff = abs(
                   strtotime($row->created_at) - strtotime(date("Y-m-d h:i:s"))
               );
               $years = floor($diff / (365 * 60 * 60 * 24));
               $months = floor(
                   ($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24)
               );
               $days = floor(
                   ($diff -
                       $years * 365 * 60 * 60 * 24 -
                       $months * 30 * 60 * 60 * 24) /
                       (60 * 60 * 24)
               );
               echo $days . " DAY AGO";
               ?></span><span class="right"><i class="fa fa-bookmark"></i>Save</span>
            </div>

                </div>
                 </a>
            <?php }} ?>                   
</div>

        </div>
    </div>
</div>
</div>