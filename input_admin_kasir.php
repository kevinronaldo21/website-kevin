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
  $insertSQL = sprintf("INSERT INTO login_kasir (username, password) VALUES (%s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_apotek, $apotek);
  $Result1 = mysql_query($insertSQL, $apotek) or die(mysql_error());

  $insertGoTo = "Login_kasir.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['email'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['email'] : addslashes($_GET['email']);
}
mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = sprintf("SELECT * FROM login WHERE email = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $apotek) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Apotek Karya Husada Perdagangan</title>
<style type="text/css">
<!--
.style1 {font-size: 36px}
.style4 {font-size: 36px; color: #000000; }
.style5 {color: #F0F0F0}
-->
</style>
</head>

<body>
<table width="1436" border="1" align="center">
  <tr>
    <td width="712" height="599" bgcolor="#00FFFF"><table width="441" height="402" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <tr>
        <td height="398" bgcolor="#FFFFFF"><div align="center">
          <p><span class="style1"><img src="images/log.png" width="94" height="96" /></span><br />
            <span class="style4">Isi Data Admin Kasir </span></p>
          <p>&nbsp;</p>
        
                <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
            <table align="center">
              <tr valign="baseline">
                <td nowrap align="right">Username:</td>
                <td><input type="text" name="username" value="" size="32"></td>
              </tr>
              <tr valign="baseline">
                <td nowrap align="right">Password:</td>
                <td><input type="text" name="password" value="" size="32"></td>
              </tr>
              <tr valign="baseline">
                <td colspan="2" align="right" nowrap><div align="center">
                  <input type="submit" value="Simpan">
                </div></td>
                </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1">
          </form>
          <p>&nbsp;</p>
        </div></td>
      </tr>
    </table>
      <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>