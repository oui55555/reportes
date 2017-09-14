<?defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_home extends CI_Controller{



	 	 function __construct(){

	            parent::__construct();
	           	$this->load->database();

	           	$this->load->model('admin/user_data');
	           	$this->load->model('admin/candidato');
				$this->load->model('admin/empresa');

	           	$this->load->library('pagination');
	           	$this->load->library('form_validation');
	           	$this->load->library('session');
	           	$this->load->library('email');
				$this->load->helper('date');
				$this->load->helper('url');
				//$this->load->helper(array('form', 'url'));
        }


        function valid_user($section){

				$is_logged_in = $this->session->userdata('is_logged_in');

				if(!isset($is_logged_in) || $is_logged_in != true)
					{

						echo 'No tienes permiso para entrar a esta pagina. <a href="'.site_url().'/admin">Login</a>';

						die();

					}
				else
					{
						// variables for user data

						$data['user_name']		= $this->session->user_name;
						$data['user_last']		= $this->session->user_lastName;
						$data['user_mail']		= $this->session->user_mail;
						$data['user_admin']		= $this->session->user_admin;
						$data['user_id']		= $this->session->user_id;

						$admin = $this->session->user_admin;


					// Menu for a valid user
					switch ($section) {

						    case 'home':$admin_url='admin/my_profile/profile'; break;
						    case 'my_profile': $admin_url='admin/my_profile/profile'; break;


						        break;
						    case 'update_my_data':


						    	if($this->user_data->user_update($this->input->post('user_id'))){
						    		$admin_url='admin/my_profile/profile';

						    	}else{
						    		$admin_url='admin/my_profile/profile';

						    	}


						    	break;

						    case 'update_my_pass':

						    	if($this->input->post('user_pass_data'))
						    	{
									$this->change_password($this->input->post('user_id'));
						    	}

						    	$admin_url='admin/my_profile/profile';

						    	break;



						    // Empieza la zona de usuarios
						    case 'users':

						        if($admin==1)
						        {

							        $admin_url='admin/users/users_list';
							        $data['users']=$this->user_data->users(20, $this->uri->segment(4, 1));

										$this->init_pagination('/admin_home/valid_user/users', $this->db->count_all('users'), 20, 4);

									if($this->input->post('validation'))
									{
										$this->create_user();
									}

									// in case this delete
									if($this->uri->segment(4))
										{
											$this->load->model('membership_model');
											$this->membership_model->delete_users($this->uri->segment(4));
										}


								}
								else
								{

									$admin_url='admin/';

								}

						   		break;


						    case 'empresa':

						        $admin_url='admin/empresa/empresa_list';
						        $data['empresa'] = $this->db->order_by('empresa_tit', 'DESC')->get('empresa');

						        if($this->input->post('empresa_add'))
									{
										$this->create_empresa();
									}

						        break;


						    case 'empresa_detail':

						        if($this->input->post('empresa_edit'))
						        	{
						        		$this->empresa->empresa_edit();
						        	}

						        // $data['user_available'] = $this->empresa->get_users(20, $this->uri->segment(5, 1));
										//
						        // $data['user_not_available'] = $this->empresa->get_user_not_available($this->uri->segment(4));

						        $data['empresa'] = $this->empresa->get_empresa($this->uri->segment(4));

						        // $this->init_pagination('/admin_home/valid_user/period_users/'.$this->uri->segment(4).'/', $this->db->count_all_results('users_event'), 20, 5);



						        $admin_url='admin/empresa/empresa_detail';
						    	break;


						    case 'empresa_user_delete':
						        	//$this->period->period_delete($this->uri->segment(4));
						        	$this->db->delete('empresa', array('empresa_id'=> $this->uri->segment(4)));
						        	redirect('admin_home/valid_user/empresa');

						    	break;

						    case 'app_user':

						        $admin_url='admin/app_user/single_add';

						        // $data['users_event'] = $this->empresa->get_users(20, $this->uri->segment(5, 1));


						        //in case this add users
						        if($this->input->post('user_event_add'))
									{
										$this->create_candidato();
									}
								// in case this delete
								if($this->uri->segment(4) || $this->uri->segment(4) != 0)
									{
										$this->load->model('admin/candidato');
										$this->candidato->delete_users($this->uri->segment(4), $this->uri->segment(5));
									}
								//in case this update
								if($this->input->post('user_event_edit'))
								{
									$this->load->model('admin/candidato');
									$this->candidato->update_users($this->uri->segment(5));
								}

						        // $this->init_pagination('/admin_home/valid_user/candidato/0/', $this->db->count_all_results('candidatos'), 20, 5);


						     	break;


						    // a url with no valid id goes back to home
						     default:

						     	$admin_url='admin/404/not';
						}

						$data['main_content']= $admin_url;

						$this->load->view('admin/home/template', $data);

					}
	        	}

		 function init_pagination($uri,$total_rows,$per_page,$segment)
		 		{
					$ci                          =& get_instance();
					$config['per_page']          = $per_page;
					$config['uri_segment']       = $segment;
					$config['base_url']          = site_url().$uri;
					$config['total_rows']        = $total_rows;
					$config['use_page_numbers']  = TRUE;
					$config['first_tag_open'] 	= $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
					$config['first_tag_close'] 	= $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
					$config['cur_tag_open'] 	= '<li class="active"><a href="#">';
					$config['cur_tag_close'] 	= "</a></li>";

					$ci->pagination->initialize($config);

					return $config;
		}


		function create_user(){



			$config = array(

			        array(
			                'field' => 'user_name',
			                'label' => 'Nombre',
			                'rules' => 'trim|required',
			                'errors'=> array(
			                		'required'=>'Ingresa tu %s.'
			                	)
			        ),
			        array(
			                'field' => 'user_lastName',
			                'label' => 'Apellido',
			                'rules' => 'trim|required',
			                'errors'=> array(
			                		'required'=>'Ingresa tu %s.'
			                	)
			        ),
			        array(
			                'field' => 'user_mail',
			                'label' => 'Email',
			                'rules' => 'trim|required|valid_email|is_unique[users.user_mail]',
			                'errors'=> array(
			                		'required'=>'Escribe tu %s.',
			                		'valid_email'=>'Debes ingresar un correo real.',
			                		'is_unique'=>'Este correo ya esta siendo usado.'
			                	)
			        )
			);

				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){
					//in case there is something wrong we go back and show warnings
					$admin_url='admin/users/users_list';
				}
				else
				{
					//when is all rigth we load
					$this->load->model('membership_model');
					if( $query = $this->membership_model->register_user() ){

												//send a mail to user giving password

						$user_name = $this->input->post('user_name');
						$user_mail = $this->input->post('user_mail');
						$user_pass = $this->input->post('user_password');
						$message = 'Estimado/a:'
									.$user_name
									.' se ha creado un usuario para el sistema de eventos.'
									.'Usuario: '
									.$user_mail
									.' contraseña:'
									.$user_mail;

						$this->email->from('no-replay@example.com', 'Sistema de eventos');
						$this->email->to($this->input->post($user_mail));
						$this->email->subject('Usuario creado');
						$this->email->message($message);
						$this->email->send();

						redirect('admin_home/valid_user/users');
					}else{
						$this->load->view('admin_home/valid_user/users');
					}
				}

		}

		function create_empresa(){


			$config = array(
				        array(
				                'field' => 'empresa_tit',
				                'label' => 'Nombre de empresa',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),
				        array(
				                'field' => 'empresa_contacto',
				                'label' => 'Nombre de contacto',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'empresa_dir',
				                'label' => 'Direccion',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'empresa_pass',
				                'label' => 'Contraseña',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'empresa_mail',
				                'label' => 'Correo',
				                'rules' => 'trim|required|valid_email|is_unique[empresa.empresa_mail]',
				                'errors'=> array(
			                		'required'=>'Escribe tu %s.',
			                		'valid_email'=>'Debes ingresar un correo real.',
			                		'is_unique'=>'Este correo ya esta siendo usado.'
				                	)
				        ));
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){
					//in case there is something wrong we go back and show warnings
					// $admin_url='admin/empresa/empresa_list';
				}
				else
				{
					//when is all rigth we load
					$this->load->model('admin/empresa');
					if( $query = $this->empresa->empresa_add() ){
						redirect('admin_home/valid_user/empresa');
					}else{
						$this->load->view('admin_home/valid_user/empresa');
					}
				}
			}



		function change_password($id){
				$config = array(
				        array(
				                'field' => 'user_pass',
				                'label' => 'Contraseña',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'user_passC',
				                'label' => 'Confirma contrasela',
				                'rules' => 'trim|matches[user_pass]|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.',
				                		'matches'=>'Las contraseñas no coinciden'
				                	)
				        ));
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){
					//in case there is something wrong we go back and show warnings
					$admin_url='admin/my_profile/profile';

				}
				else
				{
					//when is all rigth we load

					if( $query = $this->user_data->change_password($id) ){

						$data['pass_changed']=true;
					}else{
						$data['pass_changed']=false;
					}
					redirect('admin_home/valid_user/my_profile');
				}
		}


		function create_candidato(){



			$config = array(

			        array(
			                'field' => 'user_name',
			                'label' => 'Nombre',
			                'rules' => 'trim|required',
			                'errors'=> array(
			                		'required'=>'Ingresa tu %s.'
			                	)
			        ),
			        array(
			                'field' => 'user_lastName',
			                'label' => 'Apellido',
			                'rules' => 'trim|required',
			                'errors'=> array(
			                		'required'=>'Ingresa tu %s.'
			                	)
			        ),
			        array(
			                'field' => 'user_mail',
			                'label' => 'Email',
			                'rules' => 'trim|required|valid_email|is_unique[candidatos.user_event_email]',
			                'errors'=> array(
			                		'required'=>'Escribe tu %s.',
			                		'valid_email'=>'Debes ingresar un correo real.',
			                		'is_unique'=>'Este correo ya esta siendo usado.'
			                	)
			        )
			);

				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){
					//in case there is something wrong we go back and show warnings
					$admin_url='admin/candidato/candidato_add';
				}
				else
				{
					//when is all rigth we load
					$this->load->model('admin/candidato');
					if( $query = $this->candidato->add_users() ){


						//send a mail to user giving password

						$user_name = $this->input->post('user_name');
						$user_mail = $this->input->post('user_mail');
						$user_pass = $this->input->post('user_password');
						$message = 'Estimado/a:'
									.$user_name
									.' se ha creado un usuario para el sistema de eventos.'
									.'Usuario: '
									.$user_mail
									.' contraseña:'
									.$user_mail;

						$this->email->from('no-replay@example.com', 'Sistema de eventos');
						$this->email->to($this->input->post($user_mail));
						$this->email->subject('Usuario creado');
						$this->email->message($message);
						$this->email->send();

						redirect('admin_home/valid_user/candidato');
					}else{
						$this->load->view('admin_home/valid_user/candidato');
					}
				}

		}

		function ajax_add_user(){
			$data = array(
		        'ec_empresa' => $this->input->post('empresa'),
		        'ec_candidato' => $this->input->post('candidato')
			);


			if($query = $this->db->insert('empresa_candidatos', $data))
			{
				return true;
			}else{
				return false;
			}
		}
		function ajax_remove_user(){



			if($query = $this->db->delete('empresa_candidatos', array('ec_id' => $this->input->post('period_user_id'))))
			{
				return true;
			}else{
				return false;
			}
		}
	}
?>
