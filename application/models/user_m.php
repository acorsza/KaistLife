<?php 
class user_m extends CI_Model {

    public function __construct()
    {
		// Call the Model constructor
		parent::__construct();
    }

    //@Aderlei 2014 Jun 08, 08:00
    //Function to insert a new user in the database
    public function insert_user($user)
    {
        $this -> db -> select('email');
        $this -> db -> from('user');
        $this -> db -> where('email', $user['email']);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return null;
        }else{
            $this -> db -> select('username');
            $this -> db -> from('user');
            $this -> db -> where('username', $user['username']);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return null;
            } else {
                $this->db->insert('user', $user);
                return $this->db->insert_id(); // This return the id of the user inserted in the DB
            }
            
        }        
    }

    public function login($email, $password)
	 {
		$this -> db -> select('iduser, username, email, password');
		$this -> db -> from('user');
		$this -> db -> where('email', $email);
		$this -> db -> where('password', MD5($password));
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		//print_r($this->db->last_query());
		

		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	//Ruan 
	function get_user_info($iduser)
	{
        $this -> db -> select('iduser, username, email, password');
        $this -> db -> from('user');
        $this -> db -> where('iduser', $iduser);

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


     function update_user($data){
          $this->db->where('iduser', $data['iduser']);
            $this->db->update('user', $data);

     }
}
?>