<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();
	public $pageconfig = array();
	public $dil = 0;

	function __construct()
	{
		parent::__construct();
		$this->load->model("Ortak_model","ortak");
		$this->load->model("urunler_model","urunler");
		$this->load->model("Anasayfa_model","anasayfa");
		$this->load->library("pagination");
		$this->load->library('session');
		$this->load->helper('destek_helper');

		$this->dil = dil();//Destek_help

		switch ($this->dil) {
			case 0:
			$this->data["dil"] = "";
			break;
			case 1:
			$this->data["dil"] = "_en";
			break;
			case 2:
			$this->data["dil"] = "_deu";
			break;
			default:
			$this->data["dil"] = "";
			break;
		}
		
		$this->data["hizmetler"] = $this->anasayfa->hizmetler();
		$this->data["bloglar"] = $this->anasayfa->bloglar();
		$this->data["kategoriler"] = $this->urunler->kategoriler();
		$this->data["ayarlar"] = $this->ortak->site_ayarlar();
		$this->data["sayfalar"] = $this->ortak->sayfalar();
		$this->data["kelimeler"] = $this->ortak->kelimeler($this->data["dil"]);
		
	}

	public function dilDegis($dil)
	{
		//$dil = $this->input->post("dil",true);
		$this->session->set_userdata('dil',$dil);
		redirect(base_url());
	}

	public function dilDeger()
	{
		if($this->session->userdata('dil')){
			echo $this->session->userdata('dil');
		}else{
			echo 0;
		}
	}	
}