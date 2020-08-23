<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
  public function getAll()
  {
    return $this->db->get_where('loker', ['status' => 'aktif'])->result_array();
  }

  public function getPosisi(string $id)
  {
    $query = "SELECT `nama_lowongan` FROM `loker` WHERE `id` = $id";
    return $this->db->query($query)->result_array();
  }
}
