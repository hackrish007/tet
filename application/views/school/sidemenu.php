
    <body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?=site_url('school/index')?>">
                        <b>
                           <!-- <img src="<?php echo base_url(); ?>admin_assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="<?php echo base_url(); ?>admin_assets/images/logo-icon.png" alt="homepage" class="light-logo" />-->
                        </b>
                        <span>
                         <!--<img src="<?php echo base_url(); ?>/admin_assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <img src="<?php echo base_url(); ?>/admin_assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span>-->
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-text">
                                    <a href="<?= site_url('admin/logout')?>" class="btn btn-rounded btn-danger btn-sm"><i class="fa fa-power-off"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="profile-img">
                        <img alt="user" src="<?= base_url()?>assets/images/Logo_1.jpg" title=""/>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap"></li>
                        <li> <a class="waves-effect waves-dark" href="<?=site_url('admin/index');?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                     <!--   <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-book" aria-hidden="true"></i>
                                <span class="hide-menu">Courses</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?=site_url('admin/add_courses');?>">Add Courses</a>
                                </li>
                                    <li>
                                    <a href="<?=site_url('admin/course_list');?>">Courses List</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Student Details</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?=site_url('admin/add_student');?>">Add Student Details</a>
                                </li>
                                    <li>
                                    <a href="<?= site_url('admin/student_details')?>">Student Details List</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Faculty</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?= site_url('admin/add_faculty')?>">Add Faculty</a>
                                </li>
                                    <li>
                                    <a href="<?= site_url('admin/faculty')?>">Manage Faculty</a>
                                </li>
                            </ul>
                        </li>  
-->

                        <li> <a class="waves-effect waves-dark" href="<?= site_url('admin/add_gallery')?>" aria-expanded="false"><i class="fa fa-picture-o"></i><span class="hide-menu">Gallery</span></a>
                        </li> 
                        <li> <a class="waves-effect waves-dark" href="<?= site_url('admin/manage_slider')?>" aria-expanded="false"><i class="fa fa-picture-o"></i><span class="hide-menu">Manage Slider</span></a>
                        </li> 
                        <li> <a class="waves-effect waves-dark" href="<?= site_url('admin/manage_front_images')?>" aria-expanded="false"><i class="fa fa-picture-o"></i><span class="hide-menu">Manage Front Images</span></a>
                        </li> 
                        <li> <a class="waves-effect waves-dark" href="<?= site_url('admin/letest_news')?>" aria-expanded="false"><i class="fa fa-picture-o"></i><span class="hide-menu">ID Card</span></a>
                        </li> 
                           
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">