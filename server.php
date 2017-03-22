<div align=center>
<?php
header("Content-Type:text/html; charset=utf-8");
include("db.php");

$conn = mysql_connect($servername, $username, $password);
mysql_query("SET NAMES 'utf8'");
mysql_select_db($dbname);

$account = $_POST["account"];
$email = $_POST["email"];
$sql = "select username from phpbb_users where username='" . $account . "' and user_email='" . $email . "';";
$result = mysql_query("$sql") or die('MySQL query error2');
	
if ($account!="" && $email!=""){

	while ($row = mysql_fetch_array($result)){
        $yes = $row['username'];
    }
	if ($yes!=""){
		echo "<h1>密碼重置</h1>";
?>
	<form name="form1" id="form1" method="post" action="server1.php" >
		帳號 : <input type="text" name="account" id="account" readonly="true" value="<?php echo $account;?>"></input> <br><br>
		信箱 : <input type="email" name="email" id="email" readonly="true" value="<?php echo $email;?>"></input> <br><br>
		新密碼 : <input type="password" name="passwd" id="passwd" maxlength="15"> <br><br>
		<button onclick="submitXD(); return 0;">確認提交</button>
	</form>
<?php	
	}
	else{
		echo "帳號、Email有誤！";
		echo "<meta http-equiv=\"refresh\" content=\"5;url=http://talk.csie.nttu.edu.tw/Passwd-Recovery/\" />";
	}
}
?>
</div>