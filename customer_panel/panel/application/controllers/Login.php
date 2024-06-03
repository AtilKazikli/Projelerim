<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kullanici_model');
    }

    public function index() {
        $this->load->view('login_form');
    }

    public function do_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if (!$email || !$password) {
            $this->session->set_flashdata('error', 'Lütfen e-posta ve şifre girin.');
            redirect('login');
            return;
        }

        $user = $this->Kullanici_model->get_kullanici_by_email_and_password($email, $password);

        if ($user) {
            $this->session->set_userdata('id', $user['id']);
            redirect(base_url("dashboard"));
        } else {
            $this->session->set_flashdata('error', 'Hatalı giriş. Lütfen tekrar deneyin.');
            redirect('login');
        }
    }

    public function forgot_password_form() {
        $this->load->view('forgot_password_form');
    }

    public function reset_password() {
        $email = $this->input->post('email');
        if (!$email) {
            $this->session->set_flashdata('error', 'Lütfen e-posta adresinizi girin.');
            redirect('login/forgot_password_form');
            return;
        }
    
        $user = $this->Kullanici_model->get_user_by_email($email);
    
        if (!$user) {
            $this->session->set_flashdata('error', 'Bu e-posta adresine ait bir kullanıcı bulunamadı.');
            redirect('login/forgot_password_form');
            return;
        }
    
        // Şifre sıfırlama işlemi burada yapılır (örneğin, bir şifre sıfırlama e-postası gönderme)
        // Bu kısmı kendi uygulamanızın ihtiyaçlarına göre düzenlemeniz gerekecek
    
        $this->session->set_flashdata('success', 'Şifre sıfırlama talimatları e-posta adresinize gönderildi.');
        redirect('login');
    }

    public function add_user() {
        $name = $this->input->post('name');
        $surname = $this->input->post('surname'); // Soyadı alanı eklendi
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
        if (!$name || !$surname || !$email || !$password) {
            $this->session->set_flashdata('error', 'Lütfen tüm alanları doldurun.');
            redirect('login/signup_form');
            return;
        }
    
        // Örnek olarak şifreyi md5 ile hashleyelim
        $password = md5($password);
    
        // Kullanıcıyı eklemek için model fonksiyonunu çağır
        $result = $this->Kullanici_model->add_user($name, $surname, $email, $password); // Soyadı da modele gönderildi
    
        if ($result) {
            $this->session->set_flashdata('success', 'Kullanıcı başarıyla oluşturuldu. Lütfen giriş yapın.');
            redirect('login');
        } else {
            $this->session->set_flashdata('error', 'Kullanıcı oluşturulurken bir hata oluştu. Lütfen tekrar deneyin.');
            redirect('login/signup_form');
        }
    }
    
    public function signup_form() {
        $this->load->view('signup_form');
    }
}
?>
