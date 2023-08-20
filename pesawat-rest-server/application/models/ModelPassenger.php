<?php

class ModelPassenger extends CI_Model
{
    public function gettb_passenger($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_passenger')->result_array();
        } else {
            return $this->db->get_where('tb_passenger', ['id_passenger' => $id])->result_array();
        }
    }

    public function deletetb_passenger($id)
    {
        $this->db->delete('tb_passenger', ['id_passenger' => $id]);
        return $this->db->affected_rows();
    }

    public function createtb_passenger($data)
    {
        $this->db->insert('tb_passenger', $data);
        return $this->db->affected_rows();
    }

    public function updatetb_passenger($data, $id)
    {
        $this->db->update('tb_passenger', $data, ['id_passenger' => $id]);
        return $this->db->affected_rows();
    }
}
