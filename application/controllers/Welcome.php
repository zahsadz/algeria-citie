<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
    public function __construct(){
		
        parent::__construct();

		$this->load->model('Main_model');
	}
		public function load_data()
	{
		$this->load->library('datatables_server_side', array(
			'table' => 'wilayas',
			'primary_key' => 'id',
			'columns' => array('name_ar', 'name_en'),
			//'where' => array()
		));

		$this->datatables_server_side->process();
	}
	public function index()
	{
		//echo 'sqlite:' . APPPATH . 'db/database.db';
		
		$query = $this->db->query('SELECT * FROM wilayas');
        $data['wilayas'] = $query->result_array();
        $header['title'] ='ولايات و دوائر و جميع بلديات الجزائر';
		$data['seotitle'] = 'ولايات و دوائر و جميع بلديات الجزائر';
		
		$data['name_ar'] = '';
		$data['latitude'] = '';
		$data['longitude'] = '';

		$this->load->view('header',$header);
		$this->load->view('home',$data);
		$this->load->view('home_footer');
	}
	
	public function wilaya($_id)
	{
	/*$this->db->select ( '*' ); 
    $this->db->from ( 'wilayas' );
    $this->db->join ( 'dairas', 'wilayas.id = dairas.wilaya_id' , 'left' );
   // $this->db->join ( 'communes', 'dairas.id = communes.daira_id' , 'left' );
	$this->db->where ( 'wilayas.id', $_id);

    $query = $this->db->get ();
    print_r( $query->result ());
	*/
	/*
	$this->db->select('*');
    $this->db->from('dairas a'); 
    $this->db->join('wilayas b', 'b.id=a.wilaya_id', 'left');
    $this->db->join('communes c', 'c.daira_id=a.id', 'left');
    $this->db->where('c.id',$_id);
    $this->db->order_by('c.name_ar','asc'); 
	$query = $this->db->get(); 
    print_r($query->result_array());
	*/	
		/*  $this->db->select('c.name_ar as wlname ,c.id as idwl ,t.name_ar,t.wilaya_id,t.id');
            $this->db->from('wilayas as c');
          $this->db->from('dairas as t');
		  		$this->db->where('c.id', $_id);
		$this->db->where('t.wilaya_id', $_id);
           $query = $this->db->get();
        print_r($query->result());
          */
		/*
		$this->db->select('c.name_ar as wn ,t.name_ar');
        $this->db->from('wilayas as c');
        $this->db->from('dairas as t');
		$this->db->where('c.id', $_id);
		$this->db->where('t.wilaya_id', $_id);
        $query = $this->db->get();
        print_r($query->result());
		*/
	 
		$query = $this->db->query('SELECT * FROM wilayas WHERE  id = '.$_id.'');
		$wilayas = $query->result_array();
        $data['wilayas'] = $wilayas;
		$header['title'] = 'جميع دوائر ولاية '.$wilayas[0]['name_ar'];
		$data['seotitle'] = 'جميع دوائر ولاية '.$wilayas[0]['name_ar'];
		$data['name_wilayas'] = ''.$wilayas[0]['name_ar'];
		$data['name_en'] = ''.$wilayas[0]['name_en'];
		$data['name_ber'] = ''.$wilayas[0]['name_ber'];
		$data['name_ar'] = ''.$wilayas[0]['name_ar'];

		$data['wilaya_id'] = ''.$wilayas[0]['id'];
		$data['latitude'] = ''.$wilayas[0]['latitude'];
		$data['longitude'] = ''.$wilayas[0]['longitude'];

		$dairas_query = $this->db->query('SELECT * FROM dairas WHERE  wilaya_id = '.$_id.'');
		$data['dairas'] = $dairas_query->result_array();
		
		$this->load->view('header',$header);
		$this->load->view('wilaya',$data);
		$this->load->view('footer');
	}

	public function dairas($_id)
	{
		
		$querydairas = $this->db->query('SELECT * FROM dairas WHERE  id = '.$_id.'');
		$dairas = $querydairas->result_array();
		$wilaya_id = $dairas[0]['wilaya_id'];
        $name_daira = $dairas[0]['name_ar'];
        $latitude_daira = $dairas[0]['latitude'];
        $longitude_daira = $dairas[0]['longitude'];
        $data['dairas'] = $dairas;
		$header['title'] = 'بلديات دائرة '.$dairas[0]['name_ar'];
		$data['seotitle'] = 'بلديات دائرة '.$dairas[0]['name_ar'];
		$data['name_daira'] = $dairas[0]['name_ar'];
		$data['name_en'] = ''.$dairas[0]['name_en'];
		$data['name_ber'] = ''.$dairas[0]['name_ber'];
		$data['name_ar'] = ''.$dairas[0]['name_ar'];

		$data['id_daira'] = $dairas[0]['id'];
		$data['latitude'] = ''.$dairas[0]['latitude'];
		$data['longitude'] = ''.$dairas[0]['longitude'];

		$wilayas_query = $this->db->query('SELECT * FROM wilayas WHERE  id = '.$wilaya_id.'');
		$wilayas = $wilayas_query->result_array();
		$data['wilayas'] = $wilayas;
		$data['name_wilayas'] = $wilayas[0]['name_ar'];
		$data['wilaya_id'] = $wilaya_id;

		$dairas_query = $this->db->query('SELECT * FROM communes WHERE  daira_id = '.$_id.'');
		$data['communes'] = $dairas_query->result_array();
		
		$this->load->view('header',$header);
		$this->load->view('dairas',$data);
		$this->load->view('footer');
	}
	public function communes($_id)
	{
	/*	$this->db->select('*');
    $this->db->from('communes'); 
    $this->db->join('dairas', 'dairas.id=communes.daira_id');
    $this->db->join('wilayas', 'wilayas.id=dairas.wilaya_id');
    $this->db->where('communes.id',$_id);
    //$this->db->order_by('c.name_ar','asc'); 
		$query = $this->db->get(); 
        print_r($query->result_array());
	*/		
	/*	  $this->db->select('c.name_ar as wlname ,c.id as idwl ,t.name_ar as dan,t.wilaya_id,t.id as iddda,w.name_ar as wnnn ,w.id as wdddd');
            $this->db->from('communes as c');
    $this->db->join('dairas t', 't.id=c.daira_id');
    $this->db->join('wilayas w', 'w.id=t.wilaya_id');

		  $this->db->where('c.id', $_id);
           $query = $this->db->get();
        print_r($query->result());
     */     	
	/*	
	$this->db->select('*');
    $this->db->from('communes a'); 
    $this->db->join('dairas b', 'b.id=a.daira_id', 'left');
    $this->db->join('wilayas c', 'c.id=b.wilaya_id', 'left');
    $this->db->where('a.id',$_id);
    //$this->db->order_by('c.name_ar','asc'); 
	$query = $this->db->get(); 
     print_r($query->result_array());
	*/	
		/*
	$this->db->select('*');
    $this->db->from('dairas a'); 
    $this->db->join('wilayas b', 'b.id=a.wilaya_id', 'left');
    $this->db->join('communes c', 'c.daira_id=a.id', 'left');
    $this->db->where('c.id',$_id);
    $this->db->order_by('c.name_ar','asc'); 
		$query = $this->db->get(); 
        print_r($query->result_array());
		*/
		$query_communes = $this->db->query('SELECT * FROM communes WHERE id = '.$_id.'');
		$communes = $query_communes->result_array();
		$communes_id = $communes[0]['id'];
		$daira_id = $communes[0]['daira_id'];
        $name_communes = $communes[0]['name_ar'];
        $latitude_communes = $communes[0]['latitude'];
        $longitude_communes = $communes[0]['longitude'];
        $data['communes'] = $communes;
		$header['title'] = 'بلدية '.$communes[0]['name_ar'];
		$data['seotitle'] = 'بلدية '.$communes[0]['name_ar'];
		$data['name_en'] = ''.$communes[0]['name_en'];
		$data['name_ber'] = ''.$communes[0]['name_ber'];
		$data['name_ar'] = ''.$communes[0]['name_ar'];

		$data['daira_id'] = $daira_id;
		$data['communes_id'] = $communes_id;
		$data['name_communes'] = $name_communes;
		$data['latitude'] = ''.$communes[0]['latitude'];
		$data['longitude'] = ''.$communes[0]['longitude'];

		$dairas_query = $this->db->query('SELECT * FROM dairas WHERE  id = '.$daira_id.'');
		$dairas = $dairas_query->result_array();
		$data['dairas'] = $dairas;
		$wilaya_id = $dairas[0]['wilaya_id'];
        $name_daira = $dairas[0]['name_ar'];
		$data['wilaya_id'] = $wilaya_id;
		$data['name_daira'] = $name_daira;

		$wilayas_query = $this->db->query('SELECT * FROM wilayas WHERE  id = '.$wilaya_id.'');
		$wilayas = $wilayas_query->result_array();
		$data['wilayas'] = $wilayas;
        $name_wilayas = $wilayas[0]['name_ar'];
		$data['name_wilayas'] = $name_wilayas;
		
		$this->load->view('header',$header);
		$this->load->view('communes',$data);
		$this->load->view('footer');
	}
	public function search($rowno = 0){
		
        //    print_r($_POST);
	    //echo $this->input->post('qword');
		// Search text
		$search_text = " ";

		//$search_text = isset($_POST['qword']) ? $_POST['qword'] : NULL;
         //$this->input->get_post('qword');

		if($this->input->post('submit') != NULL ){
			$search_text = $this->input->post('qword');
			$this->session->set_userdata(array("qword"=>$search_text));
		}else{
			if($this->session->userdata('qword') != NULL){
				$search_text = $this->session->userdata('qword');
			}
		}
		
		

		// Row per page
		$rowperpage = 10;
		
	    
      	// All records count
      	$allcount = $this->Main_model->getrecordCount($search_text);

      	// Get  records
      	$users_record = $this->Main_model->getData($rowno,$rowperpage,$search_text);
      	 
      	// Pagination Configuration
      	$config['base_url'] = base_url().'/search/';
      	//$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
        //$config['page_query_string'] = TRUE;


		// Initialize
        $config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='page-item disabled'><li class='page-item active'><a class='page-link' href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['first_url'] = '';
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['next_link'] = '&gt;&gt;';
        $config['prev_link'] = '&lt;&lt;';
        $config['first_link'] = 'الأولي';
        $config['last_link'] = 'الأخيرة';
        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $rowno;
	    $data['allcount'] = $allcount;
		$data['search'] = $search_text;
       //$this->output->cache(1);
        $data['seotitle'] = ''.$search_text.'';
        $header['Description'] = ''.$search_text.' ';
        $header['Keywords'] = ''.$search_text.' ';
        $header['title'] = ''.$search_text.' ';
		$this->load->view('header',$header);
		$this->load->view('search',$data);
		$this->load->view('search_footer');	
	}
	public function fetch()
	 {
		//$this->output->set_content_type('Content-Type: application/json; charset=utf-8');
 
		//echo 'sqlite:' . APPPATH . 'db/database.db';
		$request = $this->input->get('query');
		//$request = $this->input->post('query');
		$request = strtolower(urlencode($request));
        $request = urldecode($request);

		$query = $this->db->query("select name_en,name_ar from communes where name_en LIKE '%".$request."%' or name_ar LIKE '%".$request."%' limit 0,10");
        $result = $query->result_array();
		
        $data = array();
        $data2 = array();

        foreach($result as $row ){
			$data[] = $row["name_ar"];
            $data2[] = $row["name_en"];
			//$data3['status'] = 'OK';
        }
       //$response = array('status' => 'OK');
       $response = array_merge($data, $data2);
  echo json_encode($response);

      /* $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK))
        ->_display();*/
exit;
	}	
}
