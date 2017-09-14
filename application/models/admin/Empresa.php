<?defined('BASEPATH') OR exit('No direct script access allowed');

	class Empresa extends CI_Model{
		function __construct(){
			parent:: __construct();
		}

		function rec_empresa_list(){
			//$query = $this -> db -> get('periods');
		}

		function empresa_add(){
			$new_rec_empresa_row = array(
					'empresa_tit'=> $this->input->post('empresa_tit'),
					'empresa_direccion'=> $this->input->post('empresa_dir'),
					'empresa_contacto'=> $this->input->post('empresa_contacto'),
					'empresa_mail'=> $this->input->post('empresa_mail'),
					'empresa_pass'=> md5($this->input->post('empresa_pass'))
				);

			$insert = $this->db->insert('empresa', $new_rec_empresa_row);
			return $insert;
		}

		function get_users($pagingConfig, $page){
			return $this->db->get('candidatos', $pagingConfig, ($page-1) * $pagingConfig);
		}

		function get_user_available($id){
		
			$sql = sprintf("
				SELECT * 
				FROM users_event, rec_empresa_user ",
				$id);

			$user_availables = $this->db->query($sql);

			return $user_availables;
		}

		function get_user_not_available($id){
			$sql = sprintf("
				SELECT * 
				FROM candidatos, empresa_candidatos 
				WHERE empresa_candidatos.ec_empresa = %s 
				AND candidatos.user_event_id = empresa_candidatos.ec_candidato", 
				$id);

			

			$user_not = $this->db->query($sql);
			return $user_not;
		}

		function get_empresa($id){
			$empresa = $this->db
							->where('empresa_id', $id)
							->get('empresa');
			return $empresa;
		}

		function empresa_edit(){
			$new_empresa_row = array(
					'empresa_tit'=> $this->input->post('empresa_tit'),
					'empresa_direccion'=> $this->input->post('empresa_dir'),
					'empresa_contacto'=> $this->input->post('empresa_contacto')				);

			$insert = $this->db
						->where('empresa_id', $this->input->post('empresa_id'))
						->update('empresa', $new_empresa_row);
			return $insert;
		}

		function empresa_delete($id){
			$this->db->delete('empresa', array('empresa_id'=> $id));
		}
	}

?>