<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function userLogged()
    {
        $username = $this->session->userdata('username');
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function getListRole()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function getRoleById($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }

    public function getListMenu()
    {
        //tidak memunculkan pilihan role admin
        $this->db->where('id !=', 1);
        return $this->db->get_where('user_menu')->result_array();
    }

    public function doChangeAccess($data)
    {
        $result = $this->db->get_where('user_access_menu', $data);
        
        if($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
    }
    
    public function getListUser() {
        $username_logged = $this->session->userdata('username');
        $sql = "SELECT u.*, ur.role as roleuser 
                FROM `user` u JOIN `user_role` ur
                ON u.role_id = ur.id
                WHERE NOT u.username = '$username_logged'";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getUserById($user_id)
    {
        $sql = "SELECT u.*, ur.role as roleuser 
                FROM `user` u JOIN `user_role` ur
                ON u.role_id = ur.id
                WHERE u.id = $user_id";
        $res = $this->db->query($sql);
        return $res->row_array();
    }

    public function editUser($user_id, $nama, $jabatan, $role_id)
    {
        $this->db->set('nama', $nama);
        $this->db->set('jabatan', $jabatan);
        $this->db->set('role_id', $role_id);
        $this->db->where('id', $user_id);
        $this->db->update('user');
    }

    public function deleteUser($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->delete('user');
    }

    public function addUser($data)
    {
        $this->db->insert('user', $data);
    }
}