<?php require_once('Connections/karya_husada.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO obat (Kode_Obat, Nama_Obat, Keterangan, Harga, Stok) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Kode_Obat'], "text"),
                       GetSQLValueString($_POST['Nama_Obat'], "text"),
                       GetSQLValueString($_POST['Keterangan'], "text"),
                       GetSQLValueString($_POST['Harga'], "text"),
                       GetSQLValueString($_POST['Stok'], "text"));

  mysql_select_db($database_karya_husada, $karya_husada);
  $Result1 = mysql_query($insertSQL, $karya_husada) or die(mysql_error());

  $insertGoTo = "obat_tampil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE obat SET Nama_Obat=%s, Keterangan=%s, Harga=%s, Stok=%s WHERE Kode_Obat=%s",
                       GetSQLValueString($_POST['Nama_Obat'], "text"),
                       GetSQLValueString($_POST['Keterangan'], "text"),
                       GetSQLValueString($_POST['Harga'], "text"),
                       GetSQLValueString($_POST['Stok'], "text"),
                       GetSQLValueString($_POST['Kode_Obat'], "text"));

  mysql_select_db($database_karya_husada, $karya_husada);
  $Result1 = mysql_query($updateSQL, $karya_husada) or die(mysql_error());

  $updateGoTo = "obat_tampil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['Kode_Obat'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['Kode_Obat'] : addslashes($_GET['Kode_Obat']);
}
mysql_select_db($database_karya_husada, $karya_husada);
$query_Recordset1 = sprintf("SELECT * FROM obat WHERE Kode_Obat = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $karya_husada) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Apotik Karya Husada Perdagangan</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="my.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
<style type="text/css" media="screen">
#menuh{float:none;}
body{behavior:url(csshover.htc); font-size:75%;}
#menuh ul li{float:left; width: 100%;}
#menuh a{height:1%;font:normal 1em/1.6em "Trebuchet MS", helvetica, arial, sans-serif;}
</style>
<![endif]-->
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>
<body>
<div id="container">
  <div id="top">
    <p><a href="http://www.free-css.com/"></a> | <a href="http://www.free-css.com/"></a></p>
    <h1>APOTIK KARYA HUSADA PERDAGANGAN </h1>
  </div>
  <div id="menuh-container">
    <div id="menuh">
      <ul>
        <li><a href="obat.php" class="top_parent">OBAT</a>        </li>
      </ul>
      <ul>
        <li><a href="pemesanan.php" class="top_parent">&nbsp;PEMESANAN</a>        </li>
      </ul>
      <ul>
        <li><a href="pelanggan.php" class="top_parent">&nbsp;PELANGGAN</a>        </li>
      </ul>
      <ul>
        <li><a href="detail_pesan.php" class="top_parent">&nbsp;DETAIL PESAN </a> </li>
      </ul>
	  <ul>
        <li><a href="buku_tamu.php" class="top_parent">&nbsp;BUKU TAMU </a> </li>
      </ul>
	  <ul>
        <li><a href="keluar.php" class="top_parent">&nbsp;LOG OUT</a> </li>
      </ul>
    </div>
  </div>
  <div id="leftnav">
    <h3>Hot News !!!</h3>
    <p align="center" class="quote"><img src="Gambar Untuk Web/rekam.jfif" width="131" height="117" /></p>
	<h3>Media Iklan  !!!</h3>
    <p align="center" class="quote"><img src="Gambar Untuk Web/iklan.jfif" width="129" height="116" /></p>
    <h3>Kontak Kami!!! </h3>
    <div id="nav">
      <ul>
        <li> <img src="Gambar Untuk Web/fb.jfif" alt="" width="18" height="15" /> Karya Husada </li>
        <li>          <img src="Gambar Untuk Web/twitter.jfif" alt="" width="15" height="14" /> @Karya Husada</li>
        <li>          <img src="Gambar Untuk Web/ig.jfif" alt="" width="18" height="16" /> Karya_Husada</li>
        <li>          <img src="Gambar Untuk Web/wa.jfif" alt="" width="17" height="17" /> 0821 5050 0001</li>
      </ul>
    </div>
    <p>&nbsp;</p>
    <h3>Search</h3>
    <div class="search">
      <form method="post" action="http://www.free-css-com/">
        <p>
          <input type="text" name="search" class="search" />
          <input type="submit" value="Search" class="searchSubmit" />
        </p>
      </form>
    </div>
  </div>
  <div id="content">
    <blockquote>
      <h2 align="center" class="byline">INPUT DATA OBAT </h2>
      <p align="center" class="byline">&nbsp;</p>
    
      <form method="POST" name="form1" action="<?php echo $editFormAction; ?>">
        <table align="center">
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#33CCFF"><div align="left">Kode_Obat:</div></td>
            <td><input type="text" name="Kode_Obat" value="<?php echo $row_Recordset1['Kode_Obat']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#33CCFF"><div align="left">Nama_Obat:</div></td>
            <td><input type="text" name="Nama_Obat" value="<?php echo $row_Recordset1['Nama_Obat']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#33CCFF"><div align="left">Keterangan:</div></td>
            <td><input type="text" name="Keterangan" value="<?php echo $row_Recordset1['Keterangan']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#33CCFF"><div align="left">Harga:</div></td>
            <td><input type="text" name="Harga" value="<?php echo $row_Recordset1['Harga']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#33CCFF"><div align="left">Stok:</div></td>
            <td><input type="text" name="Stok" value="<?php echo $row_Recordset1['Stok']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline" bgcolor="#33CCFF">
            <td colspan="2" align="right" nowrap><div align="center">
              <input type="submit" value="Simpan">
            </div></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1">
        <input type="hidden" name="MM_update" value="form1">
      </form>
      <p>&nbsp;</p>
    </blockquote>
  </div>
  <div id="footer"> <a href="http://www.free-css.com/">homepage</a> | <a href="mailto:denise@mitchinson.net">contact</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2025 Anyone | Design by <a href="http://www.mitchinson.net"> Kevin Napitupulu </a> | This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Commons Attribution 3.0 License</a> </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>