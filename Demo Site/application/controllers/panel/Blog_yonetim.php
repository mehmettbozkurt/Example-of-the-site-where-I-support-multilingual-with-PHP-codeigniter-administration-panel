<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Blog_yonetim extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata("kullaniciBilgiler") == NULL)
		{
			$this->session->set_flashdata('mesaj',"Lütfen Giriş Yapınız!");
			redirect(base_url("panel"));
		}
		$this->load->model("panel/blog_yonetim_model","blog");

		if (!file_exists('public/admin/uploads/bloglar')) {
	    	mkdir('public/admin/uploads/bloglar', 0777, true);
		}
	}
		

	public function index()
	{
		@$data["bloglar"] = $this->blog->blog_listele();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/blog_yonetim/blog_listesi",$data);
		$this->load->view("panel/footer");
	}


	public function yeni_blog()
	{
		@$data["bloglar"]=$this->blog->blog_listele();

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/blog_yonetim/blog_ekle",$data);
		$this->load->view("panel/footer");

	}

	public function blog_ekle()
	{
		$blog = array('blogDurum' => 0 );

		//Blog gösterimi açık
		if($this->input->post("blogDurum",TRUE)!=NULL){
			$blog['blogDurum'] = 1; 
		}

		$blogDiller = array('blogBaslik' =>  $this->input->post("blogBaslik",TRUE),
				   			 'blogIcerik' =>  $this->input->post("blogIcerik",TRUE),
				   			 'blogSeo'	   =>  url_title($this->input->post("blogBaslik",TRUE)),
				   			 'dil' =>  $this->input->post("dil",TRUE));

            
        if($this->blog->blog_ekle($blog,$blogDiller)){
		
			$mesaj = array('icerik' => $blog["blogAdi"]." Eklendi.","tipi"=>"success" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url("panel/blog_yonetim"));

		}else{

			$mesaj = array('icerik' => "Blog Eklenemedi!","tipi"=>"danger" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url("panel/blog_yonetim"));
		}

	}

	public function blog_duzenle($id)
	{
		$data["blog"]=$this->blog->blog_listele($id);
		
		$dosya = 'public/admin/uploads/bloglar/'.$data["blog"]->blogId;

		if (!file_exists($dosya)) {
			mkdir($dosya, 0777, true);
			copy('public/index.php', $dosya.'/index.php');
		}

		$this->load->view("panel/header");
		$this->load->view("panel/sidebar");
		$this->load->view("panel/blog_yonetim/blog_duzenle",$data);
		$this->load->view("panel/footer");
	}

	public function blog_sil($id)
	{
		if($this->blog->blog_sil($id)){

			$mesaj = array('icerik' => "blog Silindi.","tipi"=>"success" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url()."panel/blog_yonetim");

		}else{

			$mesaj = array('icerik' => "Blog Silinemedi!","tipi"=>"danger" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url()."panel/blog_yonetim");

		}
	}

	public function blog_guncelle($id)
	{
		$blog = array('blogDurum' => 0,
  		   			  'blogResim' =>  $this->input->post("blogResim",TRUE),
		);

		//Blog gösterimi açık
		if($this->input->post("blogDurum",TRUE)!=NULL){
			$blog['blogDurum'] = 1; 
		}

		$blogDiller = array('blogBaslik' =>  $this->input->post("blogBaslik",TRUE),
				   			 'blogIcerik' =>  $this->input->post("blogIcerik",TRUE),
				   			 'blogSeo'	   =>  url_title($this->input->post("blogBaslik",TRUE)),
				   			 'dil' =>  $this->input->post("dil",TRUE));


        if($this->blog->blog_duzenle($id,$blog,$blogDiller)){
	
			$mesaj = array('icerik' => $blog["blogBaslik"]." Düzenlendi.","tipi"=>"success" );
			redirect(base_url("panel/blog_yonetim"));

		}else{
			
			$mesaj = array('icerik' => $blog["blogBaslik"]." Düzenlenemedi!","tipi"=>"danger" );
			$this->session->set_flashdata("mesaj",$mesaj);
			redirect(base_url("panel/blog_yonetim"));

		}
   }

   public function blog_dil_listele($blogId,$dil)//Ajax dil seçeneğine göre Blog düzünle
	{
		if($this->blog->blog_dil_listele($blogId,$dil)){
			echo json_encode($this->blog->blog_dil_listele($blogId,$dil),JSON_UNESCAPED_UNICODE);
		}
	}

}


 ?>