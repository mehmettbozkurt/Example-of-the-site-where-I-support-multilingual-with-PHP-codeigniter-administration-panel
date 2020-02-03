<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Galeri_yonetim extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata("kullaniciBilgiler") == NULL)
		{
			$this->session->set_flashdata('mesaj',"Lütfen Giriş Yapınız!");
			redirect(base_url()."panel");
		}

	}
	

	public function galeriler($galeriAd)
	{
		$yol = 'public/admin/uploads/'.$galeriAd;

		if (!file_exists($yol )) {
	    	mkdir($yol , 0777, true);
		}

		$data["galeriAd"] = $galeriAd;

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/galeri_yonetim/galeri_ekle",$data);
		$this->load->view("panel/footer");

	}

}


 ?>