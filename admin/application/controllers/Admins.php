<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admins extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		process_login();

		$this->view_data['title'] = "Administrators";
		$this->view_data['success'] = $this->session->flashdata('success');
		$this->view_data['error'] = $this->session->flashdata('error');

		$this->view_data['admins'] = $this->admins_model->get();

		$this->_view('admins/index');
		$this->_view('admins/index_styles', 21);
		$this->_view('admins/index_js', 81);
		$this->_render();
	}

	public function delete($admin_id = NULL)
	{
		process_login();

		if (!$admin_id)
			redirect('admins');

		$this->view_data['admin'] = $this->admins_model->get_row(array(
			'admin_id' => $admin_id
		));

		if (!$admin_id)
			redirect('admins');

		if ($admin_id === $this->view_data['active_admin']->admin_id) {
			$this->session->set_flashdata('error', 'You cannot delete yourself.');
			redirect('admins');
		}

		if ($this->admin_model->delete_row(array(
			'admin_id' => $admin_id
		)))
			$this->session->set_flashdata('success', 'Admin account removed successfully');
		else
			$this->session->set_flashdata('error', 'Database error');

		redirect('admins');
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
				if ($admin = $this->admins_model->get_row(array(
					'email' => set_value('email'),
					'password' => md5(set_value('password') . $this->config->item('app_salt'))
				))) {
					$this->session->set_userdata('admin_id', $admin->admin_id);

					$this->admins_model->update_row(array(
						'admin_id' => $admin->admin_id
					), array(
						'date_last_login' => date(APP_MYSQL_DATETIME)
					));

					redirect('dashboard');
				} else
					$this->view_data['error'] = "Admin with such email and/or password not found in the system. Please try again.";
			}
		}

		$this->_view('admins/login');
		$this->_view('admins/body_open', 40, 'body_open');
		$this->_render();
	}
}
