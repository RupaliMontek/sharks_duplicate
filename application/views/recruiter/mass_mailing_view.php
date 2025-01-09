<link href="<?php echo base_url();?>frontend/css/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>frontend/css/select2/select2-bootstrap.css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url();?>frontend/js/select2/select2.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

<style type="text/css">
.ppformcssp-p{
  padding: 20px 0;
}
.form-horizontal .ppformcssp-p label.control-label{
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

.mar_top_0 .btn-success{
  margin-top: 0;
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
</script>


<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box box-solid box-info">
            <form class="form-horizontal" name="mass_mailing_form" id="mass_mailing_form" action="<?php echo base_url();?>mass_mailing/search_details" method="POST">
              <br>

              <?php if(!empty($list_dailyreport)) { ?>
              <div class="row ">
                  <div class="col-md-5">
                    <div class="box-body">
                      <label class="control-label col-md-3">
                        <button type="button" class="btn btn-success" onclick="window.location='<?php echo base_url("mass_mailing");?>'">Reset Fields</button>
                      </label>
                    </div>
                  </div>
              </div>
              <?php } ?>
              <div class="row ">
                  <div class="col-md-5">
                    <div class="box-body">
                      <label class="control-label col-md-3">Skill Keyword</label> 
                      <div class="col-md-9"> 
                        <select id="prescritiopn" name="contest_type[]" class="form-control js-example-tokenizer" multiple="multiple" required="">
                          <?php if(!empty($list_contest)) { foreach($list_contest as $row) { ?>
                                <option value="<?php echo $row->position_skills; ?>" <?php if(!empty($category_tp)) { if(in_array($row->position_skills, $category_tp)) echo "selected"; } ?> ><?php  echo $row->position_skills; ?></option>
                          <?php } } ?>
                        </select> 
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="box-body">
                      <label class="control-label col-md-3">Tatal Experience </label>
                      <div class="col-md-9"> 
                      	<div class="col-md-4"> 
                          <select class="form-control" name="min_exp" id="min_exp">
<option value="">Min Exp</option> 
<option value="0" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==0) echo "selected"; } ?> >0</option>
<option value="1" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==1) echo "selected"; } ?> >1</option>
<option value="2" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==2) echo "selected"; } ?> >2</option>
<option value="3" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==3) echo "selected"; } ?> >3</option>
<option value="4" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==4) echo "selected"; } ?> >4</option>
<option value="5" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==5) echo "selected"; } ?> >5</option>
<option value="6" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==6) echo "selected"; } ?> >6</option>
<option value="7" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==7) echo "selected"; } ?> >7</option>
<option value="8" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==8) echo "selected"; } ?> >8</option>
<option value="9" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==9) echo "selected"; } ?> >9</option>
<option value="10" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==10) echo "selected"; } ?> >10</option>
<option value="11" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==11) echo "selected"; } ?> >11</option>
<option value="12" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==12) echo "selected"; } ?> >12</option>
<option value="13" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==13) echo "selected"; } ?> >13</option>
<option value="14" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==14) echo "selected"; } ?> >14</option>
<option value="15" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==15) echo "selected"; } ?> >15</option>
<option value="16" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==16) echo "selected"; } ?> >16</option>
<option value="17" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==17) echo "selected"; } ?> >17</option>
<option value="18" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==18) echo "selected"; } ?> >18</option>
<option value="19" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==19) echo "selected"; } ?> >19</option>
<option value="20" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==20) echo "selected"; } ?> >20</option>
<option value="21" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==21) echo "selected"; } ?> >21</option>
<option value="22" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==22) echo "selected"; } ?> >22</option>
<option value="23" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==23) echo "selected"; } ?> >23</option>
<option value="24" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==24) echo "selected"; } ?> >24</option>
<option value="25" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==25) echo "selected"; } ?> >25</option>
<option value="26" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==26) echo "selected"; } ?> >26</option>
<option value="27" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==27) echo "selected"; } ?> >27</option>
<option value="28" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==28) echo "selected"; } ?> >28</option>
<option value="29" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==29) echo "selected"; } ?> >29</option>
<option value="30" <?php if(!empty($selected_min_exp)) { if($selected_min_exp==30) echo "selected"; } ?> >30</option>
                          </select>
                      	</div>
                      	<div class="col-md-1"> 
                        	<b>To</b>
                      	</div>
                      	<div class="col-md-4"> 
                          <select class="form-control" name="max_exp" id="max_exp">
<option value="">Max Exp</option> 
<option value="0" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==0) echo "selected"; } ?> >0</option>
<option value="1" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==1) echo "selected"; } ?> >1</option>
<option value="2" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==2) echo "selected"; } ?> >2</option>
<option value="3" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==3) echo "selected"; } ?> >3</option>
<option value="4" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==4) echo "selected"; } ?> >4</option>
<option value="5" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==5) echo "selected"; } ?> >5</option>
<option value="6" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==6) echo "selected"; } ?> >6</option>
<option value="7" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==7) echo "selected"; } ?> >7</option>
<option value="8" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==8) echo "selected"; } ?> >8</option>
<option value="9" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==9) echo "selected"; } ?> >9</option>
<option value="10" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==10) echo "selected"; } ?> >10</option>
<option value="11" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==11) echo "selected"; } ?> >11</option>
<option value="12" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==12) echo "selected"; } ?> >12</option>
<option value="13" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==13) echo "selected"; } ?> >13</option>
<option value="14" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==14) echo "selected"; } ?> >14</option>
<option value="15" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==15) echo "selected"; } ?> >15</option>
<option value="16" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==16) echo "selected"; } ?> >16</option>
<option value="17" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==17) echo "selected"; } ?> >17</option>
<option value="18" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==18) echo "selected"; } ?> >18</option>
<option value="19" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==19) echo "selected"; } ?> >19</option>
<option value="20" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==20) echo "selected"; } ?> >20</option>
<option value="21" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==21) echo "selected"; } ?> >21</option>
<option value="22" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==22) echo "selected"; } ?> >22</option>
<option value="23" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==23) echo "selected"; } ?> >23</option>
<option value="24" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==24) echo "selected"; } ?> >24</option>
<option value="25" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==25) echo "selected"; } ?> >25</option>
<option value="26" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==26) echo "selected"; } ?> >26</option>
<option value="27" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==27) echo "selected"; } ?> >27</option>
<option value="28" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==28) echo "selected"; } ?> >28</option>
<option value="29" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==29) echo "selected"; } ?> >29</option>
<option value="30" <?php if(!empty($selected_max_exp)) { if($selected_max_exp==30) echo "selected"; } ?> >30</option>
                          </select>
                      	</div>
                      	<div class="col-md-1"> 
                        	<b>Yrs</b>
                      	</div>
                      </div>
                    </div>
                  </div>
              </div>
<br>
              <div class="row">                
                  <div class="col-md-8">
                    <div class="box-body">
                      <label class="control-label col-md-2">Annual Salary </label>
                      <div class="col-md-10"> 
                        <div class="col-md-2"> 
                          <select class="form-control" name="from_ctc" id="from_ctc" >
                           <option value="">In Lakhs</option> 
                           <option value="0" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==0) echo "selected"; } ?> >0</option>
                           <option value="1" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==1) echo "selected"; } ?> >1</option>
                           <option value="2" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==2) echo "selected"; } ?> >2</option>
                           <option value="3" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==3) echo "selected"; } ?> >3</option>
                           <option value="4" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==4) echo "selected"; } ?> >4</option>
                           <option value="5" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==5) echo "selected"; } ?> >5</option>
                           <option value="6" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==6) echo "selected"; } ?> >6</option>
                           <option value="7" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==7) echo "selected"; } ?> >7</option>
                           <option value="8" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==8) echo "selected"; } ?> >8</option>
                           <option value="9" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==9) echo "selected"; } ?> >9</option>
                           <option value="10" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==10) echo "selected"; } ?> >10</option>
                           <option value="11" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==11) echo "selected"; } ?> >11</option>
                           <option value="12" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==12) echo "selected"; } ?> >12</option>
                           <option value="13" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==13) echo "selected"; } ?> >13</option>
                           <option value="14" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==14) echo "selected"; } ?> >14</option>
                           <option value="15" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==15) echo "selected"; } ?> >15</option>
                           <option value="16" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==16) echo "selected"; } ?> >16</option>
                           <option value="17" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==17) echo "selected"; } ?> >17</option>
                           <option value="18" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==18) echo "selected"; } ?> >18</option>
                           <option value="19" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==19) echo "selected"; } ?> >19</option>
                           <option value="20" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==20) echo "selected"; } ?> >20</option>
                           <option value="21" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==21) echo "selected"; } ?> >21</option>
                           <option value="22" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==22) echo "selected"; } ?> >22</option>
                           <option value="23" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==23) echo "selected"; } ?> >23</option>
                           <option value="24" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==24) echo "selected"; } ?> >24</option>
                           <option value="25" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==25) echo "selected"; } ?> >25</option>
                           <option value="26" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==26) echo "selected"; } ?> >26</option>
                           <option value="27" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==27) echo "selected"; } ?> >27</option>
                           <option value="28" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==28) echo "selected"; } ?> >28</option>
                           <option value="29" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==29) echo "selected"; } ?> >29</option>
                           <option value="30" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==30) echo "selected"; } ?> >30</option>
                           <option value="31" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==31) echo "selected"; } ?> >31</option>
                           <option value="32" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==32) echo "selected"; } ?> >32</option>
                           <option value="33" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==33) echo "selected"; } ?> >33</option>
                           <option value="34" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==34) echo "selected"; } ?> >34</option>
                           <option value="35" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==35) echo "selected"; } ?> >35</option>
                           <option value="36" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==36) echo "selected"; } ?> >36</option>
                           <option value="37" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==37) echo "selected"; } ?> >37</option>
                           <option value="38" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==38) echo "selected"; } ?> >38</option>
                           <option value="39" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==39) echo "selected"; } ?> >39</option>
                           <option value="40" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==40) echo "selected"; } ?> >40</option>
                           <option value="41" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==41) echo "selected"; } ?> >41</option>
                           <option value="42" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==42) echo "selected"; } ?> >42</option>
                           <option value="43" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==43) echo "selected"; } ?> >43</option>
                           <option value="44" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==44) echo "selected"; } ?> >44</option>
                           <option value="45" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==45) echo "selected"; } ?> >45</option>
                           <option value="46" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==46) echo "selected"; } ?> >46</option>
                           <option value="47" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==47) echo "selected"; } ?> >47</option>
                           <option value="48" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==48) echo "selected"; } ?> >48</option>
                           <option value="49" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==49) echo "selected"; } ?> >49</option>
                           <option value="50" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==50) echo "selected"; } ?> >50</option>
                           <option value="51" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==51) echo "selected"; } ?> >51</option>
                           <option value="52" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==52) echo "selected"; } ?> >52</option>
                           <option value="53" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==53) echo "selected"; } ?> >53</option>
                           <option value="54" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==54) echo "selected"; } ?> >54</option>
                           <option value="55" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==55) echo "selected"; } ?> >55</option>
                           <option value="56" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==56) echo "selected"; } ?> >56</option>
                           <option value="57" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==57) echo "selected"; } ?> >57</option>
                           <option value="58" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==58) echo "selected"; } ?> >58</option>
                           <option value="59" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==59) echo "selected"; } ?> >59</option>
                           <option value="60" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==60) echo "selected"; } ?> >60</option>
                           <option value="61" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==61) echo "selected"; } ?> >61</option>
                           <option value="62" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==62) echo "selected"; } ?> >62</option>
                           <option value="63" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==63) echo "selected"; } ?> >63</option>
                           <option value="64" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==64) echo "selected"; } ?> >64</option>
                           <option value="65" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==65) echo "selected"; } ?> >65</option>
                           <option value="66" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==66) echo "selected"; } ?> >66</option>
                           <option value="67" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==67) echo "selected"; } ?> >67</option>
                           <option value="68" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==68) echo "selected"; } ?> >68</option>
                           <option value="69" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==69) echo "selected"; } ?> >69</option>
                           <option value="70" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==70) echo "selected"; } ?> >70</option>
                           <option value="71" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==71) echo "selected"; } ?> >71</option>
                           <option value="72" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==72) echo "selected"; } ?> >72</option>
                           <option value="73" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==73) echo "selected"; } ?> >73</option>
                           <option value="74" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==74) echo "selected"; } ?> >74</option>
                           <option value="75" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==75) echo "selected"; } ?> >75</option>
                           <option value="76" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==76) echo "selected"; } ?> >76</option>
                           <option value="77" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==77) echo "selected"; } ?> >77</option>
                           <option value="78" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==78) echo "selected"; } ?> >78</option>
                           <option value="79" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==79) echo "selected"; } ?> >79</option>
                           <option value="80" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==80) echo "selected"; } ?> >80</option>
                           <option value="81" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==81) echo "selected"; } ?> >81</option>
                           <option value="82" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==82) echo "selected"; } ?> >82</option>
                           <option value="83" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==83) echo "selected"; } ?> >83</option>
                           <option value="84" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==84) echo "selected"; } ?> >84</option>
                           <option value="85" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==85) echo "selected"; } ?> >85</option>
                           <option value="86" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==86) echo "selected"; } ?> >86</option>
                           <option value="87" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==87) echo "selected"; } ?> >87</option>
                           <option value="88" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==88) echo "selected"; } ?> >88</option>
                           <option value="89" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==89) echo "selected"; } ?> >89</option>
                           <option value="90" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==90) echo "selected"; } ?> >90</option>
                           <option value="91" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==91) echo "selected"; } ?> >91</option>
                           <option value="92" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==92) echo "selected"; } ?> >92</option>
                           <option value="93" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==93) echo "selected"; } ?> >93</option>
                           <option value="94" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==94) echo "selected"; } ?> >94</option>
                           <option value="95" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==95) echo "selected"; } ?> >95</option>
                           <option value="96" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==96) echo "selected"; } ?> >96</option>
                           <option value="97" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==97) echo "selected"; } ?> >97</option>
                           <option value="98" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==98) echo "selected"; } ?> >98</option>
                           <option value="99" <?php if(!empty($selected_from_lac)) { if($selected_from_lac==99) echo "selected"; } ?> >99</option>
                          </select>
                        </div>
                        <div class="col-md-2"> 
                          <select class="form-control" name="from_thousand" id="from_thousand">
                           <option value="">In Thousand</option>
       <option value="0" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==0) echo "selected"; } ?> >0</option>
       <option value="5000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==5000) echo "selected"; } ?> >5000</option>
       <option value="10000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==10000) echo "selected"; } ?> >10000</option>
       <option value="15000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==15000) echo "selected"; } ?> >15000</option>
       <option value="20000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==20000) echo "selected"; } ?> >20000</option>
       <option value="25000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==25000) echo "selected"; } ?> >25000</option>
       <option value="30000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==30000) echo "selected"; } ?> >30000</option>
       <option value="35000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==35000) echo "selected"; } ?> >35000</option>
       <option value="40000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==40000) echo "selected"; } ?> >40000</option>
       <option value="45000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==45000) echo "selected"; } ?> >45000</option>
       <option value="50000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==50000) echo "selected"; } ?> >50000</option>
       <option value="55000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==55000) echo "selected"; } ?> >55000</option>
       <option value="60000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==60000) echo "selected"; } ?> >60000</option>
       <option value="65000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==65000) echo "selected"; } ?> >65000</option>
       <option value="70000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==70000) echo "selected"; } ?> >70000</option>
       <option value="75000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==75000) echo "selected"; } ?> >75000</option>
       <option value="80000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==80000) echo "selected"; } ?> >80000</option>
       <option value="85000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==85000) echo "selected"; } ?> >85000</option>
       <option value="90000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==90000) echo "selected"; } ?> >90000</option>
       <option value="95000" <?php if(!empty($selected_from_thousand)) { if($selected_from_thousand==95000) echo "selected"; } ?> >95000</option>
                          </select>
                        </div>
                        <div class="col-md-1"> 
                          <b>To</b>
                        </div>
                        <div class="col-md-2"> 
                          <select class="form-control" name="to_ctc" id="to_ctc">
                           <option value="">In Lakhs</option>  
                           <option value="0" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==0) echo "selected"; } ?> >0</option>
                           <option value="1" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==1) echo "selected"; } ?> >1</option>
                           <option value="2" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==2) echo "selected"; } ?> >2</option>
                           <option value="3" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==3) echo "selected"; } ?> >3</option>
                           <option value="4" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==4) echo "selected"; } ?> >4</option>
                           <option value="5" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==5) echo "selected"; } ?> >5</option>
                           <option value="6" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==6) echo "selected"; } ?> >6</option>
                           <option value="7" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==7) echo "selected"; } ?> >7</option>
                           <option value="8" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==8) echo "selected"; } ?> >8</option>
                           <option value="9" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==9) echo "selected"; } ?> >9</option>
                           <option value="10" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==10) echo "selected"; } ?> >10</option>
                           <option value="11" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==11) echo "selected"; } ?> >11</option>
                           <option value="12" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==12) echo "selected"; } ?> >12</option>
                           <option value="13" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==13) echo "selected"; } ?> >13</option>
                           <option value="14" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==14) echo "selected"; } ?> >14</option>
                           <option value="15" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==15) echo "selected"; } ?> >15</option>
                           <option value="16" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==16) echo "selected"; } ?> >16</option>
                           <option value="17" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==17) echo "selected"; } ?> >17</option>
                           <option value="18" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==18) echo "selected"; } ?> >18</option>
                           <option value="19" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==19) echo "selected"; } ?> >19</option>
                           <option value="20" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==20) echo "selected"; } ?> >20</option>
                           <option value="21" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==21) echo "selected"; } ?> >21</option>
                           <option value="22" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==22) echo "selected"; } ?> >22</option>
                           <option value="23" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==23) echo "selected"; } ?> >23</option>
                           <option value="24" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==24) echo "selected"; } ?> >24</option>
                           <option value="25" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==25) echo "selected"; } ?> >25</option>
                           <option value="26" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==26) echo "selected"; } ?> >26</option>
                           <option value="27" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==27) echo "selected"; } ?> >27</option>
                           <option value="28" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==28) echo "selected"; } ?> >28</option>
                           <option value="29" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==29) echo "selected"; } ?> >29</option>
                           <option value="30" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==30) echo "selected"; } ?> >30</option>
                           <option value="31" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==31) echo "selected"; } ?> >31</option>
                           <option value="32" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==32) echo "selected"; } ?> >32</option>
                           <option value="33" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==33) echo "selected"; } ?> >33</option>
                           <option value="34" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==34) echo "selected"; } ?> >34</option>
                           <option value="35" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==35) echo "selected"; } ?> >35</option>
                           <option value="36" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==36) echo "selected"; } ?> >36</option>
                           <option value="37" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==37) echo "selected"; } ?> >37</option>
                           <option value="38" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==38) echo "selected"; } ?> >38</option>
                           <option value="39" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==39) echo "selected"; } ?> >39</option>
                           <option value="40" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==40) echo "selected"; } ?> >40</option>
                           <option value="41" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==41) echo "selected"; } ?> >41</option>
                           <option value="42" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==42) echo "selected"; } ?> >42</option>
                           <option value="43" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==43) echo "selected"; } ?> >43</option>
                           <option value="44" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==44) echo "selected"; } ?> >44</option>
                           <option value="45" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==45) echo "selected"; } ?> >45</option>
                           <option value="46" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==46) echo "selected"; } ?> >46</option>
                           <option value="47" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==47) echo "selected"; } ?> >47</option>
                           <option value="48" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==48) echo "selected"; } ?> >48</option>
                           <option value="49" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==49) echo "selected"; } ?> >49</option>
                           <option value="50" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==50) echo "selected"; } ?> >50</option>
                           <option value="51" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==51) echo "selected"; } ?> >51</option>
                           <option value="52" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==52) echo "selected"; } ?> >52</option>
                           <option value="53" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==53) echo "selected"; } ?> >53</option>
                           <option value="54" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==54) echo "selected"; } ?> >54</option>
                           <option value="55" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==55) echo "selected"; } ?> >55</option>
                           <option value="56" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==56) echo "selected"; } ?> >56</option>
                           <option value="57" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==57) echo "selected"; } ?> >57</option>
                           <option value="58" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==58) echo "selected"; } ?> >58</option>
                           <option value="59" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==59) echo "selected"; } ?> >59</option>
                           <option value="60" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==60) echo "selected"; } ?> >60</option>
                           <option value="61" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==61) echo "selected"; } ?> >61</option>
                           <option value="62" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==62) echo "selected"; } ?> >62</option>
                           <option value="63" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==63) echo "selected"; } ?> >63</option>
                           <option value="64" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==64) echo "selected"; } ?> >64</option>
                           <option value="65" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==65) echo "selected"; } ?> >65</option>
                           <option value="66" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==66) echo "selected"; } ?> >66</option>
                           <option value="67" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==67) echo "selected"; } ?> >67</option>
                           <option value="68" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==68) echo "selected"; } ?> >68</option>
                           <option value="69" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==69) echo "selected"; } ?> >69</option>
                           <option value="70" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==70) echo "selected"; } ?> >70</option>
                           <option value="71" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==71) echo "selected"; } ?> >71</option>
                           <option value="72" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==72) echo "selected"; } ?> >72</option>
                           <option value="73" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==73) echo "selected"; } ?> >73</option>
                           <option value="74" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==74) echo "selected"; } ?> >74</option>
                           <option value="75" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==75) echo "selected"; } ?> >75</option>
                           <option value="76" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==76) echo "selected"; } ?> >76</option>
                           <option value="77" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==77) echo "selected"; } ?> >77</option>
                           <option value="78" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==78) echo "selected"; } ?> >78</option>
                           <option value="79" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==79) echo "selected"; } ?> >79</option>
                           <option value="80" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==80) echo "selected"; } ?> >80</option>
                           <option value="81" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==81) echo "selected"; } ?> >81</option>
                           <option value="82" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==82) echo "selected"; } ?> >82</option>
                           <option value="83" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==83) echo "selected"; } ?> >83</option>
                           <option value="84" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==84) echo "selected"; } ?> >84</option>
                           <option value="85" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==85) echo "selected"; } ?> >85</option>
                           <option value="86" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==86) echo "selected"; } ?> >86</option>
                           <option value="87" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==87) echo "selected"; } ?> >87</option>
                           <option value="88" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==88) echo "selected"; } ?> >88</option>
                           <option value="89" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==89) echo "selected"; } ?> >89</option>
                           <option value="90" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==90) echo "selected"; } ?> >90</option>
                           <option value="91" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==91) echo "selected"; } ?> >91</option>
                           <option value="92" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==92) echo "selected"; } ?> >92</option>
                           <option value="93" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==93) echo "selected"; } ?> >93</option>
                           <option value="94" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==94) echo "selected"; } ?> >94</option>
                           <option value="95" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==95) echo "selected"; } ?> >95</option>
                           <option value="96" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==96) echo "selected"; } ?> >96</option>
                           <option value="97" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==97) echo "selected"; } ?> >97</option>
                           <option value="98" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==98) echo "selected"; } ?> >98</option>
                           <option value="99" <?php if(!empty($selected_to_lac)) { if($selected_to_lac==99) echo "selected"; } ?> >99</option>
                          </select>
                        </div>
                        <div class="col-md-2"> 
                          <select class="form-control" name="to_thousand" id="to_thousand">
                           <option value="">In Thousand</option>
       <option value="0" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==0) echo "selected"; } ?> >0</option>
       <option value="5000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==5000) echo "selected"; } ?> >5000</option>
       <option value="10000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==10000) echo "selected"; } ?> >10000</option>
       <option value="15000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==15000) echo "selected"; } ?> >15000</option>
       <option value="20000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==20000) echo "selected"; } ?> >20000</option>
       <option value="25000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==25000) echo "selected"; } ?> >25000</option>
       <option value="30000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==30000) echo "selected"; } ?> >30000</option>
       <option value="35000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==35000) echo "selected"; } ?> >35000</option>
       <option value="40000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==40000) echo "selected"; } ?> >40000</option>
       <option value="45000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==45000) echo "selected"; } ?> >45000</option>
       <option value="50000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==50000) echo "selected"; } ?> >50000</option>
       <option value="55000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==55000) echo "selected"; } ?> >55000</option>
       <option value="60000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==60000) echo "selected"; } ?> >60000</option>
       <option value="65000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==65000) echo "selected"; } ?> >65000</option>
       <option value="70000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==70000) echo "selected"; } ?> >70000</option>
       <option value="75000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==75000) echo "selected"; } ?> >75000</option>
       <option value="80000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==80000) echo "selected"; } ?> >80000</option>
       <option value="85000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==85000) echo "selected"; } ?> >85000</option>
       <option value="90000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==90000) echo "selected"; } ?> >90000</option>
       <option value="95000" <?php if(!empty($selected_to_thousand)) { if($selected_to_thousand==95000) echo "selected"; } ?> >95000</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                 <div class="col-md-4">
                    <div class="box-body">
                      <label class="control-label col-md-2">Location</label> 
                      <div class="col-md-6"> 
<select id="location_wise" name="location_wise" class="form-control">
        <option value="">Select Location</option>
          <?php foreach($list_city as $row) { if(!empty($row->location)) { ?>
            <option <?php if($row->location==@$selected_location){echo 'selected';}?> value="<?php echo $row->location;?>"><?php echo $row->location;?></option>
          <?php } } ?>
</select> 
                      </div>
                    </div>
                  </div> 
              </div>
<br>
              <div class="row ">
                <div class="col-md-3">
                  <div class="box-body">
                    <div class="col-md-4">
                      <input type="submit" class="btn btn-success" value="Search" name="Search" /> 
                    </div>
                  </div>
                </div>  
              </div>      
            </form>                
            <div class="box-body">
              <?php if($this->session->flashdata('success') != '') { ?>
                <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
              </div>
              <?php } ?>
              <?php if($this->session->flashdata('error') != '') {?>
                <div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>
              </div>
              <?php } ?>
              <?php if($this->session->flashdata('errorss') != '') {?>
                <div class="alert alert-success" id="successMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('errorss'); ?>
                <button type="button" class="close" id="btn-alert-success" onclick="closeSuccess2()" >&times;</button>
              </div>
              <?php } ?>
              <?php if($this->session->flashdata('erroraa') != '') {?>
                <div class="alert alert-danger" id="errorMessage2"><i class="fa fa-check-circle"></i> <?php echo $this->session->flashdata('erroraa'); ?>
                <button type="button" class="close" id="btn-alert-success" onclick="closeError2()" >&times;</button>
              </div>
              <?php } ?>

<?php $attributes = array('role' => 'form', 'id' => 'addAcademicYear');
echo form_open_multipart('mass_mailing/send_email', $attributes);
?>
<?php if(!empty($list_dailyreport)) { ?>
  <table id="example1" class="table table-bordered table-striped ppheighttab-p">
    <thead>
      <tr>
        <th><input type="checkbox" id="checkAl"> Select All</th>
        <th>Sr.No</th>
        <th>Date</th>
        <th>Company/Client</th>
        <th>CandidateName</th>                      
        <th>Position/Skills</th>
        <th>RP_ID</th>
        <th>ApplicantID</th>
        <th>Role</th>
        <th>Qualification</th>
        <th>CompanyName</th>
        <th>YrsOfExperience</th>
        <th>RelevantExp</th>
        <th>CTC</th>
        <th>ExpCTC</th>
        <th>NoticePeriod</th>
        <th>Official/onpaperNoticePeriod</th>
        <th>ContactNo</th>
        <th>AlternateContactNumber</th>
        <th>EmailID</th>
        <th>AlternateEmailID</th>
        <th>CurrentLocation</th>
        <th>PrefferedLocation</th>
        <th>ClientFeedback</th>
        <th>InterviewScheduleDateTime</th>
        <th>InterviewScheduleMode</th>
        <th>FinalStatus</th>
        <th>ClientRecruiter</th>
        <th>SourcedBy</th>
        <th>ReasonForJobChange</th>
        <th>Rating</th>
        <th>Resume</th>
      </tr>
    </thead>

    <tbody>
      <?php

      if(!empty($list_dailyreport))
      {
        $Srno=1;
        foreach($list_dailyreport as $row)
        {
            ?>
            <tr>
              <td>
                <input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row['email_id'];?>">
                <!-- <input type="checkbox" hidden id="checkItem_no" name="check_no[]" value="<?php //echo $row['contact_no'];?>"></td> -->
        <td> <?php echo $Srno; $Srno++; ?> </td>
<td><?php echo $row['date']; ?></td>
 <td><?php echo $row['company_client']; ?></td>
<td style="background-color:<?php echo @$row['color'];?>"><?php echo $row['candidate_name'];?></td>
<td><?php echo $row['position_skills'];?></td>
<td><?php echo $row['rp_id'];?></td>
<td><?php echo $row['applicant_id'];?></td>
<td><?php echo $row['role'];?></td>
<td><?php echo $row['qulification'];?></td>
<td><?php echo $row['company_name'];?></td>
<td><?php if(!empty($row['months_of_experience'])){ echo $row['yrs_of_experience'].".".$row['months_of_experience']; }else{ echo $row['yrs_of_experience']; } ?></td>
<td><?php echo $row['relevant_exp'];?></td>
<td><?php if(!empty($row['ctc_thousand'])){ echo $row['ctc'].".".$row['ctc_thousand']; }else{ echo $row['ctc']; } ?></td>
<td><?php echo $row['exp_ctc'];?></td>
<td><?php echo $row['notice_period'];?></td>
<td><?php echo $row['official_onpaper_notice_period'];?></td>
<td><?php echo $row['contact_no'];?></td>
<td><?php echo $row['alternate_contact_number'];?></td>
<td><?php echo $row['email_id'];?></td>
<td><?php echo $row['alternate_email_id'];?></td>
<td><?php echo $row['location'];?></td>
<td><?php echo $row['preffered_location'];?></td>
<td><?php echo $row['client_feedback'];?></td>
<td><?php if($row['interview_schedule']=="0000-00-00 00:00:00") { echo ""; } else { echo $row['interview_schedule']; } ?></td>
<td><?php echo $row['interview_schedule_mode'];?></td>
<td><?php echo $row['final_status']; if($row['final_status']=="HR Reject" || $row['final_status']=="HR Hold") { echo " ( ".@$row['hr_reason']." )"; } ?></td>
<td><?php echo $row['client_recruiter'];?></td>
<td><?php echo $row['sourced_by'];?></td>
<td><?php echo $row['reason_for_job_change'];?></td>
<td><?php echo $row['star_rating'];?></td>
<td><a href="<?php echo base_url();?><?php echo $row['resume'];?>" target="_blank"><?php @$name =  explode('/', @$row['resume']); echo @$name[3]; ?></a></td>
            </tr>
      <?php } } ?>
    </tbody>
  </table>
<?php } ?>
<?php if(!empty($list_dailyreport)){ ?>
  <p>
    <button type="submit" class="btn btn-success" name="save" value="save">Send Mail</button>&nbsp;&nbsp;&nbsp; 
    <!-- <button type="submit" class="btn btn-success" name="save_no" value="save_no">Send Message</button> -->
  </p>
<?php } else { ?>
<?php } ?>
<?php echo form_close(); ?>        

</div><!-- /.box-body -->
</div><!-- /.box -->

</div><!-- /.col -->
</div><!-- /.row -->
</div>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
$(".js-example-tokenizer").select2({
  tags: true,
  tokenSeparators: [',', ' ']
})
</script>

<?php $this->load->view('template/footer'); ?>
<script type="text/javascript" src="<?php echo base_url();?>frontend/kendo.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 

<script type="text/javascript">

            $(document).ready(function() {
    var table = $('#example1').DataTable( {
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            leftColumns: 5,
        }
    } );
} );

</script>



<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>