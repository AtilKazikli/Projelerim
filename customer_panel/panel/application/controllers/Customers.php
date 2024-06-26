<?php

class customers extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "customers_v";

        $this->load->model("customers_model");

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->customers_model->get_all(
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

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("name", "isim", "required|trim");

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

            $insert = $this->customers_model->add(
                array(
                    "name"            => $this->input->post("name"),
                    "email"           => $this->input->post("email"),
                    "phone"           => $this->input->post("phone"),
                    "address"         => $this->input->post("address"),
                    "isActive"        => 1,
                    "createdAt"       => date("Y-m-d H:i:s")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

                redirect(base_url("customers"));

            } else {

                redirect(base_url("customers"));

            }

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

        // Başarılı ise
            // Kayit işlemi baslar
        // Başarısız ise
            // Hata ekranda gösterilir...

    }

    public function update_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->customers_model->get(
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

    public function update($id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("name", "isim", "required|trim");

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

            $update = $this->customers_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "name"            => $this->input->post("name"),
                    "email"           => $this->input->post("email"),
                    "phone"           => $this->input->post("phone"),
                    "address"         => $this->input->post("address"),
                    "isActive"        => 1,
                    "createdAt"       => date("Y-m-d H:i:s")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){

                redirect(base_url("customers"));

            } else {

                redirect(base_url("customers"));

            }

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->customers_model->get(
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

        $delete = $this->customers_model->delete(
            array(
                "id"    => $id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){
            redirect(base_url("customers"));
        } else {
            redirect(base_url("customers"));
        }

    }

    public function isActiveSetter($id){

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->customers_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    

}
