<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Home';
		$data['hero'] = $this->M_heroUnit->getHero();
		$this->load->view('template/header.php', $data);
		$this->load->view('template/navbar.php');
		$this->load->view('layouts/v_home');
		$this->load->view('template/footer.php');
		$this->load->model('M_heroUnit');
	}
}
