<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Main_model extends CI_Model {


	public function __construct() {
		parent::__construct(); 
	}
    
	public function getData($rowno,$rowperpage,$search="") {
						
      $sql ="SELECT * FROM communes WHERE name_ar like '%" . $search. "%'";
     
	  $sql .= " OR name_en like '%" . $search . "%'";
		
       
        $sql.="limit ".$rowno.",".$rowperpage.""; 
		
		//$this->db->cache_on();
        //echo $sql ;
        $query = $this->db->query($sql);
 		

	  return $query->result_array();
	}

	// Select total records
    public function getrecordCount($search = '') {
     
	  $sql ="SELECT COUNT(*) AS cnt FROM communes WHERE name_ar like '%" . $search. "%'";
     
	  $sql .= " OR name_en like '%" . $search . "%'";
		
		
        $query = $this->db->query($sql);
         
		$row = $query->row();

      	return $row->cnt;
    }

}