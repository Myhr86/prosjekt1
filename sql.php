<?php
$con = mysqli_connect(CONF_MYSQL_HOST,CONF_MYSQL_USER,CONF_MYSQL_PASS,CONF_MYSQL_DB);



/* ÆØÅ */
mysqli_query($con, "SET NAMES 'utf8'") or die(mysqli_error($con));

// Check connection
if (mysqli_connect_errno()){
	echo "Feil med tilkobling til MySQL-database: " . mysqli_connect_error($con);
}
?>
