<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class English {

    public function load_lang()
    {
    	$en['title'] = "KAIST Life";
    	$en['welcome'] = "Welcome to <span class=\"kaist\">KAIST</span> Life";
    	$en['create_account'] = "Create account";
    	$en['last_questions'] = "Top five";
    	$en['no_answer'] = "Not answered";
    	$en['create_question'] = "Create a new question";
    	$en['show_question'] = "Showing question";
    	$en['answer_question'] = "Answer this question";
    	$en['replies'] = "Replies for this question";
        $en['slogan'] = "The best way to find out whatever you need for your life as a KAIST student. Enjoy it!";
    	return $en;
    }
}

/* End of file English.php */