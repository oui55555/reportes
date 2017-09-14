<?
defined('BASEPATH') OR exit('No direct script access allowed');

	class User_data extends CI_Model{
	   
       function __construct()
            {
                
                parent::__construct();
            
            }

        
        function my_user()
            {
                	
                    $query = $this->db->from('users')
                		->where('user_mail', $this->input->post('user_mail'))
                		->get();

                	if($query->num_rows()==1)
                    {
        				return $query;
        			}
                    else
                    {
        				return false;
        			}

            }

        // update users data and password
        function user_update($id)
            {
                
                $user_data=array(
                        'user_name'=> $this->input->post('user_name'),
                        'user_lastName'=> $this->input->post('user_lastName'),
                        'user_mail'=> $this->input->post('user_mail'),
                        );

                $query= $this->db->from('users')
                        ->where('user_id', $id)
                        ->update('users', $user_data);

                if($query)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        
         



        
        //get all users         
        function users($pagingConfig, $page)
            {
                $query= $this->db
                        ->order_by('user_id', 'DESC')
                        ->get('users', $pagingConfig, ($page-1) * $pagingConfig);
               
                if($query->num_rows()>0)
                {
                    return $query;    
                }
                else
                {
                    return false; 
                }
            }

        function change_password($id){

            $user_data=array(
                        'user_pass'=> md5($this->input->post('user_pass'))
                        );

                $query= $this->db
                        ->where('users.user_id', $id)
                        ->update('users', $user_data);

                if($query)
                {
                    return true;
                }
                else
                {
                    return false;
                }
           
    

        }
 


	}
?>