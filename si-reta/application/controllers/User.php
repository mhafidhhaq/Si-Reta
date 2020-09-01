<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('UserModel', 'user');
    if ($this->session->userdata('username')) {
      redirect('welcome');
    }
  }

  public function index()
  {
    $data['title'] = 'Halaman User';
    $status = "aktif";
    $data['loker'] = $this->user->getAll();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }

  public function lamar($id)
  {
    $data = [
      'title' => 'Form Lamar Lowongan Kerja',
      'posisi' => $id,
      'lowongan' => $this->user->getPosisi($id)
    ];

    $pelamar = $this->db->get('pelamar')->result_array();

    $this->form_validation->set_rules('nama', 'Nama', 'required|trim|callback_nama_check', [
      'required' => 'Nama harus diisi!'
    ]);
    // form validation pada input pendidikan tidak berfungsi
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required', [
      'required' => 'Pendidikan terakhir harus dipilih!'
    ]);
    $this->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required|callback_spesialisasi_check', [
      'required' => 'Spesialisasi harus diisi!'
    ]);
    $this->form_validation->set_rules('file', '', 'callback_file_check');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
      'required' => 'Alamat harus diisi!'
    ]);
    $this->form_validation->set_rules('tentang', 'Tentang', 'required|trim|callback_tentang_check', [
      'required' => 'Tentang harus diisi!'
    ]);
    $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|numeric|min_length[11]|max_length[13]', [
      'required' => 'Nomor Telepon harus diisi!',
      'numeric' => 'Nomor Telepon harus angka!',
      'min_length' => 'Nomor Telepon minimal memiliki 11 angka!',
      'max_length' => 'Nomor Telepon maksimal memiliki 13 angka!'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
      'required' => 'Email harus diisi!',
      'valid_email' => 'Penulisan Email tidak sesuai!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('user/form-lamar', $data);
      $this->load->view('templates/footer');
    } else {
      $cv = $_FILES['cv'];
      if (empty($_FILES['cv']['name'])) {
      } else {
        $config['upload_path'] = './assets/cv/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '10240';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('cv')) {
          $cv = $this->upload->data('file_name');
        }
      }

      $data = [
        'posisi' => htmlspecialchars($this->input->post('posisi', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'pendidikan' => $this->input->post('pendidikan', true),
        'spesialisasi' => htmlspecialchars($this->input->post('spesialisasi', true)),
        'cv' => $cv,
        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        'tentang' => htmlspecialchars($this->input->post('tentang', true)),
        'telepon' => $this->input->post('telepon', true),
        'email' => $this->input->post('email', true),
        'date_submitted' => time()
      ];

      $this->db->insert('pelamar', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Lamaran Anda berhasil dimasukkan. Pihak Diskominfotik Lampung akan menghubungi Anda untuk informasi selanjutnya. </div>');
      redirect('user');
    }
  }

  public function file_check()
  {
    $allowed_mime_type_arr = array('application/pdf');
    $mime = get_mime_by_extension($_FILES['cv']['name']);
    if (isset($_FILES['cv']['name']) && $_FILES['cv']['name'] != '') {
      if ($_FILES['cv']['size'] > 10240000 && !in_array($mime, $allowed_mime_type_arr)) {
        $this->form_validation->set_message('file_check', 'Ekstensi file CV harus PDF!');
        return false;
      } elseif ($_FILES['cv']['size'] > 10240000) {
        $this->form_validation->set_message('file_check', 'Ukuran file CV maksimal 10MB!');
        return false;
      }

      if (in_array($mime, $allowed_mime_type_arr)) {
        return true;
      } else {
        $this->form_validation->set_message('file_check', 'Ekstensi file CV harus PDF!');
        return false;
      }
    } else {
      $this->form_validation->set_message('file_check', 'CV harus diupload!');
      return false;
    }
  }

  public function nama_check()
  {
    $nama = trim($this->input->post('nama', true));
    if (!preg_match("/^[a-zA-Z. ]*$/", $nama)) {
      $this->form_validation->set_message('nama_check', 'Nama hanya boleh mengandung huruf, spasi, dan titik!');
      return false;
    } else {
      return true;
    }
  }

  public function spesialisasi_check()
  {
    $spesialisasi = trim($this->input->post('spesialisasi', true));
    if (!preg_match("/^[a-zA-Z0-9., ]*$/", $spesialisasi)) {
      $this->form_validation->set_message('spesialisasi_check', 'Spesialisasi hanya boleh mengandung huruf, angka, spasi, tanda titik, dan koma!');
      return false;
    } else {
      return true;
    }
  }

  public function tentang_check()
  {
    $tentang = trim($this->input->post('tentang', true));
    if (!preg_match("/^[a-zA-Z0-9., ]*$/", $tentang)) {
      $this->form_validation->set_message('tentang_check', 'Tentang hanya boleh mengandung huruf, angka, spasi, tanda titik, dan koma!');
      return false;
    } else {
      return true;
    }
  }
}
