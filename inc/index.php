<?php


if(isset($_SESSION['msg'])) {
	echo "<span class=\"span_msg\">".$_SESSION['msg']."</span>";
	unset($_SESSION['msg']);
}



if(isset($_GET['side'])) {
	$side = $_GET['side'];
	$filnavn = array("login",
					 "brukere",
					 "ordre");

	$format = "sider/".$side.".php";

		if(in_array($side, $filnavn)) {
			if(file_exists($format)) {
				echo "<h2>".strtoupper($side)."</h2>";
				include($format);
			}
			else {
				echo MSG_CANNOT_FIND_FILE.$format;
			}
		}
		else {
			echo MSG_CANNOT_FIND_SITE;
		}
}
else {
	$side = "startside";
	echo "<h2>".strtoupper($side)."</h2>";
}

?>
