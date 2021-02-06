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

    public function templatedoc()
    {
        $data['title'] = 'Template Dokumen';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Adminpusat_model->userLogged();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminpusat/templatedoc', $data);
        $this->load->view('templates/footer');
    }

    public function templatedoc_upload()
    {
        $this->form_validation->set_rules('template_desc', 'Keterangan', 'required|trim', [
            'required' => 'Keterangan template harus diisi.'
        ]);
        $this->form_validation->set_rules('file_template', 'Dokumen', 'required', [
            'required' => 'Silahkan pilih file template.'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Upload Template Dokumen';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/templatedoc_upload', $data);
            $this->load->view('templates/footer');
        } else {
            if ($_FILES['file_template']['name']) {
                $config['upload_path'] = './assets/filesUploaded/templatedoc';
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_template')) {
                    $file_name = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'template_desc' => htmlspecialchars($this->input->post('template_desc', true)),
                'file_name' => $file_name,
                'upload_date' => time()
            ];

            $this->db->insert('doc_template', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Template berhasil ditambahkan!</div>');
            redirect('adminpusat/templatedoc');
        }
    }
}