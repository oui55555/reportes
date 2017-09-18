<?
defined('BASEPATH') OR exit('No direct script access allowed');


	class Empresa extends CI_Controller{


	function __construct()
        {
			parent::__construct();
			$this->load->helper(array('url', 'form'));
			$this->load->library('session');
			$this->load->database();
			$this->load->model('empresa/user_data');
			$this->load->model('membership_model_empresa');
        }


	function index()
		{

			$data['main_content']= 'empresa/login_form';

			$this->load->view('empresa/template', $data);

			if($this->session->userdata('is_logged_in'))
			{
				redirect('empresa_home/valid_user/home');

			}
		}


	function validate_credentials()
		{



			$query=$this->membership_model_empresa->validate();

			if($query)
				{
					$data = array
						(
							'user_mail'=>$this->input->post('user_mail'),
							'is_logged_in'=> true
						);



			$user=$this->user_data->my_user();

			foreach ($user->result() as $c)
				{

					$data ['empresa_tit']= $c->empresa_tit;
					$data ['empresa_contacto']= $c->empresa_contacto;
					$data ['empresa_mail']= $c->empresa_mail;
					$data ['empresa_id']= $c->empresa_id;


				}

			$this->session->set_userdata($data);

			redirect('empresa_home/valid_user/home');

			}else
			{

				$data['main_content']= 'admin/login_form';

				$data['fail']='Error al identificarte';

				$this->load->view('admin/template', $data);
			}

		}



	function home()
		{

			$data['main_content']= 'empresa/home';

			$this->load->view('empresa/template', $data);

		}

	function logout()
		{

			$this->session->sess_destroy();

			redirect('empresa');

		}


	}


?>
