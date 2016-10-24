<?php
	include './connect.php';
	
	$status = add_data('rock', '2f38ac2a7d4b7a34f59cab5d83c22027.jpg');
	if($status == '')
	{
		echo 'success';
	}
	else
	{
		echo $status;
	}
	
	function add_data($n_title, $n_photo)
	{
		global $db;
		
		$sql = <<<EOD
	INSERT INTO note
		(n_title, n_photo, created)
		VALUES
		(:n_title, :n_photo, now())
EOD;
		$rs = $db->prepare ($sql);
		$params = array(
				'n_title' => $n_title,
				'n_photo' => $n_photo
		);
		$status = $rs->execute($params);
		if($status) // ok
		{
			return '';
		}
		else // fail
		{
			$error = $rs->errorInfo();
			return $error[2];
		}
		
	}
