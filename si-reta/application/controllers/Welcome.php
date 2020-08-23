<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Selamat Datang di Si-Reta';

    $this->load->view('templates/header', $data);
    $this->load->view('welcome/index');
    $this->load->view('templates/footer');
  }
}
