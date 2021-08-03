<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_test extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
      public function home()
    {
            $this->load->view('datatables_test2'); 

    }
    public function index()
    {
            $this->load->view('datatables_test'); 

    }
	
  // DataTable data
    public function getTable()
    {

	//print_r($_POST);
    ## Read value
	
	 $row = 0;
     $rowperpage = 10;
	 
     $draw = $this->input->get_post('draw', TRUE);
     $row = $this->input->get_post('start', TRUE);
     $rowperpage = $this->input->get_post('length', TRUE); // Rows display per page

 	$columnIndex = isset($_POST['order'][0]['column']) ? $_POST['order'][0]['column']: 0;  

   $columnName = isset($_POST['columns'][$columnIndex]['data'])? $_POST['columns'][$columnIndex]['data']: 'name'; // Column name
   
    $columnSortOrder = isset($_POST['order'][0]['dir'])? $_POST['order'][0]['dir']: 'asc'; // asc or desc
 
    $searchValue = $this->db->escape_str(isset($_POST['search']['value']))? $_POST['search']['value']: 'ba'; // Search value
 
    //    $searchValue = $this->input->get_post('sSearch', true);


    ## Search 
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = " and (name_ar like '%".$searchValue."%' or 
            name_en like '%".$searchValue."%' or 
            wilaya_id like'%".$searchValue."%' ) ";
    }

    ## Total number of records without filtering
    $sel = $this->db->query("select count(*) as allcount from dairas");
    $records = $sel->row_array();
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = $this->db->query("select count(*) as allcount from dairas WHERE 1 ".$searchQuery);
    $records = $sel->row_array();
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "select * from dairas WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
    $empRecords = $this->db->query($empQuery);
    $data = array();

    foreach  ($empRecords->result_array() as $row) {

        // Update Button
        $updateButton = "<button class='btn btn-sm btn-info updateUser' data-id='".$row['id']."' data-toggle='modal' data-target='#updateModal' >تعديل</button>";

        // Delete Button
        $deleteButton = "<button class='btn btn-sm btn-danger deleteUser' data-id='".$row['id']."'>حذف</button>";
        
        $action = $updateButton." ".$deleteButton;

        $data[] = array(
                "name_ar" => $row['name_ar'],
                "name_en" => $row['name_en'],
                "id" => $row['id'],
				 "notice" => $columnName,
               // "defaultContent" => '<button>Click!</button>'
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

    $record = $this->db->query("SELECT * FROM dairas WHERE id=".$id);

    $response = array();

    if($record->num_rows() > 0){
        $row = $record->row_array();
        $response = array(
		    "id" => $row['id'],
			"wilaya_id" => $row['wilaya_id'],
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
    $record = $this->db->query("SELECT id FROM dairas WHERE id=".$id);
    if($record->num_rows() > 0){
		
        $wilaya_id = $this->db->escape_str(trim($this->input->get_post('wilayas')));
        $name_ar = $this->db->escape_str(trim($this->input->get_post('name_ar')));
        $name_en = $this->db->escape_str(trim($this->input->get_post('name_en')));
        $latitude = $this->db->escape_str(trim($this->input->get_post('latitude')));
        $longitude = $this->db->escape_str(trim($this->input->get_post('longitude')));

        if( $name_ar != '' && $name_en != '' && $latitude != '' && $longitude != '' ){

            $this->db->query("UPDATE dairas SET wilaya_id='".$wilaya_id."',name_ar='".$name_ar."',name_en='".$name_en."',latitude='".$latitude."',longitude='".$longitude."' WHERE id=".$id);

            echo json_encode( array("status" => 1,"message" => "Record updated.") );
            exit;
        }else{
            echo json_encode( array("status" => 0,"message" => "Please fill all fields.") );
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
    $record = $this->db->query("SELECT id FROM dairas WHERE id=".$id."");
	
    if($record->num_rows() > 0){

       // $this->db->query("DELETE FROM dairas WHERE id=".$id."");
           $this->db->where('id', $id);
            $this->db->delete('dairas');
        echo 1;
              exit;

    }else{
        echo 0;
              exit;

      }
    }

}
?>