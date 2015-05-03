<?
	$conn = mysql_connect("localhost", "scott","tiger");
	$db = mysql_select_db("capstone",$conn);
	
	if($db){
		echo "database connection success<br/>";
		echo "you selected capstone db <br/>";
		echo "status of connection on Mysql : ($conn)";	
	}else {
		echo "connecetion has failed <br/>"	
	}
?>