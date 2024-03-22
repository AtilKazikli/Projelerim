<?php

class Adverts_model extends CI_Model
{

    public $tableName = "adverts";

    public function __construct()
    {
        parent::__construct();

    }

    public function get($where = array())
    {
    $this->db->select('*');
    $this->db->from('adverts'); // 'adverts' tablosuna göre ayarlayın
    if (!empty($where)) {
        $this->db->where($where);
    }

    $query = $this->db->get();
    return $query->row();
    }


    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all($where = array(), $order = "", $limit = array())
    {
    $this->db->select('*');
    $this->db->from('adverts'); // 'adverts' tablosuna göre ayarlayın
    if (!empty($where)) {
        $this->db->where($where);
    }
    if (!empty($order)) {
        $this->db->order_by($order);
    }
    if (!empty($limit)) {
        $this->db->limit($limit['limit'], $limit['offset']);
    }

    $query = $this->db->get();
    return $query->result();
    }


    public function add($data = array())
    {
    $this->db->insert('adverts', $data); // 'adverts' tablosuna göre ayarlayın
    return $this->db->insert_id();
    }


    public function update($where = array(), $data = array())
    {
    $this->db->where($where);
    $this->db->update('adverts', $data); // 'adverts' tablosuna göre ayarlayın
    return $this->db->affected_rows();
    }


    public function delete($where = array())
    {
    $this->db->where($where);
    $this->db->delete('adverts'); // 'adverts' tablosuna göre ayarlayın
    return $this->db->affected_rows();
    }

    public function add_form()
    {
    // İlan ekleme formunu içeren HTML'i yükleyerek geri döndür
    return $this->load->view("adverts_v/add_form/index", null, true);
    }



}   
