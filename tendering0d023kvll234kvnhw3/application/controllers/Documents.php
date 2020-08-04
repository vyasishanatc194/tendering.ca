<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Documents extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('projects_model');
		$this->load->model('documents_model');
	}

	public function index()
	{
		redirect('dashboard');
	}

	public function manage($project_id = NULL)
	{
		process_login("owner");

		if (!$project_id)
			redirect('projects');

		$this->view_data['project'] = $this->projects_model->get_row(array(
			'project_id' => $project_id,
			'account_id' => $this->view_data['active_account']->account_id,
			'active' => TRUE
		));

		if (!$this->view_data['project'])
			redirect('projects');

		if (!$this->view_data['project']->ocaa_number || !$this->view_data['project']->lca_number) {
			$this->session->set_flashdata('error', 'You cannot assign documents before approving by administration');
			redirect('projects');
		}

		$this->view_data['title'] = "Manage Documents";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->load->library('form_validation');

		$this->_view('documents/manage');
		$this->_view('documents/manage_modals', 70);
		$this->_view('documents/manage_js', 82);
		$this->_view('projects/page_start', 41);
		$this->_view('projects/page_end', 79);
		$this->_view('projects/styles', 21);
		$this->_view('projects/js', 81);
		$this->_render();
	}
}
