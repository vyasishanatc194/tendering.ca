<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('accounts_model');
	}

	public function index()
	{
		process_login();

		$this->view_data['title'] = "Accounts";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->view_data['accounts'] = $this->accounts_model->get();

		$this->_view('accounts/index');
		$this->_view('accounts/index_styles', 21);
		$this->_view('accounts/index_js', 81);
		$this->_render();
	}

	public function delete($account_id = NULL)
	{
		process_login();

		if (!$account_id)
			redirect('accounts');

		$this->view_data['account'] = $this->accounts_model->get_row(array(
			'account_id' => $account_id
		));

		if (!$account_id)
			redirect('accounts');

		if ($this->account_model->delete_row(array(
			'account_id' => $account_id
		)))
			$this->session->set_flashdata('success', 'Account account removed successfully');
		else
			$this->session->set_flashdata('error', 'Database error');

		redirect('accounts');
	}
}
