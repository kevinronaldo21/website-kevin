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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO barang (id, kode_barang, nama_barang, penyimpanan, stok, satuan, nama_kategori, kadaluarsa, harga_beli, harga_jual, id_pemasok) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['kode_barang'], "text"),
                       GetSQLValueString($_POST['nama_barang'], "text"),
                       GetSQLValueString($_POST['penyimpanan'], "text"),
                       GetSQLValueString($_POST['stok'], "int"),
                       GetSQLValueString($_POST['satuan'], "text"),
                       GetSQLValueString($_POST['nama_kategori'], "text"),
                       GetSQLValueString($_POST['kadaluarsa'], "date"),
                       GetSQLValueString($_POST['harga_beli'], "text"),
                       GetSQLValueString($_POST['harga_jual'], "text"),
                       GetSQLValueString($_POST['id_pemasok'], "int"));

  mysql_select_db($database_apotek, $apotek);
  $Result1 = mysql_query($insertSQL, $apotek) or die(mysql_error());

  $insertGoTo = "simpan_barang.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = "SELECT * FROM barang";
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
.style28 {font-size: 8px; color: #000000; }
.style42 {font-size: 10px}
.style43 {font-size: 10px; color: #000000; }
.style44 {font-size: 8px}
.style46 {color: #000000; font-size: 60%; }
.style47 {font-size: 60%}
.style48 {font-size: 0.9em}
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
        <li><a href="kasir_kasir.php" class="top_parent"><strong>DATA KASIR </strong></a></li>
      </ul>
      <ul>
        <li><a href="login.php" class="top_parent"><strong>LOG OUT</strong></a></li>
      </ul>
    </div>
  </div>
  <div id="leftnav">
    <h3 class="style15">KOMPONEN</h3>
    <p align="left" class="quote"><a href="simpan_barang_kasir.php"><strong><strong><img src="Apotek/Images/png-transparent-mover-logistics-package-delivery-box-box-miscellaneous-logo-box-icon.png" width="21" height="19" /></strong><span class="style1"> DATA BARANG</span><span class="style1"></span></strong></a></p>
    <p align="left" class="style1 quote"><strong><a href="simpan_penjualan_kasir.php"><img src="Apotek/Images/png-transparent-vendor-sales-service-marketing-marketing-retail-service-logo.png" width="21" height="18" /> DATA PENJUALAN</a></strong></p>
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
      <h2 align="center" class="byline style1">DATA OBAT </h2>
      <div align="left">
        <p><br />
        <a href="barang.php"><img src="images/icon-quality-png-file-png-file-png-file-png-file-31.png" width="23" height="21" /><strong>TAMBAH DATA</strong></a></p>
      </div>
      <table border="1">
        <tr bordercolor="#000000" bgcolor="#33FFFF">
          <td width="63"><div align="left" class="style43 style42">
            <div align="center">id</div>
          </div></td>
          <td width="106"><div align="left" class="style43">
            <div align="center">Kode Barang</div>
          </div></td>
          <td width="110"><div align="left" class="style43">
            <div align="center">Nama Barang</div>
          </div></td>
          <td width="109"><div align="left" class="style43">
            <div align="center">Penyimpanan</div>
          </div></td>
          <td width="72"><div align="left" class="style43">
            <div align="center">Stok</div>
          </div></td>
          <td width="82"><div align="left" class="style43">
            <div align="center">Satuan</div>
          </div></td>
          <td width="115"><div align="left" class="style43">
            <div align="center">Nama Kategori</div>
          </div></td>
          <td width="99"><div align="left" class="style43">
            <div align="center">Kadaluarsa</div>
          </div></td>
          <td width="98"><div align="left" class="style43">
            <div align="center">Harga Beli</div>
          </div></td>
          <td width="98"><div align="center"><span class="style43">Harga Jual</span></div></td>
          <td colspan="2"><div align="left" class="style43">
            <div align="center">Operasi</div>
          </div></td>
        </tr>
        <?php do { ?>
          <tr bordercolor="#000000" bgcolor="#FFFFFF">
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['id']; ?></div>
            </div></td>
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['kode_barang']; ?></div>
            </div></td>
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['nama_barang']; ?></div>
            </div></td>
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['penyimpanan']; ?></div>
            </div></td>
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['stok']; ?></div>
            </div></td>
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['satuan']; ?></div>
            </div></td>
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['nama_kategori']; ?></div>
            </div></td>
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['kadaluarsa']; ?></div>
            </div></td>
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['harga_beli']; ?></div>
            </div></td>
            <td><div align="left" class="style28 style44 style15 style1">
              <div align="center"><?php echo $row_Recordset1['harga_jual']; ?></div>
            </div></td>
            <td width="54"><div align="center"><a href="edit_barang.php?id=<?php echo $row_Recordset1['id']; ?>" class="style15 style1"><img src="images/imgbin-computer-icons-editing-font-awesome-graphics-editor-advertising-GasA3YjEDg9X1DbvZwBNj5JYC.png" width="16" height="17" border="0" /></a></div></td>
            <td width="54"><div align="center"><span class="style28 style44 style15 style1"><a href="hapus_barang.php?id=<?php echo $row_Recordset1['id']; ?>"><img src="images/pngtree-delete-button-3d-icon-png-image_8633077.png" width="17" height="21" border="0" /></a></span></div></td>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table>
    </blockquote>
    <br />
    <table width="510" border="0" align="center">
      <tr>
        <td width="177"><span class="style46">showing 1 to 10 entries </span></td>
        <td width="317"><div align="right" class="style1">
            <table width="152" border="1" bordercolor="#FFFFFF" bgcolor="#E2D9AE">
              <tr>
                <td><div align="center" class="style47">previous</div></td>
                <td><div align="center" class="style47">1</div></td>
                <td><div align="center" class="style47">Next</div></td>
              </tr>
            </table>
        </div></td>
      </tr>
    </table>
    <p><a href="Laporan_barang.php" class="style48"><img src="images/pngtree-report-line-filled-icon-png-image_3789634.jpg" width="23" height="22" />LIHAT LAPORAN DATA BARANG </a></p>
  </div>
  <div id="footer"> <a href="http://www.free-css.com/">homepage</a> | <a href="mailto:denise@mitchinson.net">contact</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2025 Anyone | Design by <a href="http://www.mitchinson.net"> Kevin Napitupulu </a> | This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/">Creative Desain </a> </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>