<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("Anasayfa_model","anasayfa");
		
	}

	public function index()
	{
		$this->data["slaytlar"] = $this->anasayfa->slaytlar();
		$this->data["bloglar"] = $this->anasayfa->bloglar();

		$dosya = "public/admin/uploads/galeri/";
		$resimler = glob($dosya . "*.*");
		
		foreach ($resimler as $index=>$resim) {
			$resim = explode("/", $resim);
			$resim = array_pop($resim);
		}
		$this->data["resimler"] = $resimler;
		
		$this->load->view("header",$this->data);
		$this->load->view("index",$this->data);
		//$this->load->view("footer",$this->data);

	}

	public function error()
	{
		header('HTTP/1.1 404 Not Found');
		$this->load->view("header",$this->data);
		$this->load->view("404",$this->data);
		$this->load->view("footer",$this->data);
	}

}

?>