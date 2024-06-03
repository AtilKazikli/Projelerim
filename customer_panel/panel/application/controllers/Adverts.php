<?php

class Adverts extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "adverts_v";

        $this->load->model("adverts_model");
        $this->load->model("Resim_model");
    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->adverts_model->get_all(
            array(), "rank ASC"
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){
        $viewData = new stdClass();
    
        $this->load->library("form_validation");
    
        // Kurallar yazılır..
        $this->form_validation->set_rules("baslik", "Başlık", "required|trim");
        $this->form_validation->set_rules("resim", "Resim", "callback_upload_check");
    
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );
    
        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();
    
        if($validate){
    
            // Resim yüklemesi yapılır
            $resim_upload = $this->upload_resim();
    
            if($resim_upload['success']){
    
                // İlan eklemesi yapılır
                $insert = $this->adverts_model->add(
                    array(
                        "id"                    => $this->input->post("id"),
                        "baslik"                => $this->input->post("baslik"),
                        "aciklama"              => $this->input->post("aciklama"),
                        "fiyat"                 => $this->input->post("fiyat"),
                        "araba_marka"           => $this->input->post("araba_marka"),
                        "araba_model"           => $this->input->post("araba_model"),
                        "yil"                   => $this->input->post("yil"),
                        "resim"                 => $resim_upload['file_name']
                    )
                );
    
                // TODO Alert sistemi eklenecek...
                if($insert){
                    redirect(base_url("adverts"));
                } else {
                    redirect(base_url("adverts"));
                }
    
            } else {
                // Resim yüklemesi başarısız ise hata göster
                $viewData->form_error = true;
                $viewData->resim_error = $resim_upload['error'];
                $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            }
    
        } else {
            // Form validation başarısız ise hata göster
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    private function upload_resim() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024; // KB cinsinden
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('resim')) {
            $error = $this->upload->display_errors();
            return array('success' => false, 'error' => $error);
        } else {
            $data = $this->upload->data();
            return array('success' => true, 'file_name' => $data['orig_name']);
        }
        
    }

    public function valid_image($resim) {
        $allowed_mime_types = array('image/jpeg', 'image/png', 'image/gif');
        $allowed_file_ext = array('jpg', 'jpeg', 'png', 'gif');
    
        $mime = get_mime_by_extension($_FILES['resim']['name']);
        $file_ext = pathinfo($_FILES['resim']['name'], PATHINFO_EXTENSION);
    
        if (!in_array($mime, $allowed_mime_types) || !in_array($file_ext, $allowed_file_ext)) {
            $this->form_validation->set_message('valid_image', 'Lütfen geçerli bir resim dosyası seçin.');
            return false;
        }
    
        return true;
    }
    
    public function upload_check($resim) {
        if (empty($_FILES['resim']['name'])) {
            $this->form_validation->set_message('upload_check', 'Lütfen bir resim seçin.');
            return false;
        }
        return true;
    }
    
    public function update_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->adverts_model->get(
            array(
                "id"    => $id,
            )
        );
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function add(){

            $viewData = new stdClass();
        
            // İlanlar_model'deki get_all fonksiyonu kullanılarak adverts getiriliyor
            $items = $this->adverts_model->get_all();
            $viewData->items = $items;
        
            // Diğer gerekli işlemler
            if ($this->input->post()) {
                // Eğer form gönderilmişse, form verilerini kontrol etme ve kaydetme işlemleri burada yapılır
                $this->load->library("form_validation");
                $this->form_validation->set_rules("baslik", "Başlık", "required|trim");
                $this->form_validation->set_rules("aciklama", "Açıklama", "required|trim");
                $this->form_validation->set_rules("fiyat", "Fiyat", "required|numeric");
                // Diğer form kuralları da eklenebilir
        
                if ($this->form_validation->run()) {
                    // Form doğrulama başarılıysa, ilanı veritabanına ekleme işlemleri burada yapılır
                    $insert_data = array(
                        "baslik" => $this->input->post("baslik"),
                        "aciklama" => $this->input->post("aciklama"),
                        "fiyat" => $this->input->post("fiyat"),
                        // Diğer form alanları da eklenebilir
                    );
        
                    $insert = $this->adverts_model->add($insert_data);
        
                    if ($insert) {
                        // Başarılı bir şekilde eklendiyse kullanıcıyı adverts listesine yönlendir
                        redirect(base_url("adverts"));
                    } else {
                        // Veritabanına ekleme sırasında bir hata oluştuysa, hata mesajını kullanıcıya göster
                        $viewData->form_error = true;
                    }
                } else {
                    // Form doğrulama başarısızsa, hata mesajlarını kullanıcıya göster
                    $viewData->form_error = true;
                }
            }
        
            // İlan ekleme formu view'ini yükle
            $this->load->view("adverts_v/add/index", $viewData);
    }
        
    public function update($id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("baslik", "Başlık", "required|trim");
        $this->form_validation->set_rules("resim", "Resim", "callback_upload_check");


        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();

        // Monitör Askısı
        // monitor-askisi

        if($validate){

            $update = $this->adverts_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "id"                    => $this->input->post("id"),
                    "baslik"                => $this->input->post("baslik"),
                    "aciklama"              => $this->input->post("aciklama"),
                    "fiyat"                 => $this->input->post("fiyat"),
                    "araba_marka"           => $this->input->post("araba_marka"),
                    "araba_model"           => $this->input->post("araba_model"),
                    "yil"                   => $this->input->post("yil"),
                    "resim"                 => $this->input->post("resim")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){

                redirect(base_url("adverts"));

            } else {

                redirect(base_url("adverts"));

            }

            } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->adverts_model->get(
                array(
                    "id"    => $id,
                )
            );

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

        // Başarılı ise
        // Kayit işlemi baslar
        // Başarısız ise
        // Hata ekranda gösterilir...

    }

    public function delete($id){

        $delete = $this->adverts_model->delete(
            array(
                "id"    => $id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){
            redirect(base_url("adverts"));
        } else {
            redirect(base_url("adverts"));
        }

    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->adverts_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    public function rankSetter(){


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->adverts_model->update(
                array(
                    "id"        => $id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

}