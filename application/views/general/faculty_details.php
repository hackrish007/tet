
<div class="inner-banner contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content text-center full-width">
                    <h1>Profile of Teaching Faculty <?= $course_details->course_name ?></h1>
                        <ul>
                <li class="active"><a href="<?= site_url('home/index')?>">Home</a> <i class="fa fa-angle-right"></i> <a href="<?= site_url('home/gwt_faculty_details/')?><?= $course_details->id ?>"><?= $course_details->course_name ?></a></li>
            </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>
<section class="browse-teacher padding-lg">
    <div class="container">
        <h2> BROWSE BY TEACHER</h2>
        <div class="row browse-teachers-list clearfix flex-container">
            <?php  if(isset($faculty)) {  foreach($faculty->result() as $row) {?>
                <div class="col-xs-6 col-md-6 col-lg-4 col-sm-6 col-xs-100">
                    <div>
                        <figure> <img src="<?= base_url()?>upload/profile_image/<?= $row->profile_image ?>" width="124" height="124" alt="Profile Image"> </figure>
                        <ul class="teacher-list">
                            <li><span>Name : </span><span> <?= $row->name ?> </span></li>
                            <li><span>Designation :</span><span> <?= $row->designation ?></span> </li>
                            <li><span>Father’s Name :</span><span> <?= $row->father_name ?></span> </li>
                            <li><span>Address: </span><span> <?= $row->address ?></span> </li>
                            <li><span>Date of Birth : </span><span><?php echo  date('Y-m-d', strtotime($row->dob) ); ?> </span></li>
                            <li><span>Academic Qualification :</span><span> <?= $row->academic_qualification ?></span> </li>
                            <li><span>Professional Qualification :</span><span> <?= $row->prof_qualification ?></span> </li>
                            <li><span>Teaching Exp : </span><span> <?php if(!empty($row->teaching_exp)) { echo  $row->teaching_exp; } else { echo "NIL"; } ?></span></li>
                        </ul>
                    </div>
                </div>
            <?php }} else {?>
                
            <?php } ?>
    </div>
</section>


  

      