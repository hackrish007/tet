<?php include 'sidemenu.php'; ?>
<?php include 'blue.php'; ?>

<div class="row page-titles">
    <div class="col-md-5 col-8 col-xs-12 align-self-center">
        <h3 class="text-themecolor">Faculty List</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('school/index')?>">Home</a></li>
            <li class="breadcrumb-item active">Faculty List</li>
        </ol>
    </div>
</div>
<?=$this->session->flashdata('msg') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Course List</h4>
            </div>
            <div class="card-body">
                <a href="<?= site_url('admin/add_faculty'); ?>" class="btn btn-primary float-right"><i class="mdi mdi-library-books"></i> Add Another Faculty</a>
                <div class="table-responsive m-t-40">
                    <table id="faculty_list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Course Name</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Father's Name</th>
                                <th>Address</th>
                                <th>Ddate of Birth</th>
                                <th>Acmd. Qualification</th>
                                <th>Teaching Experience</th>
                                <th>Profile Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('admin_assets/js/jquery.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#faculty_list').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('admin/faculty_list/'); ?>",
                "type": "POST"
            },
            "columnDefs": [{ 
                "targets": [0],
                "orderable": false
            }]
        });
    });
    function Delete(f_id){
        if(confirm("This Record will be Permanently Removed !! Are You Sure ??")) {
            var value = {f_id: f_id};
            $.ajax({
                type: "post",
                url: "<?= site_url('admin/delete_faculty'); ?>", 
                data: value, 
                cache: false,
                success: function(result) {
                    window.location.reload();
                }
            });
        }
    };
</script>