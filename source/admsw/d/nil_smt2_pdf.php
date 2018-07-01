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


//ambil nilai
require("../../inc/config.php"); 
require("../../inc/fungsi.php"); 
require("../../inc/koneksi.php"); 
require("../../inc/class/lap_r_s_smt2.php");

nocache;

//nilai
$swkd = nosql($_REQUEST['swkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$judul = "RAPORT AKHIR SEMESTER";
$jmlrd = "2";
$coro = "4";



//start class
$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle($judul);
$pdf->SetAuthor($author);
$pdf->SetSubject($description);
$pdf->SetKeywords($keywords);

//data diri
$qd = mysql_query("SELECT * FROM m_siswa ".
					"WHERE kd = '$swkd'");
$rd = mysql_fetch_assoc($qd);
$nama = balikin2($rd['nama']);
$nis = nosql($rd['nis']);


//kelas
$qk = mysql_query("SELECT * FROM m_kelas ".
					"WHERE kd = '$kelkd'");
$rk = mysql_fetch_assoc($qk);
$rkel = nosql($rk['kelas']);

//program
$qpro = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");
$rpro = mysql_fetch_assoc($qpro);
$program = balikin($rpro['program']);



//ruang
$qu = mysql_query("SELECT * FROM m_ruang ".
					"WHERE kd = '$rukd'");
$ru = mysql_fetch_assoc($qu);
$rru = balikin($ru['ruang']);
$kelas = "$rkel-$rru";


//smt
$qmt = mysql_query("SELECT * FROM m_smt ".
					"WHERE kd = '$smtkd'");
$rmt = mysql_fetch_assoc($qmt);
$smt = balikin($rmt['smt']);

//tapel
$qtp = mysql_query("SELECT * FROM m_tapel ".
					"WHERE kd = '$tapelkd'");
$rtp = mysql_fetch_assoc($qtp);
$thn1 = nosql($rtp['tahun1']);
$thn2 = nosql($rtp['tahun2']);
$tapel = "$thn1/$thn2";

//walikelas
$qwk = mysql_query("SELECT m_walikelas.*, m_pegawai.* ".
						"FROM m_walikelas, m_pegawai ".
						"WHERE m_walikelas.kd_pegawai = m_pegawai.kd ".
						"AND m_walikelas.kd_tapel = '$tapelkd' ".
						"AND m_walikelas.kd_kelas = '$kelkd' ".
						"AND m_walikelas.kd_program = '$progkd' ".
						"AND m_walikelas.kd_ruang = '$rukd'");
$rwk = mysql_fetch_assoc($qwk);
$nwk = balikin2($rwk['nama']);


//header page////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->SetY(10);
$pdf->SetY(10);
$pdf->Headerku();

//judul
$pdf->SetFont('Times','B',16);
$pdf->Cell(190,3,$judul,0,0,'C');


//header table////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$htg = 5; //tinggi
$hkr = 5; //dari kiri
$pdf->SetFont('Times','B',7);

//posisi
$pdf->SetY(53+5);
$pdf->SetFillColor(233,233,233);

//no
$pdf->SetX(10);
$pdf->Cell($hkr,$htg,'No.',1,0,'L',1);

//mapel
$pdf->SetX(15);
$pdf->Cell($hkr+40,$htg,'Mata Pelajaran',1,0,'L',1);

//SKM
$pdf->SetX(60);
$pdf->Cell($hkr+3,$htg,'SKM',1,0,'L',1);

//aspek
$pdf->SetX(68);
$pdf->Cell($hkr+40,$htg,'Aspek Yang Dinilai',1,0,'L',1);

//jml NH
$qjx = mysql_query("SELECT MAX(jml_hr) AS hrx ".
						"FROM ulangan_jml");
$rowjx = mysql_fetch_assoc($qjx);
$jmlpek = nosql($rowjx['hrx']);

$pdf->SetX(111);
for ($i=1;$i<=$jmlpek;$i++)
	{
	$pdf->Cell($hkr+2,$htg,"NH$i",1,0,'C',1);
	
	for ($rdx=1;$rdx<=$jmlrd;$rdx++)
		{
		$pdf->Cell($hkr+2,$htg,"R$rdx",1,0,'C',1);
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//mapel /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->SetY(58+5);
$pdf->SetFont('Times','',7);

//data mapel
$q = mysql_query("SELECT m_mapel.*, m_mapel.kd AS pelkd, m_mapel_kelas.* ".
					"FROM m_mapel, m_mapel_kelas  ".
					"WHERE m_mapel.kd = m_mapel_kelas.kd_mapel ".
					"AND m_mapel_kelas.kd_kelas = '$kelkd'". 
					"AND m_mapel_kelas.kd_program = '$progkd'". 
					"ORDER BY round(m_mapel.no, m_mapel.no_sub) ASC"); 
$r = mysql_fetch_assoc($q);

do
	{
	$pelkd = nosql($r['pelkd']);
	$pel = balikin2($r['pel']);
	$j = $j + 1;

	//mapel /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//jumlah aspek
	$qpkx = mysql_query("SELECT m_aspek_mapel.*, m_aspek.*, m_mapel.* ".
							"FROM m_aspek_mapel, m_aspek, m_mapel ".
							"WHERE m_aspek_mapel.kd_mapel = m_mapel.kd ".
							"AND m_aspek_mapel.kd_aspek = m_aspek.kd ".
							"AND m_aspek_mapel.kd_kelas = '$kelkd' ".
							"AND m_aspek_mapel.kd_program = '$progkd' ".
							"AND m_aspek_mapel.kd_mapel = '$pelkd'");
	$rpkx = mysql_fetch_assoc($qpkx);
	$tpkx = mysql_num_rows($qpkx);
	
	//nek null
	if (empty($tpkx))
		{ 
		$tpkx = 1;
		}
	

	//posisi
	$pdf->SetX(10);
	$nilai = ($coro * $tpkx);
	$pdf->Cell(5,$nilai,"$j.",1,0,'C');
	$pdf->Cell(45,$nilai,$pel,1,0,'L');
	$pdf->Cell(8,$nilai,'',1,0,'L');
	$pdf->Ln();
	}
while ($r = mysql_fetch_assoc($q));			


//aspek	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->SetY(58+5);
$pdf->SetFont('Times','',7);


$qx = mysql_query("SELECT m_mapel.*, m_mapel.kd AS pelkd, m_mapel_kelas.* ".
					"FROM m_mapel, m_mapel_kelas ".
					"WHERE m_mapel.kd = m_mapel_kelas.kd_mapel ".
					"AND m_mapel_kelas.kd_kelas = '$kelkd'". 
					"AND m_mapel_kelas.kd_program = '$progkd'". 
					"ORDER BY round(m_mapel.no, m_mapel.no_sub) ASC");					
$rx = mysql_fetch_assoc($qx);

do
	{
	$kdx = nosql($rx['pelkd']);

	$qpkx = mysql_query("SELECT m_aspek_mapel.*, m_aspek.*, m_aspek.kd AS makd, m_mapel.* ".
							"FROM m_aspek_mapel, m_aspek, m_mapel ".
							"WHERE m_aspek_mapel.kd_mapel = m_mapel.kd ".
							"AND m_aspek_mapel.kd_aspek = m_aspek.kd ".
							"AND m_aspek_mapel.kd_kelas = '$kelkd' ".
							"AND m_aspek_mapel.kd_program = '$progkd' ".
							"AND m_aspek_mapel.kd_mapel = '$kdx'");
	$rpkx = mysql_fetch_assoc($qpkx);
	$tpkx = mysql_num_rows($qpkx);
	
	do
		{		
		$makd = nosql($rpkx['makd']);
		$aspekx = balikin2($rpkx['aspek']);
		
		
		//nek null
		if (empty($aspekx))
			{
			$aspekx = "-";
			}
			
			
		//posisi
		$pdf->SetX(68);
		$pdf->Cell(43,$coro,$aspekx,1,0,'L');
		
		
		
		//jml NH-MAX
		$qjx = mysql_query("SELECT MAX(jml_hr) AS hrx ".
								"FROM ulangan_jml");
		$rowjx = mysql_fetch_assoc($qjx);
		$jmlpek = nosql($rowjx['hrx']);
		
		
		$pdf->SetX(111);
		for ($m=1;$m<=$jmlpek;$m++)
			{
			//nh ke-n
	    	$nhxre = "NH$m";
			$nrxrei = $m;

		
		  	//nh
		  	$qre = mysql_query("SELECT nilai ".
									"FROM ulangan_harian, siswa_kelas ".
									"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_kelas.kd_siswa = '$swkd' ".
									"AND siswa_kelas.kd_tapel = '$tapelkd' ".
									"AND siswa_kelas.kd_kelas = '$kelkd' ".
									"AND siswa_kelas.kd_program = '$progkd' ".
									"AND ulangan_harian.kd_smt = '$smtkd' ".
									"AND ulangan_harian.kd_mapel = '$kdx' ".
									"AND ulangan_harian.kd_aspek = '$makd' ".
									"AND left(ulangan_harian.nilkd,3) = '$nhxre'");
		  	$rre = mysql_fetch_assoc($qre);
	  
			$nhxy = round($rre['nilai']);
									
			if (empty($nhxy))
				{
				$nhxy = "-";
				}
			else if (strlen($nhxy) == 1)
				{
				$nhxy = "0$nhxy";
				}
					
			$pdf->Cell($hkr+2,$coro,$nhxy,1,0,'C');
			
			
			
			//remidi
			$nr = "NR";
			
			for ($rdy=1;$rdy<=$jmlrd;$rdy++)
				{
				$nrx = "$m$nr$rdy";
				$qnr = mysql_query("SELECT nilai ".
										"FROM ulangan_harian, siswa_kelas ".
										"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
										"AND siswa_kelas.kd_siswa = '$swkd' ".
										"AND siswa_kelas.kd_tapel = '$tapelkd' ".
										"AND siswa_kelas.kd_kelas = '$kelkd' ".
										"AND siswa_kelas.kd_program = '$progkd' ".
										"AND ulangan_harian.kd_smt = '$smtkd' ".
										"AND ulangan_harian.kd_mapel = '$kdx' ".
										"AND ulangan_harian.kd_aspek = '$makd' ".
										"AND left(ulangan_harian.nilkd,4) = '$nrx'");
				$rnr = mysql_fetch_assoc($qnr);
		
				$nrxy = round(nosql($rnr['nilai']));
		
				if (empty($nrxy))
					{
					$nrxy = "-";
					}
				else if (strlen($nrxy) == 1)
					{
					$nrxy = "0$nrxy";
					}
				
				$pdf->Cell($hkr+2,$coro,$nrxy,1,0,'C');
				}
			}
		$pdf->Ln();
		}
	while ($rpkx = mysql_fetch_assoc($qpkx));
	}
while ($rx = mysql_fetch_assoc($qx));


//Tanda tangan ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->SetFont('Times','B',10);
$pdf->SetY($pdf->GetY()+10+5);
$pdf->SetX(10);


$pdf->Cell(10,5,'Wali / Orang Tua Murid',0,0,'L');
$pdf->SetX(165);
$pdf->Cell(10,5,'Wali Kelas',0,0,'L');

$pdf->SetY($pdf->GetY()+20);
$pdf->SetX(10);

//ortu
$pdf->SetX(11);
$pdf->Cell(10,2,'(....................................)',0,0,'L');


//wali kelas
if (empty($nwk))
	{
	$pdf->SetX(149);
	$pdf->Cell(50,2,'(....................................)',0,0,'C'); 
	}
else
	{
	$pdf->SetX(149);
	$pdf->Cell(50,2,'(...'.$nwk.'...)',0,0,'C'); 
	}
	
	
//output-kan ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf->Output("raport_akhir_smt_$nis.pdf",I);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>