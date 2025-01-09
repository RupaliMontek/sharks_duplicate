<div class="bgBand">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
                    <input type="text" placeholder="Search.." name="search2">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-xl-6" id="new">
                    <h4 class="header-title">Recommanded Job</h4>
<?php foreach($job_latest as $row){ ?>                    
<div class="card">
<div class="card-body">
<h2>Customer Service Executive</h2>
<div class="row">
    <div class="col-md-3">
        <p><i class="fa fa-shopping-bag" aria-hidden="true"></i> <?php echo $row->min_exp_candidate."-".$row->max_exp_candidate." Yrs" ?></p>
    </div>
    <div class="col-md-3">
        <p> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row->job_location; ?></p>
    </div>
</div>
<p><i class="fa fa-cogs" aria-hidden="true"> </i><?php $array=$row->key_skills; 
        $button=explode(',',$array);?><?php foreach($button as $btn){  ?>
<button style="font-size:16px" type="button" class="btn btn-light-blue btn-sm"><?php echo $btn ?></button><?php }?></p>
<p> <i class="fa fa-file"> </i><?php  echo substr($row->job_descriptions,0,100)  ?></p>
<span>Not Disclosed </span><span style="float: right;">posted 6 days ago</span><br>
</div>
<button type="button" class="btn btn-primary">View all</button>
</div>
<?php } ?>
</div>


<div class="col-xl-4">
    <h4 class="header-title mb-3"></h4>
    <div class="card">
        <div class="card-body">
            <div class="wrapper">
                <div class="profile-card js-profile-card">
                    <div class="profile-card__img">
                        <img src="<?php
                        echo base_url();
                        echo $user_details[0]->image;
                        ?>" alt="profile card">
                    </div>

                    <div class="profile-card__cnt js-profile-cnt">
                        <?php $progress_bar = 0; ?>
                        <div class="profile-card__name"><?php print_r(
                            $user_details[0]->candidate_name
                        ); ?></div>                        
                        <?php
                        if (
                            !empty($employment_details)
                        ) { ?>                     
                        <div class="profile-complete"><span class="roboto-thin-text"><!-- react-text: 879 -->Profile completed (<!-- /react-text --><!-- react-text: 880 -->Critical Fields Missing<!-- /react-text --><!-- react-text: 881 -->)<!-- /react-text --></span>
                        <span class="fr db mb5 roboto-regular-text"><?php echo $progress_bar; ?>%</span><div class="progress"><div class="determinate" style="width: <?php echo $progress_bar +
    20; ?>%;"></div></div>
                        </div>
                     <?php }
                        if (!empty($education_de)) { ?>
                         <div class="profile-complete"><span class="roboto-thin-text"><!-- react-text: 879 -->Profile completed (<!-- /react-text --><!-- react-text: 880 -->Critical Fields Missing<!-- /react-text --><!-- react-text: 881 -->)<!-- /react-text --></span>
                        <span class="fr db mb5 roboto-regular-text"><?php echo $progress_bar; ?>%</span><div class="progress"><div class="determinate" style="width: <?php echo $progress_bar +
    20; ?>%;"></div></div>
                        </div>   
                      <?php }
                        if (!empty($candidate_skil)) { ?>
                            <div class="profile-complete"><span class="roboto-thin-text"><!-- react-text: 879 -->Profile completed (<!-- /react-text --><!-- react-text: 880 -->Critical Fields Missing<!-- /react-text --><!-- react-text: 881 -->)<!-- /react-text --></span>
                            <span class="fr db mb5 roboto-regular-text"><?php echo $progress_bar; ?>%</span><div class="progress"><div class="determinate" style="width: <?php echo $progress_bar +
    20; ?>%;"></div></div>
                         </div> 
                       <?php }
                        if (!empty($career_pro));
                        ?>
                        <div class="profile-complete"><span class="roboto-thin-text"><!-- react-text: 879 -->Profile completed (<!-- /react-text --><!-- react-text: 880 -->Critical Fields Missing<!-- /react-text --><!-- react-text: 881 -->)<!-- /react-text --></span>
                            <span class="fr db mb5 roboto-regular-text"><?php echo $progress_bar; ?>%</span><div class="progress"><div class="determinate" style="width: <?php echo $progress_bar +
    20; ?>%;"></div></div>
                         </div> 
                       <?php if (!empty($personal_det)) { ?>
                            <div class="profile-complete"><span class="roboto-thin-text"><!-- react-text: 879 -->Profile completed (<!-- /react-text --><!-- react-text: 880 -->Critical Fields Missing<!-- /react-text --><!-- react-text: 881 -->)<!-- /react-text --></span>
                            <span class="fr db mb5 roboto-regular-text"><?php echo $progress_bar; ?>%</span><div class="progress"><div class="determinate" style="width: <?php echo $progress_bar +
    20; ?>%;"></div></div>
                         </div>
                        <?php } ?>

                        <div class="row">
                        </div><button type="button" onclick="candidate_data_add();" class="btn btn-primary">Add Profile</button>
                        <button type="button" class="btn btn-primary">Update Profile</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

</div> <!-- container -->
<div class="col-md-1"></div>

</div> <!-- content -->
</div>
</div>