<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Giris_yonetim_model extends CI_Model{
	
	public function __construct()
	{
        parent::__construct();
	}

	public function giris($kullaniciAdi,$sifre)
	{
		$where =  array('kullaniciAdi' => $kullaniciAdi, 'kullaniciSifre' => $sifre);
		$this->db->where($where);
		return $this->db->get("kullanicilar")->row();
	}


	public function sayfaSayisi()
	{
		return $this->db->query("SELECT(  
					      SELECT COUNT(*)  
					      FROM   kullanicilar  
					      ) AS kullaniciSayisi,  
					      (SELECT COUNT(*)  
					      FROM   sayfalar  
					      ) AS sayfaSayisi,
					      (SELECT COUNT(*)  
					      FROM   bloglar  
					      ) AS blogSayisi,
					      (SELECT COUNT(*)  
					      FROM   slaytlar  
					      ) AS slaytSayisi,
					      (SELECT COUNT(*)  
					      FROM   urunler  
					      ) AS urunSayisi,
					      (SELECT COUNT(*)  
					      FROM   kategoriler  
					      ) AS kategoriSayisi,
					       (SELECT COUNT(*)  
					      FROM   mesajlar  
					      ) AS mesajSayisi,
					      (SELECT COUNT(*)  
					      FROM   markalar  
					      ) AS markaSayisi
					      
					   

					FROM DUAL")->row();
		
	}



}

 ?>