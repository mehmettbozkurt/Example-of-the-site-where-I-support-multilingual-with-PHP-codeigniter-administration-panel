<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa_model extends CI_Model{
	
	public $dil = 0;
	
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('destek_helper');
		$this->dil = dil();
	}

	public function sayfalar()
	{
		
		$this->db->where("sayfalar.ustSayfaId",0);
		$this->db->where("sayfalar.sayfaDurum",1);
		$this->db->where("sayfa_diller.dil",$this->dil);
		$this->db->order_by("sayfalar.sayfaSirasi","ASC");
		$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
		$sayfalar = $this->db->get("sayfalar")->result();
		
		foreach ($sayfalar as $sayfa) {
			$this->db->order_by("sayfalar.sayfaSirasi","ASC");
			$this->db->where("sayfalar.ustSayfaId",$sayfa->sayfaId);
			$this->db->where("sayfa_diller.dil",$this->dil);
			$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
			$sayfa->altSayfalar = $this->db->get("sayfalar")->result();
		}


		return $sayfalar;

	}

	public function hizmetler()
	{
		$this->db->order_by("hizmetler.hizmetSira");
		$this->db->limit(6);
		$this->db->where("hizmet_diller.dil",$this->dil);
		$this->db->join("hizmet_diller","hizmet_diller.hizmetId = hizmetler.hizmetId");
		return $this->db->get("hizmetler")->result(); 
	}

	public function markalar()
	{
		$this->db->order_by("markaSira");
		return $this->db->get("markalar")->result(); 
	}

	public function slaytlar()
	{	
		$dil = "";
		if($this->dil == 1){
			$dil = "_en";
		}

		$this->db->select("slaytBaslik$dil as slaytBaslik,slaytSeo$dil as slaytSeo,slaytResim");
		$this->db->order_by("slaytTarih","DESC");
		return $this->db->get("slaytlar")->result(); 
		
	}
	
	public function bloglar()
	{
		$this->db->limit(2);
		$this->db->where("bloglar.blogDurum",1);
		$this->db->order_by("bloglar.blogId","DESC");
		$this->db->where("blog_diller.dil",$this->dil);
		$this->db->join("blog_diller","blog_diller.blogId = bloglar.blogId");
		return $this->db->get("bloglar")->result();
	}

	public function blog($seo)
	{
		$this->db->where("bloglar.blogSeo",$seo);
		$this->db->where("blog_diller.dil",$this->dil);
		$this->db->join("blog_diller","blog_diller.blogId = bloglar.blogId");
		return $this->db->get("bloglar")->row();
	}

	public function sayfa($seo)
	{
		$this->db->where("sayfa_diller.sayfaSeo",$seo);
		$this->db->where("sayfa_diller.dil",$this->dil);
		$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
		$sayfa = $this->db->get("sayfalar")->row();

		if (isset($sayfa)) {
			$this->db->where("sayfalar.ustSayfaId",$sayfa->sayfaId);
			$this->db->order_by("sayfalar.sayfaSirasi","ASC");
			$this->db->where("sayfa_diller.dil",$this->dil);
			$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
			$sayfa->altSayfalar = $this->db->get("sayfalar")->result();
		}
		
		return $sayfa;
	}

	public function mesaj_gonder($mesaj)
	{
		return $this->db->insert("mesajlar",$mesaj);
		
	}
	
}

?>