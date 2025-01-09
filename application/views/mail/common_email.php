<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Sharks Job</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<style type="text/css">
	body {
    font-family: 'Nunito', sans-serif;
}
</style>
</head>
<body>

<div class="" style="width: 20%;display: inline-block;"></div>
<div class="boxshdw" style="box-shadow: 0px 0px 7px #ec2d48;
    width: 54%;
    display: inline-block;
    margin-top: 2%;
    height: auto;
    padding-bottom: 10px;
    padding-top: 10px;
    border-top: 6px solid #ec2d48;
    border-bottom: 3px solid #ec2d48;">

<div class="">


</div>
<div class="">
<h2 style="text-align: center;padding-top: 20px;color: #0096ff;text-transform: uppercase;font-size: 18px;
    font-weight: bold;margin-bottom: 0px;">Sharks Job</h2> 
</div>

<div class="mncnt-p" style="padding-left: 20px;padding-right: 20px;margin-top: 30px;">
<p class="" style="font-weight: bold;color: #5d5d5d; font-size: 16px;"> Dear <?php echo $first_name;?>, </p>
<?php if(@$mail_for=='welcome_registration'){ ?>
<p class="" style="color: rgb(149, 155, 160); font-size: 16px;"></p>
<p class="" style="color: rgb(149, 155, 160); font-size: 16px;"><?php if(!empty($email_text)){echo $email_text;}?></p>
<?php }elseif(@$mail_for=='forgot_password'){ ?>
<p class="" style="color: rgb(149, 155, 160); font-size: 16px;"></p>
<p class="" style="color: rgb(149, 155, 160); font-size: 16px;"><?php if(!empty($email_text)){echo $email_text;}?></p>
<?php }elseif(@$mail_for=='account_verification'){?>
<p class="" style="color: rgb(149, 155, 160); font-size: 16px;"></p>
<p class="" style="color: rgb(149, 155, 160); font-size: 16px;"><?php if(!empty($email_text)){echo $email_text;}?></p>
<?php }elseif(@$mail_for=='order_details'){?>
<?php if(!empty($email_text)){echo $email_text;}?>
<?php }else{?>
<p class="" style="color: rgb(149, 155, 160); font-size: 16px;"></p>
<ul style="padding-left: 19px;color: #000;font-size: 15px;">
<?php if(!empty($email_text)){echo $email_text;}?>
</ul>
<?php } ?>


<!--<hr style="border-top: 1px solid #adadad;">-->
<!--<div class="ensecnt-p" style="text-align: center;">-->
<!--<p style=" color: #5d5d5d; font-size: 16px;">©2019 Cubehub</p>-->
<!--<p style="color: #5d5d5d; font-size: 16px;">117 Spandan D13 Popular Nagar, Pune, MH 411058</p>-->
<!--</div>-->
</div>
</div>
<div class="" style="width: 20%;display: inline-block;"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>