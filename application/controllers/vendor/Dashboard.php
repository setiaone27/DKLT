<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_anggota');
		$this->load->model('M_divisi');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] 			= "Dashboard";
		$data['jumlahAnggota']  = $this->M_anggota->hitungAnggota();
		$data['jumlahDivisi']   = $this->M_divisi->hitungDivisi();
		$data['jumlahUser']     = $this->M_login->hitungUser();
		$data['getdevisi'] 	    = $this->M_divisi->getDivisi();
		$data['list']  			= $this->M_anggota->getLimitAnggota();

		$this->load->view('vendor/dashboard', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
        $this->session->unset_userdata('last_name');
        $sdata['message'] = "Logout Berhasil";
        $this->session->set_userdata($sdata);
		redirect('login', 'refresh');
	}
}
