<?php
	session_start();
	require("../define.php");
	require("../sql.php");

	$brukernavn = mb_strtolower($_POST['brukernavn']);
	$passord = sha1($_POST['passord']);
	$knapp = $_POST['login'];


if(isset($_POST['login'])) {
	$query = "SELECT id,fornavn,omraade FROM brukere WHERE brukernavn='$brukernavn' AND passord='$passord'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if(mysqli_num_rows($result) == 1) {
		$_SESSION['msg'] = "Hei ".$row['fornavn'];
		$_SESSION[CONF_SESSION] = $row['id'];
		$_SESSION[omraade] = $row['omraade'];
		$return = CONF_MAINURL;
	}
	else {
		$_SESSION['msg'] = MSG_WRONG_USERPASS;
		$return = $_SERVER['HTTP_REFERER'];
	}
}
else {
	$_SESSION['msg'] = MSG_NOT_PUSHED_BUTTON;
	$return = $_SERVER['HTTP_REFERER'];

}
header("Location: ".$return);
?>
