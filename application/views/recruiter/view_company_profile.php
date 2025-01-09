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
<div class="container"><br>
    <!--<h2>Edit Profile Details</h2>-->

    <?php if (!empty($profile)): ?>
        <form class="frProfileecomp" action="<?= base_url('job_post/update'); ?>" method="post" enctype="multipart/form-data">
            <a href="<?= base_url('job_post/comp_dashboard'); ?>" class="btn btn-primary mb-3">Back</a>
            <div class="card">
                <div class="card-header">
                    <h4><?= $profile['company_name']; ?>'s Profile</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="logo" class="form-label"><strong>Company Logo:</strong></label>
                    
                        <?php if (!empty($profile['company_logo'])): ?>
                            <div class="mb-3">
                                <img src="<?= base_url('uploads/company_logos/' . $profile['company_logo']); ?>" alt="Company Logo" width="250" height="150">
                            </div>
                        <?php endif; ?>
                    
                        <input type="file" class="form-control" id="logo" name="logo">
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label"><strong>Company Name:</strong></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="<?= $profile['company_name']; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label"><strong>Email:</strong></label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $profile['email']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label"><strong>Contact Number:</strong></label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?= $profile['contact']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="company_address" class="form-label"><strong>Company Address:</strong></label>
                        <textarea class="form-control" id="company_address" name="company_address" rows="3" required><?= $profile['company_address']; ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description">Company Description</label>
                        <textarea class="form-control" name="description" id="description" class="form-label" rows="4" placeholder="Describe your company" required><?= $profile['company_about']; ?></textarea>
                   </div>

                    <div class="mb-3">
                        <label for="company_website" class="form-label"><strong>Website:</strong></label>
                        <input type="text" class="form-control" id="company_website" name="company_website" value="<?= $profile['company_website']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="video_introducation" class="form-label"><strong>Introduction Video:</strong><br><span style="font-size: 12px; color: #777;">(Max size: 5MB)</span></label>
                        <?php if (!empty($profile['video_introducation'])): ?>
                            <video width="320" height="240" controls>
                                <source src="<?= base_url('uploads/video_introducation/' . $profile['video_introducation']); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php else: ?>
                            <p>No introduction video available.</p>
                        <?php endif; ?>
                        <input type="file" class="form-control" id="video_introducation" name="video_introducation" accept="video/*">
                        <small class="form-text text-muted">Upload a new video if you want to replace the current one.</small>
                    </div>

                    <!-- Add any other profile fields you need -->

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    <?php else: ?>
        <p>No profile information available.</p>
    <?php endif; ?>
</div>
