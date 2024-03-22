    <?php 
    class MessageController extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('Message_model');
            $this->load->model('User_modell');
            if (!$this->session->userdata('user_id')) {

            }
        }

        public function index() {
            $user_id = $this->session->userdata('user_id');
            $data['messagess'] = $this->Message_model->get_messagess($user_id);
            $data['users'] = $this->User_modell->get_users_except_current($user_id);
            $this->load->view('message_view', $data);
        }

        public function send_message() {
            $user_id = $this->session->userdata('user_id');
            $receiver_id = $this->input->post('receiver_id');
            $message_text = $this->input->post('message_text');

            $this->Message_model->send_message($user_id, $receiver_id, $message_text);

            redirect('message');
        }

        public function mark_as_read($message_id) {
            $user_id = $this->session->userdata('user_id');
            $this->Message_model->mark_as_read($user_id, $message_id);

            redirect('message');
        }

        public function delete_message($message_id) {
            $user_id = $this->session->userdata('user_id');
            $this->Message_model->delete_message($user_id, $message_id);

            redirect('message');
        }
    }
    ?>