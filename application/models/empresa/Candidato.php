<?
defined('BASEPATH') OR exit('No direct script access allowed');

	class Candidato extends CI_Model {
		function __contsruct(){
			parent::__construct();
		}
	

	function add_users(){
			$new_member_data =  array(
				'user_event_name' => $this->input->post('user_name'), 
				'user_event_lastName' => $this->input->post('user_lastName'), 
				'user_event_email' => $this->input->post('user_mail'), 
				'domicilio' => $this->input->post('domicilio'), 
				'edad' => $this->input->post('edad'), 
				'genero' => $this->input->post('genero'), 
				'escolaridad' => $this->input->post('escolaridad'), 
				'disponibilidad' => $this->input->post('disponibilidad'), 
				'experiencia' => $this->input->post('experiencia'), 
				'detalles' => $this->input->post('detalles'), 
				'ingles' => $this->input->post('ingles'), 
				'cel' => $this->input->post('cel'), 
				'puesto' => $this->input->post('puesto'), 
				'rfc' => $this->input->post('rfc'), 
				'curp' => $this->input->post('curp'), 
				'nacimiento' => $this->input->post('nacimiento'), 
				'civil' => $this->input->post('civil'), 
				'nns' => $this->input->post('nns'), 
				'cedula' => $this->input->post('cedula'), 
				'escuela' => $this->input->post('escuela'), 
				'municipio' => $this->input->post('municipio'), 
				'auto' => $this->input->post('auto'), 
				'reclutador_id' => $this->input->post('reclutador') 
				);
			$insert = $this->db->insert('candidatos', $new_member_data);
			return $insert;

	}

	function update_users($seg){
                 $url=site_url();
                 $user_data=array(
	                'user_event_name'=> $this->input->post('user_name_edit'),
	                'user_event_lastName'=> $this->input->post('user_lastName_edit'),
	                'user_event_email'=> $this->input->post('user_mail_edit'),
					'domicilio' => $this->input->post('domicilio_edit'), 
					'edad' => $this->input->post('edad_edit'), 
					'genero' => $this->input->post('genero_edit'), 
					'escolaridad' => $this->input->post('escolaridad_edit'), 
					'disponibilidad' => $this->input->post('disponibilidad_edit'), 
					'experiencia' => $this->input->post('experiencia_edit'), 
					'detalles' => $this->input->post('detalles_edit'), 
					'ingles' => $this->input->post('ingles_edit'), 
					'cel' => $this->input->post('cel_edit'), 
					'puesto' => $this->input->post('puesto_edit'), 
					'rfc' => $this->input->post('rfc_edit'), 
					'curp' => $this->input->post('curp_edit'), 
					'nacimiento' => $this->input->post('nacimiento_edit'), 
					'civil' => $this->input->post('civil_edit'), 
					'nns' => $this->input->post('nns_edit'), 
					'cedula' => $this->input->post('cedula_edit'), 
					'escuela' => $this->input->post('escuela_edit'), 
					'municipio' => $this->input->post('municipio_edit'), 
					'auto' => $this->input->post('auto_edit') 
	                );

                $query= $this->db->from('candidatos')
                        ->where('user_event_id', $this->input->post('user_event_id'))
                        ->update('candidatos', $user_data);

                if($query)
                {
			        redirect($url.'/admin_home/valid_user/candidato/0/'.$seg);
                    return true;
                }
                else
                {
			        redirect($url.'/admin_home/valid_user/my_profile');
                    return false;
                }


	}

	function delete_users($id, $seg){
        $this->db->delete('candidatos', array('user_event_id'=> $id));
        
        $url=site_url();
        
        redirect($url.'/admin_home/valid_user/candidato/0/'.$seg);
	}


        

    
}
?>
