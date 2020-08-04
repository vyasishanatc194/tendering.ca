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

	return $CI->session->userdata('account_id');
}

function load_account()
{
	$CI =& get_instance();

	$CI->view_data['active_account'] = is_logged() ? $CI->accounts_model->get_row(array(
		'account_id' => $CI->session->userdata('account_id')
	)) : NULL;
}

function process_login($access_level = NULL)
{
	$CI =& get_instance();

	if (!is_logged())
		redirect('accounts/login');

	load_account();

	if ($access_level !== NULL && $CI->view_data['active_account']->type !== $access_level)
		redirect("dashboard");
}

function process_no_login()
{
	if (is_logged())
		redirect('dashboard');
}
