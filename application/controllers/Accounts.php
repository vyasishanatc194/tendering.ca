<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		process_no_login();

		redirect('accounts/login');
	}

	public function login()
	{
		process_no_login();

		$this->view_data['title'] = "Login";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->load->library('form_validation');
		if ($this->input->post()) {
			$this->form_validation->set_rules('email', 'Email Address', 'required|trim|min_length[1]|max_length[150]|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[1]|max_length[100]');
			if ($this->form_validation->run()) {
				$account = $this->accounts_model->get_row(array(
					'email' => set_value('email'),
					'password' => md5(set_value('password') . $this->config->item('app_salt'))
				));

				if ($account) {

					$this->session->set_userdata('account_id', $account->account_id);

					$this->accounts_model->update_row(array(
						'account_id' => $account->account_id
					), array(
						'date_last_login' => date(APP_MYSQL_DATETIME)
					));

					redirect('dashboard');
				} else
					$this->view_data['error'] = "Account with such email and/or password not found in the system. Please try again.";
			}
		}

		$this->_view('accounts/login');
		$this->_view('accounts/body_open', 40, 'body_open');
		$this->_render();
	}

	public function registration()
	{
		process_no_login();

		$this->view_data['title'] = "Registration";

		$this->load->library('form_validation');

		if ($this->input->post()) {

			$this->form_validation->set_rules('type', 'Account Type', 'required|in_list[owner,contractor]');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('email', 'Email Address', 'required|trim|min_length[1]|max_length[150]|valid_email|is_unique[accounts.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[1]|max_length[100]|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|trim|min_length[1]|max_length[100]|matches[password]');
			$this->form_validation->set_rules('terms_checkbox', 'Accept terms and privacy policy', 'required|in_list[Yes]');

			if ($this->form_validation->run()) {
				$account_data = array(
					'type' => set_value('type'),
					'first_name' => set_value('first_name'),
					'last_name' => set_value('last_name'),
					'email' => set_value('email'),
					'password' => md5(set_value('password') . $this->config->item('app_salt')),
					'date_registration' => date(APP_MYSQL_DATETIME),
					'date_last_login' => NULL,
					'suspended' => FALSE
				);

				if ($this->accounts_model->add_row($account_data))
					$this->session->set_flashdata('success', 'Your account successfully created. Now you can login using form below.');
				else
					$this->session->set_flashdata('error', 'Currently we cannot register you at our system, please try again later or contact our support.');

				redirect('accounts/login');
			}
		}

		$this->_view('accounts/registration');
		$this->_view('accounts/body_open', 40, 'body_open');
		$this->_render();
	}
}
