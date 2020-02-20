<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index($id_user = null)
	{
		$id_user	= $this->session->userdata('user_id');

		$this->db->where('id_user', $id_user);

		$data['profile'] = $this->db->get('user');

		$data['title']	= "Profile";

		$this->load->view('vendor/profile', $data);
	}

	public function update($id_user = null)
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
			
			$id_user	= $this->session->userdata('user_id');
			
			$data = array(
				'foto' 			=> $photo,
				'nama_lengkap' 	=> $this->input->post('nama_lengkap'),
				'username' 		=> $this->input->post('username'),
				'email'     	=> $this->input->post('email'),
				'no_hp'     	=> $this->input->post('no_hp'),
				'alamat'     	=> $this->input->post('alamat')
			);
		
			$this->db->where('id_user', $id_user);
		
			$this->db->update('user', $data);
		
			echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer" title="Close"> <span aria-hidden="true">&times;</span> </button>
			<strong>Sukses!!! <i class="fa fa-smile-o"></i></strong> Profile Berhasil Diubah. Silahkan Logout<a href="dashboard/logout" style="text-decoration: none"> <strong  style="color: white">disini</a></strong> Jika Anda Ingin Melihat Perubahan Pada Profile Anda</div>');
			
			redirect('vendor/profile');
		}else if($this->input->post('newpassword') AND $this->upload->do_upload('userfile')){
			$file_data 	= $this->upload->data();
			
			$photo 		= $file_data['file_name'];

			$id_user = $this->session->userdata('user_id');
			
			$data = array(
				'foto' 			=> $photo,
				'nama_lengkap' 	=> $this->input->post('nama_lengkap'),
				'password'     	=> md5($this->input->post('newpassword')),
				'username' 		=> $this->input->post('username'),
				'email'     	=> $this->input->post('email'),
				'no_hp'     	=> $this->input->post('no_hp'),
				'alamat'     	=> $this->input->post('alamat')
			);			
		
			$this->db->where('id_user', $id_user);
			
			$this->db->update('user', $data);
			
			echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer" title="Close"> <span aria-hidden="true">&times;</span> </button>
			<strong>Sukses!!! <i class="fa fa-smile-o"></i></strong> Profile Berhasil Diubah. Silahkan Logout<a href="dashboard/logout" style="text-decoration: none"> <strong  style="color: white">disini</a></strong> Jika Anda Ingin Melihat Perubahan Pada Profile Anda</div>');
			
			redirect('vendor/profile');
		}
		else{
			$id_user = $this->session->userdata('user_id');
			
			$data = array(
				'nama_lengkap' 	=> $this->input->post('nama_lengkap'),
				'username' 		=> $this->input->post('username'),
				'email'     	=> $this->input->post('email'),
				'no_hp'     	=> $this->input->post('no_hp'),
				'alamat'     	=> $this->input->post('alamat')
			);			
		
			$this->db->where('id_user', $id_user);
			
			$this->db->update('user', $data);
			
			echo $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer" title="Close"> <span aria-hidden="true">&times;</span> </button>
			<strong>Sukses!!! <i class="fa fa-smile-o"></i></strong> Profile Berhasil Diubah. Silahkan Logout<a href="dashboard/logout" style="text-decoration: none"> <strong  style="color: white">disini</a></strong> Jika Anda Ingin Melihat Perubahan Pada Profile Anda</div>');
			
			redirect('vendor/profile');
		}
	}


}
