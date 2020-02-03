<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Kelime_yonetim extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata("kullaniciBilgiler") == NULL)
		{
			$this->session->set_flashdata('mesaj',"Lütfen Giriş Yapınız!");
			redirect(base_url()."panel");
		}
		$this->load->model("panel/kelime_yonetim_model","kelime");
	}
		

	public function index()
	{
		@$data["kelimeler"]=$this->kelime->kelime_listele();
		
		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/kelime_yonetim/kelime_listesi",$data);
		$this->load->view("panel/footer");
	}


	public function yeni_kelime()
	{
		@$data["kelimeler"]=$this->kelime->kelime_listele();
		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/kelime_yonetim/kelime_ekle",$data);
		$this->load->view("panel/footer");

	}

	public function kelime_ekle()
	{
		echo json_encode($this->kelime->kelime_ekle(),JSON_UNESCAPED_UNICODE);
	}

	public function kelime_duzenle($id)
	{
		$data["kelime"]=$this->kelime->kelime_listele($id);
		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/kelime_yonetim/kelime_duzenle",$data);
		$this->load->view("panel/footer");
	}

	public function kelime_sil($kelimeId)
	{
		echo json_encode($this->kelime->kelime_sil($kelimeId),JSON_UNESCAPED_UNICODE);
	}

	public function kelime_guncelle()
	{
		$sutunAdi = $this->input->post("sutunAdi",TRUE);
		$sutunDegeri = $this->input->post("sutunDegeri",TRUE);
		echo json_encode($this->kelime->kelime_duzenle($sutunAdi,$sutunDegeri),JSON_UNESCAPED_UNICODE);
	}

	public function kelime_dil_listele($kelimeId,$dil)//Ajax dil seçeneğine göre ürün düzünle
	{
		if($this->kelime->kelime_dil_listele($kelimeId,$dil)){
			echo json_encode($this->kelime->kelime_dil_listele($kelimeId,$dil),JSON_UNESCAPED_UNICODE);
		}
	}

}


 ?>