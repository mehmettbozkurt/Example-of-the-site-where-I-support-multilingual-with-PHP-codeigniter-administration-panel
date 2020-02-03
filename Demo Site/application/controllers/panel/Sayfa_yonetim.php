<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Sayfa_yonetim extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata("kullaniciBilgiler") == NULL)
		{
			$this->session->set_flashdata('mesaj',"Lütfen Giriş Yapınız!");
			redirect(base_url()."panel");
		}
		$this->load->model("panel/Sayfa_yonetim_model","sayfa");
	}
	

	public function index()
	{
		@$data["sayfalar"]=$this->sayfa->sayfa_listele();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/sayfa_yonetim/sayfa_listesi",$data);
		$this->load->view("panel/footer");
	}

	public function sayfa_sirala()
	{
		@$data["sayfalar"]=$this->sayfa->sayfa_listele();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/sayfa_yonetim/sayfa_sirasi",$data);
		$this->load->view("panel/footer");
	}
	
	public function sayfa_siralama()
	{	
		$menuler = $this->input->post('menuler');
		if($menuler!=NULL) {
			$jsonDecoded = json_decode($menuler,true);

			function parseJsonArray($jsonArray, $parentID = "")
			{
				$return = array();
				foreach ($jsonArray as $subArray) {
					$returnSubSubArray = array();
					if (isset($subArray['children'])) {
						$returnSubSubArray = parseJsonArray($subArray['children'], $subArray['id']);
					}
					$return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
					$return = array_merge($return, $returnSubSubArray);
				}

				return $return;
			}


			$readbleArray = parseJsonArray($jsonDecoded);
			foreach ($readbleArray as $key => $value) {

				if (is_array($value)) {
					if(empty($value['parentID'])){
						$ustsayfaId = intval(0);
					}else {
						$ustsayfaId = intval($value['parentID']);
					}


					$data = ["ustSayfaId"=>$ustsayfaId,"sayfaSirasi"=>$key,"sayfaId"=>$value['id']];

					$sonuc = $this->sayfa->sayfa_siralama($data);

				}
			}
			if($sonuc){ 
				echo 1;
			} else {
				echo 0;
			}

		} else {
			echo 0;
		}
	}

	public function yeni_sayfa()
	{
		@$data["sayfalar"]=$this->sayfa->sayfa_listele();


		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/sayfa_yonetim/sayfa_ekle",$data);
		$this->load->view("panel/footer");

	}

	public function sayfa_ekle()
	{
		$sayfa = array( 'ustsayfaId'  => $this->input->post("ustsayfaId",TRUE),
						'sayfaSirasi' => $this->input->post("sayfaSirasi",TRUE),
						'sayfaResim'  => $this->input->post("sayfaResim",TRUE),
						'sayfaURL'    => $this->input->post("sayfaLink",TRUE),
						'sayfaDurum'  => 0);

		//Sayfa gösterimi açık
		if($this->input->post("sayfaDurum",TRUE)!=NULL){
			$sayfa['sayfaDurum'] = 1; 
		}

		$sayfaDiller = array('sayfaBaslik' =>  $this->input->post("sayfaBaslik",TRUE),
				   			 'sayfaIcerik' =>  $this->input->post("sayfaIcerik",TRUE),
				   			 'sayfaSeo'	   =>  url_title($this->input->post("sayfaBaslik",TRUE)),
				   			 'dil' =>  $this->input->post("dil",TRUE));

		if($this->sayfa->sayfa_ekle($sayfa,$sayfaDiller)){

			$mesaj = array('icerik' => $sayfa["sayfaBaslik"]." Eklendi.","tipi","success" );
			redirect(base_url()."panel/sayfa_yonetim");

		}else{

			$mesaj = array('icerik' => "Sayfa Eklenemedi!","tipi","danger" );
			redirect(base_url()."panel/sayfa_yonetim");
			
		}

	}

	public function sayfa_duzenle($id)
	{

		$data["sayfa"]=$this->sayfa->sayfa_listele($id);
		@$data["sayfalar"]=$this->sayfa->sayfa_listele();
		$dosya = 'public/admin/uploads/sayfalar/'.$data["sayfa"]->sayfaId;

		if (!file_exists($dosya)) {
			mkdir($dosya, 0777, true);
			copy('public/index.php', $dosya.'/index.php');
		}
		
		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/sayfa_yonetim/sayfa_duzenle",$data);
		$this->load->view("panel/footer");
	}

	public function sayfa_sil($id)
	{
		if($this->sayfa->sayfa_sil($id)){

			$mesaj = array('icerik' => "Sayfa Silindi.","tip"=>"success");
			redirect(base_url()."panel/sayfa_yonetim");

		}else{

			$mesaj = array('icerik' => "Sayfa Silinemedi!","tip"=>"danger");
			redirect(base_url()."panel/sayfa_yonetim");
			
		}
	}

	public function sayfa_guncelle($id)
	{
		$sayfa = array( 'ustsayfaId'  => $this->input->post("ustsayfaId",TRUE),
						'sayfaSirasi' => $this->input->post("sayfaSirasi",TRUE),
						'sayfaResim'  => $this->input->post("sayfaResim",TRUE),
						'sayfaURL'    => $this->input->post("sayfaLink",TRUE),
						'sayfaDurum'  => 0);

		//Sayfa gösterimi açık
		if( $this->input->post("sayfaDurum",TRUE)!=NULL){
			$sayfa['sayfaDurum'] = 1; 
		}

		$sayfaDiller = array('sayfaBaslik' =>  $this->input->post("sayfaBaslik",TRUE),
				   			 'sayfaIcerik' =>  $this->input->post("sayfaIcerik",TRUE),
				   			 'sayfaSeo'	   =>  url_title($this->input->post("sayfaBaslik",TRUE)),
				   			 'dil' =>  $this->input->post("dil",TRUE));

		if($this->sayfa->sayfa_duzenle($id,$sayfa,$sayfaDiller)){

			$mesaj = array('icerik' => $sayfa["sayfaBaslik"]." Silindi.","tip"=>"success");
			redirect(base_url()."panel/sayfa_yonetim");
			
		}else{

			$mesaj = array('icerik' => $sayfa["sayfaBaslik"]." Silindi!","tip"=>"danger");
			redirect(base_url()."panel/sayfa_yonetim");
			
		}
		
	}

	public function sayfa_dil_listele($sayfaId,$dil)//Ajax dil seçeneğine göre sayfa düzünle
	{
		if($this->sayfa->sayfa_dil_listele($sayfaId,$dil)){
			echo json_encode($this->sayfa->sayfa_dil_listele($sayfaId,$dil),JSON_UNESCAPED_UNICODE);
		}
	}
}


?>