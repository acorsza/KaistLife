<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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

	public function index()
	{	
		$this->load->model('question_m');
		$session = $this->session_check();
		$data['question_na_list'] = $this->question_m->get_questions_not_answered();
		$data['question_top_list'] = $this->question_m->get_top_questions();
                $data['daejeon_list'] = $this->question_m->get_daejeon_questions();
                $data['academic_list'] = $this->question_m->get_academic_questions();
                $data['campus_list'] = $this->question_m->get_campus_questions();
                
                
		if($session['username']){
			$data['my_question_list'] = $this->question_m->get_my_questions($session['iduser']);
		}

		$lang = $this->english->load_lang();
		$this->load->view('header',$lang);
		$this->load->view('nav',$session);
		$this->load->view('home',$data);
		$this->load->view('footer');  

	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */