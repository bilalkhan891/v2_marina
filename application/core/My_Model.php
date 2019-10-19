<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class My_Model extends CI_Model {

    public function insertRow($tbl,$data){
        $query = $this->db->insert($tbl, $data);
        if ($query) {
            return $this->db->insert_id();
        } 
    }



    public function insertRows($tbl,$data){
        $query = $this->db->insert_batch($tbl, $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }



    public function updateRow($tbl,$data,$where){

        $this->db->where($where);

        $query = $this->db->update($tbl, $data);

        if ($query) {

            return true;

        } else {

            return false;

        }

    }

    public function get_num_rows($tbl,$data,$where) {

        $this->db->where($where);

        $records = $this->db->from($tbl);
        $records = $this->db->count_all_results();
 
        return $records;

    }

    public function updateCount($tbl,$data,$where){

        $this->db->where($where);

        $this->db->set($data, null, FALSE);

        $query = $this->db->update($tbl);

        // echo_query();

        if ($query) {

            return true;

        } else {

            return false;

        }

    }



    function deleteRow($tbl,$where){

        $this->db->where($where); 
        $query = $this->db->delete($tbl);

        if ($query) {

            return true;

        } else {

            return false;

        }

    }



    function fetchAll($table, $data="*", $where=NULL,   $groupby=NULL, $order=NULL,   $joinarr=NULL, $limit=NULL, $start=NULL, $distinct=null){

        // $this->db->_protect_identifiers=false;

        if($distinct){

            if($data){

                $this->db->distinct();

                $this->db->select($data,false);

            }

        }else{

            if($data){

                $this->db->select($data,false);

            }

        }

        if($joinarr){

            // $this->db->join($joinarr['table'], $table.'.'.$joinarr['id'].' = '.$joinarr['table'].'.'.'id','left outer');

            // $this->db->join($joinarr);

            foreach ($joinarr as $k => $v){

                $this->db->join('crispinfox_'.$v['table'], $v['condition'], $v['jointype'],false);

            }

        }

        if($where){

            $this->db->where($where);

        }

        if($groupby){

            $this->db->group_by($groupby);

        }

        if($order){

            $this->db->order_by($order['by'], $order['order']);

        }

        if($limit){

            $this->db->limit($limit);

        }

        if($limit && $start){



            $this->db->limit($limit, $start);

        }



        $records = $this->db->get($table)->result();

        // echo_query();

        return $records;

    }



    function fetchArr($table, $data="*", $where=NULL,   $groupby=NULL, $order=NULL,   $joinarr=NULL, $limit=NULL, $start=NULL, $distinct=null){

        // $this->db->_protect_identifiers=false;

        if($distinct){

            if($data){

                $this->db->distinct();

                $this->db->select($data,false);

            }

        }else{

            if($data){

                $this->db->select($data,false);

            }

        }

        if($joinarr){

            // $this->db->join($joinarr['table'], $table.'.'.$joinarr['id'].' = '.$joinarr['table'].'.'.'id','left outer');

            // $this->db->join($joinarr);

            foreach ($joinarr as $k => $v){

                $this->db->join('crispinfox_'.$v['table'], $v['condition'], $v['jointype'],false);

            }

        }

        if($where){

            $this->db->where($where);

        }

        if($groupby){

            $this->db->group_by($groupby);

        }

        if($order){

            $this->db->order_by($order['by'], $order['order']);

        }

        if($limit){

            $this->db->limit($limit);

        }

        if($limit && $start){



            $this->db->limit($limit, $start);

        }



        $records = $this->db->get($table)->result_array();

        // echo_query();

        return $records;

    }





    public function generalQuery($value)

    {

        // code...

        $this->db->query($value);



    }



}

