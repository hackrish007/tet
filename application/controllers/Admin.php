<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){

		  parent::__construct();
    }

    public function index() {
        
        if($this->session->userdata('id')) {
            $data = array();
            
            $this->load->view('school/header');
            $this->load->view('school/school_dashboard', $data);
            $this->load->view('school/footer');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    }

    public function add_gallery() { error_reporting(1);
        if($this->session->userdata('id')) { //print_r($_POST);exit;
            if($this->input->post('submit') == 'Submit') {
                $image_category = $this->input->post('image_category');
                $this->form_validation->set_rules('image_category','Image Category','required|trim');//print_r($_POST);exit;
                if($this->form_validation->run() == FALSE){
                    $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Wrong! </strong>'.strip_tags(validation_errors()).'</div>');
                    redirect('admin/add_gallery');//print_r($_POST);exit;
                } else {//print_r($_POST);echo 'check';print_r($_FILES);exit;
                    if (!empty($_FILES['gallery_image']['name'][0])){
                        $files = $_FILES['gallery_image'];
                        $config = array(
                            'upload_path'   => './upload/gallery',
                            'allowed_types' => 'jpg|jpeg|gif|png',
                            'overwrite'     => 1,                       
                        );
                        if (!is_dir('/upload/gallery')) {
                            mkdir('/upload/gallery' , 0777, TRUE);//
                        }
                        
                        $this->load->library('upload', $config);
                        $images = array();
                        foreach ($files['name'] as $key => $image) {
                            $_FILES['images[]']['name']= $files['name'][$key];
                            $_FILES['images[]']['type']= $files['type'][$key];
                            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
                            $_FILES['images[]']['error']= $files['error'][$key];
                            $_FILES['images[]']['size']= $files['size'][$key];

                            $images[] = $fileName;
                            $config['file_name'] = $fileName;
                            $this->upload->initialize($config);
                            
                            if ($this->upload->do_upload('images[]')) {
                                $this->upload->data();//echo 'hello check1'; exit;
                            } else {
                                return false;
                            }
                            $image_url = base_url().'upload/gallery/'.$fileName;
                            $data = array (
                                'image_category' => $image_category,
                                'image_name' => $fileName,
                                'image_url' => $image_url
                            );
                            $insert = $this->AdminModel->add_gallery_image($data);
                            //echo $this->db->last_query();exit;
                        }
                        if($insert) {
                            $this->session->set_flashdata('msg','<div class="alert alert-success error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong>Gallery Image Added Successfully.</div>');
                            redirect('admin/add_gallery');
                        } else {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Something Went Wrong. Please Try Again.</div>');
                            redirect('admin/add_gallery');
                        }
                    } else {
                        $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>Please Select Images</div>');
                        redirect('admin/add_gallery');
                    }
                }
            } else {
                $this->load->view('school/header');
                $this->load->view('school/add_gallery');
                $this->load->view('school/footer');
            }
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    } 

    public function add_gallery_(){
        if($this->session->userdata('id')) {
            if($this->input->post('submit') == 'Submit') {
        //print_r($_SESSION);exit;
        $targetDir = "/upload/gallery/";
        $fileName = basename($_FILES["gallery_image"]["name"][0]);//echo'hello';
        $targetFilePath = $targetDir.$fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $image_url = base_url().$targetDir.$fileName;//echo $targetFilePath; exit;
        $data = array (
            'image_category' => $fileType,
            'image_name' => $fileName,
            'image_url' => $image_url
        );
        //print_r($_POST);exit;
        //echo 'check';
        //print_r($_FILES);exit;
        if($this->input->post('submit') == 'Submit' && !empty($_FILES['gallery_image']['name'][0])){ echo $_FILES["gallery_image"]["tmp_name"][0]; echo 'checkinto'; echo $targetFilePath; exit;
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["gallery_image"]["tmp_name"][0], $targetFilePath)){echo 'helllllllo'; exit;
                    // Insert image file name into database
                   // $insert = $db->query("INSERT into gallery (image_name, created_at) VALUES ('".$fileName."', NOW())");
                   $this->db->insert("gallery", $data);
                    if($insert){
                        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } 
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        }else{
            $statusMsg = 'Please select a file to upload.';
        }

        $this->load->view('school/header');
        $this->load->view('school/add_gallery');
        $this->load->view('school/footer');
        // Display status message
        echo $statusMsg;


        } else {
                $this->load->view('school/header');
                $this->load->view('school/add_gallery');
                $this->load->view('school/footer');
            }

        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }

    }

    public function add_gallery__()
{

	if($this->session->userdata('id')) 
	{ //echo '<pre>',print_r($_FILES),'</pre>';exit;
		if(isset($_POST['submit']) && !empty($_FILES))
		{
	    $targetDir = "upload/gallery/";
        $fileName = basename($_FILES["gallery_image"]["name"][0]);
        $targetFilePath = $targetDir.$fileName;
		$image_url = base_url().$targetDir.$fileName;
		if(move_uploaded_file($_FILES["gallery_image"]["tmp_name"][0], $targetFilePath))
		{
			echo "file Moved";
		}
		else{
			echo "Issues";
		}
		
        $data = array (
            'image_category' => $fileType,
            'image_name' => $fileName,
            'image_url' => $image_url
        );
		}
	}
	else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }

	
}

    /* public function gallery_list() {
        if($this->session->userdata('id')) { 
            $data = array();
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $query = $this->AdminModel->get_gallery_images();
            $data = [];
            foreach ($query->result() as $r) {
                $start++;
                $row = array();
                $row[] = $start;
                $row[] = $r->image_category;
                $row[] = '<img style="height:70px;width:70px;border-radius:50%" src="'. $r->image_url.'"/>';
                $edit = '<button type="button" onClick="Delete('.$r->id .');" name="delete" data-id="' . $r->id . '" class="btn btn-danger delete"><i class="ti-trash"></i></button>
                        ';
                $row[] = $edit;
                $data[] = $row;
            }
            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $data,
            );
            echo json_encode($result);
            exit();
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    } */
    public function gallery_list(){
        $data = $row = array();
        $query = $this->AdminModel->getGalleryRows($_POST);
        $i = $_POST['start'];
        foreach($query as $r){
            $i++;
            $row = array();
            $row[] = $i;
            $row[] = $r->image_category;
            $row[] = '<img style="height:70px;width:70px;border-radius:50%" src="'. $r->image_url.'"/>';
            $edit = '<button type="button" onClick="Delete('.$r->id .');" name="delete" data-id="' . $r->id . '" class="btn btn-danger delete"><i class="ti-trash"></i></button>
                    ';
            $row[] = $edit;
            $data[] = $row;
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->AdminModel->countAllGallery(),
            "recordsFiltered" => $this->AdminModel->countFilteredGallery($_POST),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function delete_gallery() {
        $data = array();
        $id = $this->input->post("g_id");
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $res = $this->AdminModel->delete_gallery_image($id, $data);
		if($res) {
            $this->session->set_flashdata('msg','<div class="alert alert-success error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong>Faculty Deleted Successfully.</div>');
            redirect('admin/faculty_list');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Something Went Wrong. Please Try Again.</div>');
            redirect('admin/faculty_list');
        }
    }

    public function manage_slider() {
        if($this->session->userdata('id')) { 
            $data = array();
            $data['get_slider_image'] = $this->AdminModel->get_slider_image();
            $this->load->view('school/header');
            $this->load->view('school/manage_slider', $data);
            $this->load->view('school/footer');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    }

    public function chnage_slider_image() {
        if($this->session->userdata('id')) { 
            // echo "<pre>";
            // print_r($_POST);die;
            $data = array();
            $slider_quote = $this->input->post('slider_quote');
            $slider_quote_by = $this->input->post('slider_quote_by');
            $img_type = $this->input->post('img_type');
            $slide1 = $this->input->post('slide1');
            $image_name = $_FILES["image_name"]["name"];
            if ($_FILES["image_name"]["name"] != ""){
                $config['upload_path'] = './upload/slider_image/';
                $config['allowed_types'] = 'jpg|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = uniqid().".jpg";
                if (!is_dir('./upload/slider_image')) {
                    mkdir('./upload/slider_image' , 0777, TRUE);
                }
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_name')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $slider_image = $config['file_name'];
            }
            if($image_name == "") {
                $slider_image = $slide1;
            } else {
                $slider_image = $slider_image;
            }
            if($img_type == 1) {
                $data = array(
                    'image_1' => $slider_image,
                    'slider_quote1' => $slider_quote,
                    'slider_quote1_by' => $slider_quote_by
                );
            } 
            else if($img_type == 2) {
                $data = array(
                    'image_2' => $slider_image,
                    'slider_quote2' => $slider_quote,
                    'slider_quote2_by' => $slider_quote_by
                );
            }
            else if($img_type == 3) {
                $data = array(
                    'image_3' => $slider_image,
                    'slider_quote3' => $slider_quote,
                    'slider_quote3_by' => $slider_quote_by
                );
            } else {
                $data = array(
                    'image_4' => $slider_image,
                    'slider_quote4' => $slider_quote,
                    'slider_quote4_by' => $slider_quote_by
                );
            }
            $get_slider_image = $this->AdminModel->get_slider_image();
            if(count($get_slider_image) == 0) {
                $result = $this->AdminModel->add_slider($data);
            } else {
                $result = $this->AdminModel->update_Slider($data);
            }
            if($result) {
                $this->session->set_flashdata('msg','<div class="alert alert-success error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong>Slider Image Updated Successfully.</div>');
                redirect('admin/manage_slider');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Something Went Wrong. Please Try Again.</div>');
                redirect('admin/manage_slider');
            }
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    }

    public function delete_slider_image() {
        if($this->session->userdata('id')) { 
            $data = array();
            $image_type = $_GET['image_type'];
            if($image_type == 1) {
                $data = array(
                   'image_1' => NULL 
                );
            }
            else if($image_type == 2) {
                $data = array(
                    'image_2' => NULL 
                );
            }
            else if($image_type == 3) {
                $data = array(
                    'image_3' => NULL 
                );
            }
            else {
                $data = array(
                    'image_4' => NULL 
                ); 
            }
            $result = $this->AdminModel->update_Slider($data);
            if($result) {
                echo json_encode(['status'=>200 , 'msg'=>'<div class="alert alert-success error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong>Slider Image Deleted Successfully.</div>']);
            } else {
                echo json_encode(['status'=>100 , 'msg'=>'<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Something Went Wrong. Please Try Again.</div>']);
            }
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    }

    public function manage_front_images() {
        if($this->session->userdata('id')) { 
            $data = array();
            $data['get_front_image'] = $this->AdminModel->get_front_image();
            $this->load->view('school/header');
            $this->load->view('school/front_image', $data);
            $this->load->view('school/footer');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    }

    public function chnage_front_image() {
        if($this->session->userdata('id')) { 
            $data = array();
            $img_type = $this->input->post('img_type');
            $image_quote1 = $this->input->post('image_quote1');
            $image_quote2 = $this->input->post('image_quote2');
            $image_quote3 = $this->input->post('image_quote3');
            $image_name = $_FILES["image_name"]["name"];
            if ($_FILES["image_name"]["name"] != ""){
                $config['upload_path'] = './upload/front_images/';
                $config['allowed_types'] = 'jpg|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = uniqid().".jpg";
                if (!is_dir('./upload/front_images')) {
                    mkdir('./upload/front_images' , 0777, TRUE);
                }
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image_name')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                $front_image = $config['file_name'];
            }
            if($img_type == 1) {
                $data = array(
                    'image_1' => $front_image,
                    'image_quote1' => $image_quote1
                );
            } 
            else if($img_type == 2) {
                $data = array(
                    'image_2' => $front_image,
                    'image_quote2' => $image_quote2
                );
            } 
            else {
                $data = array(
                    'image_3' => $front_image,
                    'image_quote3' => $image_quote3
                );
            }
            $get_front_image = $this->AdminModel->get_front_image();
            if(count($get_front_image) == 0) {
                $result = $this->AdminModel->add_front_image($data);
            } else {
                $result = $this->AdminModel->update_front_image($data);
            }
            if($result) {
                $this->session->set_flashdata('msg','<div class="alert alert-success error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong>Front Image Updated Successfully.</div>');
                redirect('admin/manage_front_images');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Something Went Wrong. Please Try Again.</div>');
                redirect('admin/manage_front_images');
            }
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    }

    public function delete_front_image() {
        if($this->session->userdata('id')) { 
            $data = array();
            $image_type = $_GET['image_type'];
            if($image_type == 1) {
                $data = array(
                   'image_1' => NULL 
                );
            }
            else if($image_type == 2) {
                $data = array(
                    'image_2' => NULL 
                );
            }
            else if($image_type == 3) {
                $data = array(
                    'image_3' => NULL 
                );
            }
            $result = $this->AdminModel->update_front_image($data);
            if($result) {
                echo json_encode(['status'=>200 , 'msg'=>'<div class="alert alert-success error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong>Front Image Deleted Successfully.</div>']);
            } else {
                echo json_encode(['status'=>100 , 'msg'=>'<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Something Went Wrong. Please Try Again.</div>']);
            }
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    }

    public function letest_news() {
        if($this->session->userdata('id')) { 
            if($this->input->post('submit') == 'Submit') {
                $letest_news = $this->input->post('letest_news');
                $news_file = $_FILES["news_file"]["name"];
                $this->form_validation->set_rules('letest_news','Letest News','required|trim');
                if($this->form_validation->run() == FALSE){
                    $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Wrong! </strong>'.strip_tags(validation_errors()).'</div>');
                    redirect('admin/letest_news');
                } else {
                    if ($_FILES["news_file"]["name"] != ""){
                        $config['upload_path'] = './upload/news_file/';
                        $config['allowed_types'] = 'pdf';
                        $config['max_size'] = 100000;
                        $config['file_name'] = uniqid().".pdf";
                        if (!is_dir('./upload/news_file')) {
                            mkdir('./upload/news_file' );
                        }
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('news_file')) {
                            $error = array('error' => $this->upload->display_errors());
                        } else {
                            $data = array('upload_data' => $this->upload->data());
                        }
                        $data1 = array(
                            'news_tag' => $letest_news,
                            'news_pdf' => $config['file_name'],
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s')
                        );
                        $result = $this->AdminModel->add_news($data1);
                        if($result) {
                            $this->session->set_flashdata('msg','<div class="alert alert-success error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong>Letest News Added Successfully.</div>');
                            redirect('admin/letest_news');
                        } else {
                            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Something Went Wrong. Please Try Again.</div>');
                            redirect('admin/letest_news');
                        }
                    } else {
                        $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Wrong! </strong>Please Select The File To Upload.</div>');
                        redirect('admin/letest_news');
                    }
                }
            } else {
                $this->load->view('school/header');
                $this->load->view('school/add_letest_news');
                $this->load->view('school/footer');
            }
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    }

    public function news_list() {
        if($this->session->userdata('id')) { 
            $data = array();
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $query = $this->AdminModel->get_news_detail();
            $data = [];
            foreach ($query->result() as $r) {
                $start++;
                $row = array();
                $row[] = $start;
                $row[] = $r->news_tag;
                $row[] = $r->news_pdf;
                $edit = '<button type="button" onClick="Delete('.$r->id .');" name="delete" data-id="' . $r->id . '" class="btn btn-danger delete"><i class="ti-trash"></i></button>
                        ';
                $row[] = $edit;
                $data[] = $row;
            }
            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $data,
            );
            echo json_encode($result);
            exit();
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Note! </strong>You May Login First.</div>');
            redirect('home/login');
        }
    }

    public function delete_news() {
        $data = array();
        $id = $this->input->post("g_id");
        $data = array(
            'status' => 0
        );
        $res = $this->AdminModel->delete_news_details($id, $data);
		if($res) {
            $this->session->set_flashdata('msg','<div class="alert alert-success error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success! </strong>News Deleted Successfully.</div>');
            redirect('admin/letest_news');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger error_list"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Error! </strong>Something Went Wrong. Please Try Again.</div>');
            redirect('admin/letest_news');
        }
    }

    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        echo "<script>window.location.href='" . site_url('HomeController/index') . "';</script>";
        die;
    }

}