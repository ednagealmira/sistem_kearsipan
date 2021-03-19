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

    public function registrasiNaskahMenu()
    {
        $data['title'] = 'Registrasi Naskah';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['menu_pengaturan'] = $this->Sidebar_model->getMenuPengaturan();
        $data['user'] = $this->User_model->userLogged();        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/registrasinaskah_menu', $data);
        $this->load->view('templates/footer');
    }

    public function registrasiNaskah($status_registrasi)
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
            if ($status_registrasi == 'external') $data['status_naskah'] = 'Masuk';
            else if ($status_registrasi == 'internal') $data['status_naskah'] = 'Keluar';
            $data['menu'] = $this->Sidebar_model->getRoleMenu();
            $data['submenu'] = $this->Sidebar_model->getSideMenu();
            $data['menu_pengaturan'] = $this->Sidebar_model->getMenuPengaturan();
            $data['user'] = $this->User_model->userLogged();
    
            $data['jnaskah'] = $this->User_model->getJNaskah();
            $data['tperkembangan'] = $this->User_model->getTPerkembangan();
            $data['turgensi'] = $this->User_model->getTUrgensi();
            $data['sifatnaskah'] = $this->User_model->getSifat();
            $data['kategoriarsip'] = $this->User_model->getKArsip();
            $data['taksespublik'] = $this->User_model->getTAPublik();
            $data['mediaarsip'] = $this->User_model->getMedia();
            $data['bahasa'] = $this->User_model->getBahasa();
            $data['statusvital'] = $this->User_model->getStatusVital();
            $data['satuanjumlah'] = $this->User_model->getSatuanJumlah();
            $data['statusregistrasi'] = $status_registrasi;
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/registrasinaskah', $data);
            $this->load->view('templates/footer');
        } else {
            // validasi berhasil
            $userlogged = $this->User_model->userLogged();
            
            $data = [
                // ditambahkan true untuk menghindari XSS (cross-site scripting)
                'tgl_regis' => time(),
                'role_id' => $userlogged['role_id'],
                'jenis_id' => $this->input->post('jnaskah'),
                'tperkembangan_id' => $this->input->post('tperkembangan'),
                'tgl_naskah' => strtotime($this->input->post('tglnaskah')),
                'nomor' => htmlspecialchars($this->input->post('nonaskah')),
                'nomor_agenda' => htmlspecialchars($this->input->post('noagenda')),
                'hal' => htmlspecialchars($this->input->post('hal')),
                'urgensi_id' => $this->input->post('turgensi'),
                'sifat_id' => $this->input->post('sifatnaskah'),
                'kategori_id' => $this->input->post('kategoriarsip'),
                'taksespublik_id' => $this->input->post('taksespublik'),
                'taksespublik_id' => $this->input->post('taksespublik'),
                'pengirim' => $status_registrasi,
                'instansi_pengirim' => htmlspecialchars($this->input->post('instansipengirim')),
                'nama_pengirim' => htmlspecialchars($this->input->post('namapengirim')),
                'jabatan_pengirim' => htmlspecialchars($this->input->post('jabatanpengirim')),
                'penerima' => htmlspecialchars($this->input->post('penerima')),
                'tembusan' => htmlspecialchars($this->input->post('tembusan')),
                'media_id' => $this->input->post('mediaarsip'),
                'bahasa_id' => $this->input->post('bahasa'),
                'isi' => htmlspecialchars($this->input->post('isiringkas')),
                'tesaurus' => htmlspecialchars($this->input->post('tesaurus')),
                'statusvital_id' => $this->input->post('statusvital'),
                'jumlah' => $this->input->post('jumlah'),
                'satuanjumlah_id' => $this->input->post('satuanjumlah'),
                'tipe' => 'inbox',
            ];
            $this->User_model->addNaskah($data);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi naskah berhasil!</div>');
            redirect('user/registrasi_addfile');
        }
    }

    public function registrasi_addfile()
    {
        $data['title'] = 'Sisipkan File Digital';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['menu_pengaturan'] = $this->Sidebar_model->getMenuPengaturan();
        $data['user'] = $this->User_model->userLogged();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/registrasi_addfile', $data);
        $this->load->view('templates/footer');
    }

    public function doAddFileNaskah()
    {
        // Hitung Jumlah File yang dipilih
        $jumlahData = count($_FILES['file_naskah']['name']);

        // Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
        for ($i=0; $i < $jumlahData ; $i++) {

            // Inisialisasi Nama,Tipe,Dll.
            $_FILES['file']['name']     = $_FILES['file_naskah']['name'][$i];
            $_FILES['file']['type']     = $_FILES['file_naskah']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['file_naskah']['tmp_name'][$i];
            $_FILES['file']['size']     = $_FILES['file_naskah']['size'][$i];

            // Konfigurasi Upload
            $config['upload_path'] = './assets/filesUploaded/naskahdoc/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size']     = '2048';

            // Memanggil Library Upload dan Setting Konfigurasi
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('file')){ // Jika Berhasil Upload
                $fileData = $this->upload->data(); // Lakukan Upload Data
                // Membuat Variable untuk dimasukkan ke Database
                $uploadData[$i]['naskah_id'] = $this->User_model->getNaskahID();
                $uploadData[$i]['file_name'] = $fileData['file_name']; 
            } else {
                // $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload file *.pdf, *.jpg, *.jpeg, atau *.png dengan ukuran maksimal 2048KB.</div>');
                redirect('user/registrasi_addfile');
            }
        }

        if($uploadData != null){ // Jika Berhasil Upload
            // Insert ke Database 
            $insert = $this->User_model->addFileNaskah($uploadData);
            
            if($insert){ // Jika Berhasil Insert
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Naskah berhasil diregistrasi!</div>');
                redirect('user/lognaskah');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan file.</div>');
                redirect('user/registrasi_addfile');
            }
        }
    }

    public function downloadTemplate()
    {
        $data['title'] = 'Download Template';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['menu_pengaturan'] = $this->Sidebar_model->getMenuPengaturan();
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
        $file_name = $this->User_model->getTempFileName($template_id);
        $file_path = './assets/filesUploaded/templatedoc/'.$file_name;
        $this->load->helper('download');
        force_download($file_path, NULL);
    }
    
    public function logNaskah()
    {
        $data['title'] = 'Log Naskah';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['menu_pengaturan'] = $this->Sidebar_model->getMenuPengaturan();
        $data['user'] = $this->User_model->userLogged();
        $data['listnaskah'] = $this->User_model->getListNaskah();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lognaskah', $data);
        $this->load->view('templates/footer');
    }

    public function naskahdelete($naskah_id)
    {
        $status_delete = $this->User_model->deleteNaskah($naskah_id);
        if ($status_delete == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Naskah berhasil dihapus.</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Naskah gagal dihapus.</div>');
        }
        redirect('user/lognaskah');
    }

    public function detailnaskah($naskah_id)
    {
        $data['title'] = 'Detail Naskah';
        $data['menu'] = $this->Sidebar_model->getRoleMenu();
        $data['submenu'] = $this->Sidebar_model->getSideMenu();
        $data['menu_pengaturan'] = $this->Sidebar_model->getMenuPengaturan();
        $data['user'] = $this->User_model->userLogged();
        $data['naskahdetail'] = $this->User_model->getNaskahDetail($naskah_id);
        $data['filenaskah'] = $this->User_model->getListFileNaskah($naskah_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detailnaskah', $data);
        $this->load->view('templates/footer');
    }

    public function naskahdownload($filenaskah_id)
    {
        $file_name = $this->User_model->getNaskahFileName($filenaskah_id);
        $file_path = './assets/filesUploaded/naskahdoc/'.$file_name;
        $this->load->helper('download');
        force_download($file_path, NULL);
    }

}