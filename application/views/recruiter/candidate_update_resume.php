    <style>
        .profile-badge{
            border:1px solid #c1c1c1;
            padding:5px;
            position: relative;
        }

        .user-detail{
            background-color: #fff;
            position: relative;
            padding:150px 0px 10px 0px;
            color:#8B8B89;
        }
        .user-detail h3{
            margin: 0px;
            margin:0px 0px 5px 0px;
            color: #000;
        }
        .user-detail p{
            font-size:14px;
        }
        .user-detail .btn{
            margin-bottom:10px;
            background-color: #fff;
            border:1px solid #DEDEDE;
            border-radius: 10px;
            color:black;
            margin-left:15px;
        }
        .user-detail .btn i{
            color:#D35B4D;
            padding-right:18px;
        }
        .profile-pic{
            position: absolute;
            height:120px;
            width:120px;
            left: 50%;
            transform: translateX(-50%);
            top: 0px;
            z-index: 1001;
            padding: 10px;
        }
        .profile-pic img{
         
            border-radius: 50%;
            box-shadow: 0px 0px 5px 0px #c1c1c1;
            cursor: pointer;
            width: 100px;
            height: 100px;
        } 
        .profile{
            padding:80px;
        }

    </style>
    <section class="profile">
        <div class="container">
            <form action="<?php echo base_url()?>recruitment/update_resume" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 col-md-offset-4 col-sm-6 col-xs-12 profile-badge">
                    <!-- <img src="https://dummyimage.com/600x400/000/"> -->
                    <div class="profile-pic">
                    <a href="<?php echo base_url();?><?php echo $user_details[0]->candidate_resume ?>">Download Resume</a>
                        <input  type="file" id="resumes_upload" name="resumes_upload">
                        <div style="color:#999;" ></div>
                    </div>
                    <div class="user-detail ">
                    <button class="btn btn-primary" type="submit">Update Resume</button>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            </form>
        </div>
    </section>
    
    
