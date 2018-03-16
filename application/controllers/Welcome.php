<?php
//session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// ----------------load view 

	public function index()
	{
		//$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		$this->load->view('Welcome_message');

	}

	public function login()
	{
	//$this->load->library('form_validation');
		$this->load->view('login');
		$this->load->helper('url');
		
        $this->load->library('session');
		
	}

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}

	





	// ----------------load view , error msg 404


	public function view($page = 'home')
	{
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
		       // Whoops, we don't have a page for that!
		    show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}

	// ---------------- register , insert to datatbase using array $data 

	public function register()
	{
		$this->load->library('session');
				//print_r($this->input->post());
				//exit();
		//$this->load->helper(array('form', 'url'));
		  
            //$this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');
        //form validation
		/* $this->load->library('form_validation');
				
            $this->form_validation->set_rules('FName', 'Name', 'required|callback_username_check');
            $this->form_validation->set_rules('Email', 'Email', 'required|valid_email|is_unique[users.Email]');
            $this->form_validation->set_rules('Password', 'password', 'required');
            $this->form_validation->set_rules('Password', 'password', 'required');
*/
       /*    if ($this->form_validation->run() == FALSE)
        {
           $this->load->view('welcome_message');

        	echo "Failed" ;
        }
        else
        {
        	$this->load->view('admin_page');

        }*/

// insert to database

       	$this->load->model('Blog_model');

       	$config['upload_path']          = 'uploads/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);
                if (!empty($_FILES['userfile']['name'])) 

                {

	                if ( ! $this->upload->do_upload('userfile') && !isset($this->session->userdata['logged_in']))
	                {
	                        $error = array('error' => $this->upload->display_errors());

	                        $this->load->view('welcome_message', $error);
	                }
	                else
	                {
	                        $data = array('upload_data' => $this->upload->data());

	                        $this->load->view('formsuccess', $data);

	                        $file_name = $this->upload->data()['file_name'];

	                     //   $this->Blog_model->index($id,$full_file_path);
	                }

                }
                else
                {
                	$file_name =  1; 
                }


			$data = array(
			'fname'=> $this->input->post('FName'),
			 'lname'=> $this->input->post('LName'),
			  'email'=> $this->input->post('Email'),
			   'password'=> $this->input->post('Password'),
			    'gender'=> $this->input->post('optionsRadios'),
			     'birthday'	=> $this->input->post('Date'),
			      'file' => $file_name
				);
			$id = $this->Blog_model->insert_entry($data);
			$this->session->set_userdata($data);
			//$this->db->insert('users',$data);
			//return "test";
			if ($id != 0)
			{
			//echo $id;
			//echo "inserted";
			}
			else
			{
				echo "not inserted";
			}
        	//echo "Success" ;
            //$this->load->view('formsuccess');
            
            	
           /* $this->load->model('Blog_model');
			$data = array(
			'fname'=> $this->input->post('FName'),
			 'lname'=> $this->input->post('LName'),
			  'Email'=> $this->input->post('Email'),
			   'password'=> $this->input->post('Password'),
			    'gender'=> $this->input->post('optionsRadios'),
			     'birthday'	=> $this->input->post('Date'),
			      'path'	=> $file_name
				);
			$id = $this->Blog_model->insert_entry($data);
			
			//$this->db->insert('users',$data);
			//return "test";
			if ($id != 0)
			{
			echo $id;
			echo "inserted";
			
			}
			else
			{
				echo "no inserted";
			}
			*/
                //create array to load to database
	}

	public function username_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
			

	
	// ---------------- login in chech user and his password for database


	public function check_login()
	{
	 	 $this->load->library('session');
	 	 $this->load->library('form_validation');
	 	 $this->form_validation->set_rules('logemail', 'email', 'trim|required|xss_clean');
		 $this->form_validation->set_rules('logpassword', 'password', 'trim|required|xss_clean');
        /*$data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->user->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    redirect('users/account/');
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            }
        }
        //load the view
        //$this->load->view('users/login', $data);

        */
        $this->load->model('Blog_model');
        $data = array(
			  'Email'=> $this->input->post('logemail'),
			   'password'=> $this->input->post('logpassword'),
			   );
        

        $check = $this->Blog_model->check_login($data);
        $check2 = $this->Blog_model->check_admin_login($data);
       	echo $check2;
	  	if ($this->form_validation->run() == FALSE)
	  	{     
	        if ($check==true)
	        {
	        	/*$user_data = array(
	        	 'id'=> ,
				  	'logged_in'=>True,
				   );*/
				// Add user data in session
				$username = $this->input->post('logemail');
				//echo $username ;
				$result = $this->Blog_model->read_user_information($username);

				//print_r($result) ;
				//$this->session->set_userdata($user_data);

				$session_data = array(
				'fname' => $result[0]->fname,
				'lname' => $result[0]->lname,
				'email' => $result[0]->email,
				'file' 	=> $result[0]->file,
				);

				//print_r($session_data) ;

				$this->session->set_userdata('logged_in', $session_data);

	        	$this->load->view('user_page',$check);
	        	
	        }

	        else if ($check2==true)
	        {

	        	$this->admin();
	        	
				/*ob_start(); // ensures anything dumped out will be caught

				// do stuff here
				$url = 'local'; // this can be set based on whatever

				// clear out the output buffer
				while (ob_get_status()) 
				{
				    ob_end_clean();
				}

				// no redirect
				header( "Location: $url" );*/
				
	        
	        	
	    	}

	        else
	        {
	        	$data['error'] = 'Invalid Username or Password';
			
				$this->load->view('login', $data);
				//echo"wrong email or password";
			
	        }


    	}
	}



	protected function admin() 
	{

	//	$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('users');
				//$crud->set_relation('officeCode','offices','city');
		//$crud->display_as('officeCode','Office City');
		$crud->set_subject('users');
		$crud->set_field_upload('file','uploads/images/');

		//$crud->required_fields('lastName');

		
		$output = $crud->render();

		$this->_example_output($output);
	}


		public function user_login_process() 
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) 
			{
				if(isset($this->session->userdata['logged_in']))
				{
					$this->load->view('admin_page');
				}
				else
				{
					$this->load->view('login_form');
				}
			}
			else
			{
				$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
				$result = $this->login_database->login($data);
				if ($result == TRUE) 
				{

					$username = $this->input->post('username');
					$result = $this->login_database->read_user_information($username);
					if ($result != false) 
					{
						$session_data = array(
						'username' => $result[0]->user_name,
						'email' => $result[0]->user_email,
						);
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);
						$this->load->view('admin_page');
					}
				} 
				else 
				{
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login_form', $data);
				}
			}
		}







// ---------------- check email
			
	public function email_check($str)
	{
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0)
        {
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } 
        else
        {
            return TRUE;
        }
	}
	

		
	

// ---------------- Upload CV (Images only)

	public function write_post()
	{

		$this->load->view('write_post');



	}


	 
}


?>