<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Profil_model');
        $this->load->model('Sidebar_model');
    }

    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Profil_model->userLogged();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profil/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profil';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Profil_model->userLogged();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi.'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
            'required' => 'Jabatan harus diisi.'
        ]);

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profil/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');
            $username = $this->input->post('username');
            $this->Profil_model->updateuser($nama, $jabatan, $username);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perubahan pada profil berhasil disimpan.</div>');
            redirect('profil');
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Ubah Password';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Profil_model->userLogged();

        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim', [
            'required' => 'Password lama harus diisi.'
        ]);
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]', [
            'required' => 'Password baru harus diisi.',
            'min_length' => 'Password terlalu pendek.',
            'matches' => ''
        ]);
        $this->form_validation->set_rules('new_password2', 'Ulang Password Baru', 'required|trim|matches[new_password1]', [
            'required' => 'Ulangi Password Baru.',
            'matches' => 'Password tidak cocok.'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profil/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (password_verify($current_password, $data['user']['password'])) {
                if($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama.</div>');
                    redirect('profil/changepassword');
                } else {
                    $new_pw = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->Profil_model->updatepassword($new_pw);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('profil/changepassword');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('profil/changepassword');
            }
        }

    }
}