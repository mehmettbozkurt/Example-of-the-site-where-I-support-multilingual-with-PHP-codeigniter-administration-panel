<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marka_yonetim_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}

	public function marka_listele($id=NULL)
	{
		if(isset($id)){
			$this->db->where('markaId',$id);
			return $this->db->get("markalar")->row();
		}else{
			$this->db->order_by("markaSira","ASC");
			return $this->db->get("markalar")->result();
		}
	}

	public function marka_ekle($marka)
	{
		return $this->db->insert("markalar",$marka);
	}

	public function marka_duzenle($id,$marka)
	{
		$this->db->where("markaId",$id);
		return $this->db->update("markalar",$marka);
	}

	public function marka_sil($id)
	{
		$this->db->where("markaId",$id);
		return $this->db->delete("markalar");
	}
}


 ?>