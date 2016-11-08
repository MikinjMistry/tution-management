<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tution_model
 *
 * @author siddharth
 */
class tution_model extends CI_Model
{
    /*
     * Count class data
     * @return
     *      success : Number of class data
    */
    public function count_class_data()
    {
        return $this->db->count_all('classes');
    }
    /*
     * Get all classes data
     * @param Integer $limit Number of records
     * @param Integer $start Offset for limit
     * @param String $field column which will be sorted
     * @param String $dir Sorting criteria
     * @param Array $likearr Searching criteria
     * @return
     *      success : Array of class data
    */
    public function get_all_class($limit, $start, $field = 'id', $dir = 'desc', $likearr)
    {
        $this->db->select('l.username,c.id, c.class_name');
        $this->db->from('classes c');
        $this->db->join('login l', 'c.user_id=l.id');
        if(!empty($likearr))
        {
            $this->db->group_start();
            $this->db->or_like($likearr);
            $this->db->group_end();
        }
        $this->db->limit($start, $limit);
        $this->db->order_by($field, $dir);
        return $this->db->get()->result_array();
    }
}
