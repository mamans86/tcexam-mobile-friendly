<?php

//upload.php

if(!empty($_FILES))
{
	if(is_uploaded_file($_FILES['uploadFile']['tmp_name']))
	{
		$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
		$allow_ext = array('jpg', 'png', 'gif', 'pdf', 'docx', 'zip', 'rar');
		if(in_array($ext, $allow_ext))
		{
			$_source_path = $_FILES['uploadFile']['tmp_name'];
			$target_path = 'tmf_chat_upload/' . date('Ymd-his').'_'.$_FILES['uploadFile']['name'];
			if(move_uploaded_file($_source_path, $target_path))
			{
				switch ($ext) {
				  case 'pdf':
					$msg = '<p><button type="button" class="btn btn-primary" onclick="window.open(\''.$target_path.'\')"><span class="badge badge-light"><i class="fas fa-file-pdf"></i></span> '.$_FILES['uploadFile']['name'].'</button></p><br/>';
					//$msg = '<p class="text-white"><a href="'.$target_path.'" class="btn btn-primary text-white" target="blank"><i class="fas fa-file-pdf"></i> '.$_FILES['uploadFile']['name'].'</a></p><br />';
					break;
				  case 'docx':
					$msg = '<p><button type="button" class="btn btn-primary" onclick="window.open(\''.$target_path.'\')"><span class="badge badge-light"><i class="fas fa-file-word"></i></span> '.$_FILES['uploadFile']['name'].'</button></p><br/>';
					//$msg = '<p class="text-white"><a href="'.$target_path.'" class="btn btn-primary text-white" target="blank"><i class="fas fa-file-pdf"></i> '.$_FILES['uploadFile']['name'].'</a></p><br />';
					break;
				  case 'zip':
					$msg = '<p><button type="button" class="btn btn-primary" onclick="window.open(\''.$target_path.'\')"><span class="badge badge-light"><i class="fas fa-file-archive"></i></span> '.$_FILES['uploadFile']['name'].'</button></p><br/>';
					//$msg = '<p class="text-white"><a href="'.$target_path.'" class="btn btn-primary text-white" target="blank"><i class="fas fa-file-pdf"></i> '.$_FILES['uploadFile']['name'].'</a></p><br />';
					break;
				  case 'rar':
					$msg = '<p><button type="button" class="btn btn-primary" onclick="window.open(\''.$target_path.'\')"><span class="badge badge-light"><i class="fas fa-file-archive"></i></span> '.$_FILES['uploadFile']['name'].'</button></p><br/>';
					//$msg = '<p class="text-white"><a href="'.$target_path.'" class="btn btn-primary text-white" target="blank"><i class="fas fa-file-pdf"></i> '.$_FILES['uploadFile']['name'].'</a></p><br />';
					break;	
				  case 'png':
					$msg = '<p><img src="'.$target_path.'" class="img-thumbnail" width="200" height="160" /></p><br />';
					break;
				  case 'jpg':
					$msg = "<p><img src='".$target_path."' class='img-thumbnail' width='200' height='160' /></p><br />";
					break;
				  case 'gif':
					$msg = '<p><img src="'.$target_path.'" class="img-thumbnail" width="200" height="160" /></p><br />';
					break;		
				  default:
					//code to be executed if n is different from all labels;
				}
				echo $msg;
			}
			//echo $ext;
		}
	}
}

?>