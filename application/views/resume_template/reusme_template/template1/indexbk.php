<!doctype html>
<html>
  <head>
    <title>Template 1</title>
    <meta charset="UTF-8">
    <meta name="description" content="Your site's description should be here">
    <meta name="keywords" content="Your site's keywords should be here">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template1/style.css");?>"> 

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;subset=cyrillic,cyrillic-ext,latin,latin-ext,vietnamese">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic&amp;subset=latin,latin-ext">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url("frontend/js/resume_builder/template1/match-height.js");?>"></script> 
    <script>
		$(function () {
			$('.match-height-bootstrap-row > * > *').matchHeight();
			$('.match-height > *').matchHeight();
		})
	</script>
  </head>
  <body>
   <div class="container">
        <div class="row">
            <div class="col-md-5 bg-light align-left">
                    <a href="<?php echo base_url("template1_convert_pdf"); ?>" class="btn btn-primary">convert pdf</a>
            </div>
        </div>
    </div>
    
    <div class="background">
      <div class="l-constrained group">
        <div class="col">
        <?php if(!empty($user_details)){$profile_image = base_url($user_details[0]->image);} ?>
          <img class="double-click-here" src="<?php echo $profile_image; ?>" alt="" width="308" height="366">
          <div class="education">
            <p class="education-2">education</p>
            <div class="rectangle-3-copy-2"></div>
            <?php
            if(!empty($education_details))
            {
             foreach($education_details as $rows) 
             { 
                
               $data = $this->M_Candidate_profile->get_all_education_details_specialization( @$rows->specialization_course);
               if ($rows->education == 5 || $rows->education ==4 ) 
               {
                   $data = $this->M_Candidate_profile->get_candidate_education($rows->education); 
                   $education_name = $data[0]->main_course_name;
                   $univercity = $rows->board;
                   $passout_year = $rows->passout_year;
               }
               elseif($rows->education== 3 || $rows->education==1 || $rows->education==2)
               {
                   $query = $this->db->query("select * from candidate_course where course_id = $rows->course");
                   $course_details = $query->row();
                   $education_name = @$course_details->course_name." ".$data->specialization_name;
                   $univercity = $rows->university_name;
                   $passout_year = $rows->course_start_year ."-" .$rows->course_end_year;
               }
               ?>
            <div class="group-2">
              <p class="text"><?= $education_name; ?></p>
              <p class="text-2"><?= $univercity; ?><br><?= $passout_year; ?></p>
            </div>
            <?php } } ?>
          </div>
         
          <div class="wrapper-3">
            <div class="rectangle-3-holder">
              <div class="rectangle-3-copy-3"></div>
            </div>
            <div class="phone">
              <p class="phone-2">Phone</p>
              <p class="text-11"><?php if(!empty($user_details)){ echo @$user_details[0]->contact; } ?></p>
            </div>
          </div>
          <div class="wrapper-5">
            <div class="rectangle-3-copy-4-holder">
              <div class="rectangle-3-copy-4"></div>
            </div>
            <div class="email">
              <p class="email-2">Email</p>
              <p class="text-12"><?php if(!empty($user_details)){ echo @$user_details[0]->email; } ?></p>
            </div>
          </div>
          <div class="rectangle-3-copy-6-holder group">
            <div class="rectangle-3-copy-6"></div>
            <p class="address">Address</p>
          </div>
          <p class="text-14"><?php if(!empty(@$personal_details[0]
                                ->permanent_add && $personal_details[0]->hometown && $personal_details[0]->pincode  )){ echo @$personal_details[0]
                                ->permanent_add .
                                "/" .
                                @$personal_details[0]->hometown .
                                "/" .
                                @$personal_details[0]->pincode; } ?></p>
        </div>
        <div class="col-2">
          <div class="rectangle-2-holder">
            <div class="name-title">
              <p class="text-15"><strong class="fw700"><?php echo @$user_details[0]->name; ?> </strong><?php echo @$user_details[0]->l_name; ?></p>
              <p class="text-16"><?php 
              if(!empty($employement_details))
                {   
                    foreach($employement_details as $row)
                    {  ?>
                
                        <p class="text-21"><?php echo $row->emp_current_desigantion; ?></p>
                <?php } } ?>
            </p>
            </div>
          </div>
          <div class="about-me">
            <p class="text-17">profile summary</p>
            <div class="rectangle-2-copy-3"></div>
            <p class="text-18"><?php if(!empty($profile_summary)){ echo @$profile_summary->profile_summary; } ?></p>
          </div>
          <div class="work-experience">
            <p class="text-19">work experience</p>
            <div class="rectangle-2-copy"></div>
            <?php if(!empty($employement_details))
            {   foreach($employement_details as $row)
                {  ?>
                <div class="group-6 group">
                    <p class="text-20"><?= $row->emp_joining_year; ?>-<?php if(empty($row->emp_work_till_year)){ echo "Present"; }else { echo $row->emp_work_till_year; }; ?></p>
                    <div class="col-6">
                      <p class="text-21"><?php echo $row->emp_current_desigantion; ?></p>
                      <p class="text-22"><?php if(empty($row->emp_current_company_name)){ echo $row->emp_perv_company_name; } else{ echo $row->emp_current_company_name; } ?></p>
                    </div>
                </div>
            <?php } } ?>
          </div>
<div class="software-skill group">
    <p class="text-32">Software Skills</p>
    <div class="rectangle-2-copy-2"></div>
    <div class="row match-height group">
        <?php 
        if (!empty($candidate_skils)) {
            $skills = $candidate_skils;
            $total_skills = count($skills);
            $records_per_column = 3; // Number of records per column
            $sr_no = 33; 
            $copy = 7; 
            foreach ($skills as $index => $row) 
            {
                $fromDate = new DateTime($row->from_date);
                $toDate = new DateTime($row->to_date);
                $interval = $fromDate->diff($toDate);
                $years = $interval->y;
                $months = $interval->m;
                $col_class = ($index % 4 == 0) ? 'col-4' : (($index % 4 == 3) ? 'col-5' : 'col-4');
               
                // Start a new column div if it's the first in a row
                if ($index % $records_per_column == 0) {
                    echo '<div class="' . $col_class . '">';
                }
                  ?>        
                <p class="text-33"><?php  print_r($row->skills); ?></p> <?php echo  $years." Years and  $months Months"; ?>
                <div class="rectangle-1-copy-<?php echo $copy; ?>-holder">
                    <?php if ($index % $records_per_column == 0 || $index % $records_per_column == $records_per_column - 1) { ?>    
                        <div class="rectangle-1-copy-<?php echo $copy - 1; ?>"></div>
                    <?php } else { ?>
                        <div class="rectangle-1-copy-<?php echo $copy; ?>"></div>
                    <?php } ?>
                </div>
        <?php
                // Close the column div if it's the last in a column or the last item
                if (($index % $records_per_column == $records_per_column - 1) || $index == $total_skills - 1) {
                    echo '</div>';
                }

                $copy++;
            } 
        } 
        ?>
    </div>
</div>



</div>


        </div>
      </div>
    </div>
  </body>
</html>