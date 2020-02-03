<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Urun_yonetim extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata("kullaniciBilgiler") == NULL)
		{
			$this->session->set_flashdata('mesaj',"Lütfen Giriş Yapınız!");
			redirect(base_url("panel"));
		}

		$this->load->model("panel/urun_yonetim_model","urun");
		if (!file_exists('public/admin/uploads/urunler')) {
			mkdir('public/admin/uploads/urunler', 0777, true);
		}

	}

	public function index()

	{
		@$data["urunler"] = $this->urun->urun_listele();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/urun_yonetim/urun_listesi",$data);
		$this->load->view("panel/footer");

	}


	public function yeni_urun()
	{

		@$data["urunler"]=$this->urun->urun_listele();
		@$data["kategoriler"] = $this->urun->kategoriler();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/urun_yonetim/urun_ekle",$data);
		$this->load->view("panel/footer");
	}



	public function urun_ekle()
	{
		$urun = array(
						'kategoriId' => $this->input->post("kategoriId",TRUE),
						'urunDurum' => 0 
					);

		//Sayfa gösterimi açık

		if($this->input->post("urunDurum",TRUE)!=NULL){
			$urun['urunDurum'] = 1;
		}

		$urunDiller = array( 'urunAdi' =>  $this->input->post("urunAdi",TRUE),
				   			 'urunIcerik' =>  $this->input->post("urunIcerik",TRUE),
				   			 'urunSeo'	  =>  url_title($this->input->post("urunAdi",TRUE)),
				   			 'urunKisaIcerik' => $this->input->post("urunKisaIcerik",TRUE),
							 'urunAciklama' => $this->input->post("urunAciklama",TRUE),
				   			 'dil' =>  $this->input->post("dil",TRUE));

		$urunId = $this->urun->urun_ekle($urun,$urunDiller);

		if($urunId != 0){
			$mesaj = array('icerik' => $urun["urunAdi"]." Eklendi.","tipi"=>"success" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url("panel/urun_yonetim/urun_duzenle/$urunId?tip=yeni"));

		}else{

			$mesaj = array('icerik' => "Ürün Eklenemedi!","tipi"=>"danger" );

			$this->session->set_flashdata("mesaj",$mesaj);

			redirect(base_url("panel/urun_yonetim"));

		}



	}
	public function urun_duzenle($id)
	{
		$data["urun"]=$this->urun->urun_listele($id);

		$dosya = 'public/admin/uploads/urunler/'.$data["urun"]->urunId;

		if (!file_exists($dosya)) {
			mkdir($dosya, 0777, true);
			copy('public/index.php', $dosya.'/index.php');
		}

		$teknik = "public/admin/uploads/urunler/".$id."/teknik.pdf";
	  	$bilgi  = "public/admin/uploads/urunler/".$id."/bilgi.pdf";

	  	$data["urun"]->teknik = file_exists($teknik);
	  	$data["urun"]->bilgi  = file_exists($bilgi);

		@$data["kategoriler"] = $this->urun->kategoriler();
		$data["urun_sorular"] = $this->urun->urun_sorular($id);

		$this->load->view("panel/header");

		$this->load->view("panel/sidebar");

		$this->load->view("panel/urun_yonetim/urun_duzenle",$data);

		$this->load->view("panel/footer");

	}



	public function urun_sil($id)

	{

		if($this->urun->urun_sil($id)){



			$mesaj = array('icerik' => "Ürün Silindi.","tipi"=>"success" );

			$this->session->set_flashdata("mesaj",$mesaj);

			redirect(base_url()."panel/urun_yonetim");



		}else{



			$mesaj = array('icerik' => "Ürün Silinemedi!","tipi"=>"danger" );

			$this->session->set_flashdata("mesaj",$mesaj);

			redirect(base_url()."panel/urun_yonetim");



		}

	}



	public function urun_guncelle($id)
	{
		$urun = array(
						'kategoriId' => $this->input->post("kategoriId",TRUE),
						'urunDurum' => 0 
					);

		//Sayfa gösterimi açık

		if($this->input->post("urunDurum",TRUE)!=NULL){
			$urun['urunDurum'] = 1;
		}

		$urunDiller = array( 'urunAdi' =>  $this->input->post("urunAdi",TRUE),
				   			 'urunIcerik' =>  $this->input->post("urunIcerik",TRUE),
				   			 'urunSeo'	  =>  url_title($this->input->post("urunAdi",TRUE)),
				   			 'urunKisaIcerik' => $this->input->post("urunKisaIcerik",TRUE),
							 'urunAciklama' => $this->input->post("urunAciklama",TRUE),
				   			 'dil' =>  $this->input->post("dil",TRUE));

		$sorular  = $this->input->post("soru");
		$sorular_en  = $this->input->post("soru_en");
		$cevaplar = $this->input->post("cevap");
		$cevaplar_en = $this->input->post("cevap_en");
		$urun_sorular = [];

		for ($i=0; $i < count($sorular) ; $i++) {
			
			if($sorular[$i] != "" && $cevaplar[$i] != "" ){
				$urun_soru = [
								"soru" => $sorular[$i],
								"soru_en" => $sorular_en[$i],
								"cevap" => $cevaplar[$i],
								"cevap_en" => $cevaplar_en[$i],
								"urunId"=>$id
							];
				array_push($urun_sorular, $urun_soru);
			}
			
		}

		$bilgi = true;
		$teknik = true;

		if($_FILES["teknik"]["name"]!=""){
			$config = array(
								'upload_path' => "./public/admin/uploads/urunler/$id/",
								'allowed_types' => "doc|docx|xls|pdf",
								'overwrite' => TRUE,
								'max_size' => "4096000",//4MB
								'file_name' => 'teknik.pdf'
							);

			$this->load->library('upload', $config);
			$teknik = $this->upload->do_upload('teknik');
		}

		if($_FILES["bilgi"]["name"]!=""){
			$config["file_name"] = "bilgi.pdf";
			$this->upload->initialize($config);
			$bilgi = $this->upload->do_upload('bilgi');
		}

		if($this->urun->urun_duzenle($id,$urun,$urun_sorular,$urunDiller)){


			$mesaj = array('icerik' => $urun["urunAdi"]." Düzenlendi.","tipi"=>"success" );

			if(!$bilgi || !$teknik)
			{
				$mesaj = array(
						'icerik' => "İçerik Düzenlendi Fakat Dosyalar Yüklenmedi.( ".$this->upload->display_errors()." )",
						"tipi"	 => "warning"
					);
			}

			$this->session->set_flashdata("mesaj",$mesaj);

			redirect(base_url("panel/urun_yonetim"));


		}else{

			$mesaj = array('icerik' => $urun["urunAdi"]." Düzenlenemedi!","tipi"=>"danger" );

			$this->session->set_flashdata("mesaj",$mesaj);

			redirect(base_url("panel/urun_yonetim"));

		}
	}

	public function urun_dil_listele($urunId,$dil)//Ajax dil seçeneğine göre ürün düzünle
	{
		if($this->urun->urun_dil_listele($urunId,$dil)){
			echo json_encode($this->urun->urun_dil_listele($urunId,$dil),JSON_UNESCAPED_UNICODE);
		}
	}
}

?>
