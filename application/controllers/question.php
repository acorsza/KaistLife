<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question extends CI_Controller {

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

	function __construct()
	{
		parent::__construct();
	   
		$this->load->model('question_m','',TRUE);
		
	   
	}
	private function session_check() {

		// Check if user is logged in

		if($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			return $session_data; // Return array of user's data
		} else {
			$session_data = null;
			$session_data['username'] = null;
			return $session_data; 
			
		}
	}

	public function index()
	{
		$data['categories'] = $this->question_m->get_categories();
		$session = $this->session_check();
                $data['my_question_list'] = $this->question_m->get_my_questions($session['iduser']);  
		$lang = $this->english->load_lang();
		$this->load->view('header',$lang);
		$this->load->view('nav',$session);
		$this->load->view('form_new_question',$data);
		$this->load->view('footer');  

	}

	public function create() 
	{
		$session = $this->session_check();
		date_default_timezone_set('Asia/Seoul');
		$question['title'] = $this->input->post('title');
		$question['description'] = $this->input->post('description');
		$question['created_at'] = date('Y-m-d H:i:s');
		$question['fk_category'] = $this->input->post('category');
		$question['fk_user'] = $session['iduser'];
		
		$this->question_m->insert_question($question);
		redirect('home','refresh');
	}

	public function show($idquestion) 
	{
		$session = $this->session_check();
		if($session['username'] != null){
			$lang = $this->english->load_lang();
                        $data['question_na_list'] = $this->question_m->get_questions_not_answered();
                        $data['question_top_list'] = $this->question_m->get_top_questions();
			$question = $this->question_m->get_question($idquestion);
			$reply = $this->question_m->get_replies($idquestion);
			$user = $this->question_m->get_question_user($question[0]->fk_user);                
			$session = $this->session_check();
			$data['question'] = $question;
			$data['reply'] = $reply;
			$data['user'] = $user;
			date_default_timezone_set('Asia/Seoul');
			$this->load->view('header', $lang);
			$this->load->view('nav',$session);
			$this->load->view('show_question', $data);
			$this->load->view('footer');
		} else {
			echo "<script>alert('You need to be looged to perform this action');</script>";
			redirect('home','refresh');
			
		}
	}

	public function all_na() 
	{
		$session = $this->session_check();
		if($session['username'] != null){
			$session = $this->session_check();
			$lang = $this->english->load_lang();
			$data['question_na_list'] = $this->question_m->get_questions_not_answered();
                        
                        $data['daejeon_list'] = $this->question_m->get_daejeon_questions();
                        $data['academic_list'] = $this->question_m->get_academic_questions();
                        $data['campus_list'] = $this->question_m->get_campus_questions();
			$session = $this->session_check();
			date_default_timezone_set('Asia/Seoul');
			$this->load->view('header', $lang);
			$this->load->view('nav',$session);
			$this->load->view('all_na', $data);
			$this->load->view('footer');
		} else {
		echo "<script>alert('You need to be looged to perform this action');</script>";
		redirect('home','refresh');
		
		}
	}

	public function all_top() 
	{
		$session = $this->session_check();
		if($session['username'] != null){
                    $session = $this->session_check();
                    $lang = $this->english->load_lang();
                    $data['question_top_list'] = $this->question_m->get_top_questions();
                    $data['daejeon_list'] = $this->question_m->get_daejeon_questions();
                    $data['academic_list'] = $this->question_m->get_academic_questions();   
                    $data['campus_list'] = $this->question_m->get_campus_questions();
                    $session = $this->session_check();
                    date_default_timezone_set('Asia/Seoul');
                    $this->load->view('header', $lang);
                    $this->load->view('nav',$session);
                    $this->load->view('all_top', $data);
                    $this->load->view('footer');
		} else {
		echo "<script>alert('You need to be looged to perform this action');</script>";
		redirect('home','refresh');
		
		}
	}
        
        public function all_daejeon() 
	{
		$session = $this->session_check();
		if($session['username'] != null){
                    $session = $this->session_check();
                    $lang = $this->english->load_lang();
                    $data['question_na_list'] = $this->question_m->get_questions_not_answered();
                    $data['question_top_list'] = $this->question_m->get_top_questions();
                    $data['daejeon_list'] = $this->question_m->get_daejeon_questions();
                    $session = $this->session_check();
                    date_default_timezone_set('Asia/Seoul');
                    $this->load->view('header', $lang);
                    $this->load->view('nav',$session);
                    $this->load->view('all_daejeon', $data);
                    $this->load->view('footer');
		} else {
		echo "<script>alert('You need to be looged to perform this action');</script>";
		redirect('home','refresh');
		
		}
	}
        
        public function all_academic() 
	{
		$session = $this->session_check();
		if($session['username'] != null){
                    $session = $this->session_check();
                    $lang = $this->english->load_lang();
                    $data['question_na_list'] = $this->question_m->get_questions_not_answered();
                    $data['question_top_list'] = $this->question_m->get_top_questions();
                    $data['academic_list'] = $this->question_m->get_academic_questions();
                    $session = $this->session_check();
                    date_default_timezone_set('Asia/Seoul');
                    $this->load->view('header', $lang);
                    $this->load->view('nav',$session);
                    $this->load->view('all_academic', $data);
                    $this->load->view('footer');
		} else {
		echo "<script>alert('You need to be looged to perform this action');</script>";
		redirect('home','refresh');
		
		}
	}
        
        public function all_campus() 
	{
		$session = $this->session_check();
		if($session['username'] != null){
                    $session = $this->session_check();
                    $lang = $this->english->load_lang();
                    $data['question_na_list'] = $this->question_m->get_questions_not_answered();
                    $data['question_top_list'] = $this->question_m->get_top_questions();
                    $data['campus_list'] = $this->question_m->get_campus_questions();
                    $session = $this->session_check();
                    date_default_timezone_set('Asia/Seoul');
                    $this->load->view('header', $lang);
                    $this->load->view('nav',$session);
                    $this->load->view('all_campus', $data);
                    $this->load->view('footer');
		} else {
		echo "<script>alert('You need to be looged to perform this action');</script>";
		redirect('home','refresh');
		
		}
	}
        
        public function all_my() 
	{
		$session = $this->session_check();
		if($session['username'] != null){
                    $session = $this->session_check();
                    $lang = $this->english->load_lang();
                    $session = $this->session_check();
                    $data['daejeon_list'] = $this->question_m->get_daejeon_questions();
                    $data['academic_list'] = $this->question_m->get_academic_questions();   
                    $data['campus_list'] = $this->question_m->get_campus_questions();
                    if($session['username']){
			$data['my_question_list'] = $this->question_m->get_my_questions($session['iduser']);
                    }
                    date_default_timezone_set('Asia/Seoul');
                    $this->load->view('header', $lang);
                    $this->load->view('nav',$session);
                    $this->load->view('all_my', $data);
                    $this->load->view('footer');
		} else {
		echo "<script>alert('You need to be looged to perform this action');</script>";
		redirect('home','refresh');
		
		}
	}

	public function answer() 
	{
		$session = $this->session_check();
		date_default_timezone_set('Asia/Seoul');
		$answer['description'] = $this->input->post('description');
		$answer['created_at'] = date('Y-m-d H:i:s');
		$answer['fk_question'] = $this->input->post('idquestion');
		$answer['fk_user'] = $session['iduser'];
		$this->question_m->insert_answer($answer);
		$this->question_m->update_reply($this->input->post('idquestion'));
		redirect('question/show/'.$this->input->post('idquestion'),'refresh');
	}
        
        public function up($id) {
            $this->question_m->update_point($id);
            
        }
        
        public function report_question($id) {
            print_r("Entrou"); 
            $session = $this->session_check();
            $iduser = $session['iduser'];
            $message = "This is a report made by the user id: " . $iduser . " about the question number: " . $id;
            $this->load->library('email');
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            

            $this->email->initialize($config);
            echo "Comecou"; 
            $this->email->from('report@kaistlife.com', 'KAIST Life');
            $this->email->to('aderleifilho@gmail.com');
            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');
            echo "Subject"; 
            $this->email->subject('Report made');
            $this->email->message('This is a report');
            echo "SEND";
            if($this->email->send()){
                echo "ENVIOU";
            }
            
            
            
            echo $this->email->print_debugger();    
        }
        
        public function sendEmail(){			
		// Email configuration
		$config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'smtp.yourdomainname.com.',
			  'smtp_port' => 465,
			  'smtp_user' => 'admin@yourdomainname.com', // change it to yours
			  'smtp_pass' => '******', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
		);	
	
		$this->load->library('email', $config);
		$this->email->from('admin@yourdomainname.com', "Admin Team");
		$this->email->to("test@domainname.com");
		$this->email->cc("testcc@domainname.com");
		$this->email->subject("This is test subject line");
		$this->email->message("Mail sent test message...");
			
		$data['message'] = "Sorry Unable to send email...";	
		if($this->email->send()){					
			$data['message'] = "Mail sent...";			
		}	
		 				
		// forward to index page
		$this->load->view('index', $data);		
	}
        
        public function report_q($id) {
            $session = $this->session_check();
            $question = $this->question_m->get_question($id);
            $title = $question[0]->title;
            $iduser = $session['iduser'];
            $username = $session['username'];
            $email_from = "kaistlife@labs.com";
            
            $email_to  = 'aderleifilho@gmail.com' . ', ';
            $email_to  .= 'marques.ruan@gmail.com' . ', ';
            $email_to  .= 'lung.20051002@gmail.comsa' . ', ';
            $email_to  .= 'lbyeoksan@gmail.com' . ', ';
            $email_to  .= 'aderleifilho@hotmail.com';
            
            $email_subject = "Report made at KAIST Life - Question";

            $email_message = "This is a report made by the user id: " . $iduser . "name: " . $username . " about the question number: " . $id . " Title: ". $title . ". Please check if it is necessary any intervention in this question!";
            
            $headers = 'From: '.$email_from."\r\n".
 
            'Reply-To: '.$email_from."\r\n" .

            'X-Mailer: PHP/' . phpversion();

            @mail($email_to, $email_subject, $email_message, $headers); 
            redirect('home','refresh');
            
        }
        
        public function report_a($id,$ida) {
            $session = $this->session_check();
            $question = $this->question_m->get_question($id);
            $title = $question[0]->title;
            $iduser = $session['iduser'];
            $username = $session['username'];
            $email_from = "kaistlife@labs.com";
            
            $email_to  = 'aderleifilho@gmail.com' . ', ';
            $email_to  .= 'marques.ruan@gmail.com' . ', ';
            $email_to  .= 'lung.20051002@gmail.comsa' . ', ';
            $email_to  .= 'lbyeoksan@gmail.com' . ', ';
            $email_to  .= 'aderleifilho@hotmail.com';
            
            $email_subject = "Report made at KAIST Life - Reply";

            $email_message = "This is a report made by the user id: " . $iduser . " Username: " . $username . " about the question number: " . $id . " Title: ". $title . " Reply Id: ". $ida . ". Please review this question!";
            $email_message .= "<br />Thank you";
            $email_message .= "<br />KAIST Life Team";
            
            $headers = 'From: '.$email_from."\r\n".
 
            'Reply-To: '.$email_from."\r\n" .

            'X-Mailer: PHP/' . phpversion();

            @mail($email_to, $email_subject, $email_message, $headers); 
            redirect('home','refresh');
            
        }
        
        
        
}