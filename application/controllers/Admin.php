<?
defined('BASEPATH') OR exit('No direct script access allowed');


	class Admin extends CI_Controller{
	
	
	function __construct()
        {
			parent::__construct();
			$this->load->helper(array('url', 'form'));
			$this->load->library('session');
			$this->load->database();
			$this->load->model('admin/user_data');
			$this->load->model('membership_model');	
        }

	
	function index()
		{
			
			$data['main_content']= 'admin/login_form';			
			
			$this->load->view('admin/template', $data);

			if($this->session->userdata('is_logged_in'))
			{
				redirect('admin_home/valid_user/home');

			}
		}


	function validate_credentials()
		{ 
			
			
			
			$query=$this->membership_model->validate();

			if($query)
				{
					$data = array
						(
							'user_mail'=>$this->input->post('user_mail'),
							'is_logged_in'=> true
						);

						
			
			$user=$this->user_data->my_user();
				
			foreach ($user->result() as $user_cell)
				{

					$data ['user_name']= $user_cell->user_name;
					
					$data ['user_lastName']= $user_cell->user_lastName;
					
					$data ['user_id']= $user_cell->user_id;
					
					$data ['user_admin']= $user_cell->user_admin;
					
				}

			$this->session->set_userdata($data);
			
			redirect('admin_home/valid_user/my_profile');
			
			}else
			{
				
				$data['main_content']= 'admin/login_form';
				
				$data['fail']='Error al identificarte';			
				
				$this->load->view('admin/template', $data);
			}
		
		}


	
	function home()
		{
			
			$data['main_content']= 'admin/home';
			
			$this->load->view('admin/template', $data);
		
		}

	function logout()
		{

			$this->session->sess_destroy();
			
			redirect('admin');
		
		}


	}


?>