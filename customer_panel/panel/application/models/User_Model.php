<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Veritabanı bağlantısını yükle
    }

    // Yeni kullanıcı kaydı
    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    // Kullanıcıyı e-posta adresine göre getir
    public function get_user_by_email($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row_array();
    }

    // Kullanıcıyı ID'ye göre getir
    public function get_user_by_id($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    // Kullanıcı bilgilerini güncelle
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Kullanıcı şifresini güncelle
    public function update_password($id, $new_password) {
        $this->db->where('id', $id);
        return $this->db->update('users', array('password' => $new_password));
    }
}