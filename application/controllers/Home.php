<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
		parent::__construct();
	}

	public function index() {
		
		$data['get_slider_image'] = $this->AdminModel->get_slider_image();
		$data['get_front_image'] = $this->AdminModel->get_front_image();
		$data['letest_news'] = $this->AdminModel->get_news_detail();
		// echo "<pre>";
		// print_r($data['letest_news']->result_array());die;
		$this->load->view('general/header', $data);
		$this->load->view('general/index');
		$this->load->view('general/footer');
	}
    
	public function gallery() {
		$data = array();
		$data['gallery'] = $this->LoginModal->get_all_images();
		$cources = $this->LoginModal->get_cources();
		$new_cources = [];
		foreach($cources as $row) {
			$cources_year = NULL;
			$cources_year = $this->LoginModal->get_cources_year($row['id']);
			if(count($cources_year) > 0) {
				$row['year'] = $cources_year;
			}
			$new_cources[] = $row;
		}
		$data['cources'] = $new_cources;
		$this->load->view('general/header', $data);
		$this->load->view('general/gallery', $data);
		$this->load->view('general/footer');
	}

	public function login() {
		if($this->input->post('submit') == 'Submit') {
		   // if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
		        //$secret = '6Lc4er0UAAAAAByaafIKDurCF3QSKMq3qJ0TrEbR';
		        //$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                //$responseData = json_decode($verifyResponse);
              //  if($responseData->success){ 
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
        			$this->form_validation->set_rules('username','UserName','required|trim|valid_email');
        			$this->form_validation->set_rules('password','Password','required|trim');
        			if($this->form_validation->run() == FALSE){
                        $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Wrong! </strong>'.strip_tags(validation_errors()).'</div>');
                        redirect('home/login');
                    } else {
        				$data = array(
                            'username' => $username,
                            'password' => md5($password)
        				);
        				$result = $this->LoginModal->login($data);
        				$this->session->set_userdata($result[0]);
        				if(!empty($result)) {
        					$this->session->set_flashdata('msg','<div class="alert alert-success error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Sucess! </strong>Login Sucessfully</div>');
                            redirect('admin/index');
        				} else {
        					$this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Wrong!</strong> Invalid Username Or Password</div>');
        					redirect('home/login');
        				}
        			}
               /*  } else {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Please click on the reCAPTCHA box.</div>');
                    echo "<script>window.location.href='".site_url('home/login')."';</script>";
                }*/
			/*} 
			else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Please click on the reCAPTCHA box.</div>');
                echo "<script>window.location.href='".site_url('home/login')."';</script>";
            } */
			
		} else {
			$this->load->view('general/login');
		}
	}

	public function get_images() {
		if(!empty($_REQUEST['category_type'])) {
			if($_REQUEST['category_type'] == 'all') {
				$gallery = $this->LoginModal->get_all_images();
			} else {
				$gallery = $this->LoginModal->get_images_by_category($_REQUEST['category_type']);
			}
			$output = '';
			if(isset($gallery)) {
				foreach ($gallery->result() as $img) {
				$output .= '
						<li class="isotopeSelector contest">
							<div class="overlay">
								<a class="galleryItem" href="'.base_url().'upload/gallery/'.$img->image_name.'"><span class="icon-enlarge-icon"></span></a>  </div>
							<figure><img src="'.base_url().'upload/gallery/'.$img->image_name.'" class="img-responsive" alt="" style="height:300px; width:100%;"></figure>
						</li>
					';
				} 
			}
			echo $output;
		}
	}

	public function gwt_faculty_details($id) {
		$course_id = 0;
		$data['course_details'] = new stdClass();
		if($id != 0) {
			$course_id = $id;
			$data['course_details'] = $this->LoginModal->get_course($course_id);
		} else {
			$data['course_details']->course_name = 'Non-Teaching Faculty';
			$data['course_details']->id = '0';
		}
		$data['faculty'] = $this->LoginModal->get_faculty($course_id);
		$cources = $this->LoginModal->get_cources();
		$new_cources = [];
		foreach($cources as $row) {
			$cources_year = NULL;
			$cources_year = $this->LoginModal->get_cources_year($row['id']);
			if(count($cources_year) > 0) {
				$row['year'] = $cources_year;
			}
			$new_cources[] = $row;
		}
		$data['cources'] = $new_cources;
		$this->load->view('general/header', $data);
		$this->load->view('general/faculty_details', $data);
		$this->load->view('general/footer');
		
	}

	public function career() {
	    if($this->input->post('submit') == 'Submit') {
	        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
	            $secret = '6Lc4er0UAAAAAByaafIKDurCF3QSKMq3qJ0TrEbR';
		        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                $responseData = json_decode($verifyResponse);
                if($responseData->success){
                    $full_name = $this->input->post('full_name');
        		   $job_for = $this->input->post('job_for');
        		   $post_name1 = $this->input->post('post_name1');
        		   $post_name2 = $this->input->post('post_name2');
        			if($job_for == 1) {
        				$job_type = 'Applicants are invited for the post of B. Ed Courses';
        				$post_name = $post_name1;
        			} else {
        				$job_type = 'Applicants are invited for the post of D.El.Ed Courses';
        				$post_name = $post_name2;
        			}
        	       $email = $this->input->post('email_address');
        	       $message = $this->input->post('message');
        	       $resume_file = $_FILES["resume_file"]["name"];
        	       if ($_FILES["resume_file"]["name"] != ""){
                        $config['upload_path'] = './upload/resume_file/';
                        $config['allowed_types'] = 'pdf|jpeg|jpg';
                        $config['max_size'] = 100000;
                        $config['file_name'] = uniqid()."_".time()."_".$resume_file;
                        if (!is_dir('./upload/resume_file')) {
                            mkdir('./upload/resume_file' );
                        }
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('resume_file')) {
                            $error = array('error' => $this->upload->display_errors());
                        } else {
                            $data = array('upload_data' => $this->upload->data());
                        }
                        $file1 = $config['file_name'];
        				$attchment = base_url()."upload/resume_file/".$file1;
                        $msg = "<b>Name</b> : ".$full_name."<br/><br/>";
                        $msg .= "<b>Applied For</b> : ".$post_name."<br/><br/>";
        				$msg .= "<b>Message</b> : ".$message."<br/><br/>";
        				$subject = "Job Application From Website";
        				$headers = "MIME-Version: 1.0" . "\r\n";
        				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        				$headers .= 'From: STNDSS<marine@moogli.in>' . "\r\n";
        				$this->SendmailModel->send_mail_with_attachment($email, "STNDSS", "stndss221@gmail.com", $subject, $msg, $attchment, $full_name);
        	            $this->SendmailModel->send_mail2("marine@moogli.in", 'STNDSS', $email, $subject, "Thankyou for Apply. We will contact you soon.");
        				$this->session->set_flashdata('msg', '<div class="alert alert-success fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong> Thanks so much for your message. We check e-mail frequently and will try our best to respond to your inquiry.</div>');
        				echo "<script>window.location.href='" . site_url('home/career') . "';</script>";
                    }
                } else {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Please click on the reCAPTCHA box.</div>');
                    echo "<script>window.location.href='".site_url('home/career')."';</script>";
                }
	        } else {
	            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Please click on the reCAPTCHA box.</div>');
                echo "<script>window.location.href='".site_url('home/career')."';</script>";
	        }
	       
	    } else {
	        $cources = $this->LoginModal->get_cources();
    		$new_cources = [];
    		foreach($cources as $row) {
    			$cources_year = NULL;
    			$cources_year = $this->LoginModal->get_cources_year($row['id']);
    			if(count($cources_year) > 0) {
    				$row['year'] = $cources_year;
    			}
    			$new_cources[] = $row;
    		}
    		$data['cources'] = $new_cources;
    		$this->load->view('general/header', $data);
    		$this->load->view('general/career');
    		$this->load->view('general/footer');
	    }
	}

	public function contact() {
	    if($this->input->post('submit') == 'Submit') {
	        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
	            $secret = '6Lc4er0UAAAAAByaafIKDurCF3QSKMq3qJ0TrEbR';
		        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                $responseData = json_decode($verifyResponse);
                if($responseData->success){
                    $first_name = $this->input->post('first_name');
                    $email = $this->input->post('email');
                    $message = $this->input->post('message');
                    $this->form_validation->set_rules('first_name','First Name','required|trim');
                    $this->form_validation->set_rules('email','Email','required|trim|valid_email');
                    $this->form_validation->set_rules('message','Message','required|trim');
                    if($this->form_validation->run() == FALSE){
                        $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Wrong! </strong>'.strip_tags(validation_errors()).'</div>');
                        redirect('home/contact');
                    } else {
                        $msg = "<b>Name</b> : ".$first_name."<br/><br/>";
        				$msg .= "<b>Message</b> : ".$message."<br/><br/>";
        				$subject = "Query On Your Website";
        				$headers = "MIME-Version: 1.0" . "\r\n";
        				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        				$headers .= 'From: STNDSS<marine@moogli.in>' . "\r\n";
        				$this->SendmailModel->send_mail2($email, "STNDSS", "stndss221@gmail.com", $subject, $msg);
        	            $this->SendmailModel->send_mail2("marine@moogli.in", 'STNDSS', $email, $subject, "Thankyou for Apply. We will contact you soon.");
        				$this->session->set_flashdata('msg', '<div class="alert alert-success fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong> Thanks so much for your message. We check e-mail frequently and will try our best to respond to your inquiry.</div>');
        				echo "<script>window.location.href='" . site_url('home/career') . "';</script>";
                    }
                } else {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Please click on the reCAPTCHA box.</div>');
                    echo "<script>window.location.href='".site_url('home/contact')."';</script>";
                }
	        } else {
	            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Please click on the reCAPTCHA box.</div>');
                echo "<script>window.location.href='".site_url('home/contact')."';</script>";
	        }
	    } else {
	        $cources = $this->LoginModal->get_cources();
    		$new_cources = [];
    		foreach($cources as $row) {
    			$cources_year = NULL;
    			$cources_year = $this->LoginModal->get_cources_year($row['id']);
    			if(count($cources_year) > 0) {
    				$row['year'] = $cources_year;
    			}
    			$new_cources[] = $row;
    		}
    		$data['cources'] = $new_cources;
    		$this->load->view('general/header', $data);
    		$this->load->view('general/contact');
    		$this->load->view('general/footer');
	    }
	}
}
