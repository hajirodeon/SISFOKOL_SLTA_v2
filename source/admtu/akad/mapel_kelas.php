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

require("../../inc/config.php"); 
require("../../inc/fungsi.php"); 
require("../../inc/koneksi.php"); 
require("../../inc/cek/admtu.php"); 
$tpl = LoadTpl("../../template/index.html"); 

nocache;

//nilai
$filenya = "mapel_kelas.php";
$judul = "Mata Pelajaran Per Kelas";
$judulku = "[$tu_session : $nip5_session. $nm5_session] ==> $judul";
$judulx = $judul;
$kelkd = nosql($_REQUEST['kelkd']);
$progkd = nosql($_REQUEST['progkd']);
$ke = "$filenya?kelkd=$kelkd&progkd=$progkd";



//focus...
if (empty($kelkd))
	{
	$diload = "document.formx.kelas.focus();";
	}
else if (empty($progkd))
	{
	$diload = "document.formx.program.focus();";
	}



	


//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);
	$mapel = nosql($_POST['mapel']);
		
	//jika null
	if (empty($mapel))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$ke);		
		}
	else
		{
		//cek
		$qcc = mysql_query("SELECT m_mapel_kelas.*, m_mapel.* ".
								"FROM m_mapel_kelas, m_mapel ".
								"WHERE m_mapel_kelas.kd_mapel = m_mapel.kd ".
								"AND m_mapel_kelas.kd_kelas = '$kelkd' ".
								"AND m_mapel_kelas.kd_program = '$progkd' ".
								"AND m_mapel_kelas.kd_mapel = '$mapel'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		$pel = balikin2($rcc['pel']);
		
		//not null
		if ($tcc != 0)
			{
			$pesan = "Mata Pelajaran : $pel, Sudah Ada. Silahkan Ganti Yang Lain...!!";
			pekem($pesan,$ke);
			}
		else
			{
			//query
			mysql_query("INSERT INTO m_mapel_kelas(kd, kd_kelas, kd_program, kd_mapel) VALUES ".
							"('$x', '$kelkd', '$progkd', '$mapel')");
			
			//re-direct
			xloc($ke);
			}
		}
	}


//jika hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);
	$kelkd = nosql($_POST['kelkd']);
	$progkd = nosql($_POST['progkd']);


	//ambil semua
	for ($i=1; $i<=$jml;$i++) 
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);
	
		//del
		mysql_query("DELETE FROM m_mapel_kelas ".
						"WHERE kd = '$kd'");
		}

	//auto-kembali
	xloc($ke);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();

//js
require("../../inc/js/jumpmenu.js"); 
require("../../inc/js/checkall.js"); 
require("../../inc/js/swap.js"); 
require("../../inc/menu/admtu.php"); 
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Kelas : ';
echo "<select name=\"kelas\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbtx = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd = '$kelkd'");
$rowbtx = mysql_fetch_assoc($qbtx);

$btxkd = nosql($rowbtx['kd']);
$btxkelas = nosql($rowbtx['kelas']);

echo '<option value="'.$btxkd.'">'.$btxkelas.'</option>';

//kelas
$qbt = mysql_query("SELECT * FROM m_kelas ".
						"WHERE kd <> '$kelkd' ".
						"ORDER BY no ASC");
$rowbt = mysql_fetch_assoc($qbt);
				
do
	{
	$btkd = nosql($rowbt['kd']);
	$btkelas = nosql($rowbt['kelas']);
	
	echo '<option value="'.$filenya.'?kelkd='.$btkd.'">'.$btkelas.'</option>';
	}
while ($rowbt = mysql_fetch_assoc($qbt));

echo '</select>, 

Program : ';
echo "<select name=\"program\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qbpx = mysql_query("SELECT * FROM m_program ".
						"WHERE kd = '$progkd'");
$rowbpx = mysql_fetch_assoc($qbpx);

$bpxkd = nosql($rowbpx['kd']);
$bpxprog = balikin($rowbpx['program']);

echo '<option value="'.$bpxkd.'">'.$bpxprog.'</option>';

//program
$qbp = mysql_query("SELECT * FROM m_program ".
						"WHERE kd <> '$progkd'");
$rowbp = mysql_fetch_assoc($qbp);
				
do
	{
	$bpkd = nosql($rowbp['kd']);
	$bpprog = balikin($rowbp['program']);
	
	echo '<option value="'.$filenya.'?kelkd='.$kelkd.'&progkd='.$bpkd.'">'.$bpprog.'</option>';
	}
while ($rowbp = mysql_fetch_assoc($qbp));

echo '</select>
</td>
</tr>
</table>
<br>';


//nek blm
if (empty($kelkd))
	{
	echo '<strong><font color="#FF0000">KELAS Belum Dipilih...!</font></strong>';
	}
else if (empty($progkd))
	{
	echo '<strong><font color="#FF0000">PROGRAM Belum Dipilih...!</font></strong>';
	}
else 
	{
	//query
	$q = mysql_query("SELECT m_mapel_kelas.*, m_mapel_kelas.kd AS mmkd, ".
						"m_mapel.* ".
						"FROM m_mapel_kelas, m_mapel ".
						"WHERE m_mapel_kelas.kd_mapel = m_mapel.kd ".
						"AND m_mapel_kelas.kd_kelas = '$kelkd' ".
						"AND m_mapel_kelas.kd_program = '$progkd' ".
						"ORDER BY round(m_mapel.no, m_mapel.no_sub) ASC");
	$row = mysql_fetch_assoc($q);	
	$total = mysql_num_rows($q);

	echo '<select name="mapel">
    <option value="" selected>-TAMBAH MATA PELAJARAN-</option>';
	
	//mapel
	$qsp = mysql_query("SELECT * FROM m_mapel ".
							"ORDER BY pel,no ASC");
	$rowsp = mysql_fetch_assoc($qsp);
				
	do
		{
		$spkd = nosql($rowsp['kd']);
		$spaspek = balikin2($rowsp['pel']);
		
		echo '<option value="'.$spkd.'">'.$spaspek.'</option>';
        }
	while ($rowsp = mysql_fetch_assoc($qsp));
	
	echo '</select>
	<input name="btnSMP" type="submit" value="&gt;&gt;&gt;">
	<table width="500" border="1" cellpadding="3" cellspacing="0">
	<tr valign="top" bgcolor="'.$warnaheader.'"> 
	<td>&nbsp;</td>
	<td><strong><font color="'.$warnatext.'">Nama Mata Pelajaran</font></strong></td>
    </tr>';
	
	if ($total != 0)
		{
		do { 
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
			$mmkd = nosql($row['mmkd']);
			$pel = balikin2($row['pel']);
		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td width="20">
		<input type="checkbox" name="item'.$nomer.'" value="'.$mmkd.'">
		</td>
		<td>'.$pel.'</td>
		</tr>';
		} 
	while ($row = mysql_fetch_assoc($q)); 
	}

	echo '</table>
	<table width="500" border="0" cellspacing="0" cellpadding="3">
	<tr> 
	<td width="326">
	<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$total.')">
	<input name="btnBTL" type="reset" value="BATAL">
	<input name="btnHPS" type="submit" value="HAPUS">
	<input name="jml" type="hidden" value="'.$total.'">
	<input name="kelkd" type="hidden" value="'.$kelkd.'">
	<input name="progkd" type="hidden" value="'.$progkd.'">
	</td>
	<td align="right">Total : <strong><font color="#FF0000">'.$total.'</font></strong> Data.</td>
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