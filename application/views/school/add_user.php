<?php include 'sidemenu.php'; ?>
<?php include 'blue.php'; ?>
<div class="row page-titles">
    <div class="col-md-5 col-8 col-xs-12 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0"><?= $Add_user ?></h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('school/index')?>"><?= $Home ?></a></li>
            <li class="breadcrumb-item active"><?= $Add_user ?></li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<?=$this->session->flashdata('msg') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"><?= $Add_user ?></h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('school/create_user') ?>" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?= $Name ?></label>
                                    <input type="text" name="first_name" required="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?= $surname ?></label>
                                    <input type="text" name="last_name" required="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?= $user_level ?></label>
                                    <select class="form-control custom-select" name="user_type" required>
                                        <option value=""><?= $Please_Select ?></option>
                                        <?php 
                                            if(!empty($level)){
                                                foreach($level as $row){
                                                   echo '<option value="'.$row['id'].'">'.$row['level'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label><?= $Email ?></label>
                                    <input type="email" name="email" required="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?= $Subject ?></label>
                                    <div class="demo-checkbox">
                                        <?php 
                                            if(!empty($subject_data)){
                                                foreach ($subject_data as $key => $value) {
                                        ?>
                                        <input type="checkbox" id="md_checkbox_<?= $key?>" class="filled-in chk-col-green" name="subject[]" value="<?= $value['id'] ?>" />
                                        <label for="md_checkbox_<?= $key?>"><?= $value['subject_name'] ?></label>
                                    <?php } } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> <?= $Save ?></button>
                      <!--   <button type="button" class="btn btn-inverse">Cancel</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>