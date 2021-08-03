<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_communes extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function index()
    {
            $this->load->view('admin/index_communes'); 

    }
	
  // DataTable data
    public function getTable()
    {

	//print_r($_POST);
    ## Read value
	
	 $start = 0;
     $rowperpage = 10;
	 
     //$draw = $this->input->get_post('draw', TRUE);
     // $row = $this->input->get_post('start', TRUE);
     //$rowperpage = $this->input->get_post('length', TRUE); // Rows display per page
	 
      $postData = $this->input->post();
	  
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value


    ## Search 
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = " and (name_ar like '%".$searchValue."%' or 
            name_en like '%".$searchValue."%' or 
            daira_id like'%".$searchValue."%' ) ";
    }

    ## Total number of records without filtering
    $sel = $this->db->query("select count(*) as allcount from communes");
    $records = $sel->row_array();
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = $this->db->query("select count(*) as allcount from communes WHERE 1 ".$searchQuery);
    $records = $sel->row_array();
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "select * from communes WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$start.",".$rowperpage;
    $empRecords = $this->db->query($empQuery);
    $data = array();

    foreach  ($empRecords->result_array() as $row) {

        
        $data[] = array(
                "name_ar" => $row['name_ar'],
                "name_en" => $row['name_en'],
                "id" => $row['id'],
            );
    }

    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
    exit;
}
// Fetch  wilayas
    public function Fetch_wilayas()
    {  
	
	$query = $this->db->query('SELECT * FROM wilayas');
    
	$response = array();
	

	foreach ($query->result_array() as $row){
		

        $response[]= array(
		    "id" => $row['id'],
            "name_ar" => $row['name_ar']

        );
       }   
       $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK))
        ->_display();  
	
  exit;
   }
// Fetch  dairas
    public function Fetch_dairas()
    {  
	
	$query = $this->db->query('SELECT * FROM dairas');
    
	$response = array();
	

	foreach ($query->result_array() as $row){
		

        $response[]= array(
		    "id" => $row['id'],
            "name_ar" => $row['name_ar']

        );
       }   
       $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK))
        ->_display();  
	
  exit;
   }

// Fetch  details
    public function Fetch()
    {    $id = 0;

    if($this->input->get_post('id')){
        $id = $this->db->escape_str($this->input->get_post('id'));
    }

    $record = $this->db->query("SELECT * FROM communes WHERE id=".$id);

    $response = array();

    if($record->num_rows() > 0){
        $row = $record->row_array();
        $response = array(
		    "id" => $row['id'],
			"daira_id" => $row['daira_id'],
            "name_ar" => $row['name_ar'],
            "name_en" => $row['name_en'],
            "latitude" => $row['latitude'],
			"longitude" => $row['longitude'],

        );

        echo json_encode( array("status" => 1,"data" => $response) );
        exit;
    }else{
        echo json_encode( array("status" => 0) );
        exit;
    }
}

// Update 
    public function Update()
{
    $id = 0;

    if($this->input->get_post('id')){
        $id = $this->db->escape_str($this->input->get_post('id'));
    }

    // Check id
    $record = $this->db->query("SELECT id FROM communes WHERE id=".$id);
    if($record->num_rows() > 0){
		
        $daira_id = $this->db->escape_str(trim($this->input->get_post('daira_id')));
        $name_ar = $this->db->escape_str(trim($this->input->get_post('name_ar')));
        $name_en = $this->db->escape_str(trim($this->input->get_post('name_en')));
        $latitude = $this->db->escape_str(trim($this->input->get_post('latitude')));
        $longitude = $this->db->escape_str(trim($this->input->get_post('longitude')));

        if( $name_ar != '' && $name_en != '' && $latitude != '' && $longitude != '' ){

            $this->db->query("UPDATE communes SET daira_id='".$daira_id."',name_ar='".$name_ar."',name_en='".$name_en."',latitude='".$latitude."',longitude='".$longitude."' WHERE id=".$id);

            echo json_encode( array("status" => 1,"message" => "تم التعديل بنجاح .") );
            exit;
        }else{
            echo json_encode( array("status" => 0,"message" => "لا تترك حقل فارغ.") );
            exit;
        }
        
    }else{
        echo json_encode( array("status" => 0,"message" => "Invalid ID.") );
        exit;
    }
}

// Delete 
    public function deletes()
     {
    $id = 0;

    if($this->input->get_post('id')){
        $id = $this->input->get_post('id');
    }

    // Check id
    $record = $this->db->query("SELECT id FROM communes WHERE id=".$id."");
	
    if($record->num_rows() > 0){

       // $this->db->query("DELETE FROM communes WHERE id=".$id."");
           $this->db->where('id', $id);
            $this->db->delete('communes');
        echo 1;
              exit;

    }else{
        echo 0;
              exit;

      }
    }

}
?>