<?php

class ModelPesawat extends CI_Model
{
    public function gettb_pesawat($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_pesawat')->result_array();
        } else {
            return $this->db->get_where('tb_pesawat', ['id_pesawat' => $id])->result_array();
        }
    }

    public function deletetb_pesawat($id)
    {
        $this->db->delete('tb_pesawat', ['id_pesawat' => $id]);
        return $this->db->affected_rows();
    }

    public function createtb_pesawat($data)
    {
        $this->db->insert('tb_pesawat', $data);
        return $this->db->affected_rows();
    }

    public function updatetb_pesawat($data, $id)
    {
        $this->db->update('tb_pesawat', $data, ['id_pesawat' => $id]);
        return $this->db->affected_rows();
    }
}
