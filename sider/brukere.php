<?php
	if(isset($_SESSION[CONF_SESSION])) {
		if($_SESSION['omraade'] == 0) {
?>
<a href="index.php?side=brukere&amp;do=add" class="href_standard">Legg til</a> |
<a href="index.php?side=brukere" class="href_standard">Tilbake</a>
<hr />

<?php
	if(isset($_GET['do'])) {
		$side = $_GET['do'];
		$filnavn = array(	"add",
											"edit",
					 						"info");

		$format = "sider/do/brukere_".$side.".php";

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
		include("sider/brukere_liste.php");
	}
}
	else {
		echo "Du har ikke tilgang til brukerlister.";
	}
}
else {
	echo MSG_NOT_LOGGED_IN;
}
?>
