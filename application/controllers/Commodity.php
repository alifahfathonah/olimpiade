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
class Commodity extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('M_commodity');
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
                $data['commodity']= $this->M_commodity->get_commodity();
                $data['config']= $this->M_config->get_all()->row();
                $this->load->view('backend/commodity',$data);
        }
    }

    public function register()
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
                $this->upload->do_upload('foto');
                
                if ( ! $this->upload->do_upload('foto'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }
                else 
                {
                    $foto=  $this->upload->data()->row();
                    $users = $this->ion_auth->user()->row();
                    $this->upload->do_upload('foto1');
                    $foto1=  $this->upload->data()->row();
                    $this->upload->do_upload('foto2');
                    $foto2=  $this->upload->data()->row();
                    $data = array(
                            'nama_barang'=> $this->input->post('nama_barang'),
                            'deskripsi'=> $this->input->post('deskripsi'),
                            'jumlah_stok'=> $this->input->post('jumlah_stok'),
                            'kondisi_barang'=> $this->input->post('kondisi_barang'),
                            'foto'=> $foto->file_name,
                            'foto1'=> $foto1->file_name,
                            'foto2'=> $foto2->file_name,
                            'tgl_input'=> date('Y-m-d H:i:s'),
                            'penginput'=> $users->email
                        );
                    
                    $this->M_commodity->register($data);
                    redirect('commodity');
                }

            }
            else
            {
                $this->load->view('front/register');
            }
        }
        
    }
    public function hapus_commodity()
    {
        if($this->ion_auth->logged_in())
        {
            $id=$this->uri->segment(3);
            $this->M_commodity->delete_commodity($id);
            redirect('commodity');
        }
    }
    public function edit_commodity()
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
                if ( ! $this->upload->do_upload('foto'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }
                else 
                {
                    $foto=  $this->upload->data()->row();
                    $users = $this->ion_auth->user()->row();
                    $this->upload->do_upload('foto1');
                    $foto1=  $this->upload->data()->row();
                    $this->upload->do_upload('foto2');
                    $foto2=  $this->upload->data()->row();
                    $id= $this->input->post('id');
                    $iduser= $this->input->post('iduser');
                    $data = array(
                        'nama_barang'=> $this->input->post('nama_barang'),
                            'deskripsi'=> $this->input->post('deskripsi'),
                            'jumlah_stok'=> $this->input->post('jumlah_stok'),
                            'kondisi_barang'=> $this->input->post('kondisi_barang'),
                            'foto'=> $foto->file_name,
                            'foto1'=> $foto1->file_name,
                            'foto2'=> $foto2->file_name,
                            'tgl_input'=> date('Y-m-d H:i:s'),
                            'penginput'=> $users->email
                    );
                    
                    $this->db->where('id',$id);
                    $this->db->update('commodity',$data);
                    redirect('commodity');
                }
                
            }
            else
            {
                $id = $this->uri->segment(3);
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['detail_commodity']= $this->M_commodity->get_one_commodity($id)->row();
                $data['config']= $this->M_config->get_all()->row();
                $data['kategori']= $this->M_config->get_kategori();
                $this->load->view('backend/editcommodity',$data);
            }
        }
    }
    
}
