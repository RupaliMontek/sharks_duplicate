
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Profile
            <small>a set of beautiful profile</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#fa-icons" data-toggle="tab">Overview</a></li>
                  <li><a href="#glyphicons" data-toggle="tab">Account</a></li>
                </ul>
                <div class="tab-content">
                  <!-- Font Awesome icons -->
                  <div class="tab-pane active" id="fa-icons" >
                    <section id="new">
                      <h4 class="page-header">User Profile</h4>
                      <div class="row fontawesome-icon-list">
                        <!-- <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-bed"></i> fa-bed</div> -->

                      <div class="box-body">

                          <!-- text input -->
                          <div class="form-group">
                            <label>ID</label>
                            <input type="text" readonly class="form-control" placeholder="Enter Name" name="name" id="name" value="<?php echo $record->user_admin_id; ?>" />
                          </div>

                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" readonly class="form-control" placeholder="Enter Name" name="name" id="name" value="<?php echo $record->name; ?>" />
                          </div>

                          <div class="form-group">
                            <label>Email ID</label>
                            <input type="text" readonly class="form-control" placeholder="Enter Name" name="name" id="name" value="<?php echo $record->email; ?>" />
                          </div>

                          <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" readonly class="form-control" placeholder="Enter Name" name="name" id="name" value="<?php echo $record->contact; ?>" />
                          </div>

                      </div><!-- /.box-body -->
                      </div>
                    </section>
                  </div><!-- /#fa-icons -->
                  <!-- glyphicons-->
                  <div class="tab-pane" id="glyphicons">
                  <section id="new">
                    <h4 class="page-header">User Profile for Edit</h4>
                    <div class="row fontawesome-icon-list">
                      <!-- <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-bed"></i> fa-bed</div> -->
                      <div class="box-body">
                        <!-- <form role="form"> -->
                        <?php $attributes = array('role' => 'form', 'id' => 'editAdmin');
                        //echo form_open_multipart('manage_customer/manage_customer/update_customer', $attributes);
                        echo form_open_multipart('login/update_admin', $attributes);
                        ?>
                        <?php 
                        if(!empty($record)){
                        ?>
                        <input type="hidden" name="login_id" value="<?php if(!empty($record->user_admin_id)) echo $record->user_admin_id; ?>">
                        <!-- text input -->
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" value="<?php echo $record->name; ?>" />
                        </div>

                        <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="contact" id="contact" value="<?php echo $record->contact; ?>" />
                        </div>

                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" name="pass" id="pass" maxlength="100" />
                        </div>

                        <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Enter Confirm Password" name="repass" id="repass" maxlength="100" />
                        </div>

                        <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                        <!-- </form> -->
                        <?php } ?>

                        <?php echo form_close( ); ?>
                      </div><!-- /.box-body -->

                    </div>
                  </section>
                  <!-- <ul class="bs-glyphicons">
                  <li>
                  <span class="glyphicon glyphicon-adjust"></span>
                  <span class="glyphicon-class">glyphicon glyphicon-adjust</span>
                  </li>
                  </ul> -->

                  </div><!-- /#ion-icons -->

                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     </div>

<?php $this->load->view('template/footer'); ?>
<script type="text/javascript" src="<?php echo base_url();?>backend/validation_js/user/edit_admin.js"></script>
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
