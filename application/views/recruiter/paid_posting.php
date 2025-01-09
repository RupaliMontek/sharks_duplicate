<?php if ($this->session->flashdata('success')): ?>
    <script>
        $(document).ready(function() {
            toastr.success('<?php echo $this->session->flashdata('success'); ?>', 'Success');
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        $(document).ready(function() {
            toastr.error('<?php echo $this->session->flashdata('error'); ?>', 'Error');
        });
    </script>
<?php endif; ?>
<div class="pageTopSection">
<div class="container pt-5">
    <p style="text-align: center; font-weight: 700;">Plase contact to Admin for further process<br>
    <!--<button style="margin-top: 20px; background:#135da8;border: none;border-radius: 5px; color: #fff; text-align:center;padding:1px 20px; line-height: 35px;">Check Here</button>-->
</p>
</div>
<h4 class="text-center">OR</h4>
<div class="container mt-3">
    <!-- <p style="text-align: center; font-weight: 700;">Click here for payment<br>
    <button style="margin-top: 20px; background:#135da8;border: none;border-radius: 5px; color: #fff; text-align:center;padding:1px 20px; line-height: 35px;">Check Here</button> -->
</p>
</div>

<div class="container mt-5 forPricingTop">
    <h4>Pricing Plans For Everyone</h4>
    <p>No surprise fees. Cancel anytime.</p>
    <div class="frToggle">
   <div>Monthly<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label></div>
<div>
Yearly <small>(15% off)</small>
<label class="switch">
  <input type="checkbox" checked>
  <span class="slider round"></span>
</label>
</div>
</div>
</div>
</div>
<div class="container FrpricingBoxesss">
    <div class="row">
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="forPlanss firstPlan">
        <div class="frPlanTop">
            <h2>Starter Plan</h2>
        <h3><span>$0.99</span> / Month</h3>
        </div>
        <div class="frPlanBottom">
        <ul>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
        </ul>
        <a class="btn btn-primary" href="#">Chooese Plan </a>
        </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="forPlanss SecondPlan">
            <div class="frPlanTop">
        <h2>Starter Plan</h2>
        <h3><span>$0.99</span> / Month</h3>
        </div>
        <div class="frPlanBottom">
        <ul>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
        </ul>
        <a class="btn btn-primary" href="#">Chooese Plan </a>
        </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="forPlanss ThirdPlan">
        <div class="frPlanTop">
            <h2>Starter Plan</h2>
        <h3><span>$0.99</span> / Month</h3>
        </div>
        <div class="frPlanBottom">
        <ul>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
            <li><span>One</span></li>
        </ul>
        <a class="btn btn-primary" href="#">Chooese Plan </a>
        </div>
        </div>
        </div>
    </div>
</div>