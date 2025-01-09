<!-- upload_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
</head>
<body>
    <h2>Upload Resume</h2>
    <!--form  method="post" enctype="multipart/form-data"-->
    <?php echo form_open_multipart('recruitment/transfer_resume'); ?>
    <input type="file" name="candidate_resume" id="candidate_resume"/>
    <button type="submit"  >Transfer</button>
    <?php echo form_close(); ?>
    <!--/form-->
</body>
</html>
<!--script>
function uploadResume() {
  const fileInput = document.getElementById('candidate_resume');
  const file = fileInput.files[0];
alert(file);
  if (file) {
    const formData = new FormData();
    formData.append('candidate_resume', file);

    // Use Fetch API to send the file to msuite.work
    fetch('http://msuite.work/recruitment/save_uploaded_file', {
      method: 'POST',
      body: file:file,
    })
    .then(response => {
      if (response.ok) {
        console.log('Resume successfully uploaded to msuite.work');
      } else {
        console.error('Failed to upload resume to msuite.work');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }
}
</script-->