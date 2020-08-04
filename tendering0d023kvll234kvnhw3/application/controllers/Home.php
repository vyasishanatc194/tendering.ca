<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function index()
	{
		load_account();

		$this->view_data['title'] = $this->config->item('app_title');

		$this->_view('home/index');
		$this->_view('home/index_styles', 21);
		$this->_view('home/index_js', 81);
		$this->_view('home/page_start', 41);
		$this->_view('home/page_end', 79);
		$this->_render();
	}

	public function about_us()
	{
		load_account();

		$this->view_data['title'] = "About Us";

		$this->_view('home/about_us');
		$this->_view('home/page_start', 41);
		$this->_view('home/page_end', 79);
		$this->_render();
	}

	public function contact_us()
	{
		load_account();

		$this->view_data['title'] = "Contact Us";

		$this->_view('home/contact_us');
		$this->_view('home/page_start', 41);
		$this->_view('home/page_end', 79);
		$this->_render();
	}
}
