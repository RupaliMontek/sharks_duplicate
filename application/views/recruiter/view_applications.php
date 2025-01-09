<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <style>
        .resumes-list {
            flex: 1;
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 2px solid #007bff;
        }

        .resumes-list h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 10px;
            font-size: 20px;
        }

        .resume-item {
            background-color: #e9ecef;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
            font-size: 24px;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }

        strong {
            color: #555;
        }

        .application-count {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            font-size: 15px;
            color: #333;
        }

        .no-data {
            color: #dc3545;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container frjobAppliii"> 
    <!-- Job Details Section -->
    <!-- <h1>Job Details</h1>-->
    
    <!-- Resumes List Section -->
    <div class="forFirstRowJobdetailss">
  <form class="resumeSearchhh form-inline" id="searchForm">
    <p>Search by Name / Email / Mobile Number</p>
    <br>
    <input class="form-control mr-sm-2" type="search" id="searchInput" placeholder="Search" aria-label="Search" required>
    <!--<button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>-->
</form>
  <div class="job-details">
       
        <?php if (!empty($job)): ?>
            <p class="application-count"><strong>Number of Applications:</strong> <?php echo $job['total_applications']; ?></p>
        <?php else: ?>
            <p class="no-data">No job data found.</p>
        <?php endif; ?>
    </div>
    </div>

<!-- my code starts from here -->

<div class="resumeListToppPart">
<h5>Resumes List</h5>
<div class="form-group frshowentriesss">
    <div class="entriessss">
        <label for="exampleFormControlSelect1">Show</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option value="10" selected>10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
        </select>
        Entries
    </div>
</div>
</div>

<div class="viewAapllitable_container">
    <table class="viewAapllicationssss">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Company Name</th>
                <th>Candidate Name</th>
                <th>Designation</th>
                <th>Date</th>
                <th>Position/Skills</th>
                <th>Qualification</th>
                <th>Years Of Experience</th>
                <th>CTC</th>
                <th>Notice Period</th>
                <th>Contact No.</th>
                <th>Email ID</th>
                <th>Current Location</th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($job_application)) : ?>
                <?php foreach ($job_application as $key => $application) : ?>
<tr>
    <td><?php echo $key + 1; ?></td>
    <td><?php echo $application['emp_current_company_name']; ?></td>
    <td><?php echo $application['name'] . ' ' . $application['l_name']; ?></td>
    <td><?php echo $application['emp_current_desigantion']; ?></td>
    <td><?php echo $application['employment_created_at']; ?></td>
    <td><?php echo $application['emp_skill_used']; ?></td>
    <td><?php echo $application['education']; ?></td>
    <td><?php echo $application['total_exp_year'] . ' ' . $application['total_exp_month']; ?></td>
    <td><?php echo $application['emp_current_salary']; ?></td>
    <td><?php echo $application['emp_notice_period']; ?></td>
    <td><?php echo $application['contact']; ?></td>
    <td><?php echo $application['email']; ?></td>
    <td><?php echo $application['emp_location']; ?></td>
<td>
    <?php if (!empty($application['resume'])): ?>
        <a href="#" 
           class="view-resume" 
           data-resume-url="<?php echo base_url('uploads/resume/' . $application['resume']); ?>" 
           data-toggle="modal" 
           data-target="#resumeModal">
           Resume
        </a>
    <?php else: ?>
        <a href="#" 
           class="view-resume-missing" 
           onclick="alert('Resume not available.');">
           Resume
        </a>
    <?php endif; ?>
</td>
</tr>

<!-- Resume Modal -->
<div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="resumeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resumeModalLabel">Resume</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- The resume content will be dynamically loaded here -->
        <embed id="resumeFrame" src="" type="application/pdf" width="100%" height="400px" style="display:none;" />
        <p id="noResumeMessage" style="display:none;">Resume not available.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    $('.view-resume').on('click', function() {
        var resumeUrl = $(this).data('resume-url') + "#toolbar=0";  // Hide the toolbar
        
        if (resumeUrl) {
            $('#resumeFrame').attr('src', resumeUrl).show();
            $('#noResumeMessage').hide();
        } else {
            $('#resumeFrame').hide();
            $('#noResumeMessage').show();
        }
    });

    $('#resumeModal').on('hidden.bs.modal', function () {
        $('#resumeFrame').attr('src', '').hide(); 
        $('#noResumeMessage').hide();
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
<script>
$(document).ready(function() {
    function updateTableEntries() {
        var selectedValue = $('#exampleFormControlSelect1').val();
        var totalRows = $('tbody tr').length;
        $('tbody tr').hide();
        $('tbody tr').slice(0, selectedValue).show();
    }

    // Update table entries on dropdown change
    $('#exampleFormControlSelect1').on('change', function() {
        updateTableEntries();
    });

    // Initial load
    updateTableEntries();
});
</script>

                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="9" class="no-data">No applications found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div>

</body>
</html>
