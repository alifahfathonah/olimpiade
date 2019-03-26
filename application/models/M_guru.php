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
class M_guru extends CI_Model {
    //put your code here
    public function register($data)
    {
        $this->db->insert('guru',$data);
    }
    public function get_guru()
    {
        $sql="select * from guru";
        return $this->db->query($sql);
    }
    public function get_idguru($id)
    {
        $sql="select guru.*,users.id as iduser from guru, users where guru.email=users.email and guru.id=$id";
        return $this->db->query($sql);
    }
    public function delete_guru($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('guru');
    }
}
