<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Job Opening</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<style type="text/css">
		body {
			color: #6a6c6f;
			background-color: #f1f3f6;
			margin-top:30px;
		}

		.container {
			max-width: 960px;
		}

		ul {
			margin: 0;
			padding: 0;
			list-style: none;
		}

		.nav li {
			border-bottom: 1px solid #eee;
		}

		.nav li a {
			font-size: 14px;
		}

		#accordionMenu {
			max-width: 300px;
		}

		.panel-body {
			padding: 0;
		}
		.tuple{
			width: 52%;
		}

		.panel-group .panel+.panel {
			margin-top: 0;
			border-top: 0;
		}

		.panel-group .panel {
			border-radius: 0;
		}

		.panel-default>.panel-heading {
			color: #333;
			background-color: #fff;
			border-color: #e4e5e7;
			padding: 0;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		.panel-group {
			margin-bottom: 20px;
			box-shadow: 0 0 15px rgba(0,0,0,0.1);
		}
		.panelnew {
			margin-bottom: 20px;
			box-shadow: 0 0 15px rgba(0,0,0,0.1);
			background-color: #fff;
			border: 1px solid transparent;
			border-radius: 4px;
			-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
			box-shadow: 0 1px 1px rgba(0,0,0,.05);
			padding: 17px;
		}

		.panel-default>.panel-heading a {
			display: block;
			padding: 10px 15px;
			text-decoration: none;
		}

		.panel-default>.panel-heading a:after {
			content: "";
			position: relative;
			top: 1px;
			display: inline-block;
			font-family: 'Glyphicons Halflings';
			font-style: normal;
			font-weight: 400;
			line-height: 1;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			float: right;
			transition: transform .25s linear;
			-webkit-transition: -webkit-transform .25s linear;
		}

		.panel-default>.panel-heading a[aria-expanded="true"] {
			background-color: #eee;
		}

		.panel-default>.panel-heading a[aria-expanded="true"]:after {
			content: "\e113";
		}

		.panel-default>.panel-heading a[aria-expanded="false"]:after {
			content: "\e114";
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<div class="row">
		    <h2>Current Openings</h2>
			<div class="col-md-3">	
				<div class="panel-group" id="accordionMenu" role="tablist" aria-multiselectable="true">
					<!--<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Location
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<ul class="nav">
                                    <?php if(!empty($location_list)){?>
								    <?php foreach($location_list as $row){?>
									<li><label><input type="checkbox" class="company" value="<?php echo $row->locations;?>" name="company"> <?php echo $row->locations;?></label></li>
									<?php } ?>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>-->
					<!--<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Salary
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<ul class="nav">
								    <?php if(!empty($salary_list)){?>
								    <?php foreach($salary_list as $row){?>
									<li><label><input type="checkbox" class="company" value="<?php echo $row->salery;?>" name="company"> <?php echo $row->salery;?></label></li>
									<?php } ?>
									<?php } ?>
									<li><a href="#">0-3 Lakhs(2086)</a></li>
									<li><a href="#">3-6 Lakhs(6536)</a></li>
									<li><a href="#">6-10 Lakhs(7802)</a></li>
									<li><a href="#">10-15 Lakhs(4420)</a></li>
								</ul>
							</div>
						</div>
					</div>-->
					<!--<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									Job Type
								</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<ul class="nav">
									<li><a href="#">Premium Engg(1814)</a></li>
									<li><a href="#">International(13)</a></li>
									<li><a href="#">Premium MBA(11)</a></li>
									<li><a href="#">Walk-in(23)</a></li>
								</ul>
							</div>
						</div>
					</div>-->
					<!--<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingFour">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									Posted by
								</a>
							</h4>
						</div>
						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
							<div class="panel-body">
								<ul class="nav">
									<li><a href="#">Company Jobs(10232)</a></li>
									<li><a href="#">Consultant Jobs(2819)</a></li>
								</ul>
							</div>
						</div>
					</div>-->
					<!--<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingFive">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									Top Companies
								</a>
							</h4>
						</div>
						<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
							<div class="panel-body">
								<ul class="nav">
								    <?php if(!empty($clients_list)){?>
								    <?php foreach($clients_list as $row){?>
									<li><label><input type="checkbox" class="company" value="<?php echo $row['client_id'];?>" name="company"> <?php echo $row['client_name'];?></label></li>
									<?php } ?>
									<?php } ?>
									<li><a href="#">IBM India(79)</a></li>
									<li><a href="#">Persistent Systems(45)</a></li>
									<li><a href="#">Collabera Technologies(28)</a></li>
								</ul>
							</div>
						</div>
					</div>-->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Location
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<ul class="nav">
                                    <?php if(!empty($location_list)){?>
								    <?php foreach($location_list as $row){?>
									<li><label><input type="checkbox" class="locations" value="<?php echo $row->locations;?>" name="company"> <?php echo $row->locations;?></label></li>
									<?php } ?>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingSix">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
									Skills
								</a>
							</h4>
						</div>
						<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
							<div class="panel-body">
								<ul class="nav">
									<?php if(!empty($skill_list)){?>
								    <?php foreach($skill_list as $row){?>
								    <?php if($row->position_skills != ''){ ?>
									<li><label><input type="checkbox" class="skills" value="<?php echo $row->position_skills;?>" name="skills"> <?php echo $row->position_skills;?></label></li>
									<?php } ?>
									<?php } ?>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					
					
					
				</div>
			</div>
			
			
			<div class="col-md-9" id="searched_jobs">
				
				<?php if(!empty($job_list)){?>
				    <?php foreach($job_list as $list){?>
        				<div class="panelnew">
        					<label><?php echo $list['title'];?></label>
        					<div class="mtxt">
        						<span class="exp"><?php echo $list['client_name'];?></span>
        					</div>
        					<div class="edu-details">
        						<div class="row">
        							<div class="col-md-3"><p>Experience : </p></div>
        							<div class="col-md-8"><p><?php echo $list['exp'];?></p></div>
        						</div>
        						<div class="row">
        							<div class="col-md-3"> <p>Salery Range:</p></div>
        							<div class="col-md-8"><p> <?php echo $list['salery'];?></p></div>
        						</div>
        						<div class="row">
        							<div class="col-md-3"> <p>Locations:</p></div>
        							<div class="col-md-8"><p> <?php echo $list['locations'];?></p></div>
        						</div>
        						<div class="row">
        							<div class="col-md-3"> <p>Key Skills :</p></div>
        							<div class="col-md-8"><p><?php echo $list['skills'];?></p></div>
        						</div>
        					</div>    
        				</div>
        			<?php } ?>
        		<?php } ?>

			</div>
		</div>
	</div>
	<!-- end of wrap -->

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<script>
	    /*$('.skills').on('change', function() {
	        /*;
            $.ajax(function(){
                type : "POST",
                /*url : "<?php echo base_url(); ?>candidate_profile/get_searched_jobs",*/
                /*data : {skills:skill, locations:location},*/
                /*success:function(data){
                    $('#searched_jobs').html(data);
                }
            });
            
        });*/
        
        $('.skills').on('change', function() {
            var skill = $('.skills:checked').map(function() { return this.value; }).get();
            var location = $('.locations:checked').map(function() { return this.value; }).get()
        
            $.ajax({
                type: "POST",
                data: {skill:skill, location:location},
                url : "<?php echo base_url(); ?>candidate_profile/get_searched_jobs",
                success: function(data){
                    $('#searched_jobs').html(data);
                }
            });
        });
        
        $('.locations').on('change', function() {
            var skill = $('.skills:checked').map(function() { return this.value; }).get();
            var location = $('.locations:checked').map(function() { return this.value; }).get()
        
            $.ajax({
                type: "POST",
                data: {skill:skill, location:location},
                url : "<?php echo base_url(); ?>candidate_profile/get_searched_jobs",
                success: function(data){
                    $('#searched_jobs').html(data);
                }
            });
        });
	</script>

</body>
</html>