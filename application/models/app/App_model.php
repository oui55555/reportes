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




		function am_i_register($user, $event){
			/*
			//search for title
			$sql_= sprintf('
				SELECT *
				FROM events
				WHERE event_id = %s
				',$event);
			
			$title = $this->db->query($sql_)->result();
			$period_id = $title[0]->event_period_id;
			$title = $title[0]->event_title;
			$title = "'".$title."'";
			// search for events who match title
			$sql_1 = sprintf('
					SELECT event_id
					FROM events
					WHERE event_title = %s
					AND event_period_id = %s
				', $title, $period_id);
			$ids = $this->db->query($sql_1)->result();
			
			$id_list = '(0';
			foreach ($ids  as $y) {
				$id_list .= ','.$y->event_id;
			}
			
			$id_list .= ' )';
			

			$sql = sprintf('
			SELECT *
			FROM  event_register
			WHERE event_register_e_id IN %s
				', $id_list);

			if($this->db->query($sql)->num_rows() >= 1){
				
				return true;
			}else{
				return false;
			}
			*/
			$sql = sprintf('
			SELECT *
			FROM  event_register
			WHERE event_register_u_id = %s
			AND event_register_e_id = %s', $user, $event);

			if($this->db->query($sql)->num_rows() >= 1){
				
				return true;
			}else{
				return false;
			}


		}
	}
?>