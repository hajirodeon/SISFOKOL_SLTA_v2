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
require("../../inc/class/lap_r_p_smt.php");

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
$jmlrd = 2;
$s = nosql($_REQUEST['s']);
$judul = "Laporan Koleksi Nilai Raport : Per Semester";
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
	$pdf->RotatedText(12,30,'No.',0);
	$pdf->RotatedText(15,30,'NIS',0);
	$pdf->RotatedText(50,30,'Nama Siswa',0);
	$pdf->SetY(47);

	//mapel
	$qpel = mysql_query("SELECT DISTINCT(m_mapel.xpel) ".
							"FROM m_mapel, m_mapel_kelas ".
							"WHERE m_mapel_kelas.kd_mapel = m_mapel.kd ".
							"AND m_mapel_kelas.kd_kelas = '$kelkd' ".
							"AND m_mapel_kelas.kd_program = '$progkd' ".
							"ORDER BY round(m_mapel.no, m_mapel.no_sub) ASC");	
	$rpel = mysql_fetch_assoc($qpel);
	
	
	do
	  	{
		$pel = balikin2($rpel['xpel']);
		
		//nek halaman satu, $we=0
		if ($we == 0)
			{
			$pdf->Rotate(90,65,25);
			}
		else
			{
			$pdf->Rotate(90,60,20);
			}
			
		$pdf->Cell(30,7,$pel,1,0,'L',1);	
		$pdf->Rotate(0);	
		$pdf->Ln();
		}
	while ($rpel = mysql_fetch_assoc($qpel));


	//kolom data 
	//nek halaman satu, $we=0
	if ($we == 0)
		{
		$pdf->SetY(80);
		}
	else
		{
		$pdf->SetY(70);
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
	
		$pdf->Cell(12,7,$no_absen,1,0,'C');
		$pdf->Cell(15,7,$nis,1,0,'L');
		$pdf->Cell(50,7,$nama,1,0,'L');

		//mapel
	 	$qpel = mysql_query("SELECT DISTINCT(m_mapel.xpel) ".
								"FROM m_mapel, m_mapel_kelas ".
								"WHERE m_mapel_kelas.kd_mapel = m_mapel.kd ".
								"AND m_mapel_kelas.kd_kelas = '$kelkd' ".
								"AND m_mapel_kelas.kd_program = '$progkd' ".
								"ORDER BY round(m_mapel.no, m_mapel.no_sub) ASC");
		$rpel = mysql_fetch_assoc($qpel);
	

		do
		  	{
			$xpel = balikin2($rpel['xpel']);
			
			//mapel e....
			$qtu = mysql_query("SELECT * FROM m_mapel ".
									"WHERE xpel = '$xpel'");
			$rtu = mysql_fetch_assoc($qtu);
			$ttu = mysql_num_rows($qtu);
			$tukd = nosql($rtu['kd']);
			
			
			//nilai ne
			$qrt = mysql_query("SELECT AVG(ulangan_rata.nilai) AS rtnil ".
									"FROM ulangan_rata, siswa_kelas ".
									"WHERE ulangan_rata.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_kelas.kd = '$kd' ".
									"AND ulangan_rata.kd_smt = '$smtkd' ".
									"AND ulangan_rata.kd_mapel = '$tukd'");
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
		
			$pdf->Cell(7,7,$rtnil,1,0,'C');
		  	}
		while ($rpel = mysql_fetch_assoc($qpel));
	
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