<!--
//register.php
!-->

<?php
header("Location:tmf_chat_login.php");
die();

include('tmf_chat_db_conn.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	header('location:tmf_chat.php');
}

if(isset($_POST["register"]))
{
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$check_query = "
	SELECT * FROM ".K_TABLE_USERS." 
	WHERE user_name = :user_name
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':user_name'		=>	$username
	);
	if($statement->execute($check_data))	
	{
		if($statement->rowCount() > 0)
		{
			$message .= '<p><label>Username already taken</label></p>';
		}
		else
		{
			if(empty($username))
			{
				$message .= '<p><label>Username is required</label></p>';
			}
			if(empty($password))
			{
				$message .= '<p><label>Password is required</label></p>';
			}
			else
			{
				if($password != $_POST['confirm_password'])
				{
					$message .= '<p><label>Password not match</label></p>';
				}
			}
			if($message == '')
			{
				$data = array(
					':user_name'		=>	$username,
					':user_password'		=>	password_hash($password, PASSWORD_DEFAULT)
				);

				$query = "
				INSERT INTO ".K_TABLE_USERS." 
				(user_name, user_password) 
				VALUES (:user_name, :user_password)
				";
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					$message = "<label>Registration Completed</label>";
				}
			}
		}
	}
}

?>

<?php 
	include("tmf_chat_header.php"); 
	headerFirst($title);
?>
	</head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">Chat Application using PHP Ajax Jquery</a></h3><br />
			<br />
			<div class="panel panel-default">
  				<div class="panel-heading">Chat Application Register</div>
				<div class="panel-body">
					<form method="post">
						<span class="text-danger"><?php echo $message; ?></span>
						<div class="form-group">
							<label>Enter Username</label>
							<input type="text" name="username" class="form-control" />
						</div>
						<div class="form-group">
							<label>Enter Password</label>
							<input type="password" name="password" class="form-control" />
						</div>
						<div class="form-group">
							<label>Re-enter Password</label>
							<input type="password" name="confirm_password" class="form-control" />
						</div>
						<div class="form-group">
							<input type="submit" name="register" class="btn btn-info" value="Register" />
						</div>
						<div align="center">
							<a href="tmf_chat_login.php">Login</a>
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>  
</html>
