<?php
	session_start();
	require("../define.php");
	require("../sql.php");
	require("../functions.php");

	$userid = $_SESSION[CONF_SESSION];
	$userniva = allowuser($userid, $con);


	$userid = $_SESSION[CONF_SESSION];
	if(isset($userid)) {
		if($userniva == 0) {
				$id = $_GET['id'];

				$query ="SELECT niva FROM brukere WHERE id='$id'";
				$result = mysqli_query($con, $query);
				$res = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$niva = $res['niva'];
					if($niva == 0) {
						$new_niva = "1";
					}
					else {
						$new_niva = "0";
					}
				mysqli_query($con, "UPDATE brukere SET niva='$new_niva' WHERE id='$id'");
				$_SESSION['msg'] = "Oppdatering av brukernivå vellykket";
			}
		else {
			$_SESSION['msg'] = "Oppdatering av brukernivå feilet";
		}
	}
	else {
		$_SESSION['msg'] = MSG_NOT_LOGGED_IN;
	}
header("Location: ../index.php?side=brukere");

echo mysqli_error($con);
mysqli_close($con);
?>
