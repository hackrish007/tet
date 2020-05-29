<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct(){
		parent::__construct();
    }

    public function index(){
        //echo 'hello';
        //exit();
        $data = array();
        //$data['get_slider_image'] = $this->GallaryModel->get_images();
        //print_r($data);exit();

        $result = $this->db->get('slider_images');
        $data['slider_images'] = $result->result_array();
        //print_r($data);exit();
        //foreach ($data as $row){
          //  print_r($row);
        //}exit();
        $this->load->view('website/component/header');
        $this->load->view('website/home', $data);
        $this->load->view('website/component/footer');
    }

    public function aboutus(){
        //echo 'hello';
        //exit();
        $this->load->view('website/component/header');
        $this->load->view('website/aboutus');
        $this->load->view('website/component/footer');
    }

    public function enquiry(){
        //echo 'hello';
        //exit();
        $this->load->view('website/component/header');
        $this->load->view('website/enquiry');
        $this->load->view('website/component/footer');
    }

    public function team(){
        //echo 'hello';
        //exit();
        $this->load->view('website/component/header');
        $this->load->view('website/team');
        $this->load->view('website/component/footer');
    }

    public function gallary(){
        //echo 'hello';
        //exit();
        $data['gallery_images'] = $this->db->get('gallery')->result_array();;
        //$data['gallery_images'] = $result
        //print_r($data);
        //exit();
        $this->load->view('website/component/header');
        $this->load->view('website/gallary', $data);
        $this->load->view('website/component/footer');
    }
    
    public function documentation(){
        //echo 'hello';
        //exit();
        $this->load->view('website/component/header');
        $this->load->view('website/document');
        $this->load->view('website/component/footer');
    }

    public function contact(){
        //echo 'hello';
        //exit();
        $this->load->view('website/component/header');
        $this->load->view('website/contact');
        $this->load->view('website/component/footer');
    }

}