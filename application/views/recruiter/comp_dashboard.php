
<div class="container-fluid dashboardOuterrrr">
    <div class="container frCompDashboarddddD">
        <div class="frCompDashboarddddDTop">
        <?php if (!empty($profile)): ?>
            <div>
                <!-- <a class="frviewprImg" href="<?php echo base_url('job_post/view_profile') ?>" class="btn btn-secondary">
                    <img src="<?= base_url('uploads/company_logos/' . $profile['company_logo']); ?>" width="40px" height="40px">
                </a>
                <a href="javascript:void(0);" class="btn btn-secondary" onclick="checkJobCountAndPost()">Post Job</a> -->
            <!-- Modal -->
            <div class="modal fade" id="jobLimitModal" tabindex="-1" role="dialog" aria-labelledby="jobLimitModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="jobLimitModalLabel">Job Posting Limit Reached</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            You have reached the maximum number of free job postings. Please contact admin for paid posting.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
        <p>No profile information available.</p>
    <?php endif; ?>
                <!-- Button trigger modal -->

            <!-- job post modal end here -->
            </div>
            <form class="formShopSearch form-inline" id="searchForm"><br>
                <input class="form-control mr-sm-2" type="search" id="searchInput" placeholder="Search" aria-label="Search" required>
            </form>
        </div>
        
        <script>
    function checkJobCountAndPost() {
        var jobCount = <?php echo $jobCount; ?>;
        if (jobCount < 5) {
            window.location.href = "<?php echo base_url('job_post/index/' . $this->session->userdata('user_admin_id')); ?>";
        } else {
            // Show modal instead of alert
            $('#jobLimitModal').modal('show');
        }
    }
</script>


        <div class="row outerOfBox">
            <?php if (!empty($companyDataList) && is_array($companyDataList)) : ?>
                <?php foreach ($companyDataList as $jobData): ?>
                    <div class="col-md-4 mb-3 jobCard">
                        <div class="card mb-3 compBoxx">
                            <div class="card-body">
                                <div class="jobCardTop">
                                    <h5 class="card-title"><?= htmlspecialchars($jobData['profile']); ?></h5>
                                    <a href="<?= site_url('job_post/edit_index/' . $jobData['job_id']); ?>">
                                        <i class="fa fa-edit" style="font-size: 24px;"></i>
                                    </a>

                                </div>
                                <div class="card-text frsalary">
                                <?php
// Assuming $jobData contains the salary range in the format "1.0_lakh_per_year"
$minPackage = str_replace(['_per_year', '_'], [' per year', ' '], $jobData['comany_min_package_offer']);
$maxPackage = str_replace(['_per_year', '_'], [' per year', ' '], $jobData['comany_max_package_offer']);
?>

<strong></strong> <?= htmlspecialchars($minPackage); ?> - <?= htmlspecialchars($maxPackage); ?>
                                </div>
                                <p class="card-text"><?= htmlspecialchars($jobData['key_skills']); ?></p>
                                <p class="card-text"><?= htmlspecialchars($jobData['min_exp_candidate']); ?> - <?= htmlspecialchars($jobData['max_exp_candidate']); ?> years Experience</p>
                                <p class="card-text">
                                    <span class="jobdescccc">
                                        <?= strlen(strip_tags($jobData['job_descriptions'])) > 100 ? htmlspecialchars(substr(strip_tags($jobData['job_descriptions']), 0, 100)) . '...' : htmlspecialchars(strip_tags($jobData['job_descriptions'])); ?>
                                    </span>
                                </p>
                                <div class="jobCardBottom">
                                    <a href="<?= site_url('job_post/view_applications/' . $jobData['job_id']); ?>" class="btn btn-info">Check Candidates Applications</a>
                                    <p class="card-text"><strong>Posted on</strong><br> <?= htmlspecialchars(date('Y-m-d', strtotime($jobData['created_at']))); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No job postings found for this company.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.jobCard').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

