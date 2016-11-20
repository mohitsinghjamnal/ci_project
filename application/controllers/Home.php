<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['id'] = $session_data['id'];
			$data['fullname'] = $session_data['fullname'];
			$data['username'] = $session_data['username'];
			$this->load->view('home_view', $data);
		}else{
			redirect('login','refresh');
		}
	}

	public function logout()
	{

		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect(site_url('login'),'refresh');
	}

}
