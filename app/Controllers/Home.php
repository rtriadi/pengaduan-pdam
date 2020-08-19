<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = ['title' => 'Home'];
		return view('home/index', $data);
	}

	public function qrcode()
	{
		return view('home/qrcode');
	}
}
