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