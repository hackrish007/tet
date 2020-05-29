<div class="banner-outer">
    <div class="banner-slider">
        <?php if(!empty($get_slider_image[0]['image_1'])) { ?>
        <div class="banner-slides slide1" style="background: url(<?= base_url()?>upload/slider_image/<?= (!empty($get_slider_image[0]['image_1'])) ? $get_slider_image[0]['image_1'] : '' ?>) no-repeat center top / cover;">
            <div class="container">
                <div class="content animated fadeInRight">
                    <div class="fl-right">
                        <h1 class="animated fadeInRight"><?= (!empty($get_slider_image[0]['slider_quote1']) ? $get_slider_image[0]['slider_quote1'] : '') ?></h1>
                        <p class="animated fadeInRight"><?= (!empty($get_slider_image[0]['slider_quote1_by']) ? $get_slider_image[0]['slider_quote1_by'] : '') ?></p>
                        <!-- <a href="about.html" class="btn animated fadeInRight">Know More <span class="icon-more-icon"></span></a>  -->
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(!empty($get_slider_image[0]['image_2'])) { ?>
        <div class="banner-slides slide2" style="background: url(<?= base_url()?>upload/slider_image/<?= (!empty($get_slider_image[0]['image_2'])) ? $get_slider_image[0]['image_2'] : '' ?>) no-repeat center top / cover;">
            <div class="container">
                <div class="content">
                    <h1 class="animated fadeInUp"><?= (!empty($get_slider_image[0]['slider_quote2']) ? $get_slider_image[0]['slider_quote2'] : '') ?></h1>
                    <p class="animated fadeInUp"><?= (!empty($get_slider_image[0]['slider_quote2_by']) ? $get_slider_image[0]['slider_quote2_by'] : '') ?></p>
                    <!-- <a href="about.html" class="btn animated fadeInUp">Know More <span class="icon-more-icon"></span></a> <a href="gallery.html" class="btn white animated fadeInUp hidden-xs">Take a Tour <span class="icon-more-icon"></span></a>  -->
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(!empty($get_slider_image[0]['image_3'])) { ?>
        <div class="banner-slides slide3" style="background: url(<?= base_url()?>upload/slider_image/<?= (!empty($get_slider_image[0]['image_3'])) ? $get_slider_image[0]['image_3'] : '' ?>) no-repeat center top / cover;">
            <div class="container">
                <div class="content animated fadeInLeft">
                    <h1 class="animated fadeInLeft"><?= (!empty($get_slider_image[0]['slider_quote3']) ? $get_slider_image[0]['slider_quote3'] : '') ?></h1>
                    <p class="animated fadeInLeft"><?= (!empty($get_slider_image[0]['slider_quote3_by']) ? $get_slider_image[0]['slider_quote3_by'] : '') ?></p>
                    <!-- <a href="about.html" class="btn animated fadeInLeft">Know More <span class="icon-more-icon"></span></a>  -->
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(!empty($get_slider_image[0]['image_4'])) { ?>
        <div class="banner-slides slide3" style="background: url(<?= base_url()?>upload/slider_image/<?= (!empty($get_slider_image[0]['image_4'])) ? $get_slider_image[0]['image_4'] : '' ?>) no-repeat center top / cover;">
            <div class="container">
                <div class="content">
                    <h1 class="animated fadeInUp"><?= (!empty($get_slider_image[0]['slider_quote4']) ? $get_slider_image[0]['slider_quote4'] : '') ?></h1>
                    <p class="animated fadeInUp"><?= (!empty($get_slider_image[0]['slider_quote4_by']) ? $get_slider_image[0]['slider_quote4_by'] : '') ?></p>
                    <!-- <a href="about.html" class="btn animated fadeInUp">Know More <span class="icon-more-icon"></span></a> <a href="gallery.html" class="btn white animated fadeInUp hidden-xs">Take a Tour <span class="icon-more-icon"></span></a>  -->
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-9 our-impotance">
                <ul class="">
                    <li class="col-sm-12 equal-hight" style="border-right:none;border-bottom:none">
                        <div class="inner"> 
                            <h3 style="text-align:left">Welcome to Sant Tapaswi Narayan Das Sikshan Sansthan</h3>
                        </div>
                    </li>
                    <li class="col-sm-6 equal-hight">
                        <div class="inner">
                            <h3>VISION</h3>
                            <p>To Built the best Teacher Education Institution for society has the vision of quality teacher preparation since the development of the nation depends upon the standard of education and the destiny of the children vastly depends on quality teachers.</p>
                        </div>
                    </li>
                    <li class="col-sm-6 equal-hight">
                        <div class="inner">
                            <h3>MISSION</h3>
                            <p>Education is the manifestation of perfection. Excel aims to mould perfect teachers to suit the ever changing world. Our mission is to provide quality education at affordable charges to the students from the backward area and other places to prepare them best suited to the demands of the market.</p>
                        </div>
                    </li>
                    
                </ul>
            </div>
            <div class="col-md-3 news">
                <div class="inner">
                            <h3 style="text-align:left">Latest News</h3>
                        </div>
                    <div class="holder">

                        <marquee loop="infinite" behavior="scroll" direction="up"  height="270" onmouseover="stop()" onmouseout="start()">
                        <ul id="ticker01">
                        <?php  if(isset($letest_news)) {  foreach($letest_news->result() as $row) {?>
                            <li><a href="<?= base_url()?>upload/news_file/<?= $row->news_pdf ?>" target="_blank">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>

                                <span> <?= $row->news_tag ?></span></a></li>
                        <?php }}?>
                        </ul>
                        </marquee>
                    </div>
            </div>
        </div>
    </div>
</section>
<section class="how-study padding-lg">
    <div class="container">
        <ul class="row">
            <li class="col-sm-4">
                <div class="overly">
                    <div class="cnt-block">
                        <h3><?= (!empty($get_front_image[0]['image_quote1']) ? $get_front_image[0]['image_quote1'] : '')?></h3>
                    </div>
                    <!-- <a href="#" class="more"><i class="fa fa-caret-right" aria-hidden="true"></i></a> --> </div>
                <figure><img src="<?= base_url()?>upload/front_images/<?= $get_front_image[0]['image_1'] ?>" class="img-responsive" alt="" style="height:360px; width:100%"></figure>
            </li>
            <li class="col-sm-4">
                <div class="overly">
                    <div class="cnt-block">
                        <h3><?= (!empty($get_front_image[0]['image_quote2']) ? $get_front_image[0]['image_quote2'] : '')?></h3>
                    </div>
                    <!-- <a href="#" class="more"><i class="fa fa-caret-right" aria-hidden="true"></i></a> --> </div>
                <figure><img src="<?= base_url()?>upload/front_images/<?= $get_front_image[0]['image_2'] ?>" class="img-responsive" alt=""  style="height:360px; width:100%"></figure>
            </li>
            <li class="col-sm-4">
                <div class="overly">
                    <div class="cnt-block">
                        <h3><?= (!empty($get_front_image[0]['image_quote3']) ? $get_front_image[0]['image_quote3'] : '')?></h3>
                    </div>
                    <!-- <a href="#" class="more"><i class="fa fa-caret-right" aria-hidden="true"></i></a> --> </div>
                <figure><img src="<?= base_url()?>upload/front_images/<?= $get_front_image[0]['image_3'] ?>" class="img-responsive" alt=""  style="height:360px; width:100%"></figure>
            </li>
        </ul>
    </div>
</section>

