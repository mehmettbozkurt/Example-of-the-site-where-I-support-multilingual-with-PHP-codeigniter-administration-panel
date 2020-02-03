<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hizmetler extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Hizmetler_model","hizmetler");
		$this->load->model("Anasayfa_model","anasayfa");
		$this->load->library('pagination');

	}

	public function index()
	{
		
		$this->data["hizmetler"] = $this->hizmetler->hizmetler();

		$siteBaslik = ($this->dil == 0) ? "Hizmetler | " : $this->data["kelimeler"]->hizmetler;
		$siteAciklama = ($this->dil == 0) ? "Hizmetler | " : $this->data["kelimeler"]->hizmetler;

		$this->data["ayarlar"]->siteBaslik = $siteBaslik.$this->data["ayarlar"]->siteBaslik;
		$this->data["ayarlar"]->siteAciklama =  $siteAciklama.$this->data["ayarlar"]->siteAciklama;

		$this->load->view('header',$this->data);
		$this->load->view('hizmetler',$this->data);
		$this->load->view('footer',$this->data);
	}

	public function hizmet_icerik($seo)
	{
		
		$this->data["hizmetler"] = $this->anasayfa->hizmetler();
		$this->data["hizmet"] = $this->hizmetler->hizmet($seo);
		if(empty($this->data["hizmet"])){
			redirect(base_url('sayfa-bulunamadi'));
		}
		
		$this->data["ayarlar"]->siteBaslik = $this->data["hizmet"]->hizmetBaslik ." | ".$this->data["ayarlar"]->siteBaslik;
		$this->data["ayarlar"]->siteAciklama = $this->data["hizmet"]->hizmetBaslik ." | ".$this->data["ayarlar"]->siteAciklama;

		$this->load->view('header',$this->data);
		$this->load->view('hizmet_ayrinti',$this->data);
		$this->load->view('footer',$this->data);
	}

}