<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
      </style>
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Start Exit Process For an Employee</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="javascript:void(0);">Employee Offboarding</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <a href="<?php echo base_url();?>user/admin_user"><button type="button" class="btn btn-primary btn-lg " >BACK</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="box-warning">
                <div class="box-body">
                  <!-- <form role="form"> -->
                  <?php $attributes = array('role' => 'form', 'id' => 'addUser');
      						echo form_open_multipart('user/admin_user/save', $attributes);
      				    ?>
                  <?php $iid = $this->session->userdata('user_id'); ?>
                  <input type="hidden" class="form-control" name="added_by_user_admin_id" id="added_by_user_admin_id" value="<?php echo $iid;?>" />
                    <!-- text input -->
                    <div class="form-group col-md-4">
                      <label>*Employee Selection</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="radio" id="html" name="" value="HTML">
                         <label for="html">Add a new employee to the system</label>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="radio" id="html" name="" value="HTML">
                         <label for="html">Select an existing employee</label>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Employee Name</label>
                      <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" />
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Employee No</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                     <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" />
                    </div>
                     <div class="form-group col-md-6">
                      <label>Date of joining</label>
                      <input type="date" class="form-control" placeholder="Enter Name" name="name" id="name" />
                    </div>


                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Last working date</label>
                      <input type="date" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Type of exit</label>
                     <select class="form-control">
                         <option>Absconding</option>
                         <option>Resigned</option>
                         <option>Retired</option>
                         <option>Termination</option>
                     </select>
                    </div>

                     <div class="form-group col-md-12">
                          <input type="checkbox" id="" name="" value="">
                          <label for="vehicle1">Check to send the exit survey form to the exiting employee when the Exit is initiated</label>
                      
                    </div>

                     <div class="form-group col-md-12">
                      <label>Select clearance managers</label>
                        <textarea id="" name="" rows="6" cols="20">The following are the clearance types setup for you.
                        - You can uncheck any of these to avoid a clearance of that specific type.
                        - You can also change the clearance managers to another manager, if required. Clear the existing name and type the new employee name.
                        - You can add/edit clearance types and assign default managers for each clearance type in Settings.
                        - Clearance managers will be notified through email when an exit is initiated
                        </textarea>
                    </div>
                      <div class="form-group col-md-12">
                     <table>
                          <tr>
                            <th>All</th>
                            <th>Clearance type  </th>
                            <th>Select clearance managers</th>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="" name="" value=""></td>
                            <td>Clearance from Department</td>
                            <td><input type="text" class="form-control" placeholder="swara" name="name" id="name" /></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="" name="" value=""></td>
                            <td>Clearance from Finance</td>
                             <td><input type="text" class="form-control" placeholder="swara" name="name" id="name" /></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="" name="" value=""></td>
                            <td>Clearance from IT</td>
                             <td><input type="text" class="form-control" placeholder="swara" name="name" id="name" /></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="" name="" value=""></td>
                            <td>Clearance from HR</td>
                             <td><input type="text" class="form-control" placeholder="swara" name="name" id="name" /></td>
                          </tr>
                        </table>
                    </div>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                    
                  <!-- </form> -->


				<?php echo form_close( ); ?>


                </div><!-- /.box-body -->
              </div><!-- /.box -->

                </div><!-- /.box-body -->
                
                
                 <div class="box-body">
                  <div class=" box-warning">
                <div class="box-body">
                  <!-- <form role="form"> -->
                  <?php $attributes = array('role' => 'form', 'id' => 'addUser');
      						echo form_open_multipart('user/admin_user/save', $attributes);
      				    ?>
                  <?php $iid = $this->session->userdata('user_id'); ?>
                  <input type="hidden" class="form-control" name="added_by_user_admin_id" id="added_by_user_admin_id" value="<?php echo $iid;?>" />
                    <!-- text input -->
                    <div class="form-group col-md-12">
                      <h4>Select an existing employee form here</h4>
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label>Employee Name</label>
                      <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" />
                    </div>

                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Last working date</label>
                      <input type="date" class="form-control" name="email" id="email" placeholder="Enter email">
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label>Type of exit</label>
                     <select class="form-control">
                         <option>Absconding</option>
                         <option>Resigned</option>
                         <option>Retired</option>
                         <option>Termination</option>
                     </select>
                    </div>
                 </div>
                 </div>
                     <div class="form-group col-md-12">
                          <input type="checkbox" id="" name="" value="">
                          <label for="vehicle1">Check to send the exit survey form to the exiting employee when the Exit is initiated</label>
                      
                    </div>

                     <div class="form-group col-md-12">
                      <label>Select clearance managers</label>
                        <textarea id="" name="" rows="6" cols="20">The following are the clearance types setup for you.
                        - You can uncheck any of these to avoid a clearance of that specific type.
                        - You can also change the clearance managers to another manager, if required. Clear the existing name and type the new employee name.
                        - You can add/edit clearance types and assign default managers for each clearance type in Settings.
                        - Clearance managers will be notified through email when an exit is initiated
                        </textarea>
                    </div>
                      <div class="form-group col-md-12">
                     <table>
                          <tr>
                            <th>All</th>
                            <th>Clearance type  </th>
                            <th>Select clearance managers</th>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="" name="" value=""></td>
                            <td>Clearance from Department</td>
                            <td><input type="text" class="form-control" placeholder="swara" name="name" id="name" /></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="" name="" value=""></td>
                            <td>Clearance from Finance</td>
                             <td><input type="text" class="form-control" placeholder="swara" name="name" id="name" /></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="" name="" value=""></td>
                            <td>Clearance from IT</td>
                             <td><input type="text" class="form-control" placeholder="swara" name="name" id="name" /></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox" id="" name="" value=""></td>
                            <td>Clearance from HR</td>
                             <td><input type="text" class="form-control" placeholder="swara" name="name" id="name" /></td>
                          </tr>
                        </table>
                    </div>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                    
                  <!-- </form> -->


				<?php echo form_close( ); ?>


                </div><!-- /.box-body -->
              </div><!-- /.box -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php $this->load->view('template/footer'); ?>
