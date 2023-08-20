<?php

class ModelBooking extends CI_Model
{
    public function gettb_booking($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_booking')->result_array();
        } else {
            return $this->db->get_where('tb_booking', ['id_booking' => $id])->result_array();
        }
    }

    public function deletetb_booking($id)
    {
        $this->db->delete('tb_booking', ['id_booking' => $id]);
        return $this->db->affected_rows();
    }

    public function createtb_booking($data)
    {
        $this->db->insert('tb_booking', $data);
        return $this->db->affected_rows();
    }

    public function updatetb_booking($data, $id)
    {
        $this->db->update('tb_booking', $data, ['id_booking' => $id]);
        return $this->db->affected_rows();
    }
}
