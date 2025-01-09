

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
            <section class=" content content_nakuri">
          <div class="row">
            <div class="col-xs-12">

             <div class="box ">
             <div class="box box_updated box-solid box-primary">
                   <div class="box-header with-border">
                            <h3 class="box-title">Advanced Search Result</h3>
                            </div>
                <div class="box-body" id="advance-colr">
                    <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                         <div class="premOpts"> 
                         <p class="clFx chk"> <a id="premCand" href="javascript:void(0)" class="customChk fl"><input name="isPremiumCand" type="checkbox" value="1" id="pCandInp"></a> <label for="pCandInp">Premium Institute Candidates <i> </i></label> <a href="javascript:void(0)" class="tip tipIcon" tooltip="tip_110"></a> </p> </div> 
                          </div>
                      <div class="col-md-8">
                                <div class="row form-group col-md-3">
                                <select name="client_id_by_userid" id="client_id_by_userid" class="select-form1" required="">
                                  <option value="">Hide Profiles</option>
                                  <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                 </select>
                                </div>
                                <div class="row form-group col-md-4">
                                    <label class="form-group srpLbl">Active In</label>
                                   <select name="client_id_by_userid" id="client_id_by_userid" class="select-form1" required="">
                                  <option value="">6 months</option>
                                   <option>3 months</option>
                                  <option>4  months</option>
                                  <option>5 months</option>
                                  <option>6 months</option>
                                    </select>
                                </div>
                              <div class=" row form-group col-md-3">
                            <label class="form-group srpLbl">Show</label>
                              <select id="per_page" class="select-form1" required="">
                               <option>30</option>
                              <option>50</option>
                              <option>100</option>
                              <option>500</option>
                            </select>
                            </div>
                      </div>
                      </div>
                      </div>
                      <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                 Keywords
                                  <span> </span>
                                </a>
                              </h4>
                            </div>
                            <form action="<?=base_url('recruiter/recruiter/advance_search_result')?>" method="POST">
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">
                                    <input type="text" name="must_keywords" id="must_keywords" value="" maxlength="500" placeholder="Search Keywords">
                                    <!--<select id="must_keywords" name="must_keywords[]" class="form-control js-example-tokenizer" multiple="multiple">       
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
                                    <div class="panel-heading" role="tab" id="headingOneOne">
                                      <h4 class="panel-title">
                                        <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseOneOne" aria-expanded="false" aria-controls="collapseOneOne">
                                         Exclude Keywords
                                          <span> </span>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseOneOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOneOne">
                                      <div class="panel-body">
                                          <input type="text" name="excluding_keywords" id="excluding_keywords" value="" maxlength="500" placeholder=" Exclude Keywords">
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
                                          <input type="hidden" name="total_experience_from" value="<?=$total_experience_from?>"/>
                                          <input type="hidden" name="total_experience_to" value="<?=$total_experience_to?>"/>
                                          <input type="hidden" name="anual_salary_from_lacs" value="<?=$anual_salary_from_lacs?>"/>
                                          <input type="hidden" name="anual_salary_to_lacs" value="<?=$anual_salary_to_lacs?>"/>
                                          <input type="hidden" name="current_location" value="<?=$current_location?>"/>
                                          <input type="hidden" name="prefered_location" value="<?=$prefered_location?>"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                      <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                         Company
                                         <span></span>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                      <div class="panel-body">
                                      <input type="text" name="include_company" id="include_company" value="" maxlength="500" placeholder="Search Company">
                                      <!--<select id="include_company" name="include_company[]" class="form-control js-example-tokenizer" multiple="multiple">       
                                        <?php 
                                          if(!empty($company_name))
                                          {
                                            foreach($company_name as $row)
                                            {
                                              ?>
                                              <option value="<?php  echo $row->company_name; ?>"><?php  echo $row->company_name; ?></option>
                                              <?php
                                            }
                                          }
                                        ?>
                                      </select>-->
                                        <div class="panel-heading" role="tab" id="headingOneOne">
                                      <h4 class="panel-title">
                                        <a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwoOne" aria-expanded="false" aria-controls="collapseOneOne">
                                         Exclude Company
                                          <span> </span>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseTwoOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                      <div class="panel-body">
                                          <!--<select id="exclude_company" name="exclude_company[]" class="form-control js-example-tokenizer" multiple="multiple">       
                                            <?php 
                                              if(!empty($company_name))
                                              {
                                                foreach($company_name as $row)
                                                {
                                                  ?>
                                                  <option value="<?php  echo $row->company_name; ?>"><?php  echo $row->company_name; ?></option>
                                                  <?php
                                                }
                                              }
                                            ?>
                                          </select>-->
                                          <input type="text" name="exclude_company" id="exclude_company" value="" maxlength="500" placeholder=" Exclude Company">
                                      </div>
                                    </div>
                                      </div>
                                    </div>
                                  </div>
                                  </form>
                                  
                                 <!--<div class="panel panel-default">-->
                                 <!--   <div class="panel-heading" role="tab" id="headingThree">-->
                                 <!--     <h4 class="panel-title">-->
                                 <!--       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
                                         
                                 <!--         <span></span>-->
                                 <!--       </a>-->
                                 <!--     </h4>-->
                                 <!--   </div>-->
                                 <!--   <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">-->
                                 <!--     <div class="panel-body">-->
                                      
                                 <!--     </div>-->
                                 <!--   </div>-->
                                 <!-- </div>-->
                            </div>
                             <button type="submit" class="btn btn-info">Search</button>
                            </div>
                  
                    
                    
                           <div class="col-md-8">
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
                                <div class="" id="myprofile">
                                 <div class="row">
                                 <div class="col-md-8 tuple">
                                     <h1> <input type="checkbox" class="checkBoxClass" name="candidate_emails[]" value="<?=$row->email_id?>"><?=$row->candidate_name?> Swaranjali</h1>
                                       
                                    <!-- <div class="mtxt">-->
                                    <!--     <span class="exp"><?php if($row->yrs_of_experience!=0 && $row->months_of_experience!=0 ){echo "Experienced";}else{echo "Fresher";}?></span>-->
                                    <!--     <span class="loc"><?=$row->location?></span>-->
                                    <!--</div>-->
                                         
                                    <div class="edu-details">
                                         <div class="row">
                                        <div class="col-md-3">
                                            <p><i class="fa fa-suitcase" aria-hidden="true"></i> 3yr 2m </p>
                                        </div>
                                        <div class="col-md-3">
                                             <p><i class="fa fa-rupee"></i> Rs 3.75lacs</p>
                                        </div>
                                        <div class="col-md-3">
                                             <p><i class="fa fa-map-marker" aria-hidden="true"></i> Mumbai</p>
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-md-3">    
                                        <p>Current : </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>Java J2EE java full stack developer at cognizent</p>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Previous :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>Java J2EE java full stack developer at cognizent</p>
                                        </div>
                                        </div>
                                         <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Education :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>MCA Sinhgad College Pune, 2015</p>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Pref Loc :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>Banglore, Pune, Mumbai</p>
                                        </div>
                                        </div>
                                         <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Key Skill :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p>Html, css, java script, bootstrap, php <a style="color:blue"> more </a></p>
                                        </div>
                                        </div>
                                        
                                    </div>    
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-image">
                                    <img src="https://msuite.work/uploads/user_profile_pictures/1/man3.png" class="avatar" alt="User Image">
                                    <p>I am Java full stack developer</p>
                                    <button onclick="myFunction()"><i class="fa fa-phone" aria-hidden="true"></i> Show phone No</button>
                                    <p><i class="fa fa-check" aria-hidden="true"></i> Verified phone + Email</p>
                                    <div id="myDIV"> 9966554433</div>
                                     </div>
                                    <!--<span class="show-no"><?=$row->contact_no?></span>-->
                                    <!--<img src="avatar.png" alt="Avatar" class="avatar">-->
                                    
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
                            <?=$links;?>
                            <!--<label> <input type="checkbox" id="sel_all" >Select All</label>-->
                            <form action="<?=base_url('recruiter/recruiter/send_mail_candidate')?>" method="POST" id="send_job_candidate">
<!--                        <?php foreach ($fiter as $row):?>
                             <div class="" id="myprofile">
                                 <div class="row">
                                 <div class="col-md-8 tuple">
                                     <label> <input type="checkbox" class="checkBoxClass" name="candidate_emails[]" value="<?=$row->email_id?>"><?=$row->candidate_name?></label>
                                     <div class="mtxt">
                                         <span class="exp"><?php if($row->yrs_of_experience!=0 && $row->months_of_experience!=0 ){echo "Experienced";}else{echo "Fresher";}?></span>
                                         <span class="loc"><?=$row->location?></span>
                                    </div>
                                    <div class="edu-details">
                                        <div class="row">
                                        <div class="col-md-3">    
                                        <p>Education : </p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?=$row->qulification?></p>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Pref Loc :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p> <?=$row->preffered_location?></p>
                                        </div>
                                        </div>
                                         <div class="row">
                                        <div class="col-md-3"> 
                                        <p>Key Skills :</p>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?=$row->position_skills?></p>
                                        </div>
                                        </div>
                                        
                                    </div>    
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="profile-image">
                                    <img src="https://msuite.work/uploads/user_profile_pictures/1/man3.png" class="avatar" alt="User Image">
                                    
                                    </div>
                                    <span class="show-no"><?=$row->contact_no?></span>
                                    <img src="avatar.png" alt="Avatar" class="avatar">
                                    
                                </div>
                                </div>
                             </div>
                             <?php endforeach;?>-->
                             </form>
                             </div>
                        </div>
                            
                    </div>
                    </div>
                </div>
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
         
        </div>
<?php $this->load->view('template/footer'); ?>

 

<script type="text/javascript">
$(document).ready(function(){
  var table = $('#example1').DataTable({
    scrollY:        "500px",
    scrollX:        true,
    scrollCollapse: true,
    paging:         true,
    fixedColumns:   {
      leftColumns: 4,
    }
  });
  
   pagination_num(30);
});

$("#per_page").change(function(){
    var per_page=$(this).val();
    pagination_num(per_page);
})

function pagination_num(per_page)
{
    $("#tab").pagination({
   items: per_page,
   contents: 'contents',
   previous: 'Previous',
   next: 'Next',
   position: 'top',
   });
}
</script>

<script>
    $("#sel_all").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
});
$("#send_email").click(function () {
    $("#send_job_candidate").submit();
});
</script>
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

<script type="text/javascript">
$(".js-example-tokenizer").select2({
  tags: true,
})


!function(e){e.fn.pagination=function(a){function t(t){var s=e("."+r.contents+".current").children().length,l=Math.ceil(s/r.items),o='<ul id="page-navi">\t<li><a href="#" class="previos">'+r.previous+"</a></li>";for(i=0;i<l;i++)o+='\t<li><a href="#">'+(i+1)+"</a></li>";o+='\t<li><a href="#" class="next">'+r.next+"</a></li></ul>";var c=t;0==t?(c=parseInt(e("#page-navi li a.current").html()))-1!=0&&c--:t==l+1&&(c=parseInt(e("#page-navi li a.current").html()))+1!=l+1&&c++,t=c,0==s&&(o=""),e("#page-navi").remove(),"top"==r.position?e("."+r.contents+".current").before(o):e("."+r.contents+".current").after(o),e("#page-navi li a").removeClass("current"),e("#page-navi li a").eq(t).addClass("current"),e("#page-navi li a").removeClass("disable"),c=parseInt(e("#page-navi li a.current").html()),c-1==0&&e("#page-navi li a.previos").addClass("disable"),c==l&&e("#page-navi li a.next").addClass("disable");var u=a.items*(t-1),d=a.items*t;t==l&&(d=s),e("."+r.contents+".current").children().hide(),e("."+r.contents+".current").children().slice(u,d).fadeIn(a.time),1==r.scroll&&e("html,body").animate({scrollTop:n},0)}var r={items:5,contents:"contents",previous:"Previous&raquo;",next:"&laquo;Next",time:800,start:1,position:"bottom",scroll:!0},r=e.extend(r,a);e(this).addClass("jquery-tab-pager-tabbar"),$tab=e(this).find("li");var n=0;!function(){var a=r.start-1;$tab.eq(a).addClass("current"),e("."+r.contents).hide().eq(a).show().addClass("current"),t(1)}(),$tab.click(function(){var a=$tab.index(this);$tab.removeClass("current"),e(this).addClass("current"),e("."+r.contents).removeClass("current").hide().eq(a).addClass("current").fadeIn(r.time),t(1)}),e(document).on("click","#page-navi li a",function(){return!e(this).hasClass("disable")&&(t(e("#page-navi li a").index(this)),!1)}),e(window).on("load scroll",function(){n=e(window).scrollTop()})}}(jQuery);
</script>