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
class Siswa extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('M_siswa');
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
                $data['kota']= $this->M_config->get_kota();
                $data['siswa']= $this->M_siswa->get_siswa();
                $data['config']= $this->M_config->get_all()->row();
                $this->load->view('backend/buyer',$data);
        }
    }

    public function register()
    {
        if(isset($_POST['submit']))
        {
            
            $username = $this->input->post('nama_pembeli');
            $users = $this->ion_auth->user()->row();
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $no_hp = $this->input->post('no_hp');
            $company = 'Pembeli';
            $group = array('2');
            $additional_data = array(
                'first_name'=> $this->input->post('nama_pembeli'),
                'company'   => $company,
                'phone'     => $no_hp
            );
            $config['upload_path']          = './img/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
 
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('foto'))
            {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
            else 
            {
                $data = array(
                        'email'=> $this->input->post('email'),
                        'no_hp'=> $this->input->post('no_hp'),
                        'nama_pembeli'=> $this->input->post('nama_pembeli'),
                        'alamat'=> $this->input->post('alamat'),
                        'asal_kota'=> $this->input->post('asal_kota'),
                        'rating_pembeli'=> 'New Comers',
                        'status_pembeli'=> 'Aktif',
                        'foto'=> $this->upload->data('file_name'),
                        'password'=> $this->input->post('password'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'penginput'=> $users->email
                    );
                if(!$this->ion_auth->email_check($email))
                {
                    $this->ion_auth->register($username,$password,$email,$additional_data,$group);
                    $this->M_siswa->register($data);
                    redirect('backend/dashboard');
                }
                else 
                {
                    redirect('siswa');
                }
            }
            
        }
        else
        {
            $this->load->view('front/register');
        }
    }
    public function hapus_siswa()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $akun = $this->M_siswa->get_idbuyer($id)->row();
            $this->ion_auth->delete_user($akun->iduser);
            $this->M_siswa->delete_buyer($id);
            redirect('siswa');
        }
    }
    public function edit_siswa()
    {
        if($this->ion_auth->logged_in())
        {
            if(isset($_POST['submit']))
            {
                $config['upload_path']          = './img/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('foto1'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }
                else 
                {
                    $users = $this->ion_auth->user()->row();
                    $id= $this->input->post('id');
                    $iduser= $this->input->post('iduser');
                    $data = array(
                        'email'=> $this->input->post('email'),
                        'no_hp'=> $this->input->post('no_hp'),
                        'nama_pembeli'=> $this->input->post('nama_pembeli'),
                        'alamat'=> $this->input->post('alamat'),
                        'asal_kota'=> $this->input->post('asal_kota'),
                        'rating_pembeli'=> 'New Comers',
                        'status_pembeli'=> 'Aktif',
                        'foto'=> $this->upload->data('file_name'),
                        'password'=> $this->input->post('password'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'penginput'=> $users->email
                    );
                    $datauser = array(
                        'username' => $this->input->post('nama_pembeli'),
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password'),
                        'no_hp' => $this->input->post('no_hp'),
                        'company' =>'Pembeli'
                    );
                    $this->db->where('id',$id);
                    $this->db->update('buyer',$data);
                    $this->ion_auth->update($iduser,$datauser);
                    redirect('buyer');
                }
                
            }
            else
            {
                $id = $this->uri->segment(3);
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['detail_buyer']= $this->M_buyer->get_idbuyer($id)->row();
                $data['config']= $this->M_config->get_all()->row();
                $data['kota']= $this->M_config->get_kota();
                $this->load->view('backend/editbuyer',$data);
            }
        }
    }
    
}
