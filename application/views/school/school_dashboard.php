    <?php include 'sidemenu.php'; ?>
    <?php include 'blue.php'; ?>
    <div class="row page-titles">
        <div class="col-md-5 col-8 col-xs-12 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('school/index')?>">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

    <?=$this->session->flashdata('msg') ?>
    <!--
     <div class="row">
        <div class="col-lg-4 col-md-4 p-r-5">
            <div class="total-div bg-warning">
                 <div class="row">
                    <div class="col-lg-6 col-md-6">
                         <i class="icon-graduation"></i>
                    </div>
        
                    <div class="col-lg-6 col-md-6">
                        <span class="count"><?= $course ?></span>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <span class="m-t-15">Total Courses</span>
                    </div>
                  </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 p-l-5 p-r-5">
             <div class="total-div bg-teal">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                         <i class="icon-people"></i>
                    </div>
        
                    <div class="col-lg-6 col-md-6">
                        <span class="count"><?= $student ?></span>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <span class="m-t-15">Total Student Details</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 p-l-5">
            <div class="total-div bg-purple">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                           <i class="icon-doc"></i>
                    </div>
        
                    <div class="col-lg-6 col-md-6">
                        <span class="count"><?= $faculty ?></span>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <span class="m-t-15">Total Faculty</span>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</div>
