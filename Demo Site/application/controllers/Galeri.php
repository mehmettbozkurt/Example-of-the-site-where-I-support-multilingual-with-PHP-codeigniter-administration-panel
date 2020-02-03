<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Anasayfa_model","anasayfa");

	}

	public function index()
	{
		$dosya = "public/admin/uploads/galeri/";
		$resimler = glob($dosya . "*.*");
		
		foreach ($resimler as $index=>$resim) {
			$resim = explode("/", $resim);
			$resim = array_pop($resim);
		}
		$this->data["resimler"] = $resimler;


		$this->data["ayarlar"]->siteBaslik = "Galeri | ".$this->data["ayarlar"]->siteBaslik;
		$this->data["ayarlar"]->siteAciklama = "Galeri | ".$this->data["ayarlar"]->siteAciklama;

		
		$this->load->view('header',$this->data);
		$this->load->view('galeri',$this->data);
		$this->load->view('footer',$this->data);
	}
}