<?php
	if(isset($_SESSION[CONF_SESSION])) {
		$query = "SELECT id,tittel,brukerid,DATE_FORMAT(regdato, '%d/%m-%Y %H:%i:%u') AS regdate,omraade,status,prioritet FROM ordre ORDER BY regdato,prioritet,status";

		$result = mysqli_query($con, $query);

	?>
	<table cellpadding="2" cellspacing="0">
		<tr class="tr_topp">
			<td class="td_topp_v">tittel</td>
			<td class="td_topp_v">dato</td>
			<td class="td_topp_v">område</td>
			<td class="td_topp_v">navn</td>
			<td class="td_topp_v">Status</td>
			<td class="td_topp_h">Prioritet</td>
		</tr>
	<?php
		if(mysqli_num_rows($result) == 0) {
	?>
		<tr>
			<td colspan="6"><?php echo MSG_NO_RESULTS; ?></td>
		</tr>
		<?php
		}
		else {
			$i = 0;
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

				if($i % 2 == 0) {
					$bg= "tr_lys";
				}
				else {
					$bg= "tr_mork";
				}
				$i++;
# id,tjeneste,fornavn,etternavn,regdato,status

				$id = $row['id'];
				$tittel = $row['tittel'];
				$brukerid = $row['brukerid'];
				$omraade = $row['omraade'];


# FINN navn
$qnavn = "SELECT CONCAT(fornavn, ' ',etternavn) AS navn FROM brukere WHERE id='$brukerid'";
$qomrade = "SELECT omraade FROM omraade WHERE id='$omraade'";

$resnavn = mysqli_fetch_array(mysqli_query($con, $qnavn), MYSQLI_ASSOC);
$resomraade = mysqli_fetch_array(mysqli_query($con, $qomrade), MYSQLI_ASSOC);

				$navn = $resnavn['navn'];
				$omrade = $resomraade['omraade'];
				$regdato = $row['regdate'];
				$status = status($row['status']);
				$prioritet = prioritet($row['prioritet']);

	?>
		<tr class="<?php echo $bg; ?>">
			<td class="td_liste_v"><?php echo $tittel; ?></td>
			<td class="td_liste_v"><?php echo $regdato; ?></td>
			<td class="td_liste_v"><?php echo $omrade; ?></td>
			<td class="td_liste_v"><?php echo $navn; ?></td>
			<td class="td_liste_v"><?php echo $status; ?></td>
			<td class="td_liste_v"><?php echo $prioritet; ?></td>
			<td class="td_liste_h">
			<a href="index.php?side=ordre&amp;do=info&amp;id=<?php echo $id; ?>"><img src="images/info.png" title="Informasjon" height="16" width="16"></a>
			<a href="action/delete.php&amp;do=ordre_delete&amp;id=<?php echo $id; ?>"><img src="images/delete.png" title="Slett" height="16" width="16"></a></td>

		</tr>
	<?php
		}
	}
?>
<tr>
</table>

<?php
}
else {
	echo MSG_NOT_LOGGED_IN;
}
?>
