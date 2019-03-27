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
class kelas extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('M_kelas');
        $this->load->model('M_config');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        date_default_timezone_set("Asia/Bangkok");
    }
    public function index()
    {
        if($this->ion_auth->logged_in())
        {
            if(isset($_POST['submit']))
            {
                    $users = $this->ion_auth->user()->row();
                    $data = array(
                        'kelas'=>$this->input->post('kelas'),
                        'waktu'=>$this->input->post('waktu'),
                        'aktif'=>'Tidak Aktif',
                        'tgl_input'=> date('Y-m-d H:i:s'),
                        'email'=>$users->email);
                    $this->M_kelas->input($data);
                    redirect('kelas');
            }
            else
            {
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['user_group']= $this->M_config->get_user_grup();
                $data['mapping_menu']= $this->M_config->get_mapping_menu();
                $data['grup'] = $this->ion_auth->get_users_groups($users->id)->row();
                $data['kelas']= $this->M_kelas->get_kelas();
                $data['config']= $this->M_config->get_all()->row();
                $this->load->view('backend/kelas',$data);
            }
                
        }
    }
    public function hapus_kelas()
    {
        if($this->ion_auth->logged_in())
        {
            $id=  $this->uri->segment(3);
            $this->M_kelas->delete_kelas($id);
            redirect('kelas');
        }
    }
    
}
