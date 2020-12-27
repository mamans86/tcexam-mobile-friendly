<?php

//fetch_user.php

include('tmf_chat_db_conn.php');

session_start();
if(count($_SESSION['group_id'])>1){
$query = "
SELECT user_id,user_name,user_firstname,usrgrp_user_id,usrgrp_group_id FROM ".K_TABLE_USERS.",".K_TABLE_USERGROUP." WHERE user_id=usrgrp_user_id AND user_id != '".$_SESSION['user_id']."' AND usrgrp_group_id IN (".implode(",",$_SESSION['group_id']).") 
";}else{
	$query = "
SELECT user_id,user_name,user_firstname,usrgrp_user_id,usrgrp_group_id FROM ".K_TABLE_USERS.",".K_TABLE_USERGROUP." WHERE user_id=usrgrp_user_id AND user_id != '".$_SESSION['user_id']."' AND usrgrp_group_id = '".$_SESSION['group_id'][0]."' 
";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '<ul class="list-group">';

foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($user_last_activity > $current_timestamp)
	{
		$status = '<span class="badge badge-success badge-pill border border-light" style="border-width:2px !important">&nbsp;</span>';
	}
	else
	{
		//$status = '<span class="badge badge-danger badge-pill">Offline</span>';
		$status = '';
	}
	$output .= '
	<li class="list-group-item start_chat" style="position:relative" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['user_name'].'">
		<div class="d-flex justify-content-between align-items-center">
			<div class="d-flex"><span style="color:#aaa"><i class="fas fa-user-circle fa-2x"></i></span>&nbsp;'.$row['user_firstname'].'</div>
			<span class="badge badge-primary badge-pill">'.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).'</span>
		</div>
		<div style="position:absolute;top:0.5em;left:0.75em"><small class="mt-1">'.$status.'</small></div>
		'.fetch_is_type_status($row['user_id'], $connect).'
	</li>
	';
}

$output .= '</ul>';

echo $output;

?>