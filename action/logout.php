<?php
	session_start();
	require("../define.php");

	if(session_destroy()) {
		session_start();
		$_SESSION['msg'] = "Du er utlogget.";
	}
	else {
		$_SESSION['msg'] = "Utlogging feilet.";
	}
header("Location: ".CONF_MAINURL);
#header("Location: http://localhost/firma/");
?>