<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class slayt_yonetim extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata("kullaniciBilgiler") == NULL)
		{
			$this->session->set_flashdata('mesaj',"Lütfen Giriş Yapınız!");
			redirect(base_url()."panel");
		}
		$this->load->model("panel/slayt_yonetim_model","slayt");

		if (!file_exists('public/admin/uploads/slayt')) {
	    	mkdir('public/admin/uploads/slayt', 0777, true);
		}
	}
		

	public function index()
	{
		@$data["slaytlar"] = $this->slayt->slayt_listele();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/slayt_yonetim/slayt_listesi",$data);
		$this->load->view("panel/footer");
	}


	public function yeni_slayt()
	{
		@$data["slaytlar"]=$this->slayt->slayt_listele();
		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/slayt_yonetim/slayt_ekle",$data);
		$this->load->view("panel/footer");

	}

	public function slayt_ekle()
	{

		$slayt = array( 'slaytBaslik'    => $this->input->post("slaytBaslik",TRUE),
						'slaytBaslik_en' => $this->input->post("slaytBaslik_en",TRUE),
						'slaytSeo' 	     => url_title($this->input->post("slaytBaslik",TRUE)),
						'slaytSeo_en' 	 => url_title($this->input->post("slaytBaslik_en",TRUE)),
						'slaytResim' 	 => $this->input->post("slaytResim",TRUE),
					);
		
        if($this->slayt->slayt_ekle($slayt)){

        	$mesaj = array("icerik"=>$slayt["slaytBaslik"]." Eklendi." ,"tip"=> "success" );
			$this->session->set_flashdata('mesaj',$mesaj);
			redirect(base_url("panel/slayt_yonetim"));

		}else{

        	$mesaj = array("icerik"=>"slayt Eklenemedi!" ,"tip"=> "danger" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url("panel/slayt_yonetim"));

		}
       

	}

	public function slayt_duzenle($id)
	{
		$data["slayt"]=$this->slayt->slayt_listele($id);
		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/slayt_yonetim/slayt_duzenle",$data);
		$this->load->view("panel/footer");
	}

	public function slayt_sil($id)
	{
		if($this->slayt->slayt_sil($id)){
			redirect(base_url()."panel/slayt_yonetim");
		}
	}

	public function slayt_guncelle($id)
	{
		$slayt = array( 'slaytBaslik'    => $this->input->post("slaytBaslik",TRUE),
						'slaytBaslik_en' => $this->input->post("slaytBaslik_en",TRUE),
						'slaytSeo' 	     => url_title($this->input->post("slaytBaslik",TRUE)),
						'slaytSeo_en' 	 => url_title($this->input->post("slaytBaslik_en",TRUE)),
						'slaytResim' 	 => $this->input->post("slaytResim",TRUE),
					);
		
        if($this->slayt->slayt_duzenle($id,$slayt)){

        	$mesaj = array("icerik"=>$slayt["slaytBaslik"]." Düzenlendi." ,"tip"=> "success" );
			$this->session->set_flashdata('mesaj',$mesaj);
			redirect(base_url()."panel/slayt_yonetim");

		}else{

        	$mesaj = array("icerik"=>"slayt Düzenlenemedi!" ,"tip"=> "danger" );
			$this->session->set_flashdata('mesaj',$mesaj);

			redirect(base_url()."panel/slayt_yonetim");

		}
	       
		
	}

}


 ?>