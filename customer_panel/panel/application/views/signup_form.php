<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Infinity - Bootstrap Admin Template</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <link rel="shortcut icon" sizes="196x196" href="<?php echo base_url("assets"); ?>/assets/images/logo.png">
    
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/assets/css/core.css">
    <link rel="stylesheet" href="<?php echo base_url("assets"); ?>/assets/css/misc-pages.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page">
    <div id="back-to-home">
        <a href="#" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
    </div>
    <div class="simple-page-wrap">
        <div class="simple-page-logo animated swing">
            <a href="#">
                <span><i class="fa fa-gg"></i></span>
                <span>Infinity</span>
            </a>
        </div><!-- logo -->
        
        <div class="simple-page-form animated flipInY" id="signup-form">
            <h4 class="form-title m-b-xl text-center">Sign Up For a new Account</h4>
            <form action="<?php echo base_url('login/add_user'); ?>" method="post"> <!-- Action düzenlendi -->
                <div class="form-group">
                    <input id="sign-up-name" type="text" name="name" class="form-control" placeholder="Name"> <!-- Name attribute eklendi -->
                </div>

                <div class="form-group">
                    <input id="sign-up-surname" type="text" name="surname" class="form-control" placeholder="Surname"> <!-- Surname alanı eklendi -->
                </div>

                <div class="form-group">
                    <input id="sign-up-email" type="email" name="email" class="form-control" placeholder="Email"> <!-- Name attribute eklendi -->
                </div>

                <div class="form-group">
                    <input id="sign-up-password" type="password" name="password" class="form-control" placeholder="Password"> <!-- Name attribute eklendi -->
                </div>

                <div class="form-group m-b-xl">
                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" id="keep_me_logged_in"/>
                        <label for="keep_me_logged_in">Keep me signed in</label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="SIGN UP"> <!-- Buton t
