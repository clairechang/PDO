<?php
	include './connect.php';
	
	// 取得所有資料
	$sql = 'SELECT n_id, n_title, n_photo FROM note order by n_id DESC limit 0,5';
	
	$rs = $db->query($sql);
	$rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	print("<pre>");
	print_r($rows);
	print("</pre>");
	
	// 取得總筆數
	$sql = 'SELECT count(*) as cnt FROM note';
	$rs = $db->query($sql);
	$totalCount = $rs->fetchColumn();
	print("<pre>");
	print_r($totalCount);
	print("</pre>");
	
	// 取得某筆資料
	$sql = 'SELECT * FROM note WHERE n_id = ' . $_GET['id'];
	$rs = $db->query($sql);
	$row = $rs->fetch(PDO::FETCH_ASSOC);
	print("<pre>");
	print_r($row);
	print("</pre>");
	
	// PDO 取得某筆資料, 防止 SQL Injectio
// 	$sql = 'SELECT * FROM note WHERE n_id = :n_id';
// 	$rs = $db->prepare ( $sql );
// 	$params = array('n_id' => $_GET['id']);
// 	$rs->execute ( $params );
// 	$row = $rs->fetch(PDO::FETCH_ASSOC);

	$rows = get_db($_GET['id']);
	
	print("<pre>");
	print_r($row);
	print("</pre>");
	
	function get_db($id)
	{
		global $db;
		
		$sql = 'SELECT * FROM note WHERE n_id = :n_id';
		$rs = $db->prepare ( $sql );
		$params = array('n_id' => $id);
		$rs->execute ( $params );
		return $rs->fetch(PDO::FETCH_ASSOC);
		
	}
	