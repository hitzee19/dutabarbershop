<?php
session_start();
session_destroy();
header("Location: contact.html"); // Arahkan ke halaman login setelah logout
exit();
?>
