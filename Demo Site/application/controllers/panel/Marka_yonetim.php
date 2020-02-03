<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Marka_yonetim extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata("kullaniciBilgiler") == NULL)
		{
			$this->session->set_flashdata('mesaj',"Lütfen Giriş Yapınız!");
			redirect(base_url()."panel");
		}
		$this->load->model("panel/marka_yonetim_model","marka");

		$dosya = 'public/admin/uploads/markalar';
		if (!file_exists($dosya)) {
	    	mkdir($dosya, 0777, true);
			copy('public/index.php', $dosya.'/index.php');
		}
	}
		

	public function index()
	{
		@$data["markalar"] = $this->marka->marka_listele();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/marka_yonetim/marka_listesi",$data);
		$this->load->view("panel/footer");
	}


	public function yeni_marka()
	{
		@$data["markalar"]=$this->marka->marka_listele();
		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/marka_yonetim/marka_ekle",$data);
		$this->load->view("panel/footer");

	}

	public function marka_ekle()
	{

		$marka = array('markaAd' => $this->input->post("markaAd",TRUE),
						'markaLink' => $this->input->post("markaLink",TRUE),
						'markaSira' => $this->input->post("markaSira",TRUE),
						'markaResim' => $this->input->post("markaResim",TRUE)
					);
		

        if($this->marka->marka_ekle($marka)){

        	$mesaj = array("icerik"=>$marka["markaAd"]." Eklendi." ,"tip"=> "success" );
			$this->session->set_flashdata('mesaj',$mesaj);
			redirect(base_url("panel/marka_yonetim"));

		}else{

        	$mesaj = array("icerik"=>"marka Eklenemedi!" ,"tip"=> "danger" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url("panel/marka_yonetim"));

		}
       

	}

	public function marka_duzenle($id)
	{
		$data["marka"]=$this->marka->marka_listele($id);
		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/marka_yonetim/marka_duzenle",$data);
		$this->load->view("panel/footer");
	}

	public function marka_sil($id)
	{
		if($this->marka->marka_sil($id)){
			redirect(base_url()."panel/marka_yonetim");
		}
	}

	public function marka_guncelle($id)
	{
		$marka = array('markaAd' => $this->input->post("markaAd",TRUE),
						'markaLink' => $this->input->post("markaLink",TRUE),
						'markaSira' => $this->input->post("markaSira",TRUE),
						'markaResim' => $this->input->post("markaResim",TRUE)
					);
		
        if($this->marka->marka_duzenle($id,$marka)){

        	$mesaj = array("icerik"=>$marka["markaAd"]." Düzenlendi." ,"tip"=> "success" );
			$this->session->set_flashdata('mesaj',$mesaj);
			redirect(base_url()."panel/marka_yonetim");

		}else{

        	$mesaj = array("icerik"=>"marka Düzenlenemedi!" ,"tip"=> "danger" );
			$this->session->set_flashdata('mesaj',$mesaj);

			redirect(base_url()."panel/marka_yonetim");

		}
	       
		
	}

}


 ?>