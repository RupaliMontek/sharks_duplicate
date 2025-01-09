<?php if (!empty($job_latest)) { ?>    
                    <?php foreach ($job_latest as $row) { ?>
                    <a href="<?php echo base_url(); ?>recruitment/job_description/<?php echo $row->job_id; ?>">
                    <div class="jobprofileshort">
                        <div class="jobprofileshortTop">
                       <!-- <img width="70" height="auto" src="<?php
                        echo base_url();
                        echo @$row->company_logo;
                        ?>"/>-->
                            <h4><?php echo $row->profile; ?></h4>
                        <div class="compname_review"><?php echo $row->client_name; ?><span class="star"><i class="fa fa-star"></i>3.9</span>  <span class="frreview">9 Reviews</span></div>

                    </div>
                           <div class="jobdetails"> <i class="fa fa-briefcase"></i><?php echo $row->min_exp_candidate .
                               "-" .
                               $row->max_exp_candidate .
                               " Yrs"; ?>  | <i class="fa fa-inr"></i> Not disclosed |  <i class="fa fa-map-marker"></i><?php echo $row->name; ?></div>
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