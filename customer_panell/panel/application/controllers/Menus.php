<?php

class Menus extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "menus_v";

        $this->load->model("menus_model");

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->menus_model->get_all(
            array(),
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
        $this->form_validation->set_rules("item_name", "Öge Adı", "required|trim");

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

            $insert = $this->menus_model->add(
                array(
                    "menu_id"            => $this->input->post("menu_id"),
                    "item_name"          => $this->input->post("item_name"),
                    "price"              => $this->input->post("price"),
                    "category"           => $this->input->post("category"),
                    "is_vegetarian"      => $this->input->post("is_vegetarian"),
                    "isActive"           => 1,
                    "createdAt"          => date("Y-m-d H:i:s"),
                    "updateAt"           => date("Y-m-d H:i:s")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

                redirect(base_url("menus"));

            } else {

                redirect(base_url("menus"));

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

    public function update_form($menu_id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->menus_model->get(
            array(
                "menu_id"    => $menu_id,
            )
        );
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($menu_id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("item_name", "Öge Adı", "required|trim");

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

            $update = $this->menus_model->update(
                array(
                    "menu_id"    => $menu_id
                ),
                array(
                    "menu_id"            => $this->input->post("menu_id"),
                    "item_name"          => $this->input->post("item_name"),
                    "price"              => $this->input->post("price"),
                    "category"           => $this->input->post("category"),
                    "is_vegetarian"      => $this->input->post("is_vegetarian"),
                    "description"        => $this->input->post("description"),
                    "isActive"           => 1,
                    "createdAt"          => date("Y-m-d H:i:s"),
                    "updateAt"           => date("Y-m-d H:i:s")
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){

                redirect(base_url("menus"));

            } else {

                redirect(base_url("menus"));

            }

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->menus_model->get(
                array(
                    "menu_id"    => $menu_id,
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

    public function delete($menu_id){

        $delete = $this->menus_model->delete(
            array(
                "menu_id"    => $menu_id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){
            redirect(base_url("menus"));
        } else {
            redirect(base_url("menus"));
        }

    }

    public function isActiveSetter($menu_id){

        if($menu_id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->menus_model->update(
                array(
                    "menu_id"    => $menu_id
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

        foreach ($items as $rank => $menu_id){

            $this->menus_model->update(
                array(
                    "menu_id"        => $menu_id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

}
