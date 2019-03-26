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
class Guru extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('M_guru');
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
                $data['guru']= $this->M_guru->get_guru();
                $data['sekolah']= $this->M_config->get_sekolah();
                $data['config']= $this->M_config->get_all()->row();
                $this->load->view('backend/guru',$data);
        }
    }

    public function register()
    {
        if(isset($_POST['submit']))
        {
            
                $username = $this->input->post('nama_guru');
                $email = $this->input->post('email_guru');
                $password = $this->input->post('password');
                $no_hp = $this->input->post('no_hp');
                $company = $this->input->post('sekolah');
                $group = array('2');
                $additional_data = array(
                    'first_name'=> $this->input->post('nama_guru'),
                    'company'   => $company,
                    'phone'     => $no_hp
                );
                
                    $data = array(
                            'email'=> $this->input->post('email_guru'),
                            'tgl_lahir'=> $this->input->post('tgl_lahir'),
                            'no_hp'=> $this->input->post('no_hp'),
                            'nama_guru'=> $this->input->post('nama_guru'),
                            'sekolah'=> $this->input->post('sekolah'),
                            'password'=> $this->input->post('password'),
                            'tgl_input'=> date('Y-m-d H:i:s'),
                            'jenis_kelamin'=> $this->input->post('jenis_kelamin')
                        );
                    if(!$this->ion_auth->email_check($email))
                    {
                        $this->M_guru->register($data);
                        $this->ion_auth->register($username,$password,$email,$additional_data,$group);
                        redirect('guru');
                    }
                    else 
                    {
                        $this->load->view('backend/emailterdaftar');
                    }
            
        }
        else
        {
            $this->load->view('front/register');
        }
    }
    public function hapus_guru()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $akun = $this->M_guru->get_idguru($id)->row();
            $this->ion_auth->delete_user($akun->iduser);
            $this->M_guru->delete_buyer($id);
            redirect('guru');
        }
    }
    public function edit_guru()
    {
        if($this->ion_auth->logged_in())
        {
            if(isset($_POST['submit']))
            {
               
                    $users = $this->ion_auth->user()->row();
                    $id= $this->input->post('id');
                    $iduser= $this->input->post('iduser');
                    $data = array(
                            'email'=> $this->input->post('email_guru'),
                            'tgl_lahir'=> $this->input->post('tgl_lahir'),
                            'no_hp'=> $this->input->post('no_hp'),
                            'nama_guru'=> $this->input->post('nama_guru'),
                            'sekolah'=> $this->input->post('sekolah'),
                            'password'=> $this->input->post('password'),
                            'tgl_input'=> date('Y-m-d H:i:s'),
                            'jenis_kelamin'=> $this->input->post('jenis_kelamin')
                        );
                    $datauser = array(
                        'username' => $this->input->post('nama_guru'),
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password'),
                        'no_hp' => $this->input->post('no_hp'),
                        'company' =>$this->input->post('sekolah')
                    );
                    $this->db->where('id',$id);
                    $this->db->update('guru',$data);
                    $this->ion_auth->update($iduser,$datauser);
                    redirect('guru');
                
                
            }
            else
            {
                $id = $this->uri->segment(3);
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['detail_guru']= $this->M_guru->get_idguru($id)->row();
                $data['config']= $this->M_config->get_all()->row();
                $data['sekolah']= $this->M_config->get_sekolah();
                $this->load->view('backend/editguru',$data);
            }
        }
    }
    
}
