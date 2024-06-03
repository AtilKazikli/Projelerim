<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanici_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // E-posta ve şifre ile kullanıcıyı alır
    public function get_kullanici_by_email_and_password($email, $password) {
        // Şifreyi md5 ile hashliyoruz  
        $password = md5($password);
        $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
        return $query->row_array();
    }

    public function get_user_by_email($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row_array();
    }
    
    public function add_user($name, $surname, $email, $password) { // Soyadı alanı da buraya eklendi
        $data = array(
            'name' => $name,
            'surname' => $surname, // Soyadı alanı eklendi
            'email' => $email,
            'password' => $password
        );
    
        $this->db->insert('users', $data);
    
        return $this->db->affected_rows() > 0;
    }
    
    
    
}
?>
