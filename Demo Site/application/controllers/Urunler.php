<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("urunler_model","urunler");
		$this->load->model("Anasayfa_model","anasayfa");
		$this->load->library('pagination');
		$this->load->helper('destek_helper');
		$this->dil = dil();
	}

	public function index()
	{
		$this->data["urun_kategoriler"] = $this->urunler->urun_kategoriler();

		$config = array();
		$config["base_url"] = base_url("urunler/");
		$config['first_url'] = base_url("urunler/");
		$config["total_rows"] = count($this->urunler->urunler());
		$config['use_page_numbers'] = TRUE;
		$config['prev_link'] = '<';
		$config['per_page'] = 6;
		$config['full_tag_open'] = '<ul class="theme-pagination pt-sans pagination align-items-center mb-30">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'İlk';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '<li>';
		$config['last_link'] = 'Son';
		$config['last_tag_open'] ='<li>';
		$config['last_tagl_close'] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = "</li>";
		$config['next_link'] = '>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tagl_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a class="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] ='<li>';
		$config['num_tag_close'] ='</li>';
		
		$this->pagination->initialize($config);
		$page = (is_numeric($this->uri->segment(3))) ? $this->uri->segment(3)-1  : 0;
		$page *= $config["per_page"];
		
		$this->data["urunler"] = $this->urunler->urunler($config["per_page"], $page);
		
	/*	if(empty($this->data["urunler"])){
			redirect(base_url('urunler'));
		}*/

		$this->data["sayfaLinkleri"] =  explode('&nbsp;',$this->pagination->create_links());

		$this->load->view('header',$this->data);
		$this->load->view('urunler',$this->data);
		$this->load->view('footer',$this->data);
	}

	public function kategori_urunler($kategoriSeo)
	{
		$config = array();
		$config["base_url"] = base_url("urunler/$kategoriSeo/");
		$config['first_url'] = base_url("urunler/$kategoriSeo");
		$config["total_rows"] = count($this->urunler->kategori_urun_sayisi($kategoriSeo));
		$config['use_page_numbers'] = TRUE;
		$config['prev_link'] = '<';
		$config['per_page'] = 6;
		$config['full_tag_open'] = '<ul class="theme-pagination pt-sans pagination align-items-center mb-30">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'İlk';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '<li>';
		$config['last_link'] = 'Son';
		$config['last_tag_open'] ='<li>';
		$config['last_tagl_close'] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = "</li>";
		$config['next_link'] = '>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tagl_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a class="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] ='<li>';
		$config['num_tag_close'] ='</li>';
		
		$this->pagination->initialize($config);
		$page = (is_numeric($this->uri->segment(3))) ? $this->uri->segment(3)-1  : 0;
		$page *= $config["per_page"];
		
		$this->data["urunler"] = $this->urunler->kategori_urunler($kategoriSeo,$config["per_page"], $page);
		
		if(!empty($this->data["urunler"])){
			$siteBaslik = $this->data["urunler"][0]->kategoriAdi ." | ". $this->data["ayarlar"]->siteBaslik;
    		$siteAciklama = $this->data["urunler"][0]->kategoriAdi. " ". $this->data["ayarlar"]->siteAciklama;
		}else{
			$siteBaslik = ($this->dil == 0) ? "Ürün Bulunamadı | " : $this->data["kelimeler"]->bos_urun_mesaj;
			$siteAciklama = ($this->dil == 0) ? "Ürün Bulunamadı | " : $this->data["kelimeler"]->bos_urun_mesaj;

			$this->data["ayarlar"]->siteBaslik = $siteBaslik.$this->data["ayarlar"]->siteBaslik;
			$this->data["ayarlar"]->siteAciklama =  $siteAciklama.$this->data["ayarlar"]->siteAciklama;
		}
		
		$this->data["urun_kategoriler"] = $this->urunler->urun_kategoriler();
		$this->data["sayfaLinkleri"] =  explode('&nbsp;',$this->pagination->create_links());

        $this->data["tip"] = 1;//Kategori Sayfası

        $this->data["ayarlar"]->siteBaslik = $siteBaslik;
        $this->data["ayarlar"]->siteAciklama = $siteAciklama;

        $this->load->view('header',$this->data);
        $this->load->view('urunler',$this->data);
        $this->load->view('footer',$this->data);
    }

    public function urun_icerik($seo)
    {
    	$this->data["urunler"] = $this->urunler->urunler_ayrinti($seo);
    	$this->data["kategoriler_urun_ici"] = $this->urunler->kategoriler_urun_ici();
    	$this->data["urun_kategoriler"] = $this->urunler->urun_kategoriler();
    	$this->data["urun_sorular"] = $this->urunler->urun_sorular($seo);
    
    	$urun = $this->urunler->urun($seo);
    	$dosya = "public/admin/uploads/urunler/".$urun->urunId."/";
    	$resimler = glob($dosya."*.{jpg,png,gif,jpeg}", GLOB_BRACE);

    	foreach ($resimler as $index=>$resim) {
    		$resim = explode("/", $resim);
    		$resim = array_pop($resim);
    	}

    	$teknik = "public/admin/uploads/urunler/".$urun->urunId."/teknik.pdf";
    	$bilgi = "public/admin/uploads/urunler/".$urun->urunId."/bilgi.pdf";

    	$urun->teknik = file_exists($teknik);
    	$urun->bilgi  = file_exists($bilgi);
    	
    	$urun->resimler = $resimler;
    	$this->data["urun"] = $urun;

    	$this->load->view('header',$this->data);
    	$this->load->view('urun_ayrinti',$this->data);
    	$this->load->view('footer',$this->data);

    }

}