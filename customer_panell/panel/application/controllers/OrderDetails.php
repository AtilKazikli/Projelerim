<?php

class OrderDetails extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "orderDetails_v";

        $this->load->model("OrderDetails_model");

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->OrderDetails_model->get_all(
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
        $this->form_validation->set_rules("order_detail_id", "Detay_numarası", "required|trim");

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

            $insert = $this->OrderDetails_model->add(
                array(
                    "order_detail_id"       => $this->input->post("order_detail_id"),
                    "order_id"              => $this->input->post("order_id"),
                    "menu_id"               => $this->input->post("menu_id"),
                    "quantity"              => $this->input->post("quantity"),
                    "subtotal"              => $this->input->post("subtotal")                    
                )
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

                redirect(base_url("OrderDetails"));

            } else {

                redirect(base_url("OrderDetails"));

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

    public function update_form($order_detail_id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->OrderDetails_model->get(
            array(
                "order_detail_id"    => $order_detail_id,
            )
        );
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($order_detail_id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("order_detail_id", "Detay_Numarası", "required|trim");

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

            $update = $this->OrderDetails_model->update(
                array(
                    "order_detail_id"    => $order_detail_id
                ),
                array(
                    "order_detail_id"       => $this->input->post("order_detail_id"),
                    "order_id"              => $this->input->post("order_id"),
                    "menu_id"               => $this->input->post("menu_id"),
                    "quantity"              => $this->input->post("quantity"),
                    "subtotal"              => $this->input->post("subtotal")     
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){

                redirect(base_url("OrderDetails"));

            } else {

                redirect(base_url("OrderDetails"));

            }

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->OrderDetails_model->get(
                array(
                    "order_detail_id"    => $order_detail_id,
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

    public function delete($order_detail_id){

        $delete = $this->OrderDetails_model->delete(
            array(
                "order_detail_id"    => $order_detail_id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){
            redirect(base_url("OrderDetails"));
        } else {
            redirect(base_url("OrderDetails"));
        }

    }

    public function isActiveSetter($order_detail_id){

        if($order_detail_id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->OrderDetails_model->update(
                array(
                    "order_detail_id"    => $order_detail_id
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

        foreach ($items as $rank => $order_detail_id){

            $this->OrderDetails_model->update(
                array(
                    "order_detail_id"        => $order_detail_id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

}
