<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urun_yonetim_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function urun_listele($id=Null)

	{
		$this->db->join("kategoriler","kategoriler.kategoriId = urunler.kategoriId");
		$this->db->join("urun_diller","urun_diller.urunId = urunler.urunId");
		$this->db->where('urun_diller.dil',0);

		if(isset($id)){

			$this->db->where('urunler.urunId',$id);
			return $this->db->get("urunler")->row();

		}else{

			return $this->db->get("urunler")->result();

		}

	}
	public function kategoriler()
	{
		$this->db->where("ustKategoriId!=",0);
		return $this->db->get("kategoriler")->result();
	}


	public function urun_ekle($urun,$urunDiller)
	{
		$this->db->trans_start(); 

		$this->db->insert("urunler",$urun);
		$urunId = $this->db->insert_id();
		$urunDiller["urunId"] = $urunId;

		$this->db->insert("urun_diller",$urunDiller);//Türkçe
		
		$urunDiller["urunAdi"] = "";
		$urunDiller["urunIcerik"] = "";
		$urunDiller["urunKisaIcerik"] = "";
		$urunDiller["urunAciklama"] = "";

		$urunDiller["dil"] = 1;//İngilizce
		$this->db->insert("urun_diller",$urunDiller);
		$urunDiller["dil"] = 2;//Almanca
		$this->db->insert("urun_diller",$urunDiller);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
		    $this->db->trans_rollback();
		    return  0;
		} 
		else {
			$this->db->trans_commit();
		    
		    return $urunId;
		}
	}



	public function urun_duzenle($id,$urun,$urun_sorular,$urunDiller)
	{

		$this->db->trans_start(); 
		
		if(!empty($urun_sorular)){
		
			$this->db->where("urunId",$id);
			$this->db->delete("urun_sorular");
			$this->db->insert_batch("urun_sorular",$urun_sorular);
		}

		$this->db->where("urunId",$id);
		$this->db->update("urunler",$urun);

		$this->db->where("urunId",$id);
		$this->db->where("dil",$urunDiller["dil"]);
		$this->db->update("urun_diller",$urunDiller);
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE) {
		    $this->db->trans_rollback();
		    return FALSE;
		} 
		else {
			$this->db->trans_commit();
		    
		    return TRUE;
		}

	}



	public function urun_sil($id)

	{

		$this->db->where("urunId",$id);

		return $this->db->delete("urunler");

	}

	public function urun_sorular($id)
	{
		$this->db->where("urunId",$id);
		return $this->db->get("urun_sorular")->result();
	}

	public function urun_dil_listele($urunId,$dil)//Ajax post ürün dil düzenle
	{
		$this->db->where("urunId",$urunId);
		$this->db->where("dil",$dil);
		return $this->db->get("urun_diller")->row();
	}

}





 ?>
