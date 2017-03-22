<div align=center>
<?php
header("Content-Type:text/html; charset=utf-8");
include("db.php");

$conn = mysql_connect($servername, $username, $password);
mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname);

$account = $_POST["account"];
$email = $_POST["email"];
$passwd = $_POST["passwd"];
$sql = "select username from phpbb_users where username='" . $account . "' and user_email='" . $email . "';";
$result = mysql_query("$sql") or die('MySQL query error2');


$new_passwd = md5($passwd);
$change_passwd = "update phpbb_users set user_password=\"$new_passwd\" where username=\"$account\";";
mysql_query("$change_passwd");
echo "<br><h1>資料輸入正確，密碼更新</h1><br>";
echo "<meta http-equiv=\"refresh\" content=\"5;url=http://talk.csie.nttu.edu.tw/\" />";
?>
</div>