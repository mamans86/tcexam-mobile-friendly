<?php

//update_is_type_status.php

include('tmf_chat_db_conn.php');
session_start();

$query = "
UPDATE ".K_TABLE_CHAT_LOG." 
SET is_type = '".$_POST["is_type"]."' 
WHERE login_details_id = '".$_SESSION["login_details_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();

?>