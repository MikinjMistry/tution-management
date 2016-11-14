<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    var $data;

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        if ($this->session->user) {
            if ($this->session->user['role_name'] != 'admin') {
                redirect('403'); // forbidden
            } else {
                $this->data['user'] = $this->session->user;
            }
        } else {
            redirect('login');
        }
    }

    public function index() 
    {
        $this->template->load('admin/Template', 'index', $this->data);
    }

}
