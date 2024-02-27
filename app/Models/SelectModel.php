<?php

namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Controller;


class SelectModel extends Model
{
    public function selectData($table, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->select("*");
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }
}
