<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function userLogged()
    {
        $username = $this->session->userdata('username');
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function getListTemplate()
    {
        return $this->db->get('doc_template')->result_array();
    }

    public function getFileName($template_id)
    {
        $this->db->where('id', $template_id);
        $template = $this->db->get('doc_template')->row_array();
        return $template['file_name'];
    }
}