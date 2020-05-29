
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class GallaryModel extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }

    public function add_course($data) {
        return $this->db->insert("courses", $data);
    }

    public function get_images() {
        echo 'hello1';
        $result = $this->db->select('*')->get('gallery');
        return $result->result_array();echo 'hello2';
    }

   
}