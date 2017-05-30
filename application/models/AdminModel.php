<?php

/**
 * Created by PhpStorm.
 * User: Timothy
 * Date: 29.05.2017
 * Time: 16:38
 */
class AdminModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function verify_admin($login, $pass)
    {
        $query = $this->db->query("SELECT COUNT(id) AS 'pocet' FROM admin_table WHERE login='$login' AND password='$pass';");
        $row = $query->row();
        $pocet = $row->pocet;
        return ($pocet > 0) ? true : false;
    }

    public function get_places()
    {
        $query = $this->db->query("SELECT * FROM sport_place");
        return $query->result();
    }

    public function get_place($id)
    {
        $query = $this->db->query("SELECT * FROM sport_place WHERE id='$id'");
        return $query->row();
    }

    public function add_place($name)
    {
        $toinsert = array('name' => $name);
        $this->db->insert('sport_place', $toinsert);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function edit_place($id, $place)
    {
        $this->db->query("UPDATE sport_place SET name='$place' WHERE id='$id'");
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_payments()
    {
        $query = $this->db->query("SELECT * FROM payment_form");
        return $query->result();
    }

    public function get_payment($id)
    {
        $query = $this->db->query("SELECT * FROM payment_form WHERE id='$id'");
        return $query->row();
    }

    public function add_payment($name)
    {
        $toinsert = array('type' => $name);
        $this->db->insert('payment_form', $toinsert);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function edit_payment($id, $form)
    {
        $this->db->query("UPDATE payment_form SET type='$form' WHERE id='$id'");
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_subplaces()
    {
        $query = $this->db->query("SELECT sub_place.id AS id, 
        sub_place.sport_place AS id2, 
        sport_place.name AS sport_place, 
        sub_place.sub_place AS sub_place, 
        sub_place.price_for_hour AS price 
        FROM sub_place
        INNER JOIN sport_place ON sport_place.id = sub_place.sport_place");
        return $query->result();
    }

    public function add_subplace($sport_place, $sub_place, $price)
    {
        $toinsert = array('sport_place' => $sport_place,
            'sub_place' => $sub_place,
            'price_for_hour' => $price);
        $this->db->insert('sub_place', $toinsert);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_subplace($id)
    {
        $query = $this->db->query("SELECT sub_place.id AS id, 
        sub_place.sport_place AS id2, 
        sport_place.name AS sport_place, 
        sub_place.sub_place AS sub_place, 
        sub_place.price_for_hour AS price 
        FROM sub_place
        INNER JOIN sport_place ON sport_place.id = sub_place.sport_place
        WHERE sub_place.id='$id'");
        return $query->row();
    }

    public function edit_subplace($id, $place, $subplace, $price)
    {
        $this->db->query("UPDATE sub_place SET sport_place='$place', sub_place='$subplace', price_for_hour='$price' WHERE id='$id'");
        return ($this->db->affected_rows() > 0) ? true : false;
    }
}