<?php include 'sidemenu.php'; ?>
<?php include 'blue.php'; ?>

<div class="row page-titles">
    <div class="col-md-5 col-8 col-xs-12 align-self-center">
        <h3 class="text-themecolor">ID Card</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('school/index')?>">Home</a></li>
            <li class="breadcrumb-item active">ID Card</li>
        </ol>
    </div>
</div>
<?=$this->session->flashdata('msg') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add ID Cards</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('admin/letest_news') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enter ID Card Type&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">*</span></label>
                                    <input type="text" name="letest_news" class="form-control" required >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Pdf&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">* &nbsp;</span></label>
                                    <input type="file" class="form-control images" name="news_file" accept=".pdf" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success" name="submit" id="img_btn" value="Submit"> <i class="fa fa-check"></i>&nbsp;&nbsp;Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">ID Cards List</h4>
            </div>
            <div class="card-body">
                
                <div class="table-responsive m-t-40">
                    <table id="news_list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>ID</th>
                                <th>Pdf Files</th>
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
        var _URL = window.URL || window.webkitURL;
        $('#news_list').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('admin/news_list/'); ?>",
                "type": "POST"
            },
            "columnDefs": [{ 
                "targets": [0],
                "orderable": false
            }]
        });
    });
    function Delete(g_id){
        if(confirm("This Record will be Removed !! Are You Sure ??")) {
            var value = {g_id: g_id};
            $.ajax({
                type: "post",
                url: "<?= site_url('admin/delete_news'); ?>", 
                data: value, 
                cache: false,
                success: function(result) {
                    window.location.reload();
                }
            });
        }
    };
</script>