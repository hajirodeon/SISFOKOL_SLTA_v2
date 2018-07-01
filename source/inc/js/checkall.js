<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
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

function checkAll(x) 
	{
	for (var j = 1; j <= x; j++) 
		{
		box = eval("document.formx.item" + j); 
		if (box.checked == false) box.checked = true;
		}
	}

function uncheckAll(x) 
	{
	for (var j = 1; j <= x; j++) 
		{
		box = eval("document.formx.item" + j); 
		if (box.checked == true) box.checked = false;
	   }
	}


//  End -->
</script>