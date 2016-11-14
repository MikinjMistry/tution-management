<?php

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->user) 
        {
            if ($this->session->user['role_name'] == 'admin') 
            {
                redirect('admin'); //forbidden
            }
            else if ($this->session->user['role_name'] == 'tution') 
            {
                redirect('tution'); //forbidden
            }
            else 
            {
                $this->data['user'] = $this->session->user;
            }
        } 
        $this->load->model("login_model");
    }

    public function index() 
    {
        $this->load->view("login");
    }

    public function chklogin() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $data = $this->login_model->checkLogin($username, $password);

        if (!empty($data)) {
            $this->session->set_userdata("user", $data);
            if ($data['role_name'] == 'admin') {
                redirect('admin');
            } 
            else {
                redirect("login");
            }
        } else {
            redirect("login");
        }
    }
    
    public function page_not_found()
    {
        $this->load->view('404');
    }
    
    public function forbidden(){
        $this->load->view('403');
    }
}
?>