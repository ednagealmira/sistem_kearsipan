<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adminpusat_model extends CI_Model
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

    public function deleteTemplate($template_id)
    {
        $this->db->where('id', $template_id);
        $this->db->delete('doc_template');
    }
}