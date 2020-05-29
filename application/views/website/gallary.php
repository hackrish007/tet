<body data-twttr-rendered="true">
    <div id="page"> 
          
          
          <!-- #masthead .site-header -->
          
          <div class="item teaser-page-list">
        <div class="container_16">
              <aside class="grid_10">
            <h1 class="page-title">PHOTOGALLARY</h1>
          </aside>
              <div class="grid_6">
            <div id="rootline"> <a href="#">Home Page</a> <i class="icon-angle-right"></i> <span class="current">Photogallary</span> </div>
          </div>
              <div class="clear"></div>
            </div>
      </div>
          <div id="main" class="site-main container_16">

        <div class="inner">

              <?php foreach($gallery_images as $row){?>
              <div class="candidate radius grid_4">
            <div class="candidate-margins"> <a class="fancybox-button" rel="fancybox-button" href="<?= base_url()?>upload/gallery/<?php echo $row['image_name'];?>" title=""> 
              <!--<img width="200" height="210"   />--> 
              <img src="<?= base_url()?>upload/gallery/<?php echo $row['image_name'];?>" alt="" class="wp-post-image" alt="Image alt" /> </a> 
            </div>
          </div>
              <?php } ?>

              
             
             
              <div class="clear"></div>
            </div>
      </div>
          
          <!-- Footer -->
          
          <!-- #colophon .site-footer --> 
          
        </div>
    <!-- /#page -->
    </body>