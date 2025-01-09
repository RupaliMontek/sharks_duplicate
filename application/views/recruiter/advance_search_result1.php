                       <div id="ajax_change_response">
                            <div class="" id="mynavbar">
                               <div class="mydropdown">
                                <button class="dropbtn">Add To
                                  <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="my-dropdown-content">
                                  <a href="#">Resdex Requirement</a>
                                  <a href="#">Folder</a>
                                </div>
                              </div> 
                              <div class="mydropdown">
                                <button class="dropbtn">Email 
                                  <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="my-dropdown-content">
                                  <!--<a href="#">Send a Job</a>-->
                                  <a href="javascript:void(0);" id="send_email">Send Email</a>
                                </div>
                              </div> 
                              <div class="mydropdown">
                                <button class="dropbtn">SMS 
                                  <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="my-dropdown-content">
                                  <a href="#">Selected Candidates</a>
                                  <a href="#">Mass SMS</a>
                                </div>
                              </div> 
                              <div class="mydropdown">
                                <button class="dropbtn">Set Reminder 
                                  <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="my-dropdown-content">
                                  <a href="#">For Call later</a>
                                  <a href="#">For Interview follow-up</a>
                                  <a href="#">For Sending JD</a>
                                  <a href="#">For Other task</a>
                                </div>
                              </div> 
                               <div class="mydropdown">
                                <button class="dropbtn">Sort by: Relevance 
                                  <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="my-dropdown-content">
                                  <a href="#">Freshness</a>
                                  <a href="#">Last Active Date</a>
                                  <a href="#">Relevance</a>
                                  <a href="#">Email Optimized</a>
                                </div>
                              </div> 
                            </div>
                            <div id="wrapper">
                            <div class="contents">
                            <label> <input type="checkbox" id="sel_all" >Select All</label>
                            <form action="<?=base_url('recruiter/recruiter/send_mail_candidate')?>" method="POST" id="send_job_candidate">
                              <?=$links;?>
                              <?php foreach ($fiter as $row):?>
                              <div class="" id="myprofile">
                                 <div class="row">
                                 <div class="col-md-8 tuple">
                                     <a href="javascript:void(0)">
                                        <h1>
                                            <input type="checkbox" class="checkBoxClass" name="candidate_emails[]" value="<?=$row->email_id?>">
                                            <?php if(isset($row->resume)){ ?>
                                            <a href="<?php echo base_url().''.$row->resume;?>" target="_blank"><?=$row->candidate_name?></a>
                                            <?php }else{ echo $row->candidate_name; } ?>
                                        </h1>
                                    </a>
                                       
                                   
                                    <div class="edu-details">
                                         <div class="row">
                                        <div class="col-md-3">
                                            <p><i class="fa fa-suitcase" aria-hidden="true"></i> <?=$row->yrs_of_experience?>yr <?=$row->months_of_experience?>m </p>
                                        </div>
                                        <div class="col-md-3">
                                             <p><i class="fa fa-rupee"></i><!-- Rs --> <?=$row->ctc?>.<?=$row->ctc_thousand?> Lacs <!-- Rs 3.75lacs --></p>
                                        </div>
                                        <div class="col-md-3">
                                             <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$row->location?></p>
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-md-3">    
                                        <p>Current : </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><!-- Java J2EE java full stack developer at cognizent --> <?=$row->position_skills?> at <?=$row->company_name?></p>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Previous :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><!-- Java J2EE java full stack developer at cognizent --><?=$row->position_skills?> at <?=$row->company_name?></p>
                                        </div>
                                        </div>
                                         <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Education :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?=$row->qulification?>  <!-- MCA Sinhgad College Pune, 2015 --></p>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Pref Loc :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?=$row->preffered_location?><!-- Banglore, Pune, Mumbai --></p>
                                        </div>
                                        </div>
                                         <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Key Skill :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?=$row->relevant_exp?><!-- Html, css, java script, bootstrap, php --> <!--<a style="color:blue"> more </a> --></p>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Position Skill :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?=$row->position_skills?><!-- Html, css, java script, bootstrap, php --> <!--<a style="color:blue"> more </a> --></p>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Company :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?=$row->company_name?><!-- Html, css, java script, bootstrap, php --> <!--<a style="color:blue"> more </a> --></p>
                                        </div>
                                        </div>
                                    </div>    
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-image">
                                    <img src="https://msuite.work/uploads/user_profile_pictures/1/man3.png" class="avatar" alt="User Image">
                                    <a href="javascript:void(0)"><p>I am <?=$row->position_skills?> developer<!-- I am Java full stack developer --></p></a>
                                    <a onclick="myFunction(<?=$row->dailyreport_id?>)" class="btn btn-light"><i class="fa fa-phone" aria-hidden="true"></i> Show phone No</a>
                                    <p><i class="fa fa-check" aria-hidden="true"></i> Verified phone + <i class="fa fa-check" aria-hidden="true"></i> Email</p>
                                    <div id="myDIV_<?=$row->dailyreport_id?>" style="display: none;" class="show-no"><?=$row->contact_no?> <!-- 9966554433 --></div>
                                     </div>
                                    
                                    
                                </div>
                                </div>
                             </div>
                             <div class="row ">
                                 <div class="col-md-10">
                                     <p><a>Similar cv(s) 3421</a></p>
                                 </div>
                                 <div class="col-md-2">
                                    <p>Review Later</p> 
                                 </div>
                             </div>
                             <?php endforeach;?>
                             
                             </form>
                             <?=$links;?>
                             </div>
                        </div>
                            
                    </div>