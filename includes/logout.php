<?php 
session_start();
session_destroy();
session_unset();
session_write_close();
setcookie(session_name(),'', 0, '/');
session_regenerate_id(true);
 ?>