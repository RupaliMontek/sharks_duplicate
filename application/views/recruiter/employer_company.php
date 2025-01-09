<div class="container-fluid onRegisteringtextOuter frEmplyerDashboardd">
    <div class="container compProf" id="">
        <h5>Company Profile</h5>
       <form class="Empl_company">
           <div class="row">
<div class="col-md-6 col-lg-6 col-sm-12">
<div class="form-group">
<label for="">Company Name<span class="required">*</span></label>
<input class="form-control" type="text">
</div>
</div>

<div class="col-md-6 col-lg-6 col-sm-12">
<div class="form-group">
<label for="">Website<span class="required">*</span></label>
<input class="form-control" type="text">
</div>
</div>

<div class="col-md-6 col-lg-6 col-sm-12">
<div class="form-group">
<label for="">Subdomain<span class="required">*</span></label>
<input class="form-control" type="text">
<small>You can use letters, numbers, and dashes. It just can't end with a dash</small>
</div>
</div>

<div class="col-md-6 col-lg-6 col-sm-12">
<div class="form-group">
<label for="">Phone No.<span class="required">*</span></label>
<input class="form-control" type="text">
</div>
</div>

<div class="col-md-12 col-lg-12 col-sm-12 frrighttext">
<div class="form-group">
<button type="submit" class="btn btn-primary" value="Submit">Save Changes</button>
</div>
</div>


</div>
</form>
</div>

<div class="container compProf" id="">
        <h5>Company Identity</h5>
       <form class="Empl_company">
<h6>Company Logo</h6>
<p>Sharks Job displays your company’s logo in your careers page, in emails to candidates as well as some job boards.</p>   
           <div class="row">
<div class="col-md-12 col-lg-12 col-sm-12">
<label for="">Image</label>    
<div class="form-group forimagesquare">
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
<small>600x600 px at least & 8 MB maximum file size.</small
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
<small>Only .jpg, .jpeg, .gif or .png files allowed, no size limit.</small>
</div>
</div>

<div class="col-md-12 col-lg-12 col-sm-12">
<div class="form-group">
<label for=""><b>Company Description</b></label>
<p>The company description helps to set you apart on some job boards, including the Sharks Job Job Board. It also appears on welcome pages for features like video interviews and assessments.</p>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<!-- Textarea for CKEditor -->
        <textarea name="job_descriptions" id="compDescri" name="compDescri" required></textarea>
        <script>
    // Initialize CKEditor
    CKEDITOR.replace('job_descriptions');
</script>
</div>
</div>

<div class="col-md-12 col-lg-12 col-sm-12 frrighttext">
<div class="form-group">
<button type="submit" class="btn btn-primary" value="Submit">Save Changes</button>
</div>
</div>


</div>
</form>
</div>

<div class="container compProf" id="">
        <h5>Social sharing details</h5>
       <form class="Empl_company">
           <div class="row">
<div class="col-md-3 col-lg-3 col-sm-12">
    <img width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/smpreview.jpg"/>
</div>
<div class="col-md-9 col-lg-9 col-sm-12 ssdRight">
<h6>Thumbnail</h6>
<p>Sharks Job displays a default image when sharing your jobs or careers page on social media. To display your own image, choose the image below and save your changes.</p>
<p>It may take some time for each social network to reflect changes to these settings.</p>   
<div class="form-group forimagesquare">
<label for="">Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
<small>600x600 px at least & 8 MB maximum file size.</small>
</div>
<div class="form-group">
<label for=""><b>Description</b>
Write a brief description of your company to be displayed under the thumbnail image when sharing on social media sites. If you share a specific job, the beginning of your job description will be displayed instead.</label>
<textarea class="form-control" type="text" placeholder="A brief description about your company and your careers page"></textarea>
</div>
</div>




<div class="form-group frrighttext">
<button type="submit" class="btn btn-primary" value="Submit">Save Changes</button>
</div>



</div>
</form>
</div>

</div>





