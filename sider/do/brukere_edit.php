<?php
$userid = $_SESSION[CONF_SESSION];
if(isset($userid)) {
	if(allowuser($userid, $con) == "0") {

	$edit_query = "SELECT id,brukernavn,fornavn,etternavn,epost,telefon,niva FROM brukere WHERE id='".$_GET['id']."'";
#	echo $edit_query;

	$resultat = mysqli_query($con, $edit_query);
		if(mysqli_num_rows($resultat) == 1) {
			$r = mysqli_fetch_array($resultat, MYSQLI_ASSOC);

#			print_r($r);


			$edit_id = $r['id'];
			$edit_brukernavn = $r['brukernavn'];
			$edit_fornavn = $r['fornavn'];
			$edit_etternavn = $r['etternavn'];
			$edit_epost = $r['epost'];
			$edit_tlf = $r['telefon'];
			$edit_niva = $r['niva'];
?>
<form action="action/brukere_edit.php" method="post">
<input type="hidden" name="id" id="id" value="<?php echo $edit_id; ?>">
<table>
	<tr class="tr_topp">
		<td colspan="2">Endre bruker</td>
	</tr>
	<tr>
		<td>Fornavn:</td>
		<td><input type="text" name="fornavn" id="fornavn" class="text" value="<?php echo $edit_fornavn; ?>"><td>
	</tr>
	<tr>
		<td>Etternavn:</td>
		<td><input type="text" name="etternavn" id="etternavn" class="text" value="<?php echo $edit_etternavn; ?>"><td />
	</tr>
	<tr>
		<td>Brukernavn:</td>
		<td><input type="text" name="brukernavn" id="brukernavn" class="text" value="<?php echo $edit_brukernavn; ?>"><td />
	</tr>
	<tr>
		<td>Passord:</td>
		<td><input type="password" name="passord" id="passord" class="text"></td>
	</tr>
	<tr>
		<td>E-post:</td>
		<td><input type="text" name="epost" id="epost" class="text" value="<?php echo $edit_epost; ?>"><td />
	</tr>
	<tr>
		<td>Telefon:</td>
		<td><input type="text" name="telefon" id="telefon" class="text" maxlength="8" size="8" value="<?php echo $edit_tlf; ?>"><td />
	</tr>
	<tr>
		<td>Brukernivå:</td>
		<td>
			<select name="nivaa" id="nivaa" class="text">
				<option value="0">Administrator</option>
				<option value="1">Kunde</option>
				<?php
			if(isset($r['niva'])) {
				echo "<option value=\"".$r['niva']."\" selected=\"selected\">".niva_text($r['niva'])."</option>";
			}
			else {
				return NULL;
			}
		?></select>
		<td />
	</tr>
	<tr>
		<td colspan="2" class="td_submitline">
		<input type="submit" name="knapp" id="knapp" class="submit" value="Oppdater"></td>
	</tr>
</table>
</form>
<?php
		}
		else {
			echo "FEIL";
		}
	}
}
	include("sider/brukere_liste.php");
?>
