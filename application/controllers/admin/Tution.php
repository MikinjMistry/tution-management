<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tution extends CI_Controller {

    var $data;

    public function __construct() {
        parent::__construct();
        if ($this->session->user) {
            if ($this->session->user['role_name'] != 'admin') {
                redirect('login/forbidden'); // forbidden
            } else {
                $this->data['user'] = $this->session->user;
            }
        } else {
            redirect('login');
        }
    }

    /* index method list out all the tution available in the system */

    public function index() {
        $this->template->load('admin/Template', 'admin/tution/registration', $this->data);
    }
    // Manage tuition 
    public function manage_tution($type = '', $param1 = '', $param2 = '')
    {
        $this->data['title'] = 'Tuitions';
        $this->template->load('admin/Template', 'admin/tution/tuitionlist', $this->data);
    }
}