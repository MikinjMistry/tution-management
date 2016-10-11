<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function index() {
        if($this->session->user)
        {
            $this->template->load('admin/Template', 'index');
        }
        else
        {
            redirect('login');
        }
    }

}
