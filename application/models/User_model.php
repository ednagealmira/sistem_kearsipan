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
        $sql = "SELECT n.*, j.jenis as jenis, tp.tperkembangan as tp, u.urgensi as urgensi, s.sifat as sifat, k.kategoriarsip as kategori, tap.taksespublik as tap, m.media_arsip as media, b.bahasa as bahasa, sv.statusvital as statusvital, sj.satuanjumlah as sj
                FROM `naskah` n 
                JOIN `naskah_jenis` j ON n.jenis_id = j.id
                JOIN `naskah_tperkembangan` tp ON n.tperkembangan_id = tp.id
                JOIN `naskah_urgensi` u ON n.urgensi_id = u.id
                JOIN `naskah_sifat` s ON n.sifat_id = s.id
                JOIN `naskah_kategori` k ON n.kategori_id = k.id
                JOIN `naskah_taksespublik` tap ON n.kategori_id = tap.id
                JOIN `naskah_media` m ON n.media_id = m.id
                JOIN `naskah_bahasa` b ON n.bahasa_id = b.id
                JOIN `naskah_statusvital` sv ON n.statusvital_id = sv.id
                JOIN `naskah_satuanjumlah` sj ON n.satuanjumlah_id = sj.id
                WHERE n.id = $naskah_id";

        return $this->db->query($sql)->row_array();
    }

    // public function deleteNaskah($naskah_id)
    // {
    //     $this->db->where('id', $naskah_id);
    //     $this->db->delete('naskah');
    // }

}