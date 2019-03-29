<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seller
 *
 * @author SONY
 */
class soal extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('M_kelas');
        $this->load->model('M_soal');
        $this->load->model('M_config');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        date_default_timezone_set("Asia/Bangkok");
    }
    public function index()
    {
        if($this->ion_auth->logged_in())
        {
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['user_group']= $this->M_config->get_user_grup();
                $data['mapping_menu']= $this->M_config->get_mapping_menu();
                $data['grup'] = $this->ion_auth->get_users_groups($users->id)->row();
                $data['kelas_detail']= $this->M_kelas->get_kelas_pembuat($users->email);
                $data['kelas']= $this->M_kelas->get_kelas();
                $data['soal_ganda']= $this->M_soal->get_soal_ganda($users->email);
                $data['soal_esay']= $this->M_soal->get_soal_esay($users->email);
                $data['soal_ganda_admin']= $this->M_soal->get_soal_ganda_admin();
                $data['soal_esay_admin']= $this->M_soal->get_soal_esay_admin();
                $data['config']= $this->M_config->get_all()->row();
                $this->load->view('backend/soal',$data);
                
        }
    }
    public function input_ganda()
    {
        if($this->ion_auth->logged_in())
        {
            if(isset($_POST['ganda']))
            {
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                        'isi_soal'=>$this->input->post('editor1'),
                        'pilihan1'=>$this->input->post('pilihan1'),
                        'pilihan2'=>$this->input->post('pilihan2'),
                        'pilihan3'=>$this->input->post('pilihan3'),
                        'pilihan4'=>$this->input->post('pilihan4'),
                        'pilihan5'=>$this->input->post('pilihan5'),
                        'kunci'=>  $this->input->post('kunci'),
                        'idkelas'=>  $this->input->post('kelas'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email'=>$users->email);
                    $this->M_soal->input_ganda($data);
                    redirect('soal');
            }
        }
    }
    public function input_esay()
    {
        if($this->ion_auth->logged_in())
        {
            if(isset($_POST['esay']))
            {
                $users = $this->ion_auth->user()->row();
                $data = array(
                        'isi_soal_esay'=>  $this->input->post('editor2'),
                        'idkelas'=> $this->input->post('kelas'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email' => $users->email
                        );
                $this->M_soal->input_esay($data);
                redirect('soal');
            }
        }
    }

    public function hapus_soal_ganda()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $this->M_soal->delete_soal_ganda($id);
            redirect('soal');
        }
    }
    public function hapus_soal_esay()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $this->M_soal->delete_soal_esay($id);
            redirect('soal');
        }
    }
    public function edit_soal_ganda()
    {
        if($this->ion_auth->logged_in())
        {
            if(isset($_POST['submit']))
            {
                    $id= $this->input->post('id');
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                        'isi_soal'=>$this->input->post('editor1'),
                        'pilihan1'=>$this->input->post('pilihan1'),
                        'pilihan2'=>$this->input->post('pilihan2'),
                        'pilihan3'=>$this->input->post('pilihan3'),
                        'pilihan4'=>$this->input->post('pilihan4'),
                        'pilihan5'=>$this->input->post('pilihan5'),
                        'kunci'=>  $this->input->post('kunci'),
                        'idkelas'=>  $this->input->post('kelas'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email'=>$users->email);
                    $this->db->where('id',$id);
                    $this->db->update('soal_ganda',$data);
                    redirect('soal');   
            }
            else
            {
                $id = $this->uri->segment(3);
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['detail_soal_ganda']= $this->M_soal->get_one_soal_ganda($id)->row();
                $data['config']= $this->M_config->get_all()->row();
                $data['kelas']= $this->M_kelas->get_kelas();
                $this->load->view('backend/edit_soal_ganda',$data);
            }
        }
    }
    public function edit_soal_esay()
    {
        if($this->ion_auth->logged_in())
        {
            if(isset($_POST['submit']))
            {
                    $id= $this->input->post('id');
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                        'isi_soal_esay'=>  $this->input->post('editor2'),
                        'idkelas'=> $this->input->post('kelas'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email' => $users->email
                        );
                    $this->db->where('id',$id);
                    $this->db->update('soal_esay',$data);
                    redirect('soal');   
            }
            else
            {
                $id = $this->uri->segment(3);
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['detail_soal_esay']= $this->M_soal->get_one_soal_esay($id)->row();
                $data['config']= $this->M_config->get_all()->row();
                $data['kelas']= $this->M_kelas->get_kelas();
                $this->load->view('backend/edit_soal_esay',$data);
            }
        }
    }
}
