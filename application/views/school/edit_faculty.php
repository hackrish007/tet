<?php include 'sidemenu.php'; ?>
<?php include 'blue.php'; ?>

<div class="row page-titles">
    <div class="col-md-5 col-8 col-xs-12 align-self-center">
        <h3 class="text-themecolor">Add Faculty</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('school/index')?>">Home</a></li>
            <li class="breadcrumb-item active">Add Faculty</li>
        </ol>
    </div>
</div>
<?=$this->session->flashdata('msg') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add Faculty</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('admin/edit_faculty') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="faculty_id" value="<?= $faculty->id ?>">
                    <input type="hidden" name="image" value="<?= $faculty->profile_image ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Course</label>
                                    <select name="course_name" class="form-control">
                                        <option value="" hidden="hidden">--Select Course--</option>
                                        <option value="0" <?= $faculty->course_name == 0 ? 'selected' : '' ?>>Non-Teaching Faculty</option>
                                        <?php if(isset($courses)) {  foreach($courses->result() as $row) {
                                            ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $faculty->course_name ? 'selected' : '' ?>><?= $row->course_name ?></option>
                                        <?php  }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" required class="form-control" placeholder="Enter Name" value="<?= $faculty->name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" required class="form-control" placeholder="Enter Designation" value="<?= $faculty->designation ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Father's Name</label>
                                    <input type="text" name="f_name" required class="form-control" placeholder="Enter Father's Name" value="<?= $faculty->father_name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" required placeholder="Enter Address"><?= $faculty->address ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" name="dob" id="date" required class="form-control datepickstart" placeholder="dd/mm/yyyy" value="<?= date('Y-m-d', strtotime($faculty->dob) ) ?>" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Academic Qualification</label>
                                    <input type="text" name="a_qualification" required class="form-control" placeholder="Enter Qualification" value="<?= $faculty->academic_qualification ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Professional Qualification</label>
                                    <input type="text" name="p_qualification" required class="form-control" placeholder="Enter Qualification" value="<?= $faculty->prof_qualification ?>" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Teaching Experience</label>
                                    <input type="text" name="teaching_exp" class="form-control" placeholder="Enter Teaching Experience" value="<?= $faculty->teaching_exp ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="file" name="profile_image" class="form-control" accept=".jpg,.png,.gif"  >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span>
                                        <img style="height:90px;width:100px" src="<?= base_url()?>/upload/profile_image/<?= $faculty->profile_image ?>">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="submit" value="Submit"> <i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>