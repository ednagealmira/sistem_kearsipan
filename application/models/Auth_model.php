<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function login_user($username, $password)
	{
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if($user > 0) {
            if (password_verify($password, $user['password'])) {
                $this->session->set_userdata('username',$username);
				$this->session->set_userdata('role_id',$user['role_id']);
                return 1;
            } else {
                return 2;
            }
        }
        else
        {
            return 3;
        }
    }
    
    public function cek_role() {
        $this->db->where('username', $this->session->userdata('username'));
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        return $user['role_id'];
    }

    public function register($data)
    {
        return $this->db->insert('user', $data);
    }
}