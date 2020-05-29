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
                <form action="<?= site_url('admin/edit_student_details') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="student_id" value="<?= $students->id ?>">
                    <input type="hidden" name="student_pdf" value="<?= $students->student_pdf ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Course&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">*</span></label>
                                    <select name="course_name" class="form-control">
                                        <option value="" hidden="hidden">--Select Course--</option>
                                        <?php if(isset($courses)) {  foreach($courses->result() as $row) {
                                            ?>
                                            <option value="<?= $row->id ?>" <?= $row->id == $students->course_name ? 'selected' : '' ?>><?= $row->course_name ?></option>
                                        <?php  }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Year&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">*</span></label>
                                    <select name="course_year" class="form-control">
                                        <option value="" hidden="hidden">--Select Year--</option>
                                        <option value="2016-18" <?= $students->course_year == '2016-18' ? 'selected' : '' ?>>2016-18</option>
                                        <option value="2017-19" <?= $students->course_year == '2017-19' ? 'selected' : '' ?>>2017-19</option>
                                        <option value="2018-20" <?= $students->course_year == '2018-20' ? 'selected' : '' ?>>2018-20</option>
                                        <option value="2019-21" <?= $students->course_year == '2019-21' ? 'selected' : '' ?>>2019-21</option>
                                        <option value="2020-22" <?= $students->course_year == '2020-22' ? 'selected' : '' ?>>2020-22</option>
                                        <option value="2021-23" <?= $students->course_year == '2021-23' ? 'selected' : '' ?>>2021-23</option>
                                        <option value="2022-24" <?= $students->course_year == '2022-24' ? 'selected' : '' ?>>2022-24</option>
                                        <option value="2023-25" <?= $students->course_year == '2023-25' ? 'selected' : '' ?>>2023-25</option>
                                        <option value="2024-26" <?= $students->course_year == '2024-26' ? 'selected' : '' ?>>2024-26</option>
                                        <option value="2025-27" <?= $students->course_year == '2025-27' ? 'selected' : '' ?>>2025-27</option>
                                        <option value="2026-28" <?= $students->course_year == '2026-28' ? 'selected' : '' ?>>2026-28</option>
                                        <option value="2027-29" <?= $students->course_year == '2027-29' ? 'selected' : '' ?>>2027-29</option>
                                        <option value="2028-30" <?= $students->course_year == '2028-30' ? 'selected' : '' ?>>2028-30</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Student List&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">* &nbsp;Select Only .pdf File</span></label>
                                    <input type="file" class="form-control" name="student_details" accept=".pdf"> <span><?= $students->student_pdf ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="submit" value="Submit"> <i class="fa fa-check"></i>&nbsp;Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>