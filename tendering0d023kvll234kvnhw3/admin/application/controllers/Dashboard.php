<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		process_login();

		$this->view_data['title'] = "Dashboard";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->_view('dashboard/index');
		$this->_view('dashboard/styles', 21);
		$this->_view('dashboard/js', 81);
		$this->_render();
	}
}
