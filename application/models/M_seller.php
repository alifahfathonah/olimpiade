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
class M_seller extends CI_Model {
    //put your code here
    public function register($data)
    {
        $this->db->insert('seller',$data);
    }
    public function get_seller()
    {
        $sql="select * from seller";
        return $this->db->query($sql);
    }
    public function get_idseller($id)
    {
        $sql="select seller.*,users.id as iduser from seller, users where seller.email=users.email and seller.id=$id";
        return $this->db->query($sql);
    }
    public function delete_seller($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('seller');
    }
}
