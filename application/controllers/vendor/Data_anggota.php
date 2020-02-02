<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_anggota');
		$this->load->helper('tanggal_indonesia'); 
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = "Data Anggota";
		$data['list']  = $this->M_anggota->getAnggota();
		$data['divisi'] = $this->db->get('divisi');
		
		$this->load->view('vendor/anggota/data-anggota', $data);
	}

	public function input_anggota()
	{
		$data['title']  = "Input Data Anggota";
		$data['divisi'] = $this->db->get('divisi');
		
		$this->load->view('vendor/anggota/input-anggota', $data);	
	}

	public function aksi_input()
	{
		$config['upload_path'] 	 = './assets/admin/img/anggota/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']    	 = '10000';
		$config['max_width']  	 = '5000';
		$config['max_height']  	 = '5000';
		$config['file_name'] 	 = round(microtime(true) * 1000);

		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('userfile'))
		{
			$file_data 	= $this->upload->data();
			$photo 		= $file_data['file_name'];

			$data = array(
				'nama' 			=> $this->input->post('nama'),
				'tempat_lahir'  => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' 		=> $this->input->post('alamat'),
				'agama' 		=> $this->input->post('agama'),
				'pekerjaan'		=> $this->input->post('pekerjaan'),
				'divisi_id'		=> $this->input->post('divisi_id'),
				'jabatan' 		=> $this->input->post('jabatan'),
				'foto'			=> $photo
			);

			$this->db->insert('anggota', $data);
			$this->session->set_flashdata('input', 'Data berhasil diinput');

			redirect('vendor/data-anggota');
		}else{
			$data = array(
				'nama' 			=> $this->input->post('nama'),
				'tempat_lahir'  => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' 		=> $this->input->post('alamat'),
				'agama' 		=> $this->input->post('agama'),
				'pekerjaan'		=> $this->input->post('pekerjaan'),
				'divisi_id'		=> $this->input->post('divisi_id'),
				'jabatan' 		=> $this->input->post('jabatan')
			);

			$this->db->insert('anggota', $data);
			$this->session->set_flashdata('input', 'Data berhasil diinput');

			redirect('vendor/data-anggota');
		}
	}

	public function editanggota($id_anggota)
	{
		$this->db->where('id_anggota', $id_anggota);

		redirect('vendor/data-anggota');
	}

	public function aksi_edit($id_anggota)
	{
		$config['upload_path'] 	 = './assets/admin/img/anggota/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']    	 = '10000';
		$config['max_width']  	 = '5000';
		$config['max_height']  	 = '5000';
		$config['file_name'] 	 = round(microtime(true) * 1000);

		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('userfile'))
		{
			$file_data 	= $this->upload->data();
			$photo 		= $file_data['file_name'];

			$data = array(
				'nama' 			=> $this->input->post('nama'),
				'tempat_lahir'  => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' 		=> $this->input->post('alamat'),
				'agama' 		=> $this->input->post('agama'),
				'pekerjaan'		=> $this->input->post('pekerjaan'),
				'divisi_id'		=> $this->input->post('divisi_id'),
				'jabatan' 		=> $this->input->post('jabatan'),
				'foto'			=> $photo
			);

			$this->db->where('id_anggota', $id_anggota);

			$this->db->update('anggota', $data);

			$this->session->set_flashdata('edit', 'Data berhasil diubah');

			redirect('vendor/data-anggota');
		}else{
			$data = array(
				'nama' 			=> $this->input->post('nama'),
				'tempat_lahir'  => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' 		=> $this->input->post('alamat'),
				'agama' 		=> $this->input->post('agama'),
				'pekerjaan'		=> $this->input->post('pekerjaan'),
				'divisi_id'		=> $this->input->post('divisi_id'),
				'jabatan' 		=> $this->input->post('jabatan')
			);

			$this->db->where('id_anggota', $id_anggota);

			$this->db->update('anggota', $data);

			$this->session->set_flashdata('edit', 'Data berhasil diubah');

			redirect('vendor/data-anggota');
		}
	}

	public function hapusanggota($id_anggota)
	{
		$this->db->where('id_anggota', $id_anggota);
		
		$this->db->delete('anggota');

		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');

		redirect('vendor/data-anggota');
	}

}
