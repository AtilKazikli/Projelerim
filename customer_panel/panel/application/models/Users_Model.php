<?php
class Users_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /* Tabloya veri ekleyen fonksiyon */
    public function add($data = array())
    {
        return $this->db->insert("users", $data);
    }

    /* Tablodaki tüm kayıtları çeken fonksiyon */

    public function getAll($order = "id ASC")
    {
        return $this->db->order_by($order)->get("users")->result();
    }

    /* Sadece istenen kaydı çeken */

    public function get($where = array())
    {
        return $this->db->where($where)->get("users")->row();
    }


    public function delete($where = array())
    {
        return $this->db->where($where)->delete("users");
    }

}

?>
