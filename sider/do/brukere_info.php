<?php
	if(isset($_SESSION[CONF_SESSION])) {

	$edit_query = "SELECT id,brukernavn,fornavn,etternavn,epost,telefon,niva FROM brukere WHERE id='".$_GET['id']."'";
#	echo $edit_query;

	$resultat = mysqli_query($con, $edit_query);
		if(mysqli_num_rows($resultat) == 1) {
			$r = mysqli_fetch_array($resultat, MYSQLI_ASSOC);



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
		<td colspan="2">brukerinformasjon</td>
	</tr>
	<tr>
		<td>Navn:</td>
		<td><?php echo $edit_fornavn." ".$edit_etternavn; ?><td>
	</tr>
	<tr>
		<td>Brukernavn:</td>
		<td><?php echo $edit_brukernavn; ?><td />
	</tr>
	<tr>
		<td>E-post:</td>
		<td><a href="mailto:<?php echo $edit_epost; ?>" class="href_standard"><?php echo $edit_epost; ?></a><td />
	</tr>
	<tr>
		<td>Telefon:</td>
		<td><?php echo $edit_tlf; ?><td />
	</tr>
	<tr>
		<td>Brukernivå:</td>
		<td><?php echo niva_text($r['niva']); ?><td />
	</tr>
</table>
</form>
<?php
		}
		else {
			echo "FEIL";
		}
	}
	else {
		echo MSG_NOT_LOGGED_IN;
	}
	include("sider/brukere_liste.php");
?>
