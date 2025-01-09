
   <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

 
    <!-- jQuery 2.1.4 -->
    <!-- <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
    <script src="<?php echo base_url();?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    

<!-- js for validation-->
    <script src="<?php echo base_url();?>backend/plugins/jQueryUI/jquery.validate.js"></script>
<!-- js for validation-->


     
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <!-- <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url();?>backend/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <!-- <script src="plugins/morris/morris.min.js" type="text/javascript"></script> -->
    <!-- <script src="<?php //echo base_url() . "backend/plugins/morris/morris.min.js"; ?>"></script> -->




    <!-- Sparkline -->
    <script src="<?php echo base_url();?>backend/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->



    <script src="<?php echo base_url();?>backend/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>backend/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->


    <script src="<?php echo base_url();?>backendplugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->


    <script src="<?php echo base_url();?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->


    <script src="<?php echo base_url();?>backend/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->

    <script src="<?php echo base_url();?>backend/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->


    <script src="<?php echo base_url();?>backend/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <!-- <script src="<?php //echo base_url() . "backend/dist/js/pages/dashboard.js"; ?>" type="text/javascript"></script> -->
    <!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url();?>backend/dist/js/demo.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>backend/validation_js/admin_dashboard/admin_dashboard.js"></script>


     <script type="text/javascript" src="<?php echo base_url();?>backend/validation_js/category/add_category.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>frontend/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

 <script>
  $(document).ready(function(){
    var date_input=$('input[id="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
     format: 'dd/mm/yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
      
    })
  })

    $(function () {
        $('#datetimepicker1').datetimepicker();
    });

</script>
  </body>
</html>
     