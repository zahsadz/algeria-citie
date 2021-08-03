<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('text');
        $this->load->library('form_validation');
        $this->load->model('Admin_Model');
	    $this->load->model('User_model'); 
    }
    public function index() {
	
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
		  
         $data = array(); 
        if($this->session->userdata('isUserLoggedIn')){ 
        $con = array('id' => $this->session->userdata('userId') ); 
        $data['user'] = $this->User_model->getRows($con); 
		 }	
		    ## Total number of records without filtering
        $query = $this->db->query("select count(*) as allcount from wilayas");
        $records = $query->row_array();
        $data['willayas'] = $records['allcount'];
		
	    $query = $this->db->query("select count(*) as allcount from dairas");
        $records = $query->row_array();
        $data['dairas'] = $records['allcount'];
		
        $query = $this->db->query("select count(*) as allcount from communes");
        $records = $query->row_array();
        $data['communes'] = $records['allcount'];

		/*$this->db->query('
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY, 
			first_name varchar(100) ,
			last_name varchar(100) ,  
			email varchar(100) ,  
			password varchar(100) ,  
			gender varchar(100) ,  
			phone varchar(100) ,  
			created datetime(100) ,  
			modified datetime(100) ,  
			status int(11) 
        );');
		*/
		  
        $header['title'] = ' لوحة التحكم ';
        $this->load->view('admin/header',$header);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }
    public function communes() {
	
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }

        $header['title'] = 'admin commune';
        $data['result'] = $this->Admin_Model->get_all();
        //print_r($data['result']);
        $this->load->view('admin/header',$header);
        $this->load->view('admin/index_communes', $data);
        $this->load->view('admin/footer');
    }
	
    public function daira() {
	
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
        $header['title'] = 'admin daira ';
        $data['result'] = $this->daira_names();
        //print_r($data['result']);
        $this->load->view('admin/header',$header);
        $this->load->view('admin/index_daira', $data);
        $this->load->view('admin/footer');
    }
	
	public function willaya() {
	
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
        $header['title'] = 'admin daira ';
        $data['result'] = $this->wilaya_names();
        //print_r($data['result']);
        $this->load->view('admin/header',$header);
        $this->load->view('admin/index_willaya', $data);
        $this->load->view('admin/footer');
    }
	
    public function create_willaya() {
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
        $header['title'] = 'إضافة ولاية';
 
        $this->load->view('admin/header',$header);
        $this->load->view('admin/create_willaya');
        $this->load->view('admin/footer');
    }
 public function create_daira() {
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
        $header['title'] = 'إضافة دائرة';
		$data['wilaya'] = $this->wilaya_names();

        $this->load->view('admin/header',$header);
        $this->load->view('admin/create_daira',$data);
        $this->load->view('admin/footer');
    }
	 public function create_communes() {
		 
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
		  
          $header['title'] = 'إضافة بلدية';
		  
          $data['daira'] = $this->daira_names();

        $this->load->view('admin/header',$header);
        $this->load->view('admin/create_commune',$data);
        $this->load->view('admin/footer');
    }
	
    public function store_willaya() {
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }	
    $this->form_validation->set_rules('code', 'code', 'required');
	$this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('name_en', 'name_en', 'required');
    $this->form_validation->set_rules('name_ber', 'name_ber', 'required');
    $this->form_validation->set_rules('latitude', 'latitude', 'required');
    $this->form_validation->set_rules('longitude', 'longitude', 'required');

       $this->form_validation->set_message('required', 'الرجاء لا تترك حقل فارغ');

        if ($this->form_validation->run() == TRUE) {
			
           $data = array(
		   'postcode' => $this->input->post('code'),
		   'name_ar' => $this->input->post('name'),
           'name_en' => $this->input->post('name_en'),
           'name_ber' => $this->input->post('name_ber'),
           'latitude' => $this->input->post('latitude'),
           'longitude' => $this->input->post('longitude')
                );		
				
		   $this->db->insert('wilayas', $data);
			
           $this->session->set_flashdata('alert-class', 'alert-success');

           $this->session->set_flashdata('message', 'تم إضافة ولاية جديدة ');

            redirect(base_url('admin/willaya'));
			
        } else {
			
		   $this->session->set_flashdata('alert-class', 'alert-danger');

           $this->session->set_flashdata('message', 'الرجاء ملأ جميع الحقول');

          redirect(base_url('admin/create_willaya'));

        } 
    }
	public function store_daira() {
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }	
	$this->form_validation->set_rules('wilaya', 'wilaya', 'required');
	$this->form_validation->set_rules('code', 'code', 'required');
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('name_en', 'name_en', 'required');
    $this->form_validation->set_rules('name_ber', 'name_ber', 'required');
    $this->form_validation->set_rules('latitude', 'latitude', 'required');
    $this->form_validation->set_rules('longitude', 'longitude', 'required');

       $this->form_validation->set_message('required', 'الرجاء لا تترك حقل فارغ');

        if ($this->form_validation->run() == TRUE) {
			
           $data = array(
		   'wilaya_id' => $this->input->post('wilaya'),
		   'code' => $this->input->post('code'),
		   'name_ar' => $this->input->post('name'),
           'name_en' => $this->input->post('name_en'),
           'name_ber' => $this->input->post('name_ber'),
           'latitude' => $this->input->post('latitude'),
           'longitude' => $this->input->post('longitude')
                );		
				
		   $this->db->insert('dairas', $data);
			
           $this->session->set_flashdata('alert-class', 'alert-success');

           $this->session->set_flashdata('message', 'تم إضافة دائرة جديدة ');

            redirect(base_url('admin/daira'));
			
        } else {
			
		   $this->session->set_flashdata('alert-class', 'alert-danger');

           $this->session->set_flashdata('message', 'الرجاء ملأ جميع الحقول');

          redirect(base_url('admin/create_daira'));

        } 
    }
	public function store_commune() {
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }	
	$this->form_validation->set_rules('daira', 'daira', 'required');	  
    $this->form_validation->set_rules('code', 'code', 'required');
	$this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('name_en', 'name_en', 'required');
    $this->form_validation->set_rules('name_ber', 'name_ber', 'required');
    $this->form_validation->set_rules('latitude', 'latitude', 'required');
    $this->form_validation->set_rules('longitude', 'longitude', 'required');

       $this->form_validation->set_message('required', 'الرجاء لا تترك حقل فارغ');

        if ($this->form_validation->run() == TRUE) {
			
           $data = array(
		   'daira_id' => $this->input->post('daira'),
		   'code' => $this->input->post('code'),
		   'name_ar' => $this->input->post('name'),
           'name_en' => $this->input->post('name_en'),
           'name_ber' => $this->input->post('name_ber'),
           'latitude' => $this->input->post('latitude'),
           'longitude' => $this->input->post('longitude')
                );		
				
		   $this->db->insert('communes', $data);
			
           $this->session->set_flashdata('alert-class', 'alert-success');

           $this->session->set_flashdata('message', 'تم إضافة بلدية جديدة ');

            redirect(base_url('admin/communes'));
			
        } else {
			
		   $this->session->set_flashdata('alert-class', 'alert-danger');

           $this->session->set_flashdata('message', 'الرجاء ملأ جميع الحقول');

          redirect(base_url('admin/create_communes'));

        } 
    }
    public function edit_daira($id) {
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
        $header['title'] = 'تعديل دائرة ';
		$query = $this->db->query('SELECT * FROM dairas WHERE id = '.$id.' LIMIT 1');
        $data['city'] = $query->row_array();
		//print_r($data['city']);
		//echo $data['city'][0]['daira_id'];
        $data['daira'] = $this->daira_names();
		$data['wilaya'] = $this->wilaya_names();
		
        $data['daira_id_name'] = $this->daira_by_id($id);
		$wilaya_id =  $data['daira_id_name'][0]['wilaya_id'];
        // print_r($data['daira_id_name']);
		$data['wilaya_id_name'] = $this->wilaya_by_id($wilaya_id);

        $this->load->view('admin/header', $header);
        $this->load->view('admin/edit_daira', $data);
        $this->load->view('admin/footer');
    }
   public function update_daira($id) {
   	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
       $id_communes = $this->input->post('id');
 
       $this->form_validation->set_rules('name', 'name', 'required');
       $this->form_validation->set_rules('code', 'code', 'required');
       $this->form_validation->set_rules('name_en', 'name_en', 'required');
       $this->form_validation->set_rules('name_ber', 'name_ber', 'required');
       $this->form_validation->set_rules('latitude', 'latitude', 'required');
       $this->form_validation->set_rules('longitude', 'longitude', 'required');
       $this->form_validation->set_rules('wilaya', 'wilaya', 'required');

       $this->form_validation->set_message('required', 'الرجاء لا تترك حقل فارغ');

        if ($this->form_validation->run() == TRUE) {
			
           $data = array(
		   'wilaya_id' => $this->input->post('wilaya'),
		   'code' => $this->input->post('code'),
		   'name_ar' => $this->input->post('name'),
           'name_en' => $this->input->post('name_en'),
           'name_ber' => $this->input->post('name_ber'),
           'latitude' => $this->input->post('latitude'),
           'longitude' => $this->input->post('longitude')
                );		
				
            $this->update_dairas($id,$data);
			
           $this->session->set_flashdata('alert-class', 'alert-success');

           $this->session->set_flashdata('message', 'تم التعديل بنجاح ');

            redirect(base_url('admin/daira'));
			
        } else {
			
		   $this->session->set_flashdata('alert-class', 'alert-danger');

           $this->session->set_flashdata('message', 'الرجاء ملأ جميع الحقول');

          redirect(base_url('admin/edit_daira/'.$id.''));

        }
    }
	
    public function edit_communes($id) {
	 if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
        $header['title'] = 'تعديل بلدية ';
        $data['city'] = $this->Admin_Model->get_by_id($id);
		$daira_id = $data['city']->daira_id;
        $data['daira'] = $this->daira_names();
		$data['wilaya'] = $this->wilaya_names();
		
        $data['daira_id_name'] = $this->daira_by_id($daira_id);
		$wilaya_id =  $data['daira_id_name'][0]['wilaya_id'];
        // print_r($data['daira_id_name']);
		$data['wilaya_id_name'] = $this->wilaya_by_id($wilaya_id);

        $this->load->view('admin/header', $header);
        $this->load->view('admin/edit_communes', $data);
        $this->load->view('admin/footer');
    }

    public function update_communes($id) {
   	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
    $id_communes = $this->input->post('id');

    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('code', 'code', 'required');
    $this->form_validation->set_rules('name_en', 'name_en', 'required');
    $this->form_validation->set_rules('name_ber', 'name_ber', 'required');
    $this->form_validation->set_rules('latitude', 'latitude', 'required');
    $this->form_validation->set_rules('longitude', 'longitude', 'required');
    $this->form_validation->set_rules('daira', 'daira', 'required');
   // $this->form_validation->set_rules('wilaya', 'wilaya', 'required');

       $this->form_validation->set_message('required', 'الرجاء لا تترك حقل فارغ');

        if ($this->form_validation->run() == TRUE) {
			
           $data = array(
		   'daira_id' => $this->input->post('daira'),
		   'code' => $this->input->post('code'),
		   'name_ar' => $this->input->post('name'),
           'name_en' => $this->input->post('name_en'),
           'name_ber' => $this->input->post('name_ber'),
           'latitude' => $this->input->post('latitude'),
           'longitude' => $this->input->post('longitude')
          // 'wilaya' => $this->input->post('wilaya')
                );		
				
            $this->Admin_Model->update($id,$data);
			
           $this->session->set_flashdata('alert-class', 'alert-success');

           $this->session->set_flashdata('message', 'تم التعديل بنجاح ');

  
            redirect(base_url('admin/communes'));
			
        } else {
		   
		$this->session->set_flashdata('alert-class', 'alert-danger');

        $this->session->set_flashdata('message', 'الرجاء ملأ جميع الحقول');

        redirect(base_url('admin/edit_communes/'.$id.''));

        }
    }
	
   public function edit_willaya($id) {
	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
        $header['title'] = 'تعديل دائرة ';
		$query = $this->db->query('SELECT * FROM wilayas WHERE id = '.$id.' LIMIT 1');
        $data['city'] = $query->row_array();
		//print_r($data['city']);
		//echo $data['city'][0]['daira_id'];
        $data['daira'] = $this->daira_names();
		$data['wilaya'] = $this->wilaya_names();
		
       
		$data['wilaya_id_name'] = $this->wilaya_by_id($id);

        $this->load->view('admin/header', $header);
        $this->load->view('admin/edit_willaya', $data);
        $this->load->view('admin/footer');
    }
	
    public function update_willaya($id) {
		
   	if(!$this->session->userdata('isUserLoggedIn')){
      redirect('users/login');    
          }
    $id_communes = $this->input->post('id');

    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('code', 'code', 'required');
    $this->form_validation->set_rules('name_en', 'name_en', 'required');
    $this->form_validation->set_rules('name_ber', 'name_ber', 'required');
    $this->form_validation->set_rules('latitude', 'latitude', 'required');
    $this->form_validation->set_rules('longitude', 'longitude', 'required');

       $this->form_validation->set_message('required', 'الرجاء لا تترك حقل فارغ');

        if ($this->form_validation->run() == TRUE) {
			
           $data = array(
		   'postcode' => $this->input->post('code'),
		   'name_ar' => $this->input->post('name'),
           'name_en' => $this->input->post('name_en'),
           'name_ber' => $this->input->post('name_ber'),
           'latitude' => $this->input->post('latitude'),
           'longitude' => $this->input->post('longitude')
                );		
				
            $this->update_wilayas($id,$data);
			
           $this->session->set_flashdata('alert-class', 'alert-success');

           $this->session->set_flashdata('message', 'تم التعديل بنجاح ');

            redirect(base_url('admin/willaya'));
			
        } else {
			
		   $this->session->set_flashdata('alert-class', 'alert-danger');

           $this->session->set_flashdata('message', 'الرجاء ملأ جميع الحقول');

          redirect(base_url('admin/edit_willaya/'.$id.''));

        }
    }
    public function destroy($id) {
        $this->Admin_Model->delete($id);
        redirect(base_url('admin'));
    }
   
    public function daira_names() {
      $query = $this->db->query('SELECT * FROM dairas');
      return $query->result_array();
    }
	
    public function wilaya_names() {
      $query = $this->db->query('SELECT * FROM wilayas');
      return $query->result_array();
    }
	
    public function daira_by_id($daira_id) {
      $query = $this->db->query('SELECT * FROM dairas WHERE  id = '.$daira_id.'');
      return $query->result_array();
    }
	
    public function wilaya_by_id($wilaya_id) {
      $query = $this->db->query('SELECT * FROM wilayas WHERE  id = '.$wilaya_id.'');
      return $query->result_array();
    }
	
   public function update_dairas($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('dairas', $data);
    }
	
   public function update_wilayas($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('wilayas', $data);
    }
	
   public function delete_wilayas($id) {
           $this->db->where('id', $id);
           $this->db->delete('wilayas');
	   redirect(base_url('admin/willaya'));
	   
    }
   public function delete_dairas($id) {
           $this->db->where('id', $id);
           $this->db->delete('dairas');
	   redirect(base_url('admin/daira'));
	   
    }
	public function delete_communes($id) {
           $this->db->where('id', $id);
           $this->db->delete('communes');
	   redirect(base_url('admin/communes'));
	   
    }	
}