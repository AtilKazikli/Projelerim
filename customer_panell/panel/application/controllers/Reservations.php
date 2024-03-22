<?php

class reservations extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "reservations_v";

        $this->load->model("reservations_model");

    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->reservations_model->get_all(
            array()
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
        $this->form_validation->set_rules("reservation_id", "Rezervasyon_Numarası", "required|trim");

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

            $insert = $this->reservations_model->add(
                array(
                    "reservation_id"        => $this->input->post("reservation_id"),
                    "user_id"               => $this->input->post("user_id"),
                    "reservation_date"      => $this->input->post("reservation_date"),
                    "party_size"            => $this->input->post("party_size"),
                    "special_requests"      => $this->input->post("special_requests"),
                    "status"                => $this->input->post("status"),
                    "isActive"              => 1,

                )
            );

            // TODO Alert sistemi eklenecek...
            if($insert){

                redirect(base_url("reservations"));

            } else {

                redirect(base_url("reservations"));

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

    public function update_form($reservation_id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->reservations_model->get(
            array(
                "reservation_id"    => $reservation_id,
            )
        );
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($reservation_id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("reservation_id", "Rezervasyon_Numarası", "required|trim");

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

            $update = $this->reservations_model->update(
                array(
                    "reservation_id"    => $reservation_id
                ),
                array(
                    "reservation_id"        => $this->input->post("reservation_id"),
                    "user_id"               => $this->input->post("user_id"),
                    "reservation_date"      => $this->input->post("reservation_date"),
                    "party_size"            => $this->input->post("party_size"),
                    "special_requests"      => $this->input->post("special_requests"),
                    "status"                => $this->input->post("status"),
                    "isActive"              => 1,
                )
            );

            // TODO Alert sistemi eklenecek...
            if($update){

                redirect(base_url("reservations"));

            } else {

                redirect(base_url("reservations"));

            }

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->reservations_model->get(
                array(
                    "reservation_id"    => $reservation_id,
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

    public function delete($reservation_id){

        $delete = $this->reservations_model->delete(
            array(
                "reservation_id"    => $reservation_id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){
            redirect(base_url("reservations"));
        } else {
            redirect(base_url("reservations"));
        }

    }
    public function rankSetter(){


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $reservation_id){

            $this->reservations_model->update(
                array(
                    "reservation_id"        => $reservation_id,
                    "rank !="   => $rank
                ),
                array(
                    "rank"      => $rank
                )
            );

        }

    }

}
