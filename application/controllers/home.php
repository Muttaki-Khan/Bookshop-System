<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		/*=== Load the cart library ===*/
		$this->load->library('cart');
	}

	public function index()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/

		/*=== Recent Books ===*/
		$this->load->model('user_model');
		$view['books'] = $this->user_model->recent_books();

		/*=== CSE Books ===*/
		$this->load->model('user_model');
		$view['cse_books'] = $this->user_model->cse_books();

		$this->load->view('layouts/home_layout', $view);
	}

	//-----------Admin profile edit------------//
	//might delete later
	public function edit_profile($id)
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/

		#get existing informations
		$this->load->model('admin_model');
		$view['admin_details'] = $this->admin_model->get_user_details($id);

		$this->form_validation->set_rules('name', 'Name', 'trim|required|strip_tags[name]');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required|numeric|strip_tags[contact]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash|min_length[3]');
		$this->form_validation->set_rules('repassword', 'Confirm Password',
			'trim|required|alpha_dash|min_length[3]|matches[password]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[80]|strip_tags[address]');

		$this->form_validation->set_rules('city', 'City', 'trim|required|strip_tags[city]');

		if($this->form_validation->run() == FALSE)
		{
			if($this->admin_model->get_user_details($id))
			{
				$view['user_view'] = "admin/edit_profile";
				$this->load->view('layouts/user_home', $view);
			}
			else
			{
				$view['user_view'] = "temp/404page";
				$this->load->view('layouts/user_home', $view);
			}
		}
		else
		{
			$this->load->model('admin_model');

			if($this->admin_model->edit_profile($id, $data))
			{
				$this->session->set_flashdata('success', 'Your profile info update successfully');
				redirect('user_home');
			}
			else
			{
				print $this->db->error();
			}
		}
	}


}
