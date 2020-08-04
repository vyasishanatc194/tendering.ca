<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bids extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		process_login("contractor");

		$this->view_data['title'] = "Bids";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->_view('bids/index');
		$this->_view('bids/page_start', 41);
		$this->_view('bids/page_end', 79);
		$this->_view('bids/styles', 21);
		$this->_view('bids/js', 81);
		$this->_render();
	}
}
