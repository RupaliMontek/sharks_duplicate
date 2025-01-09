<!doctype html>
<html>
  <head>
    <title>Template 2</title>
    <meta charset="UTF-8">
    <meta name="description" content="Your site's description should be here">
    <meta name="keywords" content="Your site's keywords should be here">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" href="<?php echo base_url("frontend/css/resume_builder/template2/style.css");?>"> 
    <!--[if IE 6]>
	<style type="text/css">
		* html .group {
			height: 1%;
		}
	</style>
  <![endif]--> 
    <!--[if IE 7]>
	<style type="text/css">
		*:first-child+html .group {
			min-height: 1px;
		}
	</style>
  <![endif]--> 
    <!--[if lt IE 9]> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script> 
  <![endif]--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;subset=cyrillic,cyrillic-ext,latin,latin-ext,vietnamese">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 bg-light align-left">
                    <a href="<?php echo base_url("template2_convert_pdf"); ?>" class="btn btn-primary">convert pdf</a>
            </div>
        </div>
    </div>
    <div class="background group frouterrr">
      <div class="col-3">
        <div class="rectangle-1-copy-holder">
          <img class="double-click-here" src="<?php echo base_url("frontend/images/resume_builder/template2/double_click_here.png");?> " alt="">
        </div>
        <div class="col">
          <div class="contact_">
            <p class="contact_-2">Contact_</p>
            <div class="row-6 group">
              <div class="col-9">
                <div class="rectangle-3-holder">
                  <img class="shape-1" src="<?php echo base_url("frontend/images/resume_builder/template2/shape_1.png");?>" alt="">
                </div>
                <div class="col-2">
                  <img class="shape-3" src="<?php echo base_url("frontend/images/resume_builder/template2/shape_3.png");?>" alt="">
                  <img class="shape-4" src="<?php echo base_url("frontend/images/resume_builder/template2/shape_4.png");?>" alt="">
                </div>
              </div>
              <div class="col-10">
                <p class="text"><?php if(!empty(@$personal_details[0]
                                ->permanent_add && $personal_details[0]->hometown && $personal_details[0]->pincode  )){ echo @$personal_details[0]
                                ->permanent_add .
                                "/" .
                                @$personal_details[0]->hometown .
                                "/" .
                                @$personal_details[0]->pincode; } ?>
                </p>
                <p class="text-2"><?= @$user_details[0]->contact; ?></p>
                <p class="text-3"><?= @$user_details[0]->email; ?></p>
              </div>
            </div>
          </div>
          <div class="education_ group">
            <p class="education_-2">Education_</p>
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
               <p class="text-5"><span class="text-style"><?= $education_name; ?></span><br><?= $univercity; ?><br><?= $passout_year; ?></p>
            <?php } } ?>
          </div>
       
        </div>
      </div>
      <div class="col-19">
        <div class="name-title">
          <p class="text-9"><span class="fw500">Anne</span><br>Robertson</p>
          <p class="text-10">
          <?php if(!empty($employement_details))
            {   foreach($employement_details as $row)
                {  ?>
                      <?php echo $row->emp_current_desigantion; ?>
               
            <?php } } ?>
          </p> 
        </div>
        <img class="rectangle-4" src="<?php echo base_url("frontend/images/resume_builder/template2/rectangle_4.png");?>" alt="">
        
        <p class="text-11">Job Experience_</p>
        <div class="wrapper-7 group">
          <p class="text-13"><span class="fw500">2019 - Present</span><br>Enter Your JOb Possition Here<br><span class="fw500">Company Name</span></p>
          <img class="rectangle-3-copy-2" src="<?php echo base_url("frontend/images/resume_builder/template2/rectangle_3_copy_2.png");?>" alt="">
          <p class="text-12">Lorem ipsum dolor sithis amet, consectetur adipisicing elit sed eiusmod tempor indunt &nbsp;labore dolore magna aliqua Utenim ad minim veamquis nostrud exercit ullamco aliquip commodo consequat.</p>
        </div>
        
        <div class="wrapper-2 group">
          <p class="text-15"><span class="fw500">2016 - 2019</span><br>Enter Your JOb Possition Here<br><span class="fw500">Company Name</span></p>
          <img class="rectangle-3-copy-3" src="<?php echo base_url("frontend/images/resume_builder/template2/rectangle_3_copy_3.png");?>" alt="">
          <p class="text-14">Lorem ipsum dolor sithis amet, consectetur adipisicing elit sed eiusmod tempor indunt &nbsp;laboredolore magna aliqua Utenim ad minim veamquis nostrud exercit ullamco aliquip commodo consequat.</p>
        </div>
        
        <div class="skills_ group">
            
          <div class="col-5">
            <p class="skills_-2">Skills</p>
            <p class="photoshop">Photoshop</p>
            <p class="illustrator">Illustrator</p>
            <p class="indesign">Indesign</p>
            <p class="indesign-2">Indesign</p>
          </div>
          
          <div class="col-6 group">
            <p class="text-16">After Iffect</p>
            <p class="text-17">Adobe XD</p>
            <p class="powerpoint">Powerpoint</p>
          </div>
          
        </div>
        <p class="interests_">Interests</p>
        <div class="row group">
          <img class="rectangle-2-copy-15" src="<?php echo base_url("frontend/images/resume_builder/template2/rectangle_2_copy_15.png"); ?>" alt="">
          <p class="travelling">Travelling</p>
          <img class="rectangle-2-copy-16" src="<?php echo base_url("frontend/images/resume_builder/template2/rectangle_2_copy_16.png"); ?>" alt="">
          <p class="singing">Singing</p>
          <img class="rectangle-2-copy-17" src="<?php echo base_url("frontend/images/resume_builder/template2/rectangle_2_copy_17.png"); ?>" alt="">
          <p class="sketching">Sketching</p>
          <img class="rectangle-2-copy-18" src="<?php echo base_url("frontend/images/resume_builder/template2/rectangle_2_copy_18.png"); ?>" alt="">
          <p class="swimming">Swimming</p>
        </div>
      </div>
    </div>
  </body>
</html>