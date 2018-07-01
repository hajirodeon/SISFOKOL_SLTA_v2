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
require("../../inc/class/admgr_k_p_smt.php");

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
$smtkd = nosql($_REQUEST['smtkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$mapelkd = nosql($_REQUEST['mapelkd']);
$jmlrd = 2;
$s = nosql($_REQUEST['s']);
$judul = "Laporan Koleksi Nilai : Per Semester";
$judulz = $judul;
$batas = 28; //jumlah data per halaman



//isi *START
ob_start();

$pdf->SetFont('Times','',10);

//query
$q = mysql_query("SELECT m_siswa.*, siswa_kelas.* ".
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
	$pdf->SetFillColor(233,233,233);
	$pdf->Cell(10,7,'No.',1,0,'C',1);
	$pdf->Cell(20,7,'NIS',1,0,'C',1);
	$pdf->Cell(75,7,'Nama Siswa',1,0,'C',1);
	$pdf->Cell(10,7,'Nilai',1,0,'C',1);
	$pdf->SetY(47);


	//kolom data 
	//nek halaman satu, $we=0
	if ($we == 0)
		{
		$pdf->SetY(57);
		}
	else
		{
		$pdf->SetY(47);
		}	
	
	$qx = "SELECT m_siswa.*, siswa_kelas.*, siswa_kelas.kd AS skkd ".
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
		$kd = nosql($data['skkd']);
		$no_absen = nosql($data['no_absen']);
		$nis = nosql($data['nis']);
		$nama = balikin2($data['nama']);
	
		$pdf->Cell(10,7,$no_absen,1,0,'C');
		$pdf->Cell(20,7,$nis,1,0,'C');
		$pdf->Cell(75,7,$nama,1,0,'L');

		//nilai ne
		$qrt = mysql_query("SELECT AVG(ulangan_rata.nilai) AS rtnil ".
								"FROM ulangan_rata, siswa_kelas ".
								"WHERE ulangan_rata.kd_siswa_kelas = siswa_kelas.kd ".
								"AND siswa_kelas.kd = '$kd' ".
								"AND ulangan_rata.kd_smt = '$smtkd' ".
								"AND ulangan_rata.kd_mapel = '$mapelkd'");
		$rrt = mysql_fetch_assoc($qrt);
				
		//nilai
		$rtnil = round($rrt['rtnil']);

				
		//nek null
		if (empty($rtnil))
			{
			$rtnil = "-";
			}
		else if (strlen($rtnil) == 1)
			{
			$rtnil = "0$rtnil";
			}
	
		$pdf->Cell(10,7,$rtnil,1,0,'C');
	
		$pdf->Ln();
		}
	while ($data = mysql_fetch_assoc($result));
	}


//isi
$isi = ob_get_contents();
ob_end_clean();


$pdf->WriteHTML($isi);
$pdf->Output("koleksi_nilai_raport_semester.pdf",I);
?>