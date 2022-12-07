<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MainModel extends CI_Model
{   
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function get_all_raja_ongkir() {
        $query=$this->db->get('tutorial')->result();
        return $query;
    }

    public function get_where($id) {
        $query=$this->db->get_where('tutorial', ['id_tutorial' => $id]);
        return $query;
    }

    public function get_by_id($id) {
        $query=$this->db->get_where('tutorial', ['id_tutorial' => $id])->row_array();
        return $query;
    }

    public function add() {
    	$post       = $this->input->post();
        $data = [
            'tutorial' => $post['tutorial'],
            'kategori_tutorial' => $post['kategori_tutorial'],
            'konten_tutorial' => $post['konten_tutorial'],
        ];
        $query=$this->db->insert('tutorial', $data);
        return $query;
    }

    public function update() {
    	$post                   = $this->input->post();
        $query=$this->db->set(['tutorial' => $post['tutorial']]);
        $query=$this->db->set(['kategori_tutorial' => $post['kategori_tutorial']]);
        $query=$this->db->set(['konten_tutorial' => $post['konten_tutorial']]);
        $query=$this->db->where(['id_tutorial' => $post['id_tutorial']]);
        $query=$this->db->update('tutorial');
        return $query;
    }

    public function delete($id) {
        $query=$this->db->delete('tutorial', ['id_tutorial' => $id]);
        return $query;
    }
}