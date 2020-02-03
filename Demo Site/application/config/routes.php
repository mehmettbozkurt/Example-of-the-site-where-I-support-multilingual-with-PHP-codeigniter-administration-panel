<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Anasayfa';
$route['panel'] = 'panel/Giris_yonetim';

$route['kurumsal/(:any)'] = "kurumsal/index/$1";
$route['corporate/(:any)'] = "kurumsal/index/$1";
$route['arama/(:any)'] = "anasayfa/arama/$1";
$route['contact'] = "iletisim/index";
$route['marks'] = "markalar/index";

$route['urunler/(:any)/(:num)'] = "urunler/index/$1";
$route['urun/(:any)'] = "urunler/urun_icerik/$1";

$route['products/(:any)/(:num)'] = "urunler/index/$1";
$route['product/(:any)'] = "urunler/urun_icerik/$1";

$route['urunler/(:num)'] = "urunler/index/$1";
$route['urunler/(:any)'] = 'urunler/kategori_urunler/$1';
$route['urunler/(:any)/(:num)'] = 'urunler/kategori_urunler/$1';

$route['products'] = "urunler/index/";
$route['products/(:num)'] = "urunler/index/$1";
$route['products/(:any)'] = 'urunler/kategori_urunler/$1';
$route['products/(:any)/(:num)'] = 'urunler/kategori_urunler/$1';

$route['blog/(:any)'] = "bloglar/blog_icerik/$1";
$route['bloglar/(:any)'] = 'bloglar/index/$1';
$route['bloglar/(:any)/(:num)'] = 'bloglar/index/$1';

$route['hizmet/(:any)'] = "hizmetler/hizmet_icerik/$1";
$route['hizmetler/(:any)'] = 'hizmetler/index/$1';
$route['hizmetler/(:any)/(:num)'] = 'hizmetler/index/$1';

$route['services'] = 'hizmetler/index/';
$route['service/(:any)'] = "hizmetler/hizmet_icerik/$1";
$route['services/(:any)'] = 'hizmetler/index/$1';
$route['services/(:any)/(:num)'] = 'hizmetler/index/$1';

$route['404_override'] = 'Anasayfa/error';

$route['sayfa-bulunamadi'] = 'Anasayfa/error';
$route['translate_uri_dashes'] = FALSE;
