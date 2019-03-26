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
class M_siswa extends CI_Model {
    //put your code here
    public function register($data)
    {
        $this->db->insert('siswa',$data);
    }
    public function get_siswa()
    {
        $sql="select * from siswa";
        return $this->db->query($sql);
    }
    public function get_idsiswa($id)
    {
        $sql="select siswa.*,users.id as iduser from siswa, users where siswa.email=users.email and siswa.id=$id";
        return $this->db->query($sql);
    }
    public function delete_buyer($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('siswa');
    }
}
