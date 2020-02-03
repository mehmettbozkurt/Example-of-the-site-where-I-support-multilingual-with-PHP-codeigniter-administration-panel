<?php


function menuler($elements,$parent_id=0)

{

	$branch = array();

	foreach ($elements as $element) {

		if ($element->ustSayfaId == $parent_id) {

			$children = menuler($elements,$element->sayfaId);

			if ($children) {

				$element->children = $children;

			}

			else

			{

				$element->children = array();

			}

			$branch[] = $element;

		}

	}

	return $branch;

}

function menuListele($items)
{

	foreach ($items as $item) {

		if ($item->sayfaURL != null) {
			if ($item->sayfaURL=="#") {
				$link = '<a  href="javacript:void" >';
			}else{
			    $link = '<a  href="'.$item->sayfaURL.'" >';
			}
		}
		else
		{
			$CI = &get_instance();
			if($CI->session->userdata("dil") == 0){				
				$link = '<a class="dropdown-toggle"  href="'.base_url("kurumsal/").$item->sayfaSeo.'" >';
			}else{
				$link = '<a class="dropdown-toggle"  href="'.base_url("corporate/").$item->sayfaSeo.'" >';
			}
		}

		if (sizeof($item->children) > 0) { $cls = "dropdown"; } else { $cls = ""; }
		echo '<li class="'.$cls.'">'.$link.$item->sayfaBaslik.'</a>';

		if (sizeof($item->children) > 0) {

			echo "<ul class='sub-menu'>";

			menuListele($item->children);

			echo "</ul>";

		}

		echo "</li>";

	}
}

function sayfaListele($items)

{

	foreach ($items as $item) {

		echo '<li class="dd-item " data-id="'.$item->sayfaId.'">

		<div class="dd-handle">'.$item->sayfaBaslik.'</div>';

		if (sizeof($item->children) > 0) {

			echo '<ol class="dd-list ">';

			sayfaListele($item->children);

			echo "</ol>";

		}

		echo "</li>";

	}

}

function kategoriler($elements,$parent_id=0)

{

	$branch = array();

	foreach ($elements as $element) {

		if ($element->ustKategoriId == $parent_id) {

			$children = kategoriler($elements,$element->kategoriId);

			if ($children) {

				$element->children = $children;

			}

			else

			{

				$element->children = array();

			}

			$branch[] = $element;

		}

	}

	return $branch;

}

function kategoriListele($items)
{

	foreach ($items as $item) {


		if (sizeof($item->children) > 0) 
		{ 
			$cls = "dropdown";
			$link = "javacript:"; 
		}else { 
			$cls = "";
			$CI = &get_instance();
			if($CI->session->userdata("dil") == 0){
			$link = base_url("urunler/$item->kategoriSeo");
			}else{
			$link = base_url("products/$item->kategoriSeo");
			} 
		}

		echo '<li class="'.$cls.'"><a href="'.$link.'">'.$item->kategoriAdi.'</a>';

		if (sizeof($item->children) > 0) {

			echo "<ul class='sub-menu'>";

			kategoriListele($item->children);

			echo "</ul>";

		}

		echo "</li>";

	}

}

function dil()
{
	$CI = & get_instance();
	$CI->load->library('session');
	
	if($CI->session->userdata("dil") == NULL){
		$CI->session->set_userdata("dil",0);
	}
	return $CI->session->userdata("dil");
}

?>