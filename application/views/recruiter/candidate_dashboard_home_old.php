<div class="container-fluid fortopbanner">  
    <div class="container topbannerinn">
        <h1>Find your dream job here</h1>
        <h6>25000+ jobs for you to explore</h6>
    </div>

    <div class="container mobilewidh100">
<form action="<?php echo base_url();?>recruitment/search_job " method="post" enctype="multipart/form-data">

  <div class="form-group topsearchform">
<input class="form-control frskills" type="text" name="job-title" id="job-title" placeholder="Enter skills / designations / companies">
    <select class="form-control" id="experience" name="experience">
    <option value="">Select Experience</option>
  <?php $year=30;  for($i=0; $i<=$year; $i++) {?>
      <option value="<?php echo $i ?>">   <?php  if($i==0) { $text= "Fresher (less than 1 year)"; } else if ($i==1){ $text=$i." year"; } else{ $text = $i." years";}  echo $text ?></option>
    <?php } ?>      
    </select>

<input class="form-control frlocation" type="text" id="job-location"  name="job-location" placeholder="Enter Location">

<input class="form-control frlocation ui-autocomplete-input" type="hidden" id="joblocationid"  name="joblocationid" >

<input class="form-control frlocation" type="text" id="pin_code"  name="pin_code" placeholder="Enter Pincode">

<button class="btn btn-primary my-2 my-sm-0 topsearchbtn hvr-wobble-bottom" type="submit">Search</button>
</div>
</form>

    </div>
<div class="belowformlinks">
<a href="#" class="badge badge-primary hvr-wobble-bottom">Angular</a>
<a href="#" class="badge badge-warning hvr-wobble-bottom">Python</a>
<a href="#" class="badge badge-success hvr-wobble-bottom">Java</a>
<a href="#" class="badge badge-info hvr-wobble-bottom">Php</a>
</div>
<div class="container bannerlastsection">
    <div class="row ">
      <div class="col-lg-12 col-sm-12 float-left">
        <h4>Let Employers Find You</h4>
<h6>Thousands of employers search for candidates on Msuite</h6>
      </div>
      
</div>
</div>
</div>

<div class="container-fluid">
    <div class="container jobscategories">
        <a href="#" class="badge hvr-wobble-bottom">Remote</a>
<a href="#" class="badge hvr-wobble-bottom">MNC</a>
<a href="#" class="badge hvr-wobble-bottom">Fortune 500</a>
<a href="#" class="badge hvr-wobble-bottom">Data Science</a>
<a href="#" class="badge hvr-wobble-bottom">Temp WFH</a>
<a href="#" class="badge hvr-wobble-bottom">Supply Chain</a>
<a href="#" class="badge hvr-wobble-bottom">Marketing</a>
<a href="#" class="badge hvr-wobble-bottom">Sales</a>
<a href="#" class="badge hvr-wobble-bottom">HR</a>
<a href="#" class="badge hvr-wobble-bottom">Software & IT</a>
<a href="#" class="badge hvr-wobble-bottom">Analytics</a>
    </div>
</div>

<!-- mobile slider start here -->
<div class="container-fluid mobilesliderr">
    <div class="container mobilesliderInn">

    <div class="row mobileslideOuter">

  <div class="mobilesliderLeftSide">
  <h3>Get your dream job<br>on Msuite</h3>
<p>Connect with opportunities that matter.<br>
NextLevel is the cutting-edge hiring platform<br>
that reinvents the way you search for jobs.</p>
<a class="btn btn-primary vacomp hvr-wobble-bottom" href="">Sign Up For Free</a>
  </div>
  <div class="mobileSlidBg">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
<ul>
<li><a href="#">
<img class="img-fluid" width="" height="auto" src="<?php echo base_url() ?>frontend/images/mobileslide1.jpg"/ alt=""></a></li>
</ul>
    </div>
    <div class="carousel-item">
      <ul>
    <li><a href="#">
<img class="img-fluid" width="" height="auto" src="<?php echo base_url() ?>frontend/images/mobileslide2.jpg"/ alt=""></a></li>
</ul>
    </div>
    <div class="carousel-item">
    <ul>
    <li><a href="#">
<img class="img-fluid" width="" height="auto" src="<?php echo base_url() ?>frontend/images/mobileslide3.jpg"/ alt=""></a></li>
</ul>
    </div>
  </div>
  <!--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>-->
</div>
  </div>
  
    </div>
    </div>
</div>
<!-- mobile slider end here -->



<!-- company slider start here -->

<div class="container-fluid">
    <div class="container companihiring">
        <h3>Top companies hiring now</h3>
    <div class="row">
        <div class="MultiCarousel companyslider" data-items="1,2,2,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">

            
                <div class="item">
                    <div class="pad15">
                        <p class="lead">MNCs &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="MNC's">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="MNC's">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="MNC's">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="MNC's">
               </div>
                </div>
                </div>
           
                
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Internet &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Internet">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Internet">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Internet">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Internet">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                        <p class="lead">Manufacturing &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Manufacturing">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Manufacturing">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Manufacturing">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Manufacturing">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                         <p class="lead">Work Culture &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Work Culture">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Work Culture">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Work Culture">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Work Culture">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                        <p class="lead">Fortun 500 &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Fortun 500">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Fortun 500">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Fortun 500">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Fortun 500">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                         <p class="lead">Product &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Product">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Product">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Product">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Product">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                        <p class="lead">Banking & Finance &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Banking & Finance">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Banking & Finance">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Banking & Finance">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Banking & Finance">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                         <p class="lead">Work-life Balance &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Work-life Balance">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Work-life Balance">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Work-life Balance">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Work-life Balance">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                       <p class="lead">Hospitality &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Hospitality">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Hospitality">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Hospitality">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Hospitality">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                        <p class="lead">FMCG & Retail &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="FMCG & Retail">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="FMCG & Retail">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="FMCG & Retail">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="FMCG & Retail">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                        <p class="lead">Job Security &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Job Security">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Job Security">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Job Security">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Job Security">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                        <p class="lead">Startups &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Startups"> 
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Startups">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Startups">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Startups">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                        <p class="lead">Edtech &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Edtech">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Edtech">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Edtech">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Edtech">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                        <p class="lead">Salary & Benefits &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Salary & Benefits">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Salary & Benefits">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Salary & Benefits">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Salary & Benefits">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                        <p class="lead">Healthcare &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Healthcare">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Healthcare">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Healthcare">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Healthcare">
            </div>
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                       <p class="lead">Unicorns &rarr;</p>
                        <p>99 are actively hiring</p>
                        <div class="companylogos"><img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Unicorns">
                        <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Unicorns">
                    <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Unicorns">
                <img width="" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Unicorns">
            </div>
                    </div>
                </div>



            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
       
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
</script>

<!-- company slider start here -->

<!-- featured company hired slider start here -->

<div class="container-fluid">
    <div class="container featuredComp">
        <h3>Featured companies actively hiring</h3>
    <div class="row">
        <div class="MultiCarousel companyslider" data-items="1,2,3,5" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">

            <?php foreach($client_list as $row){ ?>
                <div class="item">
                    <div class="pad15"  href="www.google.com">
                        <p><img width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Persistent" ></p>
                        <div class="compInfo">
                        <p class="lead"><?php echo $row->client_name ?></p>
                        <p>stars | 2.4k+ reviews</p>
                    </div>
                        <p>Global professional services firm.</p>
                        <a href="<?php echo base_url();?>recruitment/get_job_post_company/<?php echo $row->client_id ?>" class="badge viewjobsss hvr-wobble-bottom">View Jobs</a>
                    </div>
                </div>

             <?php }?>
            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
        <a class="btn btn-primary vacomp hvr-wobble-bottom">View All Companies</a>

    </div>
</div>
</div>

<!-- featured company hired slider end here -->

<div class="container-fluid DiscoverJobsOut">
    <div class="container DiscoverJobs">

    <div class="row">

  <div class="col-lg-4 col-sm-12 DiscoverLeftSide">
  <h3>Discover jobs across popular roles</h3>
<p>Select a role and we'll show you relevant jobs for it!</p>
  </div>
  <div class="col-lg-8 col-sm-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
<ul>
    <li><a href="#">
Full Stack Developer<br>
27.3k+ Jobs</a></li>

<li><a href="#">
Technical Lead<br>
15.8k+ Jobs
</a></li>

<li><a href="#">
Business Aalyst<br>
6.8k Jobs
</a></li>

<li><a href="#">
    Front End Developer<br>
4.6+ Jobs
</a></li>

<li><a href="#">
    Technical Architect<br>
11.4k+ Jobs
</a></li>

<li><a href="#">
Functional Consultant<br>
4.6k+ Jobs
</a></li>
</ul>
    </div>
    <div class="carousel-item">
      <ul>
    <li><a href="#">
Full Stack Developer<br>
27.3k+ Jobs</a></li>

<li><a href="#">
Technical Lead<br>
15.8k+ Jobs
</a></li>

<li><a href="#">
Business Aalyst<br>
6.8k Jobs
</a></li>

<li><a href="#">
    Front End Developer<br>
4.6+ Jobs
</a></li>

<li><a href="#">
    Technical Architect<br>
11.4k+ Jobs
</a></li>

<li><a href="#">
Functional Consultant<br>
4.6k+ Jobs
</a></li>
</ul>
    </div>
    <div class="carousel-item">
    <ul>
    <li><a href="#">
Full Stack Developer<br>
27.3k+ Jobs</a></li>

<li><a href="#">
Technical Lead<br>
15.8k+ Jobs
</a></li>

<li><a href="#">
Business Aalyst<br>
6.8k Jobs
</a></li>

<li><a href="#">
    Front End Developer<br>
4.6+ Jobs
</a></li>

<li><a href="#">
    Technical Architect<br>
11.4k+ Jobs
</a></li>

<li><a href="#">
Functional Consultant<br>
4.6k+ Jobs
</a></li>
</ul>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>
  
    </div>
    </div>
</div>

<!-- interview section -->
<div class="container-fluid InteviewSection">
    <div class="container">

    <div class="row">

  <div class="col-lg-3 col-sm-12 interviewBox1">
    <h4>Prepare for your next interview</h4>
  </div>
  <div class="col-lg-5 col-sm-12 interviewBox2">
    <div class="questionbycomp">
        <h5>Interview questions by company</h5>
        <ul>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
            <li><a href="#"><div class="IQimg" ><img width="70" height="auto" src="<?php echo base_url() ?>frontend/images/complogo.png"/ alt="Cognizant"><div><h6>Cognizant</h6><span>1.6k+ Interviews</span></div></div></a></li>
        </ul>
        <div class="frbttnn">
        <a class="btn hvr-wobble-bottom" href="#">View All Companies</a>
    </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-12">

    <div class="interviewBox3">
    <h5>Interview questions by role</h5>

    <ul>
<li><a>Software Engineer  <span>(7.2K+ questions)</span></a></li>
<li><a>Business Analyst  <span>(2.8K+ questions)</span></a></li>
<li><a>Consultant <span>(2.4K+ questions)</span></a></li>
<li><a>Financial Analyst <span>(894 questions)</span></a></li>
<li><a>Sales & Marketing <span>(991 questions)</span></a></li>
<li><a>Quality Engineer  <span>(1.3K+ questions)</span></a></li>
</ul>
<div class="frbttnn">
        <a class="btn hvr-wobble-bottom" href="#">View All Roles</a>
    </div>
    </div>
  </div>

  </div>
</div>
</div>

<!-- Accelatate job section -->

<div class="container-fluid accelarateYourJob">
    <div class="container">

    <div class="row accelarateYourJobInn">

  <div class="col-lg-3 col-sm-12">
    <img alt= "Accelarate your job" class="img-fluid" src="<?php echo base_url() ?>frontend/images/accelarateYourJob.png"/>
</div>
<div class="col-lg-6 col-sm-12 Accelerateservices">
<h5>Accelerate your job search with premium services</h5>

<p class="greyy">Services to help you get hired, faster: from preparing your CV, getting recruiter attention, finding the right jobs, and more!</p>
<p><a href="#" class="badge viewjobsss hvr-wobble-bottom">Resume writing</a><a href="#"  href="#"  class="badge viewjobsss hvr-wobble-bottom">Priority applicant</a> <a href="#"  class="badge viewjobsss hvr-wobble-bottom">Resume display</a></p>
</div>
    <div class="col-lg-3 col-sm-12 interviewBox1">
<a class="btn btn-primary learnmore hvr-wobble-bottom">Learn more</a>

<p class="greyy">Includes paid services</p>
    </div>
</div>
</div>
</div>

<!-- video Profile --->

<!-- Accelatate job section -->

<div class="container-fluid FrVideoProfile">
    <h4>Stand out among recruiters witha video profile</h4>
    <p>Available for both Android and iOS apps</p>
    <div class="container">
    <div class="row">
<div class="col-lg-12 col-sm-12 FrVideoProfileInn">
   <div class="videoprofileright">  
    <form class="enterMobileNoform">
   <input type="email" class="form-control forenterno" id="" placeholder="Enter Mobile Number">
   <button class="btn btn-primary topsearchbtn hvr-wobble-bottom" type="submit">Get Link</button>
</form>
<a class="hvr-wobble-bottom" href="#"><img alt="Google Play" class="img-fluid" src="<?php echo base_url() ?>frontend/images/Gplay.png"/></a>
<a class="hvr-wobble-bottom" href="#"><img alt="App Store" class="img-fluid" src="<?php echo base_url() ?>frontend/images/Appstore.png"/></a>
</div>
<div class="videoprofileLeft">
    <a class="" href="#">
        <img width="100" height="auto" class="img-fluid" src="<?php echo base_url() ?>frontend/images/scancode.jpg"/ alt="Scancode">
        <span>Scan to Download</span>
    </a>
</div>

</div>

<!--<div class="col-lg-5 col-sm-12 mobilevideoprofile">
    <img class="img-fluid" src="<?php echo base_url() ?>frontend/images/videoprofile.jpg"/>
</div>-->

</div>
</div>
</div>
