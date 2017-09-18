<?defined('BASEPATH') OR exit('No direct script access allowed');

	class App extends CI_Controller{

		function __construct()
	        {
				parent::__construct();
				$this->load->helper(array('url', 'form'));
				$this->load->library('session');

	        }


		function index()
			{

				$data['main_content']= 'app/login/login';

				$this->load->view('app/template', $data);

				if($this->session->userdata('is_logged_in'))
				{
					redirect('app_home/valid_user/home');

				}
			}

		function validate_credentials()
			{

				$this->load->model('app/login/login');

				$query=$this->login->login();

				if($query)
					{
						$data = array
							(
								'app_user_email'=>$this->input->post('user_mail'),
								'is_logged_in'=> true
							);
					$this->load->model('app/login/login');

					$user=$this->login->my_user();

					foreach ($user->result() as $user_cell)
					{

						$data ['user_name']= $user_cell->app_user_name;
						$data ['user_lastName']= $user_cell->app_user_lastName;
						$data ['user_id']= $user_cell->app_user_id;

					}

				$this->session->set_userdata($data);

				redirect('app_home/valid_user/my_user');

				}
				else
				{

					$data['main_content']= 'app/login/login';

					$data['fail']='Error al identificarte';

					$this->load->view('app/template', $data);
				}

			}



	function logout()
		{

			$this->session->sess_destroy();

			redirect('app');

		}
	}

?>
