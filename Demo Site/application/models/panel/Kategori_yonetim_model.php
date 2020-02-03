<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori_yonetim_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}

	public function kategori_listele($id=NULL)
	{
		if(isset($id)){
			$this->db->where('kategoriId',$id);
			return $this->db->get("kategoriler")->row();
		}else{
			$this->db->order_by("kategoriSira","ASC");
			$kategoriler = $this->db->get("kategoriler")->result();

			foreach ($kategoriler as $kategori) {
				
				if($kategori->ustKategoriId != 0){
					$this->db->where("kategoriId",$kategori->ustKategoriId);
					$kategori->ustKategoriAdi = $this->db->get("kategoriler")->row()->kategoriAdi;
				}else{
					$kategori->ustKategoriAdi = "Ana Kategori";
				}
			}

			return $kategoriler;
		}
	}


	public function kategori_ekle($kategori)
	{
		return $this->db->insert("kategoriler",$kategori);
	}

	public function kategori_duzenle($id,$kategori)
	{
		$this->db->where("kategoriId",$id);
		return $this->db->update("kategoriler",$kategori);
	}

	public function kategori_sil($id)
	{
		$this->db->where("kategoriId",$id);
		$this->db->delete("galeri");
		$this->db->where("kategoriId",$id);
		return $this->db->delete("kategoriler");
	}
}


 ?>