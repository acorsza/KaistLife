<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public $user;
	function __construct()
	{
		parent::__construct();
	   
		$this->load->model('user_m','',TRUE);
		
	   
	}
	public function index()
	{
	
	}


	private function session_check() {

		// Check if user is logged in

		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			return $session_data; // Return array of user's data
		} else {
			$session_data['username'] = null;
			return $session_data; 
			
		}
	}




	public function create() 
	{
		//date_default_timezone_set('Asia/Seoul');
		
		if($this->input->post('username') == "" || $this->input->post('username') == null){
			echo "<script>alert('User can not be null');</script>";
			redirect('home','refresh');
		} elseif($this->input->post('email') == "" || $this->input->post('email') == null){
			echo "<script>alert('Email can not be null');</script>";
			redirect('home','refresh');
		} elseif($this->input->post('password') == "" || $this->input->post('password') == null){
			echo "<script>alert('Password can not be null');</script>";
			redirect('home','refresh');
		} elseif(strpos($this->input->post('email'),'@kaist.ac.kr') === false){
			echo "<script>alert('You must be a KAIST student to register');</script>";
			redirect('home','refresh');
		} else {
			date_default_timezone_set('Asia/Seoul');
			$user['username'] = $this->input->post('username');
			$user['email'] = $this->input->post('email');
			$user['created_at'] = date('Y-m-d H:i:s');
			$user['password'] = MD5($this->input->post('password'));
            $result = $this->user_m->insert_user($user);
                if($result == null){
                    echo "<script>alert('User already registered');</script>";
                    redirect('home','refresh');
                } else {
                    echo "<script>alert('User succesfully registered');</script>";
                    redirect('home','refresh');
                }
		}              
                
	}

	public function verify_login()
	{
		//$lang = $this->english->load_lang();
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
			//$this->load->model('home_m');
			//Field validation failed.  User redirected to login page
			redirect('home', 'refresh');
		}
		else
		{
			//Go to private area
			redirect('home', 'refresh');
		}
	}

	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$email = $this->input->post('email');

		//query the database
		$result = $this->user_m->login($email, $password);
		if($result)
		{
		$sess_array = array();
		foreach($result as $row)
		{
			$sess_array = array(
			'iduser' => $row->iduser,
			'email' => $row->email,
			'username' => $row->username
			);
			$this->session->set_userdata('logged_in', $sess_array);
		}
		return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}

		
	}

	public function logout(){
		session_start(); 
		
		$this->session->unset_userdata('logged_in');

		session_destroy();
	   
		redirect('home', 'refresh');
	}


	public function show(){

		// Check session
		$session = $this->session_check();
		$data['username'] = $session['username'];
		$data['iduser']  = $session['iduser'];
		$data['email']  = $session['email'];

		$this->load->model('user_m');
		$this->load->model('question_m');

		$data['userinfo'] = $this->user_m->get_user_info($session['iduser']);
		$data['my_question_list'] = $this->question_m->get_my_questions($session['iduser']);

		$data['countrylist'] = '';
		$data['img_facebook'] = '';                             

		// Load view
		$lang = $this->english->load_lang();
		$this->load->view('header',$lang);
		$this->load->view('nav',$session);
		$this->load->view('user_profile', $data);
		$this->load->view('footer');


	}


public function save(){

			$session_data = $this->session_check();
			$data['iduser'] 	= $session_data['iduser'];
			$data['username'] 	= $this->input->post('username');
			$data['email']    	= $this->input->post('email');

			$oldPassword = MD5($this->input->post('oldPassword'));

			if($this->input->post('alterPass') == 'true'){
				$user['userinfo'] = $this->user_m->get_user_info($session_data['iduser']);

				if($user['userinfo'][0]->password == $oldPassword){
					$data['password'] = MD5($this->input->post('newPassword'));
				}
				else{
					echo  'false';
				}
			}

			//Model to insert user in the database
			$this->load->model('user_m');
			$this->user_m->update_user($data);
		}






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */