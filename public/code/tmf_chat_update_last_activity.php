<?php

//update_last_activity.php

include('tmf_chat_db_conn.php');

session_start();

$query = "
UPDATE ".K_TABLE_CHAT_LOG." 
SET last_activity = now() 
WHERE login_details_id = '".$_SESSION["login_details_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();

?>

