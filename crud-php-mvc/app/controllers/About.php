<?php
   class About extends Controller {
	   function index(){
           $data['judul'] = 'About';
		   $this->view('templates/header', $data);
		   $this->view('about/index');
		   $this->view('templates/footer');
	   }
   }