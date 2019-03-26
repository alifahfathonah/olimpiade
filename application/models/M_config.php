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
class M_config extends CI_Model {
    //put your code here
    public function get_all()
    {
        $sql="select * from konfigurasi";
        return $this->db->query($sql);
    }
    public function input_menu($data)
    {
        $this->db->insert('menu',$data);
    }
    public function get_all_menu()
    {
        $sql="select * from menu";
        return $this->db->query($sql);
    }
    public function get_user_grup()
    {
        $sql="select * from groups";
        return $this->db->query($sql);
    }
    public function get_one_menu($id)
    {
        $sql="select * from menu where id=$id";
        return $this->db->query($sql);
    }
    public function delete_menu($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('menu');
    }
    public function delete_mapping($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('mapping_menu');
    }
    public function input_mapping_menu($data)
    {
        $this->db->insert('mapping_menu',$data);
    }
    public function get_mapping_menu()
    {
        $sql="select * from mapping_menu";
        return $this->db->query($sql);
    }
    public function menu_samping($id)
    {
        $sql="SELECT menu.nama_menu, menu.url, menu.simbol
                FROM mapping_menu, menu
                WHERE mapping_menu.menu = menu.nama_menu AND mapping_menu.`grup`='$id'";
        return $this->db->query($sql);
    }
    public function get_kota()
    {
        $sql="select * from m_kota";
        return $this->db->query($sql);
    }
    public function get_kategori()
    {
        $sql="select * from m_kategori";
        return $this->db->query($sql);
    }
    public function get_kurir()
    {
        $sql="select * from m_kurir";
        return $this->db->query($sql);
    }
    public function get_mapping()
    {
        $sql="SELECT m_kota.nama_kota as asal, view_kota.nama_kota as tujuan,m_kurir.nama_kurir, mapping_kurir.ongkir,mapping_kurir.email,mapping_kurir.tgl_input,mapping_kurir.id 
              FROM m_kota,m_kurir,mapping_kurir,view_kota
              WHERE m_kota.id=mapping_kurir.asal and view_kota.id=mapping_kurir.tujuan AND m_kurir.id=mapping_kurir.kurir";
        return $this->db->query($sql);
    }
    public function tambah_kota($data)
    {
        $this->db->insert('m_kota',$data);
    }
    public function tambah_kurir($data)
    {
        $this->db->insert('m_kurir',$data);
    }
    public function tambah_mapping($data)
    {
        $this->db->insert('mapping_kurir',$data);
    }
    public function delete_kota($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('m_kota');
    }
    public function delete_kurir($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('m_kurir');
    }
    public function delete_maping($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('mapping_kurir');
    }
     public function tambah_kategori($data)
    {
        $this->db->insert('m_kategori',$data);
    }
    public function delete_kategori($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('m_kategori');
    }
}
