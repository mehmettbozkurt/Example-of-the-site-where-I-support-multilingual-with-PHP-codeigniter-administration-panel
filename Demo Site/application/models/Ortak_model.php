<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ortak_model extends CI_Model{
	public $dil = 0;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('destek_helper');
		$this->dil = dil();
	}

	public function site_ayarlar()
	{
		$dil = $this->data["dil"];

		$this->db->select("*,firmaGenelBilgi$dil as firmaGenelBilgi");
		return $this->db->get("siteayarlar")->row();
	}

	public function sayfalar()
	{
		//$this->db->where("ustSayfaId",0);
		$this->db->where("sayfalar.sayfaDurum",1);
		$this->db->order_by("sayfalar.sayfaSirasi","ASC");
		$this->db->where("sayfa_diller.dil",$this->dil);
		$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
		$sayfalar = $this->db->get("sayfalar")->result();
		return $this->sonsuz_sayfa($sayfalar);
	}

	public function sayfa($seo)
	{
		$this->db->like("sayfalar.sayfaSeo",$seo);
		$this->db->where("sayfa_diller.dil",$this->dil);
		$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
		$sayfa = $this->db->get("sayfalar")->row();
		if (isset($sayfa)) {
			$this->db->where("sayfalar.ustSayfaId",$sayfa->sayfaId);
			$this->db->where("sayfa_diller.dil",$this->dil);
			$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
			$sayfa->altSayfalar = $this->db->get("sayfalar")->result();
		}
		

		return $sayfa;
	}


	public function sonsuz_sayfa($sayfalar = array())
	{
		foreach ($sayfalar as $sayfa) {
			$this->db->where("sayfalar.ustSayfaId",$sayfa->sayfaId);
			$this->db->where("sayfalar.sayfaDurum",1);
			$this->db->order_by("sayfalar.sayfaSirasi","ASC");
			$this->db->where("sayfa_diller.dil",$this->dil);
			$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
			$altSayfalar = $this->db->get("sayfalar")->result();
			$sayfa->altSayfalar = $this->sonsuz_sayfa($altSayfalar);
		}

		return $sayfalar;
	}

	public function kelimeler($dil)
	{
		$this->db->select("anasayfa$dil as anasayfa,kurumsal$dil as kurumsal,urunler$dil as urunler,iletisim$dil as iletisim,hizli_baglantilar$dil as hizli_baglantilar,bloglar$dil as bloglar,devamini_oku$dil as devamini_oku,bize_ulasin$dil as bize_ulasin,etiketler$dil as etiketler,calisma_saatleri$dil as calisma_saatleri,hizmetler$dil as hizmetler,haberler$dil as haberler,tum_urunler$dil as tum_urunler,aciklama$dil as aciklama,mesaj_gonder$dil as mesaj_gonder,guvenlik_kodu$dil as guvenlik_kodu,mail$dil as mail,tel$dil as tel,konu$dil as konu,fiyat$dil as fiyat,markalar$dil as markalar,kategoriler$dil as kategoriler,baslik$dil as baslik,incele$dil as incele,son_eklenenler$dil as son_eklenenler,brosur$dil as brosur,bos_urun_mesaj$dil as bos_urun_mesaj,mesaj$dil as mesaj,ad$dil as ad");
		
		return $this->db->get("kelimeler")->row();
	}

}

?>