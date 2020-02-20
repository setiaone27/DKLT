<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title']  = "Data User";
		$data['list'] 	= $this->db->get('user');
		
		$this->load->view('vendor/user/data-user', $data);
	}

	public function aksi_input()
	{
		$config['upload_path'] 	 = './assets/admin/img/profile/';
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
				'foto' 			=> $photo,
				'nama_lengkap' 	=> $this->input->post('nama_lengkap'),
				'password'     	=> md5($this->input->post('password')),
				'username' 		=> $this->input->post('username'),
				'email'     	=> $this->input->post('email'),
				'no_hp'     	=> $this->input->post('no_hp'),
				'alamat'     	=> $this->input->post('alamat')
			);

			$this->db->insert('user', $data);
			$this->session->set_flashdata('input', 'Data berhasil diinput');

			redirect('vendor/data-user');
		}else{
			$data = array(
				'nama_lengkap' 	=> $this->input->post('nama_lengkap'),
				'password'     	=> md5($this->input->post('password')),
				'username' 		=> $this->input->post('username'),
				'email'     	=> $this->input->post('email'),
				'no_hp'     	=> $this->input->post('no_hp'),
				'alamat'     	=> $this->input->post('alamat')
			);

			$this->db->insert('user', $data);
			$this->session->set_flashdata('input', 'Data berhasil diinput');

			redirect('vendor/data-user');
		}
	}

	public function hapususer($id_user)
	{
		$this->db->where('id_user', $id_user);
		
		$this->db->delete('user');

		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');

		redirect('vendor/data-user');
	}

}
