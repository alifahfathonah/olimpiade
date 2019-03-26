<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
            $this->load->model('M_siswa');
            $this->load->database();
            $this->load->library(array('ion_auth', 'form_validation'));
            $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
            $this->lang->load('auth');
            date_default_timezone_set("Asia/Bangkok");
        }
	public function index()
	{
            if(isset($_POST['submit']))
            {
                $email= $this->input->post('email');
                $password = $this->input->post('password');
                $remember = TRUE;
                $this->ion_auth->login($email,$password,$remember);
                if($this->ion_auth->login($email,$password)==TRUE)
                {
                    $this->ion_auth->clear_login_attempts($email);
                    if($this->ion_auth->is_admin())
                    {
                        redirect('backend');
                    }
                    else 
                    {
                       redirect('backend/dashboard'); 
                    }
                    
                }
                else 
                {
                   $data['sekolah']= $this->M_config->get_sekolah();
                   $data['config']= $this->M_config->get_all()->row();
                   $this->load->view('backend/login',$data);  
                }
                
            }
            else
            {
               $data['sekolah']= $this->M_config->get_sekolah();
               $data['config']= $this->M_config->get_all()->row();
               $this->load->view('backend/login',$data); 
            }
            
	}
        public function register()
        {
            if(isset($_POST['login']))
            {
                $username = $this->input->post('nama_siswa');
                $email = $this->input->post('email_siswa');
                $password = $this->input->post('password');
                $no_hp = $this->input->post('no_hp');
                $company = $this->input->post('sekolah');
                $group = array('3');
                $additional_data = array(
                    'first_name'=> $this->input->post('nama_siswa'),
                    'company'   => $company,
                    'phone'     => $no_hp
                );
                
                    $data = array(
                            'email'=> $this->input->post('email_siswa'),
                            'tgl_lahir'=> $this->input->post('tgl_lahir'),
                            'no_hp'=> $this->input->post('no_hp'),
                            'nama_siswa'=> $this->input->post('nama_siswa'),
                            'sekolah'=> $this->input->post('sekolah'),
                            'password'=> $this->input->post('password'),
                            'tgl_input'=> date('Y-m-d H:i:s'),
                        );
                    if(!$this->ion_auth->email_check($email))
                    {
                        $this->ion_auth->register($username,$password,$email,$additional_data,$group);
                        $this->M_siswa->register($data);
                        redirect('siswa');
                    }
                    else 
                    {
                        $this->load->view('backend/emailterdaftar');
                    }
                }
            }
        
}
