<?php

class ModelPenerbangan extends CI_Model
{
    public function gettb_penerbangan($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_penerbangan')->result_array();
        } else {
            return $this->db->get_where('tb_penerbangan', ['id_penerbangan' => $id])->result_array();
        }
    }

    public function deletetb_penerbangan($id)
    {
        $this->db->delete('tb_penerbangan', ['id_penerbangan' => $id]);
        return $this->db->affected_rows();
    }

    public function createtb_penerbangan($data)
    {
        $this->db->insert('tb_penerbangan', $data);
        return $this->db->affected_rows();
    }

    public function updatetb_penerbangan($data, $id)
    {
        $this->db->update('tb_penerbangan', $data, ['id_penerbangan' => $id]);
        return $this->db->affected_rows();
    }
}
