<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logout
 *
 * @author Me
 */
class logout extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->session->unset_userdata("user");
        redirect('login');
    }
    
    public function page_not_found()
    {
        $this->load->view('404');
    }
    
    public function forbidden()
    {
        $this->load->view('403');
    }
}
