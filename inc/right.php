<?php
  if(isset($_SESSION['omraade'])) {
    $omraade = $_SESSION['omraade'];
    $query = "SELECT id,tittel FROM ordre WHERE status='0' AND omraade='$omraade' ORDER BY regdato,prioritet";
    $result = mysqli_query($con, $query);
    echo "Du har <b>".mysqli_num_rows($result)."</b> nye ordre.<br />";
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<a href=\"index.php?side=ordre&amp;do=info&amp;id=".$row['id']."\">".$row['tittel']."</a><br />";
      }
  }
  else {
    echo "Område ikke satt.";
  }
?>
