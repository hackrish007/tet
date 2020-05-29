 <!-- Start Banner -->
        <div class="inner-banner contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content text-center full-width">
                            <h1>Contact Us</h1>
                             <ul>
                        <li class="active"><a href="<?= site_url('home/index')?>">Home</a> <i class="fa fa-angle-right"></i> <a href="<?= site_url('home/contact')?>">Contact</a></li>
                    </ul>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
        
     
 <!-- Start Contact Us -->
        <section class="form-wrapper padding-lg">
            <div class="container">
                <?=$this->session->flashdata('msg') ?>
                <form name="contact-form" id="ContactForm" method="post" action="<?= site_url('home/contact')?>">
                    <div class="row input-row">
                        <div class="col-sm-6">
                            <input name="first_name" type="text" placeholder="Full Name" required >
                        </div>
                        <div class="col-sm-6">
                            <input name="email" type="email" placeholder="Email Address" name="email" required>
                        </div>
                    </div>
                    <div class="row input-row">
                        <div class="col-sm-12">
                          <textarea name="message" id=""  rows="3" placeholder="Your Message" style="width: 100%;" required></textarea>
                        </div>
                        
                    </div>
                    <div class="row input-row">
                        <div class="col-sm-12">
                            <div class="g-recaptcha" data-sitekey="6Lc4er0UAAAAAJ0YRiPeJQHWGQcp2lZc-rDAyJ8x"></div>
                        </div>
                        
                    </div>
                 
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" name="submit" value="Submit" class="btn mt-15">Apply Now <span class="icon-more-icon"></span></button>
                            <div class="msg"></div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- end Contact Us --> 

        <!-- Start Google Map -->
        <section class="google-map">
            <div id="map"><iframe src="" style="border:none;"></iframe></div>
            
        </section>
        <!-- End Google Map --> 

        <!-- Start Have Questions -->
        <section class="our-impotance adrs-info have-question padding-lg">
            <div class="container">
                <h2>Still have questions?</h2>
                <ul class="row">
                    <li class="col-sm-4 equal-hight">
                        <div class="inner"> <i class="fa fa-map-marker" aria-hidden="true"></i>

                            <h3>Find us here</h3>
                            <p>Dostpur ,Khairwi ,Bathanaha Block ,Sitamarhi- Bihar</p>
                        </div>
                    </li>
                    <li class="col-sm-4 equal-hight">
                        <div class="inner"> <i class="fa fa-envelope" aria-hidden="true"></i>

                            <h3>Email us at</h3>
                            <p>stndss221@gmail.com </p>
                        </div>
                    </li>
                    <li class="col-sm-4 equal-hight">
                        <div class="inner"> <i class="fa fa-mobile" aria-hidden="true"></i>

                            <h3>Call Us on</h3>
                            <p>+91-7739820749 / 9507214068</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End Have Questions --> 
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7OIFvK1-udIFDgZwvY7FVTFHMHipNy6Y&callback=initMap"
    async defer></script>
    <script>
      var map;
      function initMap() {
          var myLatLng = {lat: 26.636990, lng: 85.579350};

          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: myLatLng
          });

          var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
          });
        }
    </script>
