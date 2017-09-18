<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Model {

   	function __construct()
        {
             parent::__construct();
             $this->load->database();
        }


		 function login()
		 {
		 	$query =$this->db->from('app_user')
			->where('app_user_email', $this->input->post('user_mail'))
			->where('app_user_pass', md5($this->input->post('user_password')))
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


		function my_user()
            {

                    $query = $this->db->from('app_user')
                		->where('app_user_email', $this->input->post('user_mail'))
                		->get();

                	if($query->num_rows()==1)
                    {
        				return $query;
        			}
                    else
                    {
        				return false;
        			}

            }



	}

?>
