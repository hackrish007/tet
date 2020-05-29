<?php include 'sidemenu.php'; ?>
<?php include 'blue.php'; ?>

<div class="row page-titles">
    <div class="col-md-5 col-8 col-xs-12 align-self-center">
        <h3 class="text-themecolor">Student details</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('school/index')?>">Home</a></li>
            <li class="breadcrumb-item active">Student details</li>
        </ol>
    </div>
</div>
<?=$this->session->flashdata('msg') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add Student Details</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('admin/add_student') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Course&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">*</span></label>
                                    <select name="course_name" class="form-control">
                                        <option value="" hidden="hidden">--Select Course--</option>
                                        <?php if(isset($courses)) {  foreach($courses->result() as $row) {
                                            ?>
                                            <option value="<?= $row->id ?>"><?= $row->course_name ?></option>
                                        <?php  }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Year&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">*</span></label>
                                    <select name="course_year" class="form-control">
                                        <option value="" hidden="hidden">--Select Year--</option>
                                        <option value="2016-18">2016-18</option>
                                        <option value="2017-19">2017-19</option>
                                        <option value="2018-20">2018-20</option>
                                        <option value="2019-21">2019-21</option>
                                        <option value="2020-22">2020-22</option>
                                        <option value="2021-23">2021-23</option>
                                        <option value="2022-24">2022-24</option>
                                        <option value="2023-25">2023-25</option>
                                        <option value="2024-26">2024-26</option>
                                        <option value="2025-27">2025-27</option>
                                        <option value="2026-28">2026-28</option>
                                        <option value="2027-29">2027-29</option>
                                        <option value="2028-30">2028-30</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Student List&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">* &nbsp;Select Only .pdf File</span></label>
                                    <input type="file" class="form-control" name="student_details" accept=".pdf">
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