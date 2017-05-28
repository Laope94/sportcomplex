<?php

/**
 * Created by PhpStorm.
 * User: Timothy
 * Date: 26.05.2017
 * Time: 14:14
 */
class DBModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getsportplace()
    {
        $this->db->select('sub_place.id, sub_place.sub_place, sub_place.price_for_hour, sport_place.name');
        $this->db->from('sub_place');
        $this->db->join('sport_place', 'sub_place.sport_place = sport_place.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getcompleteplace($id)
    {
        $this->db->select('sub_place.sub_place, sport_place.name');
        $this->db->from('sub_place');
        $this->db->join('sport_place', 'sub_place.sport_place = sport_place.id');
        $where = "sub_place.id='$id'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getfreetime($date, $id)
    {
        $this->db->select('start, end');
        $this->db->from('invoice_entry');
        $where = "sub_place='$id' AND start>'$date 00:00:00' AND end<'$date 23:59:59'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function getpaymentmethod()
    {
        $this->db->select('*');
        $this->db->from('payment_form');
        $query = $this->db->get();
        return $query->result();
    }

    public function getprice($id)
    {
        $this->db->select('price_for_hour');
        $this->db->from('sub_place');
        $where = "id='$id'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function createinvoice($data)
    {
        $toinsert = array('name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone_number' => $data['phone'],
            'note' => $data['note'],
            'creation_date' => $data['created'],
            'amount' => $data['sum'],
            'payment_form' => $data['method'],
            'is_closed' => 0,
            'is_paid' => 0);
        $this->db->insert('invoice', $toinsert);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getid($date)
    {
        $this->db->select('id');
        $this->db->from('invoice');
        $where = "creation_date='$date'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function create_details($data, $id)
    {
        $toinsert = array('sub_place' => $data['id'],
            'invoice' => $id,
            'start' => $data['start'],
            'end' => $data['end']);
        $this->db->insert('invoice_entry', $toinsert);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

}