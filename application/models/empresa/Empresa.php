<?defined('BASEPATH') OR exit('No direct script access allowed');

	class Empresa extends CI_Model{
		function __construct(){
			parent:: __construct();
		}

		function get_my_apps($id){
			 $query = $this -> db -> where('app_empresa_id', $id)->where('app_publish', 1)-> get('apps');
			 if($query->num_rows()>0){
				 return $query->result();
			 }else{
				 return false;
			 }
		}

		function get_app_byid($id){
			$query = $this -> db ->where('app_id', $id)-> get('apps');
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}

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

		function get_users($pagingConfig, $page, $id){
			return $this->db->where('au_app_id', $id)->get('app_user', $pagingConfig, ($page-1) * $pagingConfig);
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

		function reporte_add(){
			$new_rec_empresa_row = array(
					'reporte_app_id'=> $this->input->post('app_id'),
					'reporte_empresa_id'=> $this->input->post('empresa_id'),
					'reporte_name'=> $this->input->post('reporte_tit'),
				);

			$insert = $this->db->insert('reportes', $new_rec_empresa_row);
			return $insert;

		}
	}

?>
