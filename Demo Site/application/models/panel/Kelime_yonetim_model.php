<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
* 
*/
class Kelime_yonetim_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function kelime_listele()
	{
		return $this->db->get("kelimeler")->result();
	}

	public function kelime_ekle()
	{
		$kelime = array('kelime' => '','kelime_en' => '','kelime_deu' =>''  );
		return $this->db->insert("kelimeler",$kelime);
	}

	public function kelime_duzenle($sutunAdi,$sutundegeri)
	{
		$kelime = array( $sutunAdi=>$sutundegeri);
		return $this->db->update("kelimeler",$kelime);
	}

	public function kelime_sil($id)
	{
		$this->db->where("kelimeId",$id);
		return $this->db->delete("kelimeler");
	}
}


 ?>