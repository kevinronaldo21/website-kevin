<?php require_once('Connections/apotek.php'); ?>
<?php
mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = "SELECT * FROM detail_penjualan";
$Recordset1 = mysql_query($query_Recordset1, $apotek) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Apotek Karya Husada Perdagangan</title>
	  	<style type="text/css"
				@media print{
						input.noPrint{display: none;}
				}
		</style>
<style type="text/css">
<!--
.style1 {color: #000000}
.style3 {color: #000000; font-size: 24px; }
-->
</style>
</head>

<body>
<div align="center">
  <table width="999" border="1">
    <tr>
      <th bgcolor="#FFFF99" scope="col"><div align="center">
        <p>LAPORAN DETAIL PENJUALAN <br />
          APOTEK KARYA HUSADA PERDAGANGAN <br />
        TAHUN 2025 </p>
        <p align="left">&nbsp;</p>
        <table border="1">
          <tr bgcolor="#00FFFF">
            <td><div align="center">No Penjualan</div></td>
            <td><div align="center">Nama Barang</div></td>
            <td><div align="center">Harga Barang</div></td>
            <td><div align="center">Jumlah Barang</div></td>
            <td><div align="center">Satuan</div></td>
            <td><div align="center">Sub Total</div></td>
          </tr>
          <?php do { ?>
            <tr bgcolor="#FFFFFF">
              <td><div align="center" class="style1"><?php echo $row_Recordset1['no_penjualan']; ?></div></td>
              <td><div align="center" class="style1"><?php echo $row_Recordset1['nama_barang']; ?></div></td>
              <td><div align="center" class="style1"><?php echo $row_Recordset1['harga_barang']; ?></div></td>
              <td><div align="center" class="style1"><?php echo $row_Recordset1['jumlah_barang']; ?></div></td>
              <td><div align="center" class="style1"><?php echo $row_Recordset1['satuan']; ?></div></td>
              <td><div align="center" class="style1"><?php echo $row_Recordset1['sub_total']; ?></div></td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
        <div align="right"><a href="simpan_penjualan.php"></a></div>
      </div>
		<p>&nbsp;</p>
		<input class="noPrint" type="button" value="PRINT LAPORAN" onclick="window.print()"
        <p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
      <p>&nbsp;</p></th>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
<p align="center">&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>