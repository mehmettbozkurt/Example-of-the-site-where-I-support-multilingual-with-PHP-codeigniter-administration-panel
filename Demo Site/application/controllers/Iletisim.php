	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Iletisim extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model("Anasayfa_model","anasayfa");
			$this->load->helper('captcha');

			$dosya = "./public/admin/uploads/captcha/";

			if (!file_exists($dosya)) {
				mkdir($dosya,0777,TRUE);
			}
			if($this->session->userdata("cap")!=NULL){
				if (file_exists($dosya.$this->session->userdata('cap')["filename"])) {
					unlink($dosya.$this->session->userdata('cap')["filename"]);
				}
			}


		}
		public function index()
		{
			$captcha = array(
				'word'          => '',
				'img_path'      => './public/admin/uploads/captcha/',
				'img_url'       => base_url()."/public/admin/uploads/captcha/",
				'font_path'     => base_url().'/public/fonts/Roboto-Regular.ttf',
				'img_width'     => '250',
				'img_height'    => 50,
				'expiration'    => 7200,
				'word_length'   => 6,
				'font_size'     => 30,
				'img_id'        => 'captcha',
				'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		        // White background and border, black text and red grid
				'colors'        => array(
					 'background' => array(255, 255, 255),
		                'border' => array(255, 255, 255),
		                'text' => array(10, 20, 10),
		                'grid' => array(199,166,110)
				)
			);

			$cap = create_captcha($captcha);


			$this->session->set_userdata('cap',$cap);

			$this->data["cap"] = $cap;

			$this->data["ayarlar"]->siteBaslik   = "İLETİŞİM | ".$this->data["ayarlar"]->siteBaslik;
			$this->data["ayarlar"]->siteAciklama = "İLETİŞİM | ".$this->data["ayarlar"]->siteAciklama;

			$this->load->view('header',$this->data);
			$this->load->view('iletisim',$this->data);
			$this->load->view('footer',$this->data);
		}

		public function mesaj_gonder()
		{

			$captcha = $this->session->userdata('cap');
			if(strcmp($captcha["word"],$this->input->post("captcha")) == 0){

				$mesaj = array('ad'    => $this->input->post("ad",TRUE),
					'mail'  => $this->input->post("mail",TRUE) ,
					'konu'  => $this->input->post("konu",TRUE),
					'mesaj' => $this->input->post("mesaj",TRUE),
					'telNo' => $this->input->post("telNo",TRUE),	
					'durum' => 0,
					'ipAdres' => $_SERVER['REMOTE_ADDR'] );

				$config = Array( 
					'protocol'   => 'smtp',
					'smtp_host'  => 'mail.sivassoft.com.tr',
					'smtp_port'  => 587,
					'smtp_user'  => 'destek@sivassoft.com.tr', 
					'smtp_pass'  => 'Destek102030+',
					'mailtype'   => 'html',
					'wordwrap' 	 => TRUE,
					'charset'    => 'utf-8'
				);


				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				$this->email->from($this->input->post("mail",TRUE),$this->input->post("ad",TRUE) );
				$this->email->to($this->input->post("firmaMail",TRUE));
				$this->email->subject($this->input->post("konu",TRUE));
				$this->email->message($this->input->post("mesaj",TRUE)."Konu: ".$this->input->post("konu",TRUE)." Telefon No: ".$this->input->post("telNo",TRUE));


				if($this->email->send()){

					if($this->anasayfa->mesaj_gonder($mesaj)){
						$this->session->set_flashdata('basarili', "Mesajınız gönderilmiştir.En kısa zaman dönüş yapılacaktır.");
						redirect($_SERVER["HTTP_REFERER"]);
					}

				}else{

					$this->session->set_flashdata('basarisiz', "Mesajınız gönderilememiştir.Lütfen daha sonra tekrar deneyiniz.");
					redirect($_SERVER["HTTP_REFERER"]);

				}
			}

			else{

				$this->session->set_flashdata('mesaj', "Güvenlik Kodu Hatalı..");
				redirect($_SERVER["HTTP_REFERER"]);
			}


		}

		public function error()
		{

			$this->load->view("header",$this->data);
			$this->load->view("404",$this->data);
			$this->load->view("footer",$this->data);
		}



	}