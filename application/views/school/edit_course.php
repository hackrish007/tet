<?php include 'sidemenu.php'; ?>
<?php include 'blue.php'; ?>

<div class="row page-titles">
    <div class="col-md-5 col-8 col-xs-12 align-self-center">
        <h3 class="text-themecolor">Add Courses</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('school/index')?>">Home</a></li>
            <li class="breadcrumb-item active">Add Courses</li>
        </ol>
    </div>
</div>
<?=$this->session->flashdata('msg') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add Courses</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('admin/edit_course') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="course_id" value="<?= $courses->id ?>">
                    <input type="hidden" name="nro" value="<?= $courses->nro_files ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Course Name</label>
                                    <input type="text" name="course_name" required class="form-control" value="<?= $courses->course_name ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload NRO Files</label>
                                    <input type="file" name="nro_files" required class="form-control" accept=".pdf">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="submit" value="Submit"> <i class="fa fa-check"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>