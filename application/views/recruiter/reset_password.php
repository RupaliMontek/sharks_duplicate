<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <div class="container forResetPwFormmm">
        <form action="<?php echo base_url('job_post/reset_password'); ?>" method="post">
            <h3>Reset Password</h3>
            <div class="frFormDesign">
            <input type="hidden" name="token" value="<?= $token ?>" />
            <input type="hidden" name="token" value="<?php echo $token; ?>">

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="repassword">Re-enter Password</label>
                <input type="password" name="repassword" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>
