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


    public function index()
    {
        $this->load->view('header');
        $this->load->view('admin_login');
    }

    public function verify()
    {
        $this->load->model('AdminModel', NULL, TRUE);
        if (
        $this->AdminModel->verify_admin($_POST['login'], $_POST['pass'])
        ) {
            $this->show_places();
        } else {
            $this->load->view('header');
            $this->load->view('login_failed');
            $this->index();
        }
    }

    public function show_places()
    {
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_places();
        $this->load->view('header');
        $this->load->view('dash_places', $data);
    }

    public function place_add()
    {
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->add_place($_POST['name']);
        $this->show_places();
    }

    public function place_edit()
    {
        $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_place($id);
        $this->load->view('header');
        $this->load->view('edit_place', $data);
    }

    public function commit_place()
    {
        $id = $_POST['id'];
        $place = $_POST['place'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->edit_place($id, $place);
        $this->show_places();
    }

    public function show_payments()
    {
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_payments();
        $this->load->view('header');
        $this->load->view('dash_payments', $data);
    }

    public function payment_add()
    {
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->add_payment($_POST['method']);
        $this->show_payments();
    }

    public function payment_edit()
    {
        $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_payment($id);
        $this->load->view('header');
        $this->load->view('edit_payment', $data);
    }

    public function commit_payment()
    {
        $id = $_POST['id'];
        $form = $_POST['method'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->edit_payment($id, $form);
        $this->show_payments();
    }

    public function show_subplaces()
    {
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_subplaces();
        $data['places'] = $this->AdminModel->get_places();
        $this->load->view('header');
        $this->load->view('dash_subplace', $data);
    }

    public function subplace_add()
    {
        $sport_place = $_POST['sport_place'];
        $sub_place = $_POST['subplace'];
        $price = $_POST['price'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->add_subplace($sport_place, $sub_place, $price);
        $this->show_subplaces();
    }

    public function subplace_edit()
    {
        $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_subplace($id);
        $data['places'] = $this->AdminModel->get_places();
        $this->load->view('header');
        $this->load->view('edit_subplace', $data);
    }

    public function commit_subplace()
    {
        $id = $_POST['id'];
        $place = $_POST['sport_place'];
        $subplace = $_POST['subplace'];
        $price = $_POST['price'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->edit_subplace($id, $place, $subplace, $price);
        $this->show_subplaces();
    }

    public function show_entries()
    {
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_entries();
        $data['invoice'] = $this->AdminModel->get_invoiceids();
        $data['places'] = $this->AdminModel->get_completename();
        $this->load->view('header');
        $this->load->view('dash_entries', $data);
    }

    public function entry_add()
    {
        $sport_place = $_POST['sport_place'];
        $invoice = $_POST['invoice_id'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->add_entry($sport_place, $invoice, $start, $end);
        $this->show_entries();
    }

    public function entry_edit()
    {
        $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_entry($id);
        $data['invoice'] = $this->AdminModel->get_invoiceids();
        $data['places'] = $this->AdminModel->get_completename();
        $this->load->view('header');
        $this->load->view('edit_entry', $data);
    }

    public function commit_entry()
    {
        $id = $_POST['id'];
        $place = $_POST['sport_place'];
        $invoice = $_POST['invoice_id'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->edit_entry($id, $place, $invoice, $start, $end);
        $this->show_entries();
    }

    public function entry_delete(){
        $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->delete_entry($id);
        $this->show_entries();
    }

    public function show_invoices()
    {
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_invoices();
        $data['payments'] = $this->AdminModel->get_payments();
        $this->load->view('header');
        $this->load->view('dash_invoice', $data);
    }

    public function invoice_add()
    {
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->add_invoice($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phone'],
            $_POST['created'], $_POST['amount'], $_POST['payment'], $_POST['closed'], $_POST['paid']);
        $this->show_invoices();
    }

    public function invoice_delete(){
        $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->delete_invoice($id);
        $this->show_invoices();
    }

    public function invoice_edit()
    {
        $id = $_POST['id'];
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_invoice($id);
        $data['payments'] = $this->AdminModel->get_payments();
        $this->load->view('header');
        $this->load->view('edit_invoice', $data);
    }

    public function commit_invoice()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $created = $_POST['created'];
        $amount = $_POST['amount'];
        $payment = $_POST['payment'];
        $closed = $_POST['closed'];
        $paid = $_POST['paid'];
        $this->load->model('AdminModel', NULL, TRUE);
        $this->AdminModel->edit_invoice($id, $name, $surname, $email, $phone, $created, $amount, $payment, $closed, $paid);
        $this->show_invoices();
    }

    public function chart_payment(){
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_paymentstat();
        $this->load->view('header');
        $this->load->view('payment_chart', $data);
    }

    public function chart_sport(){
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_sportstat();
        $this->load->view('header');
        $this->load->view('sport_chart', $data);
    }

    public function chart_income(){
        $this->load->model('AdminModel', NULL, TRUE);
        $data['query'] = $this->AdminModel->get_incomestat();
        $this->load->view('header');
        $this->load->view('income_chart', $data);
    }

    public function chart_compare(){
        $this->load->model('AdminModel', NULL, TRUE);
        $data['open'] = $this->AdminModel->get_open();
        $data['closed'] = $this->AdminModel->get_closed();
        $this->load->view('header');
        $this->load->view('compare_chart', $data);
    }
}