<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Giris_yonetim extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("panel/Giris_yonetim_model","giris");
		
	}

	public function index()
	{
		if($this->session->userdata("kullaniciBilgiler"))
		{
			$data["sayfaSayisi"] = $this->giris->sayfaSayisi();
		
			$this->load->view("panel/header");
			$this->load->view("panel/sidebar",$data);
			$this->load->view("panel/index",$data);
			$this->load->view("panel/footer");	

		}else{

			$this->load->view("panel/header");
			$this->load->view("panel/giris");
			$this->load->view("panel/footer");
		
		}
		
	}

	public function giris()
	{
		$kullaniciAdi = $this->input->post("kullaniciAdi",TRUE);
		$sifre = md5($this->input->post("sifre",TRUE));

		$data = $this->giris->giris($kullaniciAdi,$sifre);
		

		if($data){

			$this->session->set_userdata('kullaniciBilgiler', $data);

		}else{

			$this->session->set_flashdata('mesaj', "Kullanıcı adı veya şifre hatalı tekrar deneyiniz.");

		}
		
		redirect(base_url()."panel");


	}

	public function cikis()
	{
		$this->session->unset_userdata("kullaniciBilgiler");
		redirect(base_url()."panel");
	}

}

 ?>