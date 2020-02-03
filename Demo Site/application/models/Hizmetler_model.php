<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Hizmetler_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function hizmetler($limit=NULL)
	{
		$this->db->order_by("hizmetler.hizmetId","DESC");
		$this->db->where("hizmetler.hizmetDurum",1);
		$this->db->where("hizmet_diller.dil",$this->dil);
		$this->db->join("hizmet_diller","hizmet_diller.hizmetId = hizmetler.hizmetId");
		if(isset($limit)){
			return $this->db->get("hizmetler",6,$limit)->result();
		}else{
			return $this->db->get("hizmetler")->result();
		}
	}

	public function hizmet($seo)
	{
		$this->db->where("hizmetler.hizmetDurum",1);
		$this->db->like("hizmet_diller.hizmetSeo",$seo);
		$this->db->where("hizmet_diller.dil",$this->dil);
		$this->db->join("hizmet_diller","hizmet_diller.hizmetId = hizmetler.hizmetId");
		return $this->db->get("hizmetler")->row();
	}


}


 ?>