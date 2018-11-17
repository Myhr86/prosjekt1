<?php
if(isset($_SESSION[CONF_SESSION]) && $_SESSION['omraade'] == 0) {
?>
&raquo; <a href="index.php?side=brukere" class="href_meny">Brukere</a><br />
&raquo; <a href="index.php?side=ordre" class="href_meny">Ordre</a><br />
&raquo; <a href="action/logout.php" class="href_meny">Logg ut</a><br />
&raquo; <a href="index.php" class="href_meny">Start</a>
<?php
}

elseif(isset($_SESSION[CONF_SESSION]) && $_SESSION['omraade'] == 1) {
?>
&raquo; <a href="index.php?side=ordre" class="href_meny">Ordre</a><br />
&raquo; <a href="action/logout.php" class="href_meny">Logg ut</a><br />
&raquo; <a href="index.php" class="href_meny">Start</a>
<?php
}

else {
?>
<ul>
<li>&raquo; <a href="index.php?side=tjenester" class="href_meny">Tjenester</a></li><br />
<li>&raquo; <a href="index.php?side=login" class="href_meny">Logg inn</a></li><br />
<li>&raquo; <a href="index.php" class="href_meny">Start</a></li>
</ul>
<?php
}
?>
