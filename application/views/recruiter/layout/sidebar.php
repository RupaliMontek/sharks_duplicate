      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" /> -->
              <img src="<?php echo base_url();?>backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />

            </div>
            <div class="pull-left info">
              <p><?php 
                  if($this->session->userdata('user_name')!=''){
                    echo ucfirst($this->session->userdata('user_name'));
                  }
                  ?></p>
              <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
          </div>
        
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
          
    
            <?php $current_url = current_url(); ?>
            <li class="treeview <?php if($current_url == base_url().'admin'){ echo 'active'; } ?>" >
              <a href="<?php echo base_url(); ?>admin">
                <i class="fa fa-dashboard"></i> <span>Dashboard <?php //echo $current_url; ?></span> 
              </a>
            </li>

            <!--<li class="treeview <?php if($current_url == base_url().'subscribe/registration'){ echo 'active'; } ?> ">-->
            <!--  <a href="<?php echo base_url()."subscribe/registration"; ?>">-->
            <!--    <i class="fa fa-registered"></i> <span>User Registration</span> -->
            <!--  </a>-->
            <!--</li>-->
            
<!--               <li class="treeview <?php if($current_url == base_url().'gallery/gallery/image_list'){ echo 'active'; } ?> " >
              <a href="javascript:void(0);">
                <i class="fa fa-file-image-o"></i>
                <span>Nirmiti Group</span>
                <span class="label label-primary pull-right"></span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() . "blog/blog/hospitality_blog"; ?>"><i class="fa fa-circle-o"></i>Blog</a></li>
                <li><a href="<?php echo base_url() . "category/category"; ?>"><i class="fa fa-circle-o"></i>Gallery Category</a></li> 
               <li><a href="<?php echo base_url() . "gallery/gallery/hospitality_gallery"; ?>"><i class="fa fa-circle-o"></i>Gallery</a></li>                
               <li><a href="<?php echo base_url() . "Testimonials/Testimonials/hospitality_testimonial"; ?>"><i class="fa fa-circle-o"></i>Testimonial</a></li> 
               <li><a href="<?php echo base_url() . "Subscribe/hospitality_contact_enquiry"; ?>"><i class="fa fa-circle-o"></i>Contact Us</a></li> 

              </ul>
            </li> -->
            <li class="treeview <?php if($current_url == base_url().'gallery/gallery/image_list'){ echo 'active'; } ?> ">
              <a href="javascript:void(0);">
                <i class="fa fa-file-image-o"></i>
                <span>Nirmiti Enterprises</span>
                <span class="label label-primary pull-right"></span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
             
               <li><a href="<?php echo base_url() . "blog/blog/enterprise_blog"; ?>"><i class="fa fa-circle-o"></i>Blog</a></li>
               
              
               <li><a href="<?php echo base_url() . "admin/contact_us"; ?>"><i class="fa fa-circle-o"></i>Contact Us</a></li> 

              </ul>
            </li>
            
            <li class="treeview <?php if($current_url == base_url().'gallery/gallery/image_list'){ echo 'active'; } ?> ">
              <a href="javascript:void(0);">
                <i class="fa fa-file-image-o"></i>
                <span> Nisarg Nirmiti Construction</span>
                <span class="label label-primary pull-right"></span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
               
                <li><a href="<?php echo base_url()."project/Project"; ?>"><i class="fa fa-circle-o"></i>Project</a></li>
       
              </ul>
            </li>
           <!--  <li class="treeview">
              <a href="<?php echo base_url()."industry/industry"; ?>">
                <i class="fa fa-industry"></i> <span>Industry</span> 
              </a>
            </li> -->


            <!--<li class="treeview">
              <a href="<?php echo base_url()."project/project"; ?>">
                <i class="fa fa-tasks"></i> <span>Project</span> 
              </a> 
            </li>-->
            
            
            <!--<li class="treeview <?php if($current_url == base_url().'project/project' || $current_url == base_url().'project/project/project_details' ){ echo 'active'; } ?> ">-->
            <!--  <a href="javascript:void(0);">-->
            <!--    <i class="fa fa-tasks"></i> -->
            <!--    <span>Project</span>-->
            <!--    <span class="label label-primary pull-right"></span>-->
            <!--    <i class="fa fa-angle-right pull-right"></i>-->
            <!--  </a>-->
            <!--  <ul class="treeview-menu">-->
            <!--    <li><a href="<?php echo base_url()."project/project"; ?>"><i class="fa fa-circle-o"></i>Projects</a></li>-->

            <!--    <li><a href="<?php echo base_url() . "project/project/project_details"; ?>"><i class="fa fa-circle-o"></i>Project Details</a></li> -->

            <!--  </ul>-->
            <!--</li>-->


           <!--  <li class="treeview">
              <a href="<?php echo base_url()."staff/staff"; ?>">
                <i class="fa fa-group"></i> <span>Staff</span> 
              </a>
            </li> -->
             

            <!--  <li class="treeview">-->
            <!--  <a href="javascript:void(0);">-->
            <!--    <i class="fa fa fa-user"></i>-->
            <!--    <span>Testimonials</span>-->
            <!--    <span class="label label-primary pull-right"></span>-->
            <!--    <i class="fa fa-angle-right pull-right"></i>-->
            <!--  </a>-->
            <!--  <ul class="treeview-menu">-->
            <!--    <li><a href="<?php echo base_url() ."Testimonials/Testimonials"; ?>"><i class="fa fa-circle-o"></i>View Testimonials</a>-->
            <!--    </li>-->


            <!--  </ul>-->
            <!--</li>-->

            <!--<li class="treeview <?php if($current_url == base_url().'gallery/gallery/image_list'){ echo 'active'; } ?> ">-->
            <!--  <a href="javascript:void(0);">-->
            <!--    <i class="fa fa-file-image-o"></i>-->
            <!--    <span>Gallery</span>-->
            <!--    <span class="label label-primary pull-right"></span>-->
            <!--    <i class="fa fa-angle-right pull-right"></i>-->
            <!--  </a>-->
            <!--  <ul class="treeview-menu">-->
            <!--    <li><a href="<?php echo base_url() . "gallery/gallery/image_list"; ?>"><i class="fa fa-circle-o"></i>Image Gallery</a></li>-->

            <!--   <li><a href="<?php echo base_url() . "gallery/gallery/list_myhome"; ?>"><i class="fa fa-circle-o"></i>My Home</a></li> -->

            <!--  </ul>-->
            <!--</li>-->
              <li class="treeview <?php if($current_url == base_url().'admin/contact_us'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."admin/contact_us"; ?>">
                <i class="fa fa-phone"></i> <span>Contact Us</span> 
              </a>
            </li>

             <li class="treeview <?php if($current_url == base_url().'admin/quotation'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."admin/quotation"; ?>">
                <i class="fa fa-phone"></i> <span>Quotation</span> 
              </a>
            </li>
            <!--<li class="treeview <?php if($current_url == base_url().'event/event'){ echo 'active'; } ?> ">-->
            <!--  <a href="<?php echo base_url()."event/event"; ?>">-->
            <!--    <i class="fa fa-calendar"></i> <span>Event</span> -->
            <!--  </a>-->
            <!--</li>-->
                         <li <?php if($_SERVER['REQUEST_URI']=="/ventures/event_gallery") echo "class='active'";?> >
                             <a href="<?php echo base_url();?>event_gallery"><i class="fa fa-calendar-o" aria-hidden="true"></i><span>Event Gallery</span>
                             </a>
                             </li>


            <!--  <li class="treeview <?php if($current_url == base_url().'blog/blog'){ echo 'active'; } ?> ">-->
            <!--  <a href="<?php echo base_url()."blog/blog"; ?>">-->
            <!--    <i class="fa fa-newspaper-o"></i> <span>Blog</span> -->
            <!--  </a>-->
            <!--</li>-->
            
              <li class="treeview <?php if($current_url == base_url().'awards/awards'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."awards/awards"; ?>">
                <i class="fa fa-trophy"></i> <span>Awards</span> 
              </a>
            </li>
            
             <li class="treeview <?php if($current_url == base_url().'Testimonials/Testimonials/videos'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."Testimonials/Testimonials/videos"; ?>">
                <i class="fa fa-trophy"></i> <span>Testimonial</span> 
              </a>
            </li>

            <!--<li class="treeview <?php if($current_url == base_url().'news/news'){ echo 'active'; } ?>">-->
            <!--  <a href="<?php echo base_url()."news/news"; ?>">-->
            <!--    <i class="fa fa-newspaper-o"></i> <span>News</span> -->
            <!--  </a>-->
            <!--</li>-->

            <!--<li class="treeview <?php if($current_url == base_url().'gallery/gallery/video_list'){ echo 'active'; } ?> ">-->
            <!--  <a href="<?php echo base_url()."gallery/gallery/video_list"; ?>">-->
            <!--    <i class="fa fa-user"></i> <span>Happy Family </span> -->
            <!--  </a>-->
            <!--</li>-->
             <!-- <li class="treeview">
              <a href="<?php echo base_url()."clients/clients"; ?>">
                <i class="fa fa-user"></i> <span>Clients</span> 
              </a>
            </li> -->
            <!-- <li class="treeview <?php if($current_url == base_url().'subscribe/nri_enquiry'){ echo 'active'; } ?> ">-->
            <!--  <a href="<?php echo base_url()."subscribe/nri_enquiry"; ?>">-->
            <!--    <i class="fa fa-envelope"></i> <span>NRI Enquiry</span> -->
            <!--  </a>-->
            <!--</li>-->
            <!-- <li class="treeview <?php if($current_url == base_url().'subscribe/investor_enquiry'){ echo 'active'; } ?> ">-->
            <!--  <a href="<?php echo base_url()."subscribe/investor_enquiry"; ?>">-->
            <!--    <i class="fa fa-envelope"></i> <span>Investor Enquiry</span> -->
            <!--  </a>-->
            <!--</li>-->
            
            
            <li class="treeview <?php if($current_url == base_url().'slider_image/Slider'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."slider_image/Slider"; ?>">
                <i class="fa fa-sliders"></i> <span>Slider Images</span> 
              </a>
            </li>
            
            <!--<li class="treeview <?php if($current_url == base_url().'group_of_companies/group_of_companies'){ echo 'active'; } ?> ">-->
            <!--  <a href="<?php echo base_url()."group_of_companies/group_of_companies"; ?>">-->
            <!--    <i class="fa fa-users"></i> <span>Group Of Companies</span> -->
            <!--  </a>-->
            <!--</li>-->
            
            <!--<li class="treeview <?php if($current_url == base_url().'clients/clients'){ echo 'active'; } ?> ">-->
            <!--  <a href="<?php echo base_url()."clients/clients"; ?>">-->
            <!--    <i class="fa fa-user"></i> <span>Client</span> -->
            <!--  </a>-->
            <!--</li>-->

            <!-- <li class="treeview">
              <a href="<?php echo base_url()."subscribe"; ?>">
                <i class="fa fa-user"></i> <span>Subscribe User</span> 
              </a>
            </li> -->


           <!--  <li class="treeview">
              <a href="<?php echo base_url()."birthday/birthday/greetings_list"; ?>">
                <i class="fa fa-user"></i> <span>Greeting List</span> 
              </a>
            </li> -->


          
         </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <script>
      <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
      </script>