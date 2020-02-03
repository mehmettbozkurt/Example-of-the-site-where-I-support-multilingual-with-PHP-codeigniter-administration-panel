<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Urunler_model extends CI_Model
{
	public $dil = 0;

	function __construct()
	{
		parent::__construct();
		$this->load->helper('destek_helper');
		$this->dil = dil();

	}

	public function urunler()
	{
		$this->db->where("urunler.urunDurum",1);
		$this->db->order_by("urunler.urunId","DESC");
		$this->db->join("kategoriler","kategoriler.kategoriId = urunler.kategoriId");
		$this->db->where("urun_diller.dil",$this->dil);
		$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");

		return $this->db->get("urunler")->result();
	}

	public function kategori_urun_sayisi($kategoriSeo)
	{
		$dil = $this->data["dil"];

		$this->db->where("urun_diller.dil",$this->dil);
		$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");
		$this->db->join("kategoriler","urunler.kategoriId = kategoriler.kategoriId");
		$this->db->like("kategoriler.kategoriSeo$dil",$kategoriSeo);
		$this->db->order_by("urunler.urunId");
		return $this->db->get("urunler")->result();
	}

	public function urunler_ayrinti($seo)
	{
		$this->db->where("urunler.urunDurum",1);
		$this->db->like("urun_diller.urunSeo",$seo);
		$this->db->where("urun_diller.dil",$this->dil);
		$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");
		return $this->db->get("urunler")->result();
	}

	public function kategoriler()
	{
		$dil = $this->data["dil"];

		$this->db->select("kategoriId,kategoriResim,kategoriSira,kategoriDurum,ustKategoriId,kategoriTarih,kategoriAdi$dil as kategoriAdi,kategoriSeo$dil as kategoriSeo");
		$this->db->where("kategoriDurum !=",0);
		return $this->db->get("kategoriler")->result();
	}

	public function urun_kategoriler()
	{
		$dil = $this->data["dil"];

		$this->db->select("kategoriId,kategoriResim,kategoriSira,kategoriDurum,ustKategoriId,kategoriTarih,kategoriAdi$dil as kategoriAdi,kategoriSeo$dil as kategoriSeo");
		$this->db->where("kategoriDurum !=",0);
		$this->db->where("ustKategoriId !=",0);
		$kategoriler  = $this->db->get("kategoriler")->result();
		
		foreach ($kategoriler as $index => $kategori) {
			$this->db->where("ustKategoriId",$kategori->kategoriId);
			
			if($this->db->get("kategoriler")->row() != NULL) {
				unset($kategoriler[$index]);
			}
		}

		return $kategoriler;
	}
	public function kategoriler_urun_ici()
	{
		$dil = $this->data["dil"];

		$this->db->select("kategoriId,kategoriResim,kategoriSira,kategoriDurum,ustKategoriId,kategoriTarih,kategoriAdi$dil as kategoriAdi,kategoriSeo$dil as kategoriSeo");
		$this->db->limit(4);
		$kategoriler  = $this->db->get("kategoriler")->result();

		foreach ($kategoriler as $kategori) {

			$this->db->select("COUNT(urunler.urunId) as urunSayisi");
			$this->db->where("urunler.kategoriId",$kategori->kategoriId);
			$this->db->where("urun_diller.dil",$this->dil);
			$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");
			$kategori->urunSayisi = $this->db->get("urunler")->row()->urunSayisi;
		}

		return $kategoriler;
	}

	public function kategori_urunler($kategoriSeo,$per=NULL,$segment=NULL)
	{
		$dil = $this->data["dil"];
		
		$this->db->like("kategoriler.kategoriSeo$dil",$kategoriSeo);
		$this->db->where("urunler.urunDurum",1);
		$this->db->join("kategoriler","kategoriler.kategoriId = urunler.kategoriId");
		$this->db->where("urun_diller.dil",$this->dil);
		$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");
		$this->db->order_by("urunler.urunId","DESC");

		if(isset($per)){
		 	 $this->db->limit($per,$segment);
		}
		return $this->db->get("urunler")->result();

	}


	public function urun($seo)
	{
		$this->db->like("urun_diller.urunSeo",$seo);
		$this->db->join("kategoriler","kategoriler.kategoriId = urunler.kategoriId");
		$this->db->where("urun_diller.dil",$this->dil);
		$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");
		$this->db->where("urunler.urunDurum",1);
		return $this->db->get("urunler")->row();
	}
	public function urun_sayisi()
	{
		$this->db->where("urun_diller.dil",$this->dil);
		$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");
		$this->db->where("urunler.urunDurum",1);
		return $this->get('urunler')->result();
	}
	public function urun_getir($per,$segment)
	{
		$this->db->where("urun_diller.dil",$this->dil);
		$this->db->where("urunler.urunDurum",1);
		$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");
		$this->db->join("kategoriler","kategoriler.kategoriId = urunler.kategoriId");
		return $this->db->order_by('urunId','ASC')->limit($per,$segment)->get()->result();
	}

	public function urun_sorular($urunSeo)
	{
		$dil = $this->data["dil"];

		$this->db->where("urun_diller.urunSeo",$urunSeo);
		$this->db->where("urun_diller.dil",$this->dil);
		$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");
		$urun = $this->db->get("urunler")->row();
		
		$this->db->select("soru$dil as soru,cevap$dil as cevap,urunId");
		$this->db->where("urunId",$urun->urunId);
		return $this->db->get("urun_sorular")->result();
	}

}


?>