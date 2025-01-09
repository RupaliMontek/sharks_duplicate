
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
                            <h3 class="box-title">Candidate Profile Advance Search</h3>
                            </div>
                            <div class="box-body" id="advance-colr">
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
                              <div class="row">
                                <div class="col-md-8">
                                <div id="wrapper">
                                  <div class="contents">
                                    <div class="" id="myprofile">  
                                       <div class="row">
                                      <div class="col-md-2">
                                    <div class="profile-image">
                                    <img src="https://msuite.work/uploads/user_profile_pictures/1/man3.png" class="avatar1" alt="User Image">
                                    <!--<p>I am Java full stack developer</p>-->
                                    <!--<button onclick="myFunction()"><i class="fa fa-phone" aria-hidden="true"></i> Show phone No</button>-->
                                    <!--<p><i class="fa fa-check" aria-hidden="true"></i> Verified phone +  Email</p>-->
                                    <!--<div id="myDIV"> 9966554433</div>-->
                                     </div>
                                    <!--<span class="show-no"><?=$row->contact_no?></span>-->
                                    <!--<img src="avatar.png" alt="Avatar" class="avatar">-->
                                    
                                </div>
                                 <div class="col-md-10 tuple">
                                     <h1>Swaranjali</h1>
                                       
                                    <!-- <div class="mtxt">-->
                                    <!--     <span class="exp"><?php if($row->yrs_of_experience!=0 && $row->months_of_experience!=0 ){echo "Experienced";}else{echo "Fresher";}?></span>-->
                                    <!--     <span class="loc"><?=$row->location?></span>-->
                                    <!--</div>-->
                                     <div class="col-md-12">
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
                                        <div class="col-md-3">
                                             <p><i class="fa fa-map-marker" aria-hidden="true"></i> Prefer</p>
                                        </div>
                                    </div>
                                    </div>
                                     <div class="col-md-12"> 
                                     <div class="row">
                                         <div class="col-md-8">
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
                                         <div class="col-md-4">
                                            <div class="col-md-8"> 
                                            <p>Key Skill</p>
                                            <p>java, php, html, css, java script</p>
                                            <p>May also know </p>
                                            <p>java, My sql servlet, Web services</p>
                                        </div> 
                                        </div>
                                       </div> 
                                    </div>  
                                    <div class="col-md-8">
                                         <div class="row">
                                          <div class="col-md-6">
                                                <button onclick="myFunction()"><i class="fa fa-phone" aria-hidden="true"></i> Show phone No</button>
                                                <p><i class="fa fa-check" aria-hidden="true"></i> Verified phone + Email</p>
                                                <div id="myDIV"> 9966554433</div>
                                                <p><i class="fa fa-envelope" aria-hidden="true"></i> abc@gmail.com</p>
                                                <p><i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Expand Details</p>
                                            </div>
                                            <div class="col-md-6">
                                                <button onclick="myFunction()">Schedule Video Call</button>
                                                <div id="myDIV"> 9966554433</div>
                                            </div>
                                          </div>  
                                    </div>
                                </div>
                                </div>
                                </div>
                             </div>
                             <div class="col-md-12">
                                 <div class="row">
                                     <div class="col-md-2">
                                        <p><i class="fa fa-eye" aria-hidden="true"></i> 125087</p> 
                                     </div>
                                     <div class="col-md-1">
                                        <p><i class="fa fa-arrow-circle-down"></i> 255</p> 
                                     </div>
                                     <div class="col-md-2">
                                        <p> Active:2 jan 2021</p> 
                                     </div>
                                     <div class="col-md-2">
                                        <p> Modified: 11 jan 2021</p> 
                                     </div>
                                     <div class="col-md-3">
                                        <p><i class="fa fa-check" aria-hidden="true"></i> Verified Email Phone</p> 
                                     </div>
                                     <div class="col-md-2">
                                        <p><i class="fa fa-flag" aria-hidden="true"></i> Report Resume</p> 
                                     </div>
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
                               <div class="col-md-4">
                     <div class="col-md-8">
                        <div id="wrapper">
                            <div class="contents">
                                <div class="similar_job" id="myprofile"> 
                                  <h2> <i class="fa fa-users" aria-hidden="true"> 81 Similar CV(s)</i></h2>
                                  <p>java developer with 3 years experience</p>
                                  <p>Java J2EE developer with 2 years Experience</p>
                                  <div class="row">
                                        <div class="col-md-3">
                                            <p><i class="fa fa-suitcase" aria-hidden="true"></i> 3yr</p>
                                        </div>
                                        <div class="col-md-3">
                                             <p><i class="fa fa-rupee"></i> Rs 3.75lacs</p>
                                        </div>
                                        <div class="col-md-3">
                                             <p><i class="fa fa-map-marker" aria-hidden="true"></i> Mumbai</p>
                                        </div>
                                    </div>
                                    <p>pref:Mumbai Pune Kolkatta</p>
                                    <p>Key Skills: Java, database management, html, php</p>
                                    <p>Last Active 10 feb 2021</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div> 
                        
                         <div class="col-md-8">
                                <div id="wrapper">
                                  <div class="contents">
                                    <div class="similar_job" id="myprofile">
                                        <p>java J2EE developer with B Tech in computer science</p>
                                        <h3><i class="fa fa-tasks"></i> Work Summary</h3>
                                        <p>I have completed BE from pune university. I have 3 years experience in java development field</p>
                                        <p>Industries : IT Software </p>
                                        <p>Functional area : Application Programming</p>
                                        <p>Role : Software Developer </p>
                                        <h3><i class="fa fa-suitcase" aria-hidden="true"></i> Work Experience</h3>
                                        <p>java J2Ee Developer Dec 2019 to till date</p>
                                        <p>Kerala Financial Services</p>
                                        <h3><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education</h3>
                                        <p>Under Graduation</p>
                                        <p>B Tech/BE (computer science) 2014</p>
                                         <h3><i class="fa fa-cogs" aria-hidden="true"></i> IT Skills</h3>
                                         <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>Skill Name</th>
                                                    <th>Version</th>
                                                    <th>Last Used</th>
                                                    <th>Experience</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>J2EE</td>
                                                    <td></td>
                                                    <td>0</td>
                                                    <td>0 Year(s) 0 Month(s)</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Spring Boot</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Hibernet</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <td>Java</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                              <h3>Other Details</h3>
                                               <table class="table table-condensed">
                                                    <thead>
                                                      <tr>
                                                        <th>Desigred job details</th>
                                                        <th></th>
                                                        <th>Personal Details</th>
                                                        <th></th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td>Job Type</td>
                                                        <td>Permanent</td>
                                                        <td>Date Of birth</td>
                                                        <td>7 Jul 1990</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Employment Status</td>
                                                        <td>Full time</td>
                                                        <td>Gender</td>
                                                        <td>Female</td>
                                                      </tr>
                                                      <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Marital Status</td>
                                                        <td>Married</td>
                                                      </tr>
                                                       <tr>
                                                        <td>Work Authorization</td>
                                                        <td></td>
                                                        <td>Physically Challenged</td>
                                                        <td>No</td>
                                                      </tr>
                                                       <tr>
                                                        <td>Us Work Status</td>
                                                        <td>Not Mentioned</td>
                                                        <td></td>
                                                        <td></td>
                                                      </tr>
                                                       <tr>
                                                        <td>Other Countries Status</td>
                                                        <td>Not Mentioned</td>
                                                        <td>Address</td>
                                                        <td></td>
                                                      </tr>
                                                       <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Contact-9988776655 <br> Email-abcxyz@gmail.com</td>
                                                        <td></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                        </div>
                                    </div>
                               </div>
                            </div>
                             <div class="col-md-8">
                                <div class="similar_job" id="myprofile">
                                     <h3>Candidate Resume</h3>
                                     <iframe src="https://msuite.work/uploads/rules/Office_Management_Software_Product_SOW2.pdf" width="800" height="300"></iframe>
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