<?
defined('BASEPATH') OR exit('No direct script access allowed');

	class Membership_model extends CI_Model{
	 function __construct()
        {
             parent::__construct();

             $this->load->database();
        }


		 function validate()
		 {	

			$query =$this->db->from('users')
			->where('user_mail', $this->input->post('user_mail'))
			->where('user_pass', md5($this->input->post('user_password')))
			->get();

			if($query->num_rows()==1)
			{
				return true;
			}
			else
			{

				return false;
			}
		
		}

		function register_user(){

			$new_member_data =  array(
				'user_name' => $this->input->post('user_name'), 
				'user_lastName' => $this->input->post('user_lastName'), 
				'user_admin' => $this->input->post('user_type'), 
				'user_mail' => $this->input->post('user_mail'), 
				'user_pass' => md5($this->input->post('user_password')) 
				);
			$insert = $this->db->insert('users', $new_member_data);
			return $insert;


		}

		function delete_users($id){
	        $this->db->delete('users', array('user_id'=> $id));
	        
	        $url=site_url();
	        
	        redirect($url.'/admin_home/valid_user/users');
		}



	}

?>