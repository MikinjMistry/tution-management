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
    /*
     * Count tution by search string
     * @param String $str search string
     * @return
     *      success : Number of tution
    */
    public function count_tution_by_search($str)
    {
        $this->db->select('l.username,c.id, c.class_name');
        $this->db->from('classes c');
        $this->db->join('login l', 'c.user_id=l.id');
        if(!empty($likearr))
        {
            $this->db->group_start();
            $this->db->or_like('username', $str);
            $this->db->or_like('classname', $str);
            $this->db->group_end();
        }
        return count($this->db->get()->result_array());
    }
    /*
     * Get braches by class id
     * @param Integer $id class id
     * @return
     *      success : Array of branch detail    
    */
    public function get_branch_detial_by_class_id($id)
    {
        $this->db->where('class_id', $id);
        return $this->db->get('branch')->result_array();
    }
    /*
     * Get standerd by branch id
     * @param Integer $id branch id
     * @return 
     *      success : Array of standard detail
    */
    public function get_standard_by_branch_id($id)
    {
        $this->db->select('s.*,bs.id as bsid');
        $this->db->from('standard s');
        $this->db->join('branch_standard bs', 'bs.standard_id=s.id and bs.branch_id = '.$id);
        return $this->db->get()->result_array();
    }
    /*
     * Get term data by branch_standard id
     * @param Integer $id branch_standard id
     * @return
     *      success : Array of term detail
    */
    public function get_term_by_branch_standard_id($id)
    {
        $this->db->select('id,term_name');
        $this->db->from('term');
        $this->db->where('branch_standard_id',$id);
        return $this->db->get()->result_array();
    }
}
