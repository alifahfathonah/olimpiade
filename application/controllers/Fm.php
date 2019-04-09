<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fm extends CI_Controller {

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
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->library(array('ion_auth', 'form_validation'));
            $this->load->helper(array('url', 'language'));
            $this->load->model('M_config');
            $this->load->model('Model_fm');
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
                    $config['upload_path']          = './img/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|doc|docx';
                    $config['max_size']             = 1000000;
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ( ! $this->upload->do_upload('file'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    }
                    else 
                    {
                        $data = array(
                                'judul_dokumen'=> $this->input->post('judul_dokumen'),
                                'file'=> $this->upload->data('file_name'),
                                'tgl_input'=> date('Y-m-d H:i:s'),
                                'pengirim'=> $users->email
                            );
                        $this->Model_fm->input_file($data);
                        redirect('fm/download');
                        
                    }
                }
                else
                {
                    $users = $this->ion_auth->user()->row();
                    $grup = $this->ion_auth->get_users_groups($users->id)->row();
                    $data['user'] = $this->ion_auth->user()->row();
                    $data['grup'] = $this->ion_auth->get_users_groups($users->id)->row();
                    $data['config']= $this->M_config->get_all()->row();
                    $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                    $data['file'] = $this->Model_fm->get_file();
                    $this->load->view('publik/file',$data);
                }
                
            }
        }
        public function edit()
        {
            if($this->ion_auth->logged_in())
            {
                if(isset($_POST['submit']))
                {
                    $id = $this->input->post('id');
                    $users = $this->ion_auth->user()->row();
                    $config['upload_path']          = './img/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|doc|docx';
                    $config['max_size']             = 1000000;
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
                                'judul dokumen'=> $this->input->post('judul'),
                                'file'=> $this->upload->data('file_name'),
                                'tgl_input'=> date('Y-m-d H:i:s'),
                                'penginput'=> $users->email
                            );
                        redirect('fm/download');
                        
                    }
                    
                }
                else
                {
                    $id= $this->uri->segment(3);
                    $users = $this->ion_auth->user()->row();
                    $grup = $this->ion_auth->get_users_groups($users->id)->row();
                    $data['user'] = $this->ion_auth->user()->row();
                    $data['grup'] = $this->ion_auth->get_users_groups($users->id)->row();
                    $data['menu'] = $this->Model_config->listmenu($grup->id);
                    $data['config'] = $this->Model_config->get_deskripsi()->row();
                    $data['detail_file'] = $this->Model_fm->get_one_file($id)->row();
                    $this->load->view('publik/editfile',$data);
                }
            
            }
        }
        public function delete()
        {
            if($this->ion_auth->logged_in())
            {
                $ids=$this->uri->segment(3);
                $this->Model_fm->delete_file($ids);
                redirect('fm');
            }
        }
        public function download()
        {
            if($this->ion_auth->logged_in())
            {
                
                    $users = $this->ion_auth->user()->row();
                    $grup = $this->ion_auth->get_users_groups($users->id)->row();
                    $data['user'] = $this->ion_auth->user()->row();
                    $data['grup'] = $this->ion_auth->get_users_groups($users->id)->row();
                    $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                    $data['config']= $this->M_config->get_all()->row();
                    $data['file'] = $this->Model_fm->get_file();
                    $this->load->view('publik/listfile',$data);
                
            }
            
        }
        
}
