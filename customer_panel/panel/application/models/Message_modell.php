<?php

class Message_modell extends CI_Model {
    public function get_messages($user_id) {
        $this->db->where('receiver_id', $user_id);
        $this->db->or_where('sender_id', $user_id);
        $this->db->order_by('timestamp', 'asc');
        return $this->db->get('messages')->result();
    }

    public function send_message($sender_id, $receiver_id, $message) {
        $data = array(
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'message' => $message
        );
        $this->db->insert('messages', $data);
    }
}
?>