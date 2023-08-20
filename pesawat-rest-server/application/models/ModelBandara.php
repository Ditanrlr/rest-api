<?php

class ModelBandara extends CI_Model
{
    public function gettb_bandara($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_bandara')->result_array();
        } else {
            return $this->db->get_where('tb_bandara', ['id_bandara' => $id])->result_array();
        }
    }

    public function deletetb_bandara($id)
    {
        $this->db->delete('tb_bandara', ['id_bandara' => $id]);
        return $this->db->affected_rows();
    }

    public function createtb_bandara($data)
    {
        $this->db->insert('tb_bandara', $data);
        return $this->db->affected_rows();
    }

    public function updatetb_bandara($data, $id)
    {
        $this->db->update('tb_bandara', $data, ['id_bandara' => $id]);
        return $this->db->affected_rows();
    }
}
