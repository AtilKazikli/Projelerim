
<?php
class Message_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Veritabanı kütüphanesini yükle
    }

    public function get_messagess($user_id) {
        // Kullanıcının aldığı mesajları getiren fonksiyon
        $this->db->select('messagess.*, users.name as sender_name');
        $this->db->from('messagess');
        $this->db->join('users', 'users.id = messagess.sender_id');
        $this->db->where('messagess.receiver_id', $user_id);
        $this->db->order_by('messagess.created_at', 'ASC');
        return $this->db->get()->result();
    }

    public function send_message($sender_id, $receiver_id, $message_text) {
        // Yeni mesaj gönderen fonksiyon
        $data = array(
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'message_text' => $message_text,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('messagess', $data);
        return $this->db->insert_id();
    }

    public function mark_as_read($user_id, $message_id) {
        // Mesajı okundu olarak işaretleme fonksiyonu
        $this->db->where('receiver_id', $user_id);
        $this->db->where('id', $message_id);
        $this->db->update('messagess', array('is_read' => 1));
        return $this->db->affected_rows();
    }

    public function delete_message($user_id, $message_id) {
        // Mesajı silme fonksiyonu (gerçek silme yerine kullanıcıya bağlı olarak işaretleme yapabilirsiniz)
        $this->db->where('receiver_id', $user_id);
        $this->db->where('id', $message_id);
        $this->db->update('messagess', array('is_deleted' => 1));
        return $this->db->affected_rows();
    }
}
?>