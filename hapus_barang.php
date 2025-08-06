<?php require_once('Connections/apotek.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE barang SET kode_barang=%s, nama_barang=%s, penyimpanan=%s, stok=%s, satuan=%s, nama_kategori=%s, kadaluarsa=%s, harga_beli=%s, harga_jual=%s WHERE id=%s",
                       GetSQLValueString($_POST['kode_barang'], "text"),
                       GetSQLValueString($_POST['nama_barang'], "text"),
                       GetSQLValueString($_POST['penyimpanan'], "text"),
                       GetSQLValueString($_POST['stok'], "int"),
                       GetSQLValueString($_POST['satuan'], "text"),
                       GetSQLValueString($_POST['nama_kategori'], "text"),
                       GetSQLValueString($_POST['kadaluarsa'], "date"),
                       GetSQLValueString($_POST['harga_beli'], "text"),
                       GetSQLValueString($_POST['harga_jual'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_apotek, $apotek);
  $Result1 = mysql_query($updateSQL, $apotek) or die(mysql_error());

  $updateGoTo = "simpan_barang.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM barang WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_apotek, $apotek);
  $Result1 = mysql_query($deleteSQL, $apotek) or die(mysql_error());

  $deleteGoTo = "simpan_barang.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = sprintf("SELECT * FROM barang WHERE id = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $apotek) or die(mysql_error());
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
.style6 {font-size: 12px}
.style14 {
	font-size: 18px;
	color: #FFFFFF;
	font-weight: bold;
}
.style15 {color: #FFFFFF}
-->
</style>
</head>
<body>
<div id="container">
  <div id="top">
    <p class="style6"><img src="Apotek/Images/KH.png" width="83" height="89" /><span class="style14"> APOTEK KARYA HUSADA PERDAGANGAN </span></p>
  </div>
  <div id="menuh-container">
    <div id="menuh">
      <ul>
        <li><a href="kasir.php" class="top_parent"><strong>DATA KASIR </strong></a></li>
      </ul>
      <ul>
        <li><a href="pengguna.php" class="top_parent"><strong>PENGGUNA</strong></a></li>
      </ul>
      <ul>
        <li><a href="login.php" class="top_parent"><strong>LOG OUT</strong></a></li>
      </ul>
    </div>
  </div>
  <div id="leftnav">
    <h3 class="style15">KOMPONEN</h3>
    <p align="left" class="quote"><a href="simpan_barang"><strong><strong><img src="Apotek/Images/png-transparent-mover-logistics-package-delivery-box-box-miscellaneous-logo-box-icon.png" width="21" height="19" /></strong><span class="style1"> DATA BARANG</span><span class="style1"></span></strong></a></p>
    <p align="left" class="style1 quote"><strong><a href="simpan_penjualan.php"><img src="Apotek/Images/png-transparent-vendor-sales-service-marketing-marketing-retail-service-logo.png" width="21" height="18" /> DATA PENJUALAN</a></strong></p>
    <p align="left" class="quote style1"><strong><a href="simpan_detail_penjualan.php"><img src="Apotek/Images/th.jpg" width="21" height="21" /> DETAIL PENJUALAN</a></strong></p>
    <p align="left" class="quote style1"><strong><a href="simpan_unit.php"><img src="Apotek/Images/play-button-white-color-minimalist-database-file-design-creative-logo-icon-modern-elements-simple-elegant-free-photo.jpg" width="22" height="21" /> DATA UNIT</a></strong></p>
    <p align="left" class="style1 quote"><strong><a href="simpan_kategori.php"><img src="Apotek/Images/2426188-200.png" width="20" height="19" /> DATA KATEGORI</a></strong></p>
    <h3 class="style15">Search</h3>
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
      <h2 align="center" class="byline style1">INPUT DATA BARANG </h2>
      <p align="center">&nbsp;</p>
    
      
      <form method="POST" name="form1" action="<?php echo $editFormAction; ?>">
        <table width="356" align="center">
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Id:</span></div></td>
            <td><input type="text" name="id" value="<?php echo $row_Recordset1['id']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Kode Barang:</span></div></td>
            <td><input type="text" name="kode_barang" value="<?php echo $row_Recordset1['kode_barang']; ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Nama Barang:</span></div></td>
            <td><input type="text" name="nama_barang" value="<?php echo $row_Recordset1['nama_barang']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Penyimpanan:</span></div></td>
            <td><input type="text" name="penyimpanan" value="<?php echo $row_Recordset1['penyimpanan']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Stok:</span></div></td>
            <td><input type="text" name="stok" value="<?php echo $row_Recordset1['stok']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Satuan:</span></div></td>
            <td><input type="text" name="satuan" value="<?php echo $row_Recordset1['satuan']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Nama Kategori:</span></div></td>
            <td><input type="text" name="nama_kategori" value="<?php echo $row_Recordset1['nama_kategori']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Kadaluarsa:</span></div></td>
            <td><input type="text" name="kadaluarsa" value="<?php echo $row_Recordset1['kadaluarsa']; ?>" size="32" /><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.kadaluara);return false;" ><img name="popcal" align="absmiddle" src="calender/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Harga Beli:</span></div></td>
            <td><input type="text" name="harga_beli" value="<?php echo $row_Recordset1['harga_beli']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right"><div align="left"><span class="style1">Harga Jual:</span></div></td>
            <td><input type="text" name="harga_jual" value="<?php echo $row_Recordset1['harga_jual']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td colspan="2" align="right" nowrap><div align="center">
              <input name="submit" type="submit" value="SIMPAN" />
              <label>
              <a href="barang.php">
              <input name="Submit" type="submit" id="Submit" value="BATAL" />
              </a></label>
            </div></td>
          </tr>
        </table>
        
        <input type="hidden" name="MM_update" value="form1">
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </blockquote>
  </div>
  <div id="footer"> <a href="http://www.free-css.com/">homepage</a> | <a href="mailto:denise@mitchinson.net">contact</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2025 Anyone | Design by <a href="http://www.mitchinson.net"> Kevin Napitupulu </a> | This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Desain </a> </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>