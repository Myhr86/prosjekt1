<?php
# require("sql.php");
function niva_image($niva) {
	$array = array("admin.png",
					"customers.png");
	return CONF_IMGDIR.$array[$niva];
}

function niva_text($niva) {
	$array = array("Admin",
					"Bruker");
	return $array[$niva];
}
function autologout($lastaction,$timenow,$maxdiff) {

	$diff =  $timenow - $lastaction;
	if($diff > $maxdiff) {
		return header("Location: action/logout.php");
	}
	else {
		return $diff;
	}
}
function logincheck() {
	if(isset($_SESSION[CONF_SESSION])) {
		return true;
	}
	else {
		return false;
	}
}

function prioritet($id) {
	if($id == "0") {
		return "Høy";
	}
	elseif($id == "1") {
		return "Lav";
	}
	else {
		return "Ukjent";
	}
}

function status($id) {
	if($id == "0") {
		return "Ikke begynt";
	}
	elseif($id == "1") {
		return "Pågår";
	}
	elseif($id == "2") {
		return "Ferdig";
	}
	else {
		return "Ukjent";
	}
}
?>
