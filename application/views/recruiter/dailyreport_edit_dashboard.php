<link rel="stylesheet" href="<?php echo base_url();?>frontend/kendo.common-material.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontend/kendo.material.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontend/kendo.material.mobile.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>frontend/font-awesome.min.css">
<style type="text/css">
.error{ color: red; }
</style>      

  <?php
  
    $this->load->view('template/header');
    $this->load->view('template/sidebar_admin',$data);?>
      <div class="content-wrapper">
        <section class="content-header">
          <h4>Candidate Data
           <button type="button" class="btn btn-primary btn-lg" id="backb" >BACK</button>
            <!--<a href="<?php echo base_url();?>recruiter/recruiter"><button type="button" class="btn btn-primary btn-sm " >BACK</button></a>-->
          </h4>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0);"> Candidate Data</a></li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                 

 <form method="post" name="EditCandidate" id="EditCandidate"  enctype="multipart/form-data"  action="<?php echo base_url('recruiter/recruiter/update_dashboard');?>" onsubmit="return validateFP();"> 
                    
                    <input type="hidden" name="id" value="<?php if(!empty($result->dailyreport_id)) echo $result->dailyreport_id; ?>">
                    <input type="hidden" name="company_client" id="company_client" value="<?php if(!empty($result->company_client)) echo $result->company_client; ?>"/>
                    <input type="hidden" name="sourced_by" id="sourced_by" value="<?php if(!empty($result->sourced_by)) echo $result->sourced_by; ?>"/>




                    <div class="row">
                       <!-- <label class="col-md-3">Select Client</label> -->
                       <label class="col-md-3">Contact Number</label>
                       <label class="col-md-3">Email ID</label>
                       <label class="col-md-3">Date</label>
                    </div>

                  <div class="row">
                      

                      <!-- <div class="col-md-3">
                        <select name="client_id" id="client_id" class="form-control" onchange="change()" >
                          <option value="">Select</option>
                          <?php /* foreach ($client_list as $row) { ?>
                            <option <?php if($row['client_id']==$result->sheetid){echo 'selected';}?> value="<?php echo $row['client_id'];?>"><?php echo $row['client_name'];?></option>
                          <?php } */ ?>
                        </select>
                      </div> -->

                      <div class="col-md-3">
                        <input type="text" class="form-control"   onblur="checkIDAvailability();" name="contact_no" id="contact_no" minlength="10" maxlength="10" value="<?php if(!empty($result->contact_no)) echo $result->contact_no; ?>"/>
                     <span id="email_msg"></span>
                     <input type="hidden" name="does_email_exists" id="does_email_exists" value="1">
                      <input type="hidden" class="form-control"  name="bydefault_contact_no" id="bydefault_contact_no" value="<?php if(!empty($result->contact_no)) echo $result->contact_no; ?>"/>
                      <input type="hidden" class="form-control"  name="sheetid" id="sheetid" value="<?php if(!empty($result->sheetid)) echo $result->sheetid; ?>"/>
                      </div>

                      <div class="col-md-3">
                        <input type="text" class="form-control"   onblur="checkIDAvailabilityEmail();" name="email_id" id="email_id" value="<?php if(!empty($result->email_id)) echo $result->email_id; ?>"/>
                     <span id="email_msg_email_id"></span>
                     <input type="hidden" name="does_email_exists_email_id" id="does_email_exists_email_id" value="1">
                      <input type="hidden" class="form-control"  name="bydefault_email_id" id="bydefault_email_id" value="<?php if(!empty($result->email_id)) echo $result->email_id; ?>"/>
                      <input type="hidden" class="form-control"  name="sheetid_email_id" id="sheetid_email_id" value="<?php if(!empty($result->sheetid)) echo $result->sheetid; ?>"/>
                      </div>

                      <div class="col-md-3">
                        <input type="text" id="date" class="form-control" name="date" value="<?php if(!empty($result->date)) echo $result->date; ?>" >
                      </div>

                  </div>
                  <br>



















                    <div class="row">
                       <label class="col-md-4">Position Skills</label>
                       <label class="col-md-4">RP ID</label>
                       <label class="col-md-4">Candidate Name</label>
                    </div>

                  <div class="row">
                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="position_skills" id="position_skills" value="<?php if(!empty($result->position_skills)) echo $result->position_skills; ?>"/>
                      </div>

                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="rp_id" id="rp_id" value="<?php if(!empty($result->rp_id)) echo $result->rp_id; ?>"/>
                      </div>

                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="candidate_name" id="candidate_name" value="<?php if(!empty($result->candidate_name)) echo $result->candidate_name; ?>"/>
                      </div>
                  </div><br>

                  <div class="row">
                       <label class="col-md-4">Applicant ID</label>
                       <label class="col-md-4">Role</label>
                       <label class="col-md-4">Qulification</label>
                    </div>

                  <div class="row">
                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="applicant_id" id="applicant_id" value="<?php if(!empty($result->applicant_id)) echo $result->applicant_id; ?>"/>
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="role" id="role" value="<?php if(!empty($result->role)) echo $result->role; ?>"/>
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="qulification" id="qulification" value="<?php if(!empty($result->qulification)) echo $result->qulification; ?>"/>
                      </div>
                  </div><br>


                  <div class="row">
                       <label class="col-md-4">Company Name</label>
                       <label class="col-md-4">Yrs of Experience (Years n Months)</label>
                       <label class="col-md-4">Relevant Exp</label>
                    </div>

                  <div class="row">
                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="company_name" id="company_name" value="<?php if(!empty($result->company_name)) echo $result->company_name; ?>"/>
                      </div>

                      <div class="col-md-2">
                        <select class="form-control" name="yrs_of_experience" id="yrs_of_experience">
                              <option value="0" <?php if(@$result->yrs_of_experience=="0") echo 'selected'; ?> >0</option>
                              <option value="1" <?php if(@$result->yrs_of_experience=="1") echo 'selected'; ?> >1</option>
                              <option value="2" <?php if(@$result->yrs_of_experience=="2") echo 'selected'; ?> >2</option>
                              <option value="3" <?php if(@$result->yrs_of_experience=="3") echo 'selected'; ?> >3</option>
                              <option value="4" <?php if(@$result->yrs_of_experience=="4") echo 'selected'; ?> >4</option>
                              <option value="5" <?php if(@$result->yrs_of_experience=="5") echo 'selected'; ?> >5</option>
                              <option value="6" <?php if(@$result->yrs_of_experience=="6") echo 'selected'; ?> >6</option>
                              <option value="7" <?php if(@$result->yrs_of_experience=="7") echo 'selected'; ?> >7</option>
                              <option value="8" <?php if(@$result->yrs_of_experience=="8") echo 'selected'; ?> >8</option>
                              <option value="9" <?php if(@$result->yrs_of_experience=="9") echo 'selected'; ?> >9</option>
                              <option value="10" <?php if(@$result->yrs_of_experience=="10") echo 'selected'; ?> >10</option>
                              <option value="11" <?php if(@$result->yrs_of_experience=="11") echo 'selected'; ?> >11</option>
                              <option value="12" <?php if(@$result->yrs_of_experience=="12") echo 'selected'; ?> >12</option>
                              <option value="13" <?php if(@$result->yrs_of_experience=="13") echo 'selected'; ?> >13</option>
                              <option value="14" <?php if(@$result->yrs_of_experience=="14") echo 'selected'; ?> >14</option>
                              <option value="15" <?php if(@$result->yrs_of_experience=="15") echo 'selected'; ?> >15</option>
                              <option value="16" <?php if(@$result->yrs_of_experience=="16") echo 'selected'; ?> >16</option>
                              <option value="17" <?php if(@$result->yrs_of_experience=="17") echo 'selected'; ?> >17</option>
                              <option value="18" <?php if(@$result->yrs_of_experience=="18") echo 'selected'; ?> >18</option>
                              <option value="19" <?php if(@$result->yrs_of_experience=="19") echo 'selected'; ?> >19</option>
                              <option value="20" <?php if(@$result->yrs_of_experience=="20") echo 'selected'; ?> >20</option>
                              <option value="21" <?php if(@$result->yrs_of_experience=="21") echo 'selected'; ?> >21</option>
                              <option value="22" <?php if(@$result->yrs_of_experience=="22") echo 'selected'; ?> >22</option>
                              <option value="23" <?php if(@$result->yrs_of_experience=="23") echo 'selected'; ?> >23</option>
                              <option value="24" <?php if(@$result->yrs_of_experience=="24") echo 'selected'; ?> >24</option>
                              <option value="25" <?php if(@$result->yrs_of_experience=="25") echo 'selected'; ?> >25</option>
                              <option value="26" <?php if(@$result->yrs_of_experience=="26") echo 'selected'; ?> >26</option>
                              <option value="27" <?php if(@$result->yrs_of_experience=="27") echo 'selected'; ?> >27</option>
                              <option value="28" <?php if(@$result->yrs_of_experience=="28") echo 'selected'; ?> >28</option>
                              <option value="29" <?php if(@$result->yrs_of_experience=="29") echo 'selected'; ?> >29</option>
                              <option value="30" <?php if(@$result->yrs_of_experience=="30") echo 'selected'; ?> >30</option>
                          </select>
                      </div>

                      <div class="col-md-2">
                        <select class="form-control" name="months_of_experience" id="months_of_experience">
                              <option value="0" <?php if(@$result->months_of_experience=="0") echo 'selected'; ?> >0</option>
                              <option value="1" <?php if(@$result->months_of_experience=="1") echo 'selected'; ?> >1</option>
                              <option value="2" <?php if(@$result->months_of_experience=="2") echo 'selected'; ?> >2</option>
                              <option value="3" <?php if(@$result->months_of_experience=="3") echo 'selected'; ?> >3</option>
                              <option value="4" <?php if(@$result->months_of_experience=="4") echo 'selected'; ?> >4</option>
                              <option value="5" <?php if(@$result->months_of_experience=="5") echo 'selected'; ?> >5</option>
                              <option value="6" <?php if(@$result->months_of_experience=="6") echo 'selected'; ?> >6</option>
                              <option value="7" <?php if(@$result->months_of_experience=="7") echo 'selected'; ?> >7</option>
                              <option value="8" <?php if(@$result->months_of_experience=="8") echo 'selected'; ?> >8</option>
                              <option value="9" <?php if(@$result->months_of_experience=="9") echo 'selected'; ?> >9</option>
                              <option value="10" <?php if(@$result->months_of_experience=="10") echo 'selected'; ?> >10</option>
                              <option value="11" <?php if(@$result->months_of_experience=="11") echo 'selected'; ?> >11</option>
                              <option value="12" <?php if(@$result->months_of_experience=="12") echo 'selected'; ?> >12</option>
                          </select>
                      </div>

                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="relevant_exp" id="relevant_exp" value="<?php if(!empty($result->relevant_exp)) echo $result->relevant_exp; ?>"/>
                      </div>
                  </div><br>




                  <div class="row">
                       <label class="col-md-4">CTC (In Lakhs & Thousands)</label>
                       <label class="col-md-4">Exp CTC</label>
                       <label class="col-md-4">Notice Period</label>
                    </div>

                  <div class="row">
                     
                      <div class="col-md-2">
                          <select class="form-control" name="ctc" id="ctc">
                          <option value="0" <?php if(@$result->ctc=="0") echo 'selected'; ?> >0</option>
                          <option value="1" <?php if(@$result->ctc=="1") echo 'selected'; ?> >1</option>
                          <option value="2" <?php if(@$result->ctc=="2") echo 'selected'; ?> >2</option>
                          <option value="3" <?php if(@$result->ctc=="3") echo 'selected'; ?> >3</option>
                          <option value="4" <?php if(@$result->ctc=="4") echo 'selected'; ?> >4</option>
                          <option value="5" <?php if(@$result->ctc=="5") echo 'selected'; ?> >5</option>
                          <option value="6" <?php if(@$result->ctc=="6") echo 'selected'; ?> >6</option>
                          <option value="7" <?php if(@$result->ctc=="7") echo 'selected'; ?> >7</option>
                          <option value="8" <?php if(@$result->ctc=="8") echo 'selected'; ?> >8</option>
                          <option value="9" <?php if(@$result->ctc=="9") echo 'selected'; ?> >9</option>
                          <option value="10" <?php if(@$result->ctc=="10") echo 'selected'; ?> >10</option>
                          <option value="11" <?php if(@$result->ctc=="11") echo 'selected'; ?> >11</option>
                          <option value="12" <?php if(@$result->ctc=="12") echo 'selected'; ?> >12</option>
                          <option value="13" <?php if(@$result->ctc=="13") echo 'selected'; ?> >13</option>
                          <option value="14" <?php if(@$result->ctc=="14") echo 'selected'; ?> >14</option>
                          <option value="15" <?php if(@$result->ctc=="15") echo 'selected'; ?> >15</option>
                          <option value="16" <?php if(@$result->ctc=="16") echo 'selected'; ?> >16</option>
                          <option value="17" <?php if(@$result->ctc=="17") echo 'selected'; ?> >17</option>
                          <option value="18" <?php if(@$result->ctc=="18") echo 'selected'; ?> >18</option>
                          <option value="19" <?php if(@$result->ctc=="19") echo 'selected'; ?> >19</option>
                          <option value="20" <?php if(@$result->ctc=="20") echo 'selected'; ?> >20</option>
                          <option value="21" <?php if(@$result->ctc=="21") echo 'selected'; ?> >21</option>
                          <option value="22" <?php if(@$result->ctc=="22") echo 'selected'; ?> >22</option>
                          <option value="23" <?php if(@$result->ctc=="23") echo 'selected'; ?> >23</option>
                          <option value="24" <?php if(@$result->ctc=="24") echo 'selected'; ?> >24</option>
                          <option value="25" <?php if(@$result->ctc=="25") echo 'selected'; ?> >25</option>
                          <option value="26" <?php if(@$result->ctc=="26") echo 'selected'; ?> >26</option>
                          <option value="27" <?php if(@$result->ctc=="27") echo 'selected'; ?> >27</option>
                          <option value="28" <?php if(@$result->ctc=="28") echo 'selected'; ?> >28</option>
                          <option value="29" <?php if(@$result->ctc=="29") echo 'selected'; ?> >29</option>
                          <option value="30" <?php if(@$result->ctc=="30") echo 'selected'; ?> >30</option>
                          <option value="31" <?php if(@$result->ctc=="31") echo 'selected'; ?> >31</option>
                          <option value="32" <?php if(@$result->ctc=="32") echo 'selected'; ?> >32</option>
                          <option value="33" <?php if(@$result->ctc=="33") echo 'selected'; ?> >33</option>
                          <option value="34" <?php if(@$result->ctc=="34") echo 'selected'; ?> >34</option>
                          <option value="35" <?php if(@$result->ctc=="35") echo 'selected'; ?> >35</option>
                          <option value="36" <?php if(@$result->ctc=="36") echo 'selected'; ?> >36</option>
                          <option value="37" <?php if(@$result->ctc=="37") echo 'selected'; ?> >37</option>
                          <option value="38" <?php if(@$result->ctc=="38") echo 'selected'; ?> >38</option>
                          <option value="39" <?php if(@$result->ctc=="39") echo 'selected'; ?> >39</option>
                          <option value="40" <?php if(@$result->ctc=="40") echo 'selected'; ?> >40</option>
                          <option value="41" <?php if(@$result->ctc=="41") echo 'selected'; ?> >41</option>
                          <option value="42" <?php if(@$result->ctc=="42") echo 'selected'; ?> >42</option>
                          <option value="43" <?php if(@$result->ctc=="43") echo 'selected'; ?> >43</option>
                          <option value="44" <?php if(@$result->ctc=="44") echo 'selected'; ?> >44</option>
                          <option value="45" <?php if(@$result->ctc=="45") echo 'selected'; ?> >45</option>
                          <option value="46" <?php if(@$result->ctc=="46") echo 'selected'; ?> >46</option>
                          <option value="47" <?php if(@$result->ctc=="47") echo 'selected'; ?> >47</option>
                          <option value="48" <?php if(@$result->ctc=="48") echo 'selected'; ?> >48</option>
                          <option value="49" <?php if(@$result->ctc=="49") echo 'selected'; ?> >49</option>
                          <option value="50" <?php if(@$result->ctc=="50") echo 'selected'; ?> >50</option>
                          <option value="51" <?php if(@$result->ctc=="51") echo 'selected'; ?> >51</option>
                          <option value="52" <?php if(@$result->ctc=="52") echo 'selected'; ?> >52</option>
                          <option value="53" <?php if(@$result->ctc=="53") echo 'selected'; ?> >53</option>
                          <option value="54" <?php if(@$result->ctc=="54") echo 'selected'; ?> >54</option>
                          <option value="55" <?php if(@$result->ctc=="55") echo 'selected'; ?> >55</option>
                          <option value="56" <?php if(@$result->ctc=="56") echo 'selected'; ?> >56</option>
                          <option value="57" <?php if(@$result->ctc=="57") echo 'selected'; ?> >57</option>
                          <option value="58" <?php if(@$result->ctc=="58") echo 'selected'; ?> >58</option>
                          <option value="59" <?php if(@$result->ctc=="59") echo 'selected'; ?> >59</option>
                          <option value="60" <?php if(@$result->ctc=="60") echo 'selected'; ?> >60</option>
                          <option value="61" <?php if(@$result->ctc=="61") echo 'selected'; ?> >61</option>
                          <option value="62" <?php if(@$result->ctc=="62") echo 'selected'; ?> >62</option>
                          <option value="63" <?php if(@$result->ctc=="63") echo 'selected'; ?> >63</option>
                          <option value="64" <?php if(@$result->ctc=="64") echo 'selected'; ?> >64</option>
                          <option value="65" <?php if(@$result->ctc=="65") echo 'selected'; ?> >65</option>
                          <option value="66" <?php if(@$result->ctc=="66") echo 'selected'; ?> >66</option>
                          <option value="67" <?php if(@$result->ctc=="67") echo 'selected'; ?> >67</option>
                          <option value="68" <?php if(@$result->ctc=="68") echo 'selected'; ?> >68</option>
                          <option value="69" <?php if(@$result->ctc=="69") echo 'selected'; ?> >69</option>
                          <option value="70" <?php if(@$result->ctc=="70") echo 'selected'; ?> >70</option>
                          <option value="71" <?php if(@$result->ctc=="71") echo 'selected'; ?> >71</option>
                          <option value="72" <?php if(@$result->ctc=="72") echo 'selected'; ?> >72</option>
                          <option value="73" <?php if(@$result->ctc=="73") echo 'selected'; ?> >73</option>
                          <option value="74" <?php if(@$result->ctc=="74") echo 'selected'; ?> >74</option>
                          <option value="75" <?php if(@$result->ctc=="75") echo 'selected'; ?> >75</option>
                          <option value="76" <?php if(@$result->ctc=="76") echo 'selected'; ?> >76</option>
                          <option value="77" <?php if(@$result->ctc=="77") echo 'selected'; ?> >77</option>
                          <option value="78" <?php if(@$result->ctc=="78") echo 'selected'; ?> >78</option>
                          <option value="79" <?php if(@$result->ctc=="79") echo 'selected'; ?> >79</option>
                          <option value="80" <?php if(@$result->ctc=="80") echo 'selected'; ?> >80</option>
                          <option value="81" <?php if(@$result->ctc=="81") echo 'selected'; ?> >81</option>
                          <option value="82" <?php if(@$result->ctc=="82") echo 'selected'; ?> >82</option>
                          <option value="83" <?php if(@$result->ctc=="83") echo 'selected'; ?> >83</option>
                          <option value="84" <?php if(@$result->ctc=="84") echo 'selected'; ?> >84</option>
                          <option value="85" <?php if(@$result->ctc=="85") echo 'selected'; ?> >85</option>
                          <option value="86" <?php if(@$result->ctc=="86") echo 'selected'; ?> >86</option>
                          <option value="87" <?php if(@$result->ctc=="87") echo 'selected'; ?> >87</option>
                          <option value="88" <?php if(@$result->ctc=="88") echo 'selected'; ?> >88</option>
                          <option value="89" <?php if(@$result->ctc=="89") echo 'selected'; ?> >89</option>
                          <option value="90" <?php if(@$result->ctc=="90") echo 'selected'; ?> >90</option>
                          <option value="91" <?php if(@$result->ctc=="91") echo 'selected'; ?> >91</option>
                          <option value="92" <?php if(@$result->ctc=="92") echo 'selected'; ?> >92</option>
                          <option value="93" <?php if(@$result->ctc=="93") echo 'selected'; ?> >93</option>
                          <option value="94" <?php if(@$result->ctc=="94") echo 'selected'; ?> >94</option>
                          <option value="95" <?php if(@$result->ctc=="95") echo 'selected'; ?> >95</option>
                          <option value="96" <?php if(@$result->ctc=="96") echo 'selected'; ?> >96</option>
                          <option value="97" <?php if(@$result->ctc=="97") echo 'selected'; ?> >97</option>
                          <option value="98" <?php if(@$result->ctc=="98") echo 'selected'; ?> >98</option>
                          <option value="99" <?php if(@$result->ctc=="99") echo 'selected'; ?> >99</option>
                        </select>
                      </div>

                      <div class="col-md-2">
                          <select class="form-control" name="ctc_thousand" id="ctc_thousand">
                           <option value="0" <?php if(@$result->ctc_thousand=="0") echo 'selected'; ?> >0</option>
                           <option value="5" <?php if(@$result->ctc_thousand=="5") echo 'selected'; ?> >5000</option>
                           <option value="10" <?php if(@$result->ctc_thousand=="10") echo 'selected'; ?> >10000</option>
                           <option value="15" <?php if(@$result->ctc_thousand=="15") echo 'selected'; ?> >15000</option>
                           <option value="20" <?php if(@$result->ctc_thousand=="20") echo 'selected'; ?> >20000</option>
                           <option value="25" <?php if(@$result->ctc_thousand=="25") echo 'selected'; ?> >25000</option>
                           <option value="30" <?php if(@$result->ctc_thousand=="30") echo 'selected'; ?> >30000</option>
                           <option value="35" <?php if(@$result->ctc_thousand=="35") echo 'selected'; ?> >35000</option>
                           <option value="40" <?php if(@$result->ctc_thousand=="40") echo 'selected'; ?> >40000</option>
                           <option value="45" <?php if(@$result->ctc_thousand=="45") echo 'selected'; ?> >45000</option>
                           <option value="50" <?php if(@$result->ctc_thousand=="50") echo 'selected'; ?> >50000</option>
                           <option value="55" <?php if(@$result->ctc_thousand=="55") echo 'selected'; ?> >55000</option>
                           <option value="60" <?php if(@$result->ctc_thousand=="60") echo 'selected'; ?> >60000</option>
                           <option value="65" <?php if(@$result->ctc_thousand=="65") echo 'selected'; ?> >65000</option>
                           <option value="70" <?php if(@$result->ctc_thousand=="70") echo 'selected'; ?> >70000</option>
                           <option value="75" <?php if(@$result->ctc_thousand=="75") echo 'selected'; ?> >75000</option>
                           <option value="80" <?php if(@$result->ctc_thousand=="80") echo 'selected'; ?> >80000</option>
                           <option value="85" <?php if(@$result->ctc_thousand=="85") echo 'selected'; ?> >85000</option>
                           <option value="90" <?php if(@$result->ctc_thousand=="90") echo 'selected'; ?> >90000</option>
                           <option value="95" <?php if(@$result->ctc_thousand=="95") echo 'selected'; ?> >95000</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="exp_ctc" id="exp_ctc" value="<?php if(!empty($result->exp_ctc)) echo $result->exp_ctc; ?>"/>
                      </div>

                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="notice_period" id="notice_period" value="<?php if(!empty($result->notice_period)) echo $result->notice_period; ?>"/>
                      </div>
                  </div><br>








                  <div class="row">
                       <label class="col-md-3">Official / Onpaper Notice Period</label>
                       <label class="col-md-3">Alternate contact number</label>
                       <label class="col-md-3">Alternate Email ID</label>
                       <label class="col-md-3">Country</label>
                    </div>

                  <div class="row">
                      <div class="col-md-3">
                        <input type="text" class="form-control"  name="official_onpaper_notice_period" id="official_onpaper_notice_period" value="<?php if(!empty($result->official_onpaper_notice_period)) echo $result->official_onpaper_notice_period; ?>"/>
                      </div>
                      <div class="col-md-3">
                        <input type="text" class="form-control"  name="alternate_contact_number" id="alternate_contact_number" value="<?php if(!empty($result->alternate_contact_number)) echo $result->alternate_contact_number; ?>"/>
                      </div>
                      <div class="col-md-3">
                        <input type="text" class="form-control"  name="alternate_email_id" id="alternate_email_id" value="<?php if(!empty($result->alternate_email_id)) echo $result->alternate_email_id; ?>"/>
                      </div>
                      <div class="col-md-3">
                        <select class="form-control" name="country" id="country" onchange="change_country()">
                         <option value="">Select Country</option>
                          <?php foreach ($country as $val) { ?>
                            <option <?php if($val['id']==$result->country){echo 'selected';}?> value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                  </div><br>







                





                    <div class="row">
                       <label class="col-md-4">State</label>
                       <label class="col-md-4">City</label>
                       <label class="col-md-4">Preffered Location</label>
                    </div>

                  <div class="row">             

                      <div class="col-md-4">
                        <select class="form-control" name="state" id="state" onchange="change_state()" >
                         <option value="">Select State</option>
                          <?php foreach ($state as $val) { ?>
                            <option <?php if($val['id']==$result->state){echo 'selected';}?> value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <select class="form-control" name="location" id="location">
                         <option value="<?php echo $result->location; ?>"><?php echo $result->location; ?></option>
                        </select>
                      </div>

                      <div class="col-md-4">
                        <input type="text" class="form-control"  name="preffered_location" id="preffered_location" value="<?php if(!empty($result->preffered_location)) echo $result->preffered_location; ?>"/>
                      </div>

                     
                  </div><br>




                      


                  <div class="row">
                       <label class="col-md-3">Client Feedback</label>
                       <label class="col-md-3">Interview Schedule Date Time</label>
                       <label class="col-md-3">Mode of Interview</label>
                       <label class="col-md-3">Final Status</label>
                    </div>

                  <div class="row">
                      <div class="col-md-3">
                         <select class="form-control" name="client_feedback" id="client_feedback">
                           <option value="">Select Feedback</option>
                           <option value="Shortlisted" <?php if(@$result->client_feedback=="Shortlisted")  echo 'selected'; ?> >Shortlisted</option>
                           <option value="Not Shortlisted" <?php if(@$result->client_feedback=="Not Shortlisted")  echo 'selected'; ?> >Not Shortlisted</option>
                           <option value="Duplicate" <?php if(@$result->client_feedback=="Duplicate")  echo 'selected'; ?> >Duplicate</option>
                           <option value="Feedback Awaited" <?php if(@$result->client_feedback=="Feedback Awaited")  echo 'selected'; ?> >Feedback Awaited</option>
                           <option value="Hold" <?php if(@$result->client_feedback=="Hold")  echo 'selected'; ?> >Hold</option>
                         </select>

                      </div>

                      <div class="col-md-3">
                        <input id="interview_schedule" name="interview_schedule" title="interview_schedule" value="<?php 
                        if(!empty($result->interview_schedule)) { if($result->interview_schedule=="0000-00-00 00:00:00") { } else { echo $newdate = date('m/d/Y h:i a', strtotime($result->interview_schedule)); } } else { } ?>" class="form-control"/>
                      </div>

                      <div class="col-md-3">
                       <input type="text" class="form-control"  name="interview_schedule_mode" id="interview_schedule_mode" value="<?php if(!empty($result->interview_schedule_mode)) echo $result->interview_schedule_mode; ?>"/>
                      </div>

                      <div class="col-md-3">   
                        <select class="form-control" name="final_status" id="final_status" onchange="final_selection_interview_div(this)">

                           <option value="">Select Status</option>
 <option value="L1 Select" <?php if(@$result->final_status=="L1 Select")  echo 'selected'; ?> >L1 Select</option>
 <option value="L2 Select" <?php if(@$result->final_status=="L2 Select")  echo 'selected'; ?> >L2 Select</option>
 <option value="L1 Reject" <?php if(@$result->final_status=="L1 Reject")  echo 'selected'; ?> >L1 Reject</option>
 <option value="L2 Reject" <?php if(@$result->final_status=="L2 Reject")  echo 'selected'; ?> >L2 Reject</option>
 <option value="L1 Pending" <?php if(@$result->final_status=="L1 Pending")  echo 'selected'; ?> >L1 Pending</option>
 <option value="L2 Pending" <?php if(@$result->final_status=="L2 Pending")  echo 'selected'; ?> >L2 Pending</option>
 <option value="Test Submit" <?php if(@$result->final_status=="Test Submit")  echo 'selected'; ?> >Test Submit</option>
 <option value="Test Select" <?php if(@$result->final_status=="Test Select")  echo 'selected'; ?> >Test Select</option>
 <option value="Test Reject" <?php if(@$result->final_status=="Test Reject")  echo 'selected'; ?> >Test Reject</option>
 <option value="HR Reject" <?php if(@$result->final_status=="HR Reject")  echo 'selected'; ?> >HR Reject</option><!-- onclick open comment box -->
 <option value="HR Hold" <?php if(@$result->final_status=="HR Hold")  echo 'selected'; ?> >HR Hold</option><!-- onclick open comment box -->
<option value="Select" <?php if(@$result->final_status=="Select")  echo 'selected'; ?> >Select</option>
<option value="Offered" <?php if(@$result->final_status=="Offered")  echo 'selected'; ?> >Offered</option>
<option value="Offer Decline" <?php if(@$result->final_status=="Offer Decline")  echo 'selected'; ?> >Offer Decline</option>
<option value="Joined" <?php if(@$result->final_status=="Joined")  echo 'selected'; ?> >Joined</option>
<option value="Abscond" <?php if(@$result->final_status=="Abscond")  echo 'selected'; ?> >Abscond</option>
<option value="Rescheduled" <?php if(@$result->final_status=="Rescheduled")  echo 'selected'; ?> >Rescheduled</option>                    
<option value="Not Responding" <?php if(@$result->final_status=="Not Responding")  echo 'selected'; ?> >Not Responding</option>
<option value="Not Rechable" <?php if(@$result->final_status=="Not Rechable")  echo 'selected'; ?> >Not Rechable</option>
<option value="Switch Off" <?php if(@$result->final_status=="Switch Off")  echo 'selected'; ?> >Switch Off</option>
<option value="Confirm" <?php if(@$result->final_status=="Confirm")  echo 'selected'; ?> >Confirm</option>
<option value="Left within 3 months" <?php if(@$result->final_status=="Left within 3 months")  echo 'selected'; ?> >Left within 3 months</option>
<option value="Not Schedule" <?php if(@$result->final_status=="Not Schedule")  echo 'selected'; ?> >Not Schedule</option>
<option value="No Show" <?php if(@$result->final_status=="No Show")  echo 'selected'; ?> >No Show</option>
<option value="Not shared to client" <?php if(@$result->final_status=="Not shared to client")  echo 'selected'; ?> >Not shared to client</option>
<option value="Not Interested" <?php if(@$result->final_status=="Not Interested")  echo 'selected'; ?> >Not Interested</option>
<option value="Client Round Pending" <?php if(@$result->final_status=="Client Round Pending")  echo 'selected'; ?> >Client Round Pending</option>

<option value="Screening Feedback Pending" <?php if(@$result->final_status=="Screening Feedback Pending")  echo 'selected'; ?> >Screening Feedback Pending</option>
<option value="Interview Feedback Pending" <?php if(@$result->final_status=="Interview Feedback Pending")  echo 'selected'; ?> >Interview Feedback Pending</option>
                         </select>
                      </div>
                  </div><br>


                  <?php if($result->final_status=="Offered" || $result->final_status=="Offer Decline" || $result->final_status=="Joined" || $result->final_status=="Abscond") { ?>

                  <div  id="div_post_year">
                  <div class="row">
                       <label class="col-md-3">Joining Date</label>
                       <label class="col-md-3">Offered Amount</label>
                       <label class="col-md-3">Date of offer released</label>
                       <label class="col-md-3">Grade</label>
                    </div>

                  <div class="row">
                      <div class="col-md-3">
                         <input type="text" class="form-control"  name="selected_joining_date" id="selected_joining_date" value="<?php if(!empty($result->selected_joining_date)) echo $result->selected_joining_date; ?>"/>
                      </div>

                      <div class="col-md-3">
                        <input type="text" class="form-control"  name="selected_offered_amount" id="selected_offered_amount" value="<?php if(!empty($result->selected_offered_amount)) echo $result->selected_offered_amount; ?>"/>
                      </div>

                      <div class="col-md-3">
                        <input type="text" class="form-control"  name="date_of_offer_released" id="date_of_offer_released" value="<?php if(!empty($result->date_of_offer_released)) echo $result->date_of_offer_released; ?>"/>
                      </div>

                      <div class="col-md-3">
                        <input type="text" class="form-control" name="grade" id="grade" value="<?php if(!empty($result->grade)) echo $result->grade; ?>"/>
                      </div>
                  </div><br>
                </div>

              <?php }else { ?>
                <div  id="div_post_year" style="display:none">
                  <div class="row">
                       <label class="col-md-3">Joining Date</label>
                       <label class="col-md-3">Offered Amount</label>
                       <label class="col-md-3">Date of offer released</label>
                       <label class="col-md-3">Grade</label>
                    </div>

                  <div class="row">
                      <div class="col-md-3">
                         <input type="text" name="selected_joining_date" id="selected_joining_date" class="form-control">
                      </div>

                      <div class="col-md-3">
                         <input type="text" name="selected_offered_amount" id="selected_offered_amount" class="form-control">
                      </div>

                      <div class="col-md-3">
                       <input type="text" name="date_of_offer_released" id="date_of_offer_released" class="form-control">
                      </div>

                      <div class="col-md-3">
                       <input type="text" name="grade" id="grade" class="form-control">
                      </div>
                  </div><br>
                </div>
              <?php } ?>


                  <div class="row">
                       <label class="col-md-4">Client Recruiter</label>
                       <label class="col-md-4">Reason for job change/Remark</label>
                       <label class="col-md-4">Rating</label>
                    </div>

                  <div class="row">
                      <div class="col-md-4">
                         <input type="text" class="form-control"  name="client_recruiter" id="client_recruiter" value="<?php if(!empty($result->client_recruiter)) echo $result->client_recruiter; ?>"/>
                      </div>

                      <div class="col-md-4">
                       <input type="text" class="form-control"  name="reason_for_job_change" id="reason_for_job_change" value="<?php if(!empty($result->reason_for_job_change)) echo $result->reason_for_job_change; ?>"/>
                      </div>

                      <div class="col-md-4">
                        <select class="form-control" name="star_rating" id="star_rating">
                          <option value="">Select Rating</option>
                          <option value="1" <?php if(@$result->star_rating=="1")  echo 'selected'; ?> >1</option>
                          <option value="2" <?php if(@$result->star_rating=="2")  echo 'selected'; ?> >2</option>
                          <option value="3" <?php if(@$result->star_rating=="3")  echo 'selected'; ?> >3</option>
                          <option value="4" <?php if(@$result->star_rating=="4")  echo 'selected'; ?> >4</option>
                          <option value="5" <?php if(@$result->star_rating=="5")  echo 'selected'; ?> >5</option>
                        </select>
                      </div>
                  </div><br>


                  <div class="row">
                       <label class="col-md-4">Upload Resume</label> 
                       <label class="col-md-4">Select Color</label>
                    </div>

                  <div class="row">
                      
                    <div class="col-md-4">
                       <input type="file" name="userFiles" id="userFiles" class="form-control">
                       <?php if(!empty(@$result->resume)) { ?>
                        <input type="hidden" name="exists_resume" id="exists_resume" value="1">
                          <a href="<?php echo base_url().$result->resume; ?>" target="_blank"><?php $name =  explode('/', $result->resume); echo $name[3]; ?></a> 
                        <?php } else {  ?>
                          <input type="hidden" name="exists_resume" id="exists_resume" value="0">
                        <?php } ?>
                      </div>

                      <div class="col-md-4">
                        <input type="color" value="<?php if(!empty($result->color)){echo $result->color;}else{ echo "#FFFFFF";}  ?>" name="color_id" id="color_id" class="inpcol-p">
                      </div>

                  </div><br>






              

                  <div class="form-group">                        
                <input type="submit" class="btn btn-primary btn-lg pull-right" value="submit" name="submit"/>
              </div>
                    
</form>





















































                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
 

   
<?php $this->load->view('template/footer'); ?>
<script type="text/javascript" src="<?php echo base_url();?>backend/validation_js/user/edit_user.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>frontend/kendo.all.min.js"></script>
<script>
$('#date').datepicker({
    format: 'yyyy/mm/dd'
});

$("#interview_schedule").kendoDateTimePicker({                        
                    });
</script>


<script>


  $(document).ready( function() 
    {

        jQuery.validator.addMethod("notEqual", function(value, element) { 
    return this.optional(element) || value != "0000000000";
  }, "Invalid mobile number.");

          jQuery.validator.addMethod("validemailtest", function(value, element) {
    return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$/i.test(value);
  }, "Please enter a valid Email ID");


        $("#EditCandidate").validate(
        {
            errorElement: "span", 

            rules: 
            {
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
                    validemailtest:true
                },
                userFiles: 
                {
                  accept: "pdf|doc|docx"
                }
            },

            messages: 
            { 
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
                userFiles: 
                {
                  accept: "Please select only pdf|doc|docx file"
                }
            },
        });
    });

  function validateFP(){
        if($('#does_email_exists').val()==0){
           // $('#email_msg').html('<font color="red">Email does not exists</font>');
            alert('Contact No all ready exists');
            return false;
        }

        if($('#does_email_exists_email_id').val()==0){
           // $('#email_msg').html('<font color="red">Email does not exists</font>');
            alert('Email ID allready exists');
            return false;
        }
   }

   function checkIDAvailability()
    {
      var base_url = "<?php echo base_url(); ?>"
       var postURL = base_url+"recruiter/recruiter/forgot_password_email_exits";

       var contact_no = $('#contact_no').val();
       var sheetid = $('#sheetid').val();
       var bydefault_contact_no = $('#bydefault_contact_no').val();
           $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { contact_no:contact_no,client_id:sheetid,bydefault_contact_no:bydefault_contact_no},
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

                                var aaaaa = "Contact No allready added by ";
                                var bbbbb = " on dated ";
                                var ddddd = " check "

                                var eeeee =  '<a href="javascript:void(0);" onclick="getReport(\''+sheetid+','+contact_no+'\');">Profile</a>'
                                var joined = aaaaa + name + bbbbb + date + ddddd + eeeee;

                                 $('#does_email_exists').val(0);
                                 $('#email_msg').html('<font color="red">'+joined+'</font>');
                               }else{
                                   $('#does_email_exists').val(1);
                                   $('#email_msg').html('');
                               }
                            }
                    });
           
        }


   function checkIDAvailabilityEmail()
    {
      var base_url = "<?php echo base_url(); ?>"
       var postURL = base_url+"recruiter/recruiter/forgot_password_email_exits_email_id";

       var email_id = $('#email_id').val();
       var sheetid_email_id = $('#sheetid_email_id').val();
       var bydefault_email_id = $('#bydefault_email_id').val();
           $.ajax({
                            cache:false,
                            async:false,
                            type: "POST",
                            data: { email_id:email_id,client_id:sheetid_email_id,bydefault_email_id:bydefault_email_id},
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

  function final_selection_interview_div(elem)
  {
    if(elem.value == "Offered")
    {
      $('#selected_joining_date').val('');   
      $('#selected_offered_amount').val('');    
      $('#date_of_offer_released').val('');   
      $('#grade').val('');   
      $("#div_post_year").show();   
    }
    else
    {  
      $('#selected_joining_date').val('');
      $('#selected_offered_amount').val('');  
      $('#date_of_offer_released').val('');   
      $('#grade').val('');   
      $("#div_post_year").hide();   
    }    
  }

$('#selected_joining_date').datepicker({
    format: 'yyyy/mm/dd'
});

$('#date_of_offer_released').datepicker({
    format: 'yyyy/mm/dd'
});



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


</script>

<script type="text/javascript">
	
		$("#backb").on('click',function(){
			window.location = "<?php echo base_url();?>admin#recruitment_interview";
		});
	
</script>

<div class="modal fade" id="update_role_popup" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg" id="product_sub2category">       
    </div>
  </div>
