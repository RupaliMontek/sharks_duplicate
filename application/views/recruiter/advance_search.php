<link href="<?php echo base_url();?>frontend/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>frontend/select2/select2-bootstrap.css" rel="stylesheet" />
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
            <h3 class="box-title">Advanced Search</h3>
          </div>
          <div class="box-body" id="advance-colr">
           <form method="post" class="advance_form" action="<?=base_url('recruiter/recruiter/advance_search_result')?>">
             <div class="form-row">
              <div class="row">
                <label class="form-group col-md-2">Keywords</label>
                <div class="form-group col-md-5">
                  <input type="text" class="form-control" autocomplete="off" placeholder="Enter keywords like skills, designation and company" name="any_keywords" id="any_keywords">
                    <!--<select id="any_keywords" name="any_keywords[]" class="form-control js-example-tokenizer" multiple="multiple">       
                            <?php 
                              if(!empty($keywords))
                              {
                                foreach($keywords as $row)
                                {
                                  ?>
                                  <option value="<?php  echo $row->position_skills; ?>"><?php  echo $row->position_skills; ?></option>
                                  <?php
                                }
                              }
                            ?>
                          </select>-->
                          <p>Turn Boolean On</p>
                        </div>
                      </div>
                 <!--     <div class="row">
                        <label class="form-group col-md-2">All Keywords (must have)</label>
                        <div class="form-group col-md-5">
                          <input type="text" class="form-control" autocomplete="off" placeholder="mandatory skills, designation roll separated by comma" name="must_keywords" id="must_keywords">
                            <?php 
                              if(!empty($keywords))
                              {
                                foreach($keywords as $row)
                                {
                                  ?>
                                  <option value="<?php  echo $row->position_skills; ?>"><?php  echo $row->position_skills; ?></option>
                                  <?php
                                }
                              }
                            ?>
                         
                        </div>
                      </div>-->
                      <div class="row">
                        <label class="form-group col-md-2">Excluding Keywords</label>
                        <div class="form-group col-md-5">
                          <input type="text" class="form-control " autocomplete="off" placeholder="Enter keywords like skills, designation and company" name="excluding_keywords" id="excluding_keywords">
                    <!--<select id="excluding_keywords" name="excluding_keywords[]" class="form-control js-example-tokenizer" multiple="multiple">       
                            <?php 
                              if(!empty($keywords))
                              {
                                foreach($keywords as $row)
                                {
                                  ?>
                                  <option value="<?php  echo $row->position_skills; ?>"><?php  echo $row->position_skills; ?></option>
                                  <?php
                                }
                              }
                            ?>
                          </select>-->
                        </div>  
                      </div>
                      <div class="row">
                        <label class="form-group col-md-2">Search in </label>
                        <!--<a class=" dropdown-toggle" type="button" data-toggle="dropdown">-->
                          <!--<span class="caret"></span></a>-->
                          <div class="form-group col-md-5">
                            <select class="form-control">
                              <option><a href="#">Entire Resume</a></option>
                              <option><a href="#">Resume Title</a></option>
                              <option><a href="#">Resume Title & Key Skills</a></option>
                              <option><a href="#">Resume Synopsis</a></option>
                              <option><a href="#">Entire Resume</a></option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <label class="form-group col-md-2">Total Experience</label>
                          <div class="form-group col-md-2">
                              <select name="total_experience_from" id="total_experience_from" class="form-control">
                                  <option value="">From</option>
                        <?php  for($i=0; $i<=30; $i++){ ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                                </select> 
                          </div>
                          <label class="form-group col-md-1">To</label>
                          <div class="form-group col-md-2">
                              <select name="total_experience_to" id="total_experience_to" class="form-control">
                                  <option value="">To</option>
                        <?php  for($i=0; $i<=50; $i++){ ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                                </select>
                          </div>
                          <label class="form-group col-md-2">In Years</label>
                        </div>

                        <!--<div class="row">-->
                          <!--<label class="form-group col-md-3">Anual Salary</label>-->
                          <!--<div class="form-group col-md-2">-->
                            <!--    <input type="text" name="anual_salary_from_lacs" id="anual_salary_from_lacs" class="form-control" placeholder="Min">-->
                            <!--</div>-->
                            <!--<label class="form-group col-md-1">To</label>-->
                            <!--<div class="form-group col-md-2">-->
                              <!--     <input type="text" name="anual_salary_to_lacs" id="anual_salary_to_lacs" class="form-control"  placeholder="Max">-->
                              <!--</div>-->
                              <!--<label class="form-group col-md-2">In INR</label>-->
                              <!--</div>-->
                              <input type="hidden" id="include_company" name="include_company"> 
                              <input type="hidden" id="exclude_company" name="exclude_company"> 

                         <div class="row">
                                <label class="form-group col-md-2">Anual Salary</label>
                                <!--<div class="form-group col-md-2">
                                  <select name="anual_salary_from_lacs" id="anual_salary_from_lacs" class="form-control">
                                    <option value="">Rs</option>
                                    <option>Lac</option>
                                    <option>Thousand</option>
                                  </select>
                                </div>-->
                                <div class="form-group col-md-2">
                                  <select name="anual_salary_from_lacs" id="anual_salary_from_lacs" class="form-control" >
                                    <option value="">From Ctc</option>
                                  </select>
                                </div>

                                <div class="form-group col-md-2">
                                  <!--<input type="text" name="anual_salary_from_thousands" id="anual_salary_from_thousands" class="form-control" required="">-->
                                  <select name="anual_salary_from_thousands" id="anual_salary_from_thousands" class="form-control" >
                                    <option value="">To Ctc</option>
                            
                                  </select>
                                </div>
                           <!--     <label class="form-group col-md-1">To</label>
                                <div class="form-group col-md-2">
                                  <select name="anual_salary_to_lacs" id="anual_salary_to_lacs" class="form-control" >
                                    <option value="">Lacs</option>
                            <?php  for($i=0; $i<=30; $i++){ ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                                  </select>
                                </div>-->
                   <!--             <div class="form-group col-md-1">
                                 <select name="anual_salary_to_thousand" id="anual_salary_to_thousand" class="form-control">
                                  <option value="">Thousand</option>
                        <?php  for($i=0; $i<=30; $i++){ ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                                </select>
                              </div>-->
                            </div>
                            <div class="row">
                              <label class="form-group col-md-2">Current Location</label>
                              <div class="form-group col-md-5">
                                <!-- <input type="text" name="current_location" id="current_location" placeholder="Type or select location from list" class="form-control"> -->
                                <select id="current_location" name="current_location" class="form-control js-example-tokenizer">       
                                  <?php 
                                  if(!empty($location))
                                  {
                                    foreach($location as $row)
                                    {
                                      ?>
                                      <option value="<?php  echo $row->location; ?>"><?php  echo $row->location; ?></option>
                                      <?php
                                    }
                                  }
                                  ?>
                                </select>
                          <!--  <select name="current_location" id="current_location" class="form-control" required="">-->
                            <!--<option value="">Preferred Location</option>-->
                            <!-- <option value="checkbox">Any</option>-->
                            <!--<option>Anywhere in India</option>-->
                            <!--<option>Anywhere in North India</option>-->
                            <!--<option>Anywhere in South India</option>-->
                            <!--  </select>-->
                        </div>
                          <!--<label class="form-group col-md-3">Preferred Location</label>-->
                        </div>
                        <div class="row">
                              <div class="col-md-2">
                            </div>
                            <div class="col-md-2"> 
                                <input type="hidden" name="prefered_location_check">
                                <input type="checkbox" name="prefered_location_check" id="prefered_location_check">
                                Preferred Location 
                               <!-- is same as above 
                               <span class="caret"></span></a>
                               <ul class="dropdown-menu">
                                <li><a href="#">Same as Above</a></li>
                                <li><a href="#">Mentioned Below</a></li>
                              </ul> -->
                            </div>
                            <div class="col-md-3">
                              <select name="prefered_location_select" id="prefered_location_select" class="form-control">
                                <option value="0">Same as Above</option>
                                <option value="1">Mentioned Below</option>
                              </select>
                            </div>
                          </div>
                          <br>
                        <div class="row">
                          <div class="form-group col-md-2">
                          </div>
                          <div class="form-group col-md-5">
                          <!-- <input type="text" name="prefered_location" id="prefered_location" class="form-control" required=""> -->
                          <select id="prefered_location" name="prefered_location" class="form-control js-example-tokenizer">       
                          <?php 
                            if(!empty($location))
                            {
                              foreach($location as $row)
                              {
                                ?>
                                <option value="<?php  echo $row->location; ?>"><?php  echo $row->location; ?></option>
                                <?php
                              }
                            }
                          ?>
                          </select>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-info">Search</button>
                    </form>
                  </div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section>

    </div>
    <?php $this->load->view('template/footer'); ?>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">-->
  <script type="text/javascript" src="<?php echo base_url();?>frontend/select2/select2.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function(){
      $("#prefered_location_select").hide();
      $("#prefered_location").hide();
    });
    $("#prefered_location_check").change(function(){
        if(this.checked) {
          $("#prefered_location_select").slideDown(); 
        }
        else
        {
          $("#prefered_location_select").slideUp(); 
        }
    });
    $("#prefered_location_select").change(function(){
        if($(this).val()==1) {
          $("#prefered_location").show(); 
        }
        else
        {
          $("#prefered_location").hide(); 
        }
    });
  </script>
  <script type="text/javascript">
    $(".js-example-tokenizer").select2({
      tags: true,
    })

  </script>