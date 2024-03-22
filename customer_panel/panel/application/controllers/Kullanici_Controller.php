<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kullanici_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kullanici_model');
    }

    public function index() {
        $data['kullanicilar'] = $this->Kullanici_model->get_kullanicilar();
        $data['ekleme_butonu'] = $this->ekleme_butonu();
        $this->load->view('kullanici_listesi', $data);
    }

    public function ekle() {
        $ad = $this->input->post('ad');
        $email = $this->input->post('email');
        $sifre = $this->input->post('sifre');

        $kullanici_verileri = array(
            'ad' => $ad,
            'email' => $email,
            'sifre' => md5($sifre),
        );

        $eklenen = $this->Kullanici_model->kullanici_ekle($kullanici_verileri);

        if ($eklenen) {
            echo "Kullanıcı başarıyla eklendi!";
        } else {
            echo "Kullanıcı eklenirken bir hata oluştu.";
        }
    }

    private function ekleme_butonu() {
        $ekleme_butonu = '<a href="' . base_url('Kullanici_Controller/kullanici_ekle_formu') . '" class="btn btn-primary">Kullanıcı Ekle</a>';
        return $ekleme_butonu;
    }

    public function kullanici_ekle_formu() {
        $this->load->view('kullanici_ekle_formu');
    }

    // Diğer işlemler için controller metodları burada yer alabilir.

}
?>
