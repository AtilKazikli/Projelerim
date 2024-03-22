<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        // Oturumu sonlandır
        $this->session->unset_userdata('user_id'); // Kullanıcı oturum bilgisini siler

        // Oturum sonlandıktan sonra başka bir sayfaya yönlendirme yapabilirsiniz
        redirect('home'); // Örnek olarak, kullanıcıyı anasayfaya yönlendiriyoruz
    }
}
