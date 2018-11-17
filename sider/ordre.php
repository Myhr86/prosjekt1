<?php
	if(isset($_SESSION[CONF_SESSION])) {
?>
<a href="index.php?side=ordre&amp;do=add" class="href_standard">Legg til</a> |
<a href="index.php?side=ordre" class="href_standard">Tilbake</a>
<hr />

<?php
	if(isset($_GET['do'])) {
		$side = $_GET['do'];
		$filnavn = array(	"add",
											"edit",
					 						"info");

		$format = "sider/do/ordre_".$side.".php";

			if(in_array($side, $filnavn)) {
				if(file_exists($format)) {
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
		include("sider/ordre_liste.php");
	}
}
else {
	echo MSG_NOT_LOGGED_IN;
}
?>
