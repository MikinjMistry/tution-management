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
        $this->load->model('login_model', 'login');
    }

    /* index method list out all the tution available in the system */

    public function index() {
        $this->template->load('admin/Template', 'admin/tution/registration', $this->data);
    }

    // Manage tuition 
    public function manage_tution($type = '', $param1 = '', $param2 = '') {
        // Add tution
        if ($type == 'add') {
            if ($this->input->post()) {
                $password = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8 / strlen($x)))), 1, 8);
                // Insert tution class
                $login_user = array(
                    'username' => $this->input->post('username'),
                    'password' => $password,
                    'role_id' => 2
                );
                if ($login_id = $this->basic->insert('login', $login_user)) {
                    // Insert class
                    $class = array(
                        'user_id' => $login_id,
                        'class_name' => $this->input->post('class_name')
                    );
                    if ($class_id = $this->basic->insert('classes', $class)) {
                        // Insert branch
                        $branch_arr = array(
                            'class_id' => $class_id,
                            'address' => $this->input->post('address'),
                            'establishment_year' => $this->input->post('established_year')
                        );
                        if ($branch_id = $this->basic->insert('branch', $branch_arr)) {
                            // Insert Email and contact
                            if ($email_id = $this->basic->insert('email', ['email_id' => $this->input->post('email')])) {
                                $this->basic->insert('branch_email', ['branch_id' => $branch_id, "email_id" => $email_id]);
                            }
                            if ($contact_id = $this->basic->insert('contact', ['number' => $this->input->post('contact_number')])) {
                                $this->basic->insert('branch_contact', ['branch_id' => $branch_id, "contact_id" => $contact_id]);
                            }
                        }
                        
                    }
                }
                redirect('/admin/tutions');
            } else {
                // Load page for adding tution
                $this->template->load('admin/Template', 'admin/tution/registration', $this->data);
            }
        } else if ($type == 'get') {
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
            if (!empty($ser)) {
                $likearr['username'] = $likearr['class_name'] = $ser;
                $sercnt = $this->tution->count_tution_by_search($ser);
            }
            $result = $this->tution->get_all_class($end, $start, $field, $dir, $likearr);
            $data['recordsTotal'] = !empty($ser) ? $sercnt : $cnt;
            $data['recordsFiltered'] = !empty($ser) ? count($result) : $cnt;
            $data['data'] = [];
            foreach ($result as $row) {
                $data['data'][] = [
                    $row['username'],
                    $row['class_name'],
                    '<a href="admin/tutions/delete/' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to Delete?\')"><i class="fa fa-remove"></i></a>&nbsp;' .
                    '<a href="javascript:;" id="' . $row['id'] . '" class="branch_view" title="view branches"><i class="fa fa-building-o"></i></a>'
                ];
            }
            echo json_encode($data);
            die;
        } else if ($type == 'delete') {
            $this->basic->delete('classes', ['id' => $param1]);
            redirect('admin/tutions');
            die;
        } else if ($type == 'branch') {
            $data['tution'] = $this->tution->get_branch_detial_by_class_id($param1);
            echo $this->load->view('admin/partial/branchlist', $data, true);
            die;
        } else if ($type == 'standard') {
            $data['standard'] = $this->tution->get_standard_by_branch_id($param1);
            echo $this->load->view('admin/partial/standardlist', $data, true);
            die;
        } else if ($type == 'term') {
            $data['term'] = $this->tution->get_term_by_branch_standard_id($param1);
            echo $this->load->view('admin/partial/termlist', $data, true);
            die;
        } else {
            $this->data['title'] = 'Tuitions';
            $this->template->load('admin/Template', 'admin/tution/tuitionlist', $this->data);
        }
    }

}
