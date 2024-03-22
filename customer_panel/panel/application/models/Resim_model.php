<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resim_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Veritabanı bağlantısını yükle
        $this->load->database();
    }

    // Belirli bir resmi getiren fonksiyon
    public function get_resim_by_id($resim_id) {
        return $this->db->get_where('resimler', array('id' => $resim_id))->row_array();
    }

    // Belirli bir ilana ait resimleri getiren fonksiyon
    public function get_resimler_by_ilan_id($ilan_id) {
        return $this->db->get_where('resimler', array('ilan_id' => $ilan_id))->result_array();
    }

    // Yeni bir resim ekleyen fonksiyon
    public function insert_resim($data) {
        $this->db->insert('resimler', $data);
        return $this->db->insert_id();
    }

    // Belirli bir resmi silen fonksiyon
    public function delete_resim_by_id($resim_id) {
        $this->db->where('id', $resim_id);
        $this->db->delete('resimler');
    }

    // İlan ID'sine göre resimleri silen fonksiyon
    public function delete_resimler_by_ilan_id($ilan_id) {
        $this->db->where('ilan_id', $ilan_id);
        $this->db->delete('resimler');
    }
}

