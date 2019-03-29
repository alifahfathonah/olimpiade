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
class M_soal extends CI_Model {
    //put your code here
    public function input_ganda($data)
    {
        $this->db->insert('soal_ganda',$data);
    }
    public function input_esay($data)
    {
        $this->db->insert('soal_esay',$data);
    }
    public function get_soal_ganda($id)
    {
        $sql="select soal_ganda.*,kelas.kelas as nama_kelas from soal_ganda,kelas where soal_ganda.idkelas=kelas.id and soal_ganda.email='$id'";
        return $this->db->query($sql);
    }
    public function get_soal_ganda_admin()
    {
        $sql="select soal_ganda.*,kelas.kelas as nama_kelas from soal_ganda,kelas where soal_ganda.idkelas=kelas.id";
        return $this->db->query($sql);
    }
    public function get_soal_esay($id)
    {
        $sql="select soal_esay.*,kelas.kelas as nama_kelas from soal_esay,kelas where soal_esay.idkelas=kelas.id and soal_esay.email='$id'";
        return $this->db->query($sql);
    }
    public function get_soal_esay_admin()
    {
        $sql="select soal_esay.*,kelas.kelas as nama_kelas from soal_esay,kelas where soal_esay.idkelas=kelas.id";
        return $this->db->query($sql);
    }
    public function delete_soal_ganda($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('soal_ganda');
    }
    public function delete_soal_esay($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('soal_esay');
    }
    public function get_one_soal_ganda($id)
    {
        $sql="select* from soal_ganda where soal_ganda.id='$id'";
        return $this->db->query($sql);
    }
    public function get_one_soal_esay($id)
    {
        $sql="select* from soal_esay where soal_esay.id='$id'";
        return $this->db->query($sql);
    }
}
