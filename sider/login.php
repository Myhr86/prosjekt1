<?php
	if(isset($_SESSION['login'])) {
		echo "Du er allerede innlogget";
	}
	else {
?>

<form action="action/login.php" method="post">
<table>
	<tr>
		<td>Brukernavn: </td>
		<td><input type="text" name="brukernavn" id="brukernavn" class="text"></td>
	</tr>
	<tr>
		<td>Passord:</td>
		<td><input type="password" name="passord" id="passord" class="text"></td>
	</tr>
	<tr>
		<td colspan="2" class="td_submitline"><input id="button" type="submit" name="login" id="login" value="Logg inn" class="submit"></td>
	</tr>
</table>
</form>
<?php
	}
?>
