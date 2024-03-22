<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // User_model'ini yükle
        $this->load->model('Kullanici_model');
    }

    public function index() {
        // Eğer giriş formunu göstermek istiyorsanız burada bir şeyler yapabilirsiniz
        // Örneğin, bir giriş formunu yükleyebilirsiniz
        $this->load->view('login_form'); // login_form adında bir view dosyası olmalı
    }

    public function do_login() {
        // Giriş formundan gelen verileri alınır
        $email = $this->input->post('email');   
        $password = $this->input->post('password');

        // Veritabanından kullanıcıyı e-posta adresine göre alınır
        $user = $this->Kullanici_model->get_kullanici_by_email($email);

        // Kullanıcı varsa ve şifre doğruysa oturum başlatılır
        if ($user && $user['sifre'] === md5($password)) {
            // Oturumu başlat
            
            $this->session->set_userdata('user_id', $user['id']);

            // Başarılı giriş sonrası yönlendirme yapabilirsiniz
            redirect('dashboard'); // Örnek olarak, kullanıcıyı bir dashboard sayfasına yönlendiriyoruz
        } else {
            // Hatalı giriş durumunda bir hata mesajı gösterebilirsiniz
            echo "Hatalı giriş. Lütfen tekrar deneyin.";
        }
    }
}
