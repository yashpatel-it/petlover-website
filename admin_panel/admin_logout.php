<?php
session_start();
session_destroy();
header("Location: http://localhost/petlover/admin_login.php?");
exit();
