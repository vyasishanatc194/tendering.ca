<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projects_model extends MY_Model
{
	public $table_name = 'projects';

	public function get($params = array())
	{
		foreach ($params as $column => $value) {
			$this->db->where(strpos($column, ".") === FALSE ? $this->table_name . "." . $column : $column, $value);
		}

		$this->db->join("accounts", "projects.account_id = accounts.account_id", "left");
		$this->db->select("projects.*, " .
			"accounts.first_name as account_first_name, accounts.last_name as account_last_name, accounts.email as account_email");

		return $this->db->get($this->table_name)->result();
	}

	public function get_row($params = array())
	{
		foreach ($params as $column => $value) {
			$this->db->where(strpos($column, ".") === FALSE ? $this->table_name . "." . $column : $column, $value);
		}

		$this->db->join("accounts", "projects.account_id = accounts.account_id", "left");
		$this->db->select("projects.*, " .
			"accounts.first_name as account_first_name, accounts.last_name as account_last_name, accounts.email as account_email");

		$this->db->limit(1);
		return $this->db->get($this->table_name)->row();
	}
}
