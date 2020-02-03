	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kurumsal extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model("Anasayfa_model","anasayfa");

		}

		public function index($seo)
		{
			$sayfa =  $this->anasayfa->sayfa($seo);
			
			if(empty($sayfa)){
				redirect(base_url('sayfa-bulunamadi'));
			}

			$dosya = "public/admin/uploads/sayfalar/".$sayfa->sayfaId."/";
			$resimler = glob($dosya."*.{jpg,png,gif,jpeg}", GLOB_BRACE);
			
			foreach ($resimler as $index=>$resim) {
				$resim = explode("/", $resim);
				$resim = array_pop($resim);
			}
			$sayfa->resimler = $resimler;

			$belgeler = glob($dosya."*.{pdf,doc,docx,xls,txt}", GLOB_BRACE);
			
			foreach ($belgeler as $index=>$belge) {
				$belge = explode("/", $belge);
				$belge = array_pop($belge);
			}
			$sayfa->belgeler = $belgeler;

			$this->data["sayfa"] = $sayfa;

			$this->data["ayarlar"]->siteBaslik = $this->data["sayfa"]->sayfaBaslik." | ".$this->data["ayarlar"]->siteBaslik;
			$this->data["ayarlar"]->siteAciklama = $this->data["sayfa"]->sayfaBaslik." | ".$this->data["ayarlar"]->siteAciklama;


			$this->load->view('header',$this->data);
			$this->load->view('kurumsal',$this->data);
			$this->load->view('footer',$this->data);
		}

		public function error()
		{
			$this->load->view("header",$this->data);
			$this->load->view("404",$this->data);
			$this->load->view("footer",$this->data);
		}
		
	}