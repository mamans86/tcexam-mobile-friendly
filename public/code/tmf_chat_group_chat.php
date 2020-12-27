<?php

//group_chat.php

include('tmf_chat_db_conn.php');

session_start();

if($_POST["action"] == "insert_data")
{
	$group_id=$_GET['group_id'];
	$data = array(
		':from_user_id'		=>	$_SESSION["user_id"],
		':to_group_id'		=>	$group_id,
		':chat_message'		=>	$_POST['chat_message'],
		':status'			=>	'1'
	);

	$query = "
	INSERT INTO ".K_TABLE_CHAT_MSG."
	(from_user_id, to_group_id, chat_message, status) 
	VALUES (:from_user_id, :to_group_id, :chat_message, :status)
	";

	$statement = $connect->prepare($query);

	if($statement->execute($data))
	{
		echo fetch_group_chat_history($connect, $group_id);
	}

}

if($_POST["action"] == "fetch_data")
{
	//echo $_GET['group_id'];
	$group_id=$_GET['group_id'];
	echo stripslashes(fetch_group_chat_history($connect, $group_id));
}

?>