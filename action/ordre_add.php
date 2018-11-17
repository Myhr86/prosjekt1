<?php
	session_start();
	require("../define.php");
	require("../sql.php");


$brukerid = $_SESSION[CONF_SESSION];
$omraade = $_POST['omraade'];
$tittel = mb_strtolower($_POST['tittel']);
$tekst = htmlentities($_POST['beskrivelse']);
$prioritet = $_POST['prioritet'];
$omraade = $_POST['omraade'];

	$query = "INSERT INTO ordre (brukerid,omraade,tittel,tekst,regdato,prioritet,status) VALUES('$brukerid', '$omraade', '$tittel', '$tekst', NOW(), '$prioritet', '0')";

	$_SESSION['value_tittel'] = $_POST['tittel'];
	$_SESSION['value_beskrivelse'] = $_POST['beskrivelse'];

			if(mysqli_query($con, $query)) {
				$_SESSION['msg'] = MSG_ADDORDER_SUCCESS;
				unset($_SESSION['value_tittel']);
				unset($_SESSION['value_beskrivelse']);
			}
			else {
				$_SESSION['msg'] = MSG_ADDORDER_FAIL;
				$_SESSION['msg'] .= mysqli_error($con);
				$_SESSION['msg'] .= $query;
			}

header("Location: ".$_SERVER['HTTP_REFERER']);
mysqli_close($con);
?>
