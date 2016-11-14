<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Me
 */
require_once 'auth.php';
class index extends auth 
{
    public function __construct() {
        parent::__construct();   
    }
    
    public function index() 
    {
        $this->template->load('tution/Template','index', $this->data);
    }
    
}
