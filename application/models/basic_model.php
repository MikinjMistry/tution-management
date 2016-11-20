<?php

class basic_model extends CI_Model {

    /**
     * insert
     *
     * insert functionality in specified table
     *
     * @param $table <-> string <-> specify table name of the database
     * @param $data <-> array[] <-> specify one dimensional array having key value pair where key specify field name of the database
     *
     * @return bool <-> false <-> If record not inserted
     * 		  int <-> last inserted primary key
     *
     */
    public function insert($table, $data) {
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    /**
     * insert_batch
     *
     * insert multiple record in specified table
     *
     * @param $table <-> string <-> specify table name of the database
     * @param $data <-> array[][] <-> specify teo dimensional array having key value pair where key specify field name of the database
     *
     * @return bool <-> false <-> If record not inserted
     * 		  int <-> number of record inserted
     *
     */
    public function insert_batch($table, $data) {
        return $this->db->insert_batch($table, $data);
    }

    /**
     * update
     *
     * update functionality in specified table
     *
     * @param $table <-> string <-> specify table name of the database
     * @param $data <-> array[] <-> An associative array of field/value pairs
     * @param $where <-> array[] <-> specify the field based on update is going to fire
     *
     * @return bool <-> false <-> If record not updated
     * 		           true <-> If record updated successfully
     *
     */
    public function update($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }

    /**
     * update_batch
     *
     * update functionality in specified table
     *
     * @param $table <-> string <-> specify table name of the database
     * @param $data <-> array[] <-> An associative array of field/value pairs
     * @param $field <-> string <-> specify the field based on update is going to fire
     *
     * @return bool <-> false <-> If record not updated
     * 		  int <-> true <-> Number of record that are updated
     *
     */
    public function update_batch($table, $data, $field) {
        return $this->db->update_batch($table, $data, $field);
    }

    /**
     * delete
     *
     * delete functionality in specified table
     *
     * @param $table <-> string <-> specify table name of the database
     * @param $where <-> array[] <-> specify the field based on delete is going to fire
     *
     * @return bool <-> false <-> If record not deleted
     * 		           true <-> If record deleted successfully
     *
     */
    public function delete($table, $where) {
        if (!$this->db->delete($table, $where)) {
            return false;
        }
        return true;
    }

    /**
     * delete_batch
     *
     * delete functionality in specified table
     *
     * @param $table <-> string <-> specify table name of the database
     * @param $field <-> string <-> specify field name of the database
     * @param $data <-> array[] <-> indexed array
     *
     * @return bool <-> false <-> If record not deleted
     * 		           true <-> If record deleted successfully
     *
     */
    public function delete_batch($table, $field, $data) {
        $this->db->where_in($field, $data);
        return $this->db->delete($table);
    }

    /**
     * @function SelectData($fields, $tables, $where = array(), $order = array(), $group=array(),$limit = "",$print_flag=0)
     * Select Data Query Function :  This function generate and excute the query for select clause and return the resultset for that
     * @param $fields : Array that have fields need to be selected
     * @param $tables : Array that have table names from which data should be selected
     * @param $where : Array that have all condition included which will get ANDed [optional] 
     * @param $order : Array that have all field names by which ordering should be done [optional] 
     * @param $group : Array that have all field names by which grouping should be done [optional]
     * @param $limit: This sets the limit values to the query .String type .Default blank. e.g. "0,3" [optional]
     * @param $print_flag : Print or unprint the query [optional]
      1 : Echo query
      0 : Do not echo
     * @return   : Resultset of the query
     * */
    /* function SelectData($fields, $tables, $where = array(), $order = array(), $group = array(), $limit = "", $offset = 0, $print_flag = 0)
      {
      $fields = implode(",", $fields);
      $tables = implode(",", $tables);
      if (!empty($where))
      {
      $where = implode(" AND ", $where);
      }
      if (!empty($order))
      {
      $order = implode(",", $order);
      }
      $group = implode(",", $group);

      if (!empty($fields))
      {
      $sql = "SELECT $fields FROM $tables ";
      }
      else
      {
      $sql = "SELECT * FROM $tables ";
      }

      if (!empty($where))
      {
      $sql .= ' WHERE ' . $where;
      }
      if (!empty($group))
      {
      $sql .= ' GROUP BY ' . $group;
      }
      if (!empty($order))
      {
      $sql .= ' ORDER BY ' . $order;
      }

      if (!empty($limit))
      {
      $sql .= ' LIMIT ' . $offset . "," . $limit;
      }

      if ($print_flag == 1)
      {
      echo($sql);
      }
      $result = $this->ExecuteQuery($sql); //Execute sql statement
      return $result;
      } */
}

?>