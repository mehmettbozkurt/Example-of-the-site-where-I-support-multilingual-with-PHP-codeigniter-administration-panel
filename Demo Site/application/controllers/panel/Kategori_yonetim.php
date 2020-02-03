<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_yonetim extends CI_Controller
{

	

	function __construct()

	{

		parent::__construct();

		if($this->session->userdata("kullaniciBilgiler") == NULL)

		{

			$this->session->set_flashdata('mesaj',"Lütfen Giriş Yapınız!");

			redirect(base_url()."panel");

		}

		$this->load->model("panel/kategori_yonetim_model","kategori");



		if (!file_exists('public/admin/uploads/kategori')) {

	    	mkdir('public/admin/uploads/kategori', 0777, true);

		}

	}

		



	public function index()

	{

		@$data["kategoriler"] = $this->kategori->kategori_listele();


		$this->load->view("panel/header");

		$this->load->view("panel/sidebar");

		$this->load->view("panel/kategori_yonetim/kategori_listesi",$data);

		$this->load->view("panel/footer");

	}





	public function yeni_kategori()

	{

		@$data["kategoriler"]=$this->kategori->kategori_listele();

		$this->load->view("panel/header");

		$this->load->view("panel/sidebar");

		$this->load->view("panel/kategori_yonetim/kategori_ekle",$data);

		$this->load->view("panel/footer");



	}



	public function kategori_ekle()
	{
		$kategori = array(  'kategoriAdi'    => $this->input->post("kategoriAdi",TRUE),
							'kategoriAdi_en' => $this->input->post("kategoriAdi_en",TRUE),
							'kategoriSira'   => $this->input->post("kategoriSira",TRUE),
							'kategoriSeo'    => url_title($this->input->post("kategoriAdi",TRUE)),
							'kategoriSeo_en' => url_title($this->input->post("kategoriAdi_en",TRUE)),
							'kategoriResim'  => $this->input->post("kategoriResim",TRUE),
							'ustKategoriId'  => $this->input->post("ustKategoriId",TRUE),
							'kategoriDurum'  => 0);

					

		if($this->input->post("kategoriDurum",TRUE)!=NULL){

			$kategori['kategoriDurum'] = 1; 

		}

       if($this->kategori->kategori_ekle($kategori)){



			$mesaj = array('icerik' => $kategori["kategoriAdi"]." Eklendi.","tipi","success" );

			redirect(base_url()."panel/kategori_yonetim");



		}else{



			$mesaj = array('icerik' => "kategori Eklenemedi!","tipi","danger" );

			redirect(base_url()."panel/kategori_yonetim");

			

		}

       



	}



	public function kategori_duzenle($id)

	{

		$data["kategori"]=$this->kategori->kategori_listele($id);

		@$data["kategoriler"]=$this->kategori->kategori_listele();

		

		if (!file_exists('public/admin/uploads/kategoriler/'.$data["kategori"]->kategoriId)) {

	    	mkdir('public/admin/uploads/kategoriler/'.$data["kategori"]->kategoriId, 0777, true);

		}

		

		$this->load->view("panel/header");

		$this->load->view("panel/sidebar");

		$this->load->view("panel/kategori_yonetim/kategori_duzenle",$data);

		$this->load->view("panel/footer");

	}

	public function kategori_guncelle($id)

	{

		$kategori = array(  'kategoriAdi'    => $this->input->post("kategoriAdi",TRUE),
							'kategoriAdi_en' => $this->input->post("kategoriAdi_en",TRUE),
							'kategoriSira'   => $this->input->post("kategoriSira",TRUE),
							'kategoriSeo'    => url_title($this->input->post("kategoriAdi",TRUE)),
							'kategoriSeo_en' => url_title($this->input->post("kategoriAdi_en",TRUE)),
							'kategoriResim'  => $this->input->post("kategoriResim",TRUE),
							'ustKategoriId'  => $this->input->post("ustKategoriId",TRUE),
							'kategoriDurum'  => 0);



		//kategori gösterimi açık

		if( $this->input->post("kategoriDurum",TRUE)!=NULL){

			$kategori['kategoriDurum'] = 1; 

		}



		if($this->kategori->kategori_duzenle($id,$kategori)){



			$mesaj = array('icerik' => $kategori["kategoriAdi"]." Silindi.","tip"=>"success");

			redirect(base_url()."panel/kategori_yonetim");

		

		}else{



			$mesaj = array('icerik' => $kategori["kategoriAdi"]." Silindi!","tip"=>"danger");

			redirect(base_url()."panel/kategori_yonetim");

			

		}

		

	}



		public function kategori_sil($id)

	{

		if($this->kategori->kategori_sil($id)){



			$mesaj = array('icerik' => "kategori Silindi.","tip"=>"success");

			redirect(base_url()."panel/kategori_yonetim");



		}else{



			$mesaj = array('icerik' => "kategori Silinemedi!","tip"=>"danger");

			redirect(base_url()."panel/kategori_yonetim");

			

		}

	}



	



}





 ?>