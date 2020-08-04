<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		process_login();
	}

	public function edit($section = NULL)
	{
		process_login();

		$this->view_data['title'] = "Edit Project";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->load->library('form_validation');

		if ($this->input->post()) {
			switch ($section) {
				case 'information':

					$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|min_length[1]|max_length[150]');
					$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|min_length[1]|max_length[150]');
					$this->form_validation->set_rules('email', 'Email Address', 'required|trim|min_length[1]|max_length[150]|valid_email');

					if ($this->form_validation->run()) {
						$account_data = array(
							'first_name' => set_value('first_name'),
							'last_name' => set_value('last_name'),
							'email' => set_value('email')
						);

						if ($this->accounts_model->update_row(array(
							'account_id' => $this->view_data['active_account']->account_id
						), $account_data)) {
							$this->session->set_flashdata('success', 'Your account information successfully updated');
							redirect('profile/edit');
						}
					}

					break;
				case 'password':

					$this->form_validation->set_rules('password', 'New Password', 'required|trim|min_length[1]|max_length[100]|matches[password_confirm]');
					$this->form_validation->set_rules('password_confirm', 'Confirm New Password', 'required|trim|min_length[1]|max_length[100]|matches[password]');

					if ($this->form_validation->run()) {
						$account_data = array(
							'password' => md5(set_value('password') . $this->config->item('app_salt'))
						);

						if ($this->accounts_model->update_row(array(
							'account_id' => $this->view_data['active_account']->account_id
						), $account_data)) {
							$this->session->set_flashdata('success', 'Your account password successfully updated');
							redirect('profile/edit');
						}
					}

					break;
			}
		}

		$this->_view('profile/edit');
		$this->_view('profile/edit_js', 82);
		$this->_view('profile/page_start', 41);
		$this->_view('profile/page_end', 79);
		$this->_view('profile/styles', 21);
		$this->_view('profile/js', 81);
		$this->_render();
	}

	public function logout()
	{
		process_login();

		$this->session->sess_destroy();

		$this->_view('profile/logout');
		$this->_view('accounts/body_open', 40, 'body_open');
		$this->_render();
	}
}
