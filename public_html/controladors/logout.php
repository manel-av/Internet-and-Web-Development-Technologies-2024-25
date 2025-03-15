<?php
unset($_SESSION['user_id']);
session_destroy();
header("Location: https://tdiw-n15.deic-docencia.uab.cat/index.php");
exit;
?>