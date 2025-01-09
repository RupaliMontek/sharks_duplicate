

<div class="clearfix"></div>
<input type="hidden" id="is_dashboard_page" value=" ">
<div class="vc_row wpb_row vc_row-fluid">
<div class="wpb_column vc_column_container vc_col-sm-12">
<div class="vc_column-inner">
<div class="wpb_wrapper">
	<section class="n-hero-6"  style="background:  url(<?php echo base_url()?>asset/wp-content/uploads/sites/9/2019/12/hero.jpg) no-repeat scroll center center / cover;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
					<div class="n-h6-content"><span class="h6-style">Find The Best Job</span>  <h1>Search From 25,000 Jobs!</h1>
						<form   method="post" action="<?php echo base_url();?>recruitment/search_job">

							<div class="n-h6-form">
								<ul>
									<li>
										<div class="form-group">
											<input type="text" class="form-control" name="job-title" placeholder="Search here"/>
										</div>
									</li>
									<li>
										<div class="form-group">
											<select class="js-example-basic-single form-control" data-allow-clear="true" data-placeholder="Select Category" name="cat-id" id="cat-id">
												<option label="Select Category"></option><option value="Angular">Angular</option><option value="88">Php  </option><option value="18">Java</option><option value="8">HR Recruter</option><option value="204">Development</option>
												
											</select>
											</div>
										</li>
										<li>
											<div class="form-group">
												<select class="js-example-basic-single form-control" data-allow-clear="true" data-placeholder="Select Location"  name="job-location" id="job-location">
													<option value="">Select Location</option>
													<option value="Nashik">Nashik</option><option value="76">Mumbai</option><option value="70">India</option><option value="71">&nbsp;&nbDelhi</option><option value="72">New delhi</option><option value="132">Kolkata</option>
												</select>
											</div>
										</li>
										<li>	
											<button type="submit" class="btn n-btn-flat">Search<i class="fa fa-search"></i></button>
										</li>
									</ul>
								</div>
							</form>
							<div class="n-hero-list">
								<ul>
									<li class="style-flex"><a href="#">Trendings:</a></li>
									<li><a href="">Angular</a></li><li><a href="">Python</a></li><li><a href="">Java</a></li><li><a href="">Php</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="n-h6-profile">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="n-jobs-h6">
								<img class="img-responsive" src="<?php echo base_url()?>asset/wp-content/uploads/sites/9/2019/12/id-card.png" alt="image"/>
								<div class="h6-product">Let Employers Find You</div>
								<p>Thousands of employers search for candidates on Nokri</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="n-profile-btn">
								<input type="file"  class="btn n-btn-flat" value="upload Resume" name="upload_cand_resume" id=""/>
							</div>
							</div>						
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
</div>
<div class="vc_row wpb_row vc_row-fluid">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
		<div class="wpb_wrapper">
		<section class="n-job-listing5"  style="background: url(<?php echo base_url()?>asset/wp-content/uploads/sites/9/2020/01/style-2.png) no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-position: center center; background-attachment:scroll;">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-xs-12 col-sm-8 col-md-8">
						<div class="n-listing-text">
							<h2>Recommended Jobs</h2>
							<p>Lorem Ipsum is simply dummy text of the printing</p>
						</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#latest">Latest Jobs</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="latest" class="tab-pane fade in active">
							    <?php foreach($job_latest as $row){ ?>
								<div class="n-listing-content">
									<div class="n-listing-product">
										<a href="#">
											<div class="n-listing-img">
												<img src="<?php echo base_url();?><?php echo $row->company_logo  ?>" alt="logo" class="img-responsive"/>
											</div>
										</a>
									    <b><a href="<?php echo base_url();?>Recruitment/job_description/<?php echo $row->id ?>"><?php echo  $row->company_name; ?></a></b></br>
									    <i class="fa fa-suitcase" aria-hidden="true"></i>
									    <?php echo $row->min_exp_candidate."-".$row->max_exp_candidate." Yrs" ?>
									    |&nbsp;&nbsp;<i class="fa fa-inr" aria-hidden="true"></i>
									    <?php echo $row->comany_min_package_offer."-".$row->comany_max_package_offer."P.A" ?>
									    |&nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <?php echo $row->job_location; ?><br>
                                        <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                         <?php  echo substr($row->job_descriptions,0,100)  ?></br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                          <?php $array=$row->key_skills; 
                                             $button=explode(',',$array);
                                             
                                        ?>
                                        <?php foreach($button as $btn){  ?>
                                          <button style="font-size:16px" type="button" class="btn btn-light-blue btn-sm"><?php echo $btn ?></button>
                                        <?php }?></br>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                        <i class="fa fa-history" aria-hidden="true"></i>
                                        <?php $diff = abs(strtotime($row->created_at) - strtotime(date('Y-m-d h:i:s')));
                                          $years = floor($diff / (365*60*60*24));
                                          $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                        ?>
                                        <?php echo $days." DAY AGO"; ?>            
                                         

										<div class="n-listing-user-detail">
											
										</div>
									</div>
									<div class="n-listing-usr-information">
										<a href="javascript:void(0)" class="absolute-position btn n-btn-flat apply_job" data-toggle="modal" data-target="#myModal"  data-job-id=849>Apply now </a>
									</div>
									<div class="n-listing-wp">
										<a href="javascript:void(0)" class="n-fav-icon save_job" data-value = "849"> <i class="fa fa-heart-o"></i></a>
									</div>
								</div>
							<?php } ?>	
								
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-xs-12 col-md-4">
						<div class="n-listing-candidates">
							<div class="n-candidates-content"><h2>Featured Candidates</h2></div>
							<div class="job-cat-cand-slider owl-carousel owl-theme">
								<div class="item">
									<div class="n-candidates-details">
										<div class="features-star"><i class="fa fa-star"></i></div>	
										<a href="candidate/robert/index.html"><span>David</span></a>
										<p>Data Entry Officer</p>
										<a href="candidate/robert/index.html">
											<img src="<?php echo base_url()?>asset/wp-content/uploads/sites/9/2018/09/images-7-1.png" alt="Profile picture" class="img-responsive"/>
										</a>
										<a href="javascript:void(0)" class="saving_resume" data-cand-id=28><span class="style-utf"><i class="fa fa-heart-o"></i></span></a>
									</div>
									<div class="n-candidate-lcation">	<a href="#"><i class="fa fa-map-marker"></i>Chickasaw, USA</a>
									</div>
									<div class="n-candidates-list">
										<ul>
											<li><a href="candidates/indexf16c.html?cand_skills=152">patience</a></li><li><a href="candidates/index13ca.html?cand_skills=153">Commitment</a></li><li><a href="candidates/index7b3d.html?cand_skills=172">trainings</a></li>
										</ul>
									</div>
									<div class="n-candidates-btn">
										<a href="candidate/robert/index.html">View Profile</a>
									</div>
								</div>
								
							</div>
						</div><div class="n-listing-categories">
							<ul>
								<li class="hd-style"><h2>Jobs Categories</h2></li>
								<li>
									<div class="n-listing-cat">
										<a href="search-page/indexd8fa.html?cat-id=80">
											<img src="<?php echo base_url()?>asset/wp-content/uploads/sites/9/2019/12/automobile.png" alt="image" class="img-responsive"/><span>Angular</span>
										</a>
									</div>
									<div class="n-listing-top">	<span>1 Openings</span>
									</div>
								</li><li>
									<div class="n-listing-cat">
										<a href="search-page/index08c9.html?cat-id=81">
											<img src="<?php echo base_url()?>asset/wp-content/uploads/sites/9/2019/12/fv.png" alt="image" class="img-responsive"/><span>Hr Recruter</span>
										</a>
									</div>
									<div class="n-listing-top">	<span>1 Openings</span>
									</div>
								</li><li>
									<div class="n-listing-cat">
										<a href="search-page/indexa11e.html?cat-id=88">
											<img src="<?php echo base_url()?>asset/wp-content/uploads/sites/9/2019/12/sketch.png" alt="image" class="img-responsive"/><span>Java</span>
										</a>
									</div>
									<div class="n-listing-top">	<span>1 Openings</span>
									</div>
								</li><li>
									<div class="n-listing-cat">
										<a href="search-page/indexbb1b.html?cat-id=16">
											<img src="<?php echo base_url()?>asset/wp-content/uploads/sites/9/2019/12/dcc.png" alt="image" class="img-responsive"/><span>PHP</span>
										</a>
									</div>
									<div class="n-listing-top">	<span>0 Openings</span>
									</div>
								</li><li>
									<div class="n-listing-cat">
										<a href="search-page/index7dc0.html?cat-id=79">
											<img src="<?php echo base_url()?>asset/wp-content/uploads/sites/9/2019/12/factory.png" alt="image" class="img-responsive"/><span>Html</span>
										</a>
									</div>
									<div class="n-listing-top">	<span>0 Openings</span>
									</div>
								</li>
							</ul>
						</div><div class="nth-listing-qa"  style="background: url(<?php echo base_url()?>asset/wp-content/uploads/sites/9/2019/12/qa.png) center center no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-position: center center; background-attachment:scroll;">
							<div class="nth-listing-content">
								<img src="<?php echo base_url()?>asset/wp-content/uploads/sites/9/2019/12/phone-call.png" alt="image" class="img-responsive"/>
								<span>Get a Question</span>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
</div>