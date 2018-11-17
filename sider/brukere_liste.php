<?php
	if(isset($_SESSION[CONF_SESSION])) {
			$userid = $_SESSION[CONF_SESSION];
		if($_SESSION['omraade'] == 0) {
	$query_adm = "SELECT id,brukernavn,fornavn,etternavn,epost,telefon,niva,DATE_FORMAT(regdato, '%d/%m-%Y - %H:%i') AS dato,omraade FROM brukere  WHERE niva='0' ORDER BY etternavn,fornavn";
	$result_adm = mysqli_query($con, $query_adm);
	?>
	<table cellpadding="2" cellspacing="0">
		<tr class="tr_topp">
			<td colspan="7">Administrator</td>
		</tr>
		<tr class="tr_topp">
			<td class="td_topp_v">Etternavn</td>
			<td class="td_topp_v">Fornavn</td>
			<td class="td_topp_v">Brukernavn</td>
			<td class="td_topp_v">E-post</td>
			<td class="td_topp_v">Telefon</td>
			<td class="td_topp_v">Nivå</td>
			<td class="td_topp_v">Område</td>
			<td class="td_topp_v">Registrert</td>
			<td class="td_topp_h">&nbsp;</td>
		</tr>
	<?php
		if(mysqli_num_rows($result_adm) == 0) {
	?>
		<tr>
			<td colspan="6"><?php echo MSG_NO_RESULTS; ?></td>
		</tr>
		<?php
		}
		else {
			$i = 0;
			while($row = mysqli_fetch_array($result_adm, MYSQLI_ASSOC)) {
				if($i % 2 == 0) {
					$bg= "tr_lys";
				}
				else {
					$bg= "tr_mork";
				}
				$i++;

				$id = $row['id'];
				$fornavn = $row['fornavn'];
				$etternavn = $row['etternavn'];
				$brukernavn = $row['brukernavn'];
				$epost = $row['epost'];
				$telefon = $row['telefon'];
				$niva = $row['niva'];
				# $omraade = mysqli_result(mysqli_query($con, "SELECT omraade FROM omraade WHERE id=".$row['omraade'].""), "omraade");
				$omraade = $row['omraade'];
				$regdato = $row['dato'];
	?>
		<tr class="<?php echo $bg; ?>">
			<td class="td_liste_v"><?php echo $etternavn; ?></td>
			<td class="td_liste_v"><?php echo $fornavn; ?></td>
			<td class="td_liste_v"><?php echo $brukernavn; ?></td>
			<td class="td_liste_v"><?php echo $epost; ?></td>
			<td class="td_liste_v"><center><?php echo $telefon; ?></center></td>
			<td class="td_liste_v"><center><img src="<?php echo niva_image($niva); ?>" alt="<?php echo niva_text($niva); ?>" height="16" width="16"></center></td>
			<td class="td_liste_v"><?php echo $omraade; ?></td>
			<td class="td_liste_v"><?php echo $regdato; ?></td>
			<td class="td_liste_h">
			<a href="index.php?side=brukere&amp;do=info&amp;id=<?php echo $id; ?>"><img src="images/info.png" title="Informasjon" height="16" width="16"></a>
			<a href="index.php?side=brukere&amp;do=edit&amp;id=<?php echo $id; ?>"><img src="images/edit.png" title="Endre" height="16" width="16"></a>
			<a href="action/delete.php&amp;do=bruker_delete&amp;id=<?php echo $id; ?>"><img src="images/delete.png" title="Slett" height="16" width="16"></a></td>
		</tr>
	<?php
		}
	}
?>
</table>









<?php
	$query_kunde = "SELECT id,brukernavn,fornavn,etternavn,epost,telefon,niva,DATE_FORMAT(regdato, '%d/%m-%Y - %H:%i') AS dato,omraade  FROM brukere  WHERE niva='1' ORDER BY etternavn,fornavn";
	$result_kunde = mysqli_query($con, $query_kunde);
	?>
	<table cellpadding="2" cellspacing="0">
		<tr class="tr_topp">
			<td colspan="7">Brukere</td>
		</tr>
		<tr class="tr_topp">
			<td class="td_topp_v">Etternavn</td>
			<td class="td_topp_v">Fornavn</td>
			<td class="td_topp_v">Brukernavn</td>
			<td class="td_topp_v">E-post</td>
			<td class="td_topp_v">Telefon</td>
			<td class="td_topp_v">Område</td>
			<td class="td_topp_h">&nbsp;</td>
		</tr>
	<?php
		if(mysqli_num_rows($result_kunde) == 0) {
	?>
		<tr>
			<td colspan="6"><?php echo MSG_NO_RESULTS; ?></td>
		</tr>
		<?php
		}
		else {
			$i = 0;
			while($row = mysqli_fetch_array($result_kunde, MYSQLI_ASSOC)) {
				if($i % 2 == 0) {
					$bg= "tr_lys";
				}
				else {
					$bg= "tr_mork";
				}
				$i++;

				$id = $row['id'];
				$fornavn = $row['fornavn'];
				$etternavn = $row['etternavn'];
				$brukernavn = $row['brukernavn'];
				$epost = $row['epost'];
				$telefon = $row['telefon'];
				$niva = $row['niva'];
				$omraade = $row['omraade'];
				$regdato = $row['dato'];
	?>
		<tr class="<?php echo $bg; ?>">
			<td class="td_liste_v"><?php echo $etternavn; ?></td>
			<td class="td_liste_v"><?php echo $fornavn; ?></td>
			<td class="td_liste_v"><?php echo $brukernavn; ?></td>
			<td class="td_liste_v"><?php echo $epost; ?></td>
			<td class="td_liste_v"><center><?php echo $telefon; ?></center></td>
			<td class="td_liste_v"><center><img src="<?php echo niva_image($niva); ?>" alt="<?php echo niva_text($niva); ?>" height="16" width="16"></center></td>
			<td class="td_liste_v"><?php echo $regdato; ?></td>
			<td class="td_liste_h">
			<a href="index.php?side=brukere&amp;do=info&amp;id=<?php echo $id; ?>"><img src="images/info.png" title="Informasjon" height="16" width="16"></a>
			<a href="index.php?side=brukere&amp;do=edit&amp;id=<?php echo $id; ?>"><img src="images/edit.png" title="Endre" height="16" width="16"></a>
			<a href="action/delete.php&amp;do=bruker_delete&amp;id=<?php echo $id; ?>"><img src="images/delete.png" title="Slett" height="16" width="16"></a></td>
		</tr>
	<?php
		}
	}
?>
</table>























<?php
	}
	else {
		echo "Du har ikke tilgang til å se andre brukere.";
	}
}
else {
	echo MSG_NOT_LOGGED_IN;
}
?>
