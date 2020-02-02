<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_divisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_divisi');
		$this->load->helper('tanggal_indonesia'); 
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title']  = "Data Divisi";
		$data['list'] 	= $this->M_divisi->getDivisi();
		
		$this->load->view('vendor/divisi/data-divisi', $data);
	}

	public function aksi_input()
	{
		$data = array(
			'nama_divisi' 		=> $this->input->post('nama_divisi'),
			'tgl_buat'  		=> $this->input->post('tgl_buat'),
			'penanggung_jawab'  => $this->input->post('penanggung_jawab')
		);

		$this->db->insert('divisi', $data);

		$this->session->set_flashdata('input', 'Data berhasil diinput');

		redirect('vendor/data-divisi');
	}

	public function editdivisi($id_divisi)
	{
		$this->db->where('id_divisi', $id_divisi);

		redirect('vendor/data-divisi');
	}

	public function aksi_edit($id_divisi)
	{
		$data = array(
			'nama_divisi' 		=> $this->input->post('nama_divisi'),
			'tgl_buat'  		=> $this->input->post('tgl_buat'),
			'penanggung_jawab'  => $this->input->post('penanggung_jawab')
		);

		$this->db->where('id_divisi', $id_divisi);

		$this->db->update('divisi', $data);

		$this->session->set_flashdata('edit', 'Data berhasil diubah');

		redirect('vendor/data-divisi');
		
	}

	public function hapusdivisi($id_divisi)
	{
		$this->db->where('id_divisi', $id_divisi);
		
		$this->db->delete('divisi');

		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');

		redirect('vendor/data-divisi');
	}

}
