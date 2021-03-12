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

    public function getTempFileName($template_id)
    {
        $this->db->where('id', $template_id);
        $template = $this->db->get('doc_template')->row_array();
        return $template['file_name'];
    }

    public function getJNaskah()
    {
        return $this->db->get('naskah_jenis')->result_array();
    }

    public function getTPerkembangan()
    {
        return $this->db->get('naskah_tperkembangan')->result_array();
    }

    public function getTUrgensi()
    {
        return $this->db->get('naskah_urgensi')->result_array();
    }

    public function getSifat()
    {
        return $this->db->get('naskah_sifat')->result_array();
    }

    public function getKArsip()
    {
        return $this->db->get('naskah_kategori')->result_array();
    }

    public function getTAPublik()
    {
        return $this->db->get('naskah_taksespublik')->result_array();
    }

    public function getMedia()
    {
        return $this->db->get('naskah_media')->result_array();
    }

    public function getBahasa()
    {
        return $this->db->get('naskah_bahasa')->result_array();
    }

    public function getStatusVital()
    {
        return $this->db->get('naskah_statusvital')->result_array();
    }

    public function getSatuanJumlah()
    {
        return $this->db->get('naskah_satuanjumlah')->result_array();
    }

    public function addNaskah($data)
    {
        $this->db->insert('naskah', $data);
    }

    public function addFileNaskah($data = array()){
        // Insert Ke Database dengan Banyak Data Sekaligus
        return $this->db->insert_batch('naskah_files',$data);
    }

    public function getNaskahID()
    {
        $this->db->select_max('id');
        $naskah = $this->db->get('naskah')->row_array();
        return $naskah['id'];
    }

    public function getListNaskah()
    {
        return $this->db->get('naskah')->result_array();
    }

    public function getNaskahDetail($naskah_id)
    {
        return $this->db->get_where('naskah_full', ['id' => $naskah_id])->row_array();
    }

    public function getListFileNaskah($naskah_id)
    {
        return $this->db->get_where('naskah_files', ['naskah_id' => $naskah_id])->result_array();
    }

    public function getNaskahFileName($filenaskah_id)
    {
        $this->db->where('id', $filenaskah_id);
        $file_naskah = $this->db->get('naskah_files')->row_array();
        return $file_naskah['file_name'];
    }

    public function deleteNaskah($naskah_id)
    {
        $this->db->where('id', $naskah_id);
        $this->db->delete('naskah');

        $this->db->where('naskah_id', $naskah_id);
        $this->db->delete('naskah_files');
    }

}