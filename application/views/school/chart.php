<?php include 'sidemenu.php'; ?>
<?php include 'blue.php'; ?>
    <div class="row page-titles">
        <div class="col-md-5 col-8 col-xs-12 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Result overview</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('school/index')?>">Home</a></li>
                <li class="breadcrumb-item active">Result overview</li>
            </ol>
        </div>
    </div>
    <style>
        .carousel-content {
            color:black;
            display:flex;
            align-items:center;
        }

        .carousel {
            width: 100%;
            height: auto;
            padding: 50px;
        }

        .card-title:first-letter {
            text-transform:capitalize;
        }
    </style>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pie Chart</h4>
                    <div>
                        <canvas id="chart3" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Doughnut Chart</h4>
                    <div>
                        <canvas id="chart4" height="150"> </canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Polar Area Chart</h4>
                    <div>
                        <canvas id="chart5" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Radar Chart</h4>
                    <div>
                        <canvas id="chart6" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>