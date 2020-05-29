
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class AdminModel extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->column_order = array(null, 'name',/* 'b.course_name', */'designation','father_name','address');
        $this->column_search = array('name',/* 'b.course_name', */'designation','father_name','address');
        $this->order = array('name' => 'asc');


        $this->gallery_order = array(null, 'image_category','image_name');
        $this->gallery_search = array('image_category','image_name');
        $this->gallery = array('id' => 'asc');
    }

    public function add_course($data) {
        return $this->db->insert("courses", $data);
    }

    public function get_courses() {
        $result = $this->db->select('*')->get_where('courses', ['status' => 1]);
        return $result;
    }

    public function get_course($id) {
        $result = $this->db->select('*')->get_where('courses', ['status' => 1, 'id' => $id]);
        return $result->row();
    }

    public function update_course($data, $course_id) {
        $this->db->where('id', $course_id);
        return $this->db->update('courses', $data);
    }

    public function delete_course($course_id, $data) {
        $this->db->where('id', $course_id);
        return $this->db->update('courses',$data);
    }

    public function add_students($data) {
        return $this->db->insert("student_details", $data);
    }

    public function get_student_details() {
        $this->db->from('student_details as a');
        $this->db->join('courses as b', 'b.id = a.course_name');
        $this->db->select('a.*, b.course_name as course');
        $this->db->where('a.deleted_at',NULL);
        $query = $this->db->get();
        return $query;
    }

    public function get_student_detail($id) {
        $result = $this->db->select('*')->get_where('student_details', ['id' => $id]);
        return $result->row();
    }

    public function edit_students($data, $id) {
        $this->db->where('id', $id);
        return $this->db->update('student_details',$data);
    }

    public function delete_std_details($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('student_details',$data);
    }

    public function add_faculty($data) {
        return $this->db->insert("faculty", $data);
    }

    public function get_faculty() {
        $this->db->from('faculty as a');
        $this->db->join('courses as b', 'b.id = a.course_name');
        $this->db->select('a.*, b.course_name as course');
        $this->db->where('a.deleted_at',NULL);
        $query = $this->db->get();
        return $query;
    }

    public function get_one_faculty($id) {
        $result = $this->db->select('*')->get_where('faculty', ['id' => $id]);
        return $result->row();
    }

    public function update_faculty($data1, $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('faculty',$data1);
        // echo $this->db->last_query();die;
        return $query;
    }

    public function delete_faculty($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('faculty',$data);
    }

    public function add_gallery_image($data) {
        return $this->db->insert("gallery", $data);
    }

    public function get_gallery_images() {
        $result = $this->db->select('*')->get_where('gallery', ['deleted_at' => NULL]);
        return $result;
    }

    public function delete_gallery_image($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('gallery',$data);
    }

    public function update_Slider($data) {
        return $this->db->update('slider_images',$data);
    }

    public function add_slider($data) {
        return $this->db->insert("slider_images", $data);
    }

    public function get_slider_image() {
        $result = $this->db->select('*')->get('slider_images');
        return $result->result_array();
    }

    public function get_front_image() {
        $result = $this->db->select('*')->get('front_page_image');
        return $result->result_array();
    }

    public function add_front_image($data) {
        return $this->db->insert("front_page_image", $data);
    }

    public function update_front_image($data) {
        return $this->db->update('front_page_image',$data);
    }

    public function add_news($data) {
        return $this->db->insert("letest_news", $data);
    }

    public function get_news_detail() {
        $result = $this->db->select('*')->get_where('letest_news', ['status' => 1]);
        $this->db->order_by("id", "desc");
        return $result;
    }

    public function delete_news_details($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('letest_news',$data);
    }

    public function getFacultyRows($postData){
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function countAll(){
        $this->db->from('faculty');
        return $this->db->count_all_results();
    }

    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query($postData){
        $this->db->from('faculty as a');
        $this->db->where('a.deleted_at',NULL);
        $this->db->select('a.*');
        $i = 0;
        foreach($this->column_search as $item){
            if($postData['search']['value']){
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_faculty_course($course_id) {
        $result = $this->db->select('course_name')->get_where('courses', ['id' => $course_id]);
        return $result->row();
    }

    public function getGalleryRows($postData){
        $this->_get_datatables_query_gallery($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function countAllGallery(){
        $this->db->from('gallery');
        return $this->db->count_all_results();
    }

    public function countFilteredGallery($postData){
        $this->_get_datatables_query_gallery($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query_gallery($postData){
        $this->db->from('gallery as a');
        $this->db->select('a.*');
        $this->db->where('a.deleted_at', NULL);
        $i = 0;
        foreach($this->gallery_search as $item){
            if($postData['search']['value']){
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                if(count($this->gallery_search) - 1 == $i){
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if(isset($postData['order'])){
            $this->db->order_by($this->gallery_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->gallery)){
            $order = $this->gallery;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
}