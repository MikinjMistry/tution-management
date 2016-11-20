<?php

class login_model extends CI_Model {

    public function checkLogin($username, $password) {
        $this->db->select("l.id,l.username,r.role_name");
        $this->db->from("login l");
        $this->db->join("role r", 'r.id = l.role_id', 'left');
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get()->row_array();
    }
}

?>