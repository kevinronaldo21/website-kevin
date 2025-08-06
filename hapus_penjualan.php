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
  $updateSQL = sprintf("UPDATE penjualan SET no_penjualan=%s, nama_kasir=%s, tgl_penjualan=%s, jam_penjualan=%s, total=%s WHERE id=%s",
                       GetSQLValueString($_POST['no_penjualan'], "text"),
                       GetSQLValueString($_POST['nama_kasir'], "text"),
                       GetSQLValueString($_POST['tgl_penjualan'], "date"),
                       GetSQLValueString($_POST['jam_penjualan'], "text"),
                       GetSQLValueString($_POST['total'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_apotek, $apotek);
  $Result1 = mysql_query($updateSQL, $apotek) or die(mysql_error());

  $updateGoTo = "simpan_penjualan.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM penjualan WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_apotek, $apotek);
  $Result1 = mysql_query($deleteSQL, $apotek) or die(mysql_error());

  $deleteGoTo = "simpan_penjualan.php";
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
$query_Recordset1 = sprintf("SELECT * FROM penjualan WHERE id = %s", $colname_Recordset1);
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
    <p align="left" class="quote"><a href="simpan_barang.php"><strong><strong><img src="Apotek/Images/png-transparent-mover-logistics-package-delivery-box-box-miscellaneous-logo-box-icon.png" width="21" height="19" border="0" /></strong><span class="style1"> DATA BARANG</span><span class="style1"></span></strong></a></p>
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
      <h2 align="center" class="byline style1">INPUT DATA PENJUALAN </h2>
      <p align="center">&nbsp;</p>
    
      
      
      <form action="<?php echo $editFormAction; ?>" method="POST" name="form1">
        <table align="center">
          <tr valign="baseline">
            <td width="92" align="right" nowrap bgcolor="#00FFFF"><div align="left" class="style1">
              <div align="right">Id</div>
            </div></td>
            <td width="272"><input type="text" name="id" value="<?php echo $row_Recordset1['id']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#00FFFF"><div align="left" class="style1">
              <div align="right">No penjualan</div>
            </div></td>
            <td><input type="text" name="no_penjualan" value="<?php echo $row_Recordset1['no_penjualan']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#00FFFF"><div align="left" class="style1">
              <div align="right">Nama Barang </div>
            </div></td>
            <td><input type="text" name="nama_kasir" value="<?php echo $row_Recordset1['nama_kasir']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#00FFFF"><div align="left" class="style1">
              <div align="right">Tgl penjualan</div>
            </div></td>
            <td><input type="text" name="tgl_penjualan" value="<?php echo $row_Recordset1['tgl_penjualan']; ?>" size="32" />
            <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.tgl_penjualan);return false;" ><img name="popcal" align="absmiddle" src="calender/calbtn.gif" width="34" height="22" border="0" alt=""></a></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#00FFFF"><div align="left" class="style1">
              <div align="right">Jam penjualan</div>
            </div></td>
            <td><input type="text" name="jam_penjualan" value="<?php echo $row_Recordset1['jam_penjualan']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap bgcolor="#00FFFF"><div align="left" class="style1">
              <div align="right">Total</div>
            </div></td>
            <td><input type="text" name="total" value="<?php echo $row_Recordset1['total']; ?>" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td height="62" colspan="2" align="right" nowrap>
              <div align="left" class="style1">
                <div align="center">
                  <input name="submit" type="submit" value="SIMPAN" />
                  <label>
                  <input type="submit" name="Submit" value="BATAL" />
                  </label>
                </div>
              </div>              
              <div align="center"></div>
              <span class="style1"><label>              </label>
              </span>              <label><div align="left" class="style1">
                <div align="center"></div>
              </div>
              </label>            </td>
          </tr>
        </table>
        
          <input type="hidden" name="MM_update" value="form1">
      </form>
      <p>&nbsp;</p>
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