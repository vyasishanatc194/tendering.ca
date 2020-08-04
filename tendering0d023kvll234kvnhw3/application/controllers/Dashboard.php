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

		switch ($this->view_data['active_account']->type) {
			case 'owner':
				redirect('projects');
				break;
			case 'contractor':
				redirect('bids');
				break;
		}
	}
}
