<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Sidebar_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Halaman Utama';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->User_model->userLogged();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function registrasiNaskah()
    {
        $this->form_validation->set_rules('jnaskah', 'Jenis Naskah', 'required|trim', ['required' => 'Jenis Naskah harus diisi.']);
        $this->form_validation->set_rules('tperkembangan', 'Tingkat Perkembangan', 'required|trim', ['required' => 'Tingkat Perkembangan harus diisi.']);
        $this->form_validation->set_rules('tglnaskah', 'Tanggal Naskah', 'required|trim', ['required' => 'Tanggal Naskah harus diisi.']);
        $this->form_validation->set_rules('nonaskah', 'Nomor Naskah', 'required|trim', ['required' => 'Nomor Naskah harus diisi.']);
        $this->form_validation->set_rules('noagenda', 'Nomor Agenda', 'required|trim', ['required' => 'Nomor Agenda harus diisi.']);
        $this->form_validation->set_rules('hal', 'Hal', 'required|trim', ['required' => 'Hal harus diisi.']);
        $this->form_validation->set_rules('turgensi', 'Tingkat Urgensi', 'required|trim', ['required' => 'Tingkat Urgensi harus diisi.']);
        $this->form_validation->set_rules('sifatnaskah', 'Sifat Naskah', 'required|trim', ['required' => 'Sifat Naskah harus diisi.']);
        $this->form_validation->set_rules('kategoriarsip', 'Kategori Arsip', 'required|trim', ['required' => 'Kategori Arsip harus diisi.']);
        $this->form_validation->set_rules('taksespublik', 'Tingkat Akses Publik', 'required|trim', ['required' => 'Tingkat Akses Publik harus diisi.']);
        // $this->form_validation->set_rules('refbalasan', 'Referensi Balasan', 'required|trim', ['required' => 'Referensi Balasan harus diisi.']);
        $this->form_validation->set_rules('instansipengirim', 'Instansi Pengirim', 'required|trim', ['required' => 'Instansi Pengirim harus diisi.']);
        $this->form_validation->set_rules('namapengirim', 'Nama Pengirim', 'required|trim', ['required' => 'Nama Pengirim harus diisi.']);
        $this->form_validation->set_rules('jabatanpengirim', 'Jabatan Pengirim', 'required|trim', ['required' => 'Jabatan Pengirim harus diisi.']);
        $this->form_validation->set_rules('penerima', 'Penerima', 'required|trim', ['required' => 'Penerima harus diisi.']);
        $this->form_validation->set_rules('tembusan', 'Tembusan', 'required|trim', ['required' => 'Tembusan harus diisi.']);
        $this->form_validation->set_rules('mediaarsip', 'Media Arsip', 'required|trim', ['required' => 'Media Arsip harus diisi.']);
        $this->form_validation->set_rules('bahasa', 'Bahasa', 'required|trim', ['required' => 'Bahasa harus diisi.']);
        $this->form_validation->set_rules('isiringkas', 'Isi Ringkas', 'required|trim', ['required' => 'Isi Ringkas harus diisi.']);
        $this->form_validation->set_rules('tesaurus', 'Tesaurus', 'required|trim', ['required' => 'Tesaurus harus diisi.']);
        $this->form_validation->set_rules('statusvital', 'Status Vital', 'required|trim', ['required' => 'Status Vital harus diisi.']);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim', ['required' => 'Jumlah harus diisi.']);
        $this->form_validation->set_rules('satuanjumlah', 'Satuan Jumlah', 'required|trim', ['required' => 'Satuan Jumlah harus diisi.']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Naskah';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->User_model->userLogged();
    
            $data['jnaskah'] = $this->db->get('naskah_jenis')->result_array();
            $data['tperkembangan'] = $this->db->get('naskah_tperkembangan')->result_array();
            $data['turgensi'] = $this->db->get('naskah_urgensi')->result_array();
            $data['sifatnaskah'] = $this->db->get('naskah_sifat')->result_array();
            $data['kategoriarsip'] = $this->db->get('naskah_kategori')->result_array();
            $data['taksespublik'] = $this->db->get('naskah_taksespublik')->result_array();
            $data['mediaarsip'] = $this->db->get('naskah_media')->result_array();
            $data['bahasa'] = $this->db->get('naskah_bahasa')->result_array();
            $data['statusvital'] = $this->db->get('naskah_statusvital')->result_array();
            $data['satuanjumlah'] = $this->db->get('naskah_satuanjumlah')->result_array();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/registrasinaskah', $data);
            $this->load->view('templates/footer');
        } else {

        }
    }

    public function downloadTemplate()
    {
        $data['title'] = 'Download Template Dokumen';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->User_model->userLogged();
        $data['templates'] = $this->User_model->getListTemplate();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/downloadtemplate', $data);
        $this->load->view('templates/footer');
    }

    public function templatedownload($template_id)
    {
        $file_name = $this->User_model->getFileName($template_id);
        $file_path = './assets/filesUploaded/templatedoc/'.$file_name;
        $this->load->helper('download');
        force_download($file_path, NULL);
    }
    
    public function logNaskah()
    {
        $data['title'] = 'Log Naskah Keluar';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->User_model->userLogged();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lognaskah', $data);
        $this->load->view('templates/footer');
    }
}