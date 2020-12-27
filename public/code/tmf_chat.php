<!--
//index.php
!-->

<?php

require_once('tmf_chat_db_conn.php');
//require_once('../../shared/code/tce_functions_authorization.php');
//require_once('../../shared/code/tce_functions_session.php');


session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:tmf_chat_login.php");
}

?>

<?php
	include("tmf_chat_header.php");
	headerFirst($title);
	headerSecond();
?>
    </head>	
    <body> 	
	<div class='wrapper border border-primary border-top-0 border-right-0 border-left-0' style="border-width:3px !important">
		<header class='main-header'>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
			
  <i class="fab fa-telegram-plane fa-lg"></i><a class="navbar-brand" href="#"><?php echo $title; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
    <!--span class="navbar-toggler-icon" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></span-->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
      </li>
      <!--li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li-->
    </ul>
    <!--form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form-->
	<span class="btn-group"><a class="btn btn-light my-2 my-sm-0 text-dark"><?php echo $_SESSION['username']; ?></a><a href="tmf_chat_logout.php" class="btn btn-danger my-2 my-sm-0" type="submit"><i class="fas fa-power-off"></i> Logout</a></span>
  </div>
</nav>	
		</header>
	</div>	

        <div class="container">
		<?php
		/*
		$test_status = fetch_user_test_status($_SESSION['user_id'], $connect);
		if($test_status<4){
			echo '<h3 align="center">Anda tidak diperkenankan mengakses fasilitas ini selama Ujian sedang berlangsung</h3><br />';
			die();
		}*/
	?>	
			<div class="mt-3 mb-3">
				<div id="group_detail">
					<input type="hidden" id="is_active_group_chat_window" value="no" />
					<ul class="list-group">
					<?php
						//print_r($_SESSION);
						if(is_array($_SESSION['group_id'])){
							foreach($_SESSION['group_id'] as $value){
								$query = "
								SELECT group_name FROM tce_user_groups 
								WHERE group_id = '$value' 
								";
								$statement = $connect->prepare($query);
								$statement->execute();
								$result = $statement->fetchAll();
								foreach($result as $row)
								{
									echo '<li class="list-group-item" name="group_chat_'.$value.'" id="group_chat_'.$value.'"><div class="d-flex"><span style="color:#aaa"><i class="fas fa-users fa-2x"></i></span>&nbsp;'.$row['group_name'].'</div></li>';
								}
							}	
						}else{
							echo '<li class="list-group-item" name="group_chat_'.$_SESSION['group_id'].'" id="group_chat_'.$_SESSION['group_id'].'"><span style="color:#aaa"><i class="fas fa-users fa-lg"></i></span>&nbsp;'.$_SESSION['group_id'].'</li>';
						}
					?>
					</ul>
				</div>
				<!--div class="col-md-2 col-sm-3">
					<!--p><?php echo count($_SESSION['group_id']); ?></p-->
					<!--p align="right">Hi - <?php echo $_SESSION['username']; ?> - <a href="tmf_chat_logout.php">Logout</a></p>
				</div-->
			</div>
			<div>
				<div id="user_details"></div>
				<div id="user_model_details"></div>
			</div>
			<br />
			<br />
			
		</div>
		
    </body>  
</html>

<style>

.chat_message_area
{
	position: relative;
	width: 100%;
	height: auto;
	background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#group_chat_message
{
	width: 100%;
	height: auto;
	min-height: 80px;
	overflow: auto;
	padding:6px 24px 6px 12px;
}

.image_upload
{
	position: absolute;
	top:3px;
	right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}

@media (min-width: 768px) {
	.ui-dialog{width:400px !important}
}
</style>  

<div id="group_chat_dialog" class="this_chat_dialog">
	<div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;">

	</div>
	<div class="form-group">
		<!--<textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>!-->
		<div class="chat_message_area">
			<div id="group_chat_message" contenteditable class="form-control">
			
			</div>
			<input type="hidden" id="group_id" value="0" />
			<div class="image_upload">
				<form id="uploadImage" method="post" action="tmf_chat_upload.php">
					<label for="uploadFile"><img src="tmf_chat_upload.png" /></label>
					<input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png, .pdf, .gif, .docx, .zip, .rar" />
					<!--input type="file" name="uploadFile" id="uploadFile"/-->
				</form>
			</div>
		</div>
	</div>
	<div class="form-group" align="right">
		<button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
	</div>
</div>


<script>  
$(document).ready(function(){

	fetch_user();

	setInterval(function(){
		var group_id = $('input#group_id').val();
		update_last_activity();
		fetch_user();
		update_chat_history_data();
		fetch_group_chat_history(group_id);
	}, 5000);

	function fetch_user()
	{
		$.ajax({
			url:"tmf_chat_fetch_user.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}

	function update_last_activity()
	{
		$.ajax({
			url:"tmf_chat_update_last_activity.php",
			success:function()
			{

			}
		})
	}

	function make_chat_dialog_box(to_user_id, to_user_name)
	{
		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="Chat with '+to_user_name+'">';
		modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
		$('#user_model_details').html(modal_content);
	}

	$(document).on('click', '.start_chat', function(){
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
		make_chat_dialog_box(to_user_id, to_user_name);
		$("#user_dialog_"+to_user_id).dialog({
			autoOpen:false,
			width:'100%'
		});
		$('#user_dialog_'+to_user_id).dialog('open');
		$('#chat_message_'+to_user_id).emojioneArea({
			pickerPosition:"top",
			toneStyle: "bullet"
		});
	});

	$(document).on('click', '.send_chat', function(){
		var to_user_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+to_user_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"tmf_chat_insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					//$('#chat_message_'+to_user_id).val('');
					var element = $('#chat_message_'+to_user_id).emojioneArea();
					element[0].emojioneArea.setText('');
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_user_chat_history(to_user_id)
	{
		$.ajax({
			url:"tmf_chat_fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#chat_history_'+to_user_id).html(data);
			}
		})
	}

	function update_chat_history_data()
	{
		$('.chat_history').each(function(){
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history(to_user_id);
		});
	}

	$(document).on('click', '.ui-button-icon', function(){
		$('.user_dialog').dialog('destroy').remove();
		$('#is_active_group_chat_window').val('no');
	});

	$(document).on('focus', '.chat_message', function(){
		var is_type = 'yes';
		$.ajax({
			url:"tmf_chat_update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{

			}
		})
	});

	$(document).on('blur', '.chat_message', function(){
		var is_type = 'no';
		$.ajax({
			url:"tmf_chat_update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{
				
			}
		})
	});

	$('#group_chat_dialog').dialog({
		autoOpen:false,
		width:'100%'
	});

	<?php
		if(is_array($_SESSION['group_id'])){
			foreach($_SESSION['group_id'] as $value){
				//echo '<button type="button" name="group_chat_'.$value.'" id="group_chat_'.$value.'" class="btn btn-warning btn-xs">Group Chat '.$value.'</button>';
				echo '$(\'#group_chat_'.$value.'\').click(function(){';
				echo ' $(\'input#group_id\').val('.$value.');';
				//echo ' alert($(\'input#group_id\').val());';
				echo '	$(\'#group_chat_dialog\').dialog(\'open\');';
				echo '	$(\'#is_active_group_chat_window\').val(\'yes\');';
				echo '	fetch_group_chat_history('.$value.');';
				echo '});';
			}	
		}else{
			echo '$(\'#group_chat_'.$_SESSION['group_id'].'\').click(function(){';
			echo '	$(\'#group_chat_dialog\').dialog(\'open\');';
			echo '	$(\'#is_active_group_chat_window\').val(\'yes\');';
			echo '	fetch_group_chat_history('.$_SESSION['group_id'].');';
			echo '});';
		}
	?>

	$('#send_group_chat').click(function(){
		var chat_message = $.trim($('#group_chat_message').html());
		var action = 'insert_data';
		var group_id = $('input#group_id').val();
		//alert(group_id);
		if(chat_message != '')
		{
			$.ajax({
				url:"tmf_chat_group_chat.php?group_id="+group_id,
				method:"POST",
				data:{chat_message:chat_message, action:action},
				success:function(data){
					$('#group_chat_message').html('');
					$('#group_chat_history').html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_group_chat_history(x)
	{
		//alert(x);
		var group_chat_dialog_active = $('#is_active_group_chat_window').val();
		var action = "fetch_data";
		if(group_chat_dialog_active == 'yes')
		{
			$.ajax({
				url:"tmf_chat_group_chat.php?group_id="+x,
				method:"POST",
				data:{action:action},
				success:function(data)
				{
					$('#group_chat_history').html(data);
				}
			})
		}
	}

	$('#uploadFile').on('change', function(){
		$('#uploadImage').ajaxSubmit({
			target: "#group_chat_message",
			resetForm: true
		});
	});

	$(document).on('click', '.remove_chat', function(){
		var chat_message_id = $(this).attr('id');
		if(confirm("Are you sure you want to remove this chat?"))
		{
			$.ajax({
				url:"tmf_chat_remove_chat.php",
				method:"POST",
				data:{chat_message_id:chat_message_id},
				success:function(data)
				{
					update_chat_history_data();
				}
			})
		}
	});
	
});  

$("div#group_detail ul.list-group li").click(function(){
	//alert($(this).text());
	$("div[aria-describedby='group_chat_dialog'] div.ui-dialog-titlebar span").text('Group chat : '+$(this).text());
})
</script>