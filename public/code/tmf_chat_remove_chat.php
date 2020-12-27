<?php

//remove_chat.php

include('tmf_chat_db_conn.php');

if(isset($_POST["chat_message_id"]))
{
	$query = "
	UPDATE ".K_TABLE_CHAT_MSG." 
	SET status = '2' 
	WHERE chat_message_id = '".$_POST["chat_message_id"]."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();
}

?>