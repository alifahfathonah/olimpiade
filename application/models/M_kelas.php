<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_config
 *
 * @author SONY
 */
class M_kelas extends CI_Model {
    //put your code here
    public function input($data)
    {
        $this->db->insert('kelas',$data);
    }
    public function get_kelas()
    {
        $sql="select * from kelas";
        return $this->db->query($sql);
    }
    
    public function delete_kelas($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('kelas');
    }
}
