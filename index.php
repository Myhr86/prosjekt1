
<?php
session_start();
require("define.php");
require("sql.php");
require("functions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" lang="no" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo CONF_TITLE; ?></title>
<link href="<?php echo CONF_STYLES; ?>" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="grid-container">
  <div class="item1">
    <h1>Startside</h1>
    <p id="menu"></p>
  </div>
	<div class="item2">
	<?php
		if(file_exists("inc/meny.php")) {
			include("inc/meny.php");
		}
		else {
			echo "Finner ikke meny.";
		}
	?>
	</div>
	<div class="item3">
	<?php
		if(file_exists("inc/index.php")) {
			include("inc/index.php");
		}
		else {
			echo "Finner ikke hovedside.";
		}
	?>
	</div>
	<div class="item4"><?php echo MSG_COPYRIGHT; ?>
  <p id="date"></p></div>
	<div class="item5">
		<?php
		if(logincheck() == true) {
			include("inc/right.php");
		}
		else {
			echo "Du er ikke innlogget å får ikke opp informasjon her.";
		}
			 ?>

	</div>

<script>
document.getElementById("date").innerHTML = Date();
</script>
</body>

</html>
<?php
mysqli_close($con);
?>
>>>>>>> master
