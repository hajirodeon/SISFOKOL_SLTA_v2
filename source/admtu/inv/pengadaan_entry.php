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
$filenya = "pengadaan_entry.php";
$judul = "Entry Pengadaan";
$judulku = "[$tu_session : $nip5_session. $nm5_session] ==> $judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$pgkd = nosql($_REQUEST['pgkd']);




//focus
if (empty($s))
	{
	$diload = "document.formx.t_tgl.focus();";
	}
else if ($s == "detail")
	{
	$diload = "document.formx.d_nm_brg.focus();";
	}

	







//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek simpan
if ($HTTP_POST_VARS['btnSMP'])
	{
	//nilai
	$pgkd = nosql($_POST['pgkd']);
	$s = nosql($_POST['s']);
	$dari = cegah2($_POST['dari']);
	$untuk = cegah2($_POST['untuk']);
	$ket = cegah2($_POST['ket']);
	
	
	//tgl. terima
	$t_tgl = nosql($_POST['t_tgl']);
	$t_bln = nosql($_POST['t_bln']);
	$t_thn = nosql($_POST['t_thn']);
	$tgl_t = "$t_thn:$t_bln:$t_tgl";
	
	//tgl. beli
	$b_tgl = nosql($_POST['b_tgl']);
	$b_bln = nosql($_POST['b_bln']);
	$b_thn = nosql($_POST['b_thn']);
	$tgl_b = "$b_thn:$b_bln:$b_tgl";
	
	//tgl. pakai
	$p_tgl = nosql($_POST['p_tgl']);
	$p_bln = nosql($_POST['p_bln']);
	$p_thn = nosql($_POST['p_thn']);
	$tgl_p = "$p_thn:$p_bln:$p_tgl";
	
	
	//nek null
	if ((empty($t_tgl)) OR (empty($t_bln)) OR (empty($t_thn)) OR (empty($b_tgl)) OR (empty($t_bln)) OR (empty($t_thn)) 
	OR (empty($p_tgl)) OR (empty($p_bln)) OR (empty($p_thn)) OR (empty($dari)) OR (empty($untuk)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		$ke = "$filenya?pgkd=$pgkd&s=detail";
		pekem($pesan,$ke);
		}
	else
		{
		//cek
		$qcc = mysql_query("SELECT * FROM inv_pengadaan ".
								"WHERE kd = '$pgkd'");	
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		//nek ada
		if ($tcc != 0)
			{
			//update 
			mysql_query("UPDATE inv_pengadaan SET tgl_terima = '$tgl_t', ".
							"tgl_beli = '$tgl_b', ".
							"tgl_pakai = '$tgl_p', ".
							"dari = '$dari', ".
							"untuk = '$untuk', ".
							"ket = '$ket' ".
							"WHERE kd = '$pgkd'");
			
			//re-direct
			$ke = "$filenya?pgkd=$pgkd&s=detail";
			xloc($ke);
			}
		else
			{
			//insert baru
			mysql_query("INSERT INTO inv_pengadaan(kd, tgl_terima, tgl_beli, tgl_pakai, dari, untuk, ket) VALUES ".
							"('$x', '$tgl_t', '$tgl_b', '$tgl_p', '$dari', '$untuk', '$ket')");
			
			//re-direct
			$ke = "$filenya?pgkd=$x&s=detail";
			xloc($ke);
			}
		}
	}





//nek tambah
if ($HTTP_POST_VARS['btnTBH'])
	{
	//nilai
	$pgkd = nosql($_POST['pgkd']);
	$nm_brg = cegah2($_POST['d_nm_brg']);
	$jumlah = nosql($_POST['d_jumlah']);
	$hrg = nosql($_POST['d_hrg']);
	$total = nosql($_POST['d_total']);
	
	//nek null
	if ((empty($nm_brg)) OR (empty($jumlah)) OR (empty($hrg)))
		{
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		$ke = "$filenya?pgkd=$pgkd&s=detail";
		pekem($pesan,$ke);
		}
	else
		{		
		//cek
		$qcc = mysql_query("SELECT * FROM inv_pengadaan_item ".
								"WHERE kd_pengadaan = '$pgkd' ".
								"AND nm_barang = '$nm_brg'");
		$rcc = mysql_fetch_assoc($qcc);
		$tcc = mysql_num_rows($qcc);
		
		//nek ada
		if ($tcc != 0)
			{
			$pesan = "Barang Tersebut, Sudah Ada. Ganti Yang Lain.";
			$ke = "$filenya?pgkd=$pgkd&s=detail";
			pekem($pesan,$ke);
			}
		
		else
			{
			//baru
			mysql_query("INSERT INTO inv_pengadaan_item(kd, kd_pengadaan, nm_barang, jumlah, harga, total) VALUES ".
							"('$x', '$pgkd', '$nm_brg', '$jumlah', '$hrg', '$total')");
				
			//re-direct
			$ke = "$filenya?pgkd=$pgkd&s=detail";
			xloc($ke);
			}	
		}
	}





//nek hapus
if ($HTTP_POST_VARS['btnHPS'])
	{
	//ambil nilai
	$total = nosql($_POST['total']);
	$pgkd = nosql($_POST['pgkd']);

	//ambil semua
	for ($i=1; $i<=$total;$i++) 
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);
	
		//del
		mysql_query("DELETE FROM inv_pengadaan_item ".
						"WHERE kd = '$kd'");
		}

	//re-direct
	$ke = "$filenya?pgkd=$pgkd&s=detail";
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
echo ' [<a href="pengadaan.php" title="Daftar Pengadaan">Daftar Pengadaan</a>]';


//detail terpilih
$qnilp = mysql_query("SELECT DATE_FORMAT(inv_pengadaan.tgl_terima, '%d') AS t_tgl, ".
							"DATE_FORMAT(inv_pengadaan.tgl_terima, '%m') AS t_bln, ".
							"DATE_FORMAT(inv_pengadaan.tgl_terima, '%Y') AS t_thn, ".
							"DATE_FORMAT(inv_pengadaan.tgl_beli, '%d') AS b_tgl, ".
							"DATE_FORMAT(inv_pengadaan.tgl_beli, '%m') AS b_bln, ".
							"DATE_FORMAT(inv_pengadaan.tgl_beli, '%Y') AS b_thn, ".
							"DATE_FORMAT(inv_pengadaan.tgl_pakai, '%d') AS p_tgl, ".
							"DATE_FORMAT(inv_pengadaan.tgl_pakai, '%m') AS p_bln, ".
							"DATE_FORMAT(inv_pengadaan.tgl_pakai, '%Y') AS p_thn, ".
							"inv_pengadaan.* ".
							"FROM inv_pengadaan ".
							"WHERE kd = '$pgkd'");
$rnilp = mysql_fetch_assoc($qnilp);
$nilp_ttgl = nosql($rnilp['t_tgl']);
$nilp_tbln = nosql($rnilp['t_bln']);
$nilp_tthn = nosql($rnilp['t_thn']);
$nilp_btgl = nosql($rnilp['b_tgl']);
$nilp_bbln = nosql($rnilp['b_bln']);
$nilp_bthn = nosql($rnilp['b_thn']);
$nilp_ptgl = nosql($rnilp['p_tgl']);
$nilp_pbln = nosql($rnilp['p_bln']);
$nilp_pthn = nosql($rnilp['p_thn']);
$nilp_dari = balikin($rnilp['dari']);
$nilp_untuk = balikin($rnilp['untuk']);
$nilp_ket = balikin($rnilp['ket']);



	
//tgl. terima
echo '<table bgcolor="'.$warna02.'" width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>	
Tgl. Terima : 
<select name="t_tgl">
<option value="'.$nilp_ttgl.'" selected>'.$nilp_ttgl.'</option>';
for ($i=1;$i<=31;$i++)
	{
	echo '<option value="'.$i.'">'.$i.'</option>';
	}
		
echo '</select>
<select name="t_bln">
<option value="'.$nilp_tbln.'" selected>'.$arrbln1[$nilp_tbln].'</option>';
for ($j=1;$j<=12;$j++)
	{
	echo '<option value="'.$j.'">'.$arrbln[$j].'</option>';
	}
	
echo '</select>
<select name="t_thn">
<option value="'.$nilp_tthn.'" selected>'.$nilp_tthn.'</option>';
for ($k=$terima01;$k<=$terima02;$k++)
	{
	echo '<option value="'.$k.'">'.$k.'</option>';
	}
echo '</select>, ';
	
	
//tgl. beli
echo 'Tgl. Beli : 
<select name="b_tgl">
<option value="'.$nilp_btgl.'" selected>'.$nilp_btgl.'</option>';
for ($i=1;$i<=31;$i++)
	{
	echo '<option value="'.$i.'">'.$i.'</option>';
	}
	
echo '</select>
<select name="b_bln">
<option value="'.$nilp_bbln.'" selected>'.$arrbln1[$nilp_bbln].'</option>';
for ($j=1;$j<=12;$j++)
	{
	echo '<option value="'.$j.'">'.$arrbln[$j].'</option>';
	}
	
echo '</select>
<select name="b_thn">
<option value="'.$nilp_bthn.'" selected>'.$nilp_bthn.'</option>';
for ($k=$terima01;$k<=$terima02;$k++)
	{
	echo '<option value="'.$k.'">'.$k.'</option>';
	}
echo '</select>, ';

//tgl. pakai
echo 'Tgl. Pakai : 
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
for ($k=$terima01;$k<=$terima02;$k++)
	{
	echo '<option value="'.$k.'">'.$k.'</option>';
	}
echo '</select>, 
<br>
Dari : 
<input name="dari" type="text" value="'.$nilp_dari.'" size="30">, 
Untuk : 
<input name="untuk" type="text" value="'.$nilp_untuk.'" size="30">, 
Ket. : 
<input name="ket" type="text" value="'.$nilp_ket.'" size="30">, 


<input name="s" type="hidden" value="'.$s.'">
<input name="pgkd" type="hidden" value="'.$pgkd.'">
<input name="btnSMP" type="submit" value="SIMPAN & DETAIL >>">
</td>
</tr>
</table>
<br><br>';
	
	
//koleksi alat peraga
if ($s == "detail")
	{
	echo 'Nama Barang :
	<input name="d_nm_brg" type="text" value="" size="20">, 
	Jumlah :
	<input name="d_jumlah" type="text" value="" size="5" 
	onKeyUp="document.formx.d_total.value=eval(document.formx.d_jumlah.value * document.formx.d_hrg.value);" 
	onKeyPress="return numbersonly(this, event)">,
	<br>
	Harga :
	Rp. <input name="d_hrg" type="text" value="" size="15" 
	onKeyUp="document.formx.d_total.value=eval(document.formx.d_jumlah.value * document.formx.d_hrg.value);" 
	onKeyPress="return numbersonly(this, event)">,00 , 
	Total :
	Rp. <input name="d_total" type="text" value="" size="15" class="input" readonly>,00
	<input name="btnTBH" type="submit" value="TAMBAH >>">';
	
		
	//data item yg ada
	$qede = mysql_query("SELECT * FROM inv_pengadaan_item ".
							"WHERE kd_pengadaan = '$pgkd'");
	$rede = mysql_fetch_assoc($qede);
	$tede = mysql_num_rows($qede);
	
		
	echo '<table width="700" border="1" cellspacing="0" cellpadding="3">
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="1">&nbsp;</td>
	<td><strong><font color="'.$warnatext.'">Nama Barang</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">Jumlah</font></strong></td>
	<td width="150"><strong><font color="'.$warnatext.'">Harga</font></strong></td>
	<td width="150"><strong><font color="'.$warnatext.'">Total</font></strong></td>
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
			$ede_kd = nosql($rede['kd']);
			$ede_nm_brg = balikin2($rede['nm_barang']);
			$ede_jml = nosql($rede['jumlah']);
			$ede_hrg = nosql($rede['harga']);
			$ede_total = nosql($rede['total']);
		
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td> 
			<input type="checkbox" name="item'.$nomer.'" value="'.$ede_kd.'"> 
	        </td>
			<td>'.$ede_nm_brg.'</td>
			<td>'.$ede_jml.'</td>
			<td>'.xduit2($ede_hrg).'</td>
			<td>'.xduit2($ede_total).'</td>
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