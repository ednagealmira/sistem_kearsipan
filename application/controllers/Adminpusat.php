<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpusat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Sidebar_model');
        $this->load->model('Adminpusat_model');
    }

    public function index()
    {
        $data['title'] = 'Pengaturan Umum';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Adminpusat_model->userLogged();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminpusat/index', $data);
        $this->load->view('templates/footer');
    }

    public function uploadTemplate()
    {
        $data['title'] = 'Upload Template Dokumen';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Adminpusat_model->userLogged();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminpusat/uploadtemplate', $data);
        $this->load->view('templates/footer');
    }
}