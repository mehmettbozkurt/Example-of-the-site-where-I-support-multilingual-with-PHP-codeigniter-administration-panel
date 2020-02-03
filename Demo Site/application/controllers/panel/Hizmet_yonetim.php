<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Hizmet_yonetim extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata("kullaniciBilgiler") == NULL)
		{
			$this->session->set_flashdata('mesaj',"Lütfen Giriş Yapınız!");
			redirect(base_url("panel"));
		}
		$this->load->model("panel/hizmet_yonetim_model","hizmet");

		if (!file_exists('public/admin/uploads/hizmetler')) {
	    	mkdir('public/admin/uploads/hizmetler', 0777, true);
		}
	}
		

	public function index()
	{
		@$data["hizmetler"] = $this->hizmet->hizmet_listele();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/hizmet_yonetim/hizmet_listesi",$data);
		$this->load->view("panel/footer");
	}


	public function yeni_hizmet()
	{
		@$data["hizmetler"]=$this->hizmet->hizmet_listele();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/hizmet_yonetim/hizmet_ekle",$data);
		$this->load->view("panel/footer");

	}

	public function hizmet_ekle()
	{
		$hizmet = array('hizmetSira' => $this->input->post("hizmetSira",TRUE),
			   	   	    'hizmetResim' => $this->input->post("hizmetResim",TRUE),
						'hizmetDurum'=> 0,
						);

		//hizmet gösterimi açık
		if($this->input->post("hizmetDurum",TRUE)!=NULL){
			$hizmet['hizmetDurum'] = 1; 
		}

		$hizmetDiller = array('hizmetBaslik'=> $this->input->post("hizmetBaslik",TRUE),
				   			 'hizmetIcerik' => $this->input->post("hizmetIcerik",TRUE),
				   			 'hizmetSeo'	=> url_title($this->input->post("hizmetBaslik",TRUE)),
				   			 'dil' 			=> $this->input->post("dil",TRUE)
				   			);

            
        if($this->hizmet->hizmet_ekle($hizmet,$hizmetDiller)){
		
			$mesaj = array('icerik' => $hizmet["hizmetAdi"]." Eklendi.","tipi"=>"success" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url("panel/hizmet_yonetim"));

		}else{

			$mesaj = array('icerik' => "Hizmet Eklenemedi!","tipi"=>"danger" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url("panel/hizmet_yonetim"));
		}

	}

	public function hizmet_duzenle($id)
	{
		$data["hizmet"]=$this->hizmet->hizmet_listele($id);
		
		$dosya = 'public/admin/uploads/hizmetler/'.$data["hizmet"]->hizmetId;

		if (!file_exists($dosya)) {
			mkdir($dosya, 0777, true);
			copy('public/index.php', $dosya.'/index.php');
		}

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/hizmet_yonetim/hizmet_duzenle",$data);
		$this->load->view("panel/footer");
	}

	public function hizmet_sil($id)
	{
		if($this->hizmet->hizmet_sil($id)){

			$mesaj = array('icerik' => "Hizmet Silindi.","tipi"=>"success" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url()."panel/hizmet_yonetim");

		}else{

			$mesaj = array('icerik' => "hizmet Silinemedi!","tipi"=>"danger" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url()."panel/hizmet_yonetim");

		}
	}

	public function hizmet_guncelle($id)
	{
		$hizmet = array('hizmetSira' => $this->input->post("hizmetSira",TRUE),
			   	   	    'hizmetResim' => $this->input->post("hizmetResim",TRUE),
						'hizmetDurum'=> 0
						);

		//hizmet gösterimi açık
		if($this->input->post("hizmetDurum",TRUE)!=NULL){
			$hizmet['hizmetDurum'] = 1; 
		}

		$hizmetDiller = array('hizmetBaslik'=>  $this->input->post("hizmetBaslik",TRUE),
				   			 'hizmetIcerik' =>  $this->input->post("hizmetIcerik",TRUE),
				   			 'hizmetSeo'	=>  url_title($this->input->post("hizmetBaslik",TRUE)),
				   			 'dil' =>  $this->input->post("dil",TRUE));

        if($this->hizmet->hizmet_duzenle($id,$hizmet,$hizmetDiller)){
	
			$mesaj = array('icerik' => $hizmet["hizmetBaslik"]." Düzenlendi.","tipi"=>"success" );
			redirect(base_url("panel/hizmet_yonetim"));

		}else{
			
			$mesaj = array('icerik' => $hizmet["hizmetBaslik"]." Düzenlenemedi!","tipi"=>"danger" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url("panel/hizmet_yonetim"));

		}
   }

   public function hizmet_dil_listele($hizmetId,$dil)//Ajax dil seçeneğine göre hizmet düzünle
	{
		if($this->hizmet->hizmet_dil_listele($hizmetId,$dil)){
			echo json_encode($this->hizmet->hizmet_dil_listele($hizmetId,$dil),JSON_UNESCAPED_UNICODE);
		}
	}

}


 ?>