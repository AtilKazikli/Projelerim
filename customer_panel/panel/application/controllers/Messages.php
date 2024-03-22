<?php


class Messages extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Message_modell');
        $this->viewFolder = "messages_v"; // Change this to your actual view folder
    }

    public function index() {
        // Check if the user is logged in (implement your authentication system)
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('messages'); // Redirect to login page if not logged in
        }

        $data['messages'] = $this->Message_modell->get_messages($user_id);
        $this->load->view($this->viewFolder . '/messages/header');
        $this->load->view($this->viewFolder . '/messages/index', $data);
        $this->load->view($this->viewFolder . '/messages/footer');
    }

    public function send() {
        // Check if the user is logged in (implement your authentication system)
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect('login'); // Redirect to login page if not logged in
        }

        $receiver_id = $this->input->post('receiver_id');
        $message = $this->input->post('message');

        // Validate input (add more validation as needed)

        $this->Message_modell->send_message($user_id, $receiver_id, $message);
        redirect('messages');
    }
}

?>