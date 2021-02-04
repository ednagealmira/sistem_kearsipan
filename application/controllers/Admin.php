<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//cuma mau nambah ajah

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Sidebar_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Admin_model->userLogged();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function role()
    {
        $data['title'] = 'Role';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Admin_model->userLogged();
        $data['role'] = $this->Admin_model->getListRole();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Admin_model->userLogged();
        $data['role'] = $this->Admin_model->getRoleById($role_id);
        $data['listmenu'] = $this->Admin_model->getListMenu();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('templates/footer');
    }
    
    public function changeaccess() {
        $role_id = $this->input->post('roleId');
        $menu_id = $this->input->post('menuId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $this->Admin_model->doChangeAccess($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses berhasil diubah.</div>');
    }
    
    public function usermanagement() {
        $data['title'] = 'Pengaturan Pengguna';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['user'] = $this->Admin_model->userLogged();
        $data['users'] = $this->Admin_model->getListUser();
        $data['roles'] = $this->Admin_model->getListRole();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user_management', $data);
        $this->load->view('templates/footer');
        
    }

    public function useredit($user_id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi.'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
            'required' => 'Jabatan harus diisi.'
        ]);
        
        if($this->form_validation->run() == false) {
            $data['title'] = 'Edit Pengguna';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Admin_model->userLogged();
            $data['user_edit'] = $this->Admin_model->getUserById($user_id);
            $data['roles'] = $this->Admin_model->getListRole();
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/user_management_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');
            $role_id = $this->input->post('role_id');
            
            $this->Admin_model->editUser($user_id, $nama, $jabatan, $role_id);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perubahan berhasil disimpan.</div>');
            redirect('admin/usermanagement');
        }        
    }
    
    public function userdelete($user_id) {
        $this->Admin_model->deleteUser($user_id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengguna berhasil dihapus.</div>');
        redirect('admin/usermanagement');
    }

    public function useradd() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi.'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
            'required' => 'Jabatan harus diisi.'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username harus diisi.',
            'is_unique' => 'Username sudah terdaftar.'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Pilih role untuk pengguna.'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password harus diisi.',
            'min_length' => 'Password terlalu pendek.',
            'matches' => ''
        ]);
        $this->form_validation->set_rules('password2', 'Ulang Password', 'required|trim|matches[password1]', [
            'required' => 'Ulangi Password.',
            'matches' => 'Password tidak cocok.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Pengguna';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['user'] = $this->Admin_model->userLogged();
            $data['roles'] = $this->Admin_model->getListRole();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/user_management_add', $data);
            $this->load->view('templates/footer');
        } else {
            //validasi berhasil
            $data = [
                //ditambahkan true untuk menghindari XSS (cross-side scripting)
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                //password_hash adalah function bawaan php, untuk enkripsi password
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'date_created' => time()
            ];
            $this->Admin_model->addUser($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengguna baru berhasil ditambahkan!</div>');
            redirect('admin/usermanagement');
        }
    }
}