<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
    }
    
    public function index()
    {
        if($this->session->userdata('username')) {
            redirect('user');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus diisi.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login - Sistem Informasi Kearsipan";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi berhasil
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $loginstatus = $this->Auth_model->login_user($username, $password);

        if($loginstatus == 3) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar!</div>');
            redirect('auth');
		} else {
            if ($loginstatus == 1) {
                $roleuser = $this->Auth_model->cek_role();
                if ($roleuser == 1) {
                    redirect('admin');
                } else if($roleuser == 4){
                    redirect('inactiveuser');
                } else {
                    redirect('profil');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        }
    }
    
    public function registration()
    {
        if($this->session->userdata('username')) {
            redirect('user');
        }
        
        $this->form_validation->set_rules('nama', 'Name', 'required|trim', [
            'required' => 'Nama harus diisi.'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username harus diisi.',
            'is_unique' => 'Username sudah terdaftar.'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password harus diisi.',
            'min_length' => 'Password terlalu pendek.',
            'matches' => 'Password tidak cocok.'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //kalau form validation belum diisi semuanya, kembali lg ke signup page
        if ($this->form_validation->run() == false) {
            $data['title'] = "Sign Up - Sistem Informasi Kearsipan";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi berhasil
            $data = [
                //ditambahkan true untuk menghindari XSS (cross-side scripting)
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jabatan' => 'Belum ditentukan',
                'username' => htmlspecialchars($this->input->post('username', true)),
                //password_hash adalah function bawaan php, untuk enkripsi password
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3, //inactive member
                'date_created' => time()
            ];
            
            $this->Auth_model->register($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun anda berhasil dibuat!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil log out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}