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
$filenya = "peng_alat_entry.php";
$judul = "Entry Penggunaan Alat Peraga";
$judulku = "[$tu_session : $nip5_session. $nm5_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$grkd = nosql($_REQUEST['grkd']);
$pjkd = nosql($_REQUEST['pjkd']);




//focus
if (empty($grkd))
	{
	$diload = "document.formx.gr.focus();";
	}
else if (empty($s))
	{
	$diload = "document.formx.p_tgl.focus();";
	}
else if ($s == "detail")
	{
	$diload = "document.formx.alat.focus();";
	}

	







//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$pjkd = nosql($_POST['pjkd']);
	$grkd = nosql($_POST['grkd']);
	$s = nosql($_POST['s']);
	
	//tgl. pinjam
	$p_tgl = nosql($_POST['p_tgl']);
	$p_bln = nosql($_POST['p_bln']);
	$p_thn = nosql($_POST['p_thn']);
	$tgl_p = "$p_thn:$p_bln:$p_tgl";
	
	//tgl. kembali
	$k_tgl = nosql($_POST['k_tgl']);
	$k_bln = nosql($_POST['k_bln']);
	$k_thn = nosql($_POST['k_thn']);
	$tgl_k = "$k_thn:$k_bln:$k_tgl";
	
	//cek
	$qcc = mysql_query("SELECT * FROM inv_peng_peraga ".
							"WHERE kd_guru = '$grkd' ".
							"AND kd = '$pjkd'");	
	$rcc = mysql_fetch_assoc($qcc);
	$tcc = mysql_num_rows($qcc);
	
	//nek ada
	if ($tcc != 0)
		{
		//update tgl. kembali saja
		mysql_query("UPDATE inv_peng_peraga SET tgl_pinjam = '$tgl_p', ".
						"tgl_kembali = '$tgl_k' ".
						"WHERE kd_guru = '$grkd' ".
						"AND kd = '$pjkd'");
		
		//re-direct
		$ke = "$filenya?grkd=$grkd&pjkd=$pjkd&s=detail";
		xloc($ke);
		}
	else
		{
		//insert baru
		mysql_query("INSERT INTO inv_peng_peraga(kd, kd_guru, tgl_pinjam, tgl_kembali) VALUES ".
						"('$x', '$grkd', '$tgl_p', '$tgl_k')");
		
		//re-direct
		$ke = "$filenya?grkd=$grkd&pjkd=$x&s=detail";
		xloc($ke);
		}
	}





//nek tambah
if ($HTTP_POST_VARS['btnTBH'])
	{
	//nilai
	$pjkd = nosql($_POST['pjkd']);
	$grkd = nosql($_POST['grkd']);
	$alat = nosql($_POST['alat']);
	$jumlah = nosql($_POST['jumlah']);
	
	//cek
	$qcc = mysql_query("SELECT * FROM inv_peng_peraga_item ".
							"WHERE kd_peng_peraga = '$pjkd' ".
							"AND kd_alat = '$alat'");
	$rcc = mysql_fetch_assoc($qcc);
	$tcc = mysql_num_rows($qcc);
	
	//nek ada
	if ($tcc != 0)
		{
		$pesan = "Alat Peraga Tersebut, Sudah Ada. Ganti Yang Lain.";
		$ke = "$filenya?grkd=$grkd&pjkd=$pjkd&s=detail";
		pekem($pesan,$ke);
		}
	
	else
		{
		//jumlah yg ada di stock
		$qsty = mysql_query("SELECT * FROM inv_alat_peraga ".
								"WHERE kd = '$alat'");
		$rsty = mysql_fetch_assoc($qsty);
		$sty_jml = nosql($rsty['jumlah']);
		
		//nek melebihi
		if ($jumlah > $sty_jml)
			{
			$pesan = "Jumlah Alat Peraga Yang Akan Dipinjam, Tidak Mencukupi Dari Jumlah Yang Ada. ".
						"Harap Diperhatikan...!!";
			$ke = "$filenya?grkd=$grkd&pjkd=$pjkd&s=detail";
			pekem($pesan,$ke);
			}
		
		else
			{
			//baru
			mysql_query("INSERT INTO inv_peng_peraga_item(kd, kd_peng_peraga, kd_alat, jumlah) VALUES ".
							"('$x', '$pjkd', '$alat', '$jumlah')");
			
			//re-direct
			$ke = "$filenya?grkd=$grkd&pjkd=$pjkd&s=detail";
			xloc($ke);
			}
		}	
	}





//nek hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	//ambil nilai
	$total = nosql($_POST['total']);
	$grkd = nosql($_POST['grkd']);
	$pjkd = nosql($_POST['pjkd']);

	//ambil semua
	for ($i=1; $i<=$total;$i++) 
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);
	
		//del
		mysql_query("DELETE FROM inv_peng_peraga_item ".
						"WHERE kd = '$kd'");
		}

	//re-direct
	$ke = "$filenya?grkd=$grkd&pjkd=$pjkd&s=detail";
	xloc($ke);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();


//js
require("../../inc/js/jumpmenu.js"); 
require("../../inc/js/number.js");
require("../../inc/js/checkall.js"); 
require("../../inc/js/swap.js"); 
require("../../inc/menu/admtu.php"); 


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">';
xheadline($judul);
echo ' [<a href="peng_alat.php" title="Daftar Penggunaan Alat Peraga">Daftar Penggunaan</a>]
<table bgcolor="'.$warnaover.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
Guru Peminjam : ';
echo "<select name=\"gr\" onChange=\"MM_jumpMenu('self',this,0)\">";

//terpilih
$qstx = mysql_query("SELECT * FROM m_pegawai ".
						"WHERE kd = '$grkd'");
$rowstx = mysql_fetch_assoc($qstx);
$stx_kd = nosql($rowstx['kd']);
$stx_nip = nosql($rowstx['nip']);
$stx_nama = nosql($rowstx['nama']);


echo '<option value="'.$stx_kd.'" selected>'.$stx_nip.'. '.$stx_nama.'</option>';

$qst = mysql_query("SELECT DISTINCT(m_pegawai.kd) AS mpkd ".
						"FROM m_pegawai, m_guru ".
						"WHERE m_pegawai.kd = m_guru.kd_pegawai ".
						"AND m_pegawai.kd <> '$grkd' ".
						"ORDER BY m_pegawai.nip ASC");
$rowst = mysql_fetch_assoc($qst);
				
do
	{
	$st_kd = nosql($rowst['mpkd']);
	
	//detail
	$qtru = mysql_query("SELECT * FROM m_pegawai ".
							"WHERE kd = '$st_kd'");
	$rtru = mysql_fetch_assoc($qtru);
		
	$st_nip = nosql($rtru['nip']);
	$st_nama = nosql($rtru['nama']);
	
	echo '<option value="'.$filenya.'?grkd='.$st_kd.'">'.$st_nip.'. '.$st_nama.'</option>';
	}
while ($rowst = mysql_fetch_assoc($qst));

echo '</select>
</td>
</tr>
</table>';

//nek blm
if (empty($grkd))
	{
	echo '<strong><font color="#FF0000">GURU Peminjam Belum Dipilih...!</font></strong>';
	}
else
	{
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
	
	
	//tgl. pinjam
	echo '<table bgcolor="'.$warna02.'" width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
	<td>	
	Tgl. Pinjam : 
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
	echo '</select>, ';

	
	
	//tgl. kembali
	echo 'Tgl. Kembali : 
	<select name="k_tgl">
	<option value="'.$nilp_ktgl.'" selected>'.$nilp_ktgl.'</option>';
	for ($i=1;$i<=31;$i++)
		{
		echo '<option value="'.$i.'">'.$i.'</option>';
		}
		
	echo '</select>
	<select name="k_bln">
	<option value="'.$nilp_kbln.'" selected>'.$arrbln1[$nilp_kbln].'</option>';
	for ($j=1;$j<=12;$j++)
		{
		echo '<option value="'.$j.'">'.$arrbln[$j].'</option>';
		}
		
	echo '</select>
	<select name="k_thn">
	<option value="'.$nilp_kthn.'" selected>'.$nilp_kthn.'</option>';
	for ($k=$pinjam01;$k<=$pinjam02;$k++)
		{
		echo '<option value="'.$k.'">'.$k.'</option>';
		}
	echo '</select>
	<input name="grkd" type="hidden" value="'.$grkd.'">
	<input name="s" type="hidden" value="'.$s.'">
	<input name="pjkd" type="hidden" value="'.$pjkd.'">
	<input name="btnSMP" type="submit" value="SIMPAN & DETAIL >>">
	</td>
	</tr>
	</table>
	<br><br><br>';
	
	
	//koleksi alat peraga
	if ($s == "detail")
		{
		echo 'Alat Peraga : 
		<select name="alat">
		<option value="" selected></option>';
		
		$qlatu = mysql_query("SELECT * FROM inv_alat_peraga ".
								"ORDER BY alat_peraga ASC");
		$rlatu = mysql_fetch_assoc($qlatu);
						
		do
			{
			$latu_kd = nosql($rlatu['kd']);
			$latu_nm = balikin($rlatu['alat_peraga']);
		
			echo '<option value="'.$latu_kd.'">'.$latu_nm.'</option>';
			}
		while ($rlatu = mysql_fetch_assoc($qlatu));
		
		echo '</select>, 
		Jumlah :
		<input name="jumlah" type="text" value="" size="5" onKeyPress="return numbersonly(this, event)">
		<input name="btnTBH" type="submit" value="TAMBAH >>">';
		
		
		//data item yg ada
		$qede = mysql_query("SELECT inv_peng_peraga_item.*, inv_peng_peraga_item.kd AS ikd, ".
								"inv_peng_peraga_item.jumlah AS ijml, inv_alat_peraga.* ".
								"FROM inv_peng_peraga_item, inv_alat_peraga ".
								"WHERE inv_peng_peraga_item.kd_alat = inv_alat_peraga.kd ".
								"AND inv_peng_peraga_item.kd_peng_peraga = '$pjkd'");
		$rede = mysql_fetch_assoc($qede);
		$tede = mysql_num_rows($qede);
		
		
		echo '<table width="500" border="1" cellspacing="0" cellpadding="3">
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<td width="1">&nbsp;</td>
		<td><strong><font color="'.$warnatext.'">Nama Alat</font></strong></td>
		<td width="50"><strong><font color="'.$warnatext.'">Jumlah</font></strong></td>
		</tr>';
		
		if ($tede != 0)
			{
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
				$kd = nosql($rede['ikd']);
				$alat_peraga = balikin2($rede['alat_peraga']);
				$jml = nosql($rede['ijml']);
			
				echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
				echo '<td> 
				<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'"> 
		        </td>
				<td>'.$alat_peraga.'</td>
				<td>'.$jml.'</td>
		        </tr>';				
				} 
			while ($rede = mysql_fetch_assoc($qede)); 
			}
		
		echo '</table>
		<input name="total" type="hidden" value="'.$tede.'">
		<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$tede.')"> 
		<input name="btnBTL" type="reset" value="BATAL"> 
		<input name="btnHPS" type="submit" value="HAPUS">';
		}
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