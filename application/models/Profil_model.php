<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profil_model extends CI_Model
{
    public function userLogged()
    {
        $username = $this->session->userdata('username');
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function updateuser($nama, $jabatan, $username)
    {
        $this->db->set('nama', $nama);
        $this->db->set('jabatan', $jabatan);
        $this->db->where('username', $username);
        $this->db->update('user');
    }

    public function updatepassword($new_password)
    {
        $this->db->set('password', $new_password);
        $username = $this->session->userdata('username');
        $this->db->where('username', $username);
        $this->db->update('user');
    }
}