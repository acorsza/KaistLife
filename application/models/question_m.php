<?php 
class question_m extends CI_Model {

    public function __construct()
    {
		// Call the Model constructor
		parent::__construct();
    }

    //@Aderlei 2014 Jun 08, 08:00
    //Function to insert a new user in the database
    public function insert_question($question)
    {
        $this->db->insert('question', $question);
        return $this->db->insert_id(); // This return the id of the user inserted in the DB
    }

    public function insert_answer($reply)
    {
    	$this->db->insert('reply', $reply);
        return $this->db->insert_id(); // This return the id of the user inserted in the DB
    }

    public function get_categories()
    {
    	$query = $this->db->get('category');
	    return $query->result();
    }

    public function get_questions()
    {
    	$query = $this->db->get('question');
	    return $query->result();
    }

    public function get_top_questions()
    {
    	$this -> db -> select('*');
	$this -> db -> from('question');
    	$this -> db -> order_by("replies", "desc"); 
    	$query = $this -> db -> get();
	    return $query->result();
    }

    public function get_my_questions($id) 
    {
    	$this -> db -> select('*');
		$this -> db -> from('question');
		$this -> db -> where('fk_user', $id);
		$query = $this -> db -> get();
	    return $query->result();
    }

    public function get_questions_not_answered()
    {
    	$this -> db -> select('*');
		$this -> db -> from('question');
		$this -> db -> where('replies', 0);
		$query = $this -> db -> get();
	    return $query->result();
    }
    
    public function get_daejeon_questions() 
    {
    	$this -> db -> select('*');
        $this -> db -> from('question');
        $this -> db -> where('fk_category', 1);
        $query = $this -> db -> get();
        return $query->result();
    }
    
    public function get_academic_questions() 
    {
    	$this -> db -> select('*');
        $this -> db -> from('question');
        $this -> db -> where('fk_category', 2);
        $query = $this -> db -> get();
        return $query->result();
    }
    
    public function get_campus_questions() 
    {
    	$this -> db -> select('*');
        $this -> db -> from('question');
        $this -> db -> where('fk_category', 3);
        $query = $this -> db -> get();
        return $query->result();
    }

    public function get_question_user($id) 
    {
    	$this->db->select('username');
		$this->db->from('user');
		$this->db->where('iduser', $id);
		$this -> db -> limit(1);
		$query = $this->db->get();
		return $query->result();
    }

    public function get_question($id) {
		$this -> db -> select('*');
		$this -> db -> from('question');
		$this -> db -> where('idquestion', $id);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function update_reply($id)
	{
		$this -> db -> select('replies');
		$this -> db -> from('question');
		$this -> db -> where('idquestion', $id);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		$value = $query->result();
		$value[0]->replies = $value[0]->replies + 1;
		$this->db->where('idquestion', $id);		
		$this->db->update('question', $value[0]); 
	}
        
        public function update_point($id)
	{
		$this -> db -> select('point');
		$this -> db -> from('reply');
		$this -> db -> where('idreply', $id);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		$value = $query->result();
		$value[0]->point = $value[0]->point + 1;
		$this->db->where('idreply', $id);		
		$this->db->update('reply', $value[0]); 
	}

	public function get_replies($id)
	{
		$this -> db -> select('reply.idreply,reply.description,reply.point,reply.created_at,reply.fk_user,reply.fk_question,user.iduser,user.username');
		$this -> db -> from('reply');
                $this -> db -> join('user', 'user.iduser = reply.fk_user');
		$this -> db -> where('fk_question', $id);
                $this -> db -> order_by("point", "desc"); 

		$query = $this -> db -> get();
		if($query -> num_rows() >= 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
        
        function get_topics_search($content){

			$this -> db -> select('idquestion, title, description');
			$this -> db -> from('question');
			$this -> db -> like('title', $content);
			$this -> db -> or_like('description', $content);
			$this -> db -> order_by("created_at", "DESC"); 
			$query = $this -> db -> get();

			if($query -> num_rows() != 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
	    }
    
}
?>