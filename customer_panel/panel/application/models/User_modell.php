<?php 

class User_modell extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Veritabanı kütüphanesini yükle
    }

    public function get_users_except_current($current_user_id) {
        // Giriş yapan kullanıcının dışındaki tüm kullanıcıları getiren fonksiyon
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id !=', $current_user_id);
        return $this->db->get()->result();
    }
}
?>