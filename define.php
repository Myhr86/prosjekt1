<?php
// KONFIGURASJON OG FASTE TEKSTER
	define("CONF_TITLE", "Prosjekt1");
	define("CONF_STYLES", "styles/grid.css");
	define("CONF_DATOFORMAT", "%d.%m.%Y - %H:%m");
	define("CONF_MYSQL_HOST", "localhost");
	define("CONF_MYSQL_USER", "prosjekt1");
	define("CONF_MYSQL_PASS", "prosjekt1");
	define("CONF_MYSQL_DB", "prosjekt1");
	define("CONF_MAINURL", "http://".$_SERVER['HTTP_HOST']."/prosjekt1/");	/* MÅ ENDRES */
	define("CONF_SESSION", "LoGin6353");									/* MÅ ENDRES */
	define("CONF_IMGDIR", "images/");
	define("MSG_NOT_LOGGED_IN", "Du har ikke tilgang til denne siden");
	define("MSG_NO_RESULTS", "Ingen resultat av spørringen mot databasen.");
	define("MSG_CANNOT_FIND_FILE", "Finner ikke filen: ");
	define("MSG_CANNOT_FIND_SITE", "Denne siden eksisterer ikke.");
	define("MSG_WRONG_USERPASS", "Feil brukernavn og/eller passord.");
	define("MSG_NOT_PUSHED_BUTTON", "Du har kommet til denne siden på ugyldig vis.");
	define("MSG_ADDUSER_SUCCESS", "Bruker ble lagt til.");
	define("MSG_ADDUSER_FAIL", "Det oppsto en feil når du prøvde å legge til bruker.");
	define("MSG_ADDUSER_TEL", "Ugyldig telefonnummer.");
	define("MSG_ADDUSER_EXISTS", "Det er allerede registrert en bruker med dette brukernavnet eller e-postadressen.");
	define("MSG_ADDORDER_SUCCESS", "Ordre ble lagt til.");
	define("MSG_ADDORDER_FAIL", "Det oppsto en feil når du prøvde å legge til i databasen: ");
	define("MSG_EDITUSER_SUCCESS", "Bruker ble oppdatert.");
	define("MSG_COPYRIGHT", "&copy; Åge Sivertsen 2018");
	define("MSG_NOT_ALLOW", "Du har ikke tilstrekkelig brukernivå for denne operasjonen.")
?>
