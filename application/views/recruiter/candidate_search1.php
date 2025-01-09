<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
    
        <title>Montek | Candidate profile</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/bootstrap/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
        <link href="<?php echo base_url();?>backend/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>frontend/css/comman_style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/dist/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url();?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link href="<?php echo base_url()?>frontend/select2/select2.min.css" rel="stylesheet"  />
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?php echo base_url();?>backend/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
       <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
        <script src="<?php echo base_url();?>backend/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url();?>backend/webcamjs/webcam.min.js"></script>
        <link href="<?php echo base_url();?>backend/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href='<?php echo base_url();?>assets/css/fullcalendar.css' rel='stylesheet' />
        <link href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css" rel="stylesheet" />        
        <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>frontend/css/font-awesome.css">
        
        <script src="<?php echo base_url()?>frontend/select2/select2.min.js"></script>
        
    
        <!--<link href="<?php echo base_url();?>frontend/select2/select2-bootstrap.css" rel="stylesheet" />-->
        <style type="text/css">
            .colplatlet-p input{
              height: 40px;
              width: 112px;
            }
            .ppformcssp-p .form-horizontal label.control-label{
              text-align: left;
              margin-bottom: 10px;
            }
            .error{
              color: red;
            }
            table.ppheighttab-p{
              height:160px;
              overflow-y: scroll;
            }
            
            .dropdown-menu {
              max-height: 500px;
              overflow-y: auto;
              overflow-x: hidden;
            }
            .mar_top_0 .btn-success{
              margin-top: 0;
            }
            .padd_top{
              padding-top: 36px;
            }
            .content-wrapper{
                    margin-left: 100px;
                    margin-right: 100px;
            }
            body{
                background-color: #ecf0f5;
            }
        </style>
        <script type="text/javascript">
        
          function deleteConfirm(id)
          {
            $("#deleteID").val(id);
            $("#confirmDelete-popup").modal();
          }
        
          function closeError2()
          { 
            $("#errorMessage2").hide(); 
          }
        
          function closeSuccess2()
          { 
            $("#successMessage2").hide(); 
          } 
        
        
            function update_sourced_by(dailyreport_id,sourced_by)
            {
              $("#dailyreport_id_sourced_by").val(dailyreport_id);
              $("#sourced_by").val(sourced_by);
              $("#update_sourced_by_popup").modal();
            } 
        
        </script>

        <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

             <div class="box">
             <div class="box box-solid box-primary">
            <div class="box-header with-border">
            <h3 class="box-title">Candidate Profile</h3>
            </div>
                <div class="box-body">
                <?php if(@$candidate)
                {
                    ?><form method="post" class="advance_form" id="candidate_form" action="<?=base_url('candidate_profile/update_candidate')?>" enctype="multipart/form-data"><?php
                }
                else
                {
                    ?><form method="post" class="advance_form" id="candidate_form" action="<?=base_url('candidate_profile/save_candidate')?>" enctype="multipart/form-data"><?php  
                }
                ?>
                 <div class="form-row">
                <div class="row">
                <label class="form-group col-md-3">Name</label>
                <div class="form-group col-md-5">
                    <input type="hidden" name="candidate_id" value="<?=@$candidate->candidate_id?>">
                    <input type="text" class="form-control" autocomplete="off" placeholder="Enter your full name" name="candidate_name" id="candidate_name" value="<?=@$candidate->candidate_name?>">
                </div>
                </div>
                <div class="row">
                <label class="form-group col-md-3">Email ID</label>
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" autocomplete="off" placeholder="Enter your active email id to receive relevant jobs" name="candidate_email" id="candidate_email" value="<?=@$candidate->candidate_email?>">
                   
                </div>
                </div>
                <div class="row">
                    <label class="form-group col-md-3">Create Password</label>
                    <div class="form-group col-md-5">
                        <input type="password" class="form-control" autocomplete="off" placeholder="Minimum 6 characters" name="candidate_password" id="candidate_password" value="<?=@$candidate->candidate_password?>">
                    </div>
                </div>
                <div class="row">
                    <label class="form-group col-md-3">Re-Password</label>
                    <div class="form-group col-md-5">
                        <input type="password" class="form-control" autocomplete="off" placeholder="Minimum 6 characters" name="re_candidate_password" id="re_candidate_password" value="<?=@$candidate->candidate_password?>">
                    </div>
                </div>
                <div class="row">
                <label class="form-group col-md-3">Mobile number</label>
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" autocomplete="off" placeholder="Where recruiter can contact you" name="candidate_mobile" id="candidate_mobile" value="<?=@$candidate->candidate_mobile?>">
                   
                </div>
                </div>
                <div class="row">
                    <label class="form-group col-md-3">Current City</label>
                    <div class="form-group col-md-5">
                        <!--<select id="current_location" name="current_location" class="form-control js-example-tokenizer">-->
                        <!--    <option value="Sangli">Sangli</option>-->
                        <!--    <option value="Pune">Pune</option>-->
                        <!--    <option value="Test">Test</option>-->
                            <!--<?php foreach($list_city as $city){ ?>
                        <!--    <option value="<?php echo $city->name; ?>"><?php echo $city->name; ?></option>-->
                        <!--    <?php } ?>-->
                        <!--</select>-->
                        <input type="text" class="form-control" autocomplete="off" placeholder="Tell us about your current city" name="candidate_current_city" id="candidate_current_city" value="<?=@$candidate->candidate_current_city?>">
                    </div>
                </div>
                
                <div class="row">
                    <label class="form-group col-md-3"></label>
                    <div class="form-group col-md-3">
                        <input type="hidden" id="candidate_out_side_india" name="candidate_out_side_india" value="0">
                        <input type="checkbox" id="candidate_out_side_india" name="candidate_out_side_india" value="1" <?php if(@$candidate->candidate_out_side_india==1){echo "checked";}?>>
                        <label for="vehicle1"> Outside India</label>
                    </div>
                </div>
                
              
                          <div class="row">
                            <label class="form-group col-md-3">Upload Resume</label>
                            <div class="form-group col-md-5">
                                <input type="file" class="" autocomplete="off" placeholder="Tell us about your current city" name="candidate_resume" id="candidate_resume">
                            </div>
                      </div>
                      
                      
                      
                       <div class="row">
                            <label class="form-group col-md-3">Key Skills</label>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" autocomplete="off" placeholder="angular js,php,mysql,html,css" name="candidate_key_skill" id="candidate_key_skill" value="<?=@$candidate->candidate_key_skill?>">
                            </div>
                      </div>
                      
                      
                        <div class="row">
                            <label class="form-group col-md-3">Employment</label>
                            <label class="form-group col-md-2">Your Designation</label>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Type Your Designation" name="candidate_designation" id="candidate_designation" value="<?=@$candidate->candidate_designation?>">
                            </div>
                        </div>
                            
                         
                            
                             <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Your Organization</label>
                             <div class="form-group col-md-5">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Type Your Organization" name="candidate_orgnization" id="candidate_orgnization" value="<?=@$candidate->candidate_organization?>">
                            </div>
                            </div>
                            
                            
                             
                             
                             <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-3">Is this your current company?</label>
                             <div class="form-group col-md-3">
                                 <label class="radio-inline">
                                      <input type="radio" name="candidate_is_current_company" value="1" <?php if(@$candidate->candidate_is_current_company==1){echo "checked";}?>>Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="candidate_is_current_company" value="0" <?php if(@$candidate->candidate_is_current_company==0){echo "checked";}?>>No
                                </label>
                            </div>
                            </div>
                             
                            <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Started Working From</label>
                                <div class="form-group col-md-2">
                                      <select class="form-control" name="candidate_working_from_yr">       
                                         <option value="">Select Year</option>
                                         <?php for($startYear=1997; $startYear<=3000; $startYear++){ ?>
                                         <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                         <?php } ?>
                                        <!--<option <?php if(@$candidate->candidate_started_working_from_yr=="2020"){echo "selected";}?> value="2020"> 2020 </option>
                                        <option <?php if(@$candidate->candidate_started_working_from_yr=="2020"){echo "selected";}?> value="2020"> 2020 </option>-->
                                     </select>
                                  </div>
                                 <div class="form-group col-md-2" name="candidate_working_from_month">
                                      <select class="form-control" name="candidate_working_from_month">       
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="January"){echo "selected";}?> value="January">January</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="February"){echo "selected";}?> value="February">February</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="March"){echo "selected";}?> value="March">March</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="April"){echo "selected";}?> value="April">April</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="May"){echo "selected";}?> value="May">May</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="June"){echo "selected";}?> value="June">June</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="July"){echo "selected";}?> value="July">July</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="August"){echo "selected";}?> value="August">August</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="September"){echo "selected";}?> value="September">September</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="Octomber"){echo "selected";}?> value="Octomber">Octomber</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="November"){echo "selected";}?> value="Octomber">November</option>
                                        <option <?php if(@$candidate->candidate_started_working_from_month=="December"){echo "selected";}?> value="December">December</option>
                                     </select>
                                </div>
                            </div>
                            
               
                            <div class="row">
                                <label class="form-group col-md-3"></label>
                                  <label class="form-group col-md-2">Worked Till</label>
                               <div class="form-group col-md-5">
                                  <input type="text" class="form-control" autocomplete="off" placeholder="Present" name="candidate_worked_till" id="candidate_worked_till" value="<?=@$candidate->candidate_worked_till?>">
                               </div>
                           </div>
                    
                            <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Current Salary</label>
                             <div class="form-group col-md-3">
                                 <label class="radio-inline">
                                      <input type="radio" name="candidate_salary_currency" <?php if(@$candidate->candidate_current_salry_in=="INR"){echo "checked";}?>  value="INR">Indian Rupees
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="candidate_salary_currency" <?php if(@$candidate->candidate_current_salry_in=="USD"){echo "checked";}?>  value="USD">US Dollars
                                </label>
                            </div>
                            </div>
                           
                            
                            <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2"></label>
                                <div class="form-group col-md-2">
                                      <select class="form-control" name="candidate_salary_in_lac">
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="0 Lacs"){echo "selected";}?> value="0 Lacs">0 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="1 Lacs"){echo "selected";}?> value="1 Lacs">1 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="2 Lacs"){echo "selected";}?> value="2 Lacs">2 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="3 Lacs"){echo "selected";}?> value="3 Lacs">3 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="4 Lacs"){echo "selected";}?> value="4 Lacs">4 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="5 Lacs"){echo "selected";}?> value="5 Lacs">5 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="6 Lacs"){echo "selected";}?> value="6 Lacs">6 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="7 Lacs"){echo "selected";}?> value="7 Lacs">7 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="8 Lacs"){echo "selected";}?> value="8 Lacs">8 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="9 Lacs"){echo "selected";}?> value="9 Lacs">9 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="10 Lacs"){echo "selected";}?> value="10 Lacs">10 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="11 Lacs"){echo "selected";}?> value="11 Lacs">11 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="12 Lacs"){echo "selected";}?> value="12 Lacs">12 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="13 Lacs"){echo "selected";}?> value="13 Lacs">13 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="14 Lacs"){echo "selected";}?> value="14 Lacs">14 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="15 Lacs"){echo "selected";}?> value="15 Lacs">15 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="16 Lacs"){echo "selected";}?> value="16 Lacs">16 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="17 Lacs"){echo "selected";}?> value="17 Lacs">17 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="18 Lacs"){echo "selected";}?> value="18 Lacs">18 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="19 Lacs"){echo "selected";}?> value="19 Lacs">19 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="20 Lacs"){echo "selected";}?> value="20 Lacs">20 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="21 Lacs"){echo "selected";}?> value="21 Lacs">21 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="22 Lacs"){echo "selected";}?> value="22 Lacs">22 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="23 Lacs"){echo "selected";}?> value="23 Lacs">23 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="24 Lacs"){echo "selected";}?> value="24 Lacs">24 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="25 Lacs"){echo "selected";}?> value="25 Lacs">25 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="26 Lacs"){echo "selected";}?> value="26 Lacs">26 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="27 Lacs"){echo "selected";}?> value="27 Lacs">27 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="28 Lacs"){echo "selected";}?> value="28 Lacs">28 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="29 Lacs"){echo "selected";}?> value="29 Lacs">29 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="30 Lacs"){echo "selected";}?> value="30 Lacs">30 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="31 Lacs"){echo "selected";}?> value="31 Lacs">31 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="32 Lacs"){echo "selected";}?> value="32 Lacs">32 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="33 Lacs"){echo "selected";}?> value="33 Lacs">33 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="34 Lacs"){echo "selected";}?> value="34 Lacs">34 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="35 Lacs"){echo "selected";}?> value="35 Lacs">35 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="36 Lacs"){echo "selected";}?> value="36 Lacs">36 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="37 Lacs"){echo "selected";}?> value="37 Lacs">37 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="38 Lacs"){echo "selected";}?> value="38 Lacs">38 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="39 Lacs"){echo "selected";}?> value="39 Lacs">39 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="40 Lacs"){echo "selected";}?> value="40 Lacs">40 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="41 Lacs"){echo "selected";}?> value="41 Lacs">41 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="42 Lacs"){echo "selected";}?> value="42 Lacs">42 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="43 Lacs"){echo "selected";}?> value="43 Lacs">43 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="44 Lacs"){echo "selected";}?> value="44 Lacs">44 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="45 Lacs"){echo "selected";}?> value="45 Lacs">45 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="46 Lacs"){echo "selected";}?> value="46 Lacs">46 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="47 Lacs"){echo "selected";}?> value="47 Lacs">47 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="48 Lacs"){echo "selected";}?> value="48 Lacs">48 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="49 Lacs"){echo "selected";}?> value="49 Lacs">49 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="50 Lacs"){echo "selected";}?> value="50 Lacs">50 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="55 Lacs"){echo "selected";}?> value="55 Lacs">55 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="60 Lacs"){echo "selected";}?> value="60 Lacs">60 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="65 Lacs"){echo "selected";}?> value="65 Lacs">65 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="70 Lacs"){echo "selected";}?> value="70 Lacs">70 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="75 Lacs"){echo "selected";}?> value="75 Lacs">75 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="80 Lacs"){echo "selected";}?> value="80 Lacs">80 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="85 Lacs"){echo "selected";}?> value="85 Lacs">85 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="90 Lacs"){echo "selected";}?> value="90 Lacs">90 Lacs</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_lac=="95 Lacs"){echo "selected";}?> value="95 Lacs">95 Lacs</option>
                                     </select>
                                  </div>
                                 <div class="form-group col-md-2">
                                      <select class="form-control" name="candidate_salary_in_thousand" id="candidate_salary_in_thousand">       
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="0 Lacs"){echo "selected";}?> value="0 Thousand">0 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="5 Lacs"){echo "selected";}?> value="5 Thousand">5 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="10 Lacs"){echo "selected";}?> value="10 Thousand">10 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="15 Lacs"){echo "selected";}?> value="15 Thousand">15 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="20 Lacs"){echo "selected";}?> value="20 Thousand">20 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="25 Lacs"){echo "selected";}?> value="25 Thousand">25 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="30 Lacs"){echo "selected";}?> value="30 Thousand">30 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="35 Lacs"){echo "selected";}?> value="35 Thousand">35 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="40 Lacs"){echo "selected";}?> value="40 Thousand">40 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="45 Lacs"){echo "selected";}?> value="45 Thousand">45 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="50 Lacs"){echo "selected";}?> value="50 Thousand">50 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="55 Lacs"){echo "selected";}?> value="55 Thousand">55 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="60 Lacs"){echo "selected";}?> value="60 Thousand">60 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="65 Lacs"){echo "selected";}?> value="65 Thousand">65 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="70 Lacs"){echo "selected";}?> value="70 Thousand">70 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="75 Lacs"){echo "selected";}?> value="75 Thousand">75 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="80 Lacs"){echo "selected";}?> value="80 Thousand">80 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="85 Lacs"){echo "selected";}?> value="85 Thousand">85 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="90 Lacs"){echo "selected";}?> value="90 Thousand">90 Thousand</option>
                                        <option <?php if(@$candidate->candidate_currrent_salary_thousand=="95 Lacs"){echo "selected";}?> value="95 Thousand">95 Thousand</option>
                                     </select>
                                </div>
                            </div>
                            
                             
                             <div class="row">
                                <label class="form-group col-md-3"></label>
                            <div class="form-group col-md-6">
								<label>Top 5 key skills that you think are important for current employment</label>
								<textarea name="candidate_skills" class="form-control" placeholder="Enter your area of Expertise/Specialization" id="candidate_skills" cols="10" rows="2"><?=@$candidate->candidate_top_five_skills?></textarea>
							</div>
							</div>
							
							<div class="row">
                                <label class="form-group col-md-3"></label>
                            <div class="form-group col-md-6">
								<label>Describe your Job Profile</label>
								<textarea name="candidate_job_profile" class="form-control" placeholder="Type here" id="candidate_job_profile" cols="10" rows="2"><?=@$candidate->candidate_job_profile?></textarea>
							</div>
							</div>
							
							<div class="row">
                                <label class="form-group col-md-3"></label>
                            <div class="form-group col-md-6">
								<label>Notice Period</label>
								 <select class="form-control" name="candidate_notice_period" id="candidate_notice_period">       
                                        <option <?php if(@$candidate->candidate_notice_period=="15 Days Or Less"){echo "selected";}?> value="15 Days Or Less">15 Days Or Less</option>
                                        <option <?php if(@$candidate->candidate_notice_period=="1 Month"){echo "selected";}?> value="1 Month">1 Month</option>
                                        <option <?php if(@$candidate->candidate_notice_period=="2 Month"){echo "selected";}?> value="2 Month">2 Month</option>
                                        <option <?php if(@$candidate->candidate_notice_period=="3 Month"){echo "selected";}?> value="3 Month">3 Month</option>
                                        <option <?php if(@$candidate->candidate_notice_period=="More Than 3 Month"){echo "selected";}?> value="More Than 3 Month">More Than 3 Month</option>
                                        <option <?php if(@$candidate->candidate_notice_period=="Serving Notice Period"){echo "selected";}?> value="Serving Notice Period">Serving Notice Period</option>
                                </select>
							</div>
							</div>
							
							
								
							<div class="row">
                            <label class="form-group col-md-3">Add Education</label>
                            <label class="form-group col-md-2">Education</label>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Education" name="candidate_education" id="candidate_education" value="<?=@$candidate->candidate_education?>">
                                 <!--<select class="form-control" name="candidate_education">       
                                        <option value="">Select education</option>
                                        <option value=" Banglore"></option>
                                        <option value=" Dubai "></option>
                                </select>-->
                            </div>
                            </div>
                            
                           
                            <div class="row">
                                <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-2">Course</label>
                            <div class="form-group col-md-5">
                                 <input type="text" class="form-control" autocomplete="off" placeholder="Course" name="candidate_course" id="candidate_course" value="<?=@$candidate->candidate_course?>">
                                <!-- <select class="form-control">       
                                        <option value="">Select Course</option>
                                        <option value=" Banglore"></option>
                                        <option value=" Dubai "></option>
                                </select>-->
                            </div>
							</div>
							
							
							<div class="row">
                                <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-2">Specialization</label>
                            <div class="form-group col-md-5">
                                 <select class="form-control" name="candidate_specialization" id="candidate_specialization">       
                                        <option>Select Specialization</option>
                                        <option>Advertising/MassCommunication</option>
                                        <option>Agriculture</option>
                                        <option>Anthropology</option>
                                        <option>Architecture</option>
                                        <option>Arts&amp;Humanities</option>
                                        <option>Astrophysics</option>
                                        <option>Automobile</option>
                                        <option>Aviation</option>
                                        <option>Bio-Chemistry/Bio-Technology</option>
                                        <option>Biomedical</option>
                                        <option>Biophysics</option>
                                        <option>Biotechnology</option>
                                        <option>Botany</option>
                                        <option>Ceramics</option>
                                        <option>Chemical</option>
                                        <option>Chemistry</option>
                                        <option>Civil</option>
                                        <option>Commerce</option>
                                        <option>Communication</option>
                                        <option>Computers</option>
                                        <option>DairyTechnology</option>
                                        <option>Dermatology</option>
                                        <option>Economics</option>
                                        <option>Education</option>
                                        <option>Electrical</option>
                                        <option>Electronics/Telecommunication</option>
                                        <option>Energy</option>
                                        <option>ENT</option>
                                        <option>Environmental</option>
                                        <option>FashionDesigning/OtherDesigning</option>
                                        <option>Film</option>
                                        <option>Finance</option>
                                        <option>Finearts</option>
                                        <option>FoodTechnology</option>
                                        <option>Genetics</option>
                                        <option>History</option>
                                        <option>HomeScience</option>
                                        <option>HotelManagement</option>
                                        <option>HR/IndustrialRelations</option>
                                        <option>Immunology</option>
                                        <option>Instrumentation</option>
                                        <option>InternationalBusiness</option>
                                        <option>Journaoptionsm</option>
                                        <option>Law</option>
                                        <option>optionnguistics</option>
                                        <option>optionterature</option>
                                        <option>Marine</option>
                                        <option>Marketing</option>
                                        <option>Maths</option>
                                        <option>Mechanical</option>
                                        <option>Medicine</option>
                                        <option>Metallurgy</option>
                                        <option>Microbiology</option>
                                        <option>Mineral</option>
                                        <option>Mining</option>
                                        <option>Music</option>
                                        <option>Neonatal</option>
                                        <option>Nuclear</option>
                                        <option>Nursing</option>
                                        <option>Obstetrics</option>
                                        <option>OtherArts</option>
                                        <option>OtherDoctorate</option>
                                        <option>OtherEngineering</option>
                                        <option>OtherManagement</option>
                                        <option>OtherScience</option>
                                        <option>Paint/Oil</option>
                                        <option>Pathology</option>
                                        <option>Pediatrics</option>
                                        <option>Petroleum</option>
                                        <option>Pharmacy</option>
                                        <option>Philosophy</option>
                                        <option>PhysicalEducation</option>
                                        <option>Physics</option>
                                        <option>Plastics</option>
                                        <option>PooptionticalScience</option>
                                        <option>Production/Industrial</option>
                                        <option>Psychiatry</option>
                                        <option>Psychology</option>
                                        <option>Radiology</option>
                                        <option>Rheumatology</option>
                                        <option>Sanskrit</option>
                                        <option>Sociology</option>
                                        <option>SpecialEducation</option>
                                        <option>Statistics</option>
                                        <option>Systems</option>
                                        <option>Textile</option>
                                        <option>VocationalCourses</option>
                                        <option>Zoology</option>
                                        <option>Other</option>
                                        <option>Advertising/MassCommunication</option>
                                        <option>Agriculture</option>
                                        <option>Anthropology</option>
                                        <option>Architecture</option>
                                        <option>Arts&amp;Humanities</option>
                                        <option>Astrophysics</option>
                                        <option>Automobile</option>
                                        <option>Aviation</option>
                                        <option>Bio-Chemistry/Bio-Technology</option>
                                        <option>Biomedical</option>
                                        <option>Biophysics</option>
                                        <option>Biotechnology</option>
                                        <option>Botany</option>
                                        <option>Ceramics</option>
                                        <option>Chemical</option>
                                        <option>Chemistry</option>
                                        <option>Civil</option>
                                        <option>Commerce</option>
                                        <option>Communication</option>
                                        <option>Computers</option>
                                        <option>DairyTechnology</option>
                                        <option>Dermatology</option>
                                        <option>Economics</option>
                                        <option>Education</option>
                                        <option>Electrical</option>
                                        <option>Electronics/Telecommunication</option>
                                        <option>Energy</option>
                                        <option>ENT</option>
                                        <option>Environmental</option>
                                        <option>FashionDesigning/OtherDesigning</option>
                                        <option>Film</option>
                                        <option>Finance</option>
                                        <option>Finearts</option>
                                        <option>FoodTechnology</option>
                                        <option>Genetics</option>
                                        <option>History</option>
                                        <option>HomeScience</option>
                                        <option>HotelManagement</option>
                                        <option>HR/IndustrialRelations</option>
                                        <option>Immunology</option>
                                        <option>Instrumentation</option>
                                        <option>InternationalBusiness</option>
                                        <option>Journaoptionsm</option>
                                        <option>Law</option>
                                        <option>optionnguistics</option>
                                        <option>optionterature</option>
                                        <option>Marine</option>
                                        <option>Marketing</option>
                                        <option>Maths</option>
                                        <option>Mechanical</option>
                                        <option>Medicine</option>
                                        <option>Metallurgy</option>
                                        <option>Microbiology</option>
                                        <option>Mineral</option>
                                        <option>Mining</option>
                                        <option>Music</option>
                                        <option>Neonatal</option>
                                        <option>Nuclear</option>
                                        <option>Nursing</option>
                                        <option>Obstetrics</option>
                                        <option>OtherArts</option>
                                        <option>OtherDoctorate</option>
                                        <option>OtherEngineering</option>
                                        <option>OtherManagement</option>
                                        <option>OtherScience</option>
                                        <option>Paint/Oil</option>
                                        <option>Pathology</option>
                                        <option>Pediatrics</option>
                                        <option>Petroleum</option>
                                        <option>Pharmacy</option>
                                        <option>Philosophy</option>
                                        <option>PhysicalEducation</option>
                                        <option>Physics</option>
                                        <option>Plastics</option>
                                        <option>PooptionticalScience</option>
                                        <option>Production/Industrial</option>
                                        <option>Psychiatry</option>
                                        <option>Psychology</option>
                                        <option>Radiology</option>
                                        <option>Rheumatology</option>
                                        <option>Sanskrit</option>
                                        <option>Sociology</option>
                                        <option>SpecialEducation</option>
                                        <option>Statistics</option>
                                        <option>Systems</option>
                                        <option>Textile</option>
                                        <option>VocationalCourses</option>
                                        <option>Zoology</option>
                                        <option>Other</option>

                                </select>
                            </div>
							</div>
							
							
							
							<div class="row">
                                <label class="form-group col-md-3"></label>
                            <div class="form-group col-md-6">
								<label>University/Institute</label>
								<input name="candidate_university" value="<?=@$candidate->candidate_university_institute?>" class="form-control" placeholder="Select university/institute" id="candidate_university" cols="10" rows="2">
							</div>
							</div>
							
							
							  <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Course Type</label>
                                 <label class="radio-inline">
                                      <input type="radio" name="candidate_course_type" value="Full Time" <?php if(@$candidate->candidate_course_type=="Full Time"){echo "checked";}?>>Full Time
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="candidate_course_type" value="Part Time" <?php if(@$candidate->candidate_course_type=="Part Time"){echo "checked";}?>>Part Time
                                </label>
                                 <label class="radio-inline">
                                      <input type="radio" name="candidate_course_type" value="Correspondence/Distance learning" <?php if(@$candidate->candidate_course_type=="Correspondence/Distance learning"){echo "checked";}?>>Correspondence/Distance learning
                                </label>
                         </div>
                         
                        
                         <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Passing Year</label>
                                <div class="form-group col-md-5">
                                 <select class="form-control" name="candidate_paassing_year" id="candidate_paassing_year">       
                                        <option value="2024"> 2024</option>
                                        <option value="2023"> 2023</option>
                                        <option value="2022"> 2022</option>
                                        <option value="2021"> 2021</option>
                                        <option value="2020"> 2020</option>
                                        <option value="2019"> 2019</option>
                                        <option value="2018"> 2018</option>
                                        <option value="2017"> 2017</option>
                                        <option value="2016"> 2016</option>
                                        <option value="2015"> 2015</option>
                                        <option value="2014"> 2014</option>
                                        <option value="2013"> 2013</option>
                                        <option value="2012"> 2012</option>
                                        <option value="2011"> 2011</option>
                                        <option value="2010"> 2010</option>
                                        <option value="2009"> 2009</option>
                                        <option value="2008"> 2008</option>
                                        <option value="2007"> 2007</option>
                                        <option value="2006"> 2006</option>
                                        <option value="2005"> 2005</option>
                                        <option value="2004"> 2004</option>
                                        <option value="2003"> 2003</option>
                                        <option value="2002"> 2002</option>
                                        <option value="2001"> 2001</option>
                                        <option value="2000"> 2000</option>
                                        <option value="1999"> 1999</option>
                                        <option value="1998"> 1998</option>
                                        <option value="1997"> 1997</option>
                                        <option value="1996"> 1996</option>
                                        <option value="1995"> 1995</option>
                                        <option value="1994"> 1994</option>
                                        <option value="1993"> 1993</option>
                                        <option value="1992"> 1992</option>
                                        <option value="1991"> 1991</option>
                                        <option value="1990"> 1990</option>
                                        <option value="1989"> 1989</option>
                                        <option value="1988"> 1988</option>
                                        <option value="1987"> 1987</option>
                                        <option value="1986"> 1986</option>
                                        <option value="1985"> 1985</option>
                                        <option value="1984"> 1984</option>
                                        <option value="1983"> 1983</option>
                                        <option value="1982"> 1982</option>
                                        <option value="1981"> 1981</option>
                                        <option value="1980"> 1980</option>
                                        <option value="1979"> 1979</option>
                                        <option value="1978"> 1978</option>
                                        <option value="1977"> 1977</option>
                                        <option value="1976"> 1976</option>
                                        <option value="1975"> 1975</option>
                                        <option value="1974"> 1974</option>
                                        <option value="1973"> 1973</option>
                                        <option value="1972"> 1972</option>
                                        <option value="1971"> 1971</option>
                                        <option value="1970"> 1970</option>
                                        <option value="1969"> 1969</option>
                                        <option value="1968"> 1968</option>
                                        <option value="1967"> 1967</option>
                                        <option value="1966"> 1966</option>
                                        <option value="1965"> 1965</option>
                                        <option value="1964"> 1964</option>
                                        <option value="1963"> 1963</option>
                                        <option value="1962"> 1962</option>
                                        <option value="1961"> 1961</option>
                                        <option value="1960"> 1960</option>
                                        <option value="1959"> 1959</option>
                                        <option value="1958"> 1958</option>
                                        <option value="1957"> 1957</option>
                                        <option value="1956"> 1956</option>
                                        <option value="1955"> 1955</option>
                                        <option value="1954"> 1954</option>
                                        <option value="1953"> 1953</option>
                                        <option value="1952"> 1952</option>
                                        <option value="1951"> 1951</option>
                                        <option value="1950"> 1950</option>
                                        <option value="1949"> 1949</option>
                                        <option value="1948"> 1948</option>
                                        <option value="1947"> 1947</option>
                                        <option value="1946"> 1946</option>
                                        <option value="1945"> 1945</option>
                                        <option value="1944"> 1944</option>
                                        <option value="1943"> 1943</option>
                                        <option value="1942"> 1942</option>
                                        <option value="1941"> 1941</option>
                                        <option value="1940"> 1940</option>
                                </select>
                                  </div>
                            </div>
                            
                            
                            
							<div class="row">
                              <label class="form-group col-md-3">Career Profile</label>
                              <label class="form-group col-md-2">Industry</label>
                               <div class="form-group col-md-5">
                                  <select class="form-control" name="candidate_industry" id="candidate_industry">       
                                        <option value="">Select Industry</option>
                                        <option value="Accounting/Finance">Accounting/Finance</option>
                                        <option value="Advertising/PR/MR/Events">Advertising/PR/MR/Events</option>
                                        <option value="Agriculture/Dairy">Agriculture/Dairy</option>
                                        <option value="Animation">Animation</option>
                                        <option value="Architecture/Interior Designing">Architecture/Interior Designing</option>
                                        <option value="Ancillary">Ancillary</option>
                                        <option value="Aerospace Firms">Aerospace Firms</option>
                                        <option value="Banking/Financial Services/Broking">Banking/Financial Services/Broking</option>
                                        <option value="BPO/ITES">BPO/ITES</option>
                                        <option value="Brewery / Distillery">Brewery / Distillery</option>
                                        <option value="Broadcasting">Broadcasting</option>
                                        <option value="Ceramics /Sanitary ware">Ceramics /Sanitary ware</option>
                                        <option value="Chemicals/PetroChemical/Plastic/Rubber">Chemicals/PetroChemical/Plastic/Rubber</option>
                                        <option value="Construction/Engineering/Cement/Metals">Construction/Engineering/Cement/Metals</option>
                                        <option value="Consumer Durables">Consumer Durables</option>
                                        <option value="Courier/Transportation/Freight">Courier/Transportation/Freight</option>
                                        <option value="Education/Teaching/Training">Education/Teaching/Training</option>
                                        <option value="Electricals / Switchgears">Electricals / Switchgears</option>
                                        <option value="Export/Import">Export/Import</option>
                                        <option value="Facility Management">Facility Management</option>
                                        <option value="Facility Management">Fertilizers/Pesticides</option>
                                        <option value="FMCG/Foods/Beverage">FMCG/Foods/Beverage</option>
                                        <option value="Food Processing">Food Processing</option>
                                        <option value="Fresher/Trainee">Fresher/Trainee</option>
                                        <option value="Gems & Jewellery">Gems &amp; Jewellery</option>
                                        <option value="Glass">Glass</option>
                                        <option value="Defence/Government">Defence/Government</option>
                                        <option value="Heat Ventilation Air Conditioning">Heat Ventilation Air Conditioning</option>
                                        <option value="Hotels/Restaurants/Airlines/Travel">Hotels/Restaurants/Airlines/Travel</option>
                                        <option value="Industrial Products/Heavy Machinery">Industrial Products/Heavy Machinery</option>
                                        <option value="Insurance">Insurance</option>
                                        <option value="Internet/Ecommerce">Internet/Ecommerce</option>
                                        <option value="Steel">Steel</option>
                                        <option value="Software/Software Services">Software/Software Services</option>
                                        <option value="KPO / Research /Analytics">KPO / Research /Analytics</option>
                                        <option value="Leather">Leather</option>
                                        <option value="Media/Dotcom/Entertainment">Media/Dotcom/Entertainment</option>
                                        <option value="Medical Devices / Equipments">Medical Devices / Equipments</option>
                                        <option value="Medical/Healthcare/Hospital">Medical/Healthcare/Hospital</option>
                                        <option value="Mining">Mining</option>
                                        <option value="NGO/Social Services">NGO/Social Services</option>
                                        <option value="Office Equipment/Automation">Office Equipment/Automation</option>
                                        <option value="Oil and Gas/Power/Infrastructure/Energy">Oil and Gas/Power/Infrastructure/Energy</option>
                                        <option value="Pharma/Biotech/Clinical Research">Pharma/Biotech/Clinical Research</option>
                                        <option value="Printing/Packaging">Printing/Packaging</option>
                                        <option value="Publishing">Publishing</option>
                                        <option value="Paper">Paper</option>
                                        <option value="Real Estate/Property">Real Estate/Property</option>
                                        <option value="Recruitment">Recruitment</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Security/Law Enforcement">Security/Law Enforcement</option>
                                        <option value="Semiconductors/Electronics">Semiconductors/Electronics</option>
                                        <option value="Shipping/Marine">Shipping/Marine</option>
                                        <option value="Strategy /Management Consulting Firms">Strategy /Management Consulting Firms</option>
                                        <option value="Sugar">Sugar</option>
                                        <option value="Telcom/ISP">Telcom/ISP</option>
                                        <option value="Textiles/Garments/Accessories">Textiles/Garments/Accessories</option>
                                        <option value="Tyres">Tyres</option>
                                        <option value="Water Treatment / Waste Management">Water Treatment / Waste Management</option>
                                        <option value="Wellness / Fitness / Sports / Beauty">Wellness / Fitness / Sports / Beauty</option>
                                        <option value="Other">Other</option>
                                 </select>
                              </div>
                        </div>
                        
                       
                        <div class="row">
                            <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-2">Functional Area / Department</label>
                            <div class="form-group col-md-5">
                                 <select class="form-control" name="candidate_functional_area" id="candidate_functional_area">       
                                        <option value="">Select Desired Functional Area / Department</option>
                                        <option value="Accounts / Finance / Tax / CS / Audit">Accounts / Finance / Tax / CS / Audit</option>
                                        <option value="Agent">Agent</option>
                                        <option value="Analytics &amp; Business Intelligence">Analytics &amp; Business Intelligence</option>
                                        <option value="Architecture / Interior Design">Architecture / Interior Design</option>
                                        <option value="Banking / Insurance">Banking / Insurance</option>
                                        <option value="Beauty / Fitness / Spa Services">Beauty / Fitness / Spa Services</option>
                                        <option value="Content / Journalism">Content / Journalism</option>
                                        <option value="Corporate Planning / Consulting">Corporate Planning / Consulting</option>
                                        <option value="IT- Hardware / Telecom / Technical Staff / Support">IT- Hardware / Telecom / Technical Staff / Support</option>
                                        <option value="IT Software - Application Programming / Maintenance">IT Software - Application Programming / Maintenance</option>
                                        <option value="IT Software - Client Server">IT Software - Client Server</option>
                                        <option value="IT Software - DBA / Datawarehousing">IT Software - DBA / Datawarehousing</option>
                                        <option value="IT Software - E-Commerce / Internet Technologies">IT Software - E-Commerce / Internet Technologies</option>
                                        <option value="IT Software - Embedded /EDA /VLSI /ASIC /Chip Des.">IT Software - Embedded /EDA /VLSI /ASIC /Chip Des.</option>
                                        <option value="IT Software - ERP / CRM">IT Software - ERP / CRM</option>
                                        <option value="IT Software - Middleware">IT Software - Middleware</option>
                                        <option value="IT Software - Mobile">IT Software - Mobile</option>
                                        <option value="IT Software - Network Administration / Security">IT Software - Network Administration / Security</option>
                                        <option value="IT Software - Other">IT Software - Other</option>
                                 </select>
                            </div>
						</div>
						
						
						<div class="row">
                            <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-2">Role</label>
                            <div class="form-group col-md-5">
                                 <select class="form-control" name="candidate_role" id="candidate_role">       
                                        <option value="">Select Desired Role</option>
                                        <option value=" Banglore"></option>
                                        <option value=" Dubai "></option>
                                 </select>
                            </div>
						</div>
						
						
						<div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Desired Job Type</label>
                                <div class="form-group col-md-3">
                                 <label class="checkbox-inline">
                                      <input type="radio" value="Permanent" name="candidate_job_type" <?php if(@$candidate->candidate_notice_period=="Serving Notice Period"){echo "selected";}?>>Permanent
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" value="Contractual" name="candidate_job_type" <?php if(@$candidate->candidate_notice_period=="Serving Notice Period"){echo "selected";}?>>Contractual
                                </label>
                                </div>
                        </div>
                        
                         
                        
                      	<div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Desired Employment Type</label>
                                <div class="form-group col-md-3">
                                 <label class="checkbox-inline">
                                      <input type="radio"  value="Full Time" name="candidate_employment_type" <?php if(@$candidate->candidate_notice_period=="Serving Notice Period"){echo "checked";}?>>Full Time
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio"  value="Part Time" name="candidate_employment_type" <?php if(@$candidate->candidate_notice_period=="Serving Notice Period"){echo "checked";}?>>Part Time
                                </label>
                                </div>
                      </div>
                      
                      
                     
                        <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Preferred Shift</label>
                             <div class="form-group col-md-3">
                                 <label class="radio-inline">
                                      <input type="radio" value="Day"name="candidate_prefered_shift" <?php if(@$candidate->candidate_preferred_shift=="Serving Notice Period"){echo "checked";}?>>Day
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" value="Night" name="candidate_prefered_shift" <?php if(@$candidate->candidate_preferred_shift=="Serving Notice Period"){echo "checked";}?>>Night
                                </label>
                                <label class="radio-inline">
                                      <input type="radio" value="Flexible" name="candidate_prefered_shift" <?php if(@$candidate->candidate_preferred_shift=="Serving Notice Period"){echo "checked";}?>>Flexible
                                </label>
                            </div>
                            </div>
                      
                         <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Expected Salary</label>
                             <div class="form-group col-md-3">
                                 <label class="radio-inline">
                                      <input type="radio" name="candidate_exp_salary_currency" checked="">Indian Rupees
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="candidate_exp_salary_currency">US Dollars
                                </label>
                            </div>
                            </div>
                            
                            
                          <!--  --------------------------------------------------------------------------------------->
                            <div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2"></label>
                                <div class="form-group col-md-2">
                                       <select class="form-control" name="candidate_salary_in_lac" id="candidate_salary_in_lac">
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="0 Lacs"){echo "selected";}?> value="0 Lacs">0 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="1 Lacs"){echo "selected";}?> value="1 Lacs">1 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="2 Lacs"){echo "selected";}?> value="2 Lacs">2 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="3 Lacs"){echo "selected";}?> value="3 Lacs">3 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="4 Lacs"){echo "selected";}?> value="4 Lacs">4 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="5 Lacs"){echo "selected";}?> value="5 Lacs">5 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="6 Lacs"){echo "selected";}?> value="6 Lacs">6 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="7 Lacs"){echo "selected";}?> value="7 Lacs">7 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="8 Lacs"){echo "selected";}?> value="8 Lacs">8 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="9 Lacs"){echo "selected";}?> value="9 Lacs">9 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="10 Lacs"){echo "selected";}?> value="10 Lacs">10 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="11 Lacs"){echo "selected";}?> value="11 Lacs">11 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="12 Lacs"){echo "selected";}?> value="12 Lacs">12 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="13 Lacs"){echo "selected";}?> value="13 Lacs">13 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="14 Lacs"){echo "selected";}?> value="14 Lacs">14 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="15 Lacs"){echo "selected";}?> value="15 Lacs">15 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="16 Lacs"){echo "selected";}?> value="16 Lacs">16 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="17 Lacs"){echo "selected";}?> value="17 Lacs">17 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="18 Lacs"){echo "selected";}?> value="18 Lacs">18 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="19 Lacs"){echo "selected";}?> value="19 Lacs">19 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="20 Lacs"){echo "selected";}?> value="20 Lacs">20 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="21 Lacs"){echo "selected";}?> value="21 Lacs">21 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="22 Lacs"){echo "selected";}?> value="22 Lacs">22 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="23 Lacs"){echo "selected";}?> value="23 Lacs">23 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="24 Lacs"){echo "selected";}?> value="24 Lacs">24 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="25 Lacs"){echo "selected";}?> value="25 Lacs">25 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="26 Lacs"){echo "selected";}?> value="26 Lacs">26 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="27 Lacs"){echo "selected";}?> value="27 Lacs">27 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="28 Lacs"){echo "selected";}?> value="28 Lacs">28 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="29 Lacs"){echo "selected";}?> value="29 Lacs">29 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="30 Lacs"){echo "selected";}?> value="30 Lacs">30 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="31 Lacs"){echo "selected";}?> value="31 Lacs">31 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="32 Lacs"){echo "selected";}?> value="32 Lacs">32 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="33 Lacs"){echo "selected";}?> value="33 Lacs">33 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="34 Lacs"){echo "selected";}?> value="34 Lacs">34 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="35 Lacs"){echo "selected";}?> value="35 Lacs">35 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="36 Lacs"){echo "selected";}?> value="36 Lacs">36 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="37 Lacs"){echo "selected";}?> value="37 Lacs">37 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="38 Lacs"){echo "selected";}?> value="38 Lacs">38 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="39 Lacs"){echo "selected";}?> value="39 Lacs">39 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="40 Lacs"){echo "selected";}?> value="40 Lacs">40 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="41 Lacs"){echo "selected";}?> value="41 Lacs">41 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="42 Lacs"){echo "selected";}?> value="42 Lacs">42 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="43 Lacs"){echo "selected";}?> value="43 Lacs">43 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="44 Lacs"){echo "selected";}?> value="44 Lacs">44 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="45 Lacs"){echo "selected";}?> value="45 Lacs">45 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="46 Lacs"){echo "selected";}?> value="46 Lacs">46 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="47 Lacs"){echo "selected";}?> value="47 Lacs">47 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="48 Lacs"){echo "selected";}?> value="48 Lacs">48 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="49 Lacs"){echo "selected";}?> value="49 Lacs">49 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="50 Lacs"){echo "selected";}?> value="50 Lacs">50 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="55 Lacs"){echo "selected";}?> value="55 Lacs">55 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="60 Lacs"){echo "selected";}?> value="60 Lacs">60 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="65 Lacs"){echo "selected";}?> value="65 Lacs">65 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="70 Lacs"){echo "selected";}?> value="70 Lacs">70 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="75 Lacs"){echo "selected";}?> value="75 Lacs">75 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="80 Lacs"){echo "selected";}?> value="80 Lacs">80 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="85 Lacs"){echo "selected";}?> value="85 Lacs">85 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="90 Lacs"){echo "selected";}?> value="90 Lacs">90 Lacs</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_lac=="95 Lacs"){echo "selected";}?> value="95 Lacs">95 Lacs</option>
                                     </select>
                                  </div>
                                 <div class="form-group col-md-2">
                                      <select class="form-control" name="candidate_salary_in_thousand" id="candidate_salary_in_thousand">       
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="0 Thousand"){echo "selected";}?> value="0 Thousand">0 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="5 Thousand"){echo "selected";}?> value="5 Thousand">5 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="10 Thousand"){echo "selected";}?> value="10 Thousand">10 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="15 Thousand"){echo "selected";}?> value="15 Thousand">15 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="20 Thousand"){echo "selected";}?> value="20 Thousand">20 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="25 Thousand"){echo "selected";}?> value="25 Thousand">25 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="30 Thousand"){echo "selected";}?> value="30 Thousand">30 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="35 Thousand"){echo "selected";}?> value="35 Thousand">35 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="40 Thousand"){echo "selected";}?> value="40 Thousand">40 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="45 Thousand"){echo "selected";}?> value="45 Thousand">45 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="50 Thousand"){echo "selected";}?> value="50 Thousand">50 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="55 Thousand"){echo "selected";}?> value="55 Thousand">55 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="60 Thousand"){echo "selected";}?> value="60 Thousand">60 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="65 Thousand"){echo "selected";}?> value="65 Thousand">65 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="70 Thousand"){echo "selected";}?> value="70 Thousand">70 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="75 Thousand"){echo "selected";}?> value="75 Thousand">75 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="80 Thousand"){echo "selected";}?> value="80 Thousand">80 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="85 Thousand"){echo "selected";}?> value="85 Thousand">85 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="90 Thousand"){echo "selected";}?> value="90 Thousand">90 Thousand</option>
                                        <option <?php if(@$candidate->candidate_expected_salary_thousand=="95 Thousand"){echo "selected";}?> value="95 Thousand">95 Thousand</option>
                                     </select>
                                </div>
                            </div>
                            
                            <!--  --------------------------------------------------------------------------------------->
                            <div class="row">
                            <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-2">Desired Location</label>
                            <div class="form-group col-md-5">
                                 <select multiple="multiple" class="form-control js-example-tokenizer" name="candidate_desired_location[]" id="candidate_desired_location">       
                                        <option value="">Select Desired Location</option>
                                        <?php foreach($list_city as $city){ ?>
                                        <option value="<?php echo $city->name; ?>"><?php echo $city->name; ?></option>-->
                                        <?php } ?>
                                 </select>You can choose upto 3 locations
                            </div>
						</div>
						<div class="row">
                              <label class="form-group col-md-3">Personal Details</label>
                              <label class="form-group col-md-2">Date of Birth</label>
                               <div class="form-group col-md-2" >
                                      <select class="form-control" name="candidate_dob_day" id="candidate_dob_day">       
                                         <option value="01">01</option>
                                         <option value="02">02</option>
                                         <option value="03">03</option>
                                         <option value="04">04</option>
                                         <option value="05">05</option>
                                         <option value="06">06</option>
                                         <option value="07">07</option>
                                         <option value="08">08</option>
                                         <option value="09">09</option>
                                         <?php for($birthDates=10; $birthDates<=31; $birthDates++){ ?>
                                         <option value="<?php echo $birthDates; ?>"><?php echo $birthDates; ?></option>
                                         <?php } ?>
                                     </select>
                                  </div>
                                  <div class="form-group col-md-2" >
                                      <select class="form-control" name="candidate_dob_month" id="candidate_dob_month">       
                                         <option value="Jan">Jan</option>
                                         <option value="Feb">Feb</option>
                                         <option value="Mar">Mar</option>
                                         <option value="Apr">Apr</option>
                                         <option value="May">May</option>
                                         <option value="Jun">Jun</option>
                                         <option value="Jul">Jul</option>
                                         <option value="Aug">Aug</option>
                                         <option value="Sep">Sep</option>
                                         <option value="Oct">Oct</option>
                                         <option value="Nov">Nov</option>
                                         <option value="Dec">Dec</option>
                                     </select>
                                  </div>
                                  <div class="form-group col-md-2" >
                                      <select class="form-control" name="candidate_dob_year" id="candidate_dob_year"> 
                                         <?php for($startYear=1987; $startYear<=2000; $startYear++){ ?>
                                         <option <?php if(@$candidate->candidate_started_working_from_yr==$startYear){echo "selected";}?> value="<?php echo $startYear; ?>"> <?php echo $startYear; ?></option>
                                         <?php } ?>
                                     </select>
                                  </div>
                         </div>
                          <div class="row">
                            <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-2">Gender</label>
                              <div class="form-group col-md-6">
                                    <label class="radio-inline">
                                      <input type="radio" value="Male" name="candidate_gender">Male
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" value="Female" name="candidate_gender">Female
                                    </label>
                                     <label class="radio-inline">
                                      <input type="radio" value="Transgender" name="candidate_gender">Transgender
                                    </label>
                             </div>
                        </div>
                         <div class="row">
                                <label class="form-group col-md-3"></label>
                                  <label class="form-group col-md-2">Permanent Address</label>
                               <div class="form-group col-md-5">
                                  <input type="text" class="form-control" autocomplete="off" placeholder="Permanent Address" name="candidate_permanent_address" id="candidate_permanent_address" value="<?=@$candidate->candidate_permanent_address?>">
                               </div>
                           </div>
                           
                           <div class="row">
                                <label class="form-group col-md-3"></label>
                                  <label class="form-group col-md-2">Hometown</label>
                               <div class="form-group col-md-5">
                                  <input type="text" class="form-control" autocomplete="off" placeholder="Hometown" name="candidate_hometown" id="candidate_hometown" value="<?=@$candidate->candidate_hometown?>">
                               </div>
                           </div>
                           
                           <div class="row">
                                <label class="form-group col-md-3"></label>
                                  <label class="form-group col-md-2">Pincode</label>
                               <div class="form-group col-md-5">
                                  <input type="text" class="form-control" autocomplete="off" placeholder="Pincode" name="candidate_pincode" id="candidate_pincode" value="<?=@$candidate->candidate_pincode?>">
                               </div>
                           </div>
                            
                            
                           <div class="row">
                            <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-2">Marital Status</label>
                            <div class="form-group col-md-5">
                                 <select class="form-control" name="candidate_marital_status" id="candidate_marital_status">
                                        <option <?php if(@$candidate->candidate_pincode=="Un-Married"){ echo"checked";}?> value="Un-Married">Un-Married</option>       
                                        <option <?php if(@$candidate->candidate_pincode=="Married"){ echo"checked";}?> value="Married">Married</option>
                                 </select>
                            </div>
						</div>
						
						<div class="row">
                            <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-2">Category</label>
                            <div class="form-group col-md-5">
                                 <select class="form-control" name="candidate_catagory" id="candidate_catagory">       
                                        <option value="">Select Category</option>
                                        <option value="SC">SC</option>
                                        <option value="ST">ST</option>
                                         <option value="OPEN">OPEN</option>
                                 </select>
                            </div>
						</div>
						
					
						<div class="row">
                            <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-3">Are you Differently Abled?</label>
                            <div class="form-group col-md-3">
                                <label class="radio-inline">
                                  <input type="radio"  value="Yes"name="candidate_differently_abled" checked="">Yes
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" value="No" name="candidate_differently_abled">No
                                </label>
                            </div>
                        </div>
                        
                        	
                        <div class="row">
                            <label class="form-group col-md-3"></label>
                            <label class="form-group col-md-2">Category</label>
                            <div class="form-group col-md-5">
                                 <select class="form-control" name="candidate_differently_abled_category" id="candidate_differently_abled_category">       
                                        <option value="">Select Category</option>
                                        <option value="vision Impairment">Vision Impairment</option>
                                        <option value="deaf or hard of hearing">Deaf or hard of hearing</option>
                                        <option value="mental health conditions">Mental health conditions</option>
                                        <option value="intellectual disability">Intellectual disability</option>
                                        <option value="acquired brain injury">Acquired brain injury</option>
                                        <option value="autism spectrum disorder">Autism spectrum disorder</option>
                                        <option value="physical disability">Physical disability</option>
                                 </select>
                            </div>
						</div>
						
						
							<div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2">Language</label>
                             <div class="form-group col-md-2">
                                      <select class="form-control" name="candidate_differently_language" id="candidate_differently_language">       
                                                <option value="AF">Afrikaans</option>
                                                <option value="SQ">Albanian</option>
                                                <option value="AR">Arabic</option>
                                                <option value="HY">Armenian</option>
                                                <option value="EU">Basque</option>
                                                <option value="BN">Bengali</option>
                                                <option value="BG">Bulgarian</option>
                                                <option value="CA">Catalan</option>
                                                <option value="KM">Cambodian</option>
                                                <option value="ZH">Chinese (Mandarin)</option>
                                                <option value="HR">Croatian</option>
                                                <option value="CS">Czech</option>
                                                <option value="DA">Danish</option>
                                                <option value="NL">Dutch</option>
                                                <option value="EN">English</option>
                                                <option value="ET">Estonian</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finnish</option>
                                                <option value="FR">French</option>
                                                <option value="KA">Georgian</option>
                                                <option value="DE">German</option>
                                                <option value="EL">Greek</option>
                                                <option value="GU">Gujarati</option>
                                                <option value="HE">Hebrew</option>
                                                <option value="HI">Hindi</option>
                                                <option value="HU">Hungarian</option>
                                                <option value="IS">Icelandic</option>
                                                <option value="ID">Indonesian</option>
                                                <option value="GA">Irish</option>
                                                <option value="IT">Italian</option>
                                                <option value="JA">Japanese</option>
                                                <option value="JW">Javanese</option>
                                                <option value="KO">Korean</option>
                                                <option value="LA">Latin</option>
                                                <option value="LV">Latvian</option>
                                                <option value="LT">Lithuanian</option>
                                                <option value="MK">Macedonian</option>
                                                <option value="MS">Malay</option>
                                                <option value="ML">Malayalam</option>
                                                <option value="MT">Maltese</option>
                                                <option value="MI">Maori</option>
                                                <option value="MR">Marathi</option>
                                                <option value="MN">Mongolian</option>
                                                <option value="NE">Nepali</option>
                                                <option value="NO">Norwegian</option>
                                                <option value="FA">Persian</option>
                                                <option value="PL">Polish</option>
                                                <option value="PT">Portuguese</option>
                                                <option value="PA">Punjabi</option>
                                                <option value="QU">Quechua</option>
                                                <option value="RO">Romanian</option>
                                                <option value="RU">Russian</option>
                                                <option value="SM">Samoan</option>
                                                <option value="SR">Serbian</option>
                                                <option value="SK">Slovak</option>
                                                <option value="SL">Slovenian</option>
                                                <option value="ES">Spanish</option>
                                                <option value="SW">Swahili</option>
                                                <option value="SV">Swedish </option>
                                                <option value="TA">Tamil</option>
                                                <option value="TT">Tatar</option>
                                                <option value="TE">Telugu</option>
                                                <option value="TH">Thai</option>
                                                <option value="BO">Tibetan</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TR">Turkish</option>
                                                <option value="UK">Ukrainian</option>
                                                <option value="UR">Urdu</option>
                                                <option value="UZ">Uzbek</option>
                                                <option value="VI">Vietnamese</option>
                                                <option value="CY">Welsh</option>
                                                <option value="XH">Xhosa</option>
                                     </select>
                                  </div>
                                 <div class="form-group col-md-2">
                                      <select class="form-control" name="candidate_differently_proficiency" id="candidate_differently_proficiency">       
                                        <option value="Proficiency" hidden>Proficiency</option>
                                        <option value="Beginner">Beginner</option>
                                        <option value="Proficient">Proficient</option>
                                        <option value="Expert">Expert</option>
                                     </select>
                                </div>
                            </div>
                            
                            	<!--  --------------------------------------------------------------------------------------->
                            
						<div class="row">
                                <label class="form-group col-md-3"></label>
                                <label class="form-group col-md-2"></label>
                               <div class="form-group col-md-3">
                                 <label class="checkbox-inline">
                                      <input type="checkbox" value="Read" name="candidate_differently_proficiency_type" checked="">Read
                                    </label>
                                   <label class="checkbox-inline">
                                      <input type="checkbox" value="Write" name="candidate_differently_proficiency_type">Write
                                  </label>
                                  <label class="checkbox-inline">
                                      <input type="checkbox" value="Speak" name="candidate_differently_proficiency_type">Speak
                                  </label>
                            </div>
                            </div>
                            
					
                            <div class="row">
                               <div class="form-group col-md-12" style="text-align:center;">
                                    <label class="radio-inline">
                                      <input type="submit" class="form-control btn btn-lg btn-primary" value="Submit">
                                  </label>
                            </div>
                            </div>
                </div>
                </form>
                </div>
               
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
         
        </div>

<!-- js for validation-->
<script src="<?php echo base_url();?>backend/plugins/jQueryUI/jquery.validate.js"></script>
<!-- js for validation-->

<script type="text/javascript">

$("#current_location").change(function(){
    var city = $('#current_location').val();
    alert(city);
    $.ajax({
        type: "POST",
        data: {'query':city},
        url: '<?php echo base_url(); ?>candidate_profile/search_city', 
        success: function(result){
            $("#current_location").html(result);
        }
    });
})




$(document).ready( function() 
{

  jQuery.validator.addMethod("emailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");    

  
    $("#candidate_form").validate(
    {
        errorElement: "span", 

        rules: 
        {
            candidate_name: 
            {
                required:true
            },
            candidate_email: 
            {
                required:true,
                emailtest:true
            },
            candidate_password: 
            {
                required:true,
            },
            re_candidate_password: 
            {
                required:true,
            },
            candidate_mobile: 
            {
                required:true,
                digits:true,
                mininum:10,
                maximum:10,
            },
            candidate_current_city: 
            {
                required:true,
            },
            candidate_out_side_india: 
            {
                required:true,
            },candidate_resume: 
            {
                required:true,
            },candidate_key_skill: 
            {
                required:true,
            },candidate_education: 
            {
                required:true,
            },candidate_course: 
            {
                required:true,
            },candidate_specialization: 
            {
                required:true,
            },candidate_university: 
            {
                required:true,
            },candidate_course_type: 
            {
                required:true,
            },candidate_paassing_year: 
            {
                required:true,
            },candidate_industry: 
            {
                required:true,
            },candidate_functional_area: 
            {
                required:true,
            },candidate_employment_type: 
            {
                required:true,
            },candidate_prefered_shift: 
            {
                required:true,
            },candidate_exp_salary_currency: 
            {
                required:true,
            },candidate_salary_in_lac: 
            {
                required:true,
            },candidate_salary_in_thousand: 
            {
                required:true,
            },candidate_desired_location: 
            {
                required:true,
            },candidate_dob_day: 
            {
                required:true,
            },candidate_dob_month: 
            {
                required:true,
            },candidate_dob_year: 
            {
                required:true,
            },candidate_gender: 
            {
                required:true,
            },candidate_permanent_address: 
            {
                required:true,
            },candidate_hometown: 
            {
                required:true,
            },candidate_pincode: 
            {
                required:true,
            },candidate_marital_status: 
            {
                required:true,
            },candidate_catagory: 
            {
                required:true,
            },candidate_differently_abled: 
            {
                required:true,
            },candidate_differently_abled_category: 
            {
                required:true,
            },candidate_differently_language: 
            {
                required:true,
            },candidate_differently_proficiency: 
            {
                required:true,
            },candidate_differently_proficiency_type: 
            {
                required:true,
            },
        },

        messages: 
        { 
            email: 
            {
                required:"Required"
            },
            candidate_password: 
            {  
                required:"Required"
            },
            re_candidate_password: 
            {  
                required:"Required"
            },
            candidate_mobile: 
            {  
                required:"Required"
            },
        },

        errorPlacement: function(error, element) 
        {               
            error.appendTo(element.parent());     
        } 

    } );

} );

</script>
<script>
    
        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
</script>