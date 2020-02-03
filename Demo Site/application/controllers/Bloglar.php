<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloglar extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("bloglar_model","bloglar");
		$this->load->model("Anasayfa_model","anasayfa");
		$this->load->library('pagination');

	}

	public function index()
	{
		$veri=$this->bloglar->blog_sayisi();
		$config['base_url'] = base_url("bloglar/"); 
		$config['total_rows'] = $veri;
		$config['per_page'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<ul class="pagination pagination-box">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '&laquo';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '<li>';
		$config['last_link'] = '>>';
		$config['last_tag_open'] ='<li>';
		$config['last_tagl_close'] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = "</li>";
		$config['next_link'] = '>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tagl_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a class=""><span class="sr-only">(current)</span>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] ='<li>';
		$config['num_tag_close'] ='</li>';
		$page = (is_numeric($this->uri->segment(2))) ? $this->uri->segment(2)-1  : 0;
		$page *= $config["per_page"];
		$this->pagination->initialize($config);
		$this->data["sayfaLinkleri"] =  explode('&nbsp;',$this->pagination->create_links());
		$this->data["bloglar"] = @$this->bloglar->blog_getir($config["per_page"], $page);
		if(empty($this->data["bloglar"])){
			redirect(base_url());
		}
		$dosya = "public/admin/uploads/galeri/";
		$resimler = glob($dosya . "*.*");
		
		foreach ($resimler as $index=>$resim) {
			$resim = explode("/", $resim);
			$resim = array_pop($resim);
		}
		$this->data["resimler"] = $resimler;

		$siteBaslik = ($this->dil == 0) ? "Bloglar | " : $this->data["kelimeler"]->bloglar;
		$siteAciklama = ($this->dil == 0) ? "Bloglar | " : $this->data["kelimeler"]->bloglar;

		$this->data["ayarlar"]->siteBaslik = $siteBaslik.$this->data["ayarlar"]->siteBaslik;
		$this->data["ayarlar"]->siteAciklama =  $siteAciklama.$this->data["ayarlar"]->siteAciklama;


		$this->load->view('header',$this->data);
		$this->load->view('bloglar',$this->data);
		$this->load->view('footer',$this->data);
	}

	public function blog_icerik($seo)
	{
		
		$this->data["bloglar"] = $this->anasayfa->bloglar();
		$this->data["blog"] = $this->bloglar->blog($seo);

		$dosya = "public/admin/uploads/bloglar/".$this->data["blog"]->blogId."/";
		$resimler = glob($dosya."*.{jpg,png,gif,jpeg}", GLOB_BRACE);
		
		foreach ($this->data["bloglar"] as $blog) {
			$dosya = "public/admin/uploads/bloglar/".$blog->blogId."/";
			$resimler = glob($dosya."*.{jpg,png,gif,jpeg}", GLOB_BRACE);
			
			foreach ($resimler as $index=>$resim) {
				$resim = explode("/", $resim);
				$resim = array_pop($resim);
			}
			$blog->resimler = $resimler;		
		}	

		if(empty($this->data["blog"])){
			redirect(base_url('sayfa-bulunamadi'));
		}
		
		$this->data["ayarlar"]->siteBaslik = $this->data["blog"]->blogBaslik ." | ".$this->data["ayarlar"]->siteBaslik;
		$this->data["ayarlar"]->siteAciklama = $this->data["blog"]->blogBaslik ." | ".$this->data["ayarlar"]->siteAciklama;

		$this->load->view('header',$this->data);
		$this->load->view('blog_ayrinti',$this->data);
		$this->load->view('footer',$this->data);
	}

}