<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_user')->get()->getResultArray();
    }
    public function insertData($data)
    {
        return $this->db->table('tbl_user')->insert($data);
    }
    public function DetailData($id_user)
    {
        return $this->db->table('tbl_user')->where('id', $id_user)->get()->getRowArray();
    }

    public function editData($data)
    {
        return $this->db->table('tbl_user')->where('id', $data['id'])->update($data);
    }

    public function DeleteData($data)
    {
        return $this->db->table('tbl_user')->delete($data);
    }
    public function UpdateData($data)
    {
        return $this->db->table('tbl_user')->where('id', $data['id'])->update($data);
    }
}
