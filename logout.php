<?php
session_start();
session_encode();
session_destroy();
header("location: index.php");
exit();
