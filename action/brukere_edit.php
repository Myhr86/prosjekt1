<?php
	session_start();
	require("../define.php");
	require("../sql.php");
	if(!isset($_SESSION['CONF_SESSION'])) {

		$q_pass = "SELECT passord FROM brukere WHERE id='".$_POST['id']."'";
			if($_POST['passord'] == "") {
				$getpass = mysqli_fetch_array(mysqli_query($con, $q_pass), MYSQL_ASSOC);
				$passord = $getpass['passord'];
			}
			else {
				$passord = sha1($_POST['passord']);
			}
				$id = $_POST['id'];
				$fornavn = ucfirst(mb_strtolower($_POST['fornavn']));
				$etternavn = ucfirst(mb_strtolower($_POST['etternavn']));
				$brukernavn = mb_strtolower($_POST['brukernavn']);
				$epost = mb_strtolower($_POST['epost']);
				$telefon = $_POST['telefon'];
				$niva = $_POST['nivaa'];
				$bilde = NULL;
				$query = "UPDATE brukere SET fornavn='$fornavn', etternavn='$etternavn', brukernavn='$brukernavn', passord='$passord', epost='$epost', telefon='$telefon', niva='$niva' WHERE id='$id'";

				if(is_numeric($telefon)) {
					if(mysqli_query($con, $query)) {
						$_SESSION['msg'] = MSG_EDITUSER_SUCCESS;
					}
					else {
						$_SESSION['msg'] = MSG_EDITUSER_FAIL;
					}
				}
				else {
					$_SESSION['msg'] = MSG_ADDUSER_TEL;
				}
	}
	else {
		$_SESSION['msg'] = MSG_NOT_LOGGED_IN;
	}
header("Location: ../index.php?side=brukere");

echo mysqli_error($con);
mysqli_close($con);
?>
