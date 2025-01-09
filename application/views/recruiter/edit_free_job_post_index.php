<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    #previewSection {
    border: 1px solid #ccc;
    padding: 10px;
    margin-top: 20px;
    background-color: #f9f9f9;
}
.social-media-checkbox {
    display: flex;
    gap: 20px;
}

.social-media-checkbox label {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.social-media-checkbox input[type="checkbox"] {
    display: none;
}

.social-media-checkbox i {
    font-size: 24px;
    color: #555;
}

.social-media-checkbox input[type="checkbox"]:checked + i {
    color: #007bff;
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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



<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type = "text/javascript" src = "<?php echo base_url();?>/frontend/js/multiselect-dropdown.js"></script>
<div class="container-fluid innerpagecontainer">
    <div class="container">
        <div class="content-wrapper">
    
    <section class="content">
        <div class="row">
            <div class="col-md-8">

    <section class="content-header">
        <h1>Add Job Post</h1>
    </section>
    <div class="box">
        <div class="box-body">
            <div class="box box-warning">
        <form action="<?php echo base_url("job_post/edit_company_registration"); ?>" method="POST" id="form_job_postss" name="form_job_post" >
        <?php if (!empty($job_data) && isset($job_data[0])): ?>
    <input type="hidden" name="company_id" id="company_id" value="<?php echo htmlspecialchars($companyId); ?>"/>  
    <input type="hidden" name="user_admin_id" id="user_admin_id" value="<?php echo htmlspecialchars($user_admin_id); ?>">
    <input type="hidden" name="job_id" id="job_id" value="<?php echo htmlspecialchars($job_data[0]['job_id']); ?>">
    <div class="mb-3">
        <label class="form-label" for="profile">Job Title<span style="color: red;">*</span></label>
        <input type="text" class="form-control" name="profile" id="profile" value="<?php echo htmlspecialchars($job_data[0]['profile']); ?>" required>
    </div>

        <div class="mb-3">
        <label class="form-label"  for="key_skills">key skills<span style="color: red;">*</span></label>
        <input autocomplete="off" class="form-control" type="text" name="key_skills" id="key_skills" value="<?php echo htmlspecialchars($job_data[0]['key_skills']); ?>" required >
        </div> 
        
        <div class="mb-3">
    <label class="form-label" for="min_exp_candidate">Min Exp Candidate<span style="color: red;">*</span></label>
    <select class="form-control" name="min_exp_candidate" id="min_exp_candidate" required>
        <option value="" <?php echo ($job_data[0]['min_exp_candidate'] === '') ? 'selected' : ''; ?>>Select Min Exp</option>
        <option value="0" <?php echo ($job_data[0]['min_exp_candidate'] == '0') ? 'selected' : ''; ?>>0 Year</option>
        <option value="1" <?php echo ($job_data[0]['min_exp_candidate'] == '1') ? 'selected' : ''; ?>>1 Year</option>
        <option value="2" <?php echo ($job_data[0]['min_exp_candidate'] == '2') ? 'selected' : ''; ?>>2 Years</option>
        <option value="3" <?php echo ($job_data[0]['min_exp_candidate'] == '3') ? 'selected' : ''; ?>>3 Years</option>
        <option value="4" <?php echo ($job_data[0]['min_exp_candidate'] == '4') ? 'selected' : ''; ?>>4 Years</option>
        <option value="5" <?php echo ($job_data[0]['min_exp_candidate'] == '5') ? 'selected' : ''; ?>>5 Years</option>
        <option value="6" <?php echo ($job_data[0]['min_exp_candidate'] == '6') ? 'selected' : ''; ?>>6 Years</option>
        <option value="7" <?php echo ($job_data[0]['min_exp_candidate'] == '7') ? 'selected' : ''; ?>>7 Years</option>
        <option value="8" <?php echo ($job_data[0]['min_exp_candidate'] == '8') ? 'selected' : ''; ?>>8 Years</option>
        <option value="9" <?php echo ($job_data[0]['min_exp_candidate'] == '9') ? 'selected' : ''; ?>>9 Years</option>
        <option value="10" <?php echo ($job_data[0]['min_exp_candidate'] == '10') ? 'selected' : ''; ?>>10 Years</option>
        <option value="11" <?php echo ($job_data[0]['min_exp_candidate'] == '11') ? 'selected' : ''; ?>>11 Years</option>
        <option value="12" <?php echo ($job_data[0]['min_exp_candidate'] == '12') ? 'selected' : ''; ?>>12 Years</option>
        <option value="13" <?php echo ($job_data[0]['min_exp_candidate'] == '13') ? 'selected' : ''; ?>>13 Years</option>
        <option value="14" <?php echo ($job_data[0]['min_exp_candidate'] == '14') ? 'selected' : ''; ?>>14 Years</option>
        <option value="15" <?php echo ($job_data[0]['min_exp_candidate'] == '15') ? 'selected' : ''; ?>>15 Years</option>
        <option value="16" <?php echo ($job_data[0]['min_exp_candidate'] == '16') ? 'selected' : ''; ?>>16 Years</option>
        <option value="17" <?php echo ($job_data[0]['min_exp_candidate'] == '17') ? 'selected' : ''; ?>>17 Years</option>
        <option value="18" <?php echo ($job_data[0]['min_exp_candidate'] == '18') ? 'selected' : ''; ?>>18 Years</option>
    </select>
</div>
  
      
<div class="mb-3">
    <label class="form-label" for="max_exp_candidate">Max Exp Candidate<span style="color: red;">*</span></label>
    <select class="form-control" name="max_exp_candidate" id="max_exp_candidate" required>
        <option value="" <?php echo ($job_data[0]['max_exp_candidate'] === '') ? 'selected' : ''; ?>>Select Max Exp</option>
        <option value="0" <?php echo ($job_data[0]['max_exp_candidate'] == '0') ? 'selected' : ''; ?>>0 Year</option>
        <option value="1" <?php echo ($job_data[0]['max_exp_candidate'] == '1') ? 'selected' : ''; ?>>1 Year</option>
        <option value="2" <?php echo ($job_data[0]['max_exp_candidate'] == '2') ? 'selected' : ''; ?>>2 Years</option>
        <option value="3" <?php echo ($job_data[0]['max_exp_candidate'] == '3') ? 'selected' : ''; ?>>3 Years</option>
        <option value="4" <?php echo ($job_data[0]['max_exp_candidate'] == '4') ? 'selected' : ''; ?>>4 Years</option>
        <option value="5" <?php echo ($job_data[0]['max_exp_candidate'] == '5') ? 'selected' : ''; ?>>5 Years</option>
        <option value="6" <?php echo ($job_data[0]['max_exp_candidate'] == '6') ? 'selected' : ''; ?>>6 Years</option>
        <option value="7" <?php echo ($job_data[0]['max_exp_candidate'] == '7') ? 'selected' : ''; ?>>7 Years</option>
        <option value="8" <?php echo ($job_data[0]['max_exp_candidate'] == '8') ? 'selected' : ''; ?>>8 Years</option>
        <option value="9" <?php echo ($job_data[0]['max_exp_candidate'] == '9') ? 'selected' : ''; ?>>9 Years</option>
        <option value="10" <?php echo ($job_data[0]['max_exp_candidate'] == '10') ? 'selected' : ''; ?>>10 Years</option>
        <option value="11" <?php echo ($job_data[0]['max_exp_candidate'] == '11') ? 'selected' : ''; ?>>11 Years</option>
        <option value="12" <?php echo ($job_data[0]['max_exp_candidate'] == '12') ? 'selected' : ''; ?>>12 Years</option>
        <option value="13" <?php echo ($job_data[0]['max_exp_candidate'] == '13') ? 'selected' : ''; ?>>13 Years</option>
        <option value="14" <?php echo ($job_data[0]['max_exp_candidate'] == '14') ? 'selected' : ''; ?>>14 Years</option>
        <option value="15" <?php echo ($job_data[0]['max_exp_candidate'] == '15') ? 'selected' : ''; ?>>15 Years</option>
        <option value="16" <?php echo ($job_data[0]['max_exp_candidate'] == '16') ? 'selected' : ''; ?>>16 Years</option>
        <option value="17" <?php echo ($job_data[0]['max_exp_candidate'] == '17') ? 'selected' : ''; ?>>17 Years</option>
        <option value="18" <?php echo ($job_data[0]['max_exp_candidate'] == '18') ? 'selected' : ''; ?>>18 Years</option>
    </select>
</div>
      
<div class="mb-3">
    <label class="form-label" for="min_salary">Min Salary</label>
    <select class="form-control" name="min_salary" id="min_salary" required>
        <option value="" <?php echo ($job_data[0]['min_salary'] === '') ? 'selected' : ''; ?>>Select Min Salary</option>
        <option value="less_50000_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == 'less_50000_per_year') ? 'selected' : ''; ?>>Less than ₹ 50,000/Year</option>
        <option value="50000_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '50000_per_year') ? 'selected' : ''; ?>>₹ 50,000/Year</option>
        <option value="1.0_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '1.0_lakh_per_year') ? 'selected' : ''; ?>>₹ 1.0 Lakh /Year</option>
        <option value="1.5_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '1.5_lakh_per_year') ? 'selected' : ''; ?>>₹ 1.5 Lakh /Year</option>
        <option value="2.0_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '2.0_lakh_per_year') ? 'selected' : ''; ?>>₹ 2.0 Lakh /Year</option>
        <option value="2.5_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '2.5_lakh_per_year') ? 'selected' : ''; ?>>₹ 2.5 Lakh /Year</option>
        <option value="3.0_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '3.0_lakh_per_year') ? 'selected' : ''; ?>>₹ 3.0 Lakh /Year</option>
        <option value="3.5_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '3.5_lakh_per_year') ? 'selected' : ''; ?>>₹ 3.5 Lakh /Year</option>
        <option value="4.0_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '4.0_lakh_per_year') ? 'selected' : ''; ?>>₹ 4.0 Lakh /Year</option>
        <option value="4.5_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '4.5_lakh_per_year') ? 'selected' : ''; ?>>₹ 4.5 Lakh /Year</option>
        <option value="5_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '5_lakh_per_year') ? 'selected' : ''; ?>>₹ 5 Lakh /Year</option>
        <option value="6_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '6_lakh_per_year') ? 'selected' : ''; ?>>₹ 6 Lakh /Year</option>
        <option value="7_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '7_lakh_per_year') ? 'selected' : ''; ?>>₹ 7 Lakh /Year</option>
        <option value="8_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '8_lakh_per_year') ? 'selected' : ''; ?>>₹ 8 Lakh /Year</option>
        <option value="9_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '9_lakh_per_year') ? 'selected' : ''; ?>>₹ 9 Lakh /Year</option>
        <option value="10_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '10_lakh_per_year') ? 'selected' : ''; ?>>₹ 10 Lakh /Year</option>
        <option value="11_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '11_lakh_per_year') ? 'selected' : ''; ?>>₹ 11 Lakh /Year</option>
        <option value="12_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '12_lakh_per_year') ? 'selected' : ''; ?>>₹ 12 Lakh /Year</option>
        <option value="13_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '13_lakh_per_year') ? 'selected' : ''; ?>>₹ 13 Lakh /Year</option>
        <option value="14_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '14_lakh_per_year') ? 'selected' : ''; ?>>₹ 14 Lakh /Year</option>
        <option value="15_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '15_lakh_per_year') ? 'selected' : ''; ?>>₹ 15 Lakh /Year</option>
        <option value="16_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '16_lakh_per_year') ? 'selected' : ''; ?>>₹ 16 Lakh /Year</option>
        <option value="17_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '17_lakh_per_year') ? 'selected' : ''; ?>>₹ 17 Lakh /Year</option>
        <option value="18_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '18_lakh_per_year') ? 'selected' : ''; ?>>₹ 18 Lakh /Year</option>
        <option value="19_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '19_lakh_per_year') ? 'selected' : ''; ?>>₹ 19 Lakh /Year</option>
        <option value="20_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '20_lakh_per_year') ? 'selected' : ''; ?>>₹ 20 Lakh /Year</option>
        <option value="21_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '21_lakh_per_year') ? 'selected' : ''; ?>>₹ 21 Lakh /Year</option>
        <option value="22_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '22_lakh_per_year') ? 'selected' : ''; ?>>₹ 22 Lakh /Year</option>
        <option value="23_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '23_lakh_per_year') ? 'selected' : ''; ?>>₹ 23 Lakh /Year</option>
        <option value="24_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '24_lakh_per_year') ? 'selected' : ''; ?>>₹ 24 Lakh /Year</option>
        <option value="25_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '25_lakh_per_year') ? 'selected' : ''; ?>>₹ 25 Lakh /Year</option>
        <option value="26_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '26_lakh_per_year') ? 'selected' : ''; ?>>₹ 26 Lakh /Year</option>
        <option value="27_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '27_lakh_per_year') ? 'selected' : ''; ?>>₹ 27 Lakh /Year</option>
        <option value="28_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '28_lakh_per_year') ? 'selected' : ''; ?>>₹ 28 Lakh /Year</option>
        <option value="29_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '29_lakh_per_year') ? 'selected' : ''; ?>>₹ 29 Lakh /Year</option>
        <option value="30_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '30_lakh_per_year') ? 'selected' : ''; ?>>₹ 30 Lakh /Year</option>
        <option value="31_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '31_lakh_per_year') ? 'selected' : ''; ?>>₹ 31 Lakh /Year</option>
        <option value="32_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '32_lakh_per_year') ? 'selected' : ''; ?>>₹ 32 Lakh /Year</option>
        <option value="33_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '33_lakh_per_year') ? 'selected' : ''; ?>>₹ 33 Lakh /Year</option>
        <option value="34_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '34_lakh_per_year') ? 'selected' : ''; ?>>₹ 34 Lakh /Year</option>
        <option value="35_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '35_lakh_per_year') ? 'selected' : ''; ?>>₹ 35 Lakh /Year</option>
        <option value="36_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '36_lakh_per_year') ? 'selected' : ''; ?>>₹ 36 Lakh /Year</option>
        <option value="37_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '37_lakh_per_year') ? 'selected' : ''; ?>>₹ 37 Lakh /Year</option>
        <option value="38_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '38_lakh_per_year') ? 'selected' : ''; ?>>₹ 38 Lakh /Year</option>
        <option value="39_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '39_lakh_per_year') ? 'selected' : ''; ?>>₹ 39 Lakh /Year</option>
        <option value="40_lakh_per_year" <?php echo ($job_data[0]['comany_min_package_offer'] == '40_lakh_per_year') ? 'selected' : ''; ?>>₹ 40 Lakh /Year</option>
    </select>
</div>
      
<div class="mb-3">
    <label class="form-label" for="max_salary">Max Salary</label>
    <select class="form-control" name="max_salary" id="max_salary">
        <option value="" <?php echo empty($job_data[0]['max_salary']) ? 'selected' : ''; ?>>Select Max Salary</option>
        <option value="less_50000_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == 'less_50000_per_year') ? 'selected' : ''; ?>>Less than ₹ 50,000/Year</option>
        <option value="50000_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '50000_per_year') ? 'selected' : ''; ?>>₹ 50,000/Year</option>
        <option value="1.0_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '1.0_lakh_per_year') ? 'selected' : ''; ?>>₹ 1.0 Lakh /Year</option>
        <option value="1.5_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '1.5_lakh_per_year') ? 'selected' : ''; ?>>₹ 1.5 Lakh /Year</option>
        <option value="2.0_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '2.0_lakh_per_year') ? 'selected' : ''; ?>>₹ 2.0 Lakh /Year</option>
        <option value="2.5_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '2.5_lakh_per_year') ? 'selected' : ''; ?>>₹ 2.5 Lakh /Year</option>
        <option value="3.0_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '3.0_lakh_per_year') ? 'selected' : ''; ?>>₹ 3.0 Lakh /Year</option>
        <option value="3.5_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '3.5_lakh_per_year') ? 'selected' : ''; ?>>₹ 3.5 Lakh /Year</option>
        <option value="4.0_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '4.0_lakh_per_year') ? 'selected' : ''; ?>>₹ 4.0 Lakh /Year</option>
        <option value="4.5_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '4.5_lakh_per_year') ? 'selected' : ''; ?>>₹ 4.5 Lakh /Year</option>
        <option value="5_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '5_lakh_per_year') ? 'selected' : ''; ?>>₹ 5 Lakh /Year</option>
        <option value="6_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '6_lakh_per_year') ? 'selected' : ''; ?>>₹ 6 Lakh /Year</option>
        <option value="7_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '7_lakh_per_year') ? 'selected' : ''; ?>>₹ 7 Lakh /Year</option>
        <option value="8_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '8_lakh_per_year') ? 'selected' : ''; ?>>₹ 8 Lakh /Year</option>
        <option value="9_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '9_lakh_per_year') ? 'selected' : ''; ?>>₹ 9 Lakh /Year</option>
        <option value="10_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '10_lakh_per_year') ? 'selected' : ''; ?>>₹ 10 Lakh /Year</option>
        <option value="11_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '11_lakh_per_year') ? 'selected' : ''; ?>>₹ 11 Lakh /Year</option>
        <option value="12_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '12_lakh_per_year') ? 'selected' : ''; ?>>₹ 12 Lakh /Year</option>
        <option value="13_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '13_lakh_per_year') ? 'selected' : ''; ?>>₹ 13 Lakh /Year</option>
        <option value="14_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '14_lakh_per_year') ? 'selected' : ''; ?>>₹ 14 Lakh /Year</option>
        <option value="15_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '15_lakh_per_year') ? 'selected' : ''; ?>>₹ 15 Lakh /Year</option>
        <option value="16_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '16_lakh_per_year') ? 'selected' : ''; ?>>₹ 16 Lakh /Year</option>
        <option value="17_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '17_lakh_per_year') ? 'selected' : ''; ?>>₹ 17 Lakh /Year</option>
        <option value="18_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '18_lakh_per_year') ? 'selected' : ''; ?>>₹ 18 Lakh /Year</option>
        <option value="19_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '19_lakh_per_year') ? 'selected' : ''; ?>>₹ 19 Lakh /Year</option>
        <option value="20_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '20_lakh_per_year') ? 'selected' : ''; ?>>₹ 20 Lakh /Year</option>
        <option value="21_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '21_lakh_per_year') ? 'selected' : ''; ?>>₹ 21 Lakh /Year</option>
        <option value="22_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '22_lakh_per_year') ? 'selected' : ''; ?>>₹ 22 Lakh /Year</option>
        <option value="23_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '23_lakh_per_year') ? 'selected' : ''; ?>>₹ 23 Lakh /Year</option>
        <option value="24_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '24_lakh_per_year') ? 'selected' : ''; ?>>₹ 24 Lakh /Year</option>
        <option value="25_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '25_lakh_per_year') ? 'selected' : ''; ?>>₹ 25 Lakh /Year</option>
        <option value="26_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '26_lakh_per_year') ? 'selected' : ''; ?>>₹ 26 Lakh /Year</option>
        <option value="27_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '27_lakh_per_year') ? 'selected' : ''; ?>>₹ 27 Lakh /Year</option>
        <option value="28_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '28_lakh_per_year') ? 'selected' : ''; ?>>₹ 28 Lakh /Year</option>
        <option value="29_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '29_lakh_per_year') ? 'selected' : ''; ?>>₹ 29 Lakh /Year</option>
        <option value="30_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '30_lakh_per_year') ? 'selected' : ''; ?>>₹ 30 Lakh /Year</option>
        <option value="31_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '31_lakh_per_year') ? 'selected' : ''; ?>>₹ 31 Lakh /Year</option>
        <option value="32_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '32_lakh_per_year') ? 'selected' : ''; ?>>₹ 32 Lakh /Year</option>
        <option value="33_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '33_lakh_per_year') ? 'selected' : ''; ?>>₹ 33 Lakh /Year</option>
        <option value="34_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '34_lakh_per_year') ? 'selected' : ''; ?>>₹ 34 Lakh /Year</option>
        <option value="35_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '35_lakh_per_year') ? 'selected' : ''; ?>>₹ 35 Lakh /Year</option>
        <option value="36_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '36_lakh_per_year') ? 'selected' : ''; ?>>₹ 36 Lakh /Year</option>
        <option value="37_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '37_lakh_per_year') ? 'selected' : ''; ?>>₹ 37 Lakh /Year</option>
        <option value="38_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '38_lakh_per_year') ? 'selected' : ''; ?>>₹ 38 Lakh /Year</option>
        <option value="39_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '39_lakh_per_year') ? 'selected' : ''; ?>>₹ 39 Lakh /Year</option>
        <option value="40_lakh_per_year" <?php echo ($job_data[0]['comany_max_package_offer'] == '40_lakh_per_year') ? 'selected' : ''; ?>>₹ 40 Lakh /Year</option>
    </select>
</div>

    <div class="mb-3">
        <label class="form-label" for="job_country">Job Country<span style="color: red;">*</span></label>
        <select onchange="get_state_list(this.value); updatePreview();" class="form-control" name="job_country" id="job_country" required>
            <option value="" selected>Select Country</option>
            <?php 
            $selectedCountry = $job_data[0]['country_id'] ?? ''; 
            foreach ($country_list as $row) { 
                $isSelected = ($row['id'] == $selectedCountry) ? 'selected' : ''; 
            ?>
                <option value="<?= htmlspecialchars($row['id']); ?>" <?= $isSelected; ?>>
                    <?= htmlspecialchars($row['name']); ?>
                </option>
            <?php } ?>
        </select>
    </div>


        
    <div class="mb-3">
    <label class="form-label" for="job_state">Job State<span style="color: red;">*</span></label>
    <select onchange="get_city_list(this.value); updateStatePreview();" class="form-control" name="job_state" id="job_state" required>
        <option value="" selected>Select State</option>
        <?php 
        // Fetch states from the database
        $states = $this->db->query("SELECT `id`, `name`, `country_id` FROM `states` WHERE 1")->result_array();
        foreach ($states as $state) {
            $selected = ($state['id'] == $job_data[0]['state_id']) ? 'selected' : '';
            echo "<option value='" . $state['id'] . "' $selected>" . htmlspecialchars($state['name']) . "</option>";
        }
        ?>
    </select>
</div>

        
<div class="mb-3">
    <label class="form-label" for="job_location">Job City<span style="color: red;">*</span></label>
    <select onchange="updateCityPreview();" class="form-control" name="job_location" id="job_location" required>
        <option value="" selected>Select Job Location</option>
        <?php 
        // Fetch cities for the selected state (assumed state_id is available as $job_data[0]['state_id'])
        $cities = $this->db->query("SELECT `id`, `name` FROM `cities` WHERE `state_id` = ?", [$job_data[0]['state_id']])->result_array();
        
        foreach ($cities as $city) {
            $selected = ($city['id'] == $job_data[0]['job_location']) ? 'selected' : '';
            echo "<option value='" . $city['id'] . "' $selected>" . htmlspecialchars($city['name']) . "</option>";
        }
        ?>
    </select>
</div>

      <div class="mb-3">
    <label class="form-label" for="job_opening_address">Job Opening Address<span style="color: red;">*</span></label>
    <textarea autocomplete="off" class="form-control" name="job_opening_address" id="job_opening_address" required><?php echo htmlspecialchars($job_data[0]['job_opening_address']); ?></textarea>
</div>

        
        <div class="mb-3">
        <label class="form-label"  for="job_opening_area_pincode">Job Opening Area Pin Code<span style="color: red;">*</span></label>
        <input autocomplete="off" type="text" class="form-control" type="job_opening_area_pincode" name="job_opening_area_pincode" id="job_opening_area_pincode"  value="<?php echo htmlspecialchars($job_data[0]['job_opening_area_pincode']); ?>" required>
        </div>
      <!-- <div class="mb-3">
            <label class="form-label"  for="job_pincode">Job Pincode</label>
        <input autocomplete="off" class="form-control" type="text" name="job_pincode" id="job_pincode">
      </div> -->
      <div class="mb-3">
    <label class="form-label" for="shift_type">Shift Type<span style="color: red;">*</span></label>
    <select class="form-control" name="shift_type" id="shift_type" required>
        <option value="" selected>Select Shift Type</option>
        <option value="Morning" <?= isset($job_data[0]['shift_type']) && $job_data[0]['shift_type'] === 'Morning' ? 'selected' : ''; ?>>Morning</option>
        <option value="Noon" <?= isset($job_data[0]['shift_type']) && $job_data[0]['shift_type'] === 'Noon' ? 'selected' : ''; ?>>Noon</option>
        <option value="Evening" <?= isset($job_data[0]['shift_type']) && $job_data[0]['shift_type'] === 'Evening' ? 'selected' : ''; ?>>Evening</option>
        <option value="Night" <?= isset($job_data[0]['shift_type']) && $job_data[0]['shift_type'] === 'Night' ? 'selected' : ''; ?>>Night</option>
        <option value="Split" <?= isset($job_data[0]['shift_type']) && $job_data[0]['shift_type'] === 'Split' ? 'selected' : ''; ?>>Split</option>
        <option value="Rotating" <?= isset($job_data[0]['shift_type']) && $job_data[0]['shift_type'] === 'Rotating' ? 'selected' : ''; ?>>Rotating</option>
    </select>
</div>


<div class="mb-3">
    <label class="form-label" for="job_descriptions">Job Descriptions<span style="color: red;">*</span></label>
    <input name="job_descriptions" type="text" class="form-control" id="job_descriptions"  value="<?php echo htmlspecialchars($job_data[0]['job_descriptions']); ?>">
</div>

<script src="https://cdn.tiny.cloud/1/bqpg1i47n6cdlqccyer835q7nirw6kmgegc9yyprprxowv19/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        tinymce.init({
            selector: '#job_descriptions',
            height: 300,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            setup: function(editor) {
                // Update the preview on content change
                editor.on('input', function () {
                    const content = tinymce.get("job_descriptions").getContent();
                    document.getElementById("preview_job_descriptions").innerHTML = content;
                });
            }
        });
    });
</script>

<div class="mb-3">
    <label class="form-label" for="industry_type">Industry Type <span style="color: red;">*</span></label>
    <select class="form-control" name="industry_type" id="industry_type" required>
        <option value="">Select Industry Type</option>

        <optgroup label="IT Services">
            <option value="IT Services" <?php echo ($job_data[0]['industry_type'] == 'IT Services') ? 'selected' : ''; ?>>IT Services</option>
            <option value="IT Services & Consulting" <?php echo ($job_data[0]['industry_type'] == 'IT Services & Consulting') ? 'selected' : ''; ?>>IT Services & Consulting</option>
        </optgroup>

        <optgroup label="BPM">
            <option value="BPO / Call Centre" <?php echo ($job_data[0]['industry_type'] == 'BPO / Call Centre') ? 'selected' : ''; ?>>BPO / Call Centre</option>
            <option value="Analytics / KPO / Research" <?php echo ($job_data[0]['industry_type'] == 'Analytics / KPO / Research') ? 'selected' : ''; ?>>Analytics / KPO / Research</option>
        </optgroup>

        <optgroup label="Professional Services">
            <option value="Recruitment / Staffing" <?php echo ($job_data[0]['industry_type'] == 'Recruitment / Staffing') ? 'selected' : ''; ?>>Recruitment / Staffing</option>
            <option value="Management Consulting" <?php echo ($job_data[0]['industry_type'] == 'Management Consulting') ? 'selected' : ''; ?>>Management Consulting</option>
            <option value="Law Enforcement / Security Services" <?php echo ($job_data[0]['industry_type'] == 'Law Enforcement / Security Services') ? 'selected' : ''; ?>>Law Enforcement / Security Services</option>
            <option value="Architecture / Interior Design" <?php echo ($job_data[0]['industry_type'] == 'Architecture / Interior Design') ? 'selected' : ''; ?>>Architecture / Interior Design</option>
            <option value="Accounting / Auditing" <?php echo ($job_data[0]['industry_type'] == 'Accounting / Auditing') ? 'selected' : ''; ?>>Accounting / Auditing</option>
            <option value="Facility Management Services" <?php echo ($job_data[0]['industry_type'] == 'Facility Management Services') ? 'selected' : ''; ?>>Facility Management Services</option>
            <option value="Legal" <?php echo ($job_data[0]['industry_type'] == 'Legal') ? 'selected' : ''; ?>>Legal</option>
            <option value="Design" <?php echo ($job_data[0]['industry_type'] == 'Design') ? 'selected' : ''; ?>>Design</option>
            <option value="Content Development / Language" <?php echo ($job_data[0]['industry_type'] == 'Content Development / Language') ? 'selected' : ''; ?>>Content Development / Language</option>
        </optgroup>

        <optgroup label="Manufacturing & Production">
            <option value="Industrial Equipment / Machinery" <?php echo ($job_data[0]['industry_type'] == 'Industrial Equipment / Machinery') ? 'selected' : ''; ?>>Industrial Equipment / Machinery</option>
            <option value="Chemicals" <?php echo ($job_data[0]['industry_type'] == 'Chemicals') ? 'selected' : ''; ?>>Chemicals</option>
            <option value="Industrial Automation" <?php echo ($job_data[0]['industry_type'] == 'Industrial Automation') ? 'selected' : ''; ?>>Industrial Automation</option>
            <option value="Automobile" <?php echo ($job_data[0]['industry_type'] == 'Automobile') ? 'selected' : ''; ?>>Automobile</option>
            <option value="Building Material" <?php echo ($job_data[0]['industry_type'] == 'Building Material') ? 'selected' : ''; ?>>Building Material</option>
            <option value="Petrochemical / Plastics / Rubber" <?php echo ($job_data[0]['industry_type'] == 'Petrochemical / Plastics / Rubber') ? 'selected' : ''; ?>>Petrochemical / Plastics / Rubber</option>
            <option value="Iron & Steel" <?php echo ($job_data[0]['industry_type'] == 'Iron & Steel') ? 'selected' : ''; ?>>Iron & Steel</option>
            <option value="Auto Components" <?php echo ($job_data[0]['industry_type'] == 'Auto Components') ? 'selected' : ''; ?>>Auto Components</option>
            <option value="Electrical Equipment" <?php echo ($job_data[0]['industry_type'] == 'Electrical Equipment') ? 'selected' : ''; ?>>Electrical Equipment</option>
            <option value="Packaging & Containers" <?php echo ($job_data[0]['industry_type'] == 'Packaging & Containers') ? 'selected' : ''; ?>>Packaging & Containers</option>
            <option value="Metals & Mining" <?php echo ($job_data[0]['industry_type'] == 'Metals & Mining') ? 'selected' : ''; ?>>Metals & Mining</option>
            <option value="Fertilizers / Pesticides / Agro chemicals" <?php echo ($job_data[0]['industry_type'] == 'Fertilizers / Pesticides / Agro chemicals') ? 'selected' : ''; ?>>Fertilizers / Pesticides / Agro chemicals</option>
            <option value="Defence & Aerospace" <?php echo ($job_data[0]['industry_type'] == 'Defence & Aerospace') ? 'selected' : ''; ?>>Defence & Aerospace</option>
            <option value="Pulp & Paper" <?php echo ($job_data[0]['industry_type'] == 'Pulp & Paper') ? 'selected' : ''; ?>>Pulp & Paper</option>
        </optgroup>

        <optgroup label="BFSI">
            <option value="Banking" <?php echo ($job_data[0]['industry_type'] == 'Banking') ? 'selected' : ''; ?>>Banking</option>
            <option value="Financial Services" <?php echo ($job_data[0]['industry_type'] == 'Financial Services') ? 'selected' : ''; ?>>Financial Services</option>
            <option value="Insurance" <?php echo ($job_data[0]['industry_type'] == 'Insurance') ? 'selected' : ''; ?>>Insurance</option>
            <option value="Investment Banking / Venture Capital / Private Equity" <?php echo ($job_data[0]['industry_type'] == 'Investment Banking / Venture Capital / Private Equity') ? 'selected' : ''; ?>>Investment Banking / Venture Capital / Private Equity</option>
            <option value="NBFC" <?php echo ($job_data[0]['industry_type'] == 'NBFC') ? 'selected' : ''; ?>>NBFC</option>
            <option value="FinTech / Payments" <?php echo ($job_data[0]['industry_type'] == 'FinTech / Payments') ? 'selected' : ''; ?>>FinTech / Payments</option>
        </optgroup>

        <optgroup label="Education">
            <option value="Education / Training" <?php echo ($job_data[0]['industry_type'] == 'Education / Training') ? 'selected' : ''; ?>>Education / Training</option>
            <option value="E-Learning / EdTech" <?php echo ($job_data[0]['industry_type'] == 'E-Learning / EdTech') ? 'selected' : ''; ?>>E-Learning / EdTech</option>
        </optgroup>

        <optgroup label="Infrastructure, Transport & Real Estate">
            <option value="Engineering & Construction" <?php echo ($job_data[0]['industry_type'] == 'Engineering & Construction') ? 'selected' : ''; ?>>Engineering & Construction</option>
            <option value="Real Estate" <?php echo ($job_data[0]['industry_type'] == 'Real Estate') ? 'selected' : ''; ?>>Real Estate</option>
            <option value="Power" <?php echo ($job_data[0]['industry_type'] == 'Power') ? 'selected' : ''; ?>>Power</option>
            <option value="Courier / Logistics" <?php echo ($job_data[0]['industry_type'] == 'Courier / Logistics') ? 'selected' : ''; ?>>Courier / Logistics</option>
            <option value="Oil & Gas" <?php echo ($job_data[0]['industry_type'] == 'Oil & Gas') ? 'selected' : ''; ?>>Oil & Gas</option>
            <option value="Water Treatment / Waste Management" <?php echo ($job_data[0]['industry_type'] == 'Water Treatment / Waste Management') ? 'selected' : ''; ?>>Water Treatment / Waste Management</option>
            <option value="Aviation" <?php echo ($job_data[0]['industry_type'] == 'Aviation') ? 'selected' : ''; ?>>Aviation</option>
            <option value="Ports & Shipping" <?php echo ($job_data[0]['industry_type'] == 'Ports & Shipping') ? 'selected' : ''; ?>>Ports & Shipping</option>
            <option value="Urban Transport" <?php echo ($job_data[0]['industry_type'] == 'Urban Transport') ? 'selected' : ''; ?>>Urban Transport</option>
            <option value="Railways" <?php echo ($job_data[0]['industry_type'] == 'Railways') ? 'selected' : ''; ?>>Railways</option>
        </optgroup>
        <optgroup label="Technology">
            <option value="Internet" <?php echo ($job_data[0]['industry_type'] == 'Internet') ? 'selected' : ''; ?>>Internet</option>
            <option value="Software Product" <?php echo ($job_data[0]['industry_type'] == 'Software Product') ? 'selected' : ''; ?>>Software Product</option>
            <option value="Electronics Manufacturing" <?php echo ($job_data[0]['industry_type'] == 'Electronics Manufacturing') ? 'selected' : ''; ?>>Electronics Manufacturing</option>
            <option value="Electronic Components / Semiconductors" <?php echo ($job_data[0]['industry_type'] == 'Electronic Components / Semiconductors') ? 'selected' : ''; ?>>Electronic Components / Semiconductors</option>
            <option value="Hardware & Networking" <?php echo ($job_data[0]['industry_type'] == 'Hardware & Networking') ? 'selected' : ''; ?>>Hardware & Networking</option>
            <option value="Emerging Technologies" <?php echo ($job_data[0]['industry_type'] == 'Emerging Technologies') ? 'selected' : ''; ?>>Emerging Technologies</option>
        </optgroup>

        <optgroup label="Media, Entertainment & Telecom">
            <option value="Advertising & Marketing" <?php echo ($job_data[0]['industry_type'] == 'Advertising & Marketing') ? 'selected' : ''; ?>>Advertising & Marketing</option>
            <option value="Telecom / ISP" <?php echo ($job_data[0]['industry_type'] == 'Telecom / ISP') ? 'selected' : ''; ?>>Telecom / ISP</option>
            <option value="Film / Music / Entertainment" <?php echo ($job_data[0]['industry_type'] == 'Film / Music / Entertainment') ? 'selected' : ''; ?>>Film / Music / Entertainment</option>
            <option value="Printing & Publishing" <?php echo ($job_data[0]['industry_type'] == 'Printing & Publishing') ? 'selected' : ''; ?>>Printing & Publishing</option>
            <option value="Events / Live Entertainment" <?php echo ($job_data[0]['industry_type'] == 'Events / Live Entertainment') ? 'selected' : ''; ?>>Events / Live Entertainment</option>
            <option value="TV / Radio" <?php echo ($job_data[0]['industry_type'] == 'TV / Radio') ? 'selected' : ''; ?>>TV / Radio</option>
            <option value="Sports / Leisure & Recreation" <?php echo ($job_data[0]['industry_type'] == 'Sports / Leisure & Recreation') ? 'selected' : ''; ?>>Sports / Leisure & Recreation</option>
            <option value="Animation & VFX" <?php echo ($job_data[0]['industry_type'] == 'Animation & VFX') ? 'selected' : ''; ?>>Animation & VFX</option>
            <option value="Gaming" <?php echo ($job_data[0]['industry_type'] == 'Gaming') ? 'selected' : ''; ?>>Gaming</option>
        </optgroup>

        <optgroup label="Healthcare & Life Sciences">
            <option value="Medical Services / Hospital" <?php echo ($job_data[0]['industry_type'] == 'Medical Services / Hospital') ? 'selected' : ''; ?>>Medical Services / Hospital</option>
            <option value="Pharmaceutical & Life Sciences" <?php echo ($job_data[0]['industry_type'] == 'Pharmaceutical & Life Sciences') ? 'selected' : ''; ?>>Pharmaceutical & Life Sciences</option>
            <option value="Medical Devices & Equipment" <?php echo ($job_data[0]['industry_type'] == 'Medical Devices & Equipment') ? 'selected' : ''; ?>>Medical Devices & Equipment</option>
            <option value="Biotechnology" <?php echo ($job_data[0]['industry_type'] == 'Biotechnology') ? 'selected' : ''; ?>>Biotechnology</option>
            <option value="Clinical Research / Contract Research" <?php echo ($job_data[0]['industry_type'] == 'Clinical Research / Contract Research') ? 'selected' : ''; ?>>Clinical Research / Contract Research</option>
        </optgroup>

        <optgroup label="Consumer, Retail & Hospitality">
            <option value="FMCG" <?php echo ($job_data[0]['industry_type'] == 'FMCG') ? 'selected' : ''; ?>>FMCG</option>
            <option value="Retail" <?php echo ($job_data[0]['industry_type'] == 'Retail') ? 'selected' : ''; ?>>Retail</option>
            <option value="Travel & Tourism" <?php echo ($job_data[0]['industry_type'] == 'Travel & Tourism') ? 'selected' : ''; ?>>Travel & Tourism</option>
            <option value="Textile & Apparel" <?php echo ($job_data[0]['industry_type'] == 'Textile & Apparel') ? 'selected' : ''; ?>>Textile & Apparel</option>
            <option value="Consumer Electronics & Appliances" <?php echo ($job_data[0]['industry_type'] == 'Consumer Electronics & Appliances') ? 'selected' : ''; ?>>Consumer Electronics & Appliances</option>
            <option value="Food Processing" <?php echo ($job_data[0]['industry_type'] == 'Food Processing') ? 'selected' : ''; ?>>Food Processing</option>
            <option value="Hotels & Restaurants" <?php echo ($job_data[0]['industry_type'] == 'Hotels & Restaurants') ? 'selected' : ''; ?>>Hotels & Restaurants</option>
            <option value="Furniture & Furnishing" <?php echo ($job_data[0]['industry_type'] == 'Furniture & Furnishing') ? 'selected' : ''; ?>>Furniture & Furnishing</option>
            <option value="Gems & Jewellery" <?php echo ($job_data[0]['industry_type'] == 'Gems & Jewellery') ? 'selected' : ''; ?>>Gems & Jewellery</option>
            <option value="Beauty & Personal Care" <?php echo ($job_data[0]['industry_type'] == 'Beauty & Personal Care') ? 'selected' : ''; ?>>Beauty & Personal Care</option>
            <option value="Beverage" <?php echo ($job_data[0]['industry_type'] == 'Beverage') ? 'selected' : ''; ?>>Beverage</option>
            <option value="Fitness & Wellness" <?php echo ($job_data[0]['industry_type'] == 'Fitness & Wellness') ? 'selected' : ''; ?>>Fitness & Wellness</option>
            <option value="Leather" <?php echo ($job_data[0]['industry_type'] == 'Leather') ? 'selected' : ''; ?>>Leather</option>
        </optgroup>

        <optgroup label="Miscellaneous">
            <option value="Miscellaneous" <?php echo ($job_data[0]['industry_type'] == 'Miscellaneous') ? 'selected' : ''; ?>>Miscellaneous</option>
            <option value="NGO / Social Services / Industry Associations" <?php echo ($job_data[0]['industry_type'] == 'NGO / Social Services / Industry Associations') ? 'selected' : ''; ?>>NGO / Social Services / Industry Associations</option>
            <option value="Agriculture / Forestry / Fishing" <?php echo ($job_data[0]['industry_type'] == 'Agriculture / Forestry / Fishing') ? 'selected' : ''; ?>>Agriculture / Forestry / Fishing</option>
            <option value="Import & Export" <?php echo ($job_data[0]['industry_type'] == 'Import & Export') ? 'selected' : ''; ?>>Import & Export</option>
            <option value="Government / Public Administration" <?php echo ($job_data[0]['industry_type'] == 'Government / Public Administration') ? 'selected' : ''; ?>>Government / Public Administration</option>
        </optgroup>
    </select>
</div>
        <div class="mb-3">
    <label class="form-label" for="department">Department<span style="color: red;">*</span></label>
    <select class="form-control" name="department" id="department" required>
        <option value="" selected>Select Department</option>
        <?php foreach($department_list as $row) { ?>
            <option value="<?= $row['dept_name']; ?>" <?= isset($job_data[0]['department']) && $job_data[0]['department'] == $row['dept_name'] ? 'selected' : ''; ?>>
                <?= $row['dept_name']; ?>
            </option>
        <?php } ?>
    </select>
</div>


        
        <div class="mb-3">
        <label class="form-label"  for="job_type">Job Type<span style="color: red;">*</span></label>
        <select class="form-control" name="job_type" id="job_type"  value="<?php echo htmlspecialchars($job_data[0]['job_type']); ?>" required>
            <option value="" selected>Select Job Type</option>
            <option value="Full_Time" <?= isset($job_data[0]['job_type']) && $job_data[0]['job_type'] === 'Full_Time' ? 'selected' : ''; ?>>Full Time</option>
            <option value="Part_Time" <?= isset($job_data[0]['job_type']) && $job_data[0]['job_type'] === 'Part_Time' ? 'selected' : ''; ?>>Part Time</option>
            
        </select>
        </div>
        
        <div class="mb-3">
        <label class="form-label"  for="no_of_vacancies">No. of vacancies<span style="color: red;">*</span></label>
        <input autocomplete="off" type="text" class="form-control" type="no_of_vacancies" name="no_of_vacancies" id="no_of_vacancies"  value="<?php echo htmlspecialchars($job_data[0]['no_of_vacancies']); ?>" required>
        </div>
        <div class="mb-3">
        <label class="form-label"  for="work_mode">Employment Type</label>
        <select class="form-control" name="work_mode" id="work_mode"  value="<?php echo htmlspecialchars($job_data[0]['job_country']); ?>">
            <option  value="" selected>Select Employment Type</option>
            <option value="Permanent" <?= isset($job_data[0]['work_mode']) && $job_data[0]['work_mode'] === 'Permanent' ? 'selected' : ''; ?>>Permanent</option>
            <option value="Contractual" <?= isset($job_data[0]['work_mode']) && $job_data[0]['work_mode'] === 'Contractual' ? 'selected' : ''; ?>>Contractual</option>
            <option value="Internship" <?= isset($job_data[0]['work_mode']) && $job_data[0]['work_mode'] === 'Internship' ? 'selected' : ''; ?>>Internship</option>
        </select>
        </div>
        <br>
        <div class="mb-3 freducationnnn">
    <label class="form-label" for="education">Education<span style="color: red;">*</span></label>
    <select class="form-control" name="education[]" id="education" multiple="multiple" 
            required multiselect-search="true" multiselect-select-all="true" 
            multiselect-max-items="3" size="10" onchange="showSelectedEducation()">
        
        <?php foreach($education_list as $row)  { ?>
            <option class="form-control" value="<?= $row->course_id; ?>" 
                <?php 
                    // Check if this course is selected by comparing the course ID with $job_data['education']
                    if (in_array($row->course_id, explode(',', $job_data[0]['education']))) { 
                        echo 'selected'; 
                    }
                ?>>
                <?= $row->course_name; ?>
            </option>
        <?php } ?>
    </select>
</div>

        <br>
       
        <div class="mb-3">
        <label class="form-label"  for="new_company_name">Company Name<span style="color: red;">*</span></label>
        <input autocomplete="off" type="text" class="form-control" name="new_company_name" id="new_company_name"  value="<?php echo htmlspecialchars($job_data[0]['new_company_name']); ?>" required>
        </div>
        <div class="mb-3">
        <label class="form-label"  for="company_telephone">Company Telephone</label>
        <input autocomplete="off" type="text" class="form-control" name="company_telephone" id="company_telephone"  value="<?php echo htmlspecialchars($job_data[0]['company_telephone']); ?>">
        </div>
        <div class="mb-3">
        <label class="form-label"  for="company_email">Company Email<span style="color: red;">*</span></label>
        <input autocomplete="off" type="text" class="form-control" name="company_email" id="company_email"   value="<?php echo htmlspecialchars($job_data[0]['company_email']); ?>" required>
        </div>
        <div class="mb-3">
    <label class="form-label" for="company_about">Company About<span style="color: red;">*</span></label>
    <textarea id="company_about" name="company_about" class="form-control" required>
        <?php echo htmlspecialchars($job_data[0]['company_about']); ?>
    </textarea>
</div>

        
        <!--<div class="form-group">-->
        <!--    <label for="exampleFormControlFile1">Upload video</label>-->
        <!--    <input type="file" class="form-control-file" name="compavideo" id="compavideo" accept="video/*">-->
        <!--    <small id="emailHelp" class="form-text text-muted">mp4|avi|wmv|flv|mov|mkv ,Max: 2 MB</small>-->
        <!--</div>-->

         <div class="social-media-checkbox">
             <!--<h5>You can post thpost this job on below social platforms</h5><br>
             <h8>Select ict icon where you want to post the job</h8>-->
             <h5>Select social platforms if you want to post the job</h5><br>
        <label>
            <input type="checkbox" name="social_media[]" value="facebook" />
            <i class="fab fa-facebook-f"></i>
        </label>
        <label>
            <input type="checkbox" name="social_media[]" value="twitter" />
            <i class="fab fa-twitter"></i>
        </label>
        <label>
            <input type="checkbox" name="social_media[]" value="instagram" />
            <i class="fab fa-instagram"></i>
        </label>
        <label>
            <input type="checkbox" name="social_media[]" value="linkedin" />
            <i class="fab fa-linkedin-in"></i>
        </label>
    </div>
        <div class="box-footer">
            <a type="button" class="btn btn-primary" id="preview" data-toggle="modal" data-target="#PreviewFormm" onclick="openModal()">Preview</a>
            
          <button type="submit" class="btn btn-secondary">Save</button>
          
        </div>
        <?php else: ?>
    <p>No profile information available.</p>
<?php endif; ?>  
    </form> 
                </div>
              </div>
            </div>
          </div>
          
        <div class="col-md-4">
    <form id="jdForm">
        <h3>Create Job Description</h3>
        <div class="form-group">
            <label>Designation</label>
            <input type="text" class="form-control" id="designation" placeholder="Write Designation here" required>
        </div>
        <div class="form-group">
            <label>Skills</label>
            <input type="text" class="form-control" id="skills" placeholder="Write Skills here" required>
        </div>
        <div class="form-group">
            <label>Notice Period</label>
            <input type="text" class="form-control" id="noticePeriod" placeholder="Write Notice Period here" required>
        </div>
        <div class="form-group">
            <label>Salary</label>
            <input type="text" class="form-control" id="salary" placeholder="Write Salary here" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<!-- Section to Display Saved Job Description -->
<div class="col-md-12 mt-4">
        <h4>Saved Job Description:</h4>
        <div id="savedJD" class="border p-3 d-flex justify-content-between align-items-center" style="display: none;">
            <div id="savedJDText"></div>
            <button id="editJD" class="btn btn-link p-0" style="text-decoration: none;">
                <i class="fas fa-edit"></i> <!-- Edit icon -->
            </button>
        </div>
    </div>
</div>

<!-- Modal for Job Description -->
<div class="modal fade" id="jdModal" tabindex="-1" role="dialog" aria-labelledby="jdModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="jdModalLabel">Generated Job Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="jdTextareaModal">Job Description</label>
          <textarea id="jdTextareaModal" class="form-control" rows="10"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    const jdForm = document.getElementById("jdForm");
    const jdTextareaModal = document.getElementById("jdTextareaModal");
    const savedJDText = document.getElementById("savedJDText");
    const savedJD = document.getElementById("savedJD");
    const editJD = document.getElementById("editJD");

    jdForm.addEventListener("submit", function(event) {
        event.preventDefault();

        // Get values from the form
        const designation = document.getElementById("designation").value;
        const skills = document.getElementById("skills").value;
        const noticePeriod = document.getElementById("noticePeriod").value;
        const salary = document.getElementById("salary").value;

        // Create the job description
        let jobDescription = `Job Title: ${designation}\n\n`;

        // Customize job description based on designation
        if (designation.toLowerCase() === 'software engineer') {
            jobDescription += `
            Company Overview:
            We are seeking a talented Software Engineer to join our development team.

            Responsibilities:
            - Design, develop, and maintain software applications.
            - Collaborate with cross-functional teams to define and implement new features.
            - Participate in code reviews and ensure adherence to coding standards.
            `;
        } else if (designation.toLowerCase() === 'project manager') {
            jobDescription += `
            Company Overview:
            We are looking for a dedicated Project Manager to oversee and drive project success.

            Responsibilities:
            - Plan, execute, and finalize projects according to strict deadlines.
            - Coordinate with team members and stakeholders to ensure project objectives are met.
            - Monitor project progress and adjust plans as necessary.
            `;
        } else {
            jobDescription += `
            Company Overview:
            We are a dynamic and innovative company seeking talented individuals to join our team.

            Responsibilities:
            - Collaborate with cross-functional teams to define and implement new features.
            - Participate in code reviews and ensure adherence to coding standards.
            - Debug and resolve technical issues as they arise.
            `;
        }

        // Common job description components
        jobDescription += `
        Required Skills:
        - ${skills}

        Notice Period:
        We expect candidates to have a notice period of ${noticePeriod}.

        Salary:
        The salary for this position is ${salary}.

        Application Process:
        If you are interested in this exciting opportunity, please send your resume and a cover letter to careers@company.com.
        `;

        // Display the job description in the modal's textarea
        jdTextareaModal.value = jobDescription;

        // Show the modal
        $('#jdModal').modal('show');
    });

    // Save changes from modal and display below form
    document.getElementById('saveChanges').addEventListener('click', function() {
        // Get the updated job description from the modal textarea
        const updatedJobDescription = jdTextareaModal.value;

        // Display the updated job description below the form
        savedJDText.innerText = updatedJobDescription;
        savedJD.style.display = "flex"; // Display with flex to align the edit button

        // Hide the modal
        $('#jdModal').modal('hide');
    });

    // Edit JD button functionality
    editJD.addEventListener("click", function() {
        // Load the saved JD text into the modal for editing
        jdTextareaModal.value = savedJDText.innerText;

        // Show the modal
        $('#jdModal').modal('show');
    });
</script>
        </section>
      </div>
      
      
<div id="company_add_modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="post" name="addUser" id="addUser" action="<?php echo base_url('client/client/save');?>" onsubmit="return validateFP_email_id();"  enctype="multipart/form-data">   
      <div class="modal-header">
        <h5 class="modal-title">Add Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label" for="name">Company Name</label>
          <input type="text" class="form-control" name="name" id="name">
           <span id="email_msg"></span>
        </div>
        
        <div class="mb-3">
        <label>Client Type</label>
        <select name="client_type" id="client_type" class="form-control">
               <option value="" selected="">Select Client Type</option>
               <option value="IT">IT</option>
               <option value="NON-IT">NON-IT</option>
               <option value="IT &amp; NON-IT">IT &amp; NON-IT</option>
        </select>
         <span id="email_msg"></span>
        </div>
        
        <div class="mb-3">
          <label class="form-label" for="company_logo">Company Logo</label>
          <input type="file" class="form-control" name="company_logo" id="company_logo">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal for adding company -->
<div id="company_add_modal" class="modal" tabindex="-1" role="dialog">
    <!-- Modal content here -->
</div>

<script>
   $(document).ready(function(){
       function submitForm() {
    alert('hi');
    
          //alert("Please Fill client");  
           var formData = $("#myjobform").serialize();
        var base_url ="<?php echo base_url(); ?>";
        // Send AJAX request
        $.ajax({
            type: "POST",
            url: base_url+'job/save_job_data',
            data: formData,
            success: function(response) {
                // Handle the response from the server
                alert('Job Saved Successfully!!');
                $("#form_data").html(response);
                load_form_for_job(job_codes);
            }
        }); 
       
        
    }
       
       
       $('#education').multiselect({
          includeSelectAllOption: true,
        });
       $('#education').change(function() { 
        
           
           var selected = $("#education :selected").map((_, e) => e.value).get();
       });
        
    // CKEDITOR.replace('company_about');
    // CKEDITOR.replace('job_descriptions');  
    $('#form_job_postss').validate({
        rules: {
            key_skills: {
                required: true // Specify the rule property and its value
            },
            // Add rules for other fields if needed
        },
        messages: {
            key_skills: {
                required: "Please enter key skills" // Specify the message property and its value
            },
            // Add custom error messages for other fields if needed
        },
    });

    // Add your other JavaScript code here
});
function get_state_list(country_id){
    var base_url = "<?php echo base_url();?>";
    $.ajax({
    type:"POST",
    data:{country_id},
    dataType: 'json',
    url:base_url+"recruiter/Recruiter/get_state_list",
    success:function(response) {  console.log(response);
    $('#job_state option').remove();
    $("#job_state").append("<option value=''>Select Job State</option>");
    for(var i = 0; i<response.length; i++)
    {
    var id = response[i]; 
    $("#job_state").append("</br><option value="+response[i]['id']+">"+response[i]['name'] +"</option></br>");
   
    }
    }
  });
}  

function add_client_company(company)
{
  if(company=="other")
  {
    $('#add_company').removeClass('hidden');
  }
}
function company_add_modal()
{
   // alert("hhhh");
    $('#company_add_modal').modal('show');
}

function get_city_list(state_id){
    var base_url = "<?php echo base_url();?>";
    $.ajax({
    type:"POST",
    data:{state_id},
    dataType: 'json',
    url:base_url+"recruiter/Recruiter/get_city_list",
    success:function(response) {
    $('#job_location option').remove();
    $("#job_location").append("<option value=''>Select Job City</option>");
    for (var i = 0; i < response.length; i++) 
    {
    $("#job_location").append("<option value='" + response[i]['id'] + "'>" + response[i]['name'] + "</option>");
     }
    }
  });
} 




</script>

    <script src="<?php echo base_url();?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>backend/plugins/jQueryUI/jquery.validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</div>
</div>
<script>
function openModal() {
    // Get form values
    const jobTitle = document.getElementById("profile").value;
    console.log(jobTitle);
    const keySkills = document.getElementById("key_skills").value;
    const minExp = document.getElementById("min_exp_candidate").value;
    const maxExp = document.getElementById("max_exp_candidate").value;
    const minSalary = document.getElementById("min_salary").value;
    const maxSalary = document.getElementById("max_salary").value;
    const jobCountryElement = document.getElementById("job_country");
    const selectedCountryName = jobCountryElement.options[jobCountryElement.selectedIndex].text;
    const jobStateElement = document.getElementById("job_state");
    const jobState = jobStateElement.options[jobStateElement.selectedIndex].text;
    const jobCityElement = document.getElementById("job_location");
    const jobCity = jobCityElement.options[jobCityElement.selectedIndex].text;
    // const jobPincode = document.getElementById("job_pincode").value;
    const shiftType = document.getElementById("shift_type").value;
    // const jobDescription = document.getElementById("job_descriptions");
    const industryType = document.getElementById("industry_type").value;
    const department = document.getElementById("department").value;
    const jobOpeningAddress = document.getElementById("job_opening_address").value;
    const jobOpeningPincode = document.getElementById("job_opening_area_pincode").value;
    const jobType = document.getElementById("job_type").value;
    const vacancies = document.getElementById("no_of_vacancies").value;
    const employmentType = document.getElementById("work_mode").value;
    // const education = document.getElementById("education").value;
    const companyName = document.getElementById("new_company_name").value;
    const companyTelephone = document.getElementById("company_telephone").value;
    const companyEmail = document.getElementById("company_email").value;
    const companyAbout = document.getElementById("company_about").value;
    // const video = document.getElementById("compavideo").value;

    // Populate modal with form data
    document.getElementById("preview_profile").textContent = jobTitle;
    document.getElementById("preview_key_skills").textContent = keySkills;
    document.getElementById("preview_min_exp").textContent = minExp;
    document.getElementById("preview_max_exp").textContent = maxExp;
    document.getElementById("preview_min_salary").textContent = minSalary;
    document.getElementById("preview_max_salary").textContent = maxSalary;
    document.getElementById("preview_job_country").textContent = selectedCountryName;
    document.getElementById("preview_job_state").textContent = jobState;
    document.getElementById("preview_job_city").textContent = jobCity;
    // document.getElementById("preview_job_pincode").textContent = jobPincode;
    document.getElementById("preview_shift_type").textContent = shiftType;
    // document.getElementById("preview_job_descriptions").textContent = jobDescription;
    document.getElementById("preview_industry_type").textContent = industryType;
    document.getElementById("preview_department").textContent = department;
    document.getElementById("preview_job_opening_address").textContent = jobOpeningAddress;
    document.getElementById("preview_job_opening_area_pincode").textContent = jobOpeningPincode;
    document.getElementById("preview_job_type").textContent = jobType;
    document.getElementById("preview_no_of_vacancies").textContent = vacancies;
    document.getElementById("preview_work_mode").textContent = employmentType;
    // document.getElementById("preview_education").textContent = education;
    document.getElementById("preview_new_company_name").textContent = companyName;
    document.getElementById("preview_company_telephone").textContent = companyTelephone;
    document.getElementById("preview_company_email").textContent = companyEmail;
    document.getElementById("preview_company_about").textContent = companyAbout;

//     document.getElementById("compavideo").addEventListener("change", function(event) {
//     const file = event.target.files[0];
    
//     if (file) {
//         const videoElement = document.querySelector("#PreviewFormm video source");
//         const videoURL = URL.createObjectURL(file);
        
//         // Update the video source
//         videoElement.src = videoURL;
        
//         // Load the new video source in the video element
//         videoElement.parentElement.load();
//     }
// });

    // Video handling
    // const videoElement = document.querySelector("#PreviewFormm video source");
    // if (video) {
    //     videoElement.src = video; // Assign the new video URL if present
    // } else {
    //     videoElement.src = "<?php echo base_url('frontend/images/videos/dummyV.mp4'); ?>"; // Default video
    // }
    // videoElement.parentElement.load(); // Reload the video element to reflect the new source

    // Populate key skills

    // Show modal
    $('#PreviewFormm').modal('show');
}
function updatePreview() {
    const jobCountryElement = document.getElementById("job_country");
    const selectedCountryName = jobCountryElement.options[jobCountryElement.selectedIndex].text; // Get the selected option's text (country name)
    document.getElementById("preview_job_country").textContent = selectedCountryName; // Update the preview with the country name
}
// Function to update the selected state name in the preview
function updateStatePreview() {
    const jobStateElement = document.getElementById("job_state");
    const selectedStateName = jobStateElement.options[jobStateElement.selectedIndex].text; // Get the selected state name
    document.getElementById("preview_job_state").textContent = selectedStateName; // Update the preview with the state name
}

// Function to update the selected city name in the preview
function updateCityPreview() {
    const jobCityElement = document.getElementById("job_location");
    const selectedCityName = jobCityElement.options[jobCityElement.selectedIndex].text; // Get the selected city name
    document.getElementById("preview_job_city").textContent = selectedCityName; // Update the preview with the city name
}
function showSelectedEducation() {
    const educationSelect = document.getElementById("education");
    const selectedOptions = [...educationSelect.selectedOptions]; // Array of selected options

    // Extract the text (course names) of selected options
    const selectedNames = selectedOptions.map(option => option.textContent);

    // Display the selected names
    document.getElementById("preview_education").textContent = selectedNames.join(", ");
}
</script>

<!-- for Add preview form Modal start here -->
<div  id="profile_edit"></div>          
<div class="modal fade PreviewFormm" id="PreviewFormm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Job Post Filled Form Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Job Title: </b><span id="preview_profile"></span></p>
                <p><b>Key skills: </b><span id="preview_key_skills"></span></p>
                <p><b>Min Exp Candidate: </b><span id="preview_min_exp"></span>Years</p>
                <p><b>Max Exp Candidate: </b><span id="preview_max_exp"></span>Years</p>
                <p><b>Min Salary: </b><span id="preview_min_salary"></span></p>
                <p><b>Max Salary: </b><span id="preview_max_salary"></span></p>
                <p><b>Job Country: </b><span id="preview_job_country"></span></p>
                <p><b>Job State: </b><span id="preview_job_state"></span></p>
                <p><b>Job City: </b><span id="preview_job_city"></span></p>
                <p><b>Job Opening Address: </b><span id="preview_job_opening_address"></span></p>
                <p><b>Job Opening Area Pin Code: </b><span id="preview_job_opening_area_pincode"></span></p>
                <!-- <p><b>Job Pincode: </b><span id="preview_job_pincode"></span></p> -->
                <p><b>Shift Type: </b><span id="preview_shift_type"></span></p>
                <p><b>Job Descriptions: </b><span id="preview_job_descriptions"></span></p>
                <p><b>Industry Type: </b><span id="preview_industry_type"></span></p>
                <p><b>Department: </b><span id="preview_department"></span></p>
                <p><b>Job Type: </b><span id="preview_job_type"></span></p>
                <p><b>No. of Vacancies: </b><span id="preview_no_of_vacancies"></span></p>
                <p><b>Employment Type: </b><span id="preview_work_mode"></span></p>
                <p><b>Education: </b><span id="preview_education"></span></p>
                <p><b>Company Name: </b><span id="preview_new_company_name"></span></p>
                <p><b>Company Telephone: </b><span id="preview_company_telephone"></span></p>
                <p><b>Company Email: </b><span id="preview_company_email"></span></p>
                <p><b>Company About: </b><span id="preview_company_about"></span></p>

            </div>
        </div>
    </div>
</div>