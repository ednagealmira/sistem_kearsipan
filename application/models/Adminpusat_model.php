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
        //delete local file template
        $temp = $this->db->get_where('doc_template', array('id'=> $template_id))->row_array();
        $file_path = './assets/filesUploaded/templatedoc/' . $temp['file_name'];
        if (!unlink($file_path)) {
            return 0;
        }
        else {
            $this->db->where('id', $template_id);
            $this->db->delete('doc_template');
            return 1;
        }
    }

    public function getTemplateById($template_id)
    {
        $this->db->where('id', $template_id);
        return $this->db->get('doc_template')->row_array();
    }

    public function addTemplate($data)
    {
        $this->db->insert('doc_template', $data);
    }

    public function editTemplate($template_id, $template_desc)
    {
        $this->db->set('template_desc', $template_desc);
        $this->db->where('id', $template_id);
        $this->db->update('doc_template');
    }

    public function getFileName($template_id)
    {
        $this->db->where('id', $template_id);
        $template = $this->db->get('doc_template')->row_array();
        return $template['file_name'];
    }
}