<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class hizmet_yonetim_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function hizmet_listele($id=Null)
	{
		if(isset($id)){
			$this->db->where('hizmetler.hizmetId',$id);
			$this->db->where("hizmet_diller.dil",0);
			$this->db->join("hizmet_diller","hizmet_diller.hizmetId = hizmetler.hizmetId");
			return $this->db->get("hizmetler")->row();
		}else{
			$this->db->where("hizmet_diller.dil",0);
			$this->db->join("hizmet_diller","hizmet_diller.hizmetId = hizmetler.hizmetId");
			return $this->db->get("hizmetler")->result();
		}
	}


	public function hizmet_ekle($hizmet,$hizmetDiller)
	{
		$this->db->trans_start(); 

		$this->db->insert("hizmetler",$hizmet);
		$hizmetId = $this->db->insert_id();
		$hizmetDiller["hizmetId"] = $hizmetId;

		$this->db->insert("hizmet_diller",$hizmetDiller);//İngilizce
		
		$hizmetDiller["hizmetBaslik"] = "";
		$hizmetDiller["hizmetIcerik"] = "";

		$hizmetDiller["dil"] = 1;//Türkçe
		$this->db->insert("hizmet_diller",$hizmetDiller);
		$hizmetDiller["dil"] = 2;//Almanca
		$this->db->insert("hizmet_diller",$hizmetDiller);

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

	public function hizmet_duzenle($id,$hizmet,$hizmetDiller)
	{
		$this->db->trans_start(); 
		$this->db->where("hizmetId",$id);
		$this->db->update("hizmetler",$hizmet);

		$this->db->where("hizmetId",$id);
		$this->db->where("dil",$hizmetDiller["dil"]);
		$this->db->update("hizmet_diller",$hizmetDiller);
		
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

	public function hizmet_sil($id)
	{
		$this->db->where("hizmetId",$id);
		return $this->db->delete("hizmetler");
	}

	public function hizmet_dil_listele($hizmetId,$dil)//Ajax post hizmet dil düzenle
	{
		$this->db->where("hizmetId",$hizmetId);
		$this->db->where("dil",$dil);
		return $this->db->get("hizmet_diller")->row();
	}
}


 ?>