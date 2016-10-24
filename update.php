<?php
	include './connect.php';
	
	$n_title = 'claire';
	$n_photo = '70ae9702937af65e156b9e8aa7d34d7e.jpg';
	$n_id = 21;
	
	$status = set_data($n_id, $n_title, $n_photo);
	echo $status;
	
	function set_data($n_id, $n_title, $n_photo)
	{
		global $db;
	
		$sql = <<<EOD
	UPDATE note
		SET n_title = :n_title,
			n_photo = :n_photo
		WHERE 1 = 1
			AND n_id = :n_id 
			AND status = 1
	
EOD;
		$rs = $db->prepare ($sql);
		$params = array(
					'n_title' => $n_title,
					'n_photo' => $n_photo,
					'n_id' => $n_id
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
