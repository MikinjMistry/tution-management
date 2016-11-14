<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tution extends CI_Controller {

    var $data;

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
        $this->load->model('basic_model', 'basic');
        $this->load->model('tution_model', 'tution');
    }

    /* index method list out all the tution available in the system */

    public function index() {
        $this->template->load('admin/Template', 'admin/tution/registration', $this->data);
    }
    // Manage tuition 
    public function manage_tution($type = '', $param1 = '', $param2 = '')
    {
        if($type == 'get')
        {
            $col = [
                      'username',
                      'class_name',
                      ''
                   ];
            $dir = $this->input->post('order[0][dir]');
            $field = $col[$this->input->post('order[0][column]')];
            $cnt = $this->tution->count_class_data();
            $start = $this->input->post('start');
            $end = $this->input->post('length');
            $likearr = [];
            $ser = $this->input->post('search[value]');
            $sercnt = 0;
            if(!empty($ser))
            {
                $likearr['username'] = $likearr['class_name'] = $ser;
                $sercnt = $this->tution->count_tution_by_search($ser);
            }
            $result = $this->tution->get_all_class($end, $start,$field,$dir, $likearr);
            $data['recordsTotal'] = !empty($ser) ? $sercnt : $cnt;
            $data['recordsFiltered'] = !empty($ser) ? count($result) : $cnt;
            $data['data'] = [];
            foreach ($result as $row)
            {
                $data['data'][] = [
                    $row['username'],
                    $row['class_name'],
                    '<a href="admin/tutions/delete/'.$row['id'].'" onclick="return confirm(\'Are you sure you want to Delete?\')"><i class="fa fa-remove"></i></a>&nbsp;'.
                    '<a href="javascript:;" id="'.$row['id'].'" class="branch_view" title="view branches"><i class="fa fa-building-o"></i></a>'
                ];
            }
            echo json_encode($data);
            die;
        }
        else if($type == 'delete')
        {
            $this->basic->delete('classes', ['id' => $param1]);
            redirect('admin/tutions');
            die;
        }
        else if($type == 'branch')
        {
            $data['tution'] = $this->tution->get_branch_detial_by_class_id($param1);
            echo $this->load->view('admin/partial/branchlist', $data, true);
            die;
        }
        $this->data['title'] = 'Tuitions';
        $this->template->load('admin/Template', 'admin/tution/tuitionlist', $this->data);
    }
}