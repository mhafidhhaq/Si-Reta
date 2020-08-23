<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('username')) {
      redirect('welcome');
    }

    $this->load->model('AdminModel', 'admin');
  }

  public function index()
  {
    $data['title'] = 'Manajemen Lowongan Kerja';
    $data['user'] = $this->admin->getAdmin();
    $data['lokerNum'] = $this->admin->getLokernum();
    $data['start'] = $this->uri->segment(3);

    // PAGINATION
    // config
    $config['base_url'] = 'http://localhost/si-rena/admin/index';
    $config['total_rows'] = $this->admin->countAllLokerActive();
    $config['per_page'] = 5;

    // styling
    $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
    $config['full_tag_close'] = '</ul></nav>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link');
    // Inisialisasi
    $this->pagination->initialize($config);
    // END PAGINATION

    $data['loker'] = $this->admin->getLokeractive($config['per_page'], $data['start']);
    $data['lokerNonaktif'] = $this->admin->getLokernonactive();

    // $data['allLoker'] = $this->admin->getLoker();

    $this->form_validation->set_rules('loker', 'Loker', 'required', [
      'required' => 'Nama Lowongan Kerja harus diisi!'
    ]);
    $this->form_validation->set_rules('syarat', 'Syarat', 'required', [
      'required' => 'Syarat harus diisi!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin-header', $data);
      $this->load->view('templates/admin-sidebar');
      $this->load->view('templates/admin-topbar');
      $this->load->view('admin/index', $data);
      $this->load->view('templates/admin-footer');
    } else {
      $data = [
        'nama_lowongan' => $this->input->post('loker'),
        'syarat' => $this->input->post('syarat'),
        'status' => $this->input->post('status'),
        'date_created' => time()

      ];
      $this->db->insert('loker', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lowongan Kerja Berhasil Ditambahkan</div>');
      redirect('admin');
    }
  }

  public function delete($id)
  {
    $this->db->delete('loker', array('id' => $id));
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data lowongan kerja berhasil dihapus.</div>');
    redirect('admin/');
  }

  public function update()
  {
    $id = $_GET["id"];
    $data['title'] = 'Ubah Lowongan Kerja';
    $data['user'] = $this->admin->getAdmin();
    $data['loker'] = $this->db->get_where('loker', ['id' => $id])->row_array();

    $this->form_validation->set_rules('syarat', 'Syarat', 'required', [
      'required' => 'Syarat harus diisi!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin-header', $data);
      $this->load->view('templates/admin-sidebar');
      $this->load->view('templates/admin-topbar');
      $this->load->view('admin/ubah-loker', $data);
      $this->load->view('templates/admin-footer');
    } else {
      $nama_lowongan = htmlspecialchars($this->input->post('nama'));
      $syarat = htmlspecialchars($this->input->post('syarat'));
      $status = $this->input->post('gridStatus');

      // $this->db->set('nama_lowongan', $nama_lowongan);
      // $this->db->set('syarat', $syarat);
      // $this->db->set('status', $status);
      // $this->db->where('id', $id);
      // $this->db->update('loker');
      $this->admin->updateLoker($id, $nama_lowongan, $syarat, $status);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data lowongan kerja berhasil diubah!</div>');
      redirect('admin');
    }
  }

  public function pelamar()
  {
    $data['title'] = 'Manajemen Pelamar Lowongan Kerja';
    $data['user'] = $this->admin->getAdmin();
    $data['start'] = $this->uri->segment(3);

    // PAGINATION
    // config
    $config['base_url'] = 'http://localhost/si-rena/admin/pelamar';
    $config['total_rows'] = $this->admin->countAllPelamar();
    $config['per_page'] = 5;

    // styling
    $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
    $config['full_tag_close'] = '</ul></nav>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link');
    // Inisialisasi
    $this->pagination->initialize($config);
    // END PAGINATION

    $data['pelamar'] = $this->admin->getPelamar($config['per_page'], $data['start']);

    $this->load->view('templates/admin-header', $data);
    $this->load->view('templates/admin-sidebar');
    $this->load->view('templates/admin-topbar');
    $this->load->view('admin/pelamar', $data);
    $this->load->view('templates/admin-footer');
  }

  public function detailPelamar()
  {
    $id = $this->uri->segment(3);
    $data['title'] = 'Detail Pelamar';
    $data['user'] = $this->admin->getAdmin();
    $data['detailPelamar'] = $this->admin->getDetailPelamar($id);

    $this->load->view('templates/admin-header', $data);
    $this->load->view('templates/admin-sidebar');
    $this->load->view('templates/admin-topbar');
    $this->load->view('admin/detail-pelamar', $data);
    $this->load->view('templates/admin-footer');
  }

  public function download($id)
  {
    $id = $this->uri->segment(3);

    if (!empty($id)) {
      // Get file info from database
      $fileInfo = $this->admin->getDetailPelamar($id);

      // File path
      $file = 'assets/cv/' . $fileInfo['cv'];

      // Download file
      force_download($file, null);
    }
  }

  public function deletePelamar($id)
  {
    $data['detailPelamar'] = $this->admin->getDetailPelamar($id);
    $file = $data['detailPelamar']['cv'];

    $this->db->delete('pelamar', array('id' => $id));
    if ($file != null) {
      unlink(FCPATH . 'assets/cv/' . $file);
    }
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pelamar berhasil dihapus.</div>');
    redirect('admin/pelamar');
  }
}
