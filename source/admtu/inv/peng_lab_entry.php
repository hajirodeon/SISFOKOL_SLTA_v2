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
$filenya = "peng_lab_entry.php";
$judul = "Entry Penggunaan Lab.";
$judulku = "[$tu_session : $nip5_session. $nm5_session] ==> $judul";
$judulx = $judul;


//focus
$diload = "document.formx.lab.focus();";

	







//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($HTTP_POST_VARS['btnBTL'])
	{
	$ke = "peng_lab.php";
	xloc($ke);
	}
	
	
	
	
	
//nek simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$lab = nosql($_POST['lab']);
	$jam = nosql($_POST['jam']);
	$program = nosql($_POST['program']);
	$kelas = nosql($_POST['kelas']);
	$ruang = nosql($_POST['ruang']);
	
	
	//tgl. penggunaan
	$p_tgl = nosql($_POST['p_tgl']);
	$p_bln = nosql($_POST['p_bln']);
	$p_thn = nosql($_POST['p_thn']);
	$tgl_p = "$p_thn:$p_bln:$p_tgl";
		
	
	//nek null
	if ((empty($lab)) OR (empty($p_tgl)) OR (empty($p_bln)) OR (empty($p_thn)) OR (empty($jam)) 
	OR (empty($program)) OR (empty($kelas)) OR (empty($ruang)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		}
	else
		{
		//cek
		$qcc = mysql_query("SELECT * FROM inv_peng_lab ".
								"WHERE kd_lab = '$lab' ".
								"AND tgl = '$tgl_p' ".
								"AND kd_jam = '$jam' ".
								"AND kd_program = '$program' ".
								"AND kd_kelas = '$kelas' ".
								"AND kd_ruang = '$ruang'");	
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		//nek ada
		if ($tcc != 0)
			{
			$pesan = "LAB. Telah Digunakan. Harap Diganti Yang Lain...!!";
			pekem($pesan,$filenya);
			}
		else
			{
			//insert baru
			mysql_query("INSERT INTO inv_peng_lab(kd, kd_lab, tgl, kd_jam, kd_program, kd_kelas, kd_ruang) VALUES ".
							"('$x', '$lab', '$tgl_p', '$jam', '$program', '$kelas', '$ruang')");
			
			//re-direct
			$ke = "peng_lab.php";
			xloc($ke);
			}
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();


//js
require("../../inc/js/jumpmenu.js"); 
require("../../inc/js/number.js");
require("../../inc/menu/admtu.php"); 


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">';
xheadline($judul);
echo ' [<a href="peng_lab.php" title="Daftar Penggunaan Lab.">Daftar Penggunaan</a>]';

//nilai - nilai tgl
$qnilp = mysql_query("SELECT DATE_FORMAT(inv_peng_peraga.tgl_pinjam, '%d') AS p_tgl, ".
						"DATE_FORMAT(inv_peng_peraga.tgl_pinjam, '%m') AS p_bln, ".
						"DATE_FORMAT(inv_peng_peraga.tgl_pinjam, '%Y') AS p_thn, ".
						"DATE_FORMAT(inv_peng_peraga.tgl_kembali, '%d') AS k_tgl, ".
						"DATE_FORMAT(inv_peng_peraga.tgl_kembali, '%m') AS k_bln, ".
						"DATE_FORMAT(inv_peng_peraga.tgl_kembali, '%Y') AS k_thn, ".
						"inv_peng_peraga.* ".
						"FROM inv_peng_peraga ".
						"WHERE inv_peng_peraga.kd_guru = '$grkd' ".
						"AND inv_peng_peraga.kd = '$pjkd'");
$rnilp = mysql_fetch_assoc($qnilp);
$nilp_ptgl = nosql($rnilp['p_tgl']);
$nilp_pbln = nosql($rnilp['p_bln']);
$nilp_pthn = nosql($rnilp['p_thn']);
$nilp_ktgl = nosql($rnilp['k_tgl']);
$nilp_kbln = nosql($rnilp['k_bln']);
$nilp_kthn = nosql($rnilp['k_thn']);	
	
	
//penggunaan lab
echo '<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Lab. : 
<br>
<select name="lab">
<option value="" selected></option>';

//lab
$qlab = mysql_query("SELECT * FROM inv_lab ".
						"ORDER BY lab ASC");
$rlab = mysql_fetch_assoc($qlab);

do
	{
	$lab_kd = nosql($rlab['kd']);
	$lab_nm = balikin($rlab['lab']);	
	
	echo '<option value="'.$lab_kd.'">'.$lab_nm.'</option>';
	}
while ($rlab = mysql_fetch_assoc($qlab));
	
echo '</select>
<br>
<br>
Tgl. Penggunaan : 
<br>
<select name="p_tgl">
<option value="'.$nilp_ptgl.'" selected>'.$nilp_ptgl.'</option>';
for ($i=1;$i<=31;$i++)
	{
	echo '<option value="'.$i.'">'.$i.'</option>';
	}
	
echo '</select>
<select name="p_bln">
<option value="'.$nilp_pbln.'" selected>'.$arrbln1[$nilp_pbln].'</option>';
for ($j=1;$j<=12;$j++)
	{
	echo '<option value="'.$j.'">'.$arrbln[$j].'</option>';
	}
		
echo '</select>
<select name="p_thn">
<option value="'.$nilp_pthn.'" selected>'.$nilp_pthn.'</option>';
for ($k=$pinjam01;$k<=$pinjam02;$k++)
	{
	echo '<option value="'.$k.'">'.$k.'</option>';
	}
echo '</select>, 

<br>
<br>
Jam Ke- : 
<br>
<select name="jam">
<option value="" selected></option>';

//jam
$qjam = mysql_query("SELECT * FROM m_jam ".
						"ORDER BY round(jam) ASC");
$rjam = mysql_fetch_assoc($qjam);

do
	{
	$jam_kd = nosql($rjam['kd']);
	$jam_nm = nosql($rjam['jam']);	
	
	echo '<option value="'.$jam_kd.'">'.$jam_nm.'</option>';
	}
while ($rjam = mysql_fetch_assoc($qjam));
	
echo '</select>

<br>
<br>
Program : 
<br>
<select name="program">
<option value="" selected></option>';

//program
$qpro = mysql_query("SELECT * FROM m_program ".
						"ORDER BY program ASC");
$rpro = mysql_fetch_assoc($qpro);

do
	{
	$pro_kd = nosql($rpro['kd']);
	$pro_nm = balikin($rpro['program']);	
	
	echo '<option value="'.$pro_kd.'">'.$pro_nm.'</option>';
	}
while ($rpro = mysql_fetch_assoc($qpro));
	
echo '</select>


<br>
<br>
Kelas : 
<br>
<select name="kelas">
<option value="" selected></option>';

//kelas
$qkel = mysql_query("SELECT * FROM m_kelas ".
						"ORDER BY kelas ASC");
$rkel = mysql_fetch_assoc($qkel);

do
	{
	$kel_kd = nosql($rkel['kd']);
	$kel_nm = nosql($rkel['kelas']);	
	
	echo '<option value="'.$kel_kd.'">'.$kel_nm.'</option>';
	}
while ($rkel = mysql_fetch_assoc($qkel));
	
echo '</select>



<br>
<br>
Ruang : 
<br>
<select name="ruang">
<option value="" selected></option>';

//ruang
$qru = mysql_query("SELECT * FROM m_ruang ".
						"ORDER BY ruang ASC");
$rru = mysql_fetch_assoc($qru);

do
	{
	$ru_kd = nosql($rru['kd']);
	$ru_nm = balikin($rru['ruang']);	
	
	echo '<option value="'.$ru_kd.'">'.$ru_nm.'</option>';
	}
while ($rru = mysql_fetch_assoc($qru));
	
echo '</select>
<br>
<br>	
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</td>
</tr>
</table>
</form>
<br>
<br>
<br>';
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");
?>