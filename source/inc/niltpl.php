<?php
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
/////// SISFOKOL SLTA v2.0 							///////
/////// (Sistem Informasi Sekolah untuk SLTA v2.0) 	///////
///////////////////////////////////////////////////////////
/////// Dibuat oleh : 								///////
/////// Agus Muhajir, S.Kom 						///////
/////// URL 	: http://sisfokol.wordpress.com 	///////
/////// E-Mail	: hajirodeon@yahoo.com 				///////
/////// HP/SMS	: 081-829-88-54 					///////
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////


//nilai
$konten = ParseVal($tpl, array ("judul" => $judul, 
								"judulku" => $judulku, 
								"sumber" => $sumber, 
								"isi" => $isi, 
								"diload" => $diload, 
								"versi" => $versi, 
								"author" => $author, 
								"keywords" => $keywords, 
								"url" => $url, 
								"sek_nama" => $sek_nama, 
								"sek_alamat" => $sek_alamat, 
								"sek_kontak" => $sek_kontak, 
								"description" => $description)); 

//tampilkan
echo $konten;
?>