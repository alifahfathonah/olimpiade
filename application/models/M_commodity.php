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
class M_commodity extends CI_Model {
    //put your code here
    public function register($data)
    {
        $this->db->insert('commodity',$data);
    }
    public function get_commodity()
    {
        $sql="select * from select commodity.*, kategori.kategori from commodity, kategori where commodity.idkategori=kategori.id";
        return $this->db->query($sql);
    }
    public function get_one_commodity($id)
    {
        $sql="select commodity.*, kategori.kategori from commodity, kategori where commodity.idkategori=kategori.id and commodity.id='$id'";
        return $this->db->query($sql);
    }
    public function delete_commodity($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('commodity');
    }
}
