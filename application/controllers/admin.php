<?php

/**
 * Created by PhpStorm.
 * User: Timothy
 * Date: 29.05.2017
 * Time: 15:38
 */
class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index(){
        $this->load->view('header');
        $this->load->view('admin_login');
    }

    public function verify(){
        $this->load->model('AdminModel', NULL, TRUE);
        if(
        $this->AdminModel->verify_admin($_POST['login'], $_POST['pass'])){
           $this->show_places();
        }
        else {
            $this->load->view('header');
            $this->load->view('login_failed');
            $this->index();
        }
    }

    public function show_places(){
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_places();
        $this->load->view('header');
        $this->load->view('dash_places', $data);
    }

    public function place_add(){
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->add_place($_POST['name']);
        $this->show_places();
    }

    public function place_edit(){
    $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_place($id);
        $this->load->view('header');
        $this->load->view('edit_place', $data);
    }

    public function commit_place(){
        $id = $_POST['id'];
        $place = $_POST['place'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->edit_place($id, $place);
        $this->show_places();
    }

    public function show_payments(){
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_payments();
        $this->load->view('header');
        $this->load->view('dash_payments', $data);
    }

    public function payment_add(){
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->add_payment($_POST['method']);
        $this->show_payments();
    }

    public function payment_edit(){
        $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_payment($id);
        $this->load->view('header');
        $this->load->view('edit_payment', $data);
    }

    public function commit_payment(){
        $id = $_POST['id'];
        $form = $_POST['method'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->edit_payment($id, $form);
        $this->show_payments();
    }

    public function show_subplaces(){
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_subplaces();
        $data['places'] = $this->AdminModel->get_places();
        $this->load->view('header');
        $this->load->view('dash_subplace', $data);
    }

    public function subplace_add(){
        $sport_place = $_POST['sport_place'];
        $sub_place = $_POST['subplace'];
        $price = $_POST['price'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->add_subplace($sport_place, $sub_place, $price);
        $this->show_subplaces();
    }

    public function subplace_edit(){
        $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_subplace($id);
        $data['places'] = $this->AdminModel->get_places();
        $this->load->view('header');
        $this->load->view('edit_subplace', $data);
    }

    public function commit_subplace(){
        $id = $_POST['id'];
        $place = $_POST['sport_place'];
        $subplace = $_POST['subplace'];
        $price = $_POST['price'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->edit_subplace($id, $place, $subplace, $price);
        $this->show_subplaces();
    }
}