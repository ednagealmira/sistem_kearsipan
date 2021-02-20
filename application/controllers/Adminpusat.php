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
        $data['templates'] = $this->Adminpusat_model->getListTemplate();
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

                $config['upload_path'] = './assets/filesUploaded/templatedoc/';
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_template')) {
                    $file_name = $this->upload->data('file_name');
                } else {
                    // $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload file *.doc, *.docx, atau *.pdf dengan ukuran maksimal 2048KB.</div>');
                    redirect('adminpusat/templatedoc_upload');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File template belum dipilih.</div>');
                redirect('adminpusat/templatedoc_upload');                
            }

            $data = [
                'template_desc' => htmlspecialchars($this->input->post('template_desc', true)),
                'file_name' => $file_name,
                'upload_date' => time()
            ];

            $this->Adminpusat_model->addTemplate($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Template berhasil ditambahkan!</div>');
            redirect('adminpusat/templatedoc');
        }
    }

    public function templatedelete($template_id)
    {
        $res = $this->Adminpusat_model->deleteTemplate($template_id);
        if ($res == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">"File template gagal dihapus."</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Template berhasil dihapus.</div>');
        }
        
        redirect('adminpusat/templatedoc');
    }

    public function templateedit($template_id)
    {
        $this->form_validation->set_rules('template_desc', 'Keterangan', 'required|trim', [
            'required' => 'Keterangan template harus diisi.'
        ]);
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Edit Template Dokumen';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $data['template_edit'] = $this->Adminpusat_model->getTemplateById($template_id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/templatedoc_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $template_desc = $this->input->post('template_desc');
            $this->Adminpusat_model->editTemplate($template_id, $template_desc);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Template berhasil diperbarui!</div>');
            redirect('adminpusat/templatedoc');
        }
    }

    public function templatedownload($template_id)
    {
        $file_name = $this->Adminpusat_model->getFileName($template_id);
        $file_path = './assets/filesUploaded/templatedoc/'.$file_name;
        $this->load->helper('download');
        force_download($file_path, NULL);
    }
}