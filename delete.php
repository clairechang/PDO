<?php
	include './connect.php';
	
	$status = del_data($_GET['id']);
	if($status == '')
	{
		echo 'delete success';
	}
	else
	{
		echo $status;
	}
	
	
	function del_data($n_id)
	{
		global $db;
		
		$sql = <<<EOD
DELETE FROM note
WHERE n_id = :n_id
EOD;
		$rs = $db->prepare ($sql);
		$params = array(
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
