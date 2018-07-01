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
require("../../inc/class/lap_u_siswa_gedung.php");

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
$judul = "LAPORAN KEUANGAN SISWA : Uang Gedung";
$judulz = $judul;
$batas = 28; //jumlah data per halaman



//isi *START
ob_start();

$pdf->SetFont('Times','',10);

//query
$q = mysql_query("SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_uang_gedung.*, ".
					"DATE_FORMAT(siswa_uang_gedung.tgl_bayar, '%d') AS tgl, ".
					"DATE_FORMAT(siswa_uang_gedung.tgl_bayar, '%m') AS bln, ".
					"DATE_FORMAT(siswa_uang_gedung.tgl_bayar, '%Y') AS thn, ".
					"siswa_kelas.* ".
					"FROM m_siswa, siswa_uang_gedung, siswa_kelas ".
					"WHERE siswa_uang_gedung.kd_siswa_kelas = siswa_kelas.kd ".
					"AND siswa_kelas.kd_siswa = m_siswa.kd ".
					"AND siswa_kelas.kd_tapel = '$tapelkd' ".
					"AND siswa_kelas.kd_kelas = '$kelkd' ".
					"AND siswa_kelas.kd_program = '$progkd' ".
					"AND siswa_kelas.kd_ruang = '$rukd' ".
					"ORDER BY m_siswa.nis ASC");
$r = mysql_fetch_assoc($q);
$total = mysql_num_rows($q);
$npage = ($total/$batas);



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
	$pdf->RotatedText(12,5,'No.',0);
	$pdf->RotatedText(20,5,'NIS',0);
	$pdf->RotatedText(50,5,'Nama Siswa',0);
	$pdf->RotatedText(50,5,'Tgl. Bayar',0);
	$pdf->RotatedText(50,5,'Ket.',0);
//	$pdf->SetY(47);



	//kolom data 
	//nek halaman satu, $we=0
	if ($we == 0)
		{
		$pdf->SetY(55);
		}
	else
		{
		$pdf->SetY(45);
		}	
	
	$qx = "SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_uang_gedung.*, ".
					"DATE_FORMAT(siswa_uang_gedung.tgl_bayar, '%d') AS tgl, ".
					"DATE_FORMAT(siswa_uang_gedung.tgl_bayar, '%m') AS bln, ".
					"DATE_FORMAT(siswa_uang_gedung.tgl_bayar, '%Y') AS thn, ".
					"siswa_kelas.* ".
					"FROM m_siswa, siswa_uang_gedung, siswa_kelas ".
					"WHERE siswa_uang_gedung.kd_siswa_kelas = siswa_kelas.kd ".
					"AND siswa_kelas.kd_siswa = m_siswa.kd ".
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
		$bln = nosql($data['bln']);
		$thn = nosql($data['thn']);
		$ket = balikin($data['ket']);

		//cek
		if (($tgl == "00") OR ($bln == "00") OR ($thn == "0000"))
			{
			$tgl_bayar = "-";
			}
		else
			{
			$tgl = nosql($data['tgl']);
			$bln = $arrbln1[nosql($data['bln'])];
			$thn = nosql($data['thn']);
			$tgl_bayar = "$tgl $bln $thn";
			}
		
	
		$pdf->Cell(12,5,$no_absen,1,0,'C');
		$pdf->Cell(20,5,$nis,1,0,'C');
		$pdf->Cell(50,5,$nama,1,0,'L');
		$pdf->Cell(50,5,$tgl_bayar,1,0,'L');
		$pdf->Cell(50,5,$ket,1,0,'L');
		

	
		$pdf->Ln();
		}
	while ($data = mysql_fetch_assoc($result));
	}


//isi
$isi = ob_get_contents();
ob_end_clean();


$pdf->WriteHTML($isi);
$pdf->Output("Keuangan_Siswa_Uang_Gedung.pdf",I);
?>