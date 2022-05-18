<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->template->load('navbar', 'landingpage');
	}
	public function konfirmasi()
	{		
		$this->template->load('navbar', 'konfirmasi');
	}
	public function test()
	{		
		$this->template->load('navbar', 'test');
	}
}
