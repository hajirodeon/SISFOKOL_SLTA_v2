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
require("../../inc/cek/admwk.php");
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/index.html"); 


nocache;

//nilai
$filenya = "raport.php";
$swkd = nosql($_REQUEST['swkd']);
$tapelkd = nosql($_REQUEST['tapelkd']);
$smtkd = nosql($_REQUEST['smtkd']);
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$rukd = nosql($_REQUEST['rukd']);
$smt = nosql($_REQUEST['smt']);
$jns = nosql($_REQUEST['jns']);
$s = nosql($_REQUEST['s']);

$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}
	
$ke = "$filenya?tapelkd=$tapelkd&smtkd=$smtkd&kelkd=$kelkd&progkd=$progkd&".
			"rukd=$rukd&smt=$smt&jns=$jns&page=$page";


//siswa ne
$qsiw = mysql_query("SELECT * FROM m_siswa ".
						"WHERE kd = '$swkd'");
$rsiw = mysql_fetch_assoc($qsiw);
$siw_nis = nosql($rsiw['nis']);
$siw_nama = balikin($rsiw['nama']);

$judul = "Raport Siswa : ($siw_nis).$siw_nama";
$judulku = "[$wk_session : $nip3_session.$nm3_session] ==> $judul";
$judulz = $judul;


//focus
if (empty($smtkd))
	{
	$diload = "document.formx.smt.focus();";
	}
else if (empty($jns))
	{
	$diload = "document.formx.jns.focus();";
	}




//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js");
require("../../inc/js/swap.js");
require("../../inc/menu/admwk.php");

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

echo '<table width="100%" bgcolor="'.$warnaover.'" cellspacing="0" cellpadding="3">
<tr valign="top">
<td>
<strong>Tahun Pelajaran :</strong> '.$pel_thn1.'/'.$pel_thn2.', 
<strong>Kelas :</strong> '.$kel_kelas.',
<strong>Program :</strong> '.$pro_program.',
<strong>Ruang :</strong> '.$ru_ruang.'
</td>
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

echo '<option value="'.nosql($rowstx['kd']).'">'.nosql($rowstx['smt']).'</option>';

$qst = mysql_query("SELECT * FROM m_smt ".
						"WHERE kd <> '$smtkd' ".
						"ORDER BY smt ASC");
$rowst = mysql_fetch_assoc($qst);
				
do
	{
	echo '<option value="'.$filenya.'?swkd='.$swkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&smtkd='.$rowst[kd].'&smt='.$rowst[smt].'">'.nosql($rowst['smt']).'</option>';
	}
while ($rowst = mysql_fetch_assoc($qst));

echo '</select>, Jenis : ';
echo "<select name=\"jns\" onChange=\"MM_jumpMenu('self',this,0)\">";
echo '<option value="'.nosql($jns).'">';

//terpilih
if ($jns == "1")
	{
	echo "Raport Sisipan";
	}
else if ($jns == "2")
	{
	echo "Raport Akhir Semester";
	}	

echo '</option>
<option value="'.$filenya.'?swkd='.$swkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&smtkd='.$smtkd.'&smt='.$smt.'&jns=1">Raport Sisipan</option>
<option value="'.$filenya.'?swkd='.$swkd.'&tapelkd='.$tapelkd.'&kelkd='.$kelkd.'&progkd='.$progkd.'&rukd='.$rukd.'&smtkd='.$smtkd.'&smt='.$smt.'&jns=2">Raport Akhir Semester</option>
</select>
</td>
</tr>
</table>';


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

else if (empty($jns))
	{
	echo '<font color="#FF0000"><strong>JENIS Belum Dipilih...!</strong></font>';
	}
	
else
	{
	echo '<table width="100%" cellpadding="3" cellspacing="0">
    <tr>
	<td>
	[<a href="';
	$redir = "raport$jns";
	$redir1 = "_pdf";
	echo "$redir$redir1.php?swkd=$swkd&kelkd=$kelkd&progkd=$progkd&rukd=$rukd&tapelkd=$tapelkd&smtkd=$smtkd";
	echo '" target="_blank"><img src="'.$sumber.'/img/pdf.gif" width="16" height="16" border="0"></a>]
	</td>
	</tr>
	</table>';
	}

echo '</form>
<br>
<br>
<br>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////

//isi
$isi = ob_get_contents();
ob_end_clean();


require("../../inc/niltpl.php");
?>