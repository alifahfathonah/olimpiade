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
class M_buyer extends CI_Model {
    //put your code here
    public function register($data)
    {
        $this->db->insert('buyer',$data);
    }
    public function get_buyer()
    {
        $sql="select * from buyer";
        return $this->db->query($sql);
    }
    public function get_idbuyer($id)
    {
        $sql="select buyer.*,users.id as iduser from buyer, users where buyer.email=users.email and buyer.id=$id";
        return $this->db->query($sql);
    }
    public function delete_buyer($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('buyer');
    }
}
