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
require("../../inc/cek/admwk.php");
$tpl = LoadTpl("../../template/index.html"); 


nocache;

//nilai
$filenya = "nilai.php";
$swkd = nosql($_REQUEST['swkd']);
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


$ke = "$filenya?swkd=$swkd&tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd&".
			"progkd=$progkd&rukd=$rukd&mapelkd=$mapelkd&aspekkd=$aspekkd&page=$page";


			
//siswa ne
$qsiw = mysql_query("SELECT * FROM m_siswa ".
						"WHERE kd = '$swkd'");
$rsiw = mysql_fetch_assoc($qsiw);
$siw_nis = nosql($rsiw['nis']);
$siw_nama = balikin($rsiw['nama']);


$judul = "Nilai Siswa : ($siw_nis).$siw_nama";
$judulku = "[$wk_session : $nip3_session.$nm3_session] ==> $judul";
$juduly = $judul;


//focus
if (empty($smtkd))
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



//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/menu/admwk.php");


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form name="formx" method="post" action="'.$filenya.'">
<table>
<tr>
<td>';
xheadline($judul);
echo '</td>
<td>
[<a href="detail.php?tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'" title="Daftar Siswa">Daftar Siswa</a>]
</td>
</table>';

//tapel
$qpel = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$tapelkd'");
$rpel = mysql_fetch_assoc($qpel);
$pel_thn1 = nosql($rpel['tahun1']);
$pel_thn2 = nosql($rpel['tahun2']);

//kelas
$qkel = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rkel = mysql_fetch_assoc($qkel);
$kel_kelas = nosql($rkel['kelas']);

//program
$qpro = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");				
$rpro = mysql_fetch_assoc($qpro);
$pro_program = balikin($rpro['program']);

//nek null
if (empty($pro_program))
	{
	$pro_program = "-";
	}


//ruang
$qru = mysql_query("SELECT * FROM m_ruang ".
						"WHERE kd = '$rukd'");
$rru = mysql_fetch_assoc($qru);
$ru_ruang = balikin($rru['ruang']);



echo '<table bgcolor="'.$warnaover.'" width="100%" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
<strong>Tahun Pelajaran :</strong> '.$pel_thn1.'/'.$pel_thn2.', 
<strong>Kelas :</strong> '.$kel_kelas.',
<strong>Program :</strong> '.$pro_program.',
<strong>Ruang :</strong> '.$ru_ruang.'
</td>
</tr>
</table>


<table bgcolor="'.$warna02.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
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
	$st_kd = nosql($rowst["kd"]);
	$st_smt = nosql($rowst["smt"]);
	
	echo '<option value="'.$filenya.'?swkd='.$swkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&smtkd='.$st_kd.'">'.$st_smt.'</option>';
	}
while ($rowst = mysql_fetch_assoc($qst));

echo '</select>, 
Mata Pelajaran : ';
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
	$std_pel = balikin2($rowstd['pel']);
	
	echo '<option value="'.$filenya.'?swkd='.$swkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&smtkd='.$smtkd.'&mapelkd='.$std_kd.'">'.$std_pel.'</option>';
	}
while ($rowstd = mysql_fetch_assoc($qstd));

echo '</select>
</td>
</tr>
</table>
<br>';


//nek drg
if (empty($smtkd))
	{
	echo '<font color="#FF0000"><strong>SEMESTER Belum Dipilih...!</strong></font>';
	}

else if (empty($mapelkd))
	{
	echo '<font color="#FF0000"><strong>MATA PELAJARAN Belum Dipilih...!</strong></font>';
	}

else
	{
	//query	  
	$p = new Pager();
	$start = $p->findStart($limit);

	$sqlcount = "SELECT m_aspek_mapel.*, m_aspek.*, m_aspek.kd AS makd ".
						"FROM m_aspek_mapel, m_aspek ".
						"WHERE m_aspek_mapel.kd_aspek = m_aspek.kd ".
						"AND m_aspek_mapel.kd_mapel = '$mapelkd' ".
						"AND m_aspek_mapel.kd_kelas = '$kelkd' ". 
						"AND m_aspek_mapel.kd_program = '$progkd' ". 
						"ORDER BY m_aspek.aspek ASC";
	$sqlresult = $sqlcount;
			
	$count = mysql_num_rows(mysql_query($sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysql_query("$sqlresult LIMIT ".$start.", ".$limit);
	$target = $ke;
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysql_fetch_array($result);


	//jml NH (terbesar)
 	$qjxe = mysql_query("SELECT MAX(jml_hr) AS jmlpek FROM ulangan_jml ".
							"WHERE kd_kelas = '$kelkd' ".
							"AND kd_program = '$progkd' ".
							"AND kd_smt = '$smtkd' ".
							"AND kd_mapel = '$mapelkd'");
	$rowjxe = mysql_fetch_assoc($qjxe);
	$jmlpeke = nosql($rowjxe['jmlpek']);
	
	echo '<table border="1" cellpadding="3" cellspacing="0">
	<tr bgcolor="'.$warnaheader.'">';		
	echo '<td width="200"><strong>Aspek</strong></td>';
		
	for ($i=1;$i<=$jmlpeke;$i++)
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
			$mggu_attr = "";
			}
		else
			{
			$warna = $warna02;
			$warna_set = 0;
			$mggu_attr = "";
			}


		//nilai
		$nomer = $nomer + 1;
		$d_aspekkd = nosql($data['makd']);
		$d_aspek = balikin($data['aspek']);
		

		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";		
		echo '<td>'.$d_aspek.'</td>';
		
		//NH
	  	$nh = "NH";
	  	for ($i=1;$i<=$jmlpeke;$i++)
	  		{
			$nhx = "$nh$i";
			$qnh = mysql_query("SELECT ulangan_harian.*, siswa_kelas.* ".
									"FROM ulangan_harian, siswa_kelas ".
									"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
									"AND siswa_kelas.kd_siswa = '$swkd' ".
									"AND siswa_kelas.kd_tapel = '$tapelkd' ".
									"AND siswa_kelas.kd_kelas = '$kelkd' ".
									"AND siswa_kelas.kd_program = '$progkd' ".
									"AND ulangan_harian.kd_smt = '$smtkd' ".
									"AND ulangan_harian.kd_mapel = '$mapelkd' ".
									"AND ulangan_harian.kd_aspek = '$d_aspekkd' ".
									"AND ulangan_harian.nilkd LIKE '$nhx%'");
			$rnh = mysql_fetch_assoc($qnh);
		
			$nhxy = round(nosql($rnh['nilai']));
		
			//nek null
			if (empty($nhxy))
				{
				$nhxy = "-";
				}
			else if (strlen($nhxy) == 1)
				{
				$nhxy = "0$nhxy";
				}
			
			echo '<td align="center">'.$nhxy.'</td>';
			
			//NR
	  		$nr = "NR";
			
	  		for ($j=1;$j<=$jmlrd;$j++)
	  			{
				$nrx = "$i$nr$j";
				$qnr = mysql_query("SELECT ulangan_harian.*, siswa_kelas.* ".
										"FROM ulangan_harian, siswa_kelas ".
										"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
										"AND siswa_kelas.kd_siswa = '$swkd' ".
										"AND siswa_kelas.kd_tapel = '$tapelkd' ".
										"AND siswa_kelas.kd_kelas = '$kelkd' ".
										"AND siswa_kelas.kd_program = '$progkd' ".
										"AND ulangan_harian.kd_smt = '$smtkd' ".
										"AND ulangan_harian.kd_mapel = '$mapelkd' ".
										"AND ulangan_harian.kd_aspek = '$d_aspekkd' ".
										"AND ulangan_harian.nilkd LIKE '$nrx%'");
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
				
				echo '<td align="center">'.$nrxy.'</td>';
				}
			}
			
		
		$ulx = "UL";
		$qul = mysql_query("SELECT ulangan_harian.*, siswa_kelas.* ".
								"FROM ulangan_harian, siswa_kelas ".
								"WHERE ulangan_harian.kd_siswa_kelas = siswa_kelas.kd ".
								"AND siswa_kelas.kd_siswa = '$swkd' ".
								"AND siswa_kelas.kd_tapel = '$tapelkd' ".
								"AND siswa_kelas.kd_kelas = '$kelkd' ".
								"AND siswa_kelas.kd_program = '$progkd' ".
								"AND siswa_kelas.kd_ruang = '$rukd' ".
								"AND ulangan_harian.kd_smt = '$smtkd' ".
								"AND ulangan_harian.kd_mapel = '$mapelkd' ".
								"AND ulangan_harian.kd_aspek = '$d_aspekkd' ".
								"AND ulangan_harian.nilkd LIKE '$ulx%'");
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

		echo '<td align="center">'.$ulxy.'</td>
		</tr>';
		}
	while ($data = mysql_fetch_assoc($result));

	echo '</table>
	<table border="0" cellspacing="0" cellpadding="1">
    <tr>
	<td>'.$pagelist.'</td>
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