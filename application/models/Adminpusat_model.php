<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adminpusat_model extends CI_Model
{
    public function userLogged()
    {
        $username = $this->session->userdata('username');
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }
    
    // -------------------------- Bahasa --------------------------

    public function getListBahasa()
    {
        return $this->db->get('naskah_bahasa')->result_array();
    }

    public function deleteBahasa($bahasa_id)
    {
        $this->db->where('id', $bahasa_id);
        $this->db->delete('naskah_bahasa');
    }

    public function getBahasaById($bahasa_id)
    {
        $this->db->where('id', $bahasa_id);
        return $this->db->get('naskah_bahasa')->row_array();
    }

    public function addBahasa($data)
    {
        $this->db->insert('naskah_bahasa', $data);
    }

    public function editBahasa($bahasa_id, $bahasa_naskah)
    {
        $this->db->set('bahasa', $bahasa_naskah);
        $this->db->where('id', $bahasa_id);
        $this->db->update('naskah_bahasa');
    }

    // -------------------------- Jenis Naskah --------------------------

    public function getListJenis()
    {
        return $this->db->get('naskah_jenis')->result_array();
    }

    public function deleteJenis($jenis_id)
    {
        $this->db->where('id', $jenis_id);
        $this->db->delete('naskah_jenis');
    }

    public function getJenisById($jenis_id)
    {
        $this->db->where('id', $jenis_id);
        return $this->db->get('naskah_jenis')->row_array();
    }

    public function addJenis($data)
    {
        $this->db->insert('naskah_jenis', $data);
    }

    public function editJenis($jenis_id, $jenis_naskah)
    {
        $this->db->set('jenis', $jenis_naskah);
        $this->db->where('id', $jenis_id);
        $this->db->update('naskah_jenis');
    }

    // -------------------------- Media Arsip --------------------------

    public function getListMedia()
    {
        return $this->db->get('naskah_media')->result_array();
    }

    public function addMedia($data)
    {
        $this->db->insert('naskah_media', $data);
    }

    public function getMediaById($media_id)
    {
        $this->db->where('id', $media_id);
        return $this->db->get('naskah_media')->row_array();
    }

    public function editMedia($media_id, $arsip_media)
    {
        $this->db->set('media_arsip', $arsip_media);
        $this->db->where('id', $media_id);
        $this->db->update('naskah_media');
    }

    public function deleteMedia($media_id)
    {
        $this->db->where('id', $media_id);
        $this->db->delete('naskah_media');
    }

    // -------------------------- Tingkat Perkembangan --------------------------

    public function getListTP()
    {
        return $this->db->get('naskah_tperkembangan')->result_array();
    }

    public function deleteTP($tp_id)
    {
        $this->db->where('id', $tp_id);
        $this->db->delete('naskah_tperkembangan');
    }

    public function getTPById($tp_id)
    {
        $this->db->where('id', $tp_id);
        return $this->db->get('naskah_tperkembangan')->row_array();
    }

    public function addTP($data)
    {
        $this->db->insert('naskah_tperkembangan', $data);
    }

    public function editTP($tp_id, $tingkat_perkembangan)
    {
        $this->db->set('tperkembangan', $tingkat_perkembangan);
        $this->db->where('id', $tp_id);
        $this->db->update('naskah_tperkembangan');
    }
    

    // -------------------------- Template --------------------------

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