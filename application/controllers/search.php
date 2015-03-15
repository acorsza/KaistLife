<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Search extends CI_Controller {
		
		// Index function

		public function index(){
			$this->all();
		}

		/*
		 *	Function topic/session_check
		 *	Check if there is a user logged in the system and return data or redirect to main page
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

		public function result(){
                        
                        
			// Check session
			$session_data = $this->session_check();
			$data['username'] = $session_data['username'];

			//get the typed text to search
			$text =  $this->input->post('filter');

			//load the model to get data from database
			$this->load->model('question_m');


			//if user has selected categories to search in so do it else search just for the filter of text.
			//higher than 1 because the first elements is comming empty(yes it has to be fixed my friend).

                        $data['list'] = $this->question_m->get_topics_search($text);
	
                        $lang = $this->english->load_lang();
			// Load view
			$this->load->view('header', $lang);
			$this->load->view('nav',$data);
			$this->load->view('search', $data);
			$this->load->view('footer');		
		}


		
  }
	
?>