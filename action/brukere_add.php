<?php
	session_start();
	require("../define.php");
	require("../sql.php");
	require("../functions.php");
	$userid = $_SESSION[CONF_SESSION];

	if(isset($userid)) {

	$fornavn = ucfirst(mb_strtolower($_POST['fornavn']));
	$etternavn = ucfirst(mb_strtolower($_POST['etternavn']));
	$brukernavn = mb_strtolower($_POST['brukernavn']);
	$passord = sha1($_POST['passord']);
	$epost = mb_strtolower($_POST['epost']);
	$telefon = $_POST['telefon'];
	$niva = $_POST['nivaa'];
	$bilde = "NULL";
	$query = "INSERT INTO brukere (fornavn,etternavn,brukernavn,passord,epost,telefon,niva,bilde,regdato,logintid) VALUES('$fornavn', '$etternavn', '$brukernavn', '$passord', '$epost', '$telefon', '$niva', '$bilde', NOW(), NOW())";
	$check = mysqli_query($con, "SELECT brukernavn FROM brukere WHERE brukernavn='$brukernavn' OR epost='$epost'");

	$_SESSION['value_fname'] = $_POST['fornavn'];
	$_SESSION['value_ename'] = $_POST['etternavn'];
	$_SESSION['value_username'] = $_POST['brukernavn'];
	$_SESSION['value_epost'] = $_POST['epost'];
	$_SESSION['value_tel'] = $_POST['telefon'];
	$_SESSION['value_nivaa'] = $_POST['nivaa'];
# print_r($_POST)."<br />";
# echo $query."<br />";
# echo mysqli_error($con);
	if(is_numeric($telefon)) {
		if(mysqli_num_rows($check) == 0) {

			if(mysqli_query($con, $query)) {
				$_SESSION['msg'] = MSG_ADDUSER_SUCCESS;
				unset($_SESSION['value_fname']);
				unset($_SESSION['value_ename']);
				unset($_SESSION['value_username']);
				unset($_SESSION['value_epost']);
				unset($_SESSION['value_tel']);
				unset($_SESSION['value_nivaa']);
			}
			else {
				$_SESSION['msg'] = MSG_ADDUSER_FAIL;
				$_SESSION['msg'] .= mysqli_error($con);
				$_SESSION['msg'] .= $query;

			}
		}
		else {
			$_SESSION['msg'] = MSG_ADDUSER_EXISTS;
		}
	}
	else {
		$_SESSION['msg'] = MSG_ADDUSER_TEL;
	}
}
else {
	$_SESSION['msg'] = MSG_NOT_LOGGED_IN;
}
header("Location: ".$_SERVER['HTTP_REFERER']);

mysqli_close($con);
?>
