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
<div id="flash_img">
    <?=$this->session->flashdata('msg') ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Front Image List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <table id="gallery_list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th colspan="3">Action&nbsp;&nbsp;&nbsp;<span style="color:red;font-size: 13px;"> &nbsp;<!-- Select Only Images &nbsp;&nbsp;(2000 x 590) --></span></th>
                                <th>Image</th>
                            </tr>
                            <tr>
                                <th>Front Image 1</th>
                                <form action="<?= site_url('admin/chnage_front_image') ?>" method="post" enctype="multipart/form-data" >
                                    <th>
                                        <input type="hidden" value="1" name="img_type">
                                        <input type="file" name="image_name" accept=".jpg,.jpeg" required class="s_images">
                                    </th>
                                    <th><input type="text" name="image_quote1" required class="form-control" value="<?= (!empty($get_front_image[0]['image_quote1'])) ? $get_front_image[0]['image_quote1'] : '' ?>" ></th>
                                    <th>                                        <button class="btn btn-primary" id="btn_slider_image"><i class="fa fa-save"></i></button>
                                    </th>
                                </form>
                                    <!-- <a href="#" class="btn btn-danger delete_front_image" data-imagetype="1"><i class="fa fa-trash"></i></a> -->
                                <th><img src="<?= base_url()?>upload/front_images/<?= (!empty($get_front_image[0]['image_1'])) ? $get_front_image[0]['image_1'] : 'images.png' ?>" alt="Slider Image 1" style="height:100px;width:100px;border-radius:50%"></th>
                            </tr>
                            <tr>
                                <th>Front Image 2</th>
                                <form action="<?= site_url('admin/chnage_front_image') ?>" method="post" enctype="multipart/form-data" >
                                    <th>
                                        <input type="hidden" value="2" name="img_type">
                                        <input type="file" name="image_name" accept=".jpg,.jpeg" required class="s_images">
                                    <!-- <a href="#" class="btn btn-danger delete_front_image" data-imagetype="2"><i class="fa fa-trash"></i></a> -->
                                    </th>
                                    <th><input type="text" name="image_quote2" required  class="form-control" value="<?= (!empty($get_front_image[0]['image_quote2'])) ? $get_front_image[0]['image_quote2'] : '' ?>" ></th>
                                    <th>                                        <button class="btn btn-primary"  id="btn_slider_image"><i class="fa fa-save"></i></button>
                                    </th>
                                </form>
                                <th><img src="<?= base_url()?>upload/front_images/<?= (!empty($get_front_image[0]['image_2'])) ? $get_front_image[0]['image_2'] : 'images.png' ?>" alt="Slider Image 2" style="height:100px;width:100px;border-radius:50%"></th>
                            </tr>
                            <tr>
                                <th>Front Image 3</th>
                                <form action="<?= site_url('admin/chnage_front_image') ?>" method="post" enctype="multipart/form-data" >
                                    <th>
                                        <input type="hidden" value="3" name="img_type">
                                        <input type="file" name="image_name" accept=".jpg,.jpeg" required class="s_images">
                                    </th>
                                    <th>
                                        <input type="text" name="image_quote3" required  class="form-control" value="<?= (!empty($get_front_image[0]['image_quote3'])) ? $get_front_image[0]['image_quote3'] : '' ?>" >
                                    </th>
                                    <th>                                        <button class="btn btn-primary" id="btn_slider_image"><i class="fa fa-save"></i></button>
                                    </th>
                                </form>
                                    <!-- <a href="#" class="btn btn-danger delete_front_image" data-imagetype="3"><i class="fa fa-trash"></i></a> -->
                                
                                <th><img src="<?= base_url()?>upload/front_images/<?= (!empty($get_front_image[0]['image_3'])) ? $get_front_image[0]['image_3'] : 'images.png' ?>" alt="Slider Image 3" style="height:100px;width:100px;border-radius:50%"></th>
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
    $(document).ready(function(e) {
        var _URL = window.URL || window.webkitURL;
        $(document).on('click', '.delete_front_image', function(e) {
            e.preventDefault();
            var type = $(this).data('imagetype');
            var con = confirm("Are you sure want to Delete Images ?");
            if(con == true) {
                $.ajax({
                    url: "<?= site_url('admin/manage_front_images'); ?>", 
                    type: "GET",        
                    data:{image_type:type},
                    success: function(data){
                        var parseJson = jQuery.parseJSON(data);
                        $("#flash_img").html(parseJson.msg);
                        setTimeout(function(){ location.reload(); } , 2000);
                    }
                });
            } else {
                return false;
            }
        });
        /* $(".s_images").change(function (e) {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    if(this.width != 2000 && this.height != 600 ) {
                        alert('Please select Images of Given Size');
                        $("#btn_slider_image").attr('disabled' , true); 
                    } else {
                        $("#btn_slider_image").attr('disabled' , false); 
                    }
                };
                img.src = _URL.createObjectURL(file);
            }  
        }); */
    });
</script>
