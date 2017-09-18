<?defined('BASEPATH') OR exit('No direct script access allowed');

	class App_model extends CI_Model{
		function __construct(){
			parent:: __construct();
		}


		function get_candidato($user_id){

			$sql = sprintf('
					SELECT *
					FROM candidatos
					WHERE user_event_id = %s',
				$user_id);
			if($query = $this->db->query($sql)){
				return $query -> result();
			}else {
				return false;
			}
		}

		function add_app(){
			$new_rec_empresa_row = array(
					'app_name'=> $this->input->post('app_name'),
					'app_empresa_id'=> $this->input->post('empresa_id')
				);

			$insert = $this->db->insert('apps', $new_rec_empresa_row);
			return $insert;


		}

		function get_app_byid($id){
			$sql = sprintf('
					SELECT *
					FROM apps
					WHERE app_id = %s',
				$id);
			if($query = $this->db->query($sql)){
				return $query -> result();
			}else {
				return false;
			}
		}

		function get_apps(){
			$sql ='
					SELECT *
					FROM apps, empresa
					WHERE empresa_id = app_empresa_id';

			if($query = $this->db->query($sql)){
				return $query -> result();
			}else {
				return false;
			}


		}


		function get_app_empresa($id){

			$sql = sprintf('
					SELECT *
					FROM apps
					WHERE app_empresa_id = %s',
				$id);
			if($query = $this->db->query($sql)){
				return $query -> result();
			}else {
				return false;
			}
		}





		function get_candidatos(){
			$user_id= $this->session->user_id;
			$sql = sprintf('
					SELECT *
					FROM candidatos, empresa_candidatos
					WHERE ec_empresa = %s
					AND ec_candidato = user_event_id
					AND NOT stats = 1',
				$user_id);
			if($query = $this->db->query($sql)){
				return $query -> result();
			}else {
				return false;
			}
		}




		function candidato_edit($seg){
                 $url=site_url();
                 $user_data=array(
	                'stats'=> $this->input->post('estado')
	                );

                $query= $this->db->from('candidatos')
                        ->where('user_event_id', $this->input->post('user_event_id'))
                        ->update('candidatos', $user_data);

                if($query)
                {
			        redirect($url.'/app_home/valid_user/candidato/'.$seg);
                    return true;
                }
                else
                {
			        redirect($url.'/app_home/valid_user/candidato/'.$seg);
                    return false;
                }


	}

	}
?>
