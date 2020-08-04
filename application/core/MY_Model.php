<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	public $table_name = '';

	public function get($params = array())
	{
		foreach ($params as $column => $value) {
			$this->db->where($column, $value);
		}

		return $this->db->get($this->table_name)->result();
	}

	public function get_row($params = array())
	{
		foreach ($params as $column => $value) {
			$this->db->where($column, $value);
		}

		$this->db->limit(1);
		return $this->db->get($this->table_name)->row();
	}

	public function add_row($data)
	{
		return $this->db->insert($this->table_name, $data);
	}

	public function update_row($params = array(), $data)
	{
		foreach ($params as $column => $value) {
			$this->db->where($column, $value);
		}

		$this->db->limit(1);
		return $this->db->update($this->table_name, $data);
	}

	public function delete_row($params = array())
	{
		foreach ($params as $column => $value) {
			$this->db->where($column, $value);
		}

		$this->db->limit(1);
		return $this->db->delete($this->table_name);
	}
}
