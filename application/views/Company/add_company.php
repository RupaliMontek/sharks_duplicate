<!--style>
    video {
  margin-top: 2px;
  border: 1px solid black;
}

.button {
  cursor: pointer;
  display: block;
  width: 160px;
  border: 1px solid black;
  font-size: 16px;
  text-align: center;
  padding-top: 2px;
  padding-bottom: 4px;
  color: white;
  background-color: darkgreen;
  text-decoration: none;
}

h2 {
  margin-bottom: 4px;
}

.left {
  margin-right: 10px;
  float: left;
  width: 160px;
  padding: 0px;
}

.right {
  margin-left: 10px;
  float: left;
  width: 160px;
  padding: 0px;
}

.bottom {
  clear: both;
  padding-top: 10px;
}
</style-->
<form action="<?php echo base_url() ?>company/save_sharks_company_form" method="post"  id="video-upload-form" enctype="multipart/form-data">

<div class="container-fluid onRegisteringtextOuter"> 
<div class="container"> 
    <div class="row">
        <div class="col-lg-6 col-sm-12">
<img width="100%" height="auto" src="<?php echo base_url() ?>frontend/images/jobprofile.jpg"/ alt="Job Profile">
        </div>
        
        <div class="col-lg-6 col-sm-12">
  
         <h1>Company Details</h1>
         <h4>Create an account</h4>
  <div class="form-group">
    <label class="" for="exampleInputName">Name<span class="requireddd">*</span></label>
      <input type="text" class="form-control" name="name" id="name" placeholder="What is your name?">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email ID / Username<span class="requireddd">*</span></label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="" placeholder="Enter your active Email ID/Username">
     <small id="emailHelp" class="form-text text-muted">We'll send you relevant jobs in your mail</small>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number<span class="requireddd">*</span></label>
  <div class="frmobinput"><input type="text" name="contact_code" id="contact_code" spellcheck="false" autocomplete="off" placeholder="+91" class="plusnineone" style="cursor: pointer;" readonly="" value="+91">
  <input type="phone" class="form-control" name="contact" id="contact" aria-describedby="emailHelp" placeholder="Enter your 10 digit mobile no." value=""></div>
    <small id="emailHelp" class="form-text text-muted">You will receive an OTP on this number.</small>
  </div>
  
   <div class="form-group">
    <label for="exampleInputEmail1">No. of Employees<span class="requireddd">*</span></label>
    <select class="form-select form-control" aria-label="Default select example" name="No_of_Employees" id="No_of_Employees">
  <option selected>Select Range</option>
  <option value="1">1-14</option>
  <option value="2">15-49</option>
  <option value="3">50-100</option>
  <option value="3">101-200</option>
  <option value="3">201-500</option>
  <option value="3">501 and above</option>
</select>
  </div>
  
    <div class="form-group">
    <label class="" for="exampleInputName">Company name (as per KYC documents)<span class="requireddd">*</span></label>
      <input type="text" class="form-control" name="company_KYC" id="company_KYC" placeholder="Please enter a company name.">
  </div>
  
<div class="form-group">
    <label for="exampleInputEmail1">Select Industry<span class="requireddd">*</span></label>
    <select class="form-select form-control" aria-label="Default select example" name="industry" id="industry">
  <option selected>Select Industry</option>
  <option value="1">Industry 1</option>
  <option value="2">Industry 2</option>
  <option value="3">Industry 3</option>
  <option value="3">Industry 4</option>
</select>
  </div>
  
<div class="form-group">
    <label class="" for="exampleInputName">Your designation<span class="requireddd">*</span></label>
      <input type="text" class="form-control" name="designation" id="designation" placeholder="Please enter your designation">
  </div>
  
<div class="form-group">
    <label class="" for="exampleInputName">Pin code<span class="requireddd">*</span></label>
      <input type="text" class="form-control" name="pin_code" id="pin_code" placeholder="Please enter pin code">
  </div>
  
<div class="form-group">
    <label class="" for="exampleInputName">Street address<span class="requireddd">*</span></label>
      <textarea type="text" class="form-control" name="street_address" id="street_address"></textarea>
  </div>
<div class="form-group">
    <label for="exampleFormControlFile1">Upload Company Logo<span class="requireddd">*</span></label>
    <input type="file" class="form-control-file" name="company_logo" id="company_logo">
    <small id="emailHelp" class="form-text text-muted">PNG,JPG | Max: 2 MB</small>
    <small>Company logo</small>
  </div>

<!--<div class="form-group">-->
<!--    <label for="exampleFormControlFile1">Upload Video<span class="requireddd">*</span></label>-->
       <!-- Add a video element for recording -->
<!--    <label for="video">Record Video:</label>-->
    <!--video id="video" name="video" width="400" height="300" autoplay></video>
    <button type="button" id="startRecording">Start Recording</button>
    <button type="button" id="stopRecording">Stop Recording</button>

    
   
    <small id="emailHelp" class="form-text text-muted">mp4,mov,wmv,avi,mkv | Max: 2 MB</small>
    <small>Company give first preference who have a video</small-->
    
  <!--div class="left">
  <div id="startButton" class="button">
    Start
  </div>
  <h2>Preview</h2>
  <video id="preview" width="160" height="120" autoplay muted></video>
 
</div>
<div class="right">
  <div id="stopButton" class="button">
    Stop
  </div>
  <h2>Recording</h2>
  <video id="recording" width="160" height="120" controls></video>
  <a id="downloadButton" class="button">
    Download
  </a> <input type="hidden" name="video_data" id="videoData">
</div> 
<div class="bottom">
  <pre id="log"></pre>
</div-->        <!--video id="preview" width="400" height="300" autoplay muted></video-->
  <!-- <h2>Record and Upload Video</h2>-->
  <!-- <input type="hidden" name="video_data" id="videoData">-->
  <!--  <video id="video" width="640" height="480" autoplay></video>-->
  <!--  <button type="button" id="startRecord">Start Recording</button>-->
  <!--  <button  type="button" id="stopRecord" disabled>Stop Recording</button>-->
  <!--  <button type="button" id="preview">Preview</button>-->
  <!--  <button type="button" id="upload" disabled>Upload Video</button>-->
  <!--</div>-->
  

  <div class="form-check form-group frspaceeecheckBoxx">
    <input type="checkbox" class="form-check-input" id="terms_condition"   name="terms_condition">
    <label class="form-check-label" for="exampleCheck1">I agree to Terms & conditions and Privacy policy </label>
  </div>
  
  <button type="submit" class="btn btn-primary hvr-icon-forward">Create Account <i class="fa fa-chevron-circle-right hvr-icon"></i></button>
        </div>
       
    </div>
  </div>

</form>
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">        
        
        <div class="modal-content">
        <div class="modal-header">         
         <h2 class="main_title heading"><span>verify your email address</span></h2> 
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
         <div id="verify_email_popup" class="white-popup-block mfp-hide popup-position">
            <div class="popup-title">
                 
            </div>            
                  <div class="popup-detail">
                    
                    <div class="main-search">
                        <div class="header_search_toggle desktop-view">
                            <div class="search-box">
                       &nbsp;&nbsp;&nbsp;&nbsp;<label for="work_status"> Email Id:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input class="form-control" type="email" name="emails" id="emails" placeholder="Email ID" value="jaywantfybcom123@gmail.com">
                                </div>
                            </div>
                            </br>
                             
                      &nbsp;&nbsp;&nbsp;&nbsp;<span>Not Received Mail? <button id="verify_email" type="submit" class="btn-primary">Resend Verification Link</button></span>  
                        </div>
                     
    </div>  
    </div>         
      </div>
      </div>
      </div>
      </div>
     <script>
        const videoElement = document.getElementById('video');
        const startRecordButton = document.getElementById('startRecord');
        const stopRecordButton = document.getElementById('stopRecord');
        const previewButton = document.getElementById('preview');
        const uploadButton = document.getElementById('upload');

        let mediaRecorder;
        let recordedChunks = [];

        startRecordButton.addEventListener('click', startRecording);
        stopRecordButton.addEventListener('click', stopRecording);
        previewButton.addEventListener('click', previewRecording);
        uploadButton.addEventListener('click', uploadRecording);

        async function startRecording() {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });
            videoElement.srcObject = stream;

            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = (event) => {
                if (event.data.size > 0) {
                    recordedChunks.push(event.data);
                }
            };

            mediaRecorder.onstop = () => {
                videoElement.srcObject = null;
            };

            startRecordButton.disabled = true;
            stopRecordButton.disabled = false;
            previewButton.disabled = false;
            uploadButton.disabled = true;

            mediaRecorder.start();
        }

        function stopRecording() {
            startRecordButton.disabled = false;
            stopRecordButton.disabled = true;
            previewButton.disabled = false;
            uploadButton.disabled = false;

            mediaRecorder.stop();
        }

        function previewRecording() {
            const blob = new Blob(recordedChunks, { type: 'video/webm' });
            videoElement.src = URL.createObjectURL(blob);
        }

        function uploadRecording() {
            const blob = new Blob(recordedChunks, { type: 'video/webm' });
  // Create a FormData object and append the video blob
            let formData = new FormData();
            formData.append('video_data', blob);console.log(formData);
            fetch('<?php echo site_url('company/save_sharks_company_form'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
            })
            .catch(error => {
                console.error('Error uploading video:', error);
            });
            
        }
    </script>
