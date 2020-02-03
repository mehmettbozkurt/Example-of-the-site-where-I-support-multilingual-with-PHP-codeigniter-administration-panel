<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Markalar extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model("Anasayfa_model","anasayfa");
		}

		public function index()
		{
			$this->data["markalar"] = $this->anasayfa->markalar();

			$siteBaslik = ($this->dil == 0) ? "Markalar | " : $this->data["kelimeler"]->markalar;
			$siteAciklama = ($this->dil == 0) ? "Markalar | " : $this->data["kelimeler"]->markalar;

			$this->data["ayarlar"]->siteBaslik = $siteBaslik.$this->data["ayarlar"]->siteBaslik;
			$this->data["ayarlar"]->siteAciklama =  $siteAciklama.$this->data["ayarlar"]->siteAciklama;

			$this->load->view('header',$this->data);
			$this->load->view('markalar',$this->data);
			$this->load->view('footer',$this->data);
		}

	}

?>