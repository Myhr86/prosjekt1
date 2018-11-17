<?php
	session_start();
	require("../define.php");
	require("../sql.php");
	require("../functions.php");
	$userid = $_SESSION[CONF_SESSION];

	if(isset($userid)) {
		if(allowuser($userid,$con) == "0") {
      $id = $_GET['id'];

      if($_GET['do'] == "bruker_delete") {
          $table = "brukere";
      }
      elseif($_GET['do'] = "") {

      }
      else {
        ##
      }
      $query = "DELETE FROM ".$table." WHERE id='".$id."'";
#      echo $query;

      mysqli_query($con,$query);
    }
    else {
      $_SESSION['msg'] = MSG_NOT_ALLOW;
    }
  }
  else {
    $_SESSION['msg'] = MSG_NOT_LOGGED_IN;
  }
  header("Location: ".$_SERVER['HTTP_REFERER']);
?>
