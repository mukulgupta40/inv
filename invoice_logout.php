<?php

session_start();

session_destroy();

echo "<script>window.open('inv_index.php','_self')</script>";

?>