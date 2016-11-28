<?php 

include 'config.php';

if ($_POST) {
	$name = $_POST['user_name'];
	$email = $_POST['user_email'];
	$region_1 = $_POST['region_1_sel'];
	$region_2 = $_POST['region_2_sel'];
	$region_3 = $_POST['region_3_sel'];
	$territory_id = "0";
	if(!empty($region_3)) {
		$territory_id = $region_3;
	} elseif (!empty($region_2)) {
		$territory_id = $region_2;
	} else {
		$territory_id = $region_1;
	}

	$db_conn = Database::getConnection();
	$db_conn->query("SET NAMES utf8");

	$sql_create_table = "CREATE TABLE IF NOT EXISTS persons (
  	id int(11) NOT NULL AUTO_INCREMENT,
  	name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  	email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  	territory_id char(10) COLLATE utf8_unicode_ci NOT NULL,
 	PRIMARY KEY (id),
 	FOREIGN KEY (territory_id) REFERENCES t_koatuu_tree(ter_id)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

	$db_conn->exec($sql_create_table);
	$sql_exist_email = "SELECT id, name FROM persons WHERE email = $email";
	
	$res = $db_conn->query($sql_exist_email);

	if ($res->rowCount()>=1) {
		print "Користувач з такою електронною поштою вже зареєстрований";
	} else {
		$sql = "INSERT INTO persons(name, email, territory_id) VALUES (:name, :email, :territory_id)";

	$stmt = $db_conn->prepare($sql);
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam(':territory_id', $territory_id, PDO::PARAM_STR);
	$stmt->execute() or die(print_r($db->errorInfo(), true));
	}
}

?>