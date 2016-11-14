<?php
/**
 * This controller is use for manage role of tution class.
 *
 * @author Me
 */
class auth extends CI_Controller
{
    var $data;
    public function __construct() 
    {
        parent::__construct();
        if ($this->session->user) 
        {
            if ($this->session->user['role_name'] != 'tution') 
            {
                redirect('login/forbidden'); //forbidden
            } 
            else 
            {
                $this->data['user'] = $this->session->user;
            }
        } 
        else 
        {
            redirect('login');
        }
    }
}
