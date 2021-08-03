<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Users extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 
        $this->load->library('form_validation'); 
        $this->load->model('User_model'); 
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
    } 
     
    public function index(){ 
        if($this->isUserLoggedIn){ 
            redirect('users/account'); 
        }else{ 
            redirect('users/login'); 
        } 
    } 
 
    public function account(){ 
        $data = array(); 
        if($this->isUserLoggedIn){ 
            $con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->User_model->getRows($con); 
          
		   $data['title'] = 'حسابي'; 

            // Pass the user data and load view 
            $this->load->view('header', $data); 
            $this->load->view('users/account', $data); 
            $this->load->view('home_footer'); 
        }else{ 
            redirect('users/login'); 
        } 
    } 
 
    public function login(){ 
        $data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        // If login request submitted 
        if($this->input->post('loginSubmit')){ 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'email'=> $this->input->post('email'), 
                        'password' => md5($this->input->post('password')), 
                        'status' => 1 
                    ) 
                ); 
                $checkLogin = $this->User_model->getRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isUserLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']); 
                    redirect('users/account/'); 
                }else{ 
                    $data['error_msg'] = 'بريد إلكتروني أو كلمة السر  خاطئة .'; 
                } 
            }else{ 
                $data['error_msg'] = ' الرجاء ملأ جميع النموذج .'; 
            } 
        } 
      
    	  $data['title'] = 'تسجيل الدخول'; 

        // Load view 
        $this->load->view('header', $data); 
        $this->load->view('users/login', $data); 
        $this->load->view('home_footer'); 
    } 
 
    public function registration(){ 
        $data = $userData = array(); 
         
        // If registration request is submitted 
        if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
 
            $userData = array( 
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')), 
                'gender' => $this->input->post('gender'), 
                'phone' => strip_tags($this->input->post('phone')),
				'status' => 1 
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->User_model->insert($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'أنت الأ ن مسجل بالموقع قم بتسجيل الدخول'); 
                    redirect('users/login'); 
                }else{ 
                    $data['error_msg'] = 'حذث مشكل الرجاء إعادة المحاولة.'; 
                } 
            }else{ 
                $data['error_msg'] = 'ملأ جميع النموذج .'; 
            } 
        } 
         
        // Posted data 
        $data['user'] = $userData; 
        $data['title'] = 'فتح حساب'; 

        // Load view 
        $this->load->view('header', $data); 
        $this->load->view('users/registration', $data); 
        $this->load->view('home_footer'); 
    } 
     
    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('users/login'); 
    } 
     
     
    // Existing email check during validation 
    public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->User_model->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'هذا البريد الإلكتروني موجود مسبقا بقاعدة البيانات حاول ببريد أخر.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 
}
