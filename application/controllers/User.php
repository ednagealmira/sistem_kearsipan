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
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/registrasinaskah', $data);
        $this->load->view('templates/footer');
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