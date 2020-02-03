<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Blog_yonetim_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function blog_listele($id=Null)
	{
		if(isset($id)){
			$this->db->where('bloglar.blogId',$id);
			$this->db->where("blog_diller.dil",0);
			$this->db->join("blog_diller","blog_diller.blogId = bloglar.blogId");
			return $this->db->get("bloglar")->row();
		}else{
			$this->db->where("blog_diller.dil",0);
			$this->db->join("blog_diller","blog_diller.blogId = bloglar.blogId");
			return $this->db->get("bloglar")->result();
		}
	}


	public function blog_ekle($blog,$blogDiller)
	{
		$this->db->trans_start(); 

		$this->db->insert("bloglar",$blog);
		$blogId = $this->db->insert_id();
		$blogDiller["blogId"] = $blogId;

		$this->db->insert("blog_diller",$blogDiller);//İngilizce
		
		$blogDiller["blogBaslik"] = "";
		$blogDiller["blogIcerik"] = "";

		$blogDiller["dil"] = 1;//Türkçe
		$this->db->insert("blog_diller",$blogDiller);
		$blogDiller["dil"] = 2;//Almanca
		$this->db->insert("blog_diller",$blogDiller);

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

	public function blog_duzenle($id,$blog,$blogDiller)
	{
		$this->db->trans_start(); 
		$this->db->where("blogId",$id);
		$this->db->update("bloglar",$blog);

		$this->db->where("blogId",$id);
		$this->db->where("dil",$blogDiller["dil"]);
		$this->db->update("blog_diller",$blogDiller);
		
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

	public function blog_sil($id)
	{
		$this->db->where("blogId",$id);
		return $this->db->delete("bloglar");
	}

	public function blog_dil_listele($blogId,$dil)//Ajax post blog dil düzenle
	{
		$this->db->where("blogId",$blogId);
		$this->db->where("dil",$dil);
		return $this->db->get("blog_diller")->row();
	}
}


 ?>