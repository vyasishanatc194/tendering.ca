<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('projects_model');
	}

	public function index()
	{
		process_login("owner");

		$this->view_data['title'] = "Dashboard";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->view_data['projects'] = $this->projects_model->get(array(
			'account_id' => $this->view_data['active_account']->account_id,
			'active' => TRUE
		));

		$this->_view('projects/index');
		$this->_view('projects/page_start', 41);
		$this->_view('projects/page_end', 79);
		$this->_view('projects/styles', 21);
		$this->_view('projects/js', 81);
		$this->_render();
	}

	public function add()
	{
		process_login("owner");

		$this->view_data['title'] = "Add New Project";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->view_data['project_types'] = structures('project', 'project_types');
		$this->view_data['project_stages'] = structures('project', 'project_stages');
		$this->view_data['zone_locations'] = structures('project', 'zone_locations');
		$this->view_data['fundings'] = structures('project', 'fundings');
		$this->view_data['owner_types'] = structures('project', 'owner_types');
		$this->view_data['tender_stages'] = structures('project', 'tender_stages');
		$this->view_data['procurement_types'] = structures('project', 'procurement_types');
		$this->view_data['classification_types'] = structures('project', 'classification_types');

		$this->load->library('form_validation');

		if ($this->input->post()) {
			$this->form_validation->set_rules('company', 'Company/Organization', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('job_title', 'Job Title', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('city', 'City', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('province', 'Province', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[1]|max_length[150]|valid_email');
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('title_of_project', 'Title of Project', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('location', 'Location', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('construction_date', 'Construction Date', 'trim|min_length[1]|max_length[10]'); //TODO
			$this->form_validation->set_rules('bid_closing_date', 'Bid Closing Date', 'trim|min_length[1]|max_length[10]'); //TODO
			$this->form_validation->set_rules('project_type', 'Project Type', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('project_stage', 'Project Stage', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('link_to_documents', 'Link to Project Documents', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('description', 'Project Description', 'trim|min_length[1]');
			$this->form_validation->set_rules('zone_location', 'Project Zone Location', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('site_addresses', 'Site Addresses', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('closing_date', 'Closing Date', 'trim|min_length[1]|max_length[10]'); // TODO
			$this->form_validation->set_rules('number_of_addenda', 'Number Of Addenda', 'trim|intval');
			$this->form_validation->set_rules('obtain_bid_documents', 'Obtain Bid Documents', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('tender_stage', 'Tender Stage', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('funding', 'Funding', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('procurement_type', 'Procurement Type', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('classification_type', 'Classification Type', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('owner_type', 'Owner Type', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('scope_of_work', 'Scope of Work', 'trim|min_length[1]');

			if ($this->form_validation->run()) {

				$construction_date = NULL;
				if (set_value('construction_date')) {
					$construction_date_parts = explode("/", set_value('construction_date'));
					if ($construction_date_parts && is_array($construction_date_parts) && count($construction_date_parts) === 3) {
						$construction_date = date(APP_MYSQL_DATE, strtotime(implode("-", array_reverse($construction_date_parts))));
					}
				}
				$bid_closing_date = set_value('bid_closing_date') ? set_value('bid_closing_date') : NULL;
				if (set_value('bid_closing_date')) {
					$bid_closing_date_parts = explode("/", set_value('bid_closing_date'));
					if ($bid_closing_date_parts && is_array($bid_closing_date_parts) && count($bid_closing_date_parts) === 3) {
						$bid_closing_date = date(APP_MYSQL_DATE, strtotime(implode("-", array_reverse($bid_closing_date_parts))));
					}
				}
				$closing_date = set_value('closing_date') ? set_value('closing_date') : NULL;
				if (set_value('closing_date')) {
					$closing_date_parts = explode("/", set_value('closing_date'));
					if ($closing_date_parts && is_array($closing_date_parts) && count($closing_date_parts) === 3) {
						$closing_date = date(APP_MYSQL_DATE, strtotime(implode("-", array_reverse($closing_date_parts))));
					}
				}

				$project_data = array(
					// System information
					'account_id' => $this->view_data['active_account']->account_id,
					'project_creation_date' => date(APP_MYSQL_DATETIME),
					'active' => TRUE,

					// General information
					'company' => set_value('company'),
					'first_name' => set_value('first_name'),
					'last_name' => set_value('last_name'),
					'job_title' => set_value('job_title') ? set_value('job_title') : NULL,
					'city' => set_value('city'),
					'province' => set_value('province') ? set_value('province') : NULL,
					'email' => set_value('email'),
					'phone_number' => set_value('phone_number'),
					'title_of_project' => set_value('title_of_project') ? set_value('title_of_project') : NULL, // +  Project Identification
					'location' => set_value('location') ? set_value('location') : NULL,
					'construction_date' => $construction_date,
					'bid_closing_date' => $bid_closing_date,
					'project_type' => set_value('project_type') ? set_value('project_type') : NULL,
					'project_stage' => set_value('project_stage') ? set_value('project_stage') : NULL,
					'link_to_documents' => set_value('link_to_documents') ? set_value('link_to_documents') : NULL,
					'description' => set_value('description') ? set_value('description') : NULL,

					// Project Identification
					'ocaa_number' => NULL,
					'lca_number' => NULL,
					'zone_location' => set_value('zone_location') ? set_value('zone_location') : NULL,

					// Project Details
					'site_addresses' => set_value('site_addresses') ? set_value('site_addresses') : NULL,
					'closing_date' => $closing_date,
					'number_of_addenda' => set_value('number_of_addenda') ? set_value('number_of_addenda') : NULL,
					'obtain_bid_documents' => set_value('obtain_bid_documents') ? set_value('obtain_bid_documents') : NULL,

					// Project Description
					'tender_stage' => set_value('tender_stage') ? set_value('tender_stage') : NULL,
					'funding' => set_value('funding') ? set_value('funding') : NULL,
					'procurement_type' => set_value('procurement_type') ? set_value('procurement_type') : NULL,
					'classification_type' => set_value('classification_type') ? set_value('classification_type') : NULL,
					'owner_type' => set_value('owner_type') ? set_value('owner_type') : NULL,
					'scope_of_work' => set_value('scope_of_work') ? set_value('scope_of_work') : NULL
				);

				if ($this->projects_model->add_row($project_data)) {
					$this->session->set_flashdata('success', 'Project created successfully.');
					redirect('projects');
				}
			}
		}

		$this->_view('projects/add');
		$this->_view('projects/add_js', 82);
		$this->_view('projects/page_start', 41);
		$this->_view('projects/page_end', 79);
		$this->_view('projects/styles', 21);
		$this->_view('projects/js', 81);
		$this->_render();
	}

	public function edit($project_id = NULL)
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

		$this->view_data['title'] = "Edit Project";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->view_data['project_types'] = structures('project', 'project_types');
		$this->view_data['project_stages'] = structures('project', 'project_stages');
		$this->view_data['zone_locations'] = structures('project', 'zone_locations');
		$this->view_data['fundings'] = structures('project', 'fundings');
		$this->view_data['owner_types'] = structures('project', 'owner_types');
		$this->view_data['tender_stages'] = structures('project', 'tender_stages');
		$this->view_data['procurement_types'] = structures('project', 'procurement_types');
		$this->view_data['classification_types'] = structures('project', 'classification_types');

		$this->load->library('form_validation');

		if ($this->input->post()) {
			$this->form_validation->set_rules('company', 'Company/Organization', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('job_title', 'Job Title', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('city', 'City', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('province', 'Province', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[1]|max_length[150]|valid_email');
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('title_of_project', 'Title of Project', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('location', 'Location', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('construction_date', 'Construction Date', 'trim|min_length[1]|max_length[10]'); //TODO
			$this->form_validation->set_rules('bid_closing_date', 'Bid Closing Date', 'trim|min_length[1]|max_length[10]'); //TODO
			$this->form_validation->set_rules('project_type', 'Project Type', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('project_stage', 'Project Stage', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('link_to_documents', 'Link to Project Documents', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('description', 'Project Description', 'trim|min_length[1]');
			$this->form_validation->set_rules('zone_location', 'Project Zone Location', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('site_addresses', 'Site Addresses', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('closing_date', 'Closing Date', 'trim|min_length[1]|max_length[10]'); // TODO
			$this->form_validation->set_rules('number_of_addenda', 'Number Of Addenda', 'trim|intval');
			$this->form_validation->set_rules('obtain_bid_documents', 'Obtain Bid Documents', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('tender_stage', 'Tender Stage', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('funding', 'Funding', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('procurement_type', 'Procurement Type', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('classification_type', 'Classification Type', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('owner_type', 'Owner Type', 'trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('scope_of_work', 'Scope of Work', 'trim|min_length[1]');

			if ($this->form_validation->run()) {

				$construction_date = NULL;
				if (set_value('construction_date')) {
					$construction_date_parts = explode("/", set_value('construction_date'));
					if ($construction_date_parts && is_array($construction_date_parts) && count($construction_date_parts) === 3) {
						$construction_date = date(APP_MYSQL_DATE, strtotime(implode("-", array_reverse($construction_date_parts))));
					}
				}
				$bid_closing_date = set_value('bid_closing_date') ? set_value('bid_closing_date') : NULL;
				if (set_value('bid_closing_date')) {
					$bid_closing_date_parts = explode("/", set_value('bid_closing_date'));
					if ($bid_closing_date_parts && is_array($bid_closing_date_parts) && count($bid_closing_date_parts) === 3) {
						$bid_closing_date = date(APP_MYSQL_DATE, strtotime(implode("-", array_reverse($bid_closing_date_parts))));
					}
				}
				$closing_date = set_value('closing_date') ? set_value('closing_date') : NULL;
				if (set_value('closing_date')) {
					$closing_date_parts = explode("/", set_value('closing_date'));
					if ($closing_date_parts && is_array($closing_date_parts) && count($closing_date_parts) === 3) {
						$closing_date = date(APP_MYSQL_DATE, strtotime(implode("-", array_reverse($closing_date_parts))));
					}
				}

				$project_data = array(
					// General information
					'company' => set_value('company'),
					'first_name' => set_value('first_name'),
					'last_name' => set_value('last_name'),
					'job_title' => set_value('job_title') ? set_value('job_title') : NULL,
					'city' => set_value('city'),
					'province' => set_value('province') ? set_value('province') : NULL,
					'email' => set_value('email'),
					'phone_number' => set_value('phone_number'),
					'title_of_project' => set_value('title_of_project') ? set_value('title_of_project') : NULL, // +  Project Identification
					'location' => set_value('location') ? set_value('location') : NULL,
					'construction_date' => $construction_date,
					'bid_closing_date' => $bid_closing_date,
					'project_type' => set_value('project_type') ? set_value('project_type') : NULL,
					'project_stage' => set_value('project_stage') ? set_value('project_stage') : NULL,
					'link_to_documents' => set_value('link_to_documents') ? set_value('link_to_documents') : NULL,
					'description' => set_value('description') ? set_value('description') : NULL,

					// Project Identification
					'ocaa_number' => NULL,
					'lca_number' => NULL,
					'zone_location' => set_value('zone_location') ? set_value('zone_location') : NULL,

					// Project Details
					'site_addresses' => set_value('site_addresses') ? set_value('site_addresses') : NULL,
					'closing_date' => $closing_date,
					'number_of_addenda' => set_value('number_of_addenda') ? set_value('number_of_addenda') : NULL,
					'obtain_bid_documents' => set_value('obtain_bid_documents') ? set_value('obtain_bid_documents') : NULL,

					// Project Description
					'tender_stage' => set_value('tender_stage') ? set_value('tender_stage') : NULL,
					'funding' => set_value('funding') ? set_value('funding') : NULL,
					'procurement_type' => set_value('procurement_type') ? set_value('procurement_type') : NULL,
					'classification_type' => set_value('classification_type') ? set_value('classification_type') : NULL,
					'owner_type' => set_value('owner_type') ? set_value('owner_type') : NULL,
					'scope_of_work' => set_value('scope_of_work') ? set_value('scope_of_work') : NULL
				);

				if ($this->projects_model->update_row(array(
					'project_id' => $project_id,
					'account_id' => $this->view_data['active_account']->account_id,
					'active' => TRUE
				), $project_data)) {
					$this->session->set_flashdata('success', 'Project updated successfully.');
					redirect('projects');
				}
			}
		}

		$this->_view('projects/edit');
		$this->_view('projects/edit_js', 82);
		$this->_view('projects/page_start', 41);
		$this->_view('projects/page_end', 79);
		$this->_view('projects/styles', 21);
		$this->_view('projects/js', 81);
		$this->_render();
	}

	public function delete($project_id = NULL)
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

		$project_data = array(
			'active' => FALSE
		);

		if ($this->projects_model->update_row(array(
			'project_id' => $project_id,
			'account_id' => $this->view_data['active_account']->account_id,
			'active' => TRUE
		), $project_data)) {
			$this->session->set_flashdata('success', 'Project deleted successfully.');
		}

		redirect('projects');
	}

	public function search()
	{
		process_login();

		$this->view_data['title'] = "Browse Projects";

		$this->view_data['per_page'] = set_value('per_page') ? intval(set_value('per_page')) : 20;

		$this->view_data['procurement_types'] = structures('project', 'procurement_types');
		$this->view_data['tender_stages'] = structures('project', 'tender_stages');
		$this->view_data['owner_types'] = structures('project', 'owner_types');
		$this->view_data['classification_types'] = structures('project', 'classification_types');
		$this->view_data['zone_locations'] = structures('project', 'zone_locations');

		$this->view_data['saved_searches'] = structures('searches', 'saved');

		$this->view_data['projects'] = $this->projects_model->get(array(
			'active' => TRUE
		));

		$this->_view('projects/search');
		$this->_view('projects/search_styles', 21);
		$this->_view('projects/search_js', 81);
		$this->_view('home/page_start', 41);
		$this->_view('home/page_end', 79);
		$this->_render();
	}

	public function view($project_id = NULL)
	{
		load_account();

		if (!$project_id)
			redirect(site_url());

		$this->view_data['project'] = $this->projects_model->get_row(array(
			'project_id' => $project_id,
			'active' => TRUE
		));

		if (!$this->view_data['project'])
			redirect(site_url());

		if (!$this->view_data['project']->ocaa_number || !$this->view_data['project']->lca_number) {
			redirect(site_url());
		}

		$this->view_data['title'] = $this->view_data['project']->title_of_project;

		$this->_view('projects/view');
		$this->_view('home/page_start', 41);
		$this->_view('home/page_end', 79);
		$this->_render();
	}
}
