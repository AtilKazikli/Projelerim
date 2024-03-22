<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanici_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_kullanicilar() {
        return $this->db->get('kullanicilar')->result_array();
    }

    public function insert_kullanici($data) {
        return $this->db->insert('kullanicilar', $data);
    }

    public function delete_kullanici($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kullanicilar');
    }

    public function get_kullanici_by_id($id) {
        $query = $this->db->get_where('kullanicilar', array('id' => $id));
        return $query->row_array();
    }

    public function get_kullanici_by_email($email) {
        $query = $this->db->get_where('kullanicilar', array('email' => $email));
        return $query->row_array();
    }

    public function update_kullanici($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kullanicilar', $data);
    }
    // Kullanici_model içinde
    public function kullanici_ekle($kullanici_verileri) {
        return $this->db->insert('kullanicilar', $kullanici_verileri); // Örnek olarak kullanicilar tablosuna ekliyoruz
}

}
?>
