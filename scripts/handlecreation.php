<?php 
 echo exec('whoami');
 include 'create_session.php';
 include 'add_game.php';
 header("Location: ../game.php");
 exit();
?>