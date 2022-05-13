<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pegawai extends CI_Model
{

    public $table = 'pegawai';
    public $id = 'id_pegawai';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pegawai', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('bagian', $q);
	$this->db->or_like('grade', $q);
	$this->db->or_like('cabang', $q);
	$this->db->or_like('tanggal_masuk', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pegawai');
	$this->db->or_like('nip');
	$this->db->or_like('nama');
	$this->db->or_like('jabatan');
	$this->db->or_like('bagian');
	$this->db->or_like('grade');
	$this->db->or_like('cabang');
	$this->db->or_like('tanggal_masuk');
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-08 02:51:21 */
/* http://harviacode.com */