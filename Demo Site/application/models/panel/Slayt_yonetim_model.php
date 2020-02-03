<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class slayt_yonetim_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function slayt_listele($id=NULL)
	{
		if(isset($id)){
			$this->db->where('slaytId',$id);
			return $this->db->get("slaytlar")->row();
		}else{
			return $this->db->get("slaytlar")->result();
		}
	}


	public function slayt_ekle($slayt)
	{
		return $this->db->insert("slaytlar",$slayt);
	}

	public function slayt_duzenle($id,$slayt)
	{
		$this->db->where("slaytId",$id);
		return $this->db->update("slaytlar",$slayt);
	}

	public function slayt_sil($id)
	{
		$this->db->where("slaytId",$id);
		return $this->db->delete("slaytlar");
	}
}


 ?>