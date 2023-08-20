<?php

class ModelCustomer extends CI_Model
{
    public function gettb_customer($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_customer')->result_array();
        } else {
            return $this->db->get_where('tb_customer', ['id_customer' => $id])->result_array();
        }
    }

    public function deletetb_customer($id)
    {
        $this->db->delete('tb_customer', ['id_customer' => $id]);
        return $this->db->affected_rows();
    }

    public function createtb_customer($data)
    {
        $this->db->insert('tb_customer', $data);
        return $this->db->affected_rows();
    }

    public function updatetb_customer($data, $id)
    {
        $this->db->update('tb_customer', $data, ['id_customer' => $id]);
        return $this->db->affected_rows();
    }
}
