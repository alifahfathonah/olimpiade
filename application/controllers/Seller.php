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
class Seller extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('M_seller');
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
                $data['seller']= $this->M_seller->get_seller();
                $data['config']= $this->M_config->get_all()->row();
                $this->load->view('backend/seller',$data);
        }
    }

    public function register()
    {
        if(isset($_POST['submit']))
        {
            
            $username = $this->input->post('nama_penjual');
            $users = $this->ion_auth->user()->row();
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $no_hp = $this->input->post('no_hp');
            $company = $this->input->post('nama_toko');
            $group = array('3');
            $additional_data = array(
                'first_name'=> $this->input->post('nama_penjual'),
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
                        'nama_penjual'=> $this->input->post('nama_penjual'),
                        'alamat'=> $this->input->post('alamat'),
                        'asal_kota'=> $this->input->post('asal_kota'),
                        'nama_toko'=> $this->input->post('nama_toko'),
                        'rating_toko'=> 'New Comers',
                        'status_buka'=> 'Aktif',
                        'foto'=> $this->upload->data('file_name'),
                        'password'=> $this->input->post('password'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'penginput'=> $users->email
                    );
                if(!$this->ion_auth->email_check($email))
                {
                    $this->ion_auth->register($username,$password,$email,$additional_data,$group);
                    $this->M_seller->register($data);
                    redirect('seller');
                }
                else 
                {

                }
            }
            
        }
        else
        {
            $this->load->view('front/register');
        }
    }
    public function hapus_seller()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $akun = $this->M_seller->get_idseller($id)->row();
            $this->ion_auth->delete_user($akun->iduser);
            $this->M_seller->delete_seller($id);
            redirect('seller');
        }
    }
    public function edit_seller()
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
                            'nama_penjual'=> $this->input->post('nama_penjual'),
                            'alamat'=> $this->input->post('alamat'),
                            'asal_kota'=> $this->input->post('asal_kota'),
                            'nama_toko'=> $this->input->post('nama_toko'),
                            'rating_toko'=> 'New Comers',
                            'status_buka'=> 'Aktif',
                            'foto'=> $this->upload->data('file_name'),
                            'password'=> $this->input->post('password'),
                            'tgl_input'=> date('Y-m-d H:i:s'),
                            'penginput'=> $users->email
                        );
                    $datauser = array(
                        'username' => $this->input->post('nama_penjual'),
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password'),
                        'no_hp' => $this->input->post('no_hp'),
                        'company' => $this->input->post('nama_toko')
                    );
                    $this->db->where('id',$id);
                    $this->db->update('seller',$data);
                    $this->ion_auth->update($iduser,$datauser);
                    redirect('seller');
                }
                
            }
            else
            {
                $id = $this->uri->segment(3);
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['detail_seller']= $this->M_seller->get_idseller($id)->row();
                $data['config']= $this->M_config->get_all()->row();
                $data['kota']= $this->M_config->get_kota();
                $this->load->view('backend/editseller',$data);
            }
        }
    }
    
}
