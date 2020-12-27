<!--
//login.php
!-->

<?php

include('tmf_chat_db_conn.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	header('location:tmf_chat.php');
}

if(isset($_POST['login']))
{
	$query = "
		SELECT user_id,user_password,user_name,user_firstname FROM ".K_TABLE_USERS." WHERE user_name = :user_name LIMIT 1
	";
	/*$query = "
		SELECT user_id,user_password,user_name,user_firstname,usrgrp_user_id,usrgrp_group_id FROM tce_users,tce_usrgroups WHERE user_id=usrgrp_user_id AND user_name = :user_name
	";*/
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':user_name' => $_POST["username"]
		)
	);	
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if(password_verify($_POST["password"], $row["user_password"]))
			{
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['user_firstname'];
				
				$query2 = "
				SELECT usrgrp_group_id FROM ".K_TABLE_USERGROUP." WHERE usrgrp_user_id='".$_SESSION['user_id']."'
				";
				$statement2 = $connect->prepare($query2);
				$statement2->execute();
				$result2 = $statement2->fetchAll();
				//$group_id=array();
				foreach($result2 as $row2)
				{
					$group_id[] = $row2['0'];
					$_SESSION['group_id'] = $group_id;
					//echo $_SESSION['group_id'];
				}
				
				
				
				//$_SESSION['group_id'] = $row['usrgrp_group_id'];
				$sub_query = "
				INSERT INTO ".K_TABLE_CHAT_LOG." 
	     		(user_id) 
	     		VALUES ('".$row['user_id']."')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				header('location:tmf_chat.php');
			}
			else
			{
				$message = '<label>Wrong Password</label>';
			}
		}
	}
	else
	{
		$message = '<label>Wrong Username</labe>';
	}
}


?>
<?php 
	include("tmf_chat_header.php"); 
	headerFirst($title);
	headerSecond($title);
?>
	</head>
    <body>
	<div class='wrapper border border-primary border-top-0 border-right-0 border-left-0' style="border-width:3px !important">
		<header class='main-header'>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			
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
	<?php 
		if(isset($_SESSION['username'])){
			$username = $_SESSION['username']; 
			$icon = 'fa-power-off'; 
			$logText = 'Logout'; 
		}else{
			$username = 'Hai';
			$icon = 'fa-sign-in-alt';
			$logText = 'Please login'; 
		}
	?>
	
	<span class="btn-group"><a class="btn btn-dark my-2 my-sm-0 text-white"><?php echo $username; ?></a><a href="tmf_chat_logout.php" class="btn btn-danger my-2 my-sm-0" type="submit"><i class="fas <?php echo $icon; ?>"></i> <?php echo $logText; ?></a></span>
  </div>
</nav>	
		</header>
	</div>
	
        <div class="container">
			<div class="panel panel-default">
  				<div class="panel-heading"></div>
				<div class="panel-body">
					<p class="text-danger"><?php echo $message; ?></p>
					<form method="post">
						<div class="form-group">
							<label>Enter Username</label>
							<input type="text" name="username" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Enter Password</label>
							<input type="password" name="password" class="form-control" required />
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-info" value="Login" />
						</div>
						<!--div align="center">
							<a href="tmf_chat_register.php">Register</a>
						</div-->
					</form>
					<br />
					<br />
					<br />
					<br />
				</div>
			</div>
		</div>

    </body>  
</html>