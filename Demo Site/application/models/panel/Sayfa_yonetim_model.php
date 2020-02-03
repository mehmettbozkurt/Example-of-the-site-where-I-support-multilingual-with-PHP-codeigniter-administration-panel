<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
* 
*/
class Sayfa_yonetim_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function sayfa_listele($id=NULL)
	{
		if(isset($id)){
			$this->db->where('sayfalar.sayfaId',$id);
			$this->db->where("sayfa_diller.dil",0);
			$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
			return $this->db->get("sayfalar")->row();
		}else{
			$this->db->order_by("sayfalar.sayfaSirasi","ASC");
			$this->db->where("sayfa_diller.dil",0);
			$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
			return $this->db->get("sayfalar")->result();
		}
	}

	public function sayfa_siralama($data)
	{
		$this->db->where("sayfalar.sayfaId",$data["sayfaId"]);
		$this->db->where("sayfa_diller.dil",0);
		$this->db->join("sayfa_diller","sayfa_diller.sayfaId = sayfalar.sayfaId");
		return $this->db->update("sayfalar",$data);
	}


	public function sayfa_ekle($sayfa,$sayfaDiller)
	{
		$this->db->trans_start(); 

		$this->db->insert("sayfalar",$sayfa);
		$sayfaId = $this->db->insert_id();
		$sayfaDiller["sayfaId"] = $sayfaId;

		$this->db->insert("sayfa_diller",$sayfaDiller);//İngilizce
		
		$sayfaDiller["sayfaBaslik"] = "";
		$sayfaDiller["sayfaIcerik"] = "";

		$sayfaDiller["dil"] = 1;//Türkçe
		$this->db->insert("sayfa_diller",$sayfaDiller);
		$sayfaDiller["dil"] = 2;//Almanca
		$this->db->insert("sayfa_diller",$sayfaDiller);

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

	public function sayfa_duzenle($id,$sayfa,$sayfaDiller)
	{
		$this->db->trans_start(); 
		$this->db->where("sayfaId",$id);
		$this->db->update("sayfalar",$sayfa);

		$this->db->where("sayfaId",$id);
		$this->db->where("dil",$sayfaDiller["dil"]);
		$this->db->update("sayfa_diller",$sayfaDiller);
		
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

	public function sayfa_sil($id)
	{
		$this->db->where("sayfaId",$id);
		return $this->db->delete("sayfalar");
	}

	public function sayfa_dil_listele($sayfaId,$dil)//Ajax post sayfa dil düzenle
	{
		$this->db->where("sayfaId",$sayfaId);
		$this->db->where("dil",$dil);
		return $this->db->get("sayfa_diller")->row();
	}
}


 ?>