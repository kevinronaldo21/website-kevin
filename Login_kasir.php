<?php require_once('Connections/apotek.php'); ?>
<?php
mysql_select_db($database_apotek, $apotek);
$query_Recordset1 = "SELECT * FROM login";
$Recordset1 = mysql_query($query_Recordset1, $apotek) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "kasir_login.php";
  $MM_redirectLoginFailed = "Login_kasir.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_apotek, $apotek);
  
  $LoginRS__query=sprintf("SELECT username, password FROM login_kasir WHERE username='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $apotek) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
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
            <span class="style4"> LOGIN KASIR </span></p>
          <form ACTION="<?php echo $loginFormAction; ?>" id="form3" name="form3" method="POST">
            <label></label>
            <table width="377" height="156" border="0" align="center" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
              <tr bordercolor="#00FFFF" bgcolor="#FFFFFF">
                <th width="120" height="45" scope="col"><div align="right" class="style5"><img src="images/user.png" width="30" height="34" /></div></th>
                <th width="247" scope="col">
                  <div align="left" class="style5">
                    <input name="email" type="text" id="email" />
                  </div></th>
              </tr>
              <tr bordercolor="#00FFFF" bgcolor="#FFFFFF">
                <td height="26"><div align="right" class="style5"><img src="images/pass.png" width="30" height="32" /></div></td>
                <td>                    
                  
                      <div align="left" class="style5">
                        <input name="password" type="password" id="password" />
                      </div></td>
              </tr>
              <tr bordercolor="#00FFFF" bgcolor="#FFFFFF">
                <td colspan="2"><span class="style5">
  <label> </label>
  <label>
  <div align="center" class="style5">
                    <input type="submit" name="Submit" value="LOGIN" />
                    </div>
                    <span class="style5">
                      </label>
                      </span>
                  <div align="center" class="style5"></div></td></tr>
              <tr bordercolor="#00FFFF" bgcolor="#FFFFFF">
                <td height="23" colspan="2"><div align="center"><span class="style5">
                </span></div>                  <span class="style5"><label></label>
                  <div align="center"><a href="login.php"><img src="images/ADMIN.png" width="97" height="43" border="0" /></a><a href="login_kasir.php"><img src="images/KASIR.png" width="96" height="39" border="0" /></a></div>
                  </span></td>
              </tr>
            </table>
            </form>
          </div></td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>