<div class="container-fluid innerpagecontainer"> 
<div class="container searchfilter"> 
    <div class="row">
        <div class="col-lg-3 col-sm-12 jobsearchfilterouter">
            <div class="jobFilterLeft">
                <h6>All Filters <span><a href="#"><!-- Applied (2) --></a></span></h6>
                <div class="line"></div>
                <div class="workmode">
    <h6>Work Mode</h6>
    <?php 
    if (!empty($get_work_mode_Count)) {
        foreach ($get_work_mode_Count as $row) {
            // Extract and sanitize data
           
            $mode = !empty($row['mode']) ? htmlspecialchars($row['mode']) : 'Work from office';
            $count = !empty($row['mode_with_count']) ? htmlspecialchars($row['mode_with_count']) : 0;
            
            // $mode_id = str_replace(' ', '_', strtolower(trim($mode))); 
            // print_r($mode); die();
    ?>
            <div class="chckBoxCont">
    <input onclick="filters_all_ajax()" type="checkbox" id="work_mode_<?php echo $mode; ?>" name="work_mode[]" value="<?php echo $mode; ?>">
    <label for="work_mode_<?php echo $mode; ?>">
        <p>
            <span class=""><?php echo $mode; ?></span>
            <span class="count">(<?php echo $count; ?>)</span>
        </p>
    </label>
</div>
    <?php 
        } 
    } else {
        echo "<p>No work modes available.</p>";
    }
    ?>
</div>
<div class="line"></div>
  <script type="text/javascript">
      function displaySliderValue(eSlider){   
      eSlider.parentElement.querySelector('span').textContent = eSlider.value+' '+'Yrs';
}
</script>

<div class="experience">
    <h6>Experience</h6>
    <div class="list-group">                   
        <input type="hidden" name="experience" id="experience" value="0">
        <div id="price_range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"></div>
        <p id="price_show">0 - 30</p>
    </div>  
</div>
<script>
    $(function () {
        $("#price_range").slider({
            range: true,
            min: 0,
            max: 30,
            values: [0, 30],
            slide: function (event, ui) {
                console.log("Slide Event: Min value = " + ui.values[0] + ", Max value = " + ui.values[1]);
                $("#experience").val(ui.values[0] + "-" + ui.values[1]);
                $("#price_show").text(ui.values[0] + " - " + ui.values[1]);
            },
            change: function (event, ui) {
                console.log("Change Event: Min value = " + ui.values[0] + ", Max value = " + ui.values[1]);
                $("#experience").val(ui.values[0] + "-" + ui.values[1]);
                filters_all_ajax_experience(ui.values[0] + "-" + ui.values[1]); // Call experience-specific function
            }
        });
    });
</script>


  <!-- <div class="line"></div>
    <div class="departmentt">
    <h6>Department</h6>
    <div class="chckBoxCont">
        <input onclick="filters_all_ajax()" type="checkbox" id="department" name="department" value="IT">
        <label for="">
            <p><span>Engineering - Software & QA</span>
        </label>
    </div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewdepartment">
  View More
</button>
<div class="modal fade fordepartmentmodal" id="viewdepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
<?php foreach ($departments as $row) { ?>
<div class="chckBoxCont">
        <input type="checkbox" id="<?php $row->dept_id; ?>">
        <label class="" for="">
            <p class=""><span class="" ><?php echo $row->dept_name; ?></span>
</div>
<?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Apply</button>
      </div>
    </div>
  </div>
</div>
</div> -->
    <div class="line"></div>
    <div class="forsalaryy">
    <h6>Salary</h6>
    <?php 
        if (!empty($get_salary_Count)) {
            $sliced_array = array_slice($get_salary_Count, 0, 4);
            foreach ($sliced_array as $row): 
                // print_r($row['salary_range']); die();
        ?>
            <div class="chckBoxCont">
                <input type="checkbox" id="salary" name="salary[]" value="<?php echo htmlspecialchars($row['salary_range']); ?>" 
                       onclick="filters_all_ajax()">
                <label for="salary">
                    <p>
                        <span><?php echo htmlspecialchars($row['salary_range']); ?></span> 
                        <span>(<?php echo htmlspecialchars($row['total_count']); ?>)</span>
                    </p>
                </label>
            </div>
        <?php 
            endforeach; 
        } else {
            echo "<p>No education options available.</p>";
        }
        ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewmoresalary">
  View More
</button>

<div class="modal fade forsalarymodal" id="viewmoresalary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Salary</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php if (!empty($get_salary_Count)): ?>
          <?php foreach ($get_salary_Count as $row): ?>
            <div class="chckBoxCont">     
              <input id="salary" name="salary[]" type="checkbox" value="<?php echo htmlspecialchars($row['salary_range']); ?>">
              <label for="salary">
                <p>
                  <span class="client-name"><?php echo htmlspecialchars($row['salary_range']); ?></span> 
                  <span class="salary-with-count">(<?php echo htmlspecialchars($row['total_count']); ?>)</span>
                </p>
              </label>      
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No salary available.</p>
        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="filters_all_ajax()" class="btn btn-primary">Apply</button>
      </div>
    </div>
  </div>
</div>

</div>
  <!-- <div class="line"></div>
  <div class="companytypee">
      <h6>Company Type</h6>
      <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Corporate</span>
    </div>

    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Foreign MNC</span>
    </div>

    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Indian MNC</span>
    </div>

    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Startup</span>
    </div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewcompanytype">
  View More
</button> -->

<!-- <div class="modal fade forcompanytypemodal" id="viewcompanytype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Company Type</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Corporate</span>
    </div>

    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Foreign MNC</span>
    </div>

    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Indian MNC</span>
    </div>

    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Startup</span>
    </div>
    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >MNC</span>
    </div>
    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Govt/PSU</span>
    </div>
    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Other</span>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Apply</button>
      </div>
    </div>
  </div>
</div>
</div> -->

<div class="line"></div>
<div class="rolecategoryy">
    <h6>Role Category</h6>
    
    <?php 
    if (!empty($get_Profiles_Count)) {
        $display_profiles = array_slice($get_Profiles_Count, 0, 4); // Get the first 4 profiles
        foreach ($display_profiles as $profile): 
            // print_r($display_profiles); die();
    ?>
        <div class="chckBoxCont">
            <input onclick="filters_all_ajax()" type="checkbox" value="<?= htmlspecialchars($profile['profile']) ?>" name="profile[]" id="profile">
            <label for="profile">
                <p>
                    <span><?= htmlspecialchars($profile['profile']) ?></span>
                    <span>(<?= htmlspecialchars(explode('(', $profile['profile_with_count'])[1]) ?></span>
                </p>
            </label>
        </div>
    <?php 
        endforeach; 
    } else {
        echo "<p>No Role Category available.</p>";
    }
    ?>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewrolecategory">
      View More
    </button>
</div>

<!-- Modal -->
<div class="modal fade forrolecategorymodal" id="viewrolecategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Role Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
        if (!empty($get_Profiles_Count)) {
            foreach ($get_Profiles_Count as $profile): 
        ?>
            <div class="chckBoxCont">
                <input onclick="filters_all_ajax()" type="checkbox" value="<?= htmlspecialchars($profile['profile']) ?>" name="profile[]" id="profile">
                <label for="profile">
                    <p>
                        <span><?= htmlspecialchars($profile['profile']) ?></span>
                        <span>(<?= htmlspecialchars(explode('(', $profile['profile_with_count'])[1]) ?></span>
                    </p>
                </label>
            </div>
        <?php 
            endforeach; 
        } else { 
            echo "<p>No profiles available.</p>"; 
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Apply</button>
      </div>
    </div>
  </div>
        </div>
        <div class="educationnn">
    <div class="line"></div>
    <h6>Education</h6>
    <form method="post">
        <?php 
        if (!empty($get_education_Count)) {
            $sliced_array = array_slice($get_education_Count, 0, 4); // Get the first 4 education options
            foreach ($sliced_array as $row): 
        ?>
            <div class="chckBoxCont">
                <input type="checkbox" id="education_filter" 
                       name="education_filter[]" 
                       value="<?php echo htmlspecialchars($row['education']); ?>" 
                       onclick="filters_all_ajax()">
                <label for="education_filter">
                    <p>
                        <span><?php echo htmlspecialchars($row['name']); ?></span> 
                        <span><?php echo htmlspecialchars(explode(' ', $row['education_with_count'])[1]); ?></span>
                    </p>
                </label>
            </div>
        <?php 
            endforeach; 
        } else {
            echo "<p>No education options available.</p>";
        }
        ?>
    </form>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vieweducation">
        View More
    </button>

    <div class="modal fade foreducationmodal" id="vieweducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php 
                    if (!empty($get_education_Count)) {
                        foreach ($get_education_Count as $row): 
                    ?>
                        <div class="chckBoxCont">     
                            <input type="checkbox" id="education_filter_<?php echo htmlspecialchars($row['education']); ?>" 
                                   name="education_filter[]" 
                                   value="<?php echo htmlspecialchars($row['education']); ?>">
                            <label for="education_filter_<?php echo htmlspecialchars($row['education']); ?>">
                                <p>
                                    <span><?php echo htmlspecialchars($row['name']); ?></span> 
                                    <span><?php echo htmlspecialchars(explode(' ', $row['education_with_count'])[1]); ?></span>
                                </p>
                            </label>      
                        </div>
                    <?php 
                        endforeach; 
                    } else { 
                        echo "<p>No education options available.</p>"; 
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button onclick="filters_all_ajax()" type="button" class="btn btn-primary">Apply</button>
                </div>
            </div>
        </div>
    </div>
</div>

                 <!-- <div class="line"></div> -->
                <!-- <div class="posted_by">
                    <h6>Posted By</h6>
                   
                    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Company Jobs</span>
    </div>

    <div class="chckBoxCont">
        <input type="checkbox" id="">
        <label class="" for="">
            <p class=""><span class="" >Consultant Jobs</span>
    </div>
</div> -->

<!-- <div class="Topcompanyss">
    <div class="line"></div>
    <h6>Top Companies</h6>
    <form method="post">
        <?php 
        if (!empty($companies)) {
            $sliced_array = array_slice($companies, 0, 4); // Get the first 4 companies
            foreach ($sliced_array as $row): 
        ?>
            <div class="chckBoxCont">
                <input type="checkbox" id="company" 
                       name="companies[]" 
                       value="<?php echo htmlspecialchars($row->client_id); ?>" 
                       onclick="filters_all_ajax()">
                <label for="company">
                    <p>
                        <span><?php echo htmlspecialchars($row->client_name); ?></span> 
                    </p>
                </label>
            </div>
        <?php 
            endforeach; 
        } else {
            echo "<p>No companies available.</p>";
        }
        ?>
    </form> -->

    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vietopCompanies">
        View More
    </button> -->

    <!-- Modal -->
    <!-- <div class="modal fade fortopCompaniesmodal" id="vietopCompanies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Top Companies</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php 
                    if (!empty($companies)) {
                        foreach ($companies as $row): 
                    ?>
                        <div class="chckBoxCont">
                            <input type="checkbox" id="company_<?php echo htmlspecialchars($row->client_id); ?>" 
                                   name="companies[]" 
                                   value="<?php echo htmlspecialchars($row->client_id); ?>">
                            <label for="company_<?php echo htmlspecialchars($row->client_id); ?>">
                                <p>
                                    <span><?php echo htmlspecialchars($row->client_name); ?></span> 
                                </p>
                            </label>
                        </div>
                    <?php 
                        endforeach; 
                    } else {
                        echo "<p>No companies available.</p>";
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="filters_all_ajax()" class="btn btn-primary">Apply</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="locationn">
    <div class="line"></div>
    <h6>Location</h6>
    <form method="post">
        <?php 
        if (!empty($get_location_Count)) {
            $sliced_array = array_slice($get_location_Count, 0, 4); // Get the first 4 education options
            foreach ($sliced_array as $row): 
        ?>
            <div class="chckBoxCont">
                <input type="checkbox" id="location" name="location[]" value="<?php echo htmlspecialchars($row['name']); ?>" 
                       onclick="filters_all_ajax()">
                <label for="location">
                    <p>
                        <span><?php echo htmlspecialchars($row['name']); ?></span> 
                        <span><?php echo htmlspecialchars(explode(' ', $row['job_location_with_count'])[1]); ?></span>
                    </p>
                </label>
            </div>
        <?php 
            endforeach; 
        } else {
            echo "<p>No education options available.</p>";
        }
        ?>
    </form>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewlocation">
        View More
    </button>

<div class="modal fade forlocationmodal" id="viewlocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if (!empty($get_location_Count)): ?>
          <?php foreach ($get_location_Count as $row):?>
            
            <div class="chckBoxCont">     
              <input id="location<?php echo htmlspecialchars($row['job_location']); ?>" 
                     name="location[]" 
                     type="checkbox" 
                     value="<?php echo htmlspecialchars($row['job_location']); ?>">
              <label for="location<?php echo htmlspecialchars($row['job_location']); ?>">
                <p>
                  <span class="client-name"><?php echo htmlspecialchars($row['name']); ?></span> 
                  <span class="job-location-with-count"><?php echo htmlspecialchars($row['job_location_with_count']); ?></span>
                </p>
              </label>      
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No locations available.</p>
        <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" onclick="filters_all_ajax()">Apply</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
        
        <div id="job_filtersssss" class="hidden"></div>
        <div id="job_filters" class="col-lg-6 col-sm-12 jobFilterMiddle">
            <?php if (!empty($job_latest)) { ?>    
                    <?php foreach ($job_latest as $row) { ?>
                    <a href="<?php echo base_url(); ?>recruitment/job_description/<?php echo $row->job_id; ?>">
                        
                    <div class="jobprofileshort">
                        <div class="jobprofileshortTop">
                            
                      <?php
                        if ($row->job_id) {
                            $query = $this->db->query("SELECT * FROM client WHERE client_id = $row->job_id");
                            $company_details = $query->row();

                            if (isset($company_details->client_logo) && !empty($company_details->client_logo)) {
                                $logo_path = base_url($company_details->client_logo);
                                if (@getimagesize($logo_path)) {
                                    echo '<img width="70" height="auto" src="' . $logo_path . '" alt="Company Logo" />';
                                }
                            }
                        }
                        ?> 
                          <h4><?php echo $row->profile; ?></h4>
                        <div class="compname_review">
                        <?php  
                        if($row->company_name)
                        {
                           
                        }?>
                        <span class="star"><i class="fa fa-star"></i>3.9</span>  <span class="frreview">9 Reviews</span></div>
                    </div>
                           <div class="jobdetails"> <i class="fa fa-briefcase"></i><?php echo $row->min_exp_candidate .
                               "-" .
                               $row->max_exp_candidate .
                               " Yrs"; ?>  | <i class="fa fa-inr"></i><?php echo $row->comany_min_package_offer .
                               "-" .
                               $row->comany_max_package_offer .
                               " LPA"; ?> |  <i class="fa fa-map-marker"></i><?php echo $row->name; ?></div>
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
       
        <div class="col-lg-3 col-sm-12">
             <div  id="job_filter"></div>
            <div class="jobFilterRight">

                    <div class="featuredCompanies">
                        
                        <h6>See jobs in featured companies</h6>
                        <marquee width="60%" direction="down" height="auto" scrollamount="3">
                        <img src="<?php echo base_url(); ?>frontend/images/complogo.png"/>
                        <img src="<?php echo base_url(); ?>frontend/images/complogo.png"/>
                        <img src="<?php echo base_url(); ?>frontend/images/complogo.png"/>
                        <img src="<?php echo base_url(); ?>frontend/images/complogo.png"/>
                        <img src="<?php echo base_url(); ?>frontend/images/complogo.png"/>
                        <img src="<?php echo base_url(); ?>frontend/images/complogo.png"/>
                        <img src="<?php echo base_url(); ?>frontend/images/complogo.png"/>
                        <img src="<?php echo base_url(); ?>frontend/images/complogo.png"/>
                        </marquee>
                    </div>
            </div>

             <div class="jobFilterRight">
                <h6>Advertisement Section</h6>
                <img width="90%" src="<?php echo base_url(); ?>frontend/images/complogo.png"/>
             </div>

             <div class="jobFilterRight">
                <h6>Filter Jobs By Location</h6>
                <ul>
                    <?php if (!empty($jobs_by_locations)): ?>
                        <?php foreach ($jobs_by_locations as $job): ?>
                            <?php 
                                // Get the location name from the mapping
                                $location_name = isset($location_names[$job->job_location]) ? $location_names[$job->job_location] : "Unknown Location";
                            ?>
                            <li>
                                <a href="<?php echo base_url('candidate_profile/search_job?location=' . urlencode($location_names[$job->job_location])); ?>">
                                    <?php echo htmlspecialchars($location_name); ?>
                                    <span><?php echo htmlspecialchars($job->job_count); ?> Jobs</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>No jobs available.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function(){
    $("#filterform").on("change", "input:checkbox", function(){
        $("#filterform").submit();z
    });
});
</script>