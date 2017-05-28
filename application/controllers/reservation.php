<?php

/**
 * Created by PhpStorm.
 * User: Timothy
 * Date: 25.05.2017
 * Time: 22:03
 */
class reservation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->session;
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('reservation');
        $this->load->view('footer');
    }

    public function save_user(){
        $this->session->set_userdata('name', $_POST['name']);
        $this->session->set_userdata('surname', $_POST['surname']);
        $this->session->set_userdata('email', $_POST['email']);
        $this->session->set_userdata('phone', $_POST['phone']);
        $this->choose_place();
    }

    public function choose_place()
    {
        $this->load->database();
        $this->load->model('DBModel', NULL, TRUE);
        $data['query'] = $this->DBModel->getsportplace();
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('choose_place', $data);
        $this->load->view('footer');
    }

    public function choose_time()
    {
        $date = $_POST['datum'];
        $id = $_POST['sport_place'];
        $data = array(
            "id" => $id,
            "subplace" => null,
            "from" => null,
            "to" => null,
            "hours" => null,
            "price_for_hour" => null,
            "total" => null
        );
        if (!isset($_SESSION['place_array'])) {
            $array[] = $id;
        } else {
            $array = $_SESSION['place_array'];
            if (!in_array($id, $array)) {
                $array[] = $id;
            }
        }
        $this->session->set_userdata('place_array', $array);
        $this->session->set_userdata('place' . $id, $data);
        $this->load->model('DBModel', NULL, TRUE);
        $values['query'] = $this->DBModel->getfreetime($date, $id);
        $values['id'] = $id;
        $values['date'] = $date;
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('choose_time', $values);
        $this->load->view('footer');
    }

    public function writeplace(){
        $id=$_POST['id'];
        $this->session->userdata['place' . $id]['start'] = $_POST['date'] . " " . $_POST['start'] . ":00";
        $this->session->userdata['place' . $id]['end'] = $_POST['date'] . " " . $_POST['end'] . ":00";
        $date1 = date_create($_SESSION['place'. $id]['start']);
        $date2 = date_create($_SESSION['place'. $id]['end']);
        $differ = date_diff($date1, $date2);
        $_SESSION['place'. $id]['hours'] = $differ->format('%h');
        $this->load->model('DBModel', NULL, TRUE);
        $data = $this->DBModel->getprice($id);
        $hourprice=0;

        foreach($data as $row){
            $hourprice = $row->price_for_hour;
        }
        $data = $this->DBModel->getcompleteplace($id);
        $placename="";
        foreach($data as $row){
            $placename = ($row->name)." - ".($row->sub_place);
        }
        $totalprice = $hourprice *  $_SESSION['place'. $id]['hours'];
        $this->session->userdata['place' . $id]['price_for_hour'] = $hourprice;
        $this->session->userdata['place' . $id]['total'] = $totalprice;
        $this->session->userdata['place' . $id]['subplace'] = $placename;
        $this->finalize();
    }

    public function finalize()
    {
        $data['name'] = $_SESSION['name'];
        $data['surname'] = $_SESSION['surname'];
        $data['email'] = $_SESSION['email'];
        $data['phone'] = $_SESSION['phone'];
        $data['place_array'] = $_SESSION['place_array'];
        foreach ($data['place_array'] as $i) {
            $data['place' . $i] = $_SESSION['place' . $i];
        }
        $this->load->model('DBModel', NULL, TRUE);
        $data['query'] = $this->DBModel->getpaymentmethod();
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('finalize', $data);
        $this->load->view('footer');
    }

    public function delete(){
        $id = $_POST['delete'];
        unset($_SESSION['place'.$id]);
        $array = $_SESSION['place_array'];
        if(($key = array_search($id, $array)) !== false) {
            unset($array[$key]);
        }
        $this->session->set_userdata('place_array', $array);
        $this->finalize();
    }

    public function writeback(){
        $payment = $_POST['payment'];
        $note = $_POST['note'];
        $sum = 0;
        $now = date('Y-m-d H:i:s',time());
        $data['name'] = $_SESSION['name'];
        $data['surname'] = $_SESSION['surname'];
        $data['email'] = $_SESSION['email'];
        $data['phone'] = $_SESSION['phone'];
        $data['created'] = $now;
        $data['place_array'] = $_SESSION['place_array'];
        $data['note']= $note;
        foreach ($data['place_array'] as $i) {
            $data['place' . $i] = $_SESSION['place' . $i];
            $sum = $sum + $data['place' . $i]['total'];
        }
        $data['sum'] = $sum;
        $data['method'] = $payment;
        $this->load->model('DBModel', NULL, TRUE);
        $status1 = $this->DBModel->createinvoice($data);
        if($status1) {
            $this->load->model('DBModel', NULL, TRUE);
            $id = "";
            $result = $this->DBModel->getid($now);
            foreach($result  as $row){
                $id = $row->id;
            }
            foreach ($data['place_array'] as $i) {
                $this->load->model('DBModel', NULL, TRUE);
                $this->DBModel->create_details($data['place' . $i], $id);
            }
        }
        $this->succes();
    }

    public function succes(){
        $this->session->sess_destroy();
        $this->load->view('succes');
        $this->index();
    }
}