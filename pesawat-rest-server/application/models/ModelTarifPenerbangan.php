<?php

class ModelTarifPenerbangan extends CI_Model
{
    public function gettb_tarif_penerbangan($id = null)
    {
        if ($id === null) {
            return $this->db->get('tb_tarif_penerbangan')->result_array();
        } else {
            return $this->db->get_where('tb_tarif_penerbangan', ['id_tarif' => $id])->result_array();
        }
    }

    public function deletetb_tarif_penerbangan($id)
    {
        $this->db->delete('tb_tarif_penerbangan', ['id_tarif' => $id]);
        return $this->db->affected_rows();
    }

    public function createtarif_penerbangan($data)
    {
        $this->db->insert('tb_tarif_penerbangan', $data);
        return $this->db->affected_rows();
    }

    public function updatetb_tarif_penerbangan($data, $id)
    {
        $this->db->update('tb_tarif_penerbangan', $data, ['id_tarif' => $id]);
        return $this->db->affected_rows();
    }
}
