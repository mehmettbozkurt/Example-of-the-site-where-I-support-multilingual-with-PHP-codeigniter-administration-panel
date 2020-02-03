<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Bloglar_model extends CI_Model
{
	public $dil = 0;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('destek_helper');
		$this->dil = dil();
	}

	public function bloglar($limit=NULL)
	{
		$this->db->order_by("bloglar.blogId","DESC");
		$this->db->where("bloglar.blogDurum",1);
		$this->db->where("blog_diller.dil",$this->dil);
		$this->db->join("blog_diller","blog_diller.blogId = bloglar.blogId");
		if(isset($limit)){
			return $this->db->get("bloglar",6,$limit)->result();
		}else{
			return $this->db->get("bloglar")->result();
		}
	}

	public function blog($seo)
	{
		$this->db->where("bloglar.blogDurum",1);
		$this->db->like("blog_diller.blogSeo",$seo);
		$this->db->where("blog_diller.dil",$this->dil);
		$this->db->join("blog_diller","blog_diller.blogId = bloglar.blogId");
		return $this->db->get("bloglar")->row();
	}

	public function blog_sayisi()
	{
		$this->db->where("bloglar.blogDurum",1);
		$this->db->where("blog_diller.dil",$this->dil);
		$this->db->join("blog_diller","blog_diller.blogId = bloglar.blogId");
		return $this->db->select('*')->from('bloglar')->count_all_results();
		
	}
	public function blog_getir($per,$segment)
	{
		$this->db->where("bloglar.blogDurum",1);
		$this->db->where("blog_diller.dil",$this->dil);
		$this->db->join("blog_diller","blog_diller.blogId = bloglar.blogId");
		return $this->db->order_by('bloglar.blogId','DESC')->limit($per,$segment)->get("bloglar")->result();
		
	}

}


 ?>