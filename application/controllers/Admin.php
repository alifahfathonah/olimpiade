<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        public function __construct() {
            parent::__construct();
            $this->load->model('M_config');
            $this->load->database();
            $this->load->library(array('ion_auth', 'form_validation'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
            date_default_timezone_set("Asia/Bangkok");
        }
	public function edit_konfig()
        {
            if($this->ion_auth->logged_in())
            {
                if(isset($_POST['submit']))
                {
                    $id = $this->input->post('id');
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                      'nama_aplikasi'=> $this->input->post('nama_aplikasi'),
                      'header' => $this->input->post('header'),
                      'footer' => $this->input->post('footer'),
                      'telpon' => $this->input->post('telpon'),
                      'alamat' => $this->input->post('alamat'),
                      'meta'   => $this->input->post('meta'),
                      'email'  => $users->email,
                      'tgl_input' => date('Y-m-d H:i:s')
                    );
                    $this->db->where('id',$id);
                    $this->db->update('konfigurasi',$data);
                    redirect('backend/admin');
                }
            }
        }
        public function buat_menu()
        {
            if($this->ion_auth->logged_in())
            {
                if(isset($_POST['simpan_menu']))
                {
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                            'nama_menu'=> $this->input->post('nama_menu'),
                            'url'=>  $this->input->post('url'),
                            'simbol' => $this->input->post('simbol'),
                            'email' => $users->email,
                            'tgl_input'=> date('Y-m-d H:i:s')
                            );
                    $this->M_config->input_menu($data);
                    redirect('backend/admin');
                }
            }
        }
        public function edit_menu()
        {
            if($this->ion_auth->logged_in())
            {
                if(isset($_POST['submit']))
                {
                    $users = $this->ion_auth->user()->row();
                    $id = $this->input->post('id');
                    $data = array(
                            'nama_menu'=> $this->input->post('nama_menu'),
                            'url'=>  $this->input->post('url'),
                            'simbol' => $this->input->post('simbol'),
                            'email' => $users->email,
                            'tgl_input'=> date('Y-m-d H:i:s')
                            );
                    $this->db->where('id',$id);
                    $this->db->update('menu',$data);
                    redirect('backend/admin');
                }
                else
                {
                    $id= $this->uri->segment(3);
                    $users = $this->ion_auth->user()->row();
                    $grup = $this->ion_auth->get_users_groups($users->id)->row();
                    $data['user'] = $this->ion_auth->user()->row();
                    $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                    $data['user_group']= $this->M_config->get_user_grup();
                    $data['menu']= $this->M_config->get_one_menu($id)->row();
                    $data['config']= $this->M_config->get_all()->row();
                    $this->load->view('backend/editmenu',$data);
                }
            }
        }
        public function hapus_menu()
        {
            if($this->ion_auth->logged_in())
            {
                $id = $this->uri->segment(3);
                $this->M_config->delete_menu($id);
                redirect('backend/admin');
            }
        }
        public function delete_mapping()
        {
            if($this->ion_auth->logged_in())
            {
                $id = $this->uri->segment(3);
                $this->M_config->delete_mapping($id);
                redirect('backend/admin');
            }
        }
        public function mapping_menu()
        {
            if($this->ion_auth->logged_in())
            {
                $users = $this->ion_auth->user()->row();
                if(isset($_POST['mapping_menu']))
                {
                    $data = array(
                        'grup'=> $this->input->post('group'),
                        'menu'=> $this->input->post('menu'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email'=> $users->email
                        );
                        $this->M_config->input_mapping_menu($data);
                    redirect('backend/admin');
                }
            }
        }
        public function konfigurasi_pengiriman()
        {
            if($this->ion_auth->logged_in())
            {
                
                    $users = $this->ion_auth->user()->row();
                    $grup = $this->ion_auth->get_users_groups($users->id)->row();
                    $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                    $data['config']= $this->M_config->get_all()->row();
                    $data['kota']= $this->M_config->get_kota();
                    $data['kurir']= $this->M_config->get_kurir();
                    $data['kurir']= $this->M_config->get_kategori();
                    $data['mapping_kurir']= $this->M_config->get_mapping();
                    $data['menu_all']= $this->M_config->get_all_menu();
                    $this->load->view('backend/konfigurasi_pengiriman',$data);
                
            }
        }
        public function tambah_kota()
        {
            if($this->ion_auth->logged_in())
            {
                if(isset($_POST['kota']))
                {
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                        'nama_kota'=>$this->input->post('nama_kota'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email'=>$users->email);
                    $this->M_config->tambah_kota($data);
                    redirect('admin/konfigurasi_pengiriman');
                }   
            }
        }
        public function tambah_kurir()
        {
            if($this->ion_auth->logged_in())
            {
                if(isset($_POST['kurir']))
                {
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                        'nama_kurir'=>$this->input->post('nama_kurir'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email'=>$users->email);
                    $this->M_config->tambah_kurir($data);
                    redirect('admin/konfigurasi_pengiriman');
                }   
            }
        }
        public function tambah_mapping()
        {
            if($this->ion_auth->logged_in())
            {
                if(isset($_POST['mapping']))
                {
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                        'asal'=>$this->input->post('asal'),
                        'tujuan'=>$this->input->post('tujuan'),
                        'kurir'=>$this->input->post('kurir'),
                        'ongkir'=> $this->input->post('ongkir'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email'=>$users->email);
                    $this->M_config->tambah_mapping($data);
                    redirect('admin/konfigurasi_pengiriman');
                }   
            }
        }
    public function hapus_kota()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $this->M_config->delete_kota($id);
            redirect('admin/konfigurasi_pengiriman');
        }
    }
    public function hapus_kurir()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $this->M_config->delete_kurir($id);
            redirect('admin/konfigurasi_pengiriman');
        }
    }
    public function hapus_maping()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $this->M_config->delete_maping($id);
            redirect('admin/konfigurasi_pengiriman');
        }
    }
    public function tambah_kategori()
        {
            if($this->ion_auth->logged_in())
            {
                if(isset($_POST['mapping']))
                {
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                        'kategori'=>$this->input->post('kategori'),
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email'=>$users->email);
                    $this->M_config->tambah_mapping($data);
                    redirect('admin/konfigurasi_pengiriman');
                }   
            }
        }
    public function hapus_kategori()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $this->M_config->delete_kategori($id);
            redirect('admin/konfigurasi_pengiriman');
        }
    }
        
}
