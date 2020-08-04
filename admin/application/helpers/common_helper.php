<?php

function structures()
{
	$CI =& get_instance();

	$output = $CI->config->item('structures');
	$levels = func_get_args();

	foreach ($levels as $level) {
		if (isset($output[$level]))
			$output = $output[$level];
		else
			break;
	}

	return $output;
}

function is_logged()
{
	$CI =& get_instance();

	return $CI->session->userdata('admin_id');
}

function load_account()
{
	$CI =& get_instance();

	$CI->view_data['active_admin'] = is_logged() ? $CI->admins_model->get_row(array(
		'admin_id' => $CI->session->userdata('admin_id')
	)) : NULL;
}

function process_login()
{
	if (!is_logged())
		redirect('admins/login');

	load_account();
}

function process_no_login()
{
	if (is_logged())
		redirect('dashboard');
}

if (!function_exists('na_base_url')) {
	/**
	 * Base URL
	 *
	 * Create a local URL based on your basepath.
	 * Segments can be passed in as a string or an array, same as site_url
	 * or a URL to a file can be passed in, e.g. to an image file.
	 *
	 * @param    string $uri
	 * @param    string $protocol
	 * @return    string
	 */
	function na_base_url($uri = '', $protocol = NULL)
	{
		return str_replace('admin' . DIRECTORY_SEPARATOR . $uri, $uri, get_instance()->config->base_url($uri, $protocol));
	}
}

if (!function_exists('na_site_url')) {
	/**
	 * Base URL
	 *
	 * Create a local URL based on your basepath.
	 * Segments can be passed in as a string or an array, same as site_url
	 * or a URL to a file can be passed in, e.g. to an image file.
	 *
	 * @param    string $uri
	 * @param    string $protocol
	 * @return    string
	 */
	function na_site_url($uri = '', $protocol = NULL)
	{
		return str_replace('admin' . DIRECTORY_SEPARATOR . $uri, $uri, get_instance()->config->site_url($uri, $protocol));
	}
}
