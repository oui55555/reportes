<?
defined('BASEPATH') OR exit('No direct script access allowed');

	class Candidato extends CI_Model {
		function __contsruct(){
			parent::__construct();
		}


	function add_users(){
			$new_member_data =  array(
				'app_user_name' => $this->input->post('user_name'),
				'app_user_lastName' => $this->input->post('user_lastName'),
				'app_user_email' => $this->input->post('user_mail'),
				'app_user_pass ' => md5($this->input->post('password')),
				'au_app_id' => $this->input->post('reclutador')
				);
			$insert = $this->db->insert('app_user', $new_member_data);
			return $insert;

	}

	function update_users($seg){
                 $url=site_url();
                 $user_data=array(
	                'app_user_name'=> $this->input->post('user_name_edit'),
	                'app_user_lastName'=> $this->input->post('user_lastName_edit'),
	                'app_user_email'=> $this->input->post('user_mail_edit'),
	                );

                $query= $this->db->from('app_user')
                        ->where('app_user_id', $this->input->post('user_event_id'))
                        ->update('app_user', $user_data);

                if($query)
                {
			        redirect($url.'/admin_home/valid_user/app_user/0/'.$seg);
                    return true;
                }
                else
                {
			        redirect($url.'/admin_home/valid_user/my_profile');
                    return false;
                }


	}

	function delete_users($id, $seg){
        $this->db->delete('candidatos', array('app_user_id'=> $id));

        $url=site_url();

        redirect($url.'/admin_home/valid_user/app_user/0/'.$seg);
	}





}
?>
