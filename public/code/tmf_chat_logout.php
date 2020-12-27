<?php

//logout.php

session_start();
session_destroy();

header('location:tmf_chat_login.php');

?>