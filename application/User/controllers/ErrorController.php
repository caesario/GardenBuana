<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ErrorController extends CI_Controller
{

	public function index()
	{
		$this->load->view('error_page/page-404');
	}

	public function blocked()
	{
		$this->load->view('error_page/page-403');
	}
}
