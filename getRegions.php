<?php 
include 'config.php';

header('Content-Type: application/json');
$param = $_REQUEST['param'];

$db_conn = Database::getConnection();
	$db_conn->query("SET CHARSET utf8");
if ($param =="1_Level_Regions") {
	$sql = "SELECT ter_id, ter_name FROM t_koatuu_tree WHERE ter_pid IS NULL ORDER BY ter_name";
	$data = $db_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	print json_encode($data);

} elseif ($param=="2_Level_Regions") {
	$ter_pid = $_REQUEST['ter_pid'];
	$sql = "SELECT ter_id, ter_pid, ter_name, ter_type_id FROM t_koatuu_tree 
	WHERE ter_level = 2 AND ter_pid = $ter_pid ORDER BY ter_name, ter_type_id";
	$data = $db_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	print json_encode($data);
	
}  elseif ($param=="3_Level_Regions") {
	$db_conn = Database::getConnection();
	$db_conn->query("SET CHARSET utf8");
	$ter_pid = $_REQUEST['ter_pid'];
	
	$sql = "SELECT ter_id, ter_pid, ter_name, ter_type_id FROM t_koatuu_tree 
	WHERE ter_level IN (3,4) AND ter_pid = $ter_pid ORDER BY ter_name, ter_type_id";
	$data = $db_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	print json_encode($data);
	
}
?>