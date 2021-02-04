<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inactiveuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Sidebar_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Selamat Datang, ' . $data['user']['nama'];
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('inactiveuser/index', $data);
        $this->load->view('templates/footer');
    }
}