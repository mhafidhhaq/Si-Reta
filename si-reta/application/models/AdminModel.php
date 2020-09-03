<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
  public function getAdmin()
  {
    return $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
  }

  public function getLokeractive($limit, $start)
  {
    return $this->db->get_where('loker', ['status' => 'aktif'], $limit, $start)->result_array();
  }

  public function getLokernonactive()
  {
    return $this->db->get_where('loker', ['status' => 'nonaktif'])->result_array();
  }

  public function getLokernum()
  {
    return $this->db->get_where('loker', ['status' => 'nonaktif']);
  }

  public function countAllLokerActive()
  {
    return $this->db->get_where('loker', ['status' => 'aktif'])->num_rows();
  }

  public function getLoker()
  {
    return $this->db->get('loker')->result_array();
  }

  public function updateLoker($id, $nama_lowongan, $syarat, $status)
  {
    $query = "UPDATE `loker` SET
                `nama_lowongan` = '$nama_lowongan',
                `syarat` = '$syarat',
                `status` = '$status'
                WHERE `id` = $id
              ";
    return $this->db->query($query);
  }

  public function getPelamar($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('nama', $keyword);
      $this->db->or_like('posisi', $keyword);
    }
    $this->db->order_by('posisi', 'ASC');
    return $this->db->get('pelamar', $limit, $start)->result_array();
  }

  public function getDetailPelamar($id)
  {
    return $this->db->get_where('pelamar', ['id' => $id])->row_array();
  }

  public function countAllPelamar()
  {
    return $this->db->get_where('pelamar')->num_rows();
  }
}
