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

    // -------------------------- Pengaturan Umum --------------------------

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

    // -------------------------- Pengaturan Bahasa --------------------------

    public function naskahbahasa()
    {
        $data['title'] = 'Pengaturan Bahasa';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Adminpusat_model->userLogged();
        $data['bahasa'] = $this->Adminpusat_model->getListBahasa();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminpusat/naskahbahasa', $data);
        $this->load->view('templates/footer');
    }

    public function naskahbahasa_add()
    {
        $this->form_validation->set_rules('bahasa', 'Bahasa', 'required|trim', [
            'required' => 'Bahasa harus diisi.'
        ]);
        if  ($this->form_validation->run() == false){
            $data['title'] = 'Tambah Pengaturan Bahasa';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/naskahbahasa_add', $data);
            $this->load->view('templates/footer');
        }
        else {
            $data = [
                'bahasa' => ($this->input->post('bahasa'))
            ];
            $this->Adminpusat_model->addBahasa($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bahasa berhasil ditambahkan!</div>');
            redirect('adminpusat/naskahbahasa');
        }
    }

    public function bahasaedit($bahasa_id)
    {
        $this->form_validation->set_rules('bahasa', 'Bahasa', 'required|trim', [
            'required' => 'Bahasa harus diisi.'
        ]);
        if($this->form_validation->run() == false){
            $data['title'] = 'Edit Pengaturan Bahasa';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $data['bahasa_edit'] = $this->Adminpusat_model->getBahasaById($bahasa_id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/naskahbahasa_edit', $data);
            $this->load->view('templates/footer');
        }
        else{
            $bahasa = $this->input->post('bahasa');
            $this->Adminpusat_model->editBahasa($bahasa_id, $bahasa);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bahasa berhasil diperbarui!</div>');
            redirect('adminpusat/naskahbahasa');
        }
    }

    public function bahasadelete($bahasa_id)
    {
        $this->Adminpusat_model->deleteBahasa($bahasa_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bahasa berhasil dihapus.</div>');
        redirect('adminpusat/naskahbahasa');
    }
  
    // -------------------------- Pengaturan Jenis Naskah --------------------------

    public function jenisnaskah()
    {
        $data['title'] = 'Pengaturan Jenis Naskah';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Adminpusat_model->userLogged();
        $data['jenis'] = $this->Adminpusat_model->getListJenis();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminpusat/jenisnaskah', $data);
        $this->load->view('templates/footer');
    }

    public function jenisnaskah_add()
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim', [
            'required' => 'Jenis Naskah harus diisi.'
        ]);
        if($this->form_validation->run() == false){
            $data['title'] = 'Tambah Pengaturan Jenis Naskah';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/jenisnaskah_add', $data);
            $this->load->view('templates/footer');
        }
        else{
            $data = [
                'jenis' => ($this->input->post('jenis'))
            ];
            $this->Adminpusat_model->addJenis($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Naskah berhasil ditambahkan!</div>');
            redirect('adminpusat/jenisnaskah');
        }
    }

    public function jenisedit($jenis_id)
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim', [
            'required' => 'Jenis Naskah harus diisi.'
        ]);
        if($this->form_validation->run() == false){
            $data['title'] = 'Edit Pengaturan Jenis Naskah';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $data['jenis_edit'] = $this->Adminpusat_model->getJenisById($jenis_id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/jenisnaskah_edit', $data);
            $this->load->view('templates/footer');
        }
        else{
            $jenis = $this->input->post('jenis');
            $this->Adminpusat_model->editJenis($jenis_id, $jenis);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Naskah berhasil diperbarui!</div>');
            redirect('adminpusat/jenisnaskah');
        }
    }

    public function jenisdelete($jenis_id)
    {
        $this->Adminpusat_model->deleteJenis($jenis_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis berhasil dihapus.</div>');
        redirect('adminpusat/jenisnaskah');
    }

    // -------------------------- Pengaturan Media Arsip --------------------------

    public function mediaarsip()
    {
        $data['title'] = 'Pengaturan Media Arsip';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Adminpusat_model->userLogged();
        $data['media'] = $this->Adminpusat_model->getListMedia();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminpusat/mediaarsip', $data);
        $this->load->view('templates/footer');
    }

    public function mediaarsip_add()
    {
        $this->form_validation->set_rules('media_arsip', 'Media', 'required|trim', [
            'required' => 'Media Arsip harus diisi.'
        ]);
        if ($this->form_validation->run() == false){
            $data['title'] = 'Tambah Pengaturan Media Arsip';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/mediaarsip_add', $data);
            $this->load->view('templates/footer');
        }
        else{
            $data = [
                'media_arsip' => ($this->input->post('media_arsip'))
            ];
            $this->Adminpusat_model->addMedia($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Media Arsip berhasil ditambahkan!</div>');
            redirect('adminpusat/mediaarsip');
        }
        
    }

    public function mediaedit($media_id)
    {
        $this->form_validation->set_rules('media_arsip', 'Media', 'required|trim', [
            'required' => 'Media Arsip harus diisi.'
        ]);
        if($this->form_validation->run() == false){
            $data['title'] = 'Edit Pengaturan Media Arsip';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $data['media_edit'] = $this->Adminpusat_model->getMediaById($media_id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/mediaarsip_edit', $data);
            $this->load->view('templates/footer');
        }
        else{
            $arsip_media = $this->input->post('media_arsip');
            $this->Adminpusat_model->editMedia($media_id, $arsip_media);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Media Arsip berhasil diperbarui!</div>');
            redirect('adminpusat/mediaarsip');
        }
        
    }

    public function mediadelete($media_id)
    {
        $this->Adminpusat_model->deleteMedia($media_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Media berhasil dihapus.</div>');
        redirect('adminpusat/mediaarsip');
    }

    // -------------------------- Sifat Naskah --------------------------

    public function sifatnaskah()
    {
        $data['title'] = 'Pengaturan Sifat Naskah';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Adminpusat_model->userLogged();
        $data['sifat'] = $this->Adminpusat_model->getListSifat();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminpusat/sifatnaskah', $data);
        $this->load->view('templates/footer');
    }

    public function sifatnaskah_add()
    {
        $this->form_validation->set_rules('sifat', 'Sifat', 'required|trim', [
            'required' => 'Sifat Naskah harus diisi.'
        ]);
        if($this->form_validation->run() == false){
            $data['title'] = 'Tambah Pengaturan Sifat Naskah';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/sifatnaskah_add', $data);
            $this->load->view('templates/footer');
        }
        else{
            $data = [
                'sifat' => ($this->input->post('sifat'))
            ];
            $this->Adminpusat_model->addSifat($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sifat Naskah berhasil ditambahkan!</div>');
            redirect('adminpusat/sifatnaskah');
        }
        
    }

    public function sifatdelete($sifat_id)
    {
        $this->Adminpusat_model->deleteSifat($sifat_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sifat berhasil dihapus.</div>');
        redirect('adminpusat/sifatnaskah');
    }
    
    // -------------------------- Pengaturan Tingkat Perkembangan --------------------------

    public function tperkembangan()
    {
        $data['title'] = 'Pengaturan Tingkat Perkembangan';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Adminpusat_model->userLogged();
        $data['tperkembangan'] = $this->Adminpusat_model->getListTP();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminpusat/tperkembangan', $data);
        $this->load->view('templates/footer');
    }

    public function tperkembangan_add()
    {
        $this->form_validation->set_rules('tperkembangan', 'Tingkat Perkembangan', 'required|trim', [
            'required' => 'Tingkat Perkembangan harus diisi.'
        ]);
        if($this->form_validation->run() == false){
            $data['title'] = 'Tambah Pengaturan Tingkat Perkembangan';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/tperkembangan_add', $data);
            $this->load->view('templates/footer');
        }
        else{
            $data = [
                'tperkembangan' => ($this->input->post('tperkembangan'))
            ];
            $this->Adminpusat_model->addTP($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tingkat Perkembangan berhasil ditambahkan!</div>');
            redirect('adminpusat/tperkembangan');
        }
    }

    public function tpedit($tp_id)
    {
        $this->form_validation->set_rules('tperkembangan', 'Tingkat Perkembangan', 'required|trim', [
            'required' => 'Tingkat Perkembangan harus diisi.'
        ]);
        if($this->form_validation->run() == false){
            $data['title'] = 'Edit Pengaturan Tingkat Perkembangan';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Adminpusat_model->userLogged();
            $data['tp_edit'] = $this->Adminpusat_model->getTPById($tp_id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('adminpusat/tperkembangan_edit', $data);
            $this->load->view('templates/footer');
        }   
        else{
            $tperkembangan = $this->input->post('tperkembangan');
            $this->Adminpusat_model->editTP($tp_id, $tperkembangan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tingkat Perkembangan berhasil diperbarui!</div>');
            redirect('adminpusat/tperkembangan');
        }
    }

    public function tpdelete($tp_id)
    {
        $this->Adminpusat_model->deleteTP($tp_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item berhasil dihapus.</div>');
        redirect('adminpusat/tperkembangan');
    }
    
    // -------------------------- Template Dokumen --------------------------
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