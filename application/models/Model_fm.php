<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_superadmin
 *
 * @author tsabbit
 */
class Model_fm extends CI_Model {
    //put your code here
    public function input_file($data)
    {
        $this->db->insert('m_file',$data);
    }
    public function get_file()
    {
        $sql="select* from m_file order by judul_dokumen asc";
        return $this->db->query($sql);
    }
   
    public function get_one_file($id)
    {
        $sql="select* from m_file where m_file.id=$id";
        return $this->db->query($sql);
    }
    public function delete_file($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('m_file');
    }
    
}
