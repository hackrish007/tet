<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>assets/favi.png">
        <title>:: STNDSS ::</title>
        <link href="<?= base_url()?>assets/css/reset.css" rel="stylesheet">
        <link href="<?= base_url()?>assets/css/fonts.css" rel="stylesheet">
        <link href="<?= base_url()?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url()?>assets/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= base_url()?>assets/assets/iconmoon/css/iconmoon.css" rel="stylesheet">
        <link href="<?= base_url()?>assets/css/custom.css" rel="stylesheet">
    </head>
    <body class="fill-bg">
        <div id="loading">
            <div class="element">
                <div class="sk-folding-cube">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>
        <section class="login-wrapper">
            <div class="inner">
                <div class="login">
                    <div class="login-logo"> <a href="index.html"><img src="<?= base_url()?>assets/images/logo1.png" class="img-responsive" alt=""></a> </div>
                    <div class="head-block">
                        <h1>LOGIN  Now</h1>
                    </div>
                    <div class="cnt-block">
                        <form action="<?= site_url('home/login')?>" method="post" class="form-outer">
                            <div id="flash_msg" style="text-align:left">
                                <?= $this->session->flashdata('msg') ?>
                            </div>
                            <input name="username" type="text" placeholder="Username or Email">
                            <input name="password" type="password" placeholder="password">
                            <div class="form-group">
                               <!-- <div class="g-recaptcha" data-sitekey="6Lc4er0UAAAAAJ0YRiPeJQHWGQcp2lZc-rDAyJ8x"></div> -->
                            </div>
                            <div class="button-outer">
                                <button type="submit"  class="btn" value="Submit" name="submit">Login now <span class="icon-more-icon"></span></button>
                            </div>
                            <!-- <div class="remember">
                                <div class="check">
                                    <input type="checkbox" id="test1" name="remember_me" value="1" />
                                    <label for="test1">Remember me</label>
                                </div>
                                <a href="#" class="forgot"><span>?</span>Forgot password</a> 
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?= base_url()?>assets/js/jquery.min.js"></script> 
        <script src="<?= base_url()?>assets/assets/bootstrap/js/bootstrap.min.js"></script> 
        <script src="<?= base_url()?>assets/js/custom.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </body>
</html>