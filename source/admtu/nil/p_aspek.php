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


session_start();

//fungsi - fungsi
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/class/paging.php");
require("../../inc/cek/admtu.php");
$tpl = LoadTpl("../../template/index.html"); 


nocache;

//nilai
$filenya = "p_aspek.php";
$judul = "Nilai Per Aspek";
$judulku = "[$tu_session : $nip5_session.$nm5_session] ==> $judul";
$juduly = $judul;
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$mapelkd = nosql($_REQUEST['mapelkd']);
$aspekkd = nosql($_REQUEST['aspekkd']);
$jmlrd = "2";
$s = nosql($_REQUEST['s']);
$page = nosql($_REQUEST['page']);

//page...
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}

$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd&".
			"progkd=$progkd&rukd=$rukd&mapelkd=$mapelkd&aspekkd=$aspekkd&page=$page";





//focus....focus...
if (empty($tapelkd))
	{
	$diload = "document.formx.tapel.focus();";
	}
else if (empty($kelkd))
	{
	$diload = "document.formx.kelas.focus();";
	}
else if (empty($progkd))
	{
	$diload = "document.formx.program.focus();";
	}
else if (empty($rukd))
	{
	$diload = "document.formx.ruang.focus();";
	}
else if (empty($smtkd))
	{
	$diload = "document.formx.smt.focus();";
	}
else if (empty($mapelkd))
	{
	$diload = "document.formx.mapel.focus();";
	}
else if (empty($aspekkd))
	{
	$diload = "document.formx.aspek.focus();";
	}






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$tapelkd = nosql($_POST['tapelkd']);
	$smtkd = nosql($_POST['smtkd']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$rukd = nosql($_POST['rukd']);
	$mapelkd = nosql($_POST['mapelkd']);
	$aspekkd = nosql($_POST['aspekkd']);
	$nhkd = nosql($_POST['nhkd']);
	$total = nosql($_POST['total']);
	$jml = nosql($_POST['jml']);
	$tnh = nosql($_POST['tnh']);
	$tnr = nosql($_POST['tnr']);
	$page = nosql($_POST['page']);
	

	for ($i=1;$i<=$jml;$i++) 
		{
		for ($j=1;$j<=$tnh;$j++) 
			{
			for ($k=1;$k<=$tnr;$k++) 
				{	
				$xsw = "SW";
				$xsw1 = "$xsw$i";
				$xswxx = nosql($_POST["$xsw1"]);
				
				
				//siswa kelas ///////////////////////////////////////////
				$qswk = mysql_query("SELECT * FROM siswa_kelas ".
										"WHERE kd_tapel = '$tapelkd' ".
										"AND kd_kelas = '$kelkd' ".
										"AND kd_program = '$progkd' ".
										"AND kd_ruang = '$rukd' ".
										"AND kd_siswa = '$xswxx'");
				$rswk = mysql_fetch_assoc($qswk);
				$swk_kd = nosql($rswk['kd']);
				/////////////////////////////////////////////////////////
				
					
				$xnh = "NH";
				$xnh1 = "$xnh$j$i";
				$xnhxx = nosql($_POST["$xnh1"]);
				
				//nek se-digit
				if (strlen($xnhxx) == 1)
					{
					$xnhxx = "0$xnhxx";
					}
				
				//nek lebih dari 100
				if ($nhxx > 100)
					{
					$xnhxx = "00";
					}
				

				$xnr = "NR";
				$xnr1 = "$j$xnr$k$i";
				$xnrxx = nosql($_POST["$xnr1"]);
				
				//nek se-digit
				if (strlen($xnrxx) == 1)
					{
					$xnrxx = "0$xnrxx";
					}
				
				//nek lebih dari 100
				if ($xnrxx > 100)
					{
					$xnrxx = "00";
					}

				$xul = "UL";
				$xul1 = "$xul$i";
				$xulxx = nosql($_POST["$xul1"]);
				
				//nek se-digit
				if (strlen($xulxx) == 1)
					{
					$xulxx = "0$xulxx";
					}
				
				//nek lebih dari 100
				if ($xulxx > 100)
					{
					$xulxx = "00";
					}
										
				//jika NH ****************************************************************************************
				if ($xnh == "NH")
					{			
					//random
					$xxhr = rand(1,1000);
					$xxh = md5("$x$i$j$k$xxhr");
									
					//cek
					$qc = mysql_query("SELECT * FROM ulangan_harian ".
										"WHERE kd_siswa_kelas = '$swk_kd' ".
										"AND kd_smt = '$smtkd' ".										
										"AND kd_mapel = '$mapelkd' ".
										"AND kd_aspek = '$aspekkd' ".
										"AND nilkd = '$xnh1'");
					$rc = mysql_fetch_assoc($qc);
					$tc = mysql_num_rows($qc);

	
					//update
					if ($tc != 0)
						{
						mysql_query("UPDATE ulangan_harian SET nilai = '$xnhxx' ".
										"WHERE kd_smt = '$smtkd' ".
										"AND kd_mapel = '$mapelkd' ".
										"AND kd_aspek = '$aspekkd' ".
										"AND nilkd = '$xnh1' ".
										"AND kd_siswa_kelas = '$swk_kd'");
						}
					else //insert
						{
						//nek null
						if (empty($xswxx))
							{
							//cuekin aja
							}
						else
							{
							mysql_query("INSERT INTO ulangan_harian(kd, kd_siswa_kelas, kd_smt, ".
											"kd_mapel, kd_aspek, nilkd, nilai) VALUES ".
											"('$xxh', '$swk_kd', '$smtkd', ".
											"'$mapelkd', '$aspekkd', '$xnh1', '$xnhxx')");
							}
						}
					}


				//jika NR ****************************************************************************************
				if ($xnr == "NR")
					{
					//random
					$xxrr = rand(1,1000);
					$xxr = md5("$x$i$j$k$xxrr");			
					
					//cek
					$qc = mysql_query("SELECT * FROM ulangan_harian ".
										"WHERE kd_siswa_kelas = '$swk_kd' ".
										"AND kd_smt = '$smtkd' ".
										"AND kd_mapel = '$mapelkd' ".
										"AND kd_aspek = '$aspekkd' ".
										"AND nilkd = '$xnr1'");
					$rc = mysql_fetch_assoc($qc);
					$tc = mysql_num_rows($qc);
					
	
					//update
					if ($tc != 0)
						{
						mysql_query("UPDATE ulangan_harian SET nilai = '$xnrxx' ".
										"WHERE kd_smt = '$smtkd' ".
										"AND kd_mapel = '$mapelkd' ".
										"AND kd_aspek = '$aspekkd' ".
										"AND nilkd = '$xnr1' ".
										"AND kd_siswa_kelas = '$swk_kd'");
						}
					else //insert
						{
						//nek null
						if (empty($xswxx))
							{
							//cuekin aja
							}
						else
							{
							mysql_query("INSERT INTO ulangan_harian(kd, kd_siswa_kelas, kd_smt, ".
											"kd_mapel, kd_aspek, nilkd, nilai) VALUES ".
											"('$xxr', '$swk_kd', '$smtkd', ".
											"'$mapelkd', '$aspekkd', '$xnr1', '$xnrxx')");
							}
						}
					}
				
				
				//jika UL ****************************************************************************************
				if ($xul == "UL")
					{			
					//random
					$xxlr = rand(1,1000);
					$xxl = md5("$x$i$j$k$xxlr");			

					//cek
					$qc = mysql_query("SELECT * FROM ulangan_harian ".
										"WHERE kd_siswa_kelas = '$swk_kd' ".
										"AND ulangan_harian.kd_smt = '$smtkd' ".
										"AND ulangan_harian.kd_mapel = '$mapelkd' ".
										"AND ulangan_harian.kd_aspek = '$aspekkd' ".
										"AND ulangan_harian.nilkd = '$xul1'");
					$rc = mysql_fetch_assoc($qc);
					$tc = mysql_num_rows($qc);
					
		
					//update
					if ($tc != 0)
						{
						mysql_query("UPDATE ulangan_harian SET nilai = '$xulxx' ".
										"WHERE kd_smt = '$smtkd' ".
										"AND kd_mapel = '$mapelkd' ".
										"AND kd_aspek = '$aspekkd' ".
										"AND nilkd = '$xul1' ".
										"AND kd_siswa_kelas = '$swk_kd'");
						}
					else //insert
						{
						//nek null
						if (empty($xswxx))
							{
							//cuekin aja
							}
						else
							{
							mysql_query("INSERT INTO ulangan_harian(kd, kd_siswa_kelas, kd_smt, ".
											"kd_mapel, kd_aspek, nilkd, nilai) VALUES ".
											"('$xxl', '$swk_kd', '$smtkd', ".
											"'$mapelkd', '$aspekkd', '$xul1', '$xulxx')");
							}
						}
					}	
				}
			}
		}
	
	//re-direct
	xloc($ke);
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");
require("../../inc/js/number.js");
require("../../inc/menu/admtu.php");
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" method="post" action="'.$filenya.'">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Tahun Pelajaran : ';
echo "<select name=\"tapel\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qtpx = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rowtpx = mysql_fetch_assoc($qtpx);
$tpx_kd = nosql($rowtpx['kd']);
$tpx_thn1 = nosql($rowtpx['tahun1']);
$tpx_thn2 = nosql($rowtpx['tahun2']);

echo '<option value="'.$tpx_kd.'">'.$tpx_thn1.'/'.$tpx_thn2.'</option>';

$qtp = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd <> '$tapelkd' ".
						"ORDER BY tahun1 ASC");
$rowtp = mysql_fetch_assoc($qtp);
				
do
	{
	$tpkd = nosql($rowtp['kd']);
	$tpth1 = nosql($rowtp['tahun1']);
	$tpth2 = nosql($rowtp['tahun2']);

	echo '<option value="'.$filenya.'?tapelkd='.$tpkd.'">'.$tpth1.'/'.$tpth2.'</option>';
	}
while ($rowtp = mysql_fetch_assoc($qtp));

echo '</select>, 

Kelas : ';
echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbtx = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rowbtx = mysql_fetch_assoc($qbtx);

$btxkd = nosql($rowbtx['kd']);
$btxkelas = nosql($rowbtx['kelas']);

echo '<option value="'.$btxkd.'">'.$btxkelas.'</option>';

$qbt = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd <> '$kelkd' ".
						"ORDER BY no ASC");
$rowbt = mysql_fetch_assoc($qbt);
				
do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas = nosql($rowbt['kelas']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$btkd.'">'.$btkelas.'</option>';
	}
while ($rowbt = mysql_fetch_assoc($qbt));

echo '</select>, 

Program : ';
echo "<select name=\"program\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qprgx = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");
$rowprgx = mysql_fetch_assoc($qprgx);

$prgx_kd = nosql($rowprgx['kd']);
$prgx_prog = balikin($rowprgx['program']);

echo '<option value="'.$prgx_kd.'">'.$prgx_prog.'</option>';

$qprg = mysql_query("SELECT * FROM m_program ".
						"WHERE kd <> '$progkd' ".
						"ORDER BY program ASC");
$rowprg = mysql_fetch_assoc($qprg);
				
do
	{
	$prg_kd = nosql($rowprg['kd']);
	$prg_prog = balikin($rowprg['program']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$prg_kd.'">'.$prg_prog.'</option>';
	}
while ($rowprg = mysql_fetch_assoc($qprg));

echo '</select>, 
Ruang : ';
echo "<select name=\"ruang\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qrux = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd = '$rukd'");
$rowrux = mysql_fetch_assoc($qrux);

$ruxkd = nosql($rowrux['kd']);
$ruxruang = balikin($rowrux['ruang']);

echo '<option value="'.$ruxkd.'">'.$ruxruang.'</option>';

$qru = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd <> '$rukd' ".
						"ORDER BY ruang ASC");
$rowru = mysql_fetch_assoc($qru);
				
do
	{
	$ru_kd = nosql($rowru['kd']);
	$ru_ru = balikin($rowru['ruang']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$ru_kd.'">'.$ru_ru.'</option>';
	}
while ($rowru = mysql_fetch_assoc($qru));

echo '</select>, 

Semester : ';
echo "<select name=\"smt\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qstx = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd = '$smtkd'");
$rowstx = mysql_fetch_assoc($qstx);
$stx_kd = nosql($rowstx['kd']);
$stx_smt = nosql($rowstx['smt']);

echo '<option value="'.$stx_kd.'">'.$stx_smt.'</option>';

$qst = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd <> '$smtkd' ".
						"ORDER BY smt ASC");
$rowst = mysql_fetch_assoc($qst);
				
do
	{
	$st_kd = nosql($rowst['kd']);
	$st_smt = nosql($rowst['smt']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&smtkd='.$st_kd.'">'.$st_smt.'</option>';
	}
while ($rowst = mysql_fetch_assoc($qst));

echo '</select>, 
<br>Mata Pelajaran : ';
echo "<select name=\"mapel\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qstdx = mysql_query("SELECT * FROM m_mapel ".
						"WHERE kd = '$mapelkd'");
$rowstdx = mysql_fetch_assoc($qstdx);
$stdx_kd = nosql($rowstdx['kd']);
$stdx_pel = balikin($rowstdx['pel']);

echo '<option value="'.$stdx_kd.'">'.$stdx_pel.'</option>';

$qstd = mysql_query("SELECT m_mapel.*, m_mapel.kd AS mpkd, m_mapel_kelas.* ".
						"FROM m_mapel, m_mapel_kelas ".
						"WHERE m_mapel_kelas.kd_mapel = m_mapel.kd ".
						"AND m_mapel_kelas.kd_kelas = '$kelkd' ".
						"AND m_mapel_kelas.kd_program = '$progkd' ".
						"AND m_mapel_kelas.kd <> '$mapelkd' ".
						"ORDER BY m_mapel.pel ASC");
$rowstd = mysql_fetch_assoc($qstd);
				
do
	{
	$std_kd = nosql($rowstd['mpkd']);
	$std_pel = nosql($rowstd['pel']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&smtkd='.$smtkd.'&mapelkd='.$std_kd.'">'.$std_pel.'</option>';
	}
while ($rowstd = mysql_fetch_assoc($qstd));

echo "</select>, Aspek : 
<select name=\"aspek\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qspx = mysql_query("SELECT m_aspek_mapel.*, m_aspek.*, m_aspek.kd AS makd ".
						"FROM m_aspek_mapel, m_aspek ".
						"WHERE m_aspek_mapel.kd_aspek = m_aspek.kd ".
						"AND m_aspek.kd = '$aspekkd'");
$rowspx = mysql_fetch_assoc($qspx);
$spx_kd = nosql($rowspx['makd']);
$spx_aspek = balikin($rowspx['aspek']);

echo '<option value="'.$spx_kd.'">'.$spx_aspek.'</option>';

$qsp = mysql_query("SELECT m_aspek_mapel.*, m_aspek.*, m_aspek.kd AS makd ".
						"FROM m_aspek_mapel, m_aspek ".
						"WHERE m_aspek_mapel.kd_aspek = m_aspek.kd ".
						"AND m_aspek_mapel.kd_mapel = '$mapelkd' ".
						"AND m_aspek_mapel.kd <> '$aspekkd' ".
						"AND m_aspek_mapel.kd_kelas = '$kelkd' ". 
						"AND m_aspek_mapel.kd_program = '$progkd' ". 
						"ORDER BY m_aspek.aspek ASC");
$rowsp = mysql_fetch_assoc($qsp);
				
do
	{
	$sp_kd = nosql($rowsp['makd']);
	$sp_aspek = balikin($rowsp['aspek']);
	
	echo '<option value="'.$filenya.'?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&smtkd='.$smtkd.'&mapelkd='.$mapelkd.'&aspekkd='.$sp_kd.'">
	'.$sp_aspek.'</option>';
	}
while ($rowsp = mysql_fetch_assoc($qsp));

echo '</select>
</td>
</tr>
</table>
<br>';


//nek drg
if (empty($tapelkd))
	{
	echo '<font color="#FF0000"><strong>TAHUN PELAJARAN Belum Dipilih...!</strong></font>';
	}
	
else if (empty($kelkd))
	{
	echo '<font color="#FF0000"><strong>KELAS Belum Dipilih...!</strong></font>';
	}
	
else if (empty($progkd))
	{
	echo '<font color="#FF0000"><strong>PROGRAM Belum Dipilih...!</strong></font>';
	}
	
else if (empty($rukd))
	{
	echo '<font color="#FF0000"><strong>RUANG Belum Dipilih...!</strong></font>';
	}

else if (empty($smtkd))
	{
	echo '<font color="#FF0000"><strong>SEMESTER Belum Dipilih...!</strong></font>';
	}

else if (empty($mapelkd))
	{
	echo '<font color="#FF0000"><strong>MATA PELAJARAN Belum Dipilih...!</strong></font>';
	}

else if (empty($aspekkd))
	{
	echo '<font color="#FF0000"><strong>ASPEK Belum Dipilih...!</strong></font>';
	}
else
	{
	//query	  
	$p = new Pager();
	$start = $p->findStart($limit);

	$sqlcount = "SELECT m_siswa.*, m_siswa.kd AS mskd, siswa_kelas.* ".
					"FROM m_siswa, siswa_kelas ".
					"WHERE siswa_kelas.kd_siswa = m_siswa.kd ".
					"AND siswa_kelas.kd_tapel = '$tapelkd' ".
					"AND siswa_kelas.kd_kelas = '$kelkd' ".
					"AND siswa_kelas.kd_program = '$progkd' ".
					"AND siswa_kelas.kd_ruang = '$rukd' ".
					"ORDER BY siswa_kelas.no_absen ASC";
	$sqlresult = $sqlcount;
			
	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$target = $ke;
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);

	//jml NH
 	$qjx = mysql_query("SELECT * FROM ulangan_jml ".
							"WHERE kd_kelas = '$kelkd' ".
							"AND kd_program = '$progkd' ".
							"AND kd_smt = '$smtkd' ".
							"AND kd_mapel = '$mapelkd' ".
							"AND kd_aspek = '$aspekkd'");
	$rowjx = mysql_fetch_assoc($qjx);
	$jmlpek = nosql($rowjx['jml_hr']);
	
	echo '<table border="1" cellpadding="3" cellspacing="0">
    <tr bgcolor="'.$warnaheader.'"> 
    <td width="20" align="center"><strong>No.</strong></td>
    <td width="20" align="center"><strong>NIS</strong></td>
    <td align="center"><strong>Nama Siswa</strong></td>';
	
	for ($i=1;$i<=$jmlpek;$i++)
	  	{
		echo '<td width="17" align="center"><strong>NH.'.$i.'</strong></td>';
		
		for ($j=1;$j<=$jmlrd;$j++)
	  		{
			echo '<td width="17" align="center"><strong>R.'.$j.'</strong></td>';
			}
	  	}
	
	echo '<td width="32" align="center"><strong>Ulangan Semester</strong></td>
    </tr>';
	
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
		
		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td align="center">
		<input name="SW'.$nomer.'" type="hidden" value="'.$kd.'"> 
        '.$no_absen.'
		</td>
      	<td align="center">'.$nis.'</td>
      	<td>'.$nama.'</td>';
		
		for ($m=1;$m<=$jmlpek;$m++)
	  		{			
			$xy = md5("$x$m$nomer");
			
			//penentuan rata - rata
	    	$nhxre = "NH$m";
			$nrxrei = $m;
			$nrxrej = "NR";
			$nrxre = "$m$nrxrej";
	  
		  	//nh
		  	$qre = mysql_query("SELECT MAX(ulangan_harian.nilai) AS d ".
									"FROM ulangan_harian, siswa_kelas ".
									"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_kelas.kd_siswa = '$kd' ".
									"AND siswa_kelas.kd_tapel = '$tapelkd' ".
									"AND siswa_kelas.kd_kelas = '$kelkd' ".
									"AND siswa_kelas.kd_program = '$progkd' ".
									"AND ulangan_harian.kd_smt = '$smtkd' ".
									"AND ulangan_harian.kd_mapel = '$mapelkd' ".
									"AND ulangan_harian.kd_aspek = '$aspekkd' ".
									"AND left(ulangan_harian.nilkd,3) = '$nhxre'");
	  		$rre = mysql_fetch_assoc($qre);
	  
	  		//remidi
	  		$qre2 = mysql_query("SELECT MAX(ulangan_harian.nilai) AS d2 ".
									"FROM ulangan_harian, siswa_kelas ".
									"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_kelas.kd_siswa = '$kd' ".
									"AND siswa_kelas.kd_tapel = '$tapelkd' ".
									"AND siswa_kelas.kd_kelas = '$kelkd' ".
									"AND siswa_kelas.kd_program = '$progkd' ".
									"AND ulangan_harian.kd_smt = '$smtkd' ".
									"AND ulangan_harian.kd_mapel = '$mapelkd' ".
									"AND ulangan_harian.kd_aspek = '$aspekkd' ".
									"AND left(ulangan_harian.nilkd,3) = '$nrxre'");
		  	$rre2 = mysql_fetch_assoc($qre2);
	  
	  
	  		$xre = $rre['d'];
	  		$xre2 = $rre2['d2'];
	  
			//nek - nek....
			if ($xre2 > $xre)
				{
				$yre = round($xre2);
		
				//nek one
				if (strlen($yre) == 1)
					{
					$nil = "0$yre";
					}
				else
					{
					$nil = $yre;
					}
				}
			else 
				{
				$yre = round($xre);

				//nek one
				if (strlen($yre) == 1)
					{
					$nil = "0$yre";
					}
				else
					{
					$nil = $yre;
					}
				}

			//masukkan ke tabel ulangan_rata ///
			//siswa kelas ///////////////////////////////////////////
			$qswk = mysql_query("SELECT * FROM siswa_kelas ".
									"WHERE kd_tapel = '$tapelkd' ".
									"AND kd_kelas = '$kelkd' ".
									"AND kd_program = '$progkd' ".
									"AND kd_ruang = '$rukd' ".
									"AND kd_siswa = '$kd'");
			$rswk = mysql_fetch_assoc($qswk);
			$swk_kd = nosql($rswk['kd']);
			/////////////////////////////////////////////////////////



			//cek
			$qcc = mysql_query("SELECT ulangan_rata.*, siswa_kelas.* ".
									"FROM ulangan_rata, siswa_kelas ".
									"WHERE ulangan_rata.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_kelas.kd_tapel = '$tapelkd' ".
									"AND siswa_kelas.kd_kelas = '$kelkd' ".
									"AND siswa_kelas.kd_program = '$progkd' ".
									"AND siswa_kelas.kd_ruang = '$rukd' ".
									"AND ulangan_rata.kd_smt = '$smtkd' ".		
									"AND ulangan_rata.kd_mapel = '$mapelkd' ".
									"AND ulangan_rata.kd_aspek = '$aspekkd' ".
									"AND siswa_kelas.kd_siswa = '$kd' ".
									"AND ulangan_rata.nilkd = '$nhxre'");	
			$rcc = mysql_fetch_assoc($qcc);
			$tcc = mysql_num_rows($qcc);
			
	
			if ($tcc != 0) //update
				{
				mysql_query("UPDATE ulangan_rata SET nilai = '$nil' ".
								"WHERE kd_smt = '$smtkd' ".
								"AND kd_mapel = '$mapelkd' ".
								"AND kd_aspek = '$aspekkd' ".
								"AND kd_siswa_kelas = '$swk_kd' ".
								"AND nilkd = '$nhxre'"); 
				}
			else 
				{
				//insert-kan
				mysql_query("INSERT INTO ulangan_rata (kd, kd_siswa_kelas, kd_smt, ".
								"kd_mapel, kd_aspek, nilkd, nilai) VALUES ".
								"('$xy', '$swk_kd', '$smtkd', ".
								"'$mapelkd', '$aspekkd', '$nhxre', '$nil')");
				}  
			}
		
		
		//NH
	  	$nh = "NH";
	  	for ($i=1;$i<=$jmlpek;$i++)
	  		{
			$nhx = "$nh$i$nomer";
			$qnh = mysql_query("SELECT ulangan_harian.*, siswa_kelas.* ".
									"FROM ulangan_harian, siswa_kelas ".
									"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_kelas.kd_siswa = '$kd' ".
									"AND siswa_kelas.kd_tapel = '$tapelkd' ".
									"AND siswa_kelas.kd_kelas = '$kelkd' ".
									"AND siswa_kelas.kd_program = '$progkd' ".
									"AND ulangan_harian.kd_smt = '$smtkd' ".
									"AND ulangan_harian.kd_mapel = '$mapelkd' ".
									"AND ulangan_harian.kd_aspek = '$aspekkd' ".
									"AND ulangan_harian.nilkd = '$nhx'");
			$rnh = mysql_fetch_assoc($qnh);
		
			$nhxy = round(nosql($rnh['nilai']));
		
			//nek null
			if (empty($nhxy))
				{
				$nhxy = "";
				}
			else if (strlen($nhxy) == 1)
				{
				$nhxy = "0$nhxy";
				}
			
			echo '<td align="center">
			<input name="'.$nhx.'" type="text" onKeyPress="return numbersonly(this, event)" value="'.$nhxy.'" size="3" maxlength="3">
        	</td>';
			
			//NR
	  		$nr = "NR";
			
	  		for ($j=1;$j<=$jmlrd;$j++)
	  			{
				$nrx = "$i$nr$j$nomer";
				$qnr = mysql_query("SELECT ulangan_harian.*, siswa_kelas.* ".
										"FROM ulangan_harian, siswa_kelas ".
										"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
										"AND siswa_kelas.kd_siswa = '$kd' ".
										"AND siswa_kelas.kd_tapel = '$tapelkd' ".
										"AND siswa_kelas.kd_kelas = '$kelkd' ".
										"AND siswa_kelas.kd_program = '$progkd' ".
										"AND ulangan_harian.kd_smt = '$smtkd' ".
										"AND ulangan_harian.kd_mapel = '$mapelkd' ".
										"AND ulangan_harian.kd_aspek = '$aspekkd' ".
										"AND ulangan_harian.nilkd = '$nrx'");
				$rnr = mysql_fetch_assoc($qnr);
				
				
		
				$nrxy = round(nosql($rnr['nilai']));
		
				if (empty($nrxy))
					{
					$nrxy = "";
					}
				else if (strlen($nrxy) == 1)
					{
					$nrxy = "0$nrxy";
					}
				
				echo '<td align="center"> 
          		<input name="'.$nrx.'" type="text" onKeyPress="return numbersonly(this, event)" value="'.$nrxy.'" size="3" maxlength="3">
				</td>';
				}
			}
			
		echo '<td align="center">';
		
		$ulx = "UL$nomer";
		$qul = mysql_query("SELECT ulangan_harian.*, siswa_kelas.* ".
								"FROM ulangan_harian, siswa_kelas ".
								"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
								"AND siswa_kelas.kd_siswa = '$data[kd]' ".
								"AND siswa_kelas.kd_tapel = '$tapelkd' ".
								"AND siswa_kelas.kd_kelas = '$kelkd' ".
								"AND siswa_kelas.kd_program = '$progkd' ".
								"AND siswa_kelas.kd_ruang = '$rukd' ".
								"AND ulangan_harian.kd_smt = '$smtkd' ".
								"AND ulangan_harian.kd_mapel = '$mapelkd' ".
								"AND ulangan_harian.kd_aspek = '$aspekkd' ".
								"AND ulangan_harian.nilkd = '$ulx'");
		$rul = mysql_fetch_assoc($qul);
		
		$ulxy = round(nosql($rul['nilai']));
		
		if (empty($ulxy))
			{
			$ulxy = "";
			}
		else if (strlen($ulxy) == 1)
			{
			$ulxy = "0$ulxy";
			}
		
		echo '<input name="UL'.$nomer.'" type="text" onKeyPress="return numbersonly(this, event)" value="'.$ulxy.'" size="3" maxlength="3">
		</td>
		</tr>';
		}
	while ($data = mysql_fetch_assoc($result));

	echo '</table>
	<table border="0" cellspacing="0" cellpadding="1">
    <tr>
	<td>
	<input name="tapelkd" type="hidden" value="'.$tapelkd.'">
    <input name="rukd" type="hidden" value="'.$rukd.'"> 
    <input name="kelkd" type="hidden" value="'.$kelkd.'">
	<input name="progkd" type="hidden" value="'.$progkd.'">
    <input name="smtkd" type="hidden" value="'.$smtkd.'">
    <input name="mapelkd" type="hidden" value="'.$mapelkd.'">
    <input name="aspekkd" type="hidden" value="'.$aspekkd.'"> 
    <input name="total" type="hidden" value="'.$count.'">
	<input name="jml" type="hidden" value="'.$limit.'">
    <input name="tnh" type="hidden" value="'.$jmlpek.'">
    <input name="tnr" type="hidden" value="'.$jmlrd.'"> 
    <input name="page" type="hidden" value="'.$page.'">
    <input name="btnSMP" type="submit" value="SIMPAN"> 
	'.$pagelist.'</td>
    </tr>
	</table>';
	}


echo '</form>
<br>
<br>
<br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//isi
$isi = ob_get_contents();
ob_end_clean();


require("../../inc/niltpl.php");
?>