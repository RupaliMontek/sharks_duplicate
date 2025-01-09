<!-- <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.2.620/styles/kendo.common-material.min.css" />
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.2.620/styles/kendo.material.min.css" />
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.2.620/styles/kendo.material.mobile.min.css" /> -->

<link rel="stylesheet" href="<?php echo base_url();?>frontend/kendo.common-material.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontend/kendo.material.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontend/kendo.material.mobile.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontend/font-awesome.min.css">
<style type="text/css">  
  .error{
    color: red;
  }


  /*form styles*/
  #msform {
    width: 600px;
    margin: 50px auto;
    /*text-align: center;*/
    position: relative;
  }
  .radio{
     text-align: justify; 
  }
  #msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 3px;
    box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
    padding: 20px 30px;
    box-sizing: border-box;
    width: 80%;
    margin: 0 10%;
    /*stacking fieldsets above each other*/
    position: absolute;
  }
  /*Hide all except first fieldset*/
  #msform fieldset:not(:first-of-type) {
    display: none;
  }
  /*inputs*/
  #msform input,
  #msform textarea {
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin-bottom: 10px;
    /*width: 100%;*/
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 13px;
  }
  /*buttons*/
  #msform .action-button {
    width: 100px;
    background: #67d5bf;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 1px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
  }
  #msform .action-button:hover,
  #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #67d5bf;
  }
  /*headings*/
  .fs-title {
    font-size: 16px;
    text-transform: uppercase;
    color: #63a2cb;
    margin-bottom: 10px;
  }
  .fs-subtitle {
    font-weight: normal;
    font-size: 14px;
    color: #666;
    margin-bottom: 20px;
  }
  /*progressbar*/
  #progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;
  }
  #progressbar li {
    list-style-type: none;
    color: white;
    text-transform: uppercase;
    font-size: 9px;
    width: 10%;
    float: left;
    position: relative;
  }
  #progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 20px;
    line-height: 20px;
    display: block;
    font-size: 10px;
    color: #333;
    background: white;
    border-radius: 3px;
    margin: 0 auto 5px auto;
  }
  /*progressbar connectors*/
  #progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: white;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1;
    /*put it behind the numbers*/
  }
  #progressbar li:first-child:after {
    /*connector not needed before the first step*/
    content: none;
  }
  /*marking active/completed steps green*/
  /*The number of the step and the connector before it = green*/
  #progressbar li.active:before,
  #progressbar li.active:after {
    background: #67d5bf;
    color: white;
  }
  .help-block {
    font-size: 0.8em;
    color: #7c7c7c;
    text-align: left;
    margin-bottom: 0.5em;
  }

</style>
<div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

          <h4>Candidate Data
          <a href="<?php echo base_url();?>recruiter/recruiter"><button type="button" class="btn btn-primary btn-sm " >BACK</button></a></h4>
          <ol class="breadcrumb">

            <li><a href="<?php echo base_url();?>/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="javascript:void(0);">Candidate Data</a></li>

          </ol>

        </section>



        <!-- Main content -->

        <section class="content">

          <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <div class="box-body">

                  <?php if($this->session->flashdata('errorss') != '') {?>
                    <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('errorss'); ?>
                      <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
                    </div>
                    <?php } ?>

                  <?php /*$attributes = array('role' => 'form', 'id' => 'addCandidate');
      						echo form_open_multipart('recruiter/recruiter/save', $attributes);*/
      				    ?>

<form method="post" name="addCandidate" id="addCandidate" action="<?php echo base_url('recruiter/recruiter/save_non_it_recruitment');?>"  enctype="multipart/form-data"           onsubmit="return validateFP_email_id();">                   
                        <input type="hidden" name="company_client" id="company_client" class="form-control">
                    <div class="row">
                       <label class="col-md-3">Select Client <font color="red">*</font></label>
                       <label class="col-md-3">Contact Number <font color="red">*</font></label>
                       <label class="col-md-3">Email ID <font color="red">*</font></label>
                       <label class="col-md-3">Date <font color="red">*</font></label>
                    </div>

                  <div class="row">
                      

                      <div class="col-md-3">
                        <select name="client_id" id="client_id" class="form-control" onchange="change()" >
                          <option value="">Select</option>
                    
                          <?php foreach ($client_list as  $row) { ?>
                          <option value="<?php echo $row['client_id'];?>"><?php echo $row['client_name'];?></option>
                          <?php } ?>
                          
                          <?php 
                         /* @$user_id_new = $this->session->userdata('user_id'); 
                          if(@$user_id_new!='56')
                          {
                            ?>
                            <?php foreach ($client_list as  $row) { ?>
                              <option value="<?php echo $row['client_id'];?>"><?php echo $row['client_name'];?></option>
                            <?php } ?>
                            <?php
                          }*/
                        ?>
                          
                          
                          
                          
                        </select>
                      </div>

                      <div class="col-md-3">
                        <input type="hidden" name="does_email_exists" id="does_email_exists" value="1">
                       <input type="text" placeholder="Contact No" name="contact_no" id="contact_no" minlength="10" maxlength="10" class="form-control"   onblur="checkIDAvailability();" >
                       <span id="email_msg"></span>
                      </div>

                      <div class="col-md-3">
                        <input type="hidden" name="does_email_exists_email_id" id="does_email_exists_email_id" value="1">
                       <input type="text" placeholder="Email ID" name="email_id" id="email_id"  class="form-control"  onblur="checkIDAvailability_email_id();"  >
                       <span id="email_msg_email_id"></span>
                      </div>

                      <div class="col-md-3">
                        <input type="text" id="date" class="form-control" name="date"  placeholder="Select date" autocomplete="off">
                      </div>

                  </div>
                  <br>

                    <div class="row">
                       <label class="col-md-4">Position / Skills<font color="red">*</font></label>
                       <label class="col-md-4">RP ID</label>
                       <label class="col-md-4">Candidate Name<font color="red">*</font></label>
                    </div>

                  <div class="row">

                      <div class="col-md-4">
                        <input type="text" name="position_skills" id="position_skills" class="form-control" placeholder="Position Skill">
                      </div>

                      <div class="col-md-4">
                       <input type="text" name="rp_id" id="rp_id" class="form-control" placeholder="RI ID">
                      </div>

                      <div class="col-md-4">
                        <input type="text" name="candidate_name" id="candidate_name" class="form-control" placeholder="Candidate Name" >
                      </div>
                  </div>
                  <br>

                    <div class="row">
                       <label class="col-md-4">Applicant ID</label>
                       <label class="col-md-4">Role</label>
                       <label class="col-md-4">Qualification<font color="red">*</font></label>
                    </div>

                  <div class="row">

                      <div class="col-md-4">
                        <input type="text" name="applicant_id" id="applicant_id" class="form-control" placeholder="Applicant ID">
                      </div>

                      <div class="col-md-4">
                       <input type="text" name="role" id="role" class="form-control" placeholder="Role">
                      </div>

                      <div class="col-md-4">
                        <input type="text" name="qulification" id="qulification" class="form-control" placeholder="Qulification">
                      </div>
                  </div>
                  <br>

                    <div class="row">
                       <label class="col-md-4">Company Name</label>
                       <label class="col-md-4">Yrs of Experience (Years n Months) <font color="red">*</font></label>
                       <label class="col-md-4">Relevant Exp <font color="red">*</font></label>
                    </div>

                  <div class="row">

                      <div class="col-md-4">
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">
                      </div>

                      <div class="col-md-2">
                        <select class="form-control" name="yrs_of_experience" id="yrs_of_experience">
                           <option value="">Select Years </option>
                           <option value="0">0</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                           <option value="13">13</option>
                           <option value="14">14</option>
                           <option value="15">15</option>
                           <option value="16">16</option>
                           <option value="17">17</option>
                           <option value="18">18</option>
                           <option value="19">19</option>
                           <option value="20">20</option>
                           <option value="21">21</option>
                           <option value="22">22</option>
                           <option value="23">23</option>
                           <option value="24">24</option>
                           <option value="25">25</option>
                           <option value="26">26</option>
                           <option value="27">27</option>
                           <option value="28">28</option>
                           <option value="29">29</option>
                           <option value="30">30</option>
                        </select>
                      </div>

                      <div class="col-md-2">
                        <select class="form-control" name="months_of_experience" id="months_of_experience">
                           <option value="">Select Month </option>
                           <option value="0">0</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <input type="text" name="relevant_exp" id="relevant_exp" class="form-control" placeholder="Relevant Exp">
                      </div>
                  </div>
                  <br>

                    <div class="row">
                       <label class="col-md-4">CTC (In Lakhs & Thousands) <font color="red">*</font></label>
                       <label class="col-md-4">Exp CTC</label>
                       <label class="col-md-4">Notice Period</label>
                    </div>

                  <div class="row">

                      <div class="col-md-2">
                          <select class="form-control" name="ctc" id="ctc">
                           <option value="">Select CTC </option>
                           <option value="0">0</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           <option value="7">7</option>
                           <option value="8">8</option>
                           <option value="9">9</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                           <option value="13">13</option>
                           <option value="14">14</option>
                           <option value="15">15</option>
                           <option value="16">16</option>
                           <option value="17">17</option>
                           <option value="18">18</option>
                           <option value="19">19</option>
                           <option value="20">20</option>
                           <option value="21">21</option>
                           <option value="22">22</option>
                           <option value="23">23</option>
                           <option value="24">24</option>
                           <option value="25">25</option>
                           <option value="26">26</option>
                           <option value="27">27</option>
                           <option value="28">28</option>
                           <option value="29">29</option>
                           <option value="30">30</option>
                           <option value="31">31</option>
                           <option value="32">32</option>
                           <option value="33">33</option>
                           <option value="34">34</option>
                           <option value="35">35</option>
                           <option value="36">36</option>
                           <option value="37">37</option>
                           <option value="38">38</option>
                           <option value="39">39</option>
                           <option value="40">40</option>
                           <option value="41">41</option>
                           <option value="42">42</option>
                           <option value="43">43</option>
                           <option value="44">44</option>
                           <option value="45">45</option>
                           <option value="46">46</option>
                           <option value="47">47</option>
                           <option value="48">48</option>
                           <option value="49">49</option>
                           <option value="50">50</option>
                           <option value="51">51</option>
                           <option value="52">52</option>
                           <option value="53">53</option>
                           <option value="54">54</option>
                           <option value="55">55</option>
                           <option value="56">56</option>
                           <option value="57">57</option>
                           <option value="58">58</option>
                           <option value="59">59</option>
                           <option value="60">60</option>
                           <option value="61">61</option>
                           <option value="62">62</option>
                           <option value="63">63</option>
                           <option value="64">64</option>
                           <option value="65">65</option>
                           <option value="66">66</option>
                           <option value="67">67</option>
                           <option value="68">68</option>
                           <option value="69">69</option>
                           <option value="70">70</option>
                           <option value="71">71</option>
                           <option value="72">72</option>
                           <option value="73">73</option>
                           <option value="74">74</option>
                           <option value="75">75</option>
                           <option value="76">76</option>
                           <option value="77">77</option>
                           <option value="78">78</option>
                           <option value="79">79</option>
                           <option value="80">80</option>
                           <option value="81">81</option>
                           <option value="82">82</option>
                           <option value="83">83</option>
                           <option value="84">84</option>
                           <option value="85">85</option>
                           <option value="86">86</option>
                           <option value="87">87</option>
                           <option value="88">88</option>
                           <option value="89">89</option>
                           <option value="90">90</option>
                           <option value="91">91</option>
                           <option value="92">92</option>
                           <option value="93">93</option>
                           <option value="94">94</option>
                           <option value="95">95</option>
                           <option value="96">96</option>
                           <option value="97">97</option>
                           <option value="98">98</option>
                           <option value="99">99</option>
                        </select>
                      </div>

                      <div class="col-md-2">
                          <select class="form-control" name="ctc_thousand" id="ctc_thousand">
                           <option value="">Select CTC Thousand</option>
                           <option value="0">0</option>
                           <option value="5">5000</option>
                           <option value="10">10000</option>
                           <option value="15">15000</option>
                           <option value="20">20000</option>
                           <option value="25">25000</option>
                           <option value="30">30000</option>
                           <option value="35">35000</option>
                           <option value="40">40000</option>
                           <option value="45">45000</option>
                           <option value="50">50000</option>
                           <option value="55">55000</option>
                           <option value="60">60000</option>
                           <option value="65">65000</option>
                           <option value="70">70000</option>
                           <option value="75">75000</option>
                           <option value="80">80000</option>
                           <option value="85">85000</option>
                           <option value="90">90000</option>
                           <option value="95">95000</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                       <input type="text" name="exp_ctc" id="exp_ctc" class="form-control" placeholder="Exp CTC">
                      </div>

                      <div class="col-md-4">
                        <input type="text" name="notice_period" id="notice_period" class="form-control" placeholder="Notice Period">
                      </div>
                  </div>
                  <br>

                    <div class="row">
                       <label class="col-md-3">Official / Onpaper Notice Period</label>
                       <label class="col-md-3">Alternate Contact Number</label>
                       <label class="col-md-3">Alternate Email ID</label>
                       <label class="col-md-3">Country</label>
                    </div>

                  <div class="row">

                      <div class="col-md-3">
                        <input type="text" name="official_onpaper_notice_period" id="official_onpaper_notice_period" class="form-control" placeholder="Official Onpaper Notice Period">
                      </div>

                      

                      <div class="col-md-3">
                        <input type="text" placeholder="Alternate Contact No" name="alternate_contact_number" id="alternate_contact_number" class="form-control">
                      </div>


                        <div class="col-md-3">
                       <input type="text"  autocomplete="off" placeholder="Alternate Email ID" name="alternate_email_id" id="alternate_email_id" class="form-control">
                      </div>

                      <div class="col-md-3">                       
                       <select name="country" id="country" class="form-control" onchange="change_country()">
                          <option value="">Select Country</option>
                            <?php foreach ($country as $val) { ?>
                              <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                            <?php } ?>
                        </select>
                      </div>


                  </div>
                  <br>
                    <div class="row">
                       <label class="col-md-4">State <font color="red">*</font></label>
                       <label class="col-md-4">City <font color="red">*</font></label>
                       <label class="col-md-4">Preffered Location</label>
                    </div>

                  <div class="row">                    

                        <div class="col-md-4">
                          <select name="state" id="state" class="form-control" onchange="change_state()" >
                            <option value="">Select State</option>
                            <?php foreach ($state as $val) { ?>
                             <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                            <?php } ?>
                          </select>
                        </div>

                      <div class="col-md-4">
                        <select name="location" id="location" class="form-control">
                          <option value="">Select City</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <input type="text" placeholder="Preffered Location" name="preffered_location" id="preffered_location" class="form-control">
                      </div>
                  </div>
                  <br>

                    <div class="row">
                       <label class="col-md-3">Client Feedback</label>
                       <label class="col-md-3">Interview Schedule Date Time</label>
                       <label class="col-md-3">Mode of Interview</label>
                       <label class="col-md-3">Final Status</label>
                    </div>

                  <div class="row">

                      <div class="col-md-3">
                          <!-- <select class="form-control" name="client_feedback" id="client_feedback">
                           <option value="">Select Feedback</option>
                           <option value="L1 Select">L1 Select</option>
                           <option value="L2 Select">L2 Select</option>
                           <option value="L1 Reject">L1 Reject</option>
                           <option value="L2 Reject">L2 Reject</option>
                           <option value="Shortlisted">Shortlisted</option>
                           <option value="Screen Reject">Screen Reject</option>
                           <option value="Duplicate">Duplicate</option>
                           <option value="Hold">Hold</option>
                         </select> -->

                         <select class="form-control" name="client_feedback" id="client_feedback">
                           <option value="">Select Feedback</option>
                           <option value="Shortlisted">Shortlisted</option>
                           <option value="Not Shortlisted">Not Shortlisted</option>
                           <option value="Duplicate">Duplicate</option>
                           <option value="Feedback Awaited">Feedback Awaited</option>
                           <option value="Hold">Hold</option><!-- onclick open comment box -->
                         </select>

                      </div>

                      <div class="col-md-3">
                       <!-- <input type="text" name="interview_schedule" id="interview_schedule" class="form-control"> -->
                       <input id="interview_schedule" placeholder="Interview Schedule Date Time" name="interview_schedule" title="interview_schedule" class="form-control"/>
                      </div>

                      <div class="col-md-3">
                       <input type="text" placeholder="Mode of Interview" name="interview_schedule_mode" id="interview_schedule_mode" class="form-control">
                     </div>

                      <div class="col-md-3">
                        <!-- <input type="text" name="final_status" id="final_status" class="form-control"> -->
                        <select class="form-control" name="final_status" id="final_status">
                           <option value="">Select Status</option>
                           <option value="L1 Select">L1 Select</option>
                           <option value="L2 Select">L2 Select</option>
                           <option value="L1 Reject">L1 Reject</option>
                           <option value="L2 Reject">L2 Reject</option>
                           <option value="L1 Pending">L1 Pending</option>
                           <option value="L2 Pending">L2 Pending</option>
                           <option value="Test Submit">Test Submit</option>
                           <option value="Test Select">Test Select</option>
                           <option value="Test Reject">Test Reject</option>
                           <option value="HR Reject">HR Reject</option><!-- onclick open comment box -->
                           <option value="HR Hold">HR Hold</option><!-- onclick open comment box -->
                           <option value="Select">Select</option>
                           <option value="Offered">Offered</option>
                           <option value="Offer Decline">Offer Decline</option>
                           <option value="Joined">Joined</option>
                           <option value="Rescheduled">Rescheduled</option>
                           <option value="Abscond">Abscond</option>
                           <option value="Not Responding">Not Responding</option>
                           <option value="Not Rechable">Not Rechable</option>
                           <option value="Switch Off">Switch Off</option>
                           <option value="Confirm">Confirm</option>
                           <option value="Left within 3 months">Left within 3 months</option>
                           <option value="Not Schedule">Not Schedule</option>
                           <option value="No Show">No Show</option>
                           <option value="Not shared to client">Not shared to client</option>
                           <option value="Not Interested">Not Interested</option>
                           <option value="Client Round Pending">Client Round Pending</option>
                           <option value="Screening Feedback Pending">Screening Feedback Pending</option>
                           <option value="Interview Feedback Pending">Interview Feedback Pending</option>
                           <option value="Screen reject">Screen Reject</option>
                           <option value="Need to Reschedule">Need to Reschedule</option>
                           <option value="Drop">Drop</option>
                        </select>
                      </div>
                  </div>
                  <br>

                    <div class="row">
                       <label class="col-md-4">Client Recruiter</label>
                       <label class="col-md-4">Sourced By</label>
                       <label class="col-md-4">Reason for job change/Remark</label>
                    </div>

                  <div class="row">

                      <div class="col-md-4">
                        <input type="text" placeholder="Client Recruiter" name="client_recruiter" id="client_recruiter" class="form-control">
                      </div>

                      <div class="col-md-4">
                       <input type="text" name="sourced_by" id="sourced_by" readonly value="<?php echo @$user_name = $this->session->userdata('user_name'); ?>" class="form-control">
                      </div>

                      <div class="col-md-4">
                        <input type="text" placeholder="Reason for job change/Remark" name="reason_for_job_change" id="reason_for_job_change" class="form-control">
                      </div>
                  </div>
                  <br>

                  <div class="row">
                       <label class="col-md-4">Select Color</label>
                       <label class="col-md-4">Rating</label>
                       <label class="col-md-4">Upload Resume <font color="red">*</font></label>
                    </div>

                  <div class="row">
                      <div class="col-md-4">
                       <input type="color" value="#FFFFFF" name="color_id" id="color_id" class="inpcol-p">
                      </div>
                      <div class="col-md-4">
                        <select class="form-control" name="star_rating" id="star_rating">
                           <option value="">Select Rating</option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                         </select>
                      </div>
                      <div class="col-md-4">
                       <input type="file" name="userFiles1" id="userFiles" class="form-control">
                      </div>
                  </div>
                  <br>
                  <div class="row">
                       <label class="col-md-4">Upload Screenshots</label>
                       
                    </div>

                  <div class="row">
                      
                      <div class="col-md-4">
                       <input type="file" class="form-control" name="files_o[]" id="files_o" multiple="">

                      </div>
                  </div>
                  <br>
                  <div class="col-md-12">
            <h2><input type="hidden" name="genuinity_check" value="0">
            <input type="checkbox" name="genuinity_check" id="genuinity_check" value="1">Genuinity</h2>

           <?php $i = 0;$j = 0;$k = 0;$cnt=0; ?>   

           <!--<div class="" id="genuinity_question_div">
            <?php foreach ($genuinity_questions as $question): ?>   
              <div class="col-md-3" style="border: 1px solid; margin: 0px;height: 140px;  font-size: 12px;">
                <div class="form-group" style="font-size:13px;" ><?php echo ++$i . ') ' . $question->question_title; ?>
                <?php foreach ($genuinity_answers as $answer): ?> 
                  <?php if ($question->question_id == $answer->answer_question_id): ?>
                    <div class="radio">
                      <label>
                        <input type="radio" name="<?php echo'questions_answer_' . $question->question_id; ?>" id="<?php echo'questions_answer_' . $question->question_id; ?>" value="<?php echo $answer->answer_id; ?>" onclick="calculate_marks(this.value);" required>
                        <span class="text" style="font-size:11px;"><?php echo $answer->answer_title; ?></span><span id="<?php echo'marks_'.$answer->answer_id;?>"></span>                  
                      </label>
                    </div>
                  <?php endif; ?>                                 
                <?php endforeach; ?>                            
                <input type="hidden" name="gen_question_id[]" value="<?php echo $question->question_id; ?>"/>  
                <input type="hidden" name="question_marks[]" value="<?php echo $question->question_marks; ?>"/> 
                <div class="help-block with-errors"></div>
              </div>
            </div>                     
          <?php endforeach; ?>    
        </div>--> 
                            <div id="genuinity_question_div">
                              <div id="msform" style="margin-bottom: 300px;">
                                <ul id="progressbar">
                                  <?php foreach ($genuinity_questions as $i=>$question){ ?> 
                                    <li <?php if( $i==0){echo "class='active'";} ?>></li>
                                  <?php } ?> 
                              </ul>
                              <?php $i = 0;$j = 0;$k = 0;$cnt=0; ?> 
                              <?php //print_r($genuinity_questions); ?>
                              <?php foreach ($genuinity_questions as $question): ?>  
                                <fieldset>
                                  <h2 class="fs-title">Question <?php echo ++$i;?></h2>
                                  <h3 class="fs-subtitle"><?php echo $question->question_title; ?></h3>
                                  <!--<p class="help-block">List your strengths here.</p>-->
                                  <?php foreach ($genuinity_answers as $answer): ?> 
                                    <?php if ($question->question_id == $answer->answer_question_id): ?>
                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="<?php echo'questions_answer_' . $question->question_id; ?>" id="<?php echo'questions_answer_' . $question->question_id; ?>" value="<?php echo $answer->answer_id; ?>" onclick="calculate_marks(this.value);" required>
                                          <span class="text"><?php echo $answer->answer_title; ?></span><span id="<?php echo'marks_'.$answer->answer_id;?>"></span>                  
                                        </label>
                                      </div>
                                    <?php endif; ?>                                 
                                  <?php endforeach; ?>
                                  <?php 
                                  if($i==1)
                                  {
                                    ?>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <?php
                                  }
                                  else if($i==count($genuinity_questions))
                                  {
                                    ?>
                                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <input type="button" name="previous" class="previous action-button" value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <?php
                                  }
                                  ?>  
                                </fieldset>                      
                              <?php endforeach; ?> 
                            </div>
                          </div>
                            </div>
                   

                  <div class="form-group">                        

                <input type="submit" class="btn btn-primary btn-lg pull-right" value="submit" name="submit"/>

              </div>

                  <!-- </form> -->


</form>


				<?php //echo form_close( ); ?>





                </div><!-- /.box-body -->


              </div><!-- /.box -->

            </div><!-- /.col -->

          </div><!-- /.row -->

        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->



<?php $this->load->view('template/footer'); ?>

<script type="text/javascript" src="<?php echo base_url();?>backend/validation_js/user/add_user.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>frontend/kendo.all.min.js"></script>
<!-- <script src="https://kendo.cdn.telerik.com/2018.2.620/js/kendo.all.min.js"></script> -->

<script>

$('#date').datepicker({

    format: 'yyyy/mm/dd',
    startDate: new Date(),
    todayHighlight: true,

});

  $("#interview_schedule").kendoDateTimePicker({
  
  }).attr("readonly", "readonly");

  function validateFP_email_id()
  {
    if($('#does_email_exists').val()==0)
    {
      alert('Mobile Number allready exists');
       return false;
    }
    else
    {
      if($('#does_email_exists_email_id').val()==0)
      {
        alert('Email ID allready exists');
        return false;
      }
    } 

   }


</script>


<script type="text/javascript">

  $(document).ready( function() 
    {
        
        $("#genuinity_question_div :input").attr("disabled", true);

    $('#genuinity_check').change(function() {
      if(this.checked) 
      {
        $("#genuinity_question_div :input").attr("disabled", false);
        /*$("#export_invoice_product_reexprt_div").attr("disabled",false);*/
      }
      else
      {
        $("#genuinity_question_div :input").attr("disabled", true);
        /*$("#export_invoice_product_reexprt_div").attr("disabled",true);*/
      }      
    });


        jQuery.validator.addMethod("notEqual", function(value, element) { 
    return this.optional(element) || value != "0000000000";
  }, "Invalid mobile number.");

          jQuery.validator.addMethod("validemailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");

        $("#addCandidate").validate(
        {
            errorElement: "span", 

            rules: 
            {
                client_id: 
                {
                    required:true
                },
                date: 
                {
                    required:true
                },
                position_skills: 
                {
                    required:true
                },
                candidate_name: 
                {
                    required:true
                },
                contact_no: 
                {
                    required:true,
                notEqual:true,
                digits:true
                },
                email_id: 
                {
                    required:true,
                    // validemailtest:true
                },
                yrs_of_experience: 
                {
                    required:true,
                    
                },
                months_of_experience: 
                {
                    required:true,
                    
                },
                relevant_exp: 
                {
                    required:true,
                    // validemailtest:true
                },
                qulification: 
                {
                    required:true,
                    // validemailtest:true
                },
                ctc: 
                {
                    required:true,
                    // validemailtest:true
                },
                ctc_thousand: 
                {
                    required:true,
                    // validemailtest:true
                },
                state: 
                {
                    required:true,
                    // validemailtest:true
                },
                location: 
                {
                    required:true,
                    // validemailtest:true
                },
                userFiles: 
                {
                     required:true,
                  accept: "pdf|doc|docx"
                }
            },

            messages: 
            { 
                client_id: 
                {
                    required:"Required"
                },
                date: 
                {
                    required:"Required"
                },
                position_skills: 
                {
                    required:"Required"
                },
                candidate_name: 
                {
                    required:"Required"
                },
                contact_no: 
                {
                    required:"Required"
                },
                email_id: 
                {
                    required:"Required"
                },
                yrs_of_experience: 
                {
                    required:"Required"
                },
                months_of_experience: 
                {
                    required:"Required"
                    
                },
                relevant_exp: 
                {
                    required:"Required"
                },
                qulification: 
                {
                    required:"Required"
                },
                ctc: 
                {
                    required:"Required"
                },
                ctc_thousand: 
                {
                    required:"Required"
                },
                state: 
                {
                    required:"Required"
                },
                location: 
                {
                    required:"Required"
                },
                userFiles: 
                {
                    required:"Required",
                  accept: "Please select only pdf|doc|docx file"
                }
            },
        });
    });


   function checkIDAvailability()
    {
      var base_url = "<?php echo base_url(); ?>"
       var postURL = base_url+"recruiter/recruiter/forgot_password_email_exits";
           $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { contact_no: $('#contact_no').val(), client_id: $('#client_id').val()},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {
                                var words = msg.split('_'); 
                                var name = words[1];   
                                var date = words[2];   
                                var contact_no = words[3];    
                                var sheetid = words[4]; 

                                var aaaaa = "Contact No already added by ";
                                var bbbbb = " on dated ";
                                var ddddd = " check "

                                var eeeee =  '<a href="javascript:void(0);" onclick="getReport(\''+sheetid+','+contact_no+'\');">Profile</a>'
                                var joined = aaaaa + name + bbbbb + date + ddddd + eeeee;
                                 $('#does_email_exists').val(0);
                                 $('#email_msg').html('<font color="red">'+joined+'</font>');
                                 /*$('#email_msg').html('<font color="red">Contact No allready exists</font>');*/
                               }else{
                                
                                   $('#does_email_exists').val(1);
                                   $('#email_msg').html('');
                               }
                            }
                    });
           
        }



   function checkIDAvailability_email_id()
    {
      var base_url = "<?php echo base_url(); ?>"
       var postURL = base_url+"recruiter/recruiter/forgot_password_email_exits_email_id";
           $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { email_id: $('#email_id').val(), client_id: $('#client_id').val()},
                            url: postURL,
                            success: function(msg) 
                            {
                               if(msg!='TRUE')
                               {
                                var words = msg.split('msuite'); 
                                var name = words[1];   
                                var date = words[2];   
                                var email_id = words[3];    
                                var sheetid = words[4]; 


                                var aaaaa = "Email ID allready added by ";
                                var bbbbb = " on dated ";
                                var ddddd = " check "

                                var eeeee =  '<a href="javascript:void(0);" onclick="getReport_email(\''+sheetid+','+email_id+'\');">Profile</a>'
                                var joined = aaaaa + name + bbbbb + date + ddddd + eeeee;

                                 $('#does_email_exists_email_id').val(0);
                                 $('#email_msg_email_id').html('<font color="red">'+joined+'</font>');
                                 /*$('#email_msg_email_id').html('<font color="red">Email ID allready exists</font>');*/
                               }else{
                                   $('#does_email_exists_email_id').val(1);
                                   $('#email_msg_email_id').html('');
                               }
                            }
                    });
           
        }


    function getReport(sheetid)
    {
      var words = sheetid.split(','); 

      var sheetid = words[0];   
      var contact_no = words[1];   

       var base_url = "<?php echo base_url();?>";

        $.ajax({
          type:"POST",
          data: {sheetid:sheetid, contact_no:contact_no},
          url:base_url+"recruiter/recruiter/get_candidate_details",
          success:function(data){
            $('#product_sub2category').html(data);
            $("#update_role_popup").modal();
          }
        });
    }


    function getReport_email(sheetid)
    {
      var words = sheetid.split(','); 
      var sheetid = words[0];   
      var email_id = words[1];   

       var base_url = "<?php echo base_url();?>";

        $.ajax({
          type:"POST",
          data: {sheetid:sheetid, email_id:email_id},
          url:base_url+"recruiter/recruiter/get_candidate_details_email",
          success:function(data){
            $('#product_sub2category').html(data);
            $("#update_role_popup").modal();
          }
        });
    }



        function change(){
          var client_id = document.getElementById("client_id").value;
          var base_url = "<?php echo base_url();?>";

        $.ajax({
          type:"POST",
          data: {client_id:client_id},
          url:base_url+"recruiter/recruiter/get_client_name",
          success:function(data){
            $('#company_client').val(data);
          }
        });
      $('#contact_no').val('');
     $('#email_msg').html('');
}


function change_country()
{
  var country = document.getElementById("country").value;
  var base_url = "<?php echo base_url();?>";

  $.ajax({
          type:"POST",
          data: {country:country},
          url:base_url+"recruiter/recruiter/getStateByCountry",
          success:function(data){
            $('#state').html(data);
          }
        });
}


function change_state()
{
  var state = document.getElementById("state").value;
  var base_url = "<?php echo base_url();?>";

  $.ajax({
          type:"POST",
          data: {state:state},
          url:base_url+"recruiter/recruiter/getCitiesByState",
          success:function(data){
            $('#location').html(data);
          }
        });
}




  function closeSuccess2()
  { 
    $("#successMessage2").hide(); 
  }
</script>
<script type="text/javascript">
  //jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'transform': 'scale('+scale+')'});
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 500, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeOutQuint'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 500, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeOutQuint'
  });
});

$(".submit").click(function(){
  return false;
})
</script>


<div class="modal fade" id="update_role_popup" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" id="product_sub2category">       
    </div>
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script>
$( "#preffered_location" ).typeahead({
  source: function(query, result)
  {
    $.ajax({
      url:"<?php echo base_url();?>recruiter/recruiter/search_city",
      method:"POST",
      data:{query:query},
      dataType:"json",
      success:function(data)
      {
        result($.map(data, function(item){
          return item;
        }));
      }
    })
  }
});
</script>
