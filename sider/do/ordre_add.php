<?php
	if(isset($_SESSION[CONF_SESSION])) {
?>
<form action="action/ordre_add.php" method="post">
<table>
	<tr class="tr_topp">
		<td colspan="2">Legg til ordre</td>
	</tr>
	<tr>
		<td>Tittel:</td>
		<td><input type="text" name="tittel" id="tittel" class="text"
		<?php
			if(isset($_SESSION['value_tittel'])) {
				echo "value=\"".$_SESSION['value_tittel']."\"";
				unset($_SESSION['value_tittel']);
			}
		?>>
		</td>
	</tr>
	<tr>
		<td>Beskrivelse:</td>
		<td><textarea name="beskrivelse" id="beskrivelse" class="text"><?php
			if(isset($_SESSION['value_beskrivelse'])) {
				echo $_SESSION['value_beskrivelse'];
				unset($_SESSION['value_beskrivelse']);
			}
		?></textarea></td>
	</tr>
	<tr>
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
		<td>Prioritet:</td>
		<td>
			<select name="prioritet" id="prioritet" class="text">
				<option value="0">Høy</option>";
				<option value="1">Lav</option>";
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
	}
	else {
		echo MSG_NOT_LOGGED_IN;
	}
	include("sider/ordre_liste.php");
?>
