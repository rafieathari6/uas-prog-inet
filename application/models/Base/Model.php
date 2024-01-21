<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model
{
    protected $_table;
    protected $primary_key = 'id';
    protected $_database;

    public function getAll()
    {
        $this->_database = $this->db;
        $this->_database->select('*');
        $this->_database->from($this->_table);
        return $this;
    }

    public function getById(int $id)
    {
        $this->getAll();
        $this->_database->where($this->primary_key, $id);
        return $this;
    }

    public function join($table_related, $join_clause)
    {
        $this->_database->join($table_related, $join_clause);
        return $this;
    }

    public function get()
    {
        return $this->_database->get()->result();
    }

    public function first()
    {
        return $this->_database->get()->row();
    }

    public function save()
    {
        $post = $this->input->post();
        return $this->db->insert($this->_table, $this);
    }

    public function update(int $id)
    {
        return $this->db->update($this->_table, $this, [$this->primary_key => $id]);
    }

    public function delete(int $id)
    {
        return $this->db->delete($this->_table, [$this->primary_key => $id]);
    }
}