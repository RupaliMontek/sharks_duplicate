      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url();?>backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />

            </div>
            <div class="pull-left info">
              <p><?php 
                  if($this->session->userdata('user_name')!=''){
                    echo ucfirst($this->session->userdata('user_name'));
                  }
                  ?></p>
            </div>
          </div>
        
          <ul class="sidebar-menu">
            <?php $current_url = current_url(); ?>
            <li class="treeview <?php if($current_url == base_url().'admin'){ echo 'active'; } ?>" >
              <a href="<?php echo base_url(); ?>admin">
                <i class="fa fa-dashboard"></i> <span>Dashboard <?php //echo $current_url; ?></span> 
              </a>
            </li>
            <li class="treeview <?php if($current_url == base_url().'slider_image/slider'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."slider_image/slider"; ?>">
                <i class="fa fa-phone"></i> <span>Slider</span> 
              </a>
            </li>
            <li class="treeview <?php if($current_url == base_url().'testimonial'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."testimonial"; ?>">
                <i class="fa fa-phone"></i> <span>Testimonial Video </span> 
              </a>
            </li>
             <li <?php if($current_url == base_url().'testimonial/content') echo "class='active'";?>>
                 <a
                    href="<?php echo base_url();?>testimonial/content"><i class="fa fa-money"></i><span>Testimonials Content</span>
                </a>
            </li>
                    
            <li class="treeview <?php if($current_url == base_url().'career_enquiry/apply_now'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."career_enquiry/apply_now"; ?>">
                <i class="fa fa-phone"></i> <span>Career Enquiry</span> 
              </a>
            </li>
            <li class="treeview <?php if($current_url == base_url().'subscribe/contact'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."subscribe/contact"; ?>">
                <i class="fa fa-phone"></i> <span>Contact Us</span> 
              </a>
            </li>

              <li class="treeview <?php if($current_url == base_url().'blog/blog'){ echo 'active'; } ?> ">
              <a href="<?php echo base_url()."blog/blog"; ?>">
                <i class="fa fa-newspaper-o"></i> <span>Blog</span> 
              </a>
            </li>          
         </ul>
        </section>
        <!-- /.sidebar -->
      </aside>