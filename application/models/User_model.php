<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function userLogged()
    {
        $username = $this->session->userdata('username');
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
}