<?php
	if(isset($_SESSION[CONF_SESSION])) {
		if($_SESSION['omraade'] == 0) {
?>
<form action="action/brukere_add.php" method="post">
<table>
	<tr class="tr_topp">
		<td colspan="2">Legg til bruker</td>
	</tr>
	<tr>
		<td>Fornavn:</td>
		<td><input type="text" name="fornavn" id="fornavn" class="text"
		<?php
			if(isset($_SESSION['value_fname'])) {
				echo "value=\"".$_SESSION['value_fname']."\"";
				unset($_SESSION['value_fname']);
			}
		?>>
		</td>
	</tr>
	<tr>
		<td>Etternavn:</td>
		<td><input type="text" name="etternavn" id="etternavn" class="text"
		<?php
			if(isset($_SESSION['value_ename'])) {
				echo "value=\"".$_SESSION['value_ename']."\"";
				unset($_SESSION['value_ename']);
			}
		?>></td>
	</tr>
	<tr>
		<td>Brukernavn:</td>
		<td><input type="text" name="brukernavn" id="brukernavn" class="text"
		<?php
			if(isset($_SESSION['value_username'])) {
				echo "value=\"".$_SESSION['value_username']."\"";
				unset($_SESSION['value_username']);
			}
		?>>
		</td>
	</tr>
	<tr>
		<td>Passord:</td>
		<td><input type="password" name="passord" id="passord" class="text"></td>
	</tr>
	<tr>
		<td>E-post:</td>
		<td><input type="text" name="epost" id="epost" class="text"
		<?php
			if(isset($_SESSION['value_epost'])) {
				echo "value=\"".$_SESSION['value_epost']."\"";
				unset($_SESSION['value_epost']);
			}
		?>>
		</td>
	</tr>
	<tr>
		<td>Telefon:</td>
		<td><input type="text" name="telefon" id="telefon" class="text" maxlength="8" size="8"
		<?php
			if(isset($_SESSION['value_tel'])) {
				echo "value=\"".$_SESSION['value_tel']."\"";
				unset($_SESSION['value_tel']);
			}
		?>>
		</td>
	</tr>
	<tr>
		<td>Brukernivå:</td>
		<td>
			<select name="nivaa" id="nivaa" class="text">
				<option value="0">Administrator</option>
				<option value="1">Bruker</option>
			</select>
		</td>
	</tr>
	<td>Område:</td>
	<td>
		<select name="omraade" id="omraade" class="text">
<?php
$query_omr = "SELECT id,omraade FROM omraade ORDER BY omraade";
$result_omr = mysqli_query($con, $query_omr);

while($row = mysqli_fetch_array($result_omr, MYSQLI_ASSOC)) {
?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['omraade']; ?></option>";
<?php
}
?>
			</select>
	</td>
</tr>
	<tr>
		<td colspan="2" class="td_submitline">
		<input type="submit" name="knapp" id="knapp" class="submit" value="Registrer"></td>
	</tr>
</table>
</form>
<?php
include("sider/brukere_liste.php");
	}
	else {
		echo "Du har ikke tilgang til å legge til bruker.";
	}
}
else {
	echo MSG_NOT_LOGGED_IN;
}
?>
