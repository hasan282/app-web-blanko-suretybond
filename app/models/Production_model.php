<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'models/Data_model.php';
class Production_model extends Data_model
{
    public function __construct()
    {
        parent::__construct();
        $this->binds = array();
    }

    public function select()
    {
        $fields = array('enkripsi', 'prefix', 'nomor', 'status', 'color', 'jaminan', 'principal', 'pemakaian', 'office_nick');
        $this->blanko($fields);
        $this->query .= ' WHERE blanko_status.id IN (2, 3, 4)';
        return $this;
    }

    public function where($where = null)
    {
        if ($where === null) {
            $this->query .= ' AND blanko.laprod IS NULL';
        } else {
            $this->query .= ' AND blanko.laprod = ?';
            if (is_array($this->binds)) array_push($this->binds, $where);
        }
        return $this;
    }

    public function filter($filter = [])
    {
        $filters = array(
            'asuransi' => 'asuransi.enkripsi = ?',
            'office' => 'office.id = ?',
            'pemakaian' => 'pemakaian.bulan = ?'
        );
        foreach (array_keys($filters) as $key) if (!in_array($key, array_keys($filter))) unset($filters[$key]);
        if (!empty($filters)) {
            $this->query .= ' AND ' . implode(' AND ', array_values($filters));
            if (is_array($this->binds)) $this->binds = array_merge($this->binds, array_values($filter));
        }
        return $this;
    }

    public function order()
    {
        $this->query .= ' ORDER BY asuransi.id ASC, blanko.nomor ASC';
        return $this;
    }
}
