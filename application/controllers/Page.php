<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function template()
	{
		$this->load->view('admin/template');
	}

	public function dashboard()
	{
		$this->template->load('admin/template', 'dashboard');
	}

	public function forms()
	{
		$this->template->load('admin/template', 'forms');
	}

	public function tables()
	{
		$this->template->load('admin/template', 'tables');
	}

	public function charts()
	{
		$this->template->load('admin/template', 'charts');
	}

}
