<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

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
	public function admin()
	{
            if($this->ion_auth->logged_in())
            {
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['user_group']= $this->M_config->get_user_grup();
                $data['mapping_menu']= $this->M_config->get_mapping_menu();
                $data['grup'] = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_all']= $this->M_config->get_all_menu();
                $data['config']= $this->M_config->get_all()->row();
                $this->load->view('backend/dashboard',$data);
                //echo $grup->name;
            }
            
	}
        public function dashboard()
        {
            if($this->ion_auth->logged_in())
            {
                $data['config']= $this->M_config->get_all()->row();
                $this->load->view('backend/dashboard1',$data);
            }
            
        }
        public function index()
        {
                $users = $this->ion_auth->user()->row();
                $grup = $this->ion_auth->get_users_groups($users->id)->row();
                $data['user'] = $this->ion_auth->user()->row();
                $data['menu_samping']= $this->M_config->menu_samping($grup->name);
                $data['user_group']= $this->M_config->get_user_grup();
                $data['mapping_menu']= $this->M_config->get_mapping_menu();
                $data['grup'] = $this->ion_auth->get_users_groups($users->id)->row();
                $data['menu_all']= $this->M_config->get_all_menu();
                $data['config']= $this->M_config->get_all()->row();
                $this->load->view('backend/welcome',$data);
        }
        public function logout()
        {
            $this->ion_auth->logout();
            redirect('welcome');
        }
        
}
