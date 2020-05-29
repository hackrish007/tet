<?php include 'sidemenu.php'; ?>
<?php include 'blue.php'; ?>

<div class="row page-titles">
    <div class="col-md-5 col-8 col-xs-12 align-self-center">
        <h3 class="text-themecolor">Gallery</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('school/index')?>">Home</a></li>
            <li class="breadcrumb-item active">Gallery</li>
        </ol>
    </div>
</div>
<?=$this->session->flashdata('msg') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add Gallery Images</h4>
            </div>
            <div class="card-body">
                <form action="<?= site_url('admin/add_gallery') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Category&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">*</span></label>
                                    <select name="image_category" class="form-control">
                                        <option value="" hidden="hidden">--Select Category--</option>
                                        <option value="labs">Crimes</option>
                                        <option value="campus">Meeting</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Image&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;">* &nbsp;Select Only Images &nbsp;&nbsp;(400 x 400)</span></label>
                                    <input type="file" class="form-control images" name="gallery_image[]" accept=".jpg,.jpeg,.png,.gif" multiple required>
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
                <h4 class="m-b-0 text-white">Gallery Image List</h4>
            </div>
            <div class="card-body">
                
                <div class="table-responsive m-t-40">
                    <table id="gallery_list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Category Name</th>
                                <th>Images</th>
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
        $('#gallery_list').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('admin/gallery_list/'); ?>",
                "type": "POST"
            },
            "columnDefs": [{ 
                "targets": [0],
                "orderable": false
            }]
        });
        /* $(".images").change(function (e) {
            var img;
            $(this.files).each(function( index ,value ) {
                console.log(value);
                img = new Image();
                img.onload = function () {
                    if(this.width != 400 && this.height != 400 ) {
                        alert('Please select Images of Given Size');
                        $("#img_btn").attr('disabled' , true); 
                    } else {
                        $("#img_btn").attr('disabled' , false); 
                    }
                };
                img.src = _URL.createObjectURL(value);
            });
        }); */
    });
    function Delete(g_id){
        if(confirm("This Record will be Permanently Removed !! Are You Sure ??")) {
            var value = {g_id: g_id};
            $.ajax({
                type: "post",
                url: "<?= site_url('admin/delete_gallery'); ?>", 
                data: value, 
                cache: false,
                success: function(result) {
                    window.location.reload();
                }
            });
        }
    };
</script>