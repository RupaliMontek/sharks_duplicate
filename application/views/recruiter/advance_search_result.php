<link href="<?php echo base_url();?>frontend/select2/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>frontend/select2/select2-bootstrap.css" rel="stylesheet" />
<style type="text/css">
.colplatlet-p input{
  height: 40px;
  width: 112px;
}

#myDIV {
    width: 100%;
    margin-top: 0px;
    margin-bottom: 25px;
     display:none;
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


#page-navi {
  width:50%;
  margin:40px auto;
  margin-bottom:10px;
  padding: 0px;
  overflow: hidden;
}

#page-navi li {
  list-style: none;
  display: inline;
}

#page-navi li a {
  float: left;
  display: block;
  padding: 8px 10px;
  margin-right: 5px;
  border: 1px solid #ccc;
  text-decoration: none;
  background: #fff;
  -webkit-transition: background 200ms linear;
  transition: background 200ms linear;
  border-radius: 3px;
  color:#000;
}

#page-navi li:last-child a {
  margin-right: 0px;
}

#page-navi li a.current,
#page-navi li a.disable,
#page-navi li a:hover {
  background: tomato;
  color: #fff;
  border-bottom:3px solid #fff;
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
            <section class=" content content_nakuri">
          <div class="row">
            <div class="col-xs-12">

             <div class="box ">
             <div class="box box_updated box-solid box-primary">
                   <div class="box-header">
                            <h5>Advanced Search Result  > <?= $count_all_records; ?> profile found  for <?php if(!empty($search_keyword)){ echo $search_keyword;} if(!empty($search_experience)){ echo $search_experience; } ?> <label><a style="color:skyblue;" href="<?= base_url('recruiter/recruiter/modify_advance_search');?>">Modify</a></label></h5>
                            </div>
                <div class="box-body">
                  
                    <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                     <div class="premOpts"> <p class="clFx chk"> <a id="premCand" href="javascript:void(0)" class="customChk fl"><input name="isPremiumCand" type="checkbox" value="1" id="pCandInp"></a> <label for="pCandInp">Premium Institute Candidates <i> </i></label> <a href="javascript:void(0)" class="tip tipIcon" tooltip="tip_110"></a> </p> </div> 
                      </div>
                      <div class="col-md-8">
                                <div class="form-group col-md-3">
                                <select name="client_id_by_userid" id="client_id_by_userid" class="select-form1" required="">
                                  <option value="">Hide Profiles</option>
                                  <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                 </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group srpLbl">Active In</label>
                                <select name="client_id_by_userid" id="client_id_by_userid" class="select-form1" required="">
                                  <option value="1 Day"></option>
                                   <option value="3 Days">3 Days</option>
                                  <option value="7 Days">7 Days</option>
                                  <option value="30 days">30 days</option>
                                  <option value="2 months">2 months</option>
                                  <option value="3 months">3 months</option>
                                  <option value="6 months">6 months</option>
                                </select>
                                </div>
                              <div class="form-group col-md-3">
                            <label class="form-group srpLbl">Show</label>
                              <select name="pagination" id="per_page" class="select-form1" required="">
                              <option <?php if(@$_COOKIE['per_page']==30){ echo "selected";} ?>  value="30">30</option>
                              <option <?php if(@$_COOKIE['per_page']==50){ echo "selected";} ?> value="50">50</option>
                              <option <?php if(@$_COOKIE['per_page']==100){ echo "selected";} ?> value="100">100</option>
                              <option <?php if(@$_COOKIE['per_page']==500){ echo "selected";} ?> value="500">500</option>
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
                            <form    enctype="multipart/form-data" id="searchForm">
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">
                                    <input type="text" name="any_keywords" id="any_keywords" value="" maxlength="500" placeholder="Search Keywords">
                                    
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
                                          
                                          <input type="text" name="exclude_company" id="exclude_company" value="" maxlength="500" placeholder=" Exclude Company">
                                      </div>
                                    </div>
                                      </div>
                                    </div>
                                  </div>
                                  <button type="submit" class="btn btn-info">Search</button>
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

                    </div>
                    <div class="col-md-8" id="new_div1"></div>
                    
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
  
// $('#searchForm').submit(function(e) {

   
});

$('#searchForm').submit(function(event) {
    //alert('hi');
    event.preventDefault();
    var keyword = $('#any_keywords').val();
    var per_page = $('#per_page').val();
    var any_keywords = $('#any_keywords').val();
    var must_keywords = $('#must_keywords').val();
    var excluding_keywords = $('#excluding_keywords').val();
    var total_experience_from = $('#total_experience_from').val();
    var total_experience_to = $('#total_experience_to').val();
    var anual_salary_from_lacs = $('#anual_salary_from_lacs').val();
    var include_company = $('#include_company').val();
    var exclude_company = $('#exclude_company').val();
    var current_location = $('#current_location').val();
    var prefered_location = $('#prefered_location').val();

    $.ajax({
        method: "POST",
        url: '<?php echo base_url("recruiter/Recruiter/search_within_search"); ?>',
        data: { 
            keyword: keyword,
            per_page: per_page,
            any_keywords: any_keywords,
            must_keywords: must_keywords,
            excluding_keywords: excluding_keywords,
            total_experience_from: total_experience_from,
            total_experience_to: total_experience_to,
            anual_salary_from_lacs: anual_salary_from_lacs,
            include_company: include_company,
            exclude_company: exclude_company,
            current_location: current_location,
            prefered_location: prefered_location
        },
        //dataType: 'json',
        success: function(response) {
            alert(response);
            console.log(response);
            $('#new_div1').html(response); // Update content of new_div1
            //$('#ajax_change_response').show(); // Show the ajax_change_response div
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
        }
    });
});

    
$("#per_page").change(function(){
    var per_page=$(this).val();
    var base_url ="<?php echo base_url(); ?>";
    $.ajax({
    url: base_url+'recruiter/recruiter/advance_search_result/',
    type: "POST",
    data: {per_page:per_page},
    success: function(data) 
    {
        location.reload();       
    }
   });
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
function myFunction($id) {
  var x = document.getElementById("myDIV_"+$id);
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