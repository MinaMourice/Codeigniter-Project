<?php

class Blog_model extends CI_Model {

        public function insert_entry($data)
        {
                $this->db->insert('users', $data);
                return $this->db->insert_id();
        }

        /*public function check_login($data)
        {

        	$query = $this->db->query("SELECT * FROM users where Email =$username , password=$password");
        	$userData = $user->getRows($conditions);
        	if(!empty($username) && !empty($password) ){
        	{

		       	if($userData)
		        {
		        $sessData['userLoggedIn'] = TRUE;
	            $sessData['userID'] = $userData['id'];
	            $sessData['status']['type'] = 'success';
	            $sessData['status']['msg'] = 'Welcome '.$userData['first_name'].'!';
	            }
	            else
	            {
		        $sessData['status']['type'] = 'error';
		        $sessData['status']['msg'] = 'Wrong email or password, please try again.'; 
		        }
  				
        	}
        	
        }*/

      /*  public function insert_image($insert_data)
        {
        		$this->db->insert('users', $insert_data);//load array to database
                return $this->db->insert_id();
        }*/

        public function check_login($data)
        {
			$condition = "Email =" . "'" . $data['Email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
			
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

				
			if ($query->num_rows() == 1) 
			{
			//return array($query ->id , $query ->fname, $query ->lname , $query ->  );
				return true ;
			}
			else
			{
				return false;
			}

        }


        public function check_admin_login($data)
        {
			$condition = "Email =" . "'" . $data['Email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
			
			$this->db->select('*');
			$this->db->from('admins');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

				
			if ($query->num_rows() == 1) 
			{
			//return array($query ->id , $query ->fname, $query ->lname , $query ->  );
				return true ;
			}
			else
			{
				return false;
			}

        }



	  public function read_user_information($username)
	   {

			$condition = "email =" . "'" . $username . "'";
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1)
			{
			return $query->result();
			} 
			else
			{
			return false;
			}
		}
}

