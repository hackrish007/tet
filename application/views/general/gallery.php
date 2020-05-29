<div class="inner-banner contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content text-center full-width">
                    <h1>Gallery</h1>
                    <ul>
                        <li class="active"><a href="<?= site_url('home/index')?>">Home</a> <i class="fa fa-angle-right"></i> <a href="">Gallery</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="campus-tour padding-lg"> 
    <div class="container text-center">
        <div class="isotopeFilters">
            <ul class="gallery-filter clearfix remove">
                <li class="active"><a href="#" data-filter="*" data-category="all" class="get_gallery_images">All</a></li>
                <li><a href="#" data-filter=".labs" data-category="labs" class="get_gallery_images">Labs</a></li>
                <li><a href="#" data-filter=".campus" data-category="campus" class="get_gallery_images">Campus</a></li>
                <li><a href="#" data-filter=".library" data-category="library" class="get_gallery_images">Library</a></li>
                <li><a href="#" data-filter=".library" data-category="classroom" class="get_gallery_images">Classroom</a></li>
                <li><a href="#" data-filter=".principals_desk" data-category="principals_desk" class="get_gallery_images">Principals Desk</a></li>
                <li><a href="#" data-filter=".yoga_divas" data-category="yoga_divas" class="get_gallery_images">Yoga Divas</a></li>
                <li><a href="#" data-filter=".saraswati_puja" data-category="saraswati_puja" class="get_gallery_images">Saraswati Puja</a></li>
                <li><a href="#" data-filter=".food_festival" data-category="food_festival" class="get_gallery_images">Food Festival</a></li>
            </ul>
        </div>
   
    <ul class="gallery clearfix isotopeContainer">
        <?php  if(isset($gallery)) {  foreach($gallery->result() as $row) {?>
            <li class="isotopeSelector contest">
                <div class="overlay">
                    <a class="galleryItem" href="<?= base_url()?>upload/gallery/<?= $row->image_name ?>"><span class="icon-enlarge-icon"></span></a>  </div>
                <figure><img src="<?= base_url()?>upload/gallery/<?= $row->image_name ?>" class="img-responsive" alt=""></figure>
            </li>
        <?php }}?>
    </ul>
     </div>
</section>
<script src="<?= base_url('admin_assets/js/jquery.min.js'); ?>"></script>
<script>
    $(document).ready(function(e){
        $(document).on('click', '.get_gallery_images', function(e) {
            $('.gallery-filter li').removeClass('active');
            $(this).closest('li').addClass('active');
            e.preventDefault();
            var category_type = $(this).data('category');
            if(category_type != "") {
                $.ajax({
                    url: '<?= site_url('home/get_images'); ?>',
                    method: "GET",
                    data: {category_type:category_type},
                    success: function(data){
                        $('.isotopeContainer').html(data);
                    }
                });
            } 
        });
    });
</script>