<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMi8Q8dM6m+6S1rnXY+z84tvj3enSHkfKj5p5t1" crossorigin="anonymous">
    <style>
        /*body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }*/
        .modal {
        display: none; /* Hidden by default */
        position: fixed;
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black with opacity */
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        text-align: center;
    }
        #videoContainer {
            position: relative;
            width: 640px;
            height: 480px;
            margin-bottom: 20px;
        }
        #preview, #recordedVideo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-color: black;
        }
        #timerDisplay {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 18px;
        }
        .controls {
            margin-top: 10px;
        }
        button {
            margin: 0 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        button:disabled {
            opacity: 0.5;
            cursor: default;
        }
    </style>
<div class="container-fluid onRegisteringtextOuter"> 
<div class="container"> 
    <div class="row">
        <div class="col-lg-4 col-sm-12">
    <ul class="onRegisteringtext">
        
<img width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/jobprofile.png"/ alt="Job Profile">
      <h4>On registering, you can</h4>
    <li><i class="fa fa-angle-double-right"></i> Build your profile and let recruiters find you</li>
    <li><i class="fa fa-angle-double-right"></i> Get job postings delivered right to your email</li>
    <li><i class="fa fa-angle-double-right"></i> Find a job and grow your career</li>
  </ul>
  
  <ul class="onRegisteringtext">
      <h4>Job Openings</h4>
    <li><i class="fa fa-angle-double-right"></i> UI Designer at Montek Tech Services</li>
    <li><i class="fa fa-angle-double-right"></i> PHP Developer at Next Technologies</li>
    <li><i class="fa fa-angle-double-right"></i> UI Designer at Lakshmi Tech Services</li>
    <button style="margin-top:10px;" type="submit" class="btn btn-primary hvr-icon-forward">View All <i class="fa fa-chevron-circle-right hvr-icon"></i></button>
  </ul>
  
        </div>
        <div class="col-lg-6 col-sm-12">
<?php if ($this->session->flashdata("success") != "") { ?>
  <script>
    toastr.success('<?php echo $this->session->flashdata(
        "success"
    ); ?>', 'Success Alert', {timeOut: 8000})
  </script>
<?php } ?>
<?php if ($this->session->flashdata("error") != "") { ?>
  <script>
    toastr.error('<?php echo $this->session->flashdata(
        "error"
    ); ?>', {timeOut: 8000})
  </script>
<?php } ?>  
       <!-- <form class="forcreateaccount"> -->
        
        <?php
        $attributes = ["role" => "form", "id" => "candidate_registration"];
        echo form_open_multipart("Recruitment/Save_Candidate_register", $attributes);
        ?>
         <h1>Find a job & grow your career</h1>
  <div class="form-group">
    <label class="" for="exampleInputName">Name<span class="requireddd">*</span></label>
      <input type="text" class="form-control" name="candidate_name" id="candidate_name" placeholder="What is your name?" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email ID / Username<span class="requireddd">*</span></label>
    <input type="email" class="form-control" name="candidate_email" id="candidate_email4" required>
    <!--<div id="custom-error-message" style="display: none;">-->
    <!--<a id="canonicalLink" rel="canonical" href="#">-->
    <!--     Email Id Allready Register Please Click Here Profile View..</a>-->
    <!-- </div>-->
     <small id="emailHelp" class="form-text text-muted">We'll send you relevant jobs in your mail</small>
     
  </div>
  <div class="form-group">
                <label for="passwords">Enter Password <span style="color: red;">*</span></label>
                <div style="display: flex; align-items: center; position: relative;">
                    <input type="password" name="passwords" id="passwords" class="form-control" placeholder="Enter password" autocomplete="off" required>
                    <i class="fa fa-eye" id="togglePasswordIcon1" onclick="togglePasswordVisibility('passwords', 'togglePasswordIcon1')" style="position: absolute; right: 10px; cursor: pointer;"></i>
                </div>
            </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number<span class="requireddd">*</span></label>
  <input type="phone" class="form-control" name="phone" id="phone" aria-describedby="emailHelp" placeholder="Enter your 10 digit mobile no." required>
    <small id="emailHelp" class="form-text text-muted">You will receive an OTP on this number.</small>
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">Department<span class="requireddd">*</span></label>
    <select onchange="get_role_select_department(this.value)" class="form-control" id="departments" name="departments" required>
            <option value="" selected>Select Department</option> 
            <?php foreach($departments as $row)
            { ?>
            <option value="<?php echo $row->dept_id; ?>"><?php echo $row->dept_name; ?></option>
            <?php } ?>
    </select>
    <input type="hidden" class="form-control" type="text" id="role_id" name="role_id" >
    <input type="hidden" class="form-control" type="text" id="previous_recording" name="previous_recording" >
    <input type="hidden" class="form-control" type="text" id="camera_recording" name="camera_recording" >
  </div>

<div class="form-group">
<label for="work_status">Work Status<span class="requireddd">*</span></label><br>
<div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="work_status" id="work_status" value="Experienced">
  <label class="form-check-label" for="inlineCheckbox1">I'm Experienced<br>I have work experience (excluding internships)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="work_status" id="work_status" value="Fresher">
  <label class="form-check-label" for="inlineCheckbox2">I'm a Fresher<br>I am a student/ Haven't worked after graduation </label>
</div>
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">Upload Resume<span class="requireddd">*</span></label>
    <input type="file" class="form-control-file" name="candidate_resume" id="candidate_resume" required>
    <small id="emailHelp" class="form-text text-muted">DOC, DOCx, PDF, RTF | Max: 2 MB</small>
    <p>Recruiters give first preference to candidates who have a resume</p>
  </div>
  
  
<div class="form-group">
    <label for="exampleFormControlFile1">Portfolio Upload<span class="requireddd">*</span></label>
    <input type="file" class="form-control-file" name="portfolio_upload" id="portfolio_upload" required>
    <small id="emailHelp" class="form-text text-muted">DOC, DOCx, PDF, RTF | Max: 2 MB</small>
 </div>

<div class="form-group">
    <label for="exampleFormControlFile1">Innovation Doc</label>
    <input type="file" class="form-control-file" name="experiment_doc" id="experiment_doc">
    <small id="emailHelp" class="form-text text-muted">DOC, DOCx, PDF, RTF | Max: 2 MB</small>
 </div> 
 <div class="form-group">
 <input type="text" class="form-control" name="save_record_path" id="save_record_path">
 <input type="text" class="form-control" name="save_record_id" id="save_record_id">
    <label for="exampleFormControlFile1">Upload Video<span class="requireddd"></span></label>
    
    <!-- Labels for recording -->
    <label for="video">Record Video:</label>
    
    <!-- Video preview and timer display -->
    <div id="videoContainer">
        <video width="200" height="300" id="preview" autoplay muted></video>
        <div id="timerDisplay">00:00</div>
    </div>

    <div class="controls">
        <!-- Start and Stop buttons for recording -->
        <button type="button" id="buttonStart">Start Recording</button>
        <button type="button" id="buttonStop" disabled>Stop Recording</button>
        
        <!-- Video element for showing the recorded video -->
        <video id="recordedVideo" name="recordedVideo" width="200" height="300" controls style="display: none;"></video>
        
        <!-- Save button for saving the recorded video -->
        <button type="button" id="saveButton" disabled>Save Recording</button>
        <!-- <div id="timerDisplay">Time Remaining: 02:00</div> -->
    </div>
</div>


<!--<div class="form-group">
    <label for="exampleFormControlFile1">Video Introduction<span class="requireddd">*</span></label>
    <input type="file" class="form-control-file" name="video_introducation" id="video_introducation">
    <div id="uploadProgress"></div>
    <small id="emailHelp" class="form-text text-muted">mp4 | Max: 2 MB</small>
 </div>-->   
  
<div class="form-group">
    <label for="exampleFormControlFile1">Profile Picture<span class="requireddd">*</span></label>
    <input type="file" class="form-control-file" name="profile_picture" id="profile_picture" required>
    <small id="emailHelp" class="form-text text-muted">jpg,png,jpeg</small>
  </div>

  <div class="form-check form-group frspaceeecheckBoxx">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Send me important updates onWhatsApp <span class="fa fa-whatsapp"></span></label>
  </div>
  <button type="submit" class="btn btn-primary hvr-icon-forward">Register Now <i class="fa fa-chevron-circle-right hvr-icon"></i></button>
<?php echo form_close(); ?>
        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="googleSignUpdesign mobilegooglesign">
<span class="foror main-1">OR</span> <a href="<?= base_url('auth/googleLogin'); ?>"><div class="google-sigup-square"><span class="signupwith main-2">Continue with</span><button class="socialbtn google resman-btn-tertiary resman-btn-medium" type="button" name="google-register"><span class="icon-holder"><img src="//static.naukimg.com/s/7/104/assets/images/google-icon.9273ac87.svg" class="socialIcnImg"></span><span class="google-text">Google</span></button></div></a></div>
        </div>
    </div>
  </div>
</div>
<script>
  async function main () {
    const buttonStart = document.querySelector('#buttonStart');
    const buttonStop = document.querySelector('#buttonStop');
    const saveButton = document.querySelector('#saveButton'); // Save button
    const preview = document.querySelector('#preview'); // Live preview video
    const recordedVideo = document.querySelector('#recordedVideo'); // Recorded video
    const videoContainer = document.querySelector('#videoContainer'); // Video container
    const timerDisplay = document.querySelector('#timerDisplay'); // Timer display

    let mediaRecorder;
    let recordedChunks = [];
    let recordedBlob;  // Declare recordedBlob here so it's accessible in the entire scope
    let recordingStartTime;
    let timerInterval;

    // Accessing media devices (video and audio)
    const stream = await navigator.mediaDevices.getUserMedia({ 
      video: true,
      audio: true,
    });

    // Set up live video preview
    preview.srcObject = stream;

    // Initialize media recorder
    mediaRecorder = new MediaRecorder(stream, { 
      mimeType: 'video/webm',
    });

    // Handle start recording
    buttonStart.addEventListener('click', () => {
      mediaRecorder.start();
      buttonStart.setAttribute('disabled', ''); // Disable start button
      buttonStop.removeAttribute('disabled'); // Enable stop button
      saveButton.setAttribute('disabled', ''); // Disable save button while recording
      recordedChunks = []; // Reset chunks
      timerDisplay.innerText = '02:00'; // Reset timer display
      startTimer(120); // Start 2-minute countdown
    });

    // Handle stop recording
    buttonStop.addEventListener('click', () => {
      mediaRecorder.stop();
      buttonStart.removeAttribute('disabled'); // Enable start button again
      buttonStop.setAttribute('disabled', ''); // Disable stop button
      clearInterval(timerInterval); // Stop the timer
    });

    // Store the recorded video chunks
    mediaRecorder.addEventListener('dataavailable', (event) => {
      recordedChunks.push(event.data);
    });

    mediaRecorder.addEventListener('stop', () => {
      recordedBlob = new Blob(recordedChunks, { type: 'video/webm' });
      const videoURL = URL.createObjectURL(recordedBlob);
      recordedVideo.src = videoURL;
      recordedVideo.style.display = "block";
      console.log('Recorded Blob:', recordedBlob);
      console.log('Blob Size:', recordedBlob.size);
      saveButton.removeAttribute('disabled');
    });

    saveButton.addEventListener('click', () => {
      if (!recordedBlob) {
        alert('No video recorded.');
        return;
      }

    const formData = new FormData();
    console.log(formData);
    formData.append('video', recordedBlob, 'recorded_video.webm');

// Log form data for debugging (to check the data before sending)
for (let [key, value] of formData.entries()) {
  console.log(`${key}:`, value);
}

// const formData = new FormData();
// formData.append('video', recordedBlob, 'recorded_video.webm');

fetch('<?php echo base_url("Recruitment/upload"); ?>', {
  method: 'POST',
  body: formData, // Send FormData directly
})
.then(response => response.json())  // Parse the JSON response
.then(data => {
  if (data.status === 'success') {
    alert('Video uploaded and saved successfully!');
    $('#save_record_path').val(data.file_path);
    $('#save_record_id').val(data.video_id);
    console.log(data.file_path);
    console.log(data.video_id);
  } else {
    alert('Error: ' + data.message);
  }
})
.catch(error => {
  alert('An error occurred while uploading the video.');
  
  console.error('Error:', error);
});


    });

    // Function to start the timer countdown
    function startTimer(duration) {
      let remainingTime = duration;
      timerInterval = setInterval(() => {
        const minutes = Math.floor(remainingTime / 60);
        const seconds = remainingTime % 60;
        timerDisplay.innerText = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        if (remainingTime <= 0) {
          clearInterval(timerInterval);
          buttonStop.click(); // Stop recording automatically when time is up
        } else {
          remainingTime--;
        }
      }, 1000);
    }
  }
  main();
</script>

