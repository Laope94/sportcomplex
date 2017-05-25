<?php

/**
 * Created by PhpStorm.
 * User: Timothy
 * Date: 23.05.2017
 * Time: 18:26
 */
class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function render_page($view) {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->view($view);
        $this->load->view('footer');
    }

}