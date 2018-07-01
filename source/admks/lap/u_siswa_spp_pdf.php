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


//fungsi - fungsi
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/class/lap_u_siswa_spp.php");

nocache;


//start class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->SetTitle($judul);
$pdf->SetAuthor($author);
$pdf->SetSubject($description);
$pdf->SetKeywords($keywords);


//nilai
$tapelkd = nosql($_REQUEST['tapelkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$s = nosql($_REQUEST['s']);
$judul = "LAPORAN KEUANGAN SISWA : Uang SPP";
$judulz = $judul;
$batas = 28; //jumlah data per halaman



//isi *START
ob_start();

$pdf->SetFont('Times','',10);

//query
$q = mysql_query("SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_kelas.* ".
					"FROM m_siswa, siswa_kelas ".
					"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
					"AND siswa_kelas.kd_tapel = '$tapelkd' ".
					"AND siswa_kelas.kd_kelas = '$kelkd' ".
					"AND siswa_kelas.kd_program = '$progkd' ".
					"AND siswa_kelas.kd_ruang = '$rukd' ".
					"ORDER BY round(siswa_kelas.no_absen) ASC");
$r = mysql_fetch_assoc($q);
$total = mysql_num_rows($q);
$npage = ($total/$batas);

//cacah tapel
$qtpel = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rtpel = mysql_fetch_assoc($qtpel);
$tpel_thn1 = nosql($rtpel['tahun1']);
$tpel_thn2 = nosql($rtpel['tahun2']);		




//query	
for ($we=0;$we<=($npage);$we++)
	{
	//tambah halaman
	$pdf->AddPage();
	
	//nilai
	$page = $we + 1;
	
	//nek null
	if (empty($we))
		{
		$ken = $we;
		}
	else if ($we == 1)
		{
		$ken = $batas;
		}
	else
		{
		$ken = $batas * $we;
		}

	//judul
	//nek halaman satu, $we=0
	if ($we == 0)
		{
		$pdf->SetY(50);
		}	
	else
		{
		//kolom header 
		$pdf->SetY(40);
		}
	
	//kolom header 
	$pdf->SetFont('Times','',10);
	$pdf->RotatedText(12,10,'No.',0);
	$pdf->RotatedText(20,10,'NIS',0);
	$pdf->RotatedText(50,10,'Nama Siswa',0);


	for ($w=1;$w<=12;$w++)
		{
		//nilainya
		if ($w<=6) //bulan juli sampai desember
			{
			$ibln = $arrbln2[$w + 6];
			$ithn = $tpel_thn1;
			$i_btx = "$ibln $ithn";
			}
		
		if ($w>6) //bulan januari sampai juni
			{
			$ibln = $arrbln2[$w - 6];
			$ithn = $tpel_thn2;
			$i_btx = "$ibln $ithn";
			}


		$pdf->RotatedText(9,10,$ibln,0);
		}
		
		
		
//	$pdf->SetY(47);



	//kolom data 
	//nek halaman satu, $we=0
	if ($we == 0)
		{
		$pdf->SetY(60);
		}
	else
		{
		$pdf->SetY(50);
		}	
	
	$qx = "SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_kelas.* ".
					"FROM m_siswa, siswa_kelas ".
					"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
					"AND siswa_kelas.kd_tapel = '$tapelkd' ".
					"AND siswa_kelas.kd_kelas = '$kelkd' ".
					"AND siswa_kelas.kd_program = '$progkd' ".
					"AND siswa_kelas.kd_ruang = '$rukd' ".
					"ORDER BY round(siswa_kelas.no_absen) ASC";
	$qr = $qx;
			
	$count = mysql_num_rows(mysql_query($qx));
	$result = mysql_query("$qr LIMIT ".$ken.", ".$batas);
	$data = mysql_fetch_array($result);

	do
		{
		if ($warna_set ==0)
			{
			$warna = $warna01;
			$warna_set = 1;
			}
		else
			{
			$warna = $warna02;
			$warna_set = 0;
			}
	
		$nomer = $nomer + 1;
		$kd = nosql($data['mskd']);
		$no_absen = nosql($data['no_absen']);
		$nis = nosql($data['nis']);
		$nama = balikin($data['nama']);
		$tgl = nosql($data['tgl']);
		$bln = $arrbln1[nosql($data['bln'])];
		$thn = nosql($data['thn']);
		$tgl_bayar = "$tgl $bln $thn";
		$ket = balikin($data['ket']);
		
	
		$pdf->Cell(12,5,$no_absen,1,0,'C');
		$pdf->Cell(20,5,$nis,1,0,'C');
		$pdf->Cell(50,5,$nama,1,0,'L');

		for ($w=1;$w<=12;$w++)
			{
			//nilainya
			if ($w<=6) //bulan juli sampai desember
				{
				$ibln = $w + 6;
				$ithn = $tpel_thn1;
				$i_btx = "$ibln $ithn";
				}
			
			if ($w>6) //bulan januari sampai juni
				{
				$ibln = $w - 6;
				$ithn = $tpel_thn2;
				$i_btx = "$ibln $ithn";
				}


			//nilainya
			$qpinu = mysql_query("SELECT m_uang_spp.*, siswa_kelas.*, siswa_uang_spp.* ".
									"FROM m_uang_spp, siswa_kelas, siswa_uang_spp ".
									"WHERE siswa_uang_spp.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_uang_spp.kd_uang_spp = m_uang_spp.kd ".
									"AND siswa_kelas.kd_tapel = '$tapelkd' ".
									"AND siswa_kelas.kd_kelas = '$kelkd' ".
									"AND siswa_kelas.kd_program = '$progkd' ".
									"AND siswa_kelas.kd_ruang = '$rukd' ".
									"AND siswa_kelas.kd_siswa = '$kd' ".
									"AND round(siswa_uang_spp.bln) = '$ibln' ".
									"AND round(siswa_uang_spp.thn) = '$ithn'");
			$rpinu = mysql_fetch_assoc($qpinu);
			$tpinu = mysql_num_rows($qpinu);
			$pinu_tgl = $rpinu['tgl_bayar'];			
			
			//nek ada
			if ($pinu_tgl != "0000-00-00")
				{
				$pinu_x = "x";
				}
			else
				{
				$pinu_x = "-";
				}
				
				
			$pdf->Cell(9,5,$pinu_x,1,0,'C');
			}
	
		$pdf->Ln();
		}
	while ($data = mysql_fetch_assoc($result));
	}


//isi
$isi = ob_get_contents();
ob_end_clean();


$pdf->WriteHTML($isi);
$pdf->Output("Keuangan_Siswa_Uang_SPP.pdf",I);
?>