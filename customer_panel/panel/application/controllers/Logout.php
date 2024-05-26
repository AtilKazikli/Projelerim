<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->logout();
    }

    public function logout() {
        // Oturumu sonlandır
        $this->session->unset_userdata('id');
        // Başarılı çıkış sonrası yönlendirme yapabilirsiniz
        redirect('login'); // Örnek olarak, kullanıcıyı giriş sayfasına yönlendiriyoruz
    }
}
?>
