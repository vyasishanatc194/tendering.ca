<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $view_data = array();

	public $output_type = 'html';

	public $views = array(
		array(
			'layout' => 'shared/html_open',
			'priority' => 0,
			'override' => 'html_open'
		),
		array(
			'layout' => 'shared/head_open',
			'priority' => 10,
			'override' => 'head_open'
		),
		array(
			'layout' => 'shared/styles',
			'priority' => 20,
			'override' => 'styles'
		),

		// 21 .. 29 for additional styles

		array(
			'layout' => 'shared/head_close',
			'priority' => 30,
			'override' => 'head_close'
		),
		array(
			'layout' => 'shared/body_open',
			'priority' => 40,
			'override' => 'body_open'
		),

		// 41 .. 79 for body content

		array(
			'layout' => 'shared/js',
			'priority' => 80,
			'override' => 'js'
		),

		// 81 .. 89 for additional JS

		array(
			'layout' => 'shared/body_close',
			'priority' => 90,
			'override' => 'body_close'
		),
		array(
			'layout' => 'shared/html_close',
			'priority' => 100,
			'override' => 'html_close'
		)
	);

	protected function _view($layout, $priority = 50, $override = NULL)
	{
		if ($override !== NULL) {
			$filter_views = array_filter($this->views, function ($view) use ($override) {
				return $view['override'] === $override;
			});

			if (count($filter_views) === 1) {
				$override_indexes = array_keys($filter_views);
				unset($this->views[$override_indexes[0]]);
			}
		}

		$this->views[] = array(
			'layout' => $layout,
			'priority' => $priority,
			'override' => $layout
		);
	}

	public function _render()
	{
		switch ($this->output_type) {
			case 'json':
				header("Content-type:application/json");
				echo json_encode($this->view_data);
				break;
			case 'html':

				usort($this->views, function ($a, $b) {
					return $a['priority'] > $b['priority'];
				});

				foreach ($this->views as $view) {
					if (is_array($view) && isset($view['layout']) && $view['layout']) {
						$this->load->view($view['layout'], $this->view_data);
					}
				}
				break;
		}
	}
}
