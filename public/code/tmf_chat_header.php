<?php
	$title=K_INSTITUTION_NAME;
	function headerFirst($title){
		echo '<html>'; 
		echo '    <head>'; 
		echo '		<meta http-equiv="content-type" content="text/html; charset=utf-8">'; 
		echo '		<meta http-equiv="X-UA-Compatible" content="IE=edge">'; 
		echo '		<meta name="viewport" content="width=device-width, initial-scale=1" />	'; 
		echo '        <title>'.$title.'</title>  '; 
		echo '		<link rel="stylesheet" href="tmf_chat_assets/jquery-ui.css">'; 
		echo '        <link rel="stylesheet" href="tmf_chat_assets/bootstrap/css/bootstrap.min.css">'; 
		echo '		<script src="tmf_chat_assets/jquery-1.12.4.js"></script>'; 
		echo '  		<script src="tmf_chat_assets/jquery-ui.js"></script>'; 
		echo '	<script src="tmf_chat_assets/bootstrap/js/popper.min.js"></script>';		
		echo '	<script src="tmf_chat_assets/bootstrap/js/bootstrap.min.js"></script>';
	}

function headerSecond(){
	echo '<link rel="stylesheet" href="tmf_chat_assets/emojionearea.min.css"/>';
	echo '<link rel="stylesheet" href="../styles/fontawesome/css/all.min.css"/>';
  	//echo '<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>';
  	//echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>';
  	echo '<script src="tmf_chat_assets/emojionearea.min.js"></script>';
  	echo '<script src="tmf_chat_assets/jquery.form.js"></script>';
}