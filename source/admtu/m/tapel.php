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
$filenya = "tapel.php";
$diload = "document.formx.tahun1.focus();";
$judul = "Tahun Pelajaran";
$judulku = "[$tu_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika batal
if ($HTTP_POST_VARS['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	}
	
	
	
//jika edit
if ($s == "edit")
	{
	//nilai
	$kdx = nosql($_REQUEST['kd']);
	
	//query
	$qx = mysql_query("SELECT * FROM m_tapel ".
						"WHERE kd = '$kdx'");
	$rowx = mysql_fetch_assoc($qx);
						
	$tahun1 = nosql($rowx['tahun1']);
	$tahun2 = nosql($rowx['tahun2']);
	}
	
	
	
//jika simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$kd = nosql($_POST['kd']);
	$tahun1 = nosql($_POST['tahun1']);
	$tahun2 = nosql($_POST['tahun2']);
		
	//nek null
	if ((empty($tahun1)) OR (empty($tahun2)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		pekem($pesan,$filenya);
		}
	else
		{ //cek
		$qcc = mysql_query("SELECT * FROM m_tapel ".
								"WHERE tahun1 = '$tahun1' ".
								"AND tahun2 = '$tahun2'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		//nek ada
		if ($tcc != 0)
			{
			$pesan = "Tahun Pelajaran : $tahun1/$tahun2, Sudah Ada. Silahkan Ganti Yang Lain...!!";
			pekem($pesan,$filenya);
			}
		else
			{
			//jika baru
			if (empty($s))
				{	
				//query
				mysql_query("INSERT INTO m_tapel(kd, tahun1, tahun2) VALUES ".
								"('$x', '$tahun1', '$tahun2')");
				
				//re-direct
				xloc($filenya);
				}
	
			//jika update
			else if ($s == "edit")
				{
				//query
				mysql_query("UPDATE m_tapel SET tahun1 = '$tahun1', ".
								"tahun2 = '$tahun2' ".
								"WHERE kd = '$kd'");
				
				//re-direct
				xloc($filenya);
				}
			}
		}
	}


//jika hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);

	//ambil semua
	for ($i=1; $i<=$jml;$i++) 
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);
	
		//del
		mysql_query("DELETE FROM m_tapel ".
						"WHERE kd = '$kd'");
		}

	//re-direct
	xloc($filenya);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//isi *START
ob_start();

//query
$q = mysql_query("SELECT * FROM m_tapel ".
					"ORDER BY tahun1 ASC");
$row = mysql_fetch_assoc($q);
$total = mysql_num_rows($q);

//js
require("../../inc/js/checkall.js"); 
require("../../inc/js/swap.js"); 
require("../../inc/js/number.js"); 
require("../../inc/menu/admtu.php"); 
xheadline($judul);

//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo '<form action="'.$filenya.'" method="post" name="formx">
<p> 
<input name="tahun1" type="text" value="'.$tahun1.'" size="4" maxlength="4" onKeyPress="return numbersonly(this, event)"> / 
<input name="tahun2" type="text" value="'.$tahun2.'" size="4" maxlength="4" onKeyPress="return numbersonly(this, event)">
<input name="btnSMP" type="submit" value="SIMPAN">
<input name="btnBTL" type="submit" value="BATAL">
</p>
<table width="275" border="1" cellspacing="0" cellpadding="3">
<tr valign="top" bgcolor="'.$warnaheader.'">
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><strong><font color="'.$warnatext.'">Tahun Pelajaran</font></strong></td>
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
		$kd = nosql($row['kd']);
		$tahun1 = nosql($row['tahun1']);
		$tahun2 = nosql($row['tahun2']);
		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td width="1%">
		<input type="checkbox" name="item'.$nomer.'" value="'.$kd.'"> 
        </td>
		<td width="4%">
		<a href="'.$filenya.'?s=edit&kd='.$kd.'">
		<img src="'.$sumber.'/img/edit.gif" width="16" height="16" border="0">
		</a>
		</td>
		<td width="86%">'.$tahun1.'/'.$tahun2.'</td>
        </tr>';		 
		} 
	while ($row = mysql_fetch_assoc($q)); 
	}

echo '</table>
<table width="275" border="0" cellspacing="0" cellpadding="3">
<tr> 
<td>
<input name="jml" type="hidden" value="'.$total.'">
<input name="s" type="hidden" value="'.$s.'">
<input name="kd" type="hidden" value="'.$kdx.'"> 
<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$total.')">
<input name="btnBTL" type="reset" value="BATAL">
<input name="btnHPS" type="submit" value="HAPUS">
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