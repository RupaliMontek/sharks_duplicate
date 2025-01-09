<?php if ($this->session->flashdata('success')): ?>
    <script>
        $(document).ready(function() {
            toastr.success('<?php echo $this->session->flashdata('success'); ?>', 'Success');
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        $(document).ready(function() {
            toastr.error('<?php echo $this->session->flashdata('error'); ?>', 'Error');
        });
    </script>
<?php endif; ?>
<?php $this->load->model('M_Candidate_profile');?>
<div class="container-fluid innerpagecontainer"> 
<div class="container searchfilter"> 
    <div class="row">
        <div class="col-lg-3 col-sm-12 nopaddingColForMobile">
            <div class="mnuserHomepageLeft">
                <div class="frprofile">
                <?php $progress_bar= 0; 
                    if(!empty($career_profile->preferred_work_location))
                    {
                    if(!empty($user_details[0]->resume))
                    {
                        $resume=20;
                        $progress_bar= $resume;                       
                        // print_r($progress_bar); die();
                    }
                    else
                    {
                        $resume=0;                        
                    }                        
                    if(!empty($career_profile->preferred_work_location))
                    {
                        $preferred_work_location = 2;
                        $progress_bar= @$resume+@$preferred_work_location;
                        // print_r($progress_bar); die();
                    }
                       
                    if(!empty($employement_details))
                    {
                        foreach($employement_details as $row)
                        {
                            if(!empty($row->emp_current_company_name && $row->emp_current_desigantion))
                            {
                               $candidate_designation_current_company = 10;
                               $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company;
                                //   print_r($progress_bar); die();
                            }
                            else
                            {
                                $candidate_designation_current_company = 0;
                                 
                            }
                        }
                        
                    }
                            
                    if(!empty($career_profile->career_profile_department))   
                     {
                        $career_profile_department=10;
                        $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department;
                        // print_r($progress_bar); die();
                     } 
                     else
                     {
                        $career_profile_department = 0;
                        
                     }
                      
                     
                      if(!empty($career_profile->career_current_industry)) 
                      {
                          $career_current_industry=2;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry;
                            // print_r($progress_bar); die(); 
                      }
                      else
                      {
                          $career_current_industry = 0;
                          
                      }
                      if(!empty($user_details[0]->image))
                      {
                          $profile_photo = 5;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo;
                        //   print_r($progress_bar); die();  
                          
                      }
                      else
                      {
                          $profile_photo = 0;
                          
                      }
                      if(!empty($resume_headline))
                       {
                          $resume_headlines = 8;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines;
                        //   print_r($progress_bar); die();
                        }
                       else
                       {
                          $resume_headlines = 0;
                          
                       }
                     
                       
                      if(!empty($know_language))
                      {
                          $candidate_know_language = 2;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $candidate_know_language = 0;
                      } 
                      
                      if(!empty($education_details))
                       {
                          $education_detail = 10;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $education_detail = 0;
                      }
                      
                      if(!empty($personal_details))
                      {
                          $personal_detail = 7;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail+@$personal_detail;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $personal_detail = 0;
                      }
                      
                      if(!empty($employement_details))
                      {
                          $employement_detail = 8;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail+@$personal_detail+@$employement_detail;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $employement_detail = 0;
                      }                    
                      
                     if(!empty($candidate_skils))
                       {
                          $key_skiil = 8;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail+@$personal_detail+@$employement_detail+@$key_skiil;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                           $key_skiil = 0;
                      }
                      
                     if(!empty($profile_summary))
                      {
                          $profile_summarys = 8;
                          $progress_bar= @$resume+@$preferred_work_location+@$candidate_designation_current_company+@$career_profile_department+@$career_current_industry+@$profile_photo+@$resume_headlines+@$candidate_know_language+@$education_detail+@$personal_detail+@$employement_detail+@$key_skiil+@$profile_summarys;
                        //   print_r($progress_bar); die();
                        }
                      else
                      {
                          $profile_summarys = 0;
                      }                     
                         
                    }
                    else
                    {
                        $preferred_work_location = 0;
                    }
                    
                    ?>        
                    
  <?php $profile_image = base_url($user_details[0]->image); ?>          
<?php
if($progress_bar==0)
{
   $progress_percentage = 1; 
}
else
{
   $progress_percentage = $progress_bar;
}

 ?>
                    
<div class="row d-flex justify-content-center ">
 <div class="circular-progress" data-inner-circle-color="white" data-percentage="<?= $progress_percentage; ?>" data-progress-color="blue" data-bg-color="lightgrey">
  <div class="inner-circle"><img class="circular-image" width="120" height="auto" src="<?php if(!empty($profile_image)){ echo $profile_image; } else{ echo base_url("frontend/images/profilepic.svg"); }?>"/>
  </div>
  <p class="percentage">0%</p>
</div>
<script>const circularProgress = document.querySelectorAll(".circular-progress");

Array.from(circularProgress).forEach((progressBar) => {
  const progressValue = progressBar.querySelector(".percentage");
  const innerCircle = progressBar.querySelector(".inner-circle");
  let startValue = 0,
    endValue = Number(progressBar.getAttribute("data-percentage")),
    speed = 50,
    progressColor = progressBar.getAttribute("data-progress-color");

  const progress = setInterval(() => {
    startValue++;
    progressValue.textContent = `${startValue}%`;
    progressValue.style.color = `${progressColor}`;

    innerCircle.style.backgroundColor = `${progressBar.getAttribute(
      "data-inner-circle-color"
    )}`;

    progressBar.style.background = `conic-gradient(${progressColor} ${
      startValue * 3.6
    }deg,${progressBar.getAttribute("data-bg-color")} 0deg)`;
    if (startValue === endValue) {
      clearInterval(progress);
    }
  }, speed);
});</script>
</div>
               
    <h6><?php echo @$user_details[0]->candidate_name; ?></h6>
    <p><?php echo @$last_employment->emp_current_desigantion; ?></p>
    <p><?php echo @$last_employment->emp_current_company_name; ?></p>
    <span>last updated date</span>
    <a class="button btn-primary hvr-wobble-bottom" href="<?php echo base_url("candidate_profile/fill_candidate_profile");?>">Complete Profile</a>
</div>           

<div class="profilePerformance">
<h6>Profile performance</h6>
<div class="performanceInn">
<div><p>Search appearances</p>
<!-- <a href="#">172 ></a> -->
</div>
<div><p>Recruiter actions</p>
<!-- <a href="#">13 ></a> -->
</div>
</div>
</div>
<div class="line"></div>  
<ul>
<li><a class="hvr-wobble-bottom" href="<?php echo base_url("candidate_profile/index"); ?>"><i class="fa fa-home"></i>My Home</a></li>
<li><a class="hvr-wobble-bottom" href="<?php echo base_url("recruitment/all_jobs"); ?>"><i class="fa fa-briefcase"></i>Jobs</a></li>
<li><a class="hvr-wobble-bottom" href="#top_companies"><i class="fa fa-building-o"></i>Companies</a></li>
<li><a class="hvr-wobble-bottom" href="<?php echo base_url("recruitment/blog"); ?>"><i class="fa fa-book"></i>Blogs</a></li>    
</ul>   
</div>
        </div>
        <div class="col-lg-6 col-sm-12 mnuserhomepageMiddle">
    <div id="recommended_job" class="MultiCarousel recommendedJobs" data-items="1,2,2,3" data-slide="1" id="MultiCarousel"  data-interval="1000">
    <h1>Choose Resume Template</h1>
    
            <div class="MultiCarousel-inner frResumeTempsss">
                <div class="item">
                    <div class="pad15">
                        <a href="<?php echo base_url("resume_builder/template1"); ?>"><div class="companylogos"><img width="" height="auto" src="<?php echo base_url("uploads/resume_template/resumetemp1.jpg") ?>"/></div>
                        <p class="ResumeTempName">Template 1</p></a>
                    </div>
                </div>
           
                <div class="item">
                    <div class="pad15">
                        <a href="<?php echo base_url("resume_builder/template2"); ?>"><div class="companylogos"><img width="" height="auto" src="<?php echo base_url("uploads/resume_template/resumetemp2.jpg") ?>"/></div>
                        <p class="ResumeTempName">Template 2</p></a>
                    </div>
                </div>
            
                <div class="item">
                    <div class="pad15">
                        <a href="<?php echo base_url("resume_builder/template3"); ?>"><div class="companylogos"><img width="" height="auto" src="<?php echo base_url("uploads/resume_template/resumetemp3.jpg") ?>"/></div>
                        <p class="ResumeTempName">Template 3</p></a>
                    </div>
                </div>
            
                <div class="item">
                    <div class="pad15">
                        <a href="<?php echo base_url("resume_builder/template4"); ?>"><div class="companylogos"><img width="" height="auto" src="<?php echo base_url("uploads/resume_template/resumetemp4.jpg") ?>"/></div>
                        <p class="ResumeTempName">Template 4</p></a>
                    </div>
                </div>
            
                <div class="item">
                    <div class="pad15">
                        <a href="<?php echo base_url("resume_builder/template5"); ?>"><div class="companylogos"><img width="" height="auto" src="<?php echo base_url("uploads/resume_template/resumetemp5.jpg") ?>"/></div>
                        <p class="ResumeTempName">Template 5</p></a>
                    </div>
                </div>
        
                <div class="item">
                    <div class="pad15">
                        <a href="<?php echo base_url("resume_builder/template6"); ?>"><div class="companylogos"><img width="" height="auto" src="<?php echo base_url("uploads/resume_template/resumetemp6.jpg") ?>"/></div>
                        <p class="ResumeTempName">Template 6</p></a>
                    </div>
                </div>
            </div>
            
            
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
        <?php
    $candidate_id = $this->session->userdata('candidate_id');
    $candidate_skils = $this->M_Candidate_profile->get_candidates_keyskill($candidate_id);
    $result_companies = $this->M_Candidate_profile->candidate_skills_fill_for_job_recommendtion($candidate_skils);
    
    // Limit the results to 5 (if there are more than 5 jobs available)
    $result_companies = array_slice($result_companies, 0, 3);
?>

<div id="recommended_job" class="MultiCarousel recommendedJobs" data-items="1,2,2,3" data-slide="1" data-interval="1000">
    <h1>Recommended Jobs For You 
        <a class="hvr-wobble-bottom" href="<?php echo base_url('candidate_profile/search_job?search=' . urlencode(implode(', ', array_map('trim', array_merge(...array_map(fn($item) => explode(',', $item->skills), $candidate_skils)))))); ?>">view all</a>
    </h1>

    <div class="MultiCarousel-inner" style="display: flex; justify-content: space-between; overflow-x: scroll;">
        <?php foreach($result_companies as $row_company) { 
            // Calculate days difference
            $created_at = $row_company->created_at;
            $current_date = new DateTime();
            $created_date = new DateTime($created_at);
            $interval = $current_date->diff($created_date);
            $days_diff = $interval->days;
        ?>

        <!-- <div class="item" style="flex: 1 1 30%; margin: 0 10px; box-sizing: border-box;">
            <div class="pad15" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                <div class="companylogos">
                    <img width="50" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png" alt="Company Logo"/>
                    <span><?php echo $days_diff . ' days ago'; ?></span>
                </div>
                <p class="lead" style="font-size: 16px; font-weight: bold;">Urgent Opening For a Designation</p>
                <p class="locationn" style="color: #777;"><?php echo $row_company->job_opening_address;?></p>
            </div>
        </div> -->
        <div class="item" style="flex: 1 1 30%; margin: 0 10px; box-sizing: border-box;">
        <div class="pad15" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <a href="<?php echo base_url('recruitment/job_description/' . $row_company->job_id); ?>" style="text-decoration: none; color: inherit;">    
        <div class="companylogos">
                <img width="50" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png" alt="Company Logo"/>
                <span><?php echo $days_diff . ' days ago'; ?></span>
            </div>
            <p class="lead" style="font-size: 16px; font-weight: bold;">Urgent Opening For a Designation</p>
            <p class="locationn" style="color: #777;"><?php echo $row_company->job_opening_address;?></p>
        </div>
    </a>
</div>


        <?php } ?>
    </div>
</div>

<!-- Removed the slider buttons as per the latest request -->
           
              

        <div class="recruitersApply">
            <h3>Recruiters are inviting you to apply!</h3>
            <div class="fromrecruiterss">
            <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/>
            <p><span class="jobtitleee">Urgent Opening For a Designation</span><br>
                   Company Name<br><span>4 d ago</span></p>
            </div>

            <div class="fromrecruiterss">
            <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/>
            <p><span class="jobtitleee">Urgent Opening For a Designation</span><br>
                        Company Name<br><span>4 d ago</span></p>
                        
            </div>

            <div class="fromrecruiterss">
            <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/>
            <p><span class="jobtitleee">Urgent Opening For a Designation</span><br>
                        Company Name<br><span>4 d ago</span></p>
                        
            </div>

            <a class="hvr-wobble-bottom" href="#">view all</a>

        </div>

<!--mnuserTopCompanies start here-->
        <div id="top_companies" class="mnuserTopCompanies">
          <div class="MultiCarousel topcompaniesslieder" data-items="1,2,2,3" data-slide="1" id="MultiCarousel"  data-interval="1000">
    <h1>Top Companies<br><span>Hiring for other design</span><a class="hvr-wobble-bottom" href="#">view all</a></h1>
            <div class="MultiCarousel-inner">

<?php foreach($client_list as $row){ ?>
                <div class="item">
                    <div class="pad15">
                        <p><img src="<?php echo base_url(); ?>frontend/images/complogo.png" width="100%" height="auto"></p>
                        <p class="lead"><?php echo $row->client_name ?></p>
                        <p>stars | 2.4k+ reviews</p>
                        <a href="<?php echo base_url();?>recruitment/get_job_post_company/<?php echo $row->client_id ?>" class="badge viewjobsss hvr-wobble-bottom">View Jobs</a>
                    </div>
                </div>
                
          <?php }?>

        


            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>  
        </div>
<!--mnuserTopCompanies end here -->

        </div>
        <div class="col-lg-3 col-sm-12 nopaddingColForMobile">
            <div class="jobFilterRight whatsupupdatess">
                <h6>Get updates directly on WhatsApp!</h6>
                <img width="90%" src="<?php echo base_url() ?>frontend/images/whatsapp-update.webp"/>
                <p>Know instantly when status of your job application changes</p>
                <a class="hvr-wobble-bottom" href="#">Whatsup Now</a>
             </div>

            <div class="jobFilterRight">

                    <!--div class="featuredCompanies">-->
<!-- mnuser blog start here -->
<div id="blogs" class="mnuserhomeBlog">
    <h6>Stay updated with our blogs</h6>
    <div class="mnuserhomeBlogInn">
    <?php foreach ($recent_2_blogs as $row): ?>
    <div class="blogshort">
        <img src="<?php echo base_url($row['image']); ?>" width="100%" height="auto" alt="Blog Image">
        <!-- <img src="http://localhost/msuite/frontend/images/imageicon.jpg" width="100%" height="auto"> -->
        <h6><?php
            $title = $row['title'];
            $titleLimited = (strlen($title) > 50) ? substr($title, 0, 50) . '...' : $title;
        ?></h6>
        <p><?php echo  $row['title']; ?> | <span><?php echo $row['cr_date']; ?></span></p>
    </div>
    <?php endforeach; ?> 
</div>
<a class="hvr-wobble-bottom" href="<?php echo base_url("recruitment/blog"); ?>">view all</a>
</div>
<!-- mnuser blog end here -->

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
       
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();

    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
</script>

<!-- company slider start here -->