<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Referans_yonetim_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function referans_listele($id=NULL)
	{
		if(isset($id)){
			$this->db->where('referansId',$id);
			return $this->db->get("referanslar")->row();
		}else{
			return $this->db->get("referanslar")->result();
		}
	}


	public function referans_ekle($referans)
	{
		return $this->db->insert("referanslar",$referans);
	}

	public function referans_duzenle($id,$referans)
	{
		$this->db->where("referansId",$id);
		return $this->db->update("referanslar",$referans);
	}

	public function referans_sil($id)
	{
		$this->db->where("referansId",$id);
		return $this->db->delete("referanslar");
	}
}


 ?>